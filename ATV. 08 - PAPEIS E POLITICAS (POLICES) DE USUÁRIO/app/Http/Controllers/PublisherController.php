<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{

    public function index()
    {
        Gate::authorize('manage-publishers');
        $publishers = Publisher::all();
        return view('publishers.index', compact('publishers'));
    }

    public function create()
    {
        Gate::authorize('manage-publishers');
        return view('publishers.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('manage-publishers');
        $request->validate([
            'name' => 'required|string|unique:publishers|max:255',
            'address' =>'required|string|unique:publishers|max:255'
        ]);

        Publisher::create($request->all());

        return redirect()->route('publishers.index')->with('sucess', 'Editora criada com sucesso.');
    }

    public function show(Publisher $publisher)
    {
        Gate::authorize('manage-publishers');
        return view('publishers.show', compact('publisher'));
    }

    public function edit(Publisher $publisher)
    {
        Gate::authorize('manage-publishers');
        return view('publishers.edit', compact('publisher'));
    }

    public function update(Request $request, Publisher $publisher)
    {
        Gate::authorize('manage-publishers');
        $request->validate([
            'name' => 'required|string|max:255',
            'address' =>'required|string|max:255'
        ]);

        $publisher->update($request->all());

        return redirect()->route('publishers.index')->with('sucess', 'Editora atualizada com sucesso.');
    }

    public function destroy(Publisher $publisher)
    {
        Gate::authorize('manage-publishers');
        $publisher->delete();

        return redirect()->route('publishers.index')->with('sucess', 'Editora deletada com sucesso.');
    }
}
