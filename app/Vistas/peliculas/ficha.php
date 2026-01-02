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

            <div class="mt-4">
                <h4>Horarios (Simulados)</h4>
                <?php foreach($datos['horarios'] as $dia): ?>
                    <div class="card mb-2">
                        <div class="card-body py-2">
                            <h6 class="card-title mb-1"><?php echo $dia['fecha']; ?></h6>
                            <div>
                                <?php foreach($dia['horas'] as $hora): ?>
                                    <a href="<?php echo RUTA_URL; ?>/reservas/seleccionar/<?php echo $datos['pelicula']->id; ?>" class="btn btn-outline-primary btn-sm me-2 mb-1">
                                        <?php echo $hora; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="text-muted small mt-1">
                    <i class="fas fa-info-circle"></i> Estos horarios son provisionales hasta la integración con el modelo <code>Sesion</code>.
                </div>
            </div>

            <div class="mt-5">
                <a href="<?php echo RUTA_URL; ?>/reservas/seleccionar/<?php echo $datos['pelicula']->id; ?>" class="btn btn-success btn-lg">Comprar Entradas</a>
                <a href="<?php echo RUTA_URL; ?>/peliculas" class="btn btn-secondary btn-lg">Volver al Catálogo</a>
            </div>
        </div>
    </div>
</div>

<?php require_once RUTA_APP . '/Vistas/inc/footer.php'; ?>
