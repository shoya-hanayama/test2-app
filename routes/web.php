<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('top');
});

Route::get('/contact', function () {
    return view('contact');
});
