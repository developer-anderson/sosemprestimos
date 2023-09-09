<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmprestimosController;
use App\Models\Emprestimo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('clientes')->group(function(){
    Route::get('/', [ClientesController::class, 'index'])->name("clientes.index");
    Route::get('/create', [ClientesController::class, 'create'])->name("clientes.create");
    Route::post('/store', [ClientesController::class, 'store'])->name("clientes.store");
    Route::get('/{id}/edit', [ClientesController::class, 'edit'])->where('id', '[0-9]+')->name("clientes.edit");
    Route::put('/{id}', [ClientesController::class, 'update'])->where('id', '[0-9]+')->name("clientes.update");
    Route::delete('/{id}', [ClientesController::class, 'destroy'])->where('id', '[0-9]+')->name("clientes.destroy");
    Route::get('/{id}/emprestimos', [ClientesController::class, 'emprestimos'])->where('id', '[0-9]+')->name("clientes.emprestimos");
    //Route::get('/{id}/emprestimos/create', [ClientesController::class, 'emprestimosCreate'])->where('id', '[0-9]+')->name("clientes.emprestimos.create");
});

Route::prefix('emprestimos')->group(function(){
    Route::get('/', [EmprestimosController::class, 'index'])->name("emprestimos.index");
    Route::get('/create', [EmprestimosController::class, 'create'])->name("emprestimos.create");
    Route::post('/store', [EmprestimosController::class, 'store'])->name("emprestimos.store");
    Route::get('/{id}/edit', [EmprestimosController::class, 'edit'])->where('id', '[0-9]+')->name("emprestimos.edit");
    Route::put('/{id}', [EmprestimosController::class, 'update'])->where('id', '[0-9]+')->name("emprestimos.update");
    Route::delete('/{id}', [EmprestimosController::class, 'destroy'])->where('id', '[0-9]+')->name("emprestimos.destroy");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/clientes/{id}/emprestimos/create', [ClientesController::class, 'emprestimosCreate'])
    ->where('id', '[0-9]+')
    ->name("clientes.emprestimos.create");

Route::post('/clientes/{id}/emprestimos', [ClientesController::class, 'emprestimosStore'])
    ->where('id', '[0-9]+')
    ->name("clientes.emprestimos.store");

require __DIR__ . '/auth.php';
