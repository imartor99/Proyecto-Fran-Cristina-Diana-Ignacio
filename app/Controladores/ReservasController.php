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

    public function agregar_carrito() {
        require_once "app/Modelos/Sesion.php";

        $asientosJson = $_POST['asientos'] ?? '[]';
        $asientos = json_decode($asientosJson, true);

        if (!empty($asientos) && is_array($asientos)) {
            // Limpiamos carrito anterior para esta demo (si fuera acumular, usaríamos array_merge o push)
            Sesion::limpiar(); 
            
            foreach ($asientos as $asiento) {
                Sesion::agregar($asiento);
            }
            echo json_encode(["ok" => true]);
        } else {
            echo json_encode(["ok" => false, "msg" => "No seleccionaste asientos"]);
        }
    }

    public function resumen() {
        require_once "app/Modelos/Sesion.php";
        
        $carrito = Sesion::obtener();
        $precioUnitario = 10; // Podría venir de BD
        $total = count($carrito) * $precioUnitario;

        require "app/Vistas/reservas/resumen.php";
    }

    public function confirmar() {
        require_once "app/Modelos/Reserva.php";
        require_once "app/Modelos/Sesion.php";

        $carrito = Sesion::obtener();
        
        $usuario  = 1; // ID Fijo
        $pelicula = 1; // ID Fijo

        if (!empty($carrito)) {
            $resultado = Reserva::guardarMultiple($pelicula, $carrito, $usuario);
            if ($resultado) {
                Sesion::limpiar();
                // Redirigir a mis entradas
                header("Location: index.php?c=reservas&a=mis_entradas");
                exit;
            } else {
                echo "Error al guardar reserva.";
            }
        } else {
            echo "El carrito está vacío.";
        }
    }

    public function mis_entradas() {
        require_once "app/Modelos/Reserva.php";
        
        $usuario = 1;
        $reservas = Reserva::obtenerPorUsuario($usuario);
        
        require "app/Vistas/reservas/mis_entradas.php";
    }
}
