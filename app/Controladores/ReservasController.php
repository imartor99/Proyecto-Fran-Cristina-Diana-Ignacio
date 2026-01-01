<?php

class ReservasController extends Controlador {
    private $reservaModelo;

    public function __construct() {
        // Cargamos el modelo
        $this->reservaModelo = $this->modelo('Reserva');
    }

    // Carga la vista principal de la sala (para la SPA)
    public function index() {
        $this->vista('reservas/sala');
    }

    // Devuelve las butacas ocupadas en JSON (Funcionalidad AJAX)
    public function getOcupacion($sesion_id) {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $ocupadas = $this->reservaModelo->getButacasOcupadas($sesion_id);
            header('Content-Type: application/json');
            echo json_encode($ocupadas);
        }
    }

    // Guarda la reserva enviada por Fetch/POST
    public function confirmar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtenemos los datos del cuerpo de la petición (JSON)
            $json = file_get_contents('php://input');
            $datos_post = json_decode($json, true);

            // Validamos que vengan los datos necesarios
            if (isset($datos_post['usuario_id']) && isset($datos_post['sesion_id']) && isset($datos_post['butacas'])) {
                
                $datos = [
                    'usuario_id' => $datos_post['usuario_id'],
                    'sesion_id' => $datos_post['sesion_id'],
                    'butacas_json' => json_encode($datos_post['butacas'])
                ];

                if ($this->reservaModelo->guardarReserva($datos)) {
                    header('Content-Type: application/json');
                    echo json_encode(['status' => 'success', 'message' => 'Reserva confirmada correctamente']);
                } else {
                    header('Content-Type: application/json');
                    echo json_encode(['status' => 'error', 'message' => 'Error al guardar la reserva']);
                }
            } else {
                header('Content-Type: application/json');
                echo json_encode(['status' => 'error', 'message' => 'Datos incompletos']);
            }
        }
    }

    // Obtiene el historial de reservas de un usuario
    public function misEntradas($usuario_id) {
        $reservas = $this->reservaModelo->obtenerReservasPorUsuario($usuario_id);
        header('Content-Type: application/json');
        echo json_encode($reservas);
    }
}
