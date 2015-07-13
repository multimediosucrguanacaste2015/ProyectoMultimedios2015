CREATE DATABASE  IF NOT EXISTS `multimediosdb2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `multimediosdb2`;
-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: multimediosdb2
-- ------------------------------------------------------
-- Server version	5.6.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Ausencias_Tardias_Escapadas`
--

DROP TABLE IF EXISTS `Ausencias_Tardias_Escapadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ausencias_Tardias_Escapadas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date DEFAULT NULL,
  `Estudiantes_Matriculados_Id` int(11) DEFAULT NULL,
  `Curso_Nivel_Id` int(11) DEFAULT NULL,
  `Justificacion` char(1) DEFAULT NULL,
  `Tipo` char(1) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_Ausencias_Tardias_Escapadas_Estudiantes_Matriculados1_idx` (`Estudiantes_Matriculados_Id`),
  KEY `fk_Ausencias_Tardias_Escapadas_Curso_Nivel1_idx` (`Curso_Nivel_Id`),
  CONSTRAINT `fk_Ausencias_Tardias_Escapadas_Curso_Nivel1` FOREIGN KEY (`Curso_Nivel_Id`) REFERENCES `Curso_Nivel_Profesor` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ausencias_Tardias_Escapadas_Estudiantes_Matriculados1` FOREIGN KEY (`Estudiantes_Matriculados_Id`) REFERENCES `Estudiantes_Matriculados` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ausencias_Tardias_Escapadas`
--

LOCK TABLES `Ausencias_Tardias_Escapadas` WRITE;
/*!40000 ALTER TABLE `Ausencias_Tardias_Escapadas` DISABLE KEYS */;
INSERT INTO `Ausencias_Tardias_Escapadas` VALUES (25,'2015-07-13',2,1,'I','A'),(26,'2015-07-13',1,2,'I','A');
/*!40000 ALTER TABLE `Ausencias_Tardias_Escapadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Curso_Nivel_Profesor`
--

DROP TABLE IF EXISTS `Curso_Nivel_Profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Curso_Nivel_Profesor` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Cursos_Id` int(11) DEFAULT NULL,
  `Niveles_Id` int(11) DEFAULT NULL,
  `Profesores_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_Curso_Nivel_Cursos1_idx` (`Cursos_Id`),
  KEY `fk_Curso_Nivel_Niveles1_idx` (`Niveles_Id`),
  KEY `fk_Curso_Nivel_Profesores1_idx` (`Profesores_Id`),
  CONSTRAINT `fk_Curso_Nivel_Cursos1` FOREIGN KEY (`Cursos_Id`) REFERENCES `Cursos` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Curso_Nivel_Niveles1` FOREIGN KEY (`Niveles_Id`) REFERENCES `Niveles` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Curso_Nivel_Profesores1` FOREIGN KEY (`Profesores_Id`) REFERENCES `Profesores` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Curso_Nivel_Profesor`
--

LOCK TABLES `Curso_Nivel_Profesor` WRITE;
/*!40000 ALTER TABLE `Curso_Nivel_Profesor` DISABLE KEYS */;
INSERT INTO `Curso_Nivel_Profesor` VALUES (1,1,1,3),(2,2,1,2),(3,3,1,3),(4,1,1,1);
/*!40000 ALTER TABLE `Curso_Nivel_Profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cursos`
--

DROP TABLE IF EXISTS `Cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cursos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sigla` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cursos`
--

LOCK TABLES `Cursos` WRITE;
/*!40000 ALTER TABLE `Cursos` DISABLE KEYS */;
INSERT INTO `Cursos` VALUES (1,'If1000','Multimedios'),(2,'If2000','Algoritmos'),(3,'If3000','Programacion 2'),(4,'',''),(5,'','');
/*!40000 ALTER TABLE `Cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Estudiantes`
--

DROP TABLE IF EXISTS `Estudiantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Estudiantes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Carnet` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido1` varchar(45) DEFAULT NULL,
  `Apellido2` varchar(45) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Sexo` char(1) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Estudiantes`
--

LOCK TABLES `Estudiantes` WRITE;
/*!40000 ALTER TABLE `Estudiantes` DISABLE KEYS */;
INSERT INTO `Estudiantes` VALUES (1,'123','victor','centeno','gomez','2015-07-10','M','8899','liberia'),(2,'234','virginia','perez','barrantes','2015-07-01','F','889999','filadelfia'),(3,'456','Paula','Mastroeni','Carvajal','2015-07-11','F','7777','BÂ° La Victoria'),(4,'567','Pedro','Pasos','Vargas','2015-07-11','M','989','Bagaces'),(5,'678','Yanela','Alvarado','Perez','2015-07-11','F','675','Nicoya');
/*!40000 ALTER TABLE `Estudiantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Estudiantes_Matriculados`
--

DROP TABLE IF EXISTS `Estudiantes_Matriculados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Estudiantes_Matriculados` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Año` int(11) NOT NULL,
  `Estudiantes_Id` int(11) DEFAULT NULL,
  `Secciones_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_Estudiantes_Matriculados_Estudiantes_idx` (`Estudiantes_Id`),
  KEY `fk_Estudiantes_Matriculados_Secciones1_idx` (`Secciones_Id`),
  CONSTRAINT `fk_Estudiantes_Matriculados_Estudiantes` FOREIGN KEY (`Estudiantes_Id`) REFERENCES `Estudiantes` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiantes_Matriculados_Secciones1` FOREIGN KEY (`Secciones_Id`) REFERENCES `Secciones` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Estudiantes_Matriculados`
--

LOCK TABLES `Estudiantes_Matriculados` WRITE;
/*!40000 ALTER TABLE `Estudiantes_Matriculados` DISABLE KEYS */;
INSERT INTO `Estudiantes_Matriculados` VALUES (1,0,1,3),(2,0,2,3),(3,0,3,4),(4,0,4,3),(5,0,5,5);
/*!40000 ALTER TABLE `Estudiantes_Matriculados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Niveles`
--

DROP TABLE IF EXISTS `Niveles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Niveles` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Niveles`
--

LOCK TABLES `Niveles` WRITE;
/*!40000 ALTER TABLE `Niveles` DISABLE KEYS */;
INSERT INTO `Niveles` VALUES (1,'Setimo'),(2,'Octavo'),(3,'Noveno'),(4,'Decimo'),(5,'Undecimo'),(6,'Duodecimo');
/*!40000 ALTER TABLE `Niveles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Notas`
--

DROP TABLE IF EXISTS `Notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Notas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Cotidiano` double DEFAULT NULL,
  `Parcial1` double DEFAULT NULL,
  `Parcial2` double DEFAULT NULL,
  `Final` double DEFAULT NULL,
  `Curso_Nivel_Id` int(11) DEFAULT NULL,
  `Estudiantes_Matriculados_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_Notas_Curso_Nivel1_idx` (`Curso_Nivel_Id`),
  KEY `fk_Notas_Estudiantes_Matriculados1_idx` (`Estudiantes_Matriculados_Id`),
  CONSTRAINT `fk_Notas_Curso_Nivel1` FOREIGN KEY (`Curso_Nivel_Id`) REFERENCES `Curso_Nivel_Profesor` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Notas_Estudiantes_Matriculados1` FOREIGN KEY (`Estudiantes_Matriculados_Id`) REFERENCES `Estudiantes_Matriculados` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Notas`
--

LOCK TABLES `Notas` WRITE;
/*!40000 ALTER TABLE `Notas` DISABLE KEYS */;
INSERT INTO `Notas` VALUES (2,100,100,100,100,1,1),(3,100,100,100,50,2,1);
/*!40000 ALTER TABLE `Notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Padres`
--

DROP TABLE IF EXISTS `Padres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Padres` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Cedula` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido1` varchar(45) DEFAULT NULL,
  `Apellido2` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Ocupacion` varchar(45) DEFAULT NULL,
  `Sexo` char(1) DEFAULT NULL,
  `EstadoCivil` char(1) DEFAULT NULL,
  `Estudiantes_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_Padres_Estudiantes1_idx` (`Estudiantes_Id`),
  CONSTRAINT `fk_Padres_Estudiantes1` FOREIGN KEY (`Estudiantes_Id`) REFERENCES `Estudiantes` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Padres`
--

LOCK TABLES `Padres` WRITE;
/*!40000 ALTER TABLE `Padres` DISABLE KEYS */;
INSERT INTO `Padres` VALUES (1,'Madre','3311','Gertrudis','Gomez','Matarrita','liberia','99999','Ama de casa','F',NULL,1),(2,'Tia','444','Juana','Barrantes','Ramirez','Nicoya','7888','Enfermera','F',NULL,2);
/*!40000 ALTER TABLE `Padres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Profesores`
--

DROP TABLE IF EXISTS `Profesores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Profesores` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula` varchar(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido1` varchar(45) NOT NULL,
  `Apellido2` varchar(45) NOT NULL,
  `UserID` varchar(45) NOT NULL,
  `Contraseña` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Profesores`
--

LOCK TABLES `Profesores` WRITE;
/*!40000 ALTER TABLE `Profesores` DISABLE KEYS */;
INSERT INTO `Profesores` VALUES (1,'1111','Jose Luis','Esquivel','Garnier','',''),(2,'2222','Kenneth','Sanchez','Sanchez','',''),(3,'3333','Douglas','Sanchez','Artola','',''),(4,'','','','','','');
/*!40000 ALTER TABLE `Profesores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Secciones`
--

DROP TABLE IF EXISTS `Secciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Secciones` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Seccion_Numero` varchar(45) NOT NULL,
  `Niveles_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_Secciones_Niveles1_idx` (`Niveles_Id`),
  CONSTRAINT `fk_Secciones_Niveles1` FOREIGN KEY (`Niveles_Id`) REFERENCES `Niveles` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Secciones`
--

LOCK TABLES `Secciones` WRITE;
/*!40000 ALTER TABLE `Secciones` DISABLE KEYS */;
INSERT INTO `Secciones` VALUES (3,'7-1',1),(4,'7-2',1),(5,'8-1',2);
/*!40000 ALTER TABLE `Secciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` varchar(45) NOT NULL,
  `Contrasena` varchar(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido1` varchar(45) NOT NULL,
  `Apellido2` varchar(45) NOT NULL,
  `Tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
INSERT INTO `Usuarios` VALUES (1,'123','123','','','','');
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-13 17:32:56
