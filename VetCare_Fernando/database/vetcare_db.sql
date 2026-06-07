CREATE DATABASE IF NOT EXISTS vetcare_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE vetcare_db;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS mascotas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    especie VARCHAR(80) NOT NULL,
    raza VARCHAR(100),
    edad INT DEFAULT 0,
    propietario VARCHAR(100) NOT NULL,
    telefono VARCHAR(30),
    estado_salud TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO mascotas (nombre, especie, raza, edad, propietario, telefono, estado_salud) VALUES
('Max', 'Perro', 'Labrador', 4, 'Carlos Ramírez', '6671234567', 'Vacunado y en buen estado general.'),
('Mía', 'Gato', 'Siamés', 2, 'Ana López', '6679876543', 'Revisión dental pendiente.'),
('Rocky', 'Perro', 'Bulldog', 5, 'María Torres', '6675551122', 'Control de peso recomendado.');
