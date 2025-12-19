<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Borrowing; 

class BorrowingController extends Controller
{
    public function store(Request $request, Book $book, User $user)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);
        
        $count = Borrowing::where('user_id', $request->user_id)->whereNull('returned_at')->count();

            if ($count >= 5) {
                return redirect()->route('books.show', $book)->with('error', 'Empréstimo não permitido. O usuário já possui empréstimos em aberto.');
            }


         Borrowing::create([
             'user_id' => $request->user_id,
             'book_id' => $book->id,
             'borrowed_at' => now(),
         ]);

         return redirect()->route('books.show', $book)->with('success', 'Empréstimo registrado com sucesso.');
    }

    public function returnBook(Borrowing $borrowing)
    {
        $borrowing->update([
            'returned_at' => now(),
     ]);

        return redirect()->route('books.show', $borrowing->book_id)->with('success', 'Devolução registrada com sucesso.');
    }

    public function userBorrowings(User $user)
    {
        $borrowings = $user->books()->withPivot('borrowed_at', 'returned_at')->get();

        return view('users.borrowings', compact('user', 'borrowings'));
    }

    
}
