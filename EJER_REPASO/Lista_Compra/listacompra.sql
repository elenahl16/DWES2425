CREATE DATABASE listaCompras;
use listaCompras;

CREATE TABLE COMPRA(

    id int auto_increment primary key,
    producto varchar(50) not null,
    tipo ENUM("ocio","alimentacion","textil") not null,
    fechaLimite date not null,
    dinero float not null
);