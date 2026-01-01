-- Tabla para las sesiones de cine
CREATE TABLE sesiones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pelicula_id INT NOT NULL,
    sala VARCHAR(50) NOT NULL,
    hora DATETIME NOT NULL
);

-- Tabla para las reservas de los usuarios
CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    sesion_id INT NOT NULL,
    butacas_json TEXT NOT NULL, -- Guardará el array de butacas como JSON (ej: ["A1", "A2"])
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sesion_id) REFERENCES sesiones(id)
);

-- DATOS DE PRUEBA
INSERT INTO sesiones (pelicula_id, sala, hora) VALUES (1, 'SALA 1 VIP', '2025-01-01 20:00:00');
INSERT INTO reservas (usuario_id, sesion_id, butacas_json) VALUES (1, 1, '["B15", "B16"]');
