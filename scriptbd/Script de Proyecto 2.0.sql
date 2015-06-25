SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `multimedios2.0` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `multimedios2.0` ;

-- -----------------------------------------------------
-- Table `multimedios2.0`.`Estudiantes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `multimedios2.0`.`Estudiantes` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Carnet` VARCHAR(45) NULL ,
  `Nombre` VARCHAR(45) NULL ,
  `Apellido1` VARCHAR(45) NULL ,
  `Apellido2` VARCHAR(45) NULL ,
  `FechaNacimiento` DATE NULL ,
  `Sexo` CHAR NULL ,
  `Telefono` VARCHAR(45) NULL ,
  `Direccion` VARCHAR(45) NULL ,
  PRIMARY KEY (`Id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `multimedios2.0`.`Padres`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `multimedios2.0`.`Padres` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Descripcion` VARCHAR(45) NULL ,
  `Cedula` VARCHAR(45) NULL ,
  `Nombre` VARCHAR(45) NULL ,
  `Apellido1` VARCHAR(45) NULL ,
  `Apellido2` VARCHAR(45) NULL ,
  `Direccion` VARCHAR(45) NULL ,
  `Telefono` VARCHAR(45) NULL ,
  `Ocupacion` VARCHAR(45) NULL ,
  `Sexo` CHAR NULL ,
  `EstadoCivil` CHAR NULL ,
  `Estudiantes_Id` INT NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `fk_Padres_Estudiantes1_idx` (`Estudiantes_Id` ASC) ,
  CONSTRAINT `fk_Padres_Estudiantes1`
    FOREIGN KEY (`Estudiantes_Id` )
    REFERENCES `multimedios2.0`.`Estudiantes` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `multimedios2.0`.`Profesores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `multimedios2.0`.`Profesores` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Cedula` VARCHAR(45) NOT NULL ,
  `Nombre` VARCHAR(45) NOT NULL ,
  `Apellido1` VARCHAR(45) NOT NULL ,
  `Apellido2` VARCHAR(45) NOT NULL ,
  `UserID` VARCHAR(45) NOT NULL ,
  `Contraseña` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`Id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `multimedios2.0`.`Cursos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `multimedios2.0`.`Cursos` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Sigla` VARCHAR(45) NULL ,
  `Nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`Id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `multimedios2.0`.`Niveles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `multimedios2.0`.`Niveles` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`Id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `multimedios2.0`.`Curso_Nivel_Profesor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `multimedios2.0`.`Curso_Nivel_Profesor` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Cursos_Id` INT NULL ,
  `Niveles_Id` INT NULL ,
  `Profesores_Id` INT NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `fk_Curso_Nivel_Cursos1_idx` (`Cursos_Id` ASC) ,
  INDEX `fk_Curso_Nivel_Niveles1_idx` (`Niveles_Id` ASC) ,
  INDEX `fk_Curso_Nivel_Profesores1_idx` (`Profesores_Id` ASC) ,
  CONSTRAINT `fk_Curso_Nivel_Cursos1`
    FOREIGN KEY (`Cursos_Id` )
    REFERENCES `multimedios2.0`.`Cursos` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Curso_Nivel_Niveles1`
    FOREIGN KEY (`Niveles_Id` )
    REFERENCES `multimedios2.0`.`Niveles` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Curso_Nivel_Profesores1`
    FOREIGN KEY (`Profesores_Id` )
    REFERENCES `multimedios2.0`.`Profesores` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `multimedios2.0`.`Secciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `multimedios2.0`.`Secciones` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Seccion_Numero` VARCHAR(45) NOT NULL ,
  `Niveles_Id` INT NOT NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `fk_Secciones_Niveles1_idx` (`Niveles_Id` ASC) ,
  CONSTRAINT `fk_Secciones_Niveles1`
    FOREIGN KEY (`Niveles_Id` )
    REFERENCES `multimedios2.0`.`Niveles` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `multimedios2.0`.`Estudiantes_Matriculados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `multimedios2.0`.`Estudiantes_Matriculados` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Año` INT NOT NULL ,
  `Estudiantes_Id` INT NULL ,
  `Secciones_Id` INT NOT NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `fk_Estudiantes_Matriculados_Estudiantes_idx` (`Estudiantes_Id` ASC) ,
  INDEX `fk_Estudiantes_Matriculados_Secciones1_idx` (`Secciones_Id` ASC) ,
  CONSTRAINT `fk_Estudiantes_Matriculados_Estudiantes`
    FOREIGN KEY (`Estudiantes_Id` )
    REFERENCES `multimedios2.0`.`Estudiantes` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiantes_Matriculados_Secciones1`
    FOREIGN KEY (`Secciones_Id` )
    REFERENCES `multimedios2.0`.`Secciones` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `multimedios2.0`.`Notas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `multimedios2.0`.`Notas` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Cotidiano` DOUBLE NULL ,
  `Parcial1` DOUBLE NULL ,
  `Parcial2` DOUBLE NULL ,
  `Final` DOUBLE NULL ,
  `Curso_Nivel_Id` INT NULL ,
  `Estudiantes_Matriculados_Id` INT NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `fk_Notas_Curso_Nivel1_idx` (`Curso_Nivel_Id` ASC) ,
  INDEX `fk_Notas_Estudiantes_Matriculados1_idx` (`Estudiantes_Matriculados_Id` ASC) ,
  CONSTRAINT `fk_Notas_Curso_Nivel1`
    FOREIGN KEY (`Curso_Nivel_Id` )
    REFERENCES `multimedios2.0`.`Curso_Nivel_Profesor` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Notas_Estudiantes_Matriculados1`
    FOREIGN KEY (`Estudiantes_Matriculados_Id` )
    REFERENCES `multimedios2.0`.`Estudiantes_Matriculados` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `multimedios2.0`.`Ausencias_Tardias_Escapadas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `multimedios2.0`.`Ausencias_Tardias_Escapadas` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Fecha` DATE NOT NULL ,
  `Estudiantes_Matriculados_Id` INT NULL ,
  `Curso_Nivel_Id` INT NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `fk_Ausencias_Tardias_Escapadas_Estudiantes_Matriculados1_idx` (`Estudiantes_Matriculados_Id` ASC) ,
  INDEX `fk_Ausencias_Tardias_Escapadas_Curso_Nivel1_idx` (`Curso_Nivel_Id` ASC) ,
  CONSTRAINT `fk_Ausencias_Tardias_Escapadas_Estudiantes_Matriculados1`
    FOREIGN KEY (`Estudiantes_Matriculados_Id` )
    REFERENCES `multimedios2.0`.`Estudiantes_Matriculados` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ausencias_Tardias_Escapadas_Curso_Nivel1`
    FOREIGN KEY (`Curso_Nivel_Id` )
    REFERENCES `multimedios2.0`.`Curso_Nivel_Profesor` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `multimedios2.0`.`Usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `multimedios2.0`.`Usuarios` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `UserID` VARCHAR(45) NOT NULL ,
  `Contraseña` VARCHAR(45) NOT NULL ,
  `Nombre` VARCHAR(45) NOT NULL ,
  `Apellido1` VARCHAR(45) NOT NULL ,
  `Apellido2` VARCHAR(45) NOT NULL ,
  `Tipo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`Id`) )
ENGINE = InnoDB;

USE `multimedios2.0` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
