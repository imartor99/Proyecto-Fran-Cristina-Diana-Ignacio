<?php require_once RUTA_APP . '/Vistas/inc/header.php'; ?>

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1>Cartelera</h1>
        </div>
        <div class="col-md-6">
            <input type="text" id="buscador" class="form-control" placeholder="Buscar película por título...">
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

<script src="<?php echo RUTA_URL; ?>/js/buscador.js"></script>

<?php require_once RUTA_APP . '/Vistas/inc/footer.php'; ?>
