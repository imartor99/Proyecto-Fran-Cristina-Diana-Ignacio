<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Entradas</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="cinema-container" style="max-width: 800px; margin: 50px auto; padding: 20px; background: #fff; color: #333; border-radius: 8px;">
        <h2 style="color: #242333;">Historial de Compras</h2>
        
        <?php if (empty($reservas)): ?>
            <p>No tienes reservas registradas.</p>
        <?php else: ?>
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr style="background: #242333; color: white;">
                        <th style="padding: 10px;">ID Reserva</th>
                        <th style="padding: 10px;">Película</th>
                        <th style="padding: 10px;">Asiento</th>
                        <th style="padding: 10px;">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservas as $reserva): ?>
                        <tr style="border-bottom: 1px solid #ccc;">
                            <td style="padding: 10px;"><?= $reserva['id'] ?></td>
                            <td style="padding: 10px;"><?= $reserva['pelicula_id'] ?> (Nombre Pendiente)</td>
                            <td style="padding: 10px;"><?= $reserva['asiento_code'] ?></td>
                            <td style="padding: 10px;"><?= $reserva['fecha_reserva'] ?? 'N/A' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        
        <div style="margin-top: 30px;">
            <a href="index.php?c=reservas&a=index" class="checkout-btn" style="text-decoration:none; display:inline-block; text-align:center;">Volver a reservar</a>
        </div>
    </div>
</body>
</html>
