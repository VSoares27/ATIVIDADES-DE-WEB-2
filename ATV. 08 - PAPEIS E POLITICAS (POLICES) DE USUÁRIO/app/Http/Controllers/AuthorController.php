<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class AuthorController extends Controller
{

    public function index()
    {
        Gate::authorize('manage-authors');
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        Gate::authorize('manage-authors');
        return view('authors.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('manage-authors');
        $request->validate([
            'name' => 'required|string|unique:authors|max:255',
            'email' => 'required|email|unique:authors|max:255',
            'birth_date' => 'required|date'
        ]);

        Author::create([
            'name' => $request->name,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
        ]);

        return redirect()->route('authors.index')->with('success', 'Autor(a) criada com sucesso.');
    }

    public function show(Author $author)
    {
        Gate::authorize('manage-authors');
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        Gate::authorize('manage-authors');
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        Gate::authorize('manage-authors');
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'birth_date' => 'required|date'
        ]);

        $author->update($request->all());

        return redirect()->route('authors.index')->with('success', 'Autor(a) atualizada com sucesso.');
    }

    public function destroy(Author $author)
    {
        Gate::authorize('manage-authors');
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Autor(a) deletada com sucesso.');
    }
}
