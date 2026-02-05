<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpKernel\HttpCache\Store;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->paginate(20);
    
        return view('books.index', compact('books'));
    
    }

    public function createWithId()
    {
        Gate::authorize('manage-books');
        return view('books.create-id');
    }

    public function storeWithId(Request $request)
    {
        Gate::authorize('manage-books');
        $request->validate([
            'title' => 'required|string|max:255',
            'cover'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'publisher_id' => 'required|exists:publishers,id',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id'
        ]);

        $data = $request->except('cover');

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Livro criado com sucesso.');
    }

    public function createWithSelect()
    {
        Gate::authorize('manage-books');
        $publishers = Publisher::all();
        $authors = Author::all();
        $categories = Category::all();

        return view('books.create-select', compact('publishers', 'authors', 'categories'));
    }

    public function storeWithSelect(Request $request)
    {
        Gate::authorize('manage-books');
        $request->validate([
            'title' => 'required|string|max:255',
            'cover'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'publisher_id' => 'required|exists:publishers,id',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id'
        ]);

        $data = $request->except('cover');

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }   

        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Livro criado com sucesso.');
    }

        public function edit(Book $book)
    {
        Gate::authorize('manage-books');
        $publishers = Publisher::all();
        $authors = Author::all();
        $categories = Category::all();

        return view('books.edit', compact('book', 'publishers', 'authors', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        Gate::authorize('manage-books');
        $request->validate([
            'title' => 'required|string|max:255',
            'publisher_id' => 'required|exists:publishers,id',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'cover'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);
        
            $data = $request->except('cover');

            if ($request->hasFile('cover')) {
                if ($book->cover && \Storage::disk('public')->exists($book->cover)) {
                    \Storage::disk('public')->delete($book->cover);
                }
                $data['cover'] = $request->file('cover')->store('covers', 'public');
            } 

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso.');
    }

    public function show(Book $book)
    {
        $book->load(['author', 'publisher', 'category']);

        $users = User::all();

        return view('books.show', compact('book','users'));

    }

    public function destroy(Book $book)
    {
        Gate::authorize('manage-books');
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livro deletado com sucesso.');
    }
}
