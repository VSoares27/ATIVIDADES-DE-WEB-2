<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Borrowing;
use DateTime;

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

        $bookcurrent = Borrowing::where('user_id', $request->user_id)->where('book_id', $book->id)->whereNull('returned_at')->exists();
        if($bookcurrent){
            return redirect()->route('books.show', $book)->with('error', 'O usuário já possui o livro emprestado');
        }

        $user = User::findorFail($request->user_id);
        if ($user-> debit > 0.00){
            return redirect()->route('books.show', $book)->with('error', 'Este usuário possui multas pendentes e não pode realizar novos empréstimos.');
        }

            $expecteddate = new DateTime(); 
            $expecteddate->modify('+15 days');
            

         Borrowing::create([
             'user_id' => $request->user_id,
             'book_id' => $book->id,
             'borrowed_at' => now(),
             'due_date' => $expecteddate,
         ]);


         return redirect()->route('books.show', $book)->with('success', 'Empréstimo registrado com sucesso.');
    }

    public function returnBook(Borrowing $borrowing, User $user)
    {
        $expecteddate = new DateTime($borrowing->due_date);
        $actualdate = new DateTime();

        if ($actualdate > $expecteddate) {
            $interval = $expecteddate->diff($actualdate);
            $dayslate = $interval->days;

            if ($dayslate > 0){
                $valueperday = 0.50;
                $totalpenalty = $dayslate * $valueperday;

                $user->debit += $totalpenalty;

                session()->flash('warning', "Atraso de {$dayslate} dias. Multa de R$ {$totalpenalty} gerada.");
            }
        }

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
