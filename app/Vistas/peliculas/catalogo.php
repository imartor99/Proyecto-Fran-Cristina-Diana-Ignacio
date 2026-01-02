<?php require_once RUTA_APP . '/Vistas/inc/header.php'; ?>

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1>Cartelera</h1>
        </div>
        <div class="col-md-3">
            <select id="filtro-genero" class="form-control">
                <option value="">Todos los géneros</option>
                <option value="Accion">Acción</option>
                <option value="Ciencia Ficcion">Ciencia Ficción</option>
                <option value="Drama">Drama</option>
                <option value="Comedia">Comedia</option>
                <option value="Terror">Terror</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" id="buscador" class="form-control" placeholder="Buscar película...">
        </div>
    </div>

    <div class="row" id="contenedor-peliculas">
        <?php foreach($datos['peliculas'] as $pelicula) : ?>
            <div class="col-md-3 mb-4 pelicula-item">
                <div class="card h-100">
                    <img src="<?php echo RUTA_URL; ?>/img/<?php echo $pelicula->imagen; ?>" class="card-img-top" alt="<?php echo $pelicula->titulo; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $pelicula->titulo; ?></h5>
                        <p class="card-text text-muted"><?php echo $pelicula->genero; ?></p>
                        <a href="<?php echo RUTA_URL; ?>/peliculas/ficha/<?php echo $pelicula->id; ?>" class="btn btn-primary btn-block">Ver Detalles</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php 
// Lógica para detectar si estamos en modo TEST y corregir la URL del buscador
$url_buscador = RUTA_URL . '/peliculas/buscar';
if(strpos($_SERVER['SCRIPT_NAME'], 'test_cristina.php') !== false){
     $url_buscador = RUTA_URL . '/test_cristina.php?url=buscar';
}
?>
<script>
    const URL_BUSCADOR = "<?php echo $url_buscador; ?>";
</script>
<script src="<?php echo RUTA_URL; ?>/js/buscador.js?v=<?php echo time(); ?>"></script>

<?php require_once RUTA_APP . '/Vistas/inc/footer.php'; ?>
