<?php require_once RUTA_APP . '/Vistas/inc/header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo RUTA_URL; ?>/img/<?php echo $datos['pelicula']->imagen; ?>" class="img-fluid rounded" alt="<?php echo $datos['pelicula']->titulo; ?>">
        </div>
        <div class="col-md-8">
            <h2><?php echo $datos['pelicula']->titulo; ?></h2>
            <p class="text-muted"><?php echo $datos['pelicula']->genero; ?> | <?php echo $datos['pelicula']->fecha_estreno; ?></p>
            <hr>
            <h4>Sinopsis</h4>
            <p><?php echo $datos['pelicula']->descripcion; ?></p>
            
            <?php if(!empty($datos['pelicula']->trailer)): ?>
                <div class="mt-4">
                    <h4>Trailer</h4>
                    <a href="<?php echo $datos['pelicula']->trailer; ?>" target="_blank" class="btn btn-outline-danger">Ver Trailer en YouTube</a>
                </div>
            <?php endif; ?>

            <div class="mt-5">
                <a href="<?php echo RUTA_URL; ?>/reservas/seleccionar/<?php echo $datos['pelicula']->id; ?>" class="btn btn-success btn-lg">Comprar Entradas</a>
                <a href="<?php echo RUTA_URL; ?>/peliculas" class="btn btn-secondary btn-lg">Volver al Catálogo</a>
            </div>
        </div>
    </div>
</div>

<?php require_once RUTA_APP . '/Vistas/inc/footer.php'; ?>
