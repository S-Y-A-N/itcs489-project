<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

// Footer Links
Route::view('/faq', 'faq');
Route::view('/contact', 'contact');
Route::view('/return-policy', 'return-policy');
