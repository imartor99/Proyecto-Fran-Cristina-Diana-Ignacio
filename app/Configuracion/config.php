<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'cineapp');

// Configuración de la aplicación
define('APPROOT', dirname(dirname(__FILE__)));
define('URLROOT', 'http://localhost:3000');
define('SITENAME', 'CineApp');

// Configuración de rutas
define('APP_PATH', APPROOT);
define('PUBLIC_PATH', dirname(APPROOT) . '/public');
