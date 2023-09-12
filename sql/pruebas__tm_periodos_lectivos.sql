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
-- Table structure for table `_tm_periodos_lectivos`
--

DROP TABLE IF EXISTS `_tm_periodos_lectivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `_tm_periodos_lectivos` (
  `id_tm_periodolectivo` int(12) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id. Período Lectivo',
  `nomenclatura_periodo_lectivo` varchar(8) COLLATE latin1_general_cs NOT NULL COMMENT 'Período Lectivo',
  `id_tm_frecuencia` int(12) unsigned DEFAULT 1 COMMENT 'Id. Frecuencia',
  `id_tm_modalidadestudio` int(12) unsigned DEFAULT 1,
  PRIMARY KEY (`id_tm_periodolectivo`),
  KEY `FK_FRE_periodos` (`id_tm_frecuencia`),
  KEY `FK_MOD_periodos` (`id_tm_modalidadestudio`),
  CONSTRAINT `FK_FRE_periodos` FOREIGN KEY (`id_tm_frecuencia`) REFERENCES `_tm_frecuencia` (`id_tm_frecuencia`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_MOD_periodos` FOREIGN KEY (`id_tm_modalidadestudio`) REFERENCES `_tm_modalidad_estudio` (`id_tm_modalidadestudio`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs ROW_FORMAT=DYNAMIC COMMENT='Tabla Maestra de Períodos Lectivos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tm_periodos_lectivos`
--

LOCK TABLES `_tm_periodos_lectivos` WRITE;
/*!40000 ALTER TABLE `_tm_periodos_lectivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `_tm_periodos_lectivos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-13  3:57:10
