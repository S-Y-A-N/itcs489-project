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