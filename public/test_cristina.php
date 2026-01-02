<?php
// Archivo temporal para visualizar el trabajo de Cristina sin el Core completo

// 1. Definir rutas constantes que usa el proyecto
define('RUTA_APP', dirname(dirname(__FILE__)) . '/app');
define('RUTA_URL', 'http://localhost/curso/Proyecto-Fran-Cristina-Diana-Ignacio/public');
define('NOMBRESITIO', 'CineApp - Test Visual');

// 2. Requerir librerías base (Mocks/Minimales)
require_once '../app/Librerias/Controlador.php';
require_once '../app/Librerias/Base.php';

// 3. Obtener parámetro para ver qué páginas cargar
$url = isset($_GET['url']) ? $_GET['url'] : 'catalogo';

// 4. Invocar el controlador de Cristina
require_once '../app/Controladores/Peliculas.php';
$controlador = new Peliculas();

// Router muy básico
if($url == 'catalogo') {
    $controlador->index();
} elseif($url == 'ficha') {
    $id = isset($_GET['id']) ? $_GET['id'] : 1;
    $controlador->ficha($id);
} elseif($url == 'buscar') {
    // Para probar el JSON
    $controlador->buscar();
} else {
    echo "Ruta desconocida en modo de prueba";
}
