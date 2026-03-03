-- 1.- Seleccionamos la base de datos
use examenud4ampliado;

-- 2.- Creamos la tabla usuarios
-- create table empleados(
-- empleado varchar(20) primary key,
-- pass varchar(64) not null
-- );

-- 3.- Creamos un par de emplesados de prueba, vamos a utilizar sha256
-- Para guardar las contraseñas, en realidad guardamos el hash.
insert into empleados select NULL, 'administradora' , sha2('secreto',256);
insert into empleados select NULL, 'gestora' , sha2('password',256);