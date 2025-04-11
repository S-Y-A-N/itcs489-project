<?php

use Illuminate\Support\Facades\Route;

// Main Pages
Route::view('/', 'home');
Route::view('/login', 'login');
Route::view('/register', 'register');

// Header Links
Route::view('/brands', 'brands');
Route::view('/membership', 'membership');
// DYNAMIC
Route::view('/profile', 'profile');
Route::view('/wishlist', 'wishlist');
Route::view('/cart', 'cart');


// Footer Links
Route::view('/faq', 'faq');
Route::view('/contact', 'contact-form');
Route::view('/about', 'about');
Route::view('/team', 'team');
Route::view('/return-policy', 'return-policy');
Route::view('/terms-and-conditions', 'terms');
Route::view('/privacy-policy', 'privacy');

Route::view('/sellers', 'sellers');
Route::view('/sell-with-us', 'seller-form');

// Show Many Products Links
Route::view('/offers', 'products/index', ['title' => 'Offers']);
Route::view('/women', 'products/index', ['title' => 'Women Fashion']);
Route::view('/men', 'products/index', ['title' => 'Men Fashion']);
Route::view('/girls', 'products/index', ['title' => 'Girls Fashion']);
Route::view('/boys', 'products/index', ['title' => 'Boys Fashion']);
Route::view('/babies', 'products/index', ['title' => 'Babies & Infants']);
Route::view('/electronics', 'products/index', ['title' => 'Electronics']);
Route::view('/furniture', 'products/index', ['title' => 'Home & Furniture']);
