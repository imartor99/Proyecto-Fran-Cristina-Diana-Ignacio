<?php

class ReservasController {

    public function index() {
        require_once "app/Modelos/Reserva.php";
        
        // ID de la película por defecto para pruebas
        $pelicula = 1; 
        
        // Obtener asientos ocupados de la BD
        $ocupados = Reserva::ocupados($pelicula);
        
        // Pasamos variables a la vista
        require "app/Vistas/reservas/butacas.php";
    }

    public function guardar() {
        require_once "app/Modelos/Reserva.php";

        // Recibimos los datos por POST
        $asientosJson = $_POST['asientos'] ?? '[]';
        $asientos = json_decode($asientosJson, true);
        
        $usuario  = 1; // ID de usuario (hardcoded por ahora)
        $pelicula = 1; // ID de película (hardcoded por ahora)

        if (!empty($asientos) && is_array($asientos)) {
            $resultado = Reserva::guardarMultiple($pelicula, $asientos, $usuario);
            echo json_encode(["ok" => $resultado]);
        } else {
            echo json_encode(["ok" => false, "msg" => "No se seleccionaron asientos"]);
        }
    }
}
