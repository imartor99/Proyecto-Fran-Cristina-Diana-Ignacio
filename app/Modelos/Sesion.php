<?php

class Sesion {

    public static function iniciar() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function agregar($item) {
        self::iniciar();
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }
        // Evitar duplicados simples
        if (!in_array($item, $_SESSION['carrito'])) {
            $_SESSION['carrito'][] = $item;
        }
    }

    public static function obtener() {
        self::iniciar();
        return $_SESSION['carrito'] ?? [];
    }

    public static function limpiar() {
        self::iniciar();
        unset($_SESSION['carrito']);
    }
}
