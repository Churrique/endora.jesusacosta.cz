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
-- Table structure for table `_tm_documento_identificacion`
--

DROP TABLE IF EXISTS `_tm_documento_identificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `_tm_documento_identificacion` (
  `id_tm_documento_identificacion` int(12) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id. Documento de Identificación',
  `documento_identificacion` varchar(40) COLLATE latin1_general_cs NOT NULL COMMENT 'Documento de Identificación',
  PRIMARY KEY (`id_tm_documento_identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs ROW_FORMAT=DYNAMIC COMMENT='Tabla Maestra para los Posibles Documentos de Identificación';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tm_documento_identificacion`
--

LOCK TABLES `_tm_documento_identificacion` WRITE;
/*!40000 ALTER TABLE `_tm_documento_identificacion` DISABLE KEYS */;
INSERT INTO `_tm_documento_identificacion` VALUES (1,'No Indicado'),(2,'Otro Documento de Identificación'),(3,'Pasaporte'),(4,'Licencia de Conducir'),(5,'Residencia Permanente'),(6,'Visado'),(7,'Permiso Especial'),(8,'Visa para Trabajo'),(9,'Cédula de Identidad'),(10,'Identificación de Biblioteca'),(11,'Identificación Estudiantil'),(12,'Identificación del Seguro Social'),(13,'Documento Nacional de Identificación');
/*!40000 ALTER TABLE `_tm_documento_identificacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-13  3:56:59
