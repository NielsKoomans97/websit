<?php

use App\Http\Controllers\ObservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('content.home');
})->name('home.index');

Route::get('webcam', function () {
    return view('content.webcam');
})->name('webcam.index');

Route::get('charts', function () {
    return view('content.charts');
})->name('charts.index');

Route::resource('observations', ObservationController::class);

require __DIR__.'/auth.php';
