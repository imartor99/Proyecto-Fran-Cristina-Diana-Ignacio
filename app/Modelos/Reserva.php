<?php
/**
 * Modelo de Reserva
 * Maneja las operaciones de base de datos relacionadas con las reservas
 */
class Reserva {
    private $db;

    public function __construct() {
        $this->db = new Base();
    }

    /**
     * Obtiene las butacas ocupadas para una sesión específica
     * @param int $sesion_id ID de la sesión
     * @return array Array de IDs de butacas ocupadas (ej: ["B15", "B16"])
     */
    public function getButacasOcupadas($sesion_id) {
        $this->db->query('SELECT butacas_json FROM reservas WHERE sesion_id = :sesion_id');
        $this->db->bind(':sesion_id', $sesion_id);
        
        $resultados = $this->db->registros();
        
        $butacasOcupadas = [];
        
        // Decodificar cada JSON y combinar todos los arrays
        foreach ($resultados as $reserva) {
            $butacas = json_decode($reserva->butacas_json, true);
            if (is_array($butacas)) {
                $butacasOcupadas = array_merge($butacasOcupadas, $butacas);
            }
        }
        
        return $butacasOcupadas;
    }

    /**
     * Guarda una nueva reserva en la base de datos
     * @param array $datos Array con usuario_id, sesion_id y butacas_json
     * @return bool True si se guardó correctamente, false en caso contrario
     */
    public function guardarReserva($datos) {
        $this->db->query('INSERT INTO reservas (usuario_id, sesion_id, butacas_json) 
                         VALUES (:usuario_id, :sesion_id, :butacas_json)');
        
        // Vincular valores
        $this->db->bind(':usuario_id', $datos['usuario_id']);
        $this->db->bind(':sesion_id', $datos['sesion_id']);
        $this->db->bind(':butacas_json', $datos['butacas_json']);
        
        // Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Obtiene todas las reservas de un usuario
     * @param int $usuario_id ID del usuario
     * @return array Array de objetos con las reservas del usuario
     */
    public function obtenerReservasPorUsuario($usuario_id) {
        $this->db->query('SELECT r.*, s.pelicula_id, s.sala, s.hora 
                         FROM reservas r 
                         INNER JOIN sesiones s ON r.sesion_id = s.id 
                         WHERE r.usuario_id = :usuario_id 
                         ORDER BY r.fecha DESC');
        
        $this->db->bind(':usuario_id', $usuario_id);
        
        return $this->db->registros();
    }
}
