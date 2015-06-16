SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `proyectomultimedios` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `proyectomultimedios` ;

-- -----------------------------------------------------
-- Table `proyectomultimedios`.`nota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectomultimedios`.`nota` (
  `idnota` INT NOT NULL AUTO_INCREMENT,
  `cotidiano` DOUBLE NULL,
  `parcial1` DOUBLE NULL,
  `parcial2` DOUBLE NULL,
  `final` DOUBLE NULL,
  PRIMARY KEY (`idnota`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyectomultimedios`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectomultimedios`.`curso` (
  `idcurso` INT NOT NULL AUTO_INCREMENT,
  `sigla` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NULL,
  `nota` INT NULL,
  PRIMARY KEY (`idcurso`),
  INDEX `fk_curso_1_idx` (`nota` ASC),
  CONSTRAINT `fk_curso_1`
    FOREIGN KEY (`nota`)
    REFERENCES `proyectomultimedios`.`nota` (`idnota`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyectomultimedios`.`nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectomultimedios`.`nivel` (
  `idnivel` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  `curso` VARCHAR(45) NULL,
  PRIMARY KEY (`idnivel`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyectomultimedios`.`control_ausencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectomultimedios`.`control_ausencia` (
  `idcontrol_ausencia` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NULL,
  `fecha` DATE NULL,
  PRIMARY KEY (`idcontrol_ausencia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyectomultimedios`.`padre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectomultimedios`.`padre` (
  `idpadre` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `estudiante` VARCHAR(45) NULL,
  PRIMARY KEY (`idpadre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyectomultimedios`.`estudiante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectomultimedios`.`estudiante` (
  `idestudiante` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido1` VARCHAR(45) NOT NULL,
  `apellido2` VARCHAR(45) NOT NULL COMMENT '		',
  `carnet` VARCHAR(45) NOT NULL,
  `fecha_nacimiento` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `sexo` VARCHAR(3) NULL,
  `nivel` INT NULL,
  `ausencia` INT NULL,
  `padre` INT NULL,
  PRIMARY KEY (`idestudiante`),
  INDEX `fk_estudiante_1_idx` (`nivel` ASC),
  INDEX `fk_estudiante_2_idx` (`ausencia` ASC),
  INDEX `fk_estudiante_3_idx` (`padre` ASC),
  CONSTRAINT `fk_estudiante_1`
    FOREIGN KEY (`nivel`)
    REFERENCES `proyectomultimedios`.`nivel` (`idnivel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_2`
    FOREIGN KEY (`ausencia`)
    REFERENCES `proyectomultimedios`.`control_ausencia` (`idcontrol_ausencia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_3`
    FOREIGN KEY (`padre`)
    REFERENCES `proyectomultimedios`.`padre` (`idpadre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyectomultimedios`.`nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectomultimedios`.`nivel` (
  `idnivel` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  `curso` VARCHAR(45) NULL,
  PRIMARY KEY (`idnivel`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyectomultimedios`.`profesor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectomultimedios`.`profesor` (
  `idprofesor` INT NOT NULL AUTO_INCREMENT,
  `cedula` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido1` VARCHAR(45) NULL,
  `apellido2` VARCHAR(45) NULL,
  `curso` INT NULL,
  `privilegio` INT NULL,
  PRIMARY KEY (`idprofesor`),
  INDEX `fk_profesor_1_idx` (`curso` ASC),
  CONSTRAINT `fk_profesor_1`
    FOREIGN KEY (`curso`)
    REFERENCES `proyectomultimedios`.`curso` (`idcurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyectomultimedios`.`privilegio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectomultimedios`.`privilegio` (
  `idprivilegio` INT NOT NULL AUTO_INCREMENT,
  `tipo` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idprivilegio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyectomultimedios`.`administrativo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectomultimedios`.`administrativo` (
  `idadministrativo` INT NOT NULL AUTO_INCREMENT,
  `cedula` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido1` VARCHAR(45) NULL,
  `administrativocol` VARCHAR(45) NULL,
  `privilegio` INT NULL,
  PRIMARY KEY (`idadministrativo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyectomultimedios`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectomultimedios`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombre_usuario` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `cedula_usuario` INT NULL,
  `tipo_privilegio` INT NULL,
  `tipo_usuario` INT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_usuario_3_idx` (`tipo_privilegio` ASC),
  INDEX `fk_usuario_2_idx` (`tipo_usuario` ASC),
  CONSTRAINT `fk_usuario_1`
    FOREIGN KEY (`tipo_usuario`)
    REFERENCES `proyectomultimedios`.`profesor` (`idprofesor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_2`
    FOREIGN KEY (`tipo_usuario`)
    REFERENCES `proyectomultimedios`.`administrativo` (`idadministrativo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_3`
    FOREIGN KEY (`tipo_privilegio`)
    REFERENCES `proyectomultimedios`.`privilegio` (`idprivilegio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
