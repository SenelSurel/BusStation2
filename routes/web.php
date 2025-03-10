<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Livewire\Ticket;



Route::get('/', function () {
    return view('index');

});
Route::get('index', [Controller::class,'index'])->name('index');
Route::get('tickets', [Controller::class,'tickets'])->name('tickets')->middleware('auth');
Route::get('login', [Controller::class,'login'])->name('login')->middleware('auth');;
Route::get('register-page', [Controller::class,'register'])->name('register-page')->middleware('auth');;
Route::get('/ticket/{id}', Ticket::class);



