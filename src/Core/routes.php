<?php

// Main Pages
$router->get('/', 'Home');

// Registr
$router->get('/register', 'Register');
$router->post('/register', 'Register');