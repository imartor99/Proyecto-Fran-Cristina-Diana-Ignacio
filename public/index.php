<?php
// Cargar archivo de configuración
require_once '../app/Configuracion/config.php';

// Cargar librerías
require_once '../app/Librerias/Core.php';
require_once '../app/Librerias/Controlador.php';
require_once '../app/Librerias/Base.php';

// Inicializar Core (enrutador)
$init = new Core;
