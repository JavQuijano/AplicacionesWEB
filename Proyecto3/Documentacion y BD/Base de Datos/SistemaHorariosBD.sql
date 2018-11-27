CREATE DATABASE  IF NOT EXISTS `web_model` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `web_model`;
-- MySQL dump 10.13  Distrib 5.7.23, for osx10.9 (x86_64)
--
-- Host: localhost    Database: web_model
-- ------------------------------------------------------
-- Server version	5.7.23

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
-- Table structure for table `Acceso`
--

DROP TABLE IF EXISTS `Acceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Acceso` (
  `ultimaConeccion` datetime NOT NULL,
  `intentos` int(2) NOT NULL,
  `Usuarios_ClvUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Usuarios_ClvUsuarios`),
  CONSTRAINT `fk_Acceso_Usuarios1` FOREIGN KEY (`Usuarios_ClvUsuarios`) REFERENCES `Usuarios` (`ClvUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Acceso`
--

LOCK TABLES `Acceso` WRITE;
/*!40000 ALTER TABLE `Acceso` DISABLE KEYS */;
INSERT INTO `Acceso` VALUES ('2018-11-27 10:20:00',0,1),('2018-11-27 10:19:22',0,2),('2018-11-26 21:44:33',0,3),('2018-11-26 13:19:53',0,4),('2018-11-26 15:25:44',0,5);
/*!40000 ALTER TABLE `Acceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Bitacora`
--

DROP TABLE IF EXISTS `Bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bitacora` (
  `tarea` varchar(50) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `FechaHora` datetime NOT NULL,
  `detalles` varchar(200) NOT NULL,
  `idModulo` int(11) NOT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  KEY `fk_Bitacora_Modulo1` (`idModulo`),
  KEY `fk_Bitacora_Usuarios1` (`Usuarios_idUsuarios`),
  CONSTRAINT `fk_Bitacora_Modulo1` FOREIGN KEY (`idModulo`) REFERENCES `Modulo` (`idModulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Bitacora_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `Usuarios` (`ClvUsuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bitacora`
--

LOCK TABLES `Bitacora` WRITE;
/*!40000 ALTER TABLE `Bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `Bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Clases`
--

DROP TABLE IF EXISTS `Clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Clases` (
  `ClvSalon` int(11) NOT NULL,
  `HoraInicio` char(5) NOT NULL,
  `Materia` varchar(45) NOT NULL,
  `HoraFin` char(5) NOT NULL,
  KEY `ClvSalon` (`ClvSalon`),
  CONSTRAINT `ClvSalon` FOREIGN KEY (`ClvSalon`) REFERENCES `Salon` (`ClvSalon`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Clases`
--

LOCK TABLES `Clases` WRITE;
/*!40000 ALTER TABLE `Clases` DISABLE KEYS */;
INSERT INTO `Clases` VALUES (1,'12:00','Topologia','14:00'),(5,'15:00','Español','17:00'),(5,'15:00','Español2','16:00'),(2,'13:00','Clase','15:00');
/*!40000 ALTER TABLE `Clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Favoritos`
--

DROP TABLE IF EXISTS `Favoritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Favoritos` (
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `Salon_idSalon` int(11) NOT NULL,
  KEY `fk_Usuarios_has_Salon_Usuarios1` (`Usuarios_idUsuarios`),
  KEY `fk_Usuarios_has_Salon_Salon1` (`Salon_idSalon`),
  CONSTRAINT `fk_Usuarios_has_Salon_Salon1` FOREIGN KEY (`Salon_idSalon`) REFERENCES `Salon` (`ClvSalon`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuarios_has_Salon_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `Usuarios` (`ClvUsuarios`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Favoritos`
--

LOCK TABLES `Favoritos` WRITE;
/*!40000 ALTER TABLE `Favoritos` DISABLE KEYS */;
INSERT INTO `Favoritos` VALUES (2,1),(2,2),(2,20),(2,30),(3,10),(3,20),(3,26),(3,3),(3,10),(3,20),(3,26),(5,1),(5,4),(5,16),(5,24),(2,1),(2,2),(2,6),(2,20),(2,30),(2,1),(2,2),(2,4),(2,6),(2,20),(2,30),(2,1),(2,2),(2,4),(2,6),(2,12),(2,20),(2,30);
/*!40000 ALTER TABLE `Favoritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Modulo`
--

DROP TABLE IF EXISTS `Modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Modulo` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `Sistema_idSistemaHorarios` int(11) NOT NULL,
  `NomModulo` varchar(45) NOT NULL,
  PRIMARY KEY (`idModulo`),
  KEY `fk_Modulo_Sistema1` (`Sistema_idSistemaHorarios`),
  CONSTRAINT `fk_Modulo_Sistema1` FOREIGN KEY (`Sistema_idSistemaHorarios`) REFERENCES `Sistema` (`idSistemaHorarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Modulo`
--

LOCK TABLES `Modulo` WRITE;
/*!40000 ALTER TABLE `Modulo` DISABLE KEYS */;
INSERT INTO `Modulo` VALUES (1,1,'Favoritos'),(2,1,'Roles'),(3,1,'Horarios'),(4,1,'Permisos'),(5,1,'Sistema'),(6,1,'Usuarios');
/*!40000 ALTER TABLE `Modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Permisos`
--

DROP TABLE IF EXISTS `Permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Permisos` (
  `idPermisos` int(11) NOT NULL AUTO_INCREMENT,
  `nomPermiso` varchar(10) DEFAULT NULL,
  `descrip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPermisos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Permisos`
--

LOCK TABLES `Permisos` WRITE;
/*!40000 ALTER TABLE `Permisos` DISABLE KEYS */;
INSERT INTO `Permisos` VALUES (1,'agregar','agrega'),(2,'eliminar','elimina'),(3,'editar','edita');
/*!40000 ALTER TABLE `Permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Permisos_has_Roles`
--

DROP TABLE IF EXISTS `Permisos_has_Roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Permisos_has_Roles` (
  `Permisos_idPermisos` int(11) NOT NULL,
  `Roles_idRol` int(11) NOT NULL,
  KEY `fk_Permisos_has_Roles_Permisos1` (`Permisos_idPermisos`),
  KEY `fk_Permisos_has_Roles_Roles1` (`Roles_idRol`),
  CONSTRAINT `fk_Permisos_has_Roles_Permisos1` FOREIGN KEY (`Permisos_idPermisos`) REFERENCES `Permisos` (`idPermisos`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_Permisos_has_Roles_Roles1` FOREIGN KEY (`Roles_idRol`) REFERENCES `Roles` (`idRol`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Permisos_has_Roles`
--

LOCK TABLES `Permisos_has_Roles` WRITE;
/*!40000 ALTER TABLE `Permisos_has_Roles` DISABLE KEYS */;
INSERT INTO `Permisos_has_Roles` VALUES (1,1),(3,1);
/*!40000 ALTER TABLE `Permisos_has_Roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PreguntasSeguridad`
--

DROP TABLE IF EXISTS `PreguntasSeguridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PreguntasSeguridad` (
  `Pregunta` varchar(100) NOT NULL,
  `Respuesta` varchar(100) DEFAULT NULL,
  `Usuarios_ClvUsuarios` int(11) NOT NULL,
  PRIMARY KEY (`Usuarios_ClvUsuarios`),
  CONSTRAINT `fk_PreguntasSeguridad_Usuarios1` FOREIGN KEY (`Usuarios_ClvUsuarios`) REFERENCES `Usuarios` (`ClvUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PreguntasSeguridad`
--

LOCK TABLES `PreguntasSeguridad` WRITE;
/*!40000 ALTER TABLE `PreguntasSeguridad` DISABLE KEYS */;
INSERT INTO `PreguntasSeguridad` VALUES ('Cual fue tu primera mascota?','perro',1),('Cual es tu sabor favorito de chicle?','cacahuate',2),('Cual fue tu primera mascota?','tito',3),('Cual es tu sabor favorito de chicle?','fresa',4),('Cual fue el primer libro que leiste?','El Principito',5);
/*!40000 ALTER TABLE `PreguntasSeguridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Roles`
--

DROP TABLE IF EXISTS `Roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nomRol` varchar(10) DEFAULT NULL,
  `descrip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Roles`
--

LOCK TABLES `Roles` WRITE;
/*!40000 ALTER TABLE `Roles` DISABLE KEYS */;
INSERT INTO `Roles` VALUES (1,'admin','administra'),(2,'user','usa');
/*!40000 ALTER TABLE `Roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Salon`
--

DROP TABLE IF EXISTS `Salon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Salon` (
  `ClvSalon` int(11) NOT NULL AUTO_INCREMENT,
  `nombreSalon` varchar(5) NOT NULL,
  PRIMARY KEY (`ClvSalon`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Salon`
--

LOCK TABLES `Salon` WRITE;
/*!40000 ALTER TABLE `Salon` DISABLE KEYS */;
INSERT INTO `Salon` VALUES (1,'C1'),(2,'C2'),(3,'C3'),(4,'C4'),(5,'C5'),(6,'C6'),(7,'C7'),(8,'C8'),(9,'C9'),(10,'D1'),(11,'D2'),(12,'D3'),(13,'D4'),(14,'F2'),(15,'F3'),(16,'H1'),(17,'H2'),(18,'H3'),(19,'H4'),(20,'H5'),(21,'H6'),(22,'H7'),(23,'H8'),(24,'CC1'),(25,'CC2'),(26,'CC3'),(27,'CC4'),(28,'CC5'),(29,'CC7'),(30,'CC8'),(31,'CC9');
/*!40000 ALTER TABLE `Salon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sistema`
--

DROP TABLE IF EXISTS `Sistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sistema` (
  `idSistemaHorarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombreSistema` varchar(20) NOT NULL,
  PRIMARY KEY (`idSistemaHorarios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sistema`
--

LOCK TABLES `Sistema` WRITE;
/*!40000 ALTER TABLE `Sistema` DISABLE KEYS */;
INSERT INTO `Sistema` VALUES (1,'Sistema Horario');
/*!40000 ALTER TABLE `Sistema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios` (
  `ClvUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(20) NOT NULL,
  `contrasenaUsuario` varchar(100) NOT NULL,
  `sal` int(11) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`ClvUsuarios`),
  UNIQUE KEY `nombreUsuario_UNIQUE` (`nombreUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
INSERT INTO `Usuarios` VALUES (1,'admin','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a91877990164',77990164,'1'),(2,'user','04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb60928871',60928871,'1'),(3,'Riad','2ec21195be2d5d944c92d52dc3255306e702347d6a3da6e6a2f410c6aff8dc1a884558',884558,'1'),(4,'Javier','2ec21195be2d5d944c92d52dc3255306e702347d6a3da6e6a2f410c6aff8dc1a68026640',68026640,'1'),(5,'javierQ','8ad4264133a4549bee0972415277d6138d2cbab6dff3d4417c0b179d7e59a7a915995612',15995612,'1');
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios_has_Roles`
--

DROP TABLE IF EXISTS `Usuarios_has_Roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios_has_Roles` (
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `Roles_idRol` int(11) NOT NULL,
  KEY `fk_Usuarios_has_Roles_Usuarios1` (`Usuarios_idUsuarios`),
  KEY `fk_Usuarios_has_Roles_Roles1` (`Roles_idRol`),
  CONSTRAINT `fk_Usuarios_has_Roles_Roles1` FOREIGN KEY (`Roles_idRol`) REFERENCES `Roles` (`idRol`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuarios_has_Roles_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `Usuarios` (`ClvUsuarios`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios_has_Roles`
--

LOCK TABLES `Usuarios_has_Roles` WRITE;
/*!40000 ALTER TABLE `Usuarios_has_Roles` DISABLE KEYS */;
INSERT INTO `Usuarios_has_Roles` VALUES (2,2),(1,1),(3,2),(5,2),(4,1);
/*!40000 ALTER TABLE `Usuarios_has_Roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-27 11:22:48
