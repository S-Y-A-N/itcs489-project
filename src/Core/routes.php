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
$router->get('/electronics', 'Products/Index');
$router->get('/women', 'Products/Index');
$router->get('/men', 'Products/Index');
$router->get('/babies', 'Products/Index');
$router->get('/girls', 'Products/Index');
$router->get('/boys', 'Products/Index');
$router->get('/furniture', 'Products/Index');

// info pages like about, faq...
$router->get('/about', 'Info');
$router->get('/faq', 'Info');
$router->get('/return-policy', 'Info');
$router->get('/terms-and-conditions', 'Info');
$router->get('/privacy-policy', 'Info');
$router->get('/team', 'Info');

// Contact form
$router->get('/contact', 'Contact');

// Wishlist
$router->get('/wishlist', 'Wishlist');
$router->post('/wishlist', 'Wishlist');

// Seller Portal
$router->get('/seller-portal', 'Seller/Portal');
$router->post('/seller-portal', 'Seller/Portal');
$router->get('/seller/dashboard', 'Seller/Index');
$router->get('/seller/orders', 'Seller/Orders');
$router->get('/seller/products', 'Seller/Products');
$router->get('/seller/customers', 'Seller/Customers');
$router->get('/seller/reports', 'Seller/Reports');
$router->get('/seller/account', 'Seller/Settings');
$router->get('/seller/help', 'Seller/Help');
$router->get('/seller/logout', 'Seller/Logout');

// Admin Portal
$router->get('/admin/logout', 'Admin/Logout');
$router->get('/admin-portal', 'Admin/Portal');
$router->post('/admin-portal', 'Admin/Portal');

$router->get('/admin/dashboard', 'Admin/Dashboard');
$router->get('/admin/orders', 'Admin/Orders');
$router->get('/admin/products', 'Admin/Products');
$router->get('/admin/customers', 'Admin/Customers');
$router->get('/admin/suppliers', 'Admin/Suppliers');
$router->get('/admin/reports', 'Admin/Reports');
$router->get('/admin/authorization', 'Admin/Authorization');
$router->get('/admin/account', 'Admin/Settings');
$router->get('/admin/help', 'Admin/Help');