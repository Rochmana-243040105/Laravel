<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Selamat Datang UNPAS";
});

Route::get('/Selamat-Datang', function () {
    return view('welcome');
});

Route::get('/Data', [DataController::class, 'index']
);
 
Route::get('/Data', [DataController::class, 'index'])->name('data.index');    

route::post('/Data', [DataController::class, 'store'])->name('data.store');
route::get('/Data/{id}/edit', [DataController::class, 'edit'])->name('data.edit'); 
route::put('/Data/{id}/update', [DataController::class, 'update'])->name('data.update');
route::delete('/Data/{id}/delete', [DataController::class, 'destroy'])->name('data.delete');