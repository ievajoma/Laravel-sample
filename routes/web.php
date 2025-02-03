<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/welcome', function () {
    $time = date('H');
    if ($time >= 5 && $time < 12) {
        $greeting = "Good Morning!";
    }elseif ($time >= 12 && $time < 18) {
        $greeting = "Good Afternoon!";
    }else {
        $greeting = "Good Evening!";
    }

    return view('welcome', ['greeting' => $greeting]);
});

Route::get('/filter-products', [ProductController::class, 'index']);
