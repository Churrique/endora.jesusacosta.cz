CREATE DATABASE  IF NOT EXISTS `pruebas` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_cs */;
USE `pruebas`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: innodb.endora.cz    Database: pruebas
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.35-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `materias`
--

DROP TABLE IF EXISTS `materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materias` (
  `idmaterias` int(12) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id. Materia',
  `id_tm_seccion` int(12) unsigned DEFAULT 1 COMMENT 'Id. Seccón',
  `id_tm_turnos` int(12) unsigned DEFAULT 0 COMMENT 'Id. Turno',
  `id_tm_periodolectivo` int(12) unsigned DEFAULT 0 COMMENT 'Id. Período Lectivo',
  `id_tm_pensa` int(12) unsigned DEFAULT 0 COMMENT 'Id. Pensa',
  `iddatospersonales` int(12) unsigned DEFAULT 0 COMMENT 'Id. Datos Personales',
  `idresumenevaluacion` int(12) unsigned DEFAULT 0 COMMENT 'Id. Resumen Evaluación',
  `nota1` decimal(5,2) unsigned NOT NULL DEFAULT 0.00 COMMENT 'Nota Uno',
  `estatus_nota1` int(1) unsigned NOT NULL DEFAULT 0 COMMENT 'Estatus Nota Uno',
  `nota2` decimal(5,2) unsigned NOT NULL DEFAULT 0.00 COMMENT 'Nota Dos',
  `estatus_nota2` int(1) unsigned NOT NULL DEFAULT 0 COMMENT 'Estatus Nota Dos',
  PRIMARY KEY (`idmaterias`),
  KEY `FK_TUR_materias` (`id_tm_turnos`),
  KEY `FK_SEC_materias` (`id_tm_seccion`),
  KEY `FK_PER_materias` (`id_tm_periodolectivo`),
  KEY `FK_PEN_materias` (`id_tm_pensa`),
  KEY `FK_DP_materias` (`iddatospersonales`),
  KEY `FK_RE_materias` (`idresumenevaluacion`),
  CONSTRAINT `FK_DP_materias` FOREIGN KEY (`iddatospersonales`) REFERENCES `datos_personales` (`iddatospersonales`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_PEN_materias` FOREIGN KEY (`id_tm_pensa`) REFERENCES `_tm_pensa` (`id_tm_pensa`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_PER_materias` FOREIGN KEY (`id_tm_periodolectivo`) REFERENCES `_tm_periodos_lectivos` (`id_tm_periodolectivo`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_RE_materias` FOREIGN KEY (`idresumenevaluacion`) REFERENCES `resumen_evaluacion` (`idresumenevaluacion`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_SEC_materias` FOREIGN KEY (`id_tm_seccion`) REFERENCES `_tm_seccion` (`id_tm_seccion`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_TUR_materias` FOREIGN KEY (`id_tm_turnos`) REFERENCES `_tm_turnos` (`id_tm_turnos`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs ROW_FORMAT=DYNAMIC COMMENT='Tabla de las Materias que está cursando un Alumno.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-13  3:57:00
