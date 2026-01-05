<?php
session_start();

// Definir la URL base del proyecto (ajusta si es necesario)
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

// --- AQUÍ ESTÁ EL TRUCO (Output Buffering) ---
// Capturamos todo lo que imprima el controlador
ob_start();

$controllerObject->$action();

$content = ob_get_clean();

// Si lo que devolvió es HTML (tiene etiqueta body), le metemos el header dentro
if (stripos($content, '<body') !== false) {
    ob_start();
    require_once "app/Vistas/inc/header.php";
    $header = ob_get_clean();
    
    // Inyectarlo justo después de <body...>
    $content = preg_replace('/(<body[^>]*>)/i', '$1' . $header, $content, 1);
}

// Imprimimos el resultado final
echo $content;
