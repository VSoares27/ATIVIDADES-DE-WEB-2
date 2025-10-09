<?php

use App\Http\Controllers\MedicamentoController;
use Illuminate\Support\Facades\Route;
use App\Models\Medicamentos;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('medicamentos', MedicamentoController::class);


