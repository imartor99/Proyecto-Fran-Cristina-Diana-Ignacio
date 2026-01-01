<?php
/**
 * Clase Core - Enrutador de la aplicación
 * Mapea URL a controladores
 * Formato URL: /controlador/metodo/parametros
 */
class Core {
    protected $controladorActual = 'Paginas';
    protected $metodoActual = 'index';
    protected $parametros = [];

    public function __construct() {
        $url = $this->getUrl();

        // Buscar en controladores si el controlador existe
        if (isset($url[0]) && file_exists('../app/Controladores/' . ucwords($url[0]) . '.php')) {
            // Si existe, lo establecemos como controlador
            $this->controladorActual = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }

        // Requerir el controlador
        require_once '../app/Controladores/' . $this->controladorActual . '.php';

        // Instanciar la clase del controlador
        $this->controladorActual = new $this->controladorActual;

        // Verificar el método
        if (isset($url[1])) {
            // Verificar si el método existe en el controlador
            if (method_exists($this->controladorActual, $url[1])) {
                $this->metodoActual = $url[1];
                // Unset 1 index
                unset($url[1]);
            }
        }

        // Obtener parámetros
        $this->parametros = $url ? array_values($url) : [];

        // Llamar al método del controlador con los parámetros
        call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
    }

    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }
}
