<?php

use App\Livewire\Dashboard\Investor;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');
Route::get('dashboard', Investor\ListAction::class)->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
