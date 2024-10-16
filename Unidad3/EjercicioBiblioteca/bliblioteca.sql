drop database if exists biblioteca;
create database biblioteca;
use biblioteca;

create table usuarios(
	id varchar(9) primary key,
    ps blob not null,
    tipo enum('A','S') -- A para admin y S para socios
)engine InnoDB; 

insert into usuarios values('admin',sha2('admin',512), 'A'), -- sha2('admin',512)esto lo que hace es cifrar la contraseña
('11111111A',sha2('11111111A',512), 'S'),
('22222222A',sha2('22222222A',512), 'S'),
('333333333A',sha2('333333333A',512), 'S'),
('44444444A',sha2('44444444A',512), 'S'),
('55555555A',sha2('55555555A',512), 'S');


create table socios(
	id int auto_increment primary key,
    nombre varchar(100) not null,
    fechaSancion date default null,
    email varchar(255) not null,
    us varchar(9) not null,
    constraint fk_us foreign key (us) references socios(us) on update cascade on delete restrict
)engine InnoDB; 

insert into socios values (null,'Carlos Concha',null,'carlosconcha@gmail.com','11111111A'),
(null,'Leovigilda Esteban',null,'leovigildaest@gmail.com','22222222A'),
(null,'Merilin Loncha',null,'merilonche@gmail.com','333333333A'),
(null,'Rosa Pepa',null,'rosapepa1@gmail.com','44444444A'),
(null,'Gervasio MalosPelos',205487,'gervasiomalospelos@gmail.com','55555555A');

create table libros(
	id int auto_increment primary key,
    titulo varchar(100) not null,
    ejemplares int not null,
    autor varchar(100) not null
)engine InnoDB; 

insert into libros values (null,'La sombra del viento',0,'Carlos Ruiz Zafrón'),
(null,'El quijote',12,'Cervantes'),
(null,'Redes',5,'Eloy Moreno'),
(null,'Invisible',10,'Eloy Moreno'),
(null,'Terra Alta',3,'Javier Cercas');

create table prestamos(
	id int auto_increment primary key,
    socio int not null,
    libro int not null,
    fechaP date not null, -- Fecha prestamo
    fechaD int not null, -- fechA devolución
	fechaRD date not null, -- fecha real devolución
    constraint fk_socio foreign key (socio) references socios(id) on update cascade on delete restrict,
    constraint fk_libro foreign key (libro) references libros(id) on update cascade on delete restrict
)engine InnoDB; 

insert into prestamos values (null,1,1,20230101,20230115,null),
(null,2,1,20230101,20230115,20230110),
(null,2,3,20244891,202730116,null),
(null,2,1,20230101,20230115,null),
(null,2,3,20230101,20230115,null);



select id from socios 
where id=1;
-- Funcion que comprueba si se puede prestar el libro al socio, devuelve 1 si se puede hacer el prestamo
-- -1 si no hay ejemplares del libro
-- -2 si el socio esta sancionado o el socio no existe 
-- -3 si el socio tiene libros caducados
-- -4 si el socio tiene más de 2 libros prestados

delimiter //

create function comprobarSiPrestar(pSocio int,pLibro int) returns int deterministic
 begin
 
	declare resultado int default 1;
    declare vId int;
    
    -- Comprobar ejemplares
    
    select id into vId from libros
    where id = pLibro and ejemplares >0;
    
		if(vId is null) then
			return -1;
            end if;
            
	-- comprobamos socios
		set vId=null;
		select id into vId from socio
		where id = pSocio and (fechaSancion is null or fechaSancion < curdate());
            
		if(vId is null) then
			return -2;
            end if;
            
            -- chequear si el socio tiene préstamos caducados
            select count(*) into vId from prestamos
            where socio = pSocio and fechaD < curdate() and fechaRD is null;

			if(vId >0) then
			return -3;
            end if;
            
            -- si el socio tiene más de 2 libros prestados
            select count(*) into vId from prestamos
			where socio = pSocio and fechaRD is null;
            
            if(vId >=2) then
			return -4;
            end if;
                
                
                
	return resultado;
 end//
 
delimiter ;

select comprobarSiPrestar(5,1); -- chequea ejemplares 
select comprobarSiPrestar(5,100); -- chequea libro existe
select comprobarSiPrestar(50,2); -- chequea socio
select comprobarSiPrestar(5,2); -- chequea socio
select comprobarSiPrestar(1,2); -- prestamos caducados
select comprobarSiPrestar(2,2); -- Socio con 2 o más préstamos
select comprobarSiPrestar(3,2); -- correcto
select comprobarSiPrestar(4,2); -- correcto 




