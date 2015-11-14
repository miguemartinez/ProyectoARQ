DROP DATABASE IF exists Universidad;
CREATE DATABASE Universidad;
USE Universidad;
DROP TABLE IF EXISTS Comercio;
CREATE TABLE Comercio  (idcomercio int auto_increment,
						nombre varchar(50),
						direccion varchar(50),
						nombre varchar(50),
						correo varchar(50),
						 constraint pk_comercios primary key (idcomercio));
DROP TABLE IF EXISTS Productos;
CREATE TABLE Producto  (idproducto int auto_increment,
						nombre varchar(50),
						precio float,
						Descuento float,
						idcomercio int 
						 constraint pk_productos primary key (idproducto));

