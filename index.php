<?php
session_start();

// Definir la URL base del proyecto (ajusta según tu estructura)
// Si el proyecto está en la raíz: define('BASE_URL', '');
// Si está en subcarpeta: define('BASE_URL', '/Proyecto-Fran-Cristina-Diana-Ignacio/public');
define('BASE_URL', '/Proyecto-Fran-Cristina-Diana-Ignacio/public');

require_once "app/Configuracion/db.php";

$controller = $_GET['c'] ?? 'reservas';
$action     = $_GET['a'] ?? 'index';

$controllerName = ucfirst($controller) . "Controller";
$controllerPath = "app/Controladores/$controllerName.php";

if (!file_exists($controllerPath)) {
    die("Controlador no encontrado");
}

require_once $controllerPath;

$controllerObject = new $controllerName();

if (!method_exists($controllerObject, $action)) {
    die("Acción no encontrada");
}

$controllerObject->$action();
