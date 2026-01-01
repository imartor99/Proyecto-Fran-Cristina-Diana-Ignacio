<div class="booking-container">
    <div class="screen-container">
        <div class="screen"></div>
        <p class="screen-text">PANTALLA</p>
    </div>

    <div class="legend">
        <div class="legend-item"><div class="seat available"></div><span>Libre</span></div>
        <div class="legend-item"><div class="seat selected"></div><span>Seleccionada</span></div>
        <div class="legend-item"><div class="seat occupied"></div><span>Ocupada</span></div>
    </div>

    <div id="seat-map" class="seat-map">
        <!-- Las butacas se generarán con JS -->
    </div>

    <div class="booking-summary">
        <h3>Resumen de Reserva</h3>
        <p>Butacas seleccionadas: <span id="selected-seats-list">-</span></p>
        <p>Total: <span id="total-price">0.00</span>€</p>
        <button id="btn-confirmar" class="btn-confirmar" disabled>Confirmar Reserva</button>
    </div>
</div>
