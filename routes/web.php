<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Categories\Index as CategoriesIndex;
use App\Livewire\Tickets\Index as TicketsIndex;

// A rota principal agora se chama 'dashboard'
Route::get('/', function () {
    return redirect()->route('tickets.index'); // Ou view('dashboard') se você tiver uma
})->name('dashboard'); // Renomeado de 'home' para 'dashboard'

// Rotas para suas telas de gestão
Route::get('/categorias', CategoriesIndex::class)->name('categories.index');
Route::get('/chamados', TicketsIndex::class)->name('tickets.index');