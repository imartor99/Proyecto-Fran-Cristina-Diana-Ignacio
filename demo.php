<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo CineApp - Diana</title>
    <!-- Cargamos los estilos que creamos -->
    <link rel="stylesheet" href="public/css/reservas.css">
    <style>
        body { background-color: #0f172a; margin: 0; padding: 20px; }
        .demo-nav { color: white; text-align: center; margin-bottom: 20px; font-family: sans-serif; }
    </style>
</head>
<body>
    <div class="demo-nav">
        <h1>Vista Previa: Selección de Butacas</h1>
        <p>Esta es una previsualización del componente que se cargará en <strong>#app</strong>.</p>
    </div>

    <!-- El contenedor donde se inyecta la SPA -->
    <div id="app">
        <?php include 'app/Vistas/reservas/sala.php'; ?>
    </div>

    <!-- Cargamos la lógica JS -->
    <script src="public/js/reservas.js"></script>
</body>
</html>
