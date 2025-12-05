<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{

    public function index()
    {
        Gate::authorize('manage-categories');
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        Gate::authorize('manage-categories');
        return view('categories.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('manage-categories');
        $request->validate([
            'name' => 'required|string|unique:categories|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('sucess', 'Categoria criada com sucesso.');
    }

    public function show(Category $category)
    {
        Gate::authorize('manage-categories');
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        Gate::authorize('manage-categories');
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        Gate::authorize('manage-categories');
        $request->validate([
            'name' => 'required|string|unique:categories,name,' . $category->id . '|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('sucess', 'Categoria atualizada com sucesso.');
    }

    public function destroy(Category $category)
    {
        Gate::authorize('manage-categories');
        $category->delete();

        return redirect()->route('categories.index')->with('sucess', 'Categoria deletada com sucesso.');
    }
}
