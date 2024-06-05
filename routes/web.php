<?php

use Illuminate\Support\Facades\Route;
use App\Services\MaterialService;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/belag', function () {
    return view('rubberfinder');
});
