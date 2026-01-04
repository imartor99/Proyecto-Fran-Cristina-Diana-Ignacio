<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Asientos</title>
    <!-- Vinculamos el CSS para estilos profesionales -->
    <link rel="stylesheet" href="public/css/style.css">
    <!-- Google Fonts para un look más moderno -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="cinema-container">
    <h2>Selecciona tu asiento</h2>

    <!-- Leyenda de colores -->
    <ul class="showcase">
        <li>
            <div class="seat"></div>
            <small>Disponible</small>
        </li>
        <li>
            <div class="seat selected"></div>
            <small>Seleccionado</small>
        </li>
        <li>
            <div class="seat occupied"></div>
            <small>Ocupado</small>
        </li>
    </ul>

    <!-- Pantalla -->
    <div class="screen-container">
        <div class="screen"></div>
        <p class="screen-text">PANTALLA</p>
    </div>

    <!-- Contenedor de asientos -->
    <div class="row-container">
        <?php
        $rows = ['A', 'B', 'C', 'D', 'E', 'F'];
        $cols = 8;
        
        foreach ($rows as $row) {
            echo '<div class="row">';
            for ($i = 1; $i <= $cols; $i++) {
                $seatId = $row . '-' . $i;
                // Simulación de asientos ocupados (puedes conectar esto con tu BD)
                $isOccupied = (rand(0, 10) > 8) ? 'occupied' : ''; 
                echo '<div class="seat ' . $isOccupied . '" data-seat="' . $seatId . '"></div>';
            }
            echo '</div>';
        }
        ?>
    </div>

    <p class="text">
        Has seleccionado <span id="count">0</span> asientos por un precio de $<span id="total">0</span>
    </p>

    <button id="btn-reservar" class="checkout-btn" disabled>Reservar</button>

</div>

<script>
    const container = document.querySelector('.row-container');
    const seats = document.querySelectorAll('.row .seat:not(.occupied)');
    const count = document.getElementById('count');
    const total = document.getElementById('total');
    const btnReservar = document.getElementById('btn-reservar');
    
    // Precio del ticket
    const ticketPrice = 10;

    // Actualiza el total y cuenta
    function updateSelectedCount() {
        const selectedSeats = document.querySelectorAll('.row .seat.selected');
        const selectedSeatsCount = selectedSeats.length;

        count.innerText = selectedSeatsCount;
        total.innerText = selectedSeatsCount * ticketPrice;

        // Habilitar o deshabilitar botón reservar
        if (selectedSeatsCount > 0) {
            btnReservar.removeAttribute('disabled');
        } else {
            btnReservar.setAttribute('disabled', 'true');
        }
    }

    // Evento click en asiento
    container.addEventListener('click', e => {
        if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
            e.target.classList.toggle('selected');
            updateSelectedCount();
        }
    });

    // Evento reservar
    btnReservar.addEventListener('click', () => {
        const selectedSeats = document.querySelectorAll('.row .seat.selected');
        const seatIds = Array.from(selectedSeats).map(seat => seat.getAttribute('data-seat'));

        if (seatIds.length === 0) return;

        // Enviar a backend
        // Nota: Esto envía el primer asiento para mantener compatibilidad con el código anterior,
        // pero idealmente deberías ajustar el backend para recibir un array.
        // Simulamos envío del primero por ahora o un loop.
        
        // Aquí hacemos un fetch por cada asiento o uno masivo. Para este ejemplo, uno masivo sería mejor, 
        // pero mantendremos la lógica simple del fetch anterior iterando o ajustando.
        
        // Vamos a enviar toda la lista como string separado por comas o JSON
        const seatsString = seatIds.join(',');

        fetch("index.php?c=reservas&a=guardar", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "asiento=" + encodeURIComponent(seatsString)
        })
        .then(res => res.json())
        .then(data => {
            if (data.ok) {
                alert("Asientos reservados: " + seatsString + " 🎟️");
                // Recargar para ver cambios (o marcar como ocupados visualmente)
                location.reload();
            } else {
                alert("Error al reservar");
            }
        })
        .catch(err => {
            console.error(err);
             // Fallback para demo si no hay backend real respondiendo JSON correcto
             alert("Error de conexión o backend");
        });
    });
</script>

</body>
</html>

