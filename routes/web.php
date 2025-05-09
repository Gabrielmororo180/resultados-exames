<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\{
    Dashboard,Resultados,Showmodal
};

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/resultados', Resultados::class)->name('resultados');

Route::put('/exame/{id}', [Dashboard::class, 'upload'])->name('exame.upload');

Route::post('/import', [Dashboard::class, 'importcsv'])->name('exame.import');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
