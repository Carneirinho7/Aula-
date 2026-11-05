<?php

use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\Portfolio;
use Illuminate\Support\Facades\Route;

Route::get('/', [Portfolio::class, 'index'])->name('portfolio');
Route::match(['get', 'post'], '/idade', [Portfolio::class, 'idade'])->name('idade');
Route::match(['get', 'post'], '/jogos', [Portfolio::class, 'jogos'])->name('jogos');
Route::match(['get', 'post'], '/notas', [Portfolio::class, 'notas'])->name('notas');
Route::match(['get', 'post'], '/login-basico', [Portfolio::class, 'loginBasico'])->name('login-basico');
Route::match(['get', 'post'], '/poo2', [Portfolio::class, 'poo2'])->name('poo2');

Route::match(['get', 'post'], '/helpdesk', [HelpdeskController::class, 'index'])
    ->name('helpdesk');

    Route::post('/helpdesk',
    [HelpdeskController::class, 'salvar'])->name('helpdesk.salvar');
