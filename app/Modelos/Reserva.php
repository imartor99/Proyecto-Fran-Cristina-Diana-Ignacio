<?php

require_once "app/Configuracion/db.php";

class Reserva {

    public static function guardar($pelicula, $asiento, $usuario) {
        global $pdo;

        $sql = "INSERT INTO reservas (pelicula_id, asiento_code, usuario_id)
                VALUES (?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$pelicula, $asiento, $usuario]);
    }

    public static function guardarMultiple($pelicula, $asientos, $usuario) {
        global $pdo;
        
        try {
            $pdo->beginTransaction();
            
            $sql = "INSERT INTO reservas (pelicula_id, asiento_code, usuario_id) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);

            foreach ($asientos as $asiento) {
                // Verificar si ya está ocupado para evitar duplicados o errores
                // (Opcional, si la BD tiene restricción UNIQUE saltará excepción)
                $stmt->execute([$pelicula, $asiento, $usuario]);
            }
            
            $pdo->commit();
            return true;
        } catch (Exception $e) {
            $pdo->rollBack();
            return false;
        }
    }

    public static function ocupados($pelicula) {
        global $pdo;

        $stmt = $pdo->prepare(
            "SELECT asiento_code FROM reservas WHERE pelicula_id = ?"
        );
        $stmt->execute([$pelicula]);

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public static function obtenerPorUsuario($usuario_id) {
        global $pdo;

        // Unimos con peliculas para obtener el título (asumiendo que existe la tabla peliculas)
        // Por ahora, como no tengo el esquema de peliculas, solo devuelvo los datos de reservas
        // Si peliculas existe: SELECT r.*, p.titulo FROM reservas r JOIN peliculas p ON r.pelicula_id = p.id ...
        
        $sql = "SELECT * FROM reservas WHERE usuario_id = ? ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$usuario_id]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
