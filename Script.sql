--POSTGRESL
CREATE TABLE peliculas(
    cod_pelicula CHAR(5) CONSTRAINT cod_pelicula PRIMARY KEY,
    titulo VARCHAR(40) NOT NULL,
    did INTEGER NOT NULL,
    fecha_produccion DATE,
    genero VARCHAR(10),
    len interval hour to minute 
);

INSERT INTO peliculas VALUES (
    'UP001', 'Snowden', 101, '2016-09-15', 'Suspenso', '134 minutes'
);

--MySQL
CREATE TABLE estudiantes(
	est_codigo INT NOT NULL,
    est_nombre VARCHAR(45) NOT NULL,
    est_apellido VARCHAR(45) NOT NULL,
    est_fecha_nac DATE NOT NULL,
    PRIMARY KEY(est_codigo)
);

INSERT INTO estudiantes VALUES 
(99020712, 'Angelica', 'Lesmes', '1993-01-19'),
(10905263, 'Karen', 'Gelvez', '1999-02-07'),
(11934438, 'Fredy', 'Cortés', '1999-07-14');

SELECT * FROM estudiantes;

CREATE TABLE trabajadores(
	tra_codigo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tra_nombre VARCHAR(50) NOT NULL,
    tra_fec_ing DATE NOT NULL,
    tra_fec_nac DATE NOT NULL,
    tra_cargo VARCHAR(50)
);

INSERT INTO trabajadores VALUES 
(1, 'Arquimedes Gelvez', '2000-02-20','1954-09-07', 'SP'),
(2, 'Richard Mendoza', '2000-02-20', '1980-11-25', 'DOCENTE');

SELECT * FROM trabajadores;

CREATE DATABASE clinicaup;

CREATE TABLE medicos(
    med_codigo MEDIUMINT NOT NULL AUTO_INCREMENT,
    med_cedula INT UNIQUE NOT NULL,
    med_nombre VARCHAR(30) NOT NULL,
    med_apellido_p VARCHAR(25) NOT NULL,
    med_apellido_m VARCHAR(25),
    med_especialidad VARCHAR(50) DEFAULT "Médico General",
    PRIMARY KEY(med_codigo)
);

CREATE TABLE consultorios(
    con_numero INT PRIMARY KEY,
    con_horario CHAR(11),
    con_medico MEDIUMINT
);

ALTER TABLE consultorios ADD CONSTRAINT med_con_fk 
FOREIGN KEY(con_medico) REFERENCES medicos(med_codigo) 
ON DELETE RESTRICT ON UPDATE CASCADE;

INSERT INTO medicos VALUES
(1, 3151356, 'Natalia', 'Almeida', 'Peña', 'Neurólogo'),
(2, 9411339, 'Julian', 'Lopez', 'Lesmes', 'Cirujano');

INSERT INTO consultorios VALUES
(1, '0620-2000', 1),
(2, '1400-2200', 2);

SELECT * FROM medicos;

SELECT * FROM consultorios;

UPDATE medicos set med_nombre = "Julián David" where med_codigo = 2;

DELETE FROM consultorios WHERE con_medico = 2;

--TALLER

CREATE DATABASE db_course;

CREATE TABLE users(
    use_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    use_name VARCHAR(60) NOT NULL,
    use_email VARCHAR(40) NOT NULL,
    use_password VARCHAR(100) NOT NULL
);