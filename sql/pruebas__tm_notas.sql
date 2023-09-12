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
-- Table structure for table `_tm_notas`
--

DROP TABLE IF EXISTS `_tm_notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `_tm_notas` (
  `id_tm_nota` int(12) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id. Nota',
  `nomenclatura` varchar(3) COLLATE latin1_general_cs NOT NULL COMMENT 'Abreviación',
  `detalle` varchar(20) COLLATE latin1_general_cs NOT NULL DEFAULT '--------------------' COMMENT 'Descripción',
  `grupo` varchar(2) COLLATE latin1_general_cs DEFAULT '0' COMMENT 'Grupo',
  PRIMARY KEY (`id_tm_nota`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs ROW_FORMAT=DYNAMIC COMMENT='Maestro para Nomenclatura Especial de Notas Reprobatorias y Aprobatorias.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tm_notas`
--

LOCK TABLES `_tm_notas` WRITE;
/*!40000 ALTER TABLE `_tm_notas` DISABLE KEYS */;
INSERT INTO `_tm_notas` VALUES (1,'NI','No Indicado','A'),(2,'OC','Otro Código','A'),(3,'00','Cero Cero','1'),(4,'01','Cero Uno','1'),(5,'02','Cero Dos','1'),(6,'03','Cero Tres','1'),(7,'04','Cero Cuatro','1'),(8,'05','Cero Cinco','1'),(9,'06','Cero Seis','1'),(10,'07','Cero Siete','1'),(11,'08','Cero Ocho','1'),(12,'09','Cero Nueve','1'),(13,'10','Diez','1'),(14,'NC','No Curso','A'),(15,'EQ','Equivalencia','A'),(16,'AP','Aprobado','A'),(17,'RP','Reprobado','A'),(18,'FN','Final','A'),(19,'RE','Reparación','A'),(20,'EE','Evaluación Especial','A');
/*!40000 ALTER TABLE `_tm_notas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-13  3:57:04
