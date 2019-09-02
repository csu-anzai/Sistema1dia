create database db_presupuesto;
use db_presupuesto;

CREATE TABLE Usuario
(
user varchar(25),
clave varchar(120)
);

CREATE TABLE Producto(
id int auto_increment primary key,
nombre varchar(50),
detalle varchar(255),
preciocompra decimal(6,2),
precioventa decimal(6,2),
ganancia decimal(6,2),
foto varchar(200)
);

CREATE TABLE Material
(
id int auto_increment primary key,
nombre varchar(50),
detalle varchar(255),
preciocompra decimal(6,2),
precioventa decimal(6,2),
ganancia decimal(6,2)
);

CREATE TABLE instalacion(
id int auto_increment primary key,
Nombre varchar(100),
precioporunidad decimal(6,2),
Pasaje decimal(6,2)
);

CREATE TABLE Proforma(
id_producto int,
id_instalacion int,
id_materiales int
)