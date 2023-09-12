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
-- Table structure for table `usuario_aplicacion`
--

DROP TABLE IF EXISTS `usuario_aplicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario_aplicacion` (
  `id_userapp` int(12) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id. Aplicación de Usuario',
  `id_tm_usuario` int(12) unsigned DEFAULT NULL COMMENT 'Id. Usuario',
  `id_tm_app` int(12) unsigned DEFAULT NULL COMMENT 'Id. Aplicación',
  PRIMARY KEY (`id_userapp`),
  KEY `usuario_aplicacion_FK` (`id_tm_usuario`),
  KEY `usuario_aplicacion_FK_1` (`id_tm_app`),
  CONSTRAINT `usuario_aplicacion_FK` FOREIGN KEY (`id_tm_usuario`) REFERENCES `_tm_usuario` (`id_tm_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_aplicacion_FK_1` FOREIGN KEY (`id_tm_app`) REFERENCES `_tm_app` (`id_tm_app`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs COMMENT='Tabla que Registra la(s) Aplicación(es) por Usuario.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_aplicacion`
--

LOCK TABLES `usuario_aplicacion` WRITE;
/*!40000 ALTER TABLE `usuario_aplicacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_aplicacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-13  3:57:05
