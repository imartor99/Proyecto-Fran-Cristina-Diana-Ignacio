<?php
class Peliculas extends Controlador {
    
    public function __construct() {
        $this->peliculaModelo = $this->modelo('Pelicula');
    }

    public function index() {
        $peliculas = $this->peliculaModelo->obtenerTodas();
        
        $datos = [
            'peliculas' => $peliculas
        ];

        $this->vista('peliculas/catalogo', $datos);
    }

    public function ficha($id) {
        $pelicula = $this->peliculaModelo->obtenerPorId($id);

        $datos = [
            'pelicula' => $pelicula
        ];

        $this->vista('peliculas/ficha', $datos);
    }

    public function buscar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Se asume que los datos vienen en JSON o POST normal
            $busqueda = isset($_POST['busqueda']) ? trim($_POST['busqueda']) : '';
            
            // Si viene por JSON (comun en fetch)
            if(empty($busqueda)) {
                $json = json_decode(file_get_contents('php://input'), true);
                $busqueda = $json['busqueda'] ?? '';
            }

            $resultados = $this->peliculaModelo->buscar($busqueda);
            
            // Retornar JSON
            header('Content-Type: application/json');
            echo json_encode($resultados);
        }
    }
}
