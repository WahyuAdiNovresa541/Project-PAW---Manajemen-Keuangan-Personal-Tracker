<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transactions', function () {
    return view('transactions.index');
});

Route::get('/transactions/create', function () {
    return view('transactions.create');
});