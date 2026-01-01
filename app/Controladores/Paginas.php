<?php
/**
 * Controlador de Páginas
 * Maneja las páginas estáticas de la aplicación
 */
class Paginas extends Controlador {
    
    public function __construct() {
        // Constructor vacío por ahora
    }

    public function index() {
        $datos = [
            'titulo' => 'Bienvenido a CineApp'
        ];
        
        $this->vista('paginas/index', $datos);
    }
}
