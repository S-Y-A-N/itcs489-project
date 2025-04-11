<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

// Footer Links
Route::view('/faq', 'faq');
Route::view('/contact', 'contact');
Route::view('/about', 'about');
Route::view('/team', 'team');
Route::view('/return-policy', 'return-policy');
Route::view('/terms-and-conditions', 'terms');
Route::view('/privacy-policy', 'privacy');
