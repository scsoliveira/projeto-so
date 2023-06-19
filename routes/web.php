<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cliente;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TelefoneController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(); // Rotas exclusivas para usuarios logados
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::prefix('cliente')->group(function() {
    // GET
    Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/adicionar', [ClienteController::class, 'adicionar'])->name('cliente.adicionar');
    Route::get('/editar/{id}', [ClienteController::class,'editar'])->name('cliente.editar');
    Route::get('/apagar/{id}', [ClienteController::class, 'apagar'])->name('cliente.apagar');
    Route::get('/info/{id}', [ClienteController::class, 'info'])->name('cliente.info');
    // POST
    Route::post('/salvar', [ClienteController::class, 'salvar'])->name('cliente.salvar'); 
    // PUT
    Route::put('/atualizar/{id}', [ClienteController::class, 'atualizar'])->name('cliente.atualizar');
});

Route::prefix('telefone')->group(function() {
    // GET
    Route::get('/adicionar/{id}', [TelefoneController::class, 'adicionar'])->name('telefone.adicionar');
    Route::get('/editar/{id}', [TelefoneController::class, 'editar'])->name('telefone.editar');
    Route::get('/apagar/{id}', [TelefoneController::class, 'apagar'])->name('telefone.apagar');
    // POST
    Route::post('/salvar/{id}', [TelefoneController::class, 'salvar'])->name('telefone.salvar');
    // PUT
    Route::put('/atualizar/{id}', [TelefoneController::class, 'atualizar'])->name('telefone.atualizar');
});
