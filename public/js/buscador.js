document.getElementById('buscador').addEventListener('keyup', function() {
    let termino = this.value;
    
    // Si la búsqueda está vacía, podríamos recargar o simplemente dejarlo (el backend maneja vacío devolviendo todo o nada)
    // Aquí asumimos que el backend devuelve todo si está vacío o podemos hacer reload.
    // Para UX rápida, enviaremos petición.

    fetch(RUTA_URL + '/peliculas/buscar', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ busqueda: termino })
    })
    .then(response => response.json())
    .then(data => {
        let contenedor = document.getElementById('contenedor-peliculas');
        contenedor.innerHTML = '';

        if(data.length > 0) {
            data.forEach(pelicula => {
                let html = `
                    <div class="col-md-3 mb-4 pelicula-item">
                        <div class="card h-100">
                            <img src="${RUTA_URL}/img/${pelicula.imagen}" class="card-img-top" alt="${pelicula.titulo}">
                            <div class="card-body">
                                <h5 class="card-title">${pelicula.titulo}</h5>
                                <p class="card-text text-muted">${pelicula.genero}</p>
                                <a href="${RUTA_URL}/peliculas/ficha/${pelicula.id}" class="btn btn-primary btn-block">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                `;
                contenedor.innerHTML += html;
            });
        } else {
            contenedor.innerHTML = '<div class="col-12"><p class="text-center">No se encontraron películas.</p></div>';
        }
    })
    .catch(error => console.error('Error:', error));
});
