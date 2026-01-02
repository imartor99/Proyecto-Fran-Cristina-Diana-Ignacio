<?php
// Clase Controlador Principal
// Se encarga de poder cargar los modelos y las vistas
class Controlador {
    
    // Cargar modelo
    public function modelo($modelo){
        // carga
        require_once '../app/Modelos/' . $modelo . '.php';
        // Instanciar modelo
        return new $modelo();
    }

    // Cargar vista
    public function vista($vista, $datos = []){
        // Chequear si el archivo vista existe
        if(file_exists('../app/Vistas/' . $vista . '.php')){
            require_once '../app/Vistas/' . $vista . '.php';
        } else {
            // Si el archivo de la vista no existe
            die('La vista no existe');
        }
    }
}
