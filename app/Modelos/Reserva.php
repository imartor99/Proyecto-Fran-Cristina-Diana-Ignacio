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

    public static function ocupados($pelicula) {
        global $pdo;

        $stmt = $pdo->prepare(
            "SELECT asiento_code FROM reservas WHERE pelicula_id = ?"
        );
        $stmt->execute([$pelicula]);

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
