<?php
/**
 * Clase Base para la conexión a la base de datos usando PDO
 */
class Base {
    private $host = DB_HOST;
    private $usuario = DB_USER;
    private $password = DB_PASS;
    private $nombreBaseDatos = DB_NAME;

    private $dbh; // Database handler
    private $stmt; // Statement
    private $error;

    public function __construct() {
        // Configurar DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->nombreBaseDatos . ';charset=utf8';

        $opciones = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Crear instancia de PDO
        try {
            $this->dbh = new PDO($dsn, $this->usuario, $this->password, $opciones);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo "Error de conexión: " . $this->error;
        }
    }

    // Preparar consulta
    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Vincular valores
    public function bind($parametro, $valor, $tipo = null) {
        if (is_null($tipo)) {
            switch (true) {
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                    break;
                default:
                    $tipo = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($parametro, $valor, $tipo);
    }

    // Ejecutar consulta
    public function execute() {
        return $this->stmt->execute();
    }

    // Obtener registros
    public function registros() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Obtener un solo registro
    public function registro() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Obtener cantidad de filas
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}
