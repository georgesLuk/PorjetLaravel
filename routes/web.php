<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JeuxContoller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/helloWorld', function () {
    return view('hello'); // Implicite hello.blade.php
});

Route::get('/jeux',
[JeuxContoller::class, 'index']);
//index = la méthode index() du controleur de jeux

Route::get('/jeuxGabarits',
[JeuxContoller::class, 'indexGabarits']);