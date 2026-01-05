<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen de Compra</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="cinema-container" style="max-width: 600px; margin: 50px auto; padding: 20px; background: #fff; color: #333; border-radius: 8px;">
        <h2 style="color: #242333;">Resumen de Compra</h2>
        
        <?php if (empty($carrito)): ?>
            <p>Tu carrito está vacío.</p>
            <a href="index.php?c=reservas&a=index" class="checkout-btn" style="text-decoration:none; display:inline-block; text-align:center;">Volver a la cartelera</a>
        <?php else: ?>
            <p>Has seleccionado los siguientes asientos:</p>
            <ul style="list-style: none; padding: 0;">
                <?php foreach ($carrito as $asiento): ?>
                    <li style="background: #f0f0f0; margin: 5px 0; padding: 10px; border-radius: 4px;">
                        Asiento: <strong><?= $asiento ?></strong>
                    </li>
                <?php endforeach; ?>
            </ul>
            
            <hr>
            <h3>Total: $<?= $total ?></h3>
            
            <div style="margin-top: 20px;">
                <a href="index.php?c=reservas&a=confirmar" class="checkout-btn" style="text-decoration:none; display:inline-block; text-align:center;">Confirmar Compra</a>
            </div>
            <div style="margin-top: 10px;">
                 <a href="index.php?c=reservas&a=index" style="color: #777;">Cancelar</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
