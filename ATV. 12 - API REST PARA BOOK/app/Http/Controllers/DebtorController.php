<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Gate;

class DebtorController extends Controller
{
    public function index()
    {
        Gate::authorize('manage-debtors');
        $debtors = User::where('debit', '>', 0)->get();

        return view('debtors.index', compact('debtors'));
    }

public function pay($id)
{
    $user = User::findOrFail($id);

    $user->update(['debit' => 0]);

    return redirect()->route('debtors.index')
        ->with('success', "Dívida quitada com sucesso!");
}
}

