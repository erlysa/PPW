<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KucingController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/kucing', [KucingController::class, 'index'])->name('kucing.index');
    Route::get('/kucing/create', [KucingController::class, 'create'])->name('kucing.create');
    Route::post('/kucing', [KucingController::class, 'store'])->name('kucing.store');
    Route::get('/kucing/{kucing}/edit', [KucingController::class, 'edit'])->name('kucing.edit');
    Route::put('/kucing/{kucing}', [KucingController::class, 'update'])->name('kucing.update');
    Route::delete('/kucing/{kucing}', [KucingController::class, 'destroy'])->name('kucing.destroy');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/kucing');
});