<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin-dashboard');
});
Route::get('/driver-dashboard', function () {
    return view('driver-dashboard');
});
