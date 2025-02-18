<?php

use App\Models\FormData;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/form', [FormData::class, 'store'])->name('form.store');
