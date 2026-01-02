const busquedaInput = document.getElementById('buscador');
const generoInput = document.getElementById('filtro-genero');

function filtrarPeliculas() {
    let termino = busquedaInput.value;
    let genero = generoInput.value;

    let formData = new FormData();
    formData.append('busqueda', termino);
    formData.append('genero', genero);

    fetch(URL_BUSCADOR, {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            let contenedor = document.getElementById('contenedor-peliculas');
            contenedor.innerHTML = '';

            if (data.length > 0) {
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
                contenedor.innerHTML = '<div class="col-12"><p class="text-center">No se encontraron películas con esos criterios.</p></div>';
            }
        })
        .catch(error => console.error('Error:', error));
}

busquedaInput.addEventListener('keyup', filtrarPeliculas);
generoInput.addEventListener('change', filtrarPeliculas);
