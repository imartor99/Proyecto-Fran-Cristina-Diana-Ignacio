<?php

class ReservasController {

    public function index() {
        require "app/Vistas/reservas/butacas.php";
    }

    public function guardar() {
        require_once "app/Modelos/Reserva.php";

        $asiento  = $_POST['asiento'] ?? null;
        $usuario  = 1; // luego sesión
        $pelicula = 1;

        if ($asiento) {
            Reserva::guardar($pelicula, $asiento, $usuario);
            echo json_encode(["ok" => true]);
        } else {
            echo json_encode(["ok" => false]);
        }
    }
}
