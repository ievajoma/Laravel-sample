<?php

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

Route::get('/filter-products', function () {
    $products = array('Gruntis' => 'produkti-gruntis',
        'Krāsas' => 'produkti-krāsas',
        'Špakteles' => 'produkti-špakteles',
        'Dekoratīvie klājumi' => 'produkti-klājumi',
        'Lakas' => 'produkti-lakas',
        'Betons' => 'produkti-betoni');

    return view('filter-products')
        ->with('products', $products);
});
