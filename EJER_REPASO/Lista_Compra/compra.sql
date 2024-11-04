CREATE DATABASE listaCompras;
use listaCompras;

CREATE TABLE COMPRA(
    id int primary key,
    producto varchar(50) not null,
    tipo varchar(50) not null,
    fechaLimite date not null,
    dinero int
);