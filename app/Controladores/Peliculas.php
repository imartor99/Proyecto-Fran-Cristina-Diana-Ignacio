<?php
class Peliculas extends Controlador {
    private $peliculaModelo;
    
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
            // Al usar FormData en JS, PHP rellena $_POST automáticamente
            $busqueda = isset($_POST['busqueda']) ? trim($_POST['busqueda']) : '';
            $genero = isset($_POST['genero']) ? trim($_POST['genero']) : '';

            $resultados = $this->peliculaModelo->buscar($busqueda, $genero);
            
            // Retornar JSON
            header('Content-Type: application/json');
            
            // Envolver resultados con debug info
            $response = [
                'debug_recibido' => [
                    'busqueda' => $busqueda, 
                    'genero' => $genero,
                    'post_raw' => $_POST
                ],
                'datos' => $resultados
            ];
            
            // NOTA: Cambiamos la estructura del JSON, el JS debe leer data.datos ahora
            // O mejor, para no romper el JS, enviamos array mezcla (poco limpio pero funciona si JS espera array)
            // Espera, JS hace: data.forEach... así que espera un Array.
            // Si devuelvo objeto, JS romperá. 
            // VAMOS A DEVOLVER SOLO RESULTADOS PERO LOGGEAR EN ERROR_LOG
            
            error_log("DEBUG PELICULAS: Busqueda: '$busqueda', Genero: '$genero'");

            echo json_encode($resultados);
        }
    }
}
