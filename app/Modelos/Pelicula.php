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

    // Funcionalidad para el buscador
    public function buscar($termino) {
        $this->db->query('SELECT * FROM peliculas WHERE titulo LIKE :termino');
        $this->db->bind(':termino', '%' . $termino . '%');
        return $this->db->resultSet();
    }
}
