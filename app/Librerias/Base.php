<?php
// Clase Base MOCK para pruebas visuales (Simula la BD)
class Base {
    private $stmt;
    
    public function query($sql){
        // Simplemente guardamos la query, no hacemos nada real
        return true;
    }

    public function bind($param, $value, $type = null){
        // Simular binding
        return true;
    }

    public function execute(){
        return true;
    }

    // Simular devolver múltiples filas (para el catálogo)
    public function resultSet(){
        // Datos falsos para probar la vista
        $p1 = new stdClass;
        $p1->id = 1;
        $p1->titulo = "Inception";
        $p1->genero = "Ciencia Ficción";
        $p1->imagen = "poster1.jpg"; // Asegúrate de tener una imagen o se verá roto
        $p1->descripcion = "Un ladrón que roba secretos corporativos a través del uso de la tecnología de compartir sueños...";
        $p1->fecha_estreno = "2010-07-16";
        $p1->trailer = "https://www.youtube.com/watch?v=YoHD9XEInc0";

        $p2 = new stdClass;
        $p2->id = 2;
        $p2->titulo = "The Dark Knight";
        $p2->genero = "Acción";
        $p2->imagen = "poster2.jpg"; 
        $p2->descripcion = "Batman se enfrenta al Joker...";
        $p2->fecha_estreno = "2008-07-18";
        $p2->trailer = "https://www.youtube.com/watch?v=EXeTwQWrcwY";

        return [$p1, $p2];
    }

    // Simular devolver una fila (para la ficha)
    public function registro(){
        $p1 = new stdClass;
        $p1->id = 1;
        $p1->titulo = "Inception (Simulado)";
        $p1->genero = "Ciencia Ficción";
        $p1->imagen = "poster1.jpg";
        $p1->descripcion = "Esta es una descripción simulada de la película para ver la ficha técnica.";
        $p1->fecha_estreno = "2010-07-16";
        $p1->trailer = "https://www.youtube.com/watch?v=YoHD9XEInc0";
        
        return $p1;
    }
    
    public function rowCount(){
        return 2;
    }
}
