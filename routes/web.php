<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SetPasswordController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/set-password', [SetPasswordController::class, 'showForm']);
Route::post('/set-password', [SetPasswordController::class, 'submit']);
