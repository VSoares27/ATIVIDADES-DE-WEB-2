<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
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
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|unique:authors|max:255',
            'email' => 'required|email|unique:authors|max:255',
            'birth_date' => 'required|date'
        ]);

        Author::update([
            'name' => $request->name,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
        ]);

        $author->update($request->all());

        return redirect()->route('authors.index')->with('success', 'Autor(a) atualizada com sucesso.');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Autor(a) deletada com sucesso.');
    }
}
