CREATE DATABASE IF NOT EXISTS agencia;
USE agencia;

CREATE TABLE IF NOT EXISTS id_hotel (
    id_hotel INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    ubicacion VARCHAR(255) NOT NULL,
    habitaciones_disponibles INT NOT NULL,
    tarifa_noche DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS vuelo (
    id_vuelo INT AUTO_INCREMENT PRIMARY KEY,
    origen VARCHAR(255) NOT NULL,
    destino VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    plazas_disponibles INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS reserva (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    fecha_reserva DATE NOT NULL,
    id_vuelo INT NOT NULL,
    id_hotel INT NOT NULL,
    FOREIGN KEY (id_vuelo) REFERENCES vuelo(id_vuelo),
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel)
);