<?php

// Main Pages
$router->get('/', 'Home');

// Register
$router->get('/register', 'Register');
$router->post('/register', 'Register');

// Login
$router->get('/login', 'Login');
$router->post('/login', 'Login');

// Logout
$router->get('/logout', 'Logout');

// Single product page
$router->get('/product', 'Products/Show');
$router->post('/product', 'Products/Show');

// Cart
$router->get('/cart', 'Cart');
$router->post('/cart', 'Cart');

// Checkout
$router->get('/checkout', 'Checkout');
$router->post('/checkout', 'Checkout');

// Add, Update, Delete Address
$router->post('/address', 'Address');

// Card
$router->post('/bank-card', 'BankCard');

// Payment Gateway
$router->post('/payment-gateway', 'PaymentGateway');
// Payment success
$router->get('/payment-success', 'PaymentSuccess');


// Search
$router->get('/products', 'Products/Index');