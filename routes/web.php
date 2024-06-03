<?php

use Illuminate\Support\Facades\Route;
use App\Services\MaterialService;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testing', function () {
    return MaterialService::findRubber();
});
