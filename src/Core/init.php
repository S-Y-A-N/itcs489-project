<?php

const SOURCE_PATH = __DIR__ . '/../'; // Source path: /src
const PUBLIC_PATH = __DIR__ . '/../public/'; // Public path: /public

// Order of require is important!
require 'config.php';
require 'functions.php';

require 'Database.php';

require 'Model.php';
require 'Controller.php';

require 'Router.php';

require_once __DIR__ . '/../../vendor/autoload.php';

// Run the app
require 'App.php';
