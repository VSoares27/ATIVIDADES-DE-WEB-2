<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowingController;



Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


// Rotas para devolução(Importante)
Route::post('/books/{book}/borrow', [BorrowingController::class, 'store'])->name('books.borrow');

Route::get('/users/{user}/borrowings', [BorrowingController::class, 'userBorrowings'])->name('users.borrowings');

Route::patch('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rotas para livro(Importante)
Route::get('/books/create-id-number', [BookController::class, 'createWithId'])->name('books.create.id');
Route::post('/books/create-id-number', [BookController::class, 'storeWithId'])->name('books.store.id');

Route::get('/books/create-select', [BookController::class, 'createWithSelect'])->name('books.create.select');
Route::post('/books/create-select', [BookController::class, 'storeWithSelect'])->name('books.store.select');


// Rotas para livro(Importante)
Route::resource('books', BookController::class)->except(['create', 'store']);
Route::resource('users', UserController::class)->except(['create', 'store', 'destroy']);
Route::resource('categories', CategoryController::class);
Route::resource('authors', AuthorController::class);
Route::resource('publishers', PublisherController::class);