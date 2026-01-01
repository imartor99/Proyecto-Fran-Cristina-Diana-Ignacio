<?php
/**
 * Clase base Controlador
 * Carga los modelos y vistas
 */
class Controlador {
    // Cargar modelo
    public function modelo($modelo) {
        // Requerir archivo del modelo
        require_once '../app/Modelos/' . $modelo . '.php';
        // Instanciar modelo
        return new $modelo();
    }

    // Cargar vista
    public function vista($vista, $datos = []) {
        // Verificar si existe el archivo de vista
        if (file_exists('../app/Vistas/' . $vista . '.php')) {
            require_once '../app/Vistas/' . $vista . '.php';
        } else {
            // Vista no existe
            die('La vista no existe');
        }
    }
}
