-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema unistmocalificaciones
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema unistmocalificaciones
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `unistmocalificaciones` DEFAULT CHARACTER SET latin1 ;
USE `unistmocalificaciones` ;

-- -----------------------------------------------------
-- Table `unistmocalificaciones`.`alumnos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unistmocalificaciones`.`alumnos` (
  `idAlumno` VARCHAR(10) NOT NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellidoPaterno` VARCHAR(45) NULL DEFAULT NULL,
  `apellidoMaterno` VARCHAR(45) NULL DEFAULT NULL,
  `telefono` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `licenciatura` VARCHAR(45) NULL DEFAULT 'Informatica',
  `semestre` VARCHAR(45) NULL DEFAULT NULL,
  `grupo` VARCHAR(45) NULL DEFAULT NULL,
  `estado` VARCHAR(45) NULL DEFAULT 'cursando',
  PRIMARY KEY (`idAlumno`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `unistmocalificaciones`.`calificaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unistmocalificaciones`.`calificaciones` (
  `idcalificaciones` VARCHAR(5) NOT NULL,
  `1ºparcial` DOUBLE NULL DEFAULT NULL,
  `2ºparcial` DOUBLE NULL DEFAULT NULL,
  `3ºparcial` DOUBLE NULL DEFAULT NULL,
  `ordinario` DOUBLE NULL DEFAULT NULL,
  `1ºextraordinario` DOUBLE NULL DEFAULT NULL,
  `2ºextraordinario` DOUBLE NULL DEFAULT NULL,
  `especial` DOUBLE NULL DEFAULT NULL,
  `promedio` DOUBLE NULL DEFAULT NULL,
  PRIMARY KEY (`idcalificaciones`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

ALTER TABLE `unistmocalificaciones`.`calificaciones` 
CHANGE COLUMN `idcalificaciones` `idcalificaciones` VARCHAR(45) NOT NULL

-- -----------------------------------------------------
-- Table `unistmocalificaciones`.`materias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unistmocalificaciones`.`materias` (
  `idmaterias` INT(11) NOT NULL,
  `nombreMateria` VARCHAR(45) NULL DEFAULT NULL,
  `idSemestre` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idmaterias`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- select *from maestro;
-- select * from cuentas; 


-- select * from materias;

-- select usuario from cuentas where idMaestro=164;
-- -----------------------------------------------------
-- Table `unistmocalificaciones`.`alumno_calificacion_materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unistmocalificaciones`.`alumno_calificacion_materia` (
  `idAlumno` VARCHAR(10) NULL DEFAULT NULL,
  `idMaterias` INT(11) NULL DEFAULT NULL,
  `idCalificaciones` VARCHAR(5) NULL DEFAULT NULL,
  INDEX `idAlumno_idx` (`idAlumno` ASC),
  INDEX `idCalificaciones` (`idCalificaciones` ASC),
  INDEX `idMaterias` (`idMaterias` ASC),
  CONSTRAINT `idAlumno`
    FOREIGN KEY (`idAlumno`)
    REFERENCES `unistmocalificaciones`.`alumnos` (`idAlumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idCalificaciones`
    FOREIGN KEY (`idCalificaciones`)
    REFERENCES `unistmocalificaciones`.`calificaciones` (`idcalificaciones`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idMaterias`
    FOREIGN KEY (`idMaterias`)
    REFERENCES `unistmocalificaciones`.`materias` (`idmaterias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;



ALTER TABLE `unistmocalificaciones`.`alumno_calificacion_materia` 
DROP FOREIGN KEY `idCalificaciones`;
ALTER TABLE `unistmocalificaciones`.`alumno_calificacion_materia` 
CHANGE COLUMN `idCalificaciones` `idCalificaciones` VARCHAR(45) NULL DEFAULT NULL ;
ALTER TABLE `unistmocalificaciones`.`alumno_calificacion_materia` 
ADD CONSTRAINT `idCalificaciones`
  FOREIGN KEY (`idCalificaciones`)
  REFERENCES `unistmocalificaciones`.`calificaciones` (`idcalificaciones`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;
  
-- -----------------------------------------------------
-- Table `unistmocalificaciones`.`maestro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unistmocalificaciones`.`maestro` (
  `idmaestro` VARCHAR(10) NOT NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellidoPaterno` VARCHAR(45) NULL DEFAULT NULL,
  `apellidoMaterno` VARCHAR(45) NULL DEFAULT NULL,
  `telefono` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `titulo` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idmaestro`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `unistmocalificaciones`.`cuentas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unistmocalificaciones`.`cuentas` (
  `usuario` VARCHAR(20) NOT NULL,
  `contraseña` VARCHAR(15) NULL DEFAULT NULL,
  `idAlumno` VARCHAR(10) NULL DEFAULT NULL,
  `idMaestro` VARCHAR(3) NULL DEFAULT NULL,
  PRIMARY KEY (`usuario`),
  INDEX `matricula_idx` (`idAlumno` ASC),
  INDEX `nomina_idx` (`idMaestro` ASC),
  CONSTRAINT `matricula`
    FOREIGN KEY (`idAlumno`)
    REFERENCES `unistmocalificaciones`.`alumnos` (`idAlumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `nomina`
    FOREIGN KEY (`idMaestro`)
    REFERENCES `unistmocalificaciones`.`maestro` (`idmaestro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `unistmocalificaciones`.`maestro_materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unistmocalificaciones`.`maestro_materia` (
  `idMaestro` VARCHAR(10) NULL DEFAULT NULL,
  `idMateria` INT(11) NULL DEFAULT NULL,
  `cicloEscolar` VARCHAR(45) NULL DEFAULT NULL,
  INDEX `idMateria_idx` (`idMateria` ASC),
  INDEX `idMaestro` (`idMaestro` ASC),
  CONSTRAINT `idMaestro`
    FOREIGN KEY (`idMaestro`)
    REFERENCES `unistmocalificaciones`.`maestro` (`idmaestro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idMateria`
    FOREIGN KEY (`idMateria`)
    REFERENCES `unistmocalificaciones`.`materias` (`idmaterias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8011', 'Diseño estructurado de algoritmos', '1');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8012', 'Administración', '1');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8013', 'Lógica Matemática', '1');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8014', 'Historia del pensamiento Filosófico', '1');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8015', 'Matemáticas I', '1');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8021', 'Programación Estructurada', '2');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8022', 'Electrónica I', '2');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8023', 'Matemáticas discretas', '2');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8024', 'Teoría general de sistemas', '2');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8025', 'Matemáticas II', '2');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8031', 'Estructura de datos', '3');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8032', 'Electrónica II', '3');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8033', 'Derecho y legislación en informática', '3');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8034', 'Contabilidad', '3');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8035', 'Álgebra lineal', '3');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8041', 'Paradigmas de programación', '4');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8042', 'Diseño web', '4');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8043', 'Base de datos I', '4');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8044', 'Programación de sistemas', '4');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8045', 'Metodos numéricos', '4');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8051', 'Paradigmas de programacion II', '5');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8052', 'Ingeniería de software I', '5');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8053', 'Base de datos II', '5');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8054', 'Arquitectura de computadoras', '5');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8055', 'Redes I', '5');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8061', 'Tecnologías web I', '6');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8062', 'Ingeniería de software II', '6');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8063', 'Programación Visual', '6');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8064', 'Sistemas Operativos I', '6');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8065', 'Redes II', '6');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8071', 'Tecnologías web II', '7');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8072', 'Proyectos de tecnologías de información', '7');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8073', 'Base de datos distribuidas', '7');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8074', 'Sistemas operativos II', '7');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8075', 'Estadística', '7');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8081', 'Sistemas distribuidos', '8');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8082', 'Calidad de software', '8');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8083', 'Interacción Humano-Computadora', '8');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8084', 'Organización de centros de informática', '8');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8085', 'Investigación de operaciones', '8');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8091', 'Metodología de la investigación', '9');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8092', 'Seguridad en centros de informática', '9');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8093', 'Teoría de algoritmos', '9');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8094', 'Administración de negocios I', '9');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8095', 'Tecnologías de información I', '9');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8096', 'Sistemas de información I', '9');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8097', 'Inteligencia artificial I', '9');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8098', 'Matemáticas aplicadas I', '9');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8101', 'Seminario de tesis', '10');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8102', 'Auditoría de sistemas', '10');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8103', 'Función informática', '10');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8104', 'Administración de negocios II', '10');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8105', 'Tecnologías de información II', '10');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8106', 'Sistemas de información II', '10');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8107', 'Inteligencia artificial II', '10');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8108', 'Matemáticas aplicadas II', '10');
INSERT INTO `unistmocalificaciones`.`materias` (`idmaterias`, `nombreMateria`, `idSemestre`) VALUES ('8109', 'Inglés', '0');


/*
	 `usuario` VARCHAR(20) NOT NULL,
  `contraseña` VARCHAR(15) NULL DEFAULT NULL,
  `idAlumno` VARCHAR(10) NULL DEFAULT NULL,
  `idMaestro` VARCHAR(3) NULL DEFAULT NULL,

*/


 /*DELIMITER |

CREATE TRIGGER InsertaCuentaP AFTER INSERT ON maestro
  FOR EACH ROW BEGIN
    insert into cuentas (usuario,contraseña,idAlumno,idMaestro) values(new.idmaestro, new.idmaestro, null,new.idmaestro); 
  END
|

DELIMITER ;

show triggers;
DROP TRIGGER InsertaCuentaP;

select * from maestro;

select * from cuentas;



-- ---------------------
*/

CREATE TABLE `unistmocalificaciones`.`bitacoraprofesores` (
  `Id` INT NOT NULL,
  `Movimiento` VARCHAR(45) NULL,
  `Nomina` VARCHAR(45) NULL,
  `Nombre` VARCHAR(45) NULL,
  `fecha` DATE NULL,
  `errorl` VARCHAR(45) NULL,
  PRIMARY KEY (`Id`));


ALTER TABLE `unistmocalificaciones`.`bitacoraprofesores` 
CHANGE COLUMN `Id` `Id` INT(11) NOT NULL AUTO_INCREMENT ;

-- -----------------------
/*

DELIMITER |

CREATE TRIGGER ValidaMaestro before INSERT ON maestro
  FOR EACH ROW BEGIN
	if new.idmaestro  regexp '[0-9]*' and
    new.nombre  regexp '[a-zA-Z_áéíóúñ\s]*'  
    and new.apellidoPaterno  regexp '[a-zA-Z_áéíóúñ]'  
    and  new.apellidoMaterno  regexp '[a-zA-Z_áéíóúñ]' 
    and new.telefono  regexp '^(1\s*[-\/\.]?)?(\((\d{3})\)|(\d{3}))\s*[-\/\.]?\s*(\d{3})\s*[-\/\.]?\s*(\d{4})\s*(([xX]|[eE][xX][tT])\.?\s*(\d+))*$' 
    and new.email  regexp '^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$' 
    and new.titulo  regexp '[a-zA-Z]*'  then
		insert into maestro values(new.idmaestro,new.nombre,new.apellidoPaterno,new.apellidoMaterno,new.telefono,new.email,new.titulo);
	else 
		insert into bitacoraprofesores (Id,Movimiento,Nomina,Nombre,fecha,errorl) values(null, 'Insert', New.idmaestro,New.nombre,date(now()), 'Error');
        
    end if;
    END
|
DELIMITER ;

insert into maestro values ('852', 'Oscar Alonso', 'De la rosa', 'Aguilar', 'ffff', 'osc@hotmail.com', 'M.C');


show triggers;

drop trigger ValidaMaestro;

select * from bitacoraprofesores;

select * from cuentas;

select * from maestro;



/*
   else if new.nombre not regexp '[a-zA-Z_áéíóúñ\s]*' then
    
    
    
    
    
		insert into bitacoraprofesores (Id,Movimiento,Nomina,Nombre,fecha,errorl) values(null, 'Insert', New.idmaestro,New.nombre,date(now()), 'Error en nombre');
	else if new.apellidoPaterno not regexp '[a-zA-Z_áéíóúñ]'  or new.apellidoMaterno not regexp '[a-zA-Z_áéíóúñ]' then
		insert into bitacoraprofesores (Id,Movimiento,Nomina,Nombre,fecha,errorl) values(null, 'Insert', New.idmaestro,New.nombre,date(now()), 'Error en apellidos');
    elseif new.telefono not regexp '^(1\s*[-\/\.]?)?(\((\d{3})\)|(\d{3}))\s*[-\/\.]?\s*(\d{3})\s*[-\/\.]?\s*(\d{4})\s*(([xX]|[eE][xX][tT])\.?\s*(\d+))*$' then
		insert into bitacoraprofesores (Id,Movimiento,Nomina,Nombre,fecha,errorl) values(null, 'Insert', New.idmaestro,New.nombre,date(now()), 'Error en telefono');
    else if new.email not regexp '^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$' then
		insert into bitacoraprofesores (Id,Movimiento,Nomina,Nombre,fecha,errorl) values(null, 'Insert', New.idmaestro,New.nombre,date(now()), 'Error en email');
	elseif new.titulo not regexp '[a-zA-Z]*'  then
		insert into bitacoraprofesores (Id,Movimiento,Nomina,Nombre,fecha,errorl) values(null, 'Insert', New.idmaestro,New.nombre,date(now()), 'Error en titulo');
    else
    
*/




-- ------------------
/*

 DELIMITER |

CREATE TRIGGER InsertaCuentaA AFTER INSERT ON alumnos
  FOR EACH ROW BEGIN
    insert into cuentas (usuario,contraseña,idAlumno,idMaestro) values(new.idAlumno, new.idAlumno, new.idAlumno,null); 
  END
|

DELIMITER ;

show triggers;

DROP TRIGGER InsertaCuentaA;

select * from alumnos;

select * from cuentas;



-- ---------------------
*/

CREATE TABLE `unistmocalificaciones`.`archivos` (
  `idarchivos` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idarchivos`));



ALTER TABLE `unistmocalificaciones`.`materias` 
ADD COLUMN `carrera` VARCHAR(45) NULL AFTER `asignado`;


ALTER TABLE `unistmocalificaciones`.`archivos` 
CHANGE COLUMN `nombre` `nombre` VARCHAR(100) NULL DEFAULT NULL ,
CHANGE COLUMN `descripcion` `descripcion` VARCHAR(300) NULL DEFAULT NULL ,
ADD COLUMN `carrera` VARCHAR(45) NULL AFTER `descripcion`;



ALTER TABLE `unistmocalificaciones`.`cuentas` 
ADD COLUMN `administrador` VARCHAR(2) NULL AFTER `idMaestro`;


ALTER TABLE `unistmocalificaciones`.`maestro` 
ADD COLUMN `licenciatura` VARCHAR(45) NULL AFTER `titulo`;

*******************************************************************
 DELIMITER |

CREATE TRIGGER `unistmocalificaciones`.`alumno_calificacion_materia_AFTER_DELETE` AFTER DELETE ON `alumno_calificacion_materia` FOR EACH ROW
BEGIN
delete from calificaciones where calificaciones.idcalificaciones=old.idCalificaciones;
END
|

DELIMITER ;



*******************************************************************
 DELIMITER |
CREATE  TRIGGER `unistmocalificaciones`.`alumnos_BEFORE_DELETE` BEFORE DELETE ON `alumnos` FOR EACH ROW
BEGIN
	delete from alumno_calificacion_materia where alumno_calificacion_materia.idAlumno=old.idAlumno;
    delete from cuentas where cuentas.idAlumno=old.idAlumno;
	
END
|

DELIMITER ;

*******************************************************************



 DELIMITER |
 
CREATE  TRIGGER `unistmocalificaciones`.`alumnos_BEFORE_INSERT` BEFORE INSERT ON `alumnos` FOR EACH ROW
BEGIN
IF (NEW.telefono REGEXP '^(\\+?[0-9]{1,4}-)?[0-9]{3,10}$' ) = 0 and (NEW.email REGEXP '^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$' )= 0 and (new.nombre REGEXP '^[^0-9]+$')=0 and (new.apellidoPaterno REGEXP '^[^0-9]+$')=0 and (new.apellidoMaterno REGEXP '^[^0-9]+$')=0 and (new.licenciatura REGEXP '^[^0-9]+$')=0 and (new.estado REGEXP '^[^0-9]+$') = 0 
and (new.semestre REGEXP '[1-9]|10')=0 and (new.idAlumno REGEXP '^[0-9]{10}$')=0 and (new.grupo REGEXP '[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9]')=0 
THEN 
  SIGNAL SQLSTATE '45000'
     SET MESSAGE_TEXT = 'Incorrecto!!!';
END IF; 


END
|

DELIMITER ;

**********************************************************************************

 DELIMITER |
CREATE  TRIGGER `unistmocalificaciones`.`maestro_BEFORE_DELETE` BEFORE DELETE ON `maestro` FOR EACH ROW
BEGIN
	delete from maestro_materia where idMaestro=old.idmaestro;
    delete from cuentas where cuentas.idMaestro=old.idmaestro;
	
END
|

DELIMITER ;



 DELIMITER |
CREATE  TRIGGER `unistmocalificaciones`.`materia_DELETE` AFTER DELETE ON `maestro_materia` FOR EACH ROW
BEGIN
	    update materias set asignado='false' where idmaterias=old.idMateria;
	
END
|

DELIMITER ;

/*
delete from maestro_materia where idMaestro='124';
delete from materias where idmaterias=(select materias.idmaterias from maestro join maestro_materia 
on maestro.idmaestro=maestro_materia.idMaestro join materias
on maestro_materia.idMateria=materias.idmaterias  
where maestro.idmaestro='124');
delete from cuentas where cuentas.idMaestro='124';
*/





-- show triggers;

-- drop trigger alumno_calificacion_materia_AFTER_DELETE;

-- drop trigger maestro_BEFORE_DELETE;



ALTER TABLE `unistmocalificaciones`.`alumno_calificacion_materia` 
DROP FOREIGN KEY `idMaterias`;
ALTER TABLE `unistmocalificaciones`.`alumno_calificacion_materia` 
ADD CONSTRAINT `idMaterias`
  FOREIGN KEY (`idMaterias`)
  REFERENCES `unistmocalificaciones`.`materias` (`idmaterias`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;
  
  
  
ALTER TABLE `unistmocalificaciones`.`alumno_calificacion_materia` 
DROP FOREIGN KEY `idAlumno`,
DROP FOREIGN KEY `idCalificaciones`;
ALTER TABLE `unistmocalificaciones`.`alumno_calificacion_materia` 
ADD CONSTRAINT `idAlumno`
  FOREIGN KEY (`idAlumno`)
  REFERENCES `unistmocalificaciones`.`alumnos` (`idAlumno`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION,
ADD CONSTRAINT `idCalificaciones`
  FOREIGN KEY (`idCalificaciones`)
  REFERENCES `unistmocalificaciones`.`calificaciones` (`idcalificaciones`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;

/*
select materias.idmaterias from maestro join maestro_materia 
on maestro.idmaestro=maestro_materia.idMaestro join materias
on maestro_materia.idMateria=materias.idmaterias  
where maestro.idmaestro='124';

update materias set asignado='false' 
where carrera=(select licenciatura from maestro where maestro.idmaestro='124');


*/


-- select lecenciatura from maestro where maestro=idmaestro;


-- delete from maestro_materia where idMaestro='123';


insert into maestro values ('693','Juan Gabriel','Ruiz','Ruiz','9711452896','Juan@gmail.com','M.M.I','Informatica');	
insert into cuentas (usuario,contraseña,idMaestro,administrador) values ('693', '693','693','si');
/*

select maestro.idmaestro, nombre,apellidoPaterno,apellidoMaterno,telefono,email,titulo,licenciatura,administrador
from maestro join cuentas
on maestro.idmaestro= cuentas.idMaestro
where maestro.idmaestro='693'; 


select nombre,apellidoPaterno,apellidoMaterno, usuario,contraseña, licenciatura from maestro join cuentas
on maestro.idmaestro= cuentas.idMaestro
where usuario='juan'; */
