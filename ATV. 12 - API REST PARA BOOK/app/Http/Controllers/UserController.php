<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        Gate::authorize('show-users');
        $users = \App\Models\User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function show(\App\Models\User $user)
    {
        Gate::authorize('show-users');
        return view('users.show', compact('user'));
    }

    public function edit(\App\Models\User $user)
    {
        Gate::authorize('manage-users');
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, \App\Models\User $user)
    {
        Gate::authorize('manage-users');
        $user->update($request->only('name', 'email'));
         $user->role = $request->role;

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

}
