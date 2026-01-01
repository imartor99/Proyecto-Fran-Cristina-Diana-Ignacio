document.addEventListener('DOMContentLoaded', () => {
    // Simulamos un ID de sesión y de usuario para Diana (en producción vendrían de la URL/Sesión)
    const sesionId = 1;
    const usuarioId = 1;
    let selectedSeats = [];

    const seatMap = document.getElementById('seat-map');
    const btnConfirmar = document.getElementById('btn-confirmar');
    const selectedSeatsText = document.getElementById('selected-seats-list');
    const totalText = document.getElementById('total-price');

    // Cargar butacas ocupadas
    async function loadOccupation() {
        try {
            const response = await fetch(`/CineApp/reservas/getOcupacion/${sesionId}`);
            if (!response.ok) throw new Error('Servidor no disponible');
            const occupiedSeats = await response.json();
            renderMap(occupiedSeats);
        } catch (error) {
            console.warn('Usando datos de prueba (DB no conectada):', error);
            // Datos de prueba para que Diana pueda ver el mapa funcionando inmediatamente
            renderMap(['B15', 'B16', 'B45', 'B46', 'B47']);
        }
    }

    // Renderizar el mapa de 10x10
    function renderMap(occupiedList) {
        seatMap.innerHTML = '';
        for (let i = 1; i <= 100; i++) {
            const seatId = `B${i}`;
            const seat = document.createElement('div');
            seat.classList.add('seat');
            seat.dataset.id = seatId;

            if (occupiedList.includes(seatId)) {
                seat.classList.add('occupied');
            } else {
                seat.addEventListener('click', () => toggleSeat(seat));
            }

            seatMap.appendChild(seat);
        }
    }

    // Seleccionar/Deseleccionar butaca
    function toggleSeat(seatElement) {
        const seatId = seatElement.dataset.id;

        if (seatElement.classList.contains('selected')) {
            seatElement.classList.remove('selected');
            selectedSeats = selectedSeats.filter(id => id !== seatId);
        } else {
            seatElement.classList.add('selected');
            selectedSeats.push(seatId);
        }

        updateUI();
    }

    // Actualizar resumen
    function updateUI() {
        selectedSeatsText.innerText = selectedSeats.length > 0 ? selectedSeats.join(', ') : '-';
        totalText.innerText = (selectedSeats.length * 8.5).toFixed(2); // 8.50€ por entrada
        btnConfirmar.disabled = selectedSeats.length === 0;
    }

    // Confirmar Reserva
    btnConfirmar.addEventListener('click', async () => {
        const data = {
            usuario_id: usuarioId,
            sesion_id: sesionId,
            butacas: selectedSeats
        };

        try {
            const response = await fetch('/CineApp/reservas/confirmar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.status === 'success') {
                alert('¡Reserva realizada con éxito!');
                location.reload(); // En una SPA real, navegaríamos a 'Mis Entradas'
            } else {
                alert('Error: ' + result.message);
            }
        } catch (error) {
            console.error('Error al confirmar reserva:', error);
            alert('Error de conexión al servidor.');
        }
    });

    // Inicio
    loadOccupation();
});
