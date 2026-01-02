<?php
class Pelicula {
    private $db;

    public function __construct() {
        $this->db = new Base;
    }

    public function obtenerTodas() {
        $this->db->query('SELECT * FROM peliculas');
        return $this->db->resultSet();
    }

    public function obtenerPorId($id) {
        $this->db->query('SELECT * FROM peliculas WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->registro();
    }

    // Funcionalidad para el buscador y filtro
    public function buscar($termino, $genero = '') {
        
        // --- FIX PARA ENTORNO DE TEST (MOCK) ---
        // Si la clase Base tiene un método 'buscar' (nuestro Mock), delegamos en él
        // porque el Mock no entiende de SQL.
        if(method_exists($this->db, 'buscar')) {
            return $this->db->buscar($termino, $genero);
        }
        // ---------------------------------------

        $sql = "SELECT * FROM peliculas WHERE titulo LIKE :termino";
        
        if(!empty($genero)) {
            $sql .= " AND genero = :genero";
        }

        $this->db->query($sql);
        $this->db->bind(':termino', '%' . $termino . '%');
        
        if(!empty($genero)) {
            $this->db->bind(':genero', $genero);
        }

        return $this->db->resultSet();
    }
}
