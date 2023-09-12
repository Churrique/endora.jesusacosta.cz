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
-- Table structure for table `usuario_modulos`
--

DROP TABLE IF EXISTS `usuario_modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario_modulos` (
  `id_moduleuser` int(12) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id. Módulo Usuario',
  `id_userapp` int(12) unsigned DEFAULT NULL COMMENT 'Id. Aplicación de Usuario',
  `item_menu` varchar(15) COLLATE latin1_general_cs NOT NULL DEFAULT '---------------' COMMENT 'Menú',
  `orderl` int(2) unsigned DEFAULT 0 COMMENT 'Orden Lógico',
  PRIMARY KEY (`id_moduleuser`),
  KEY `usuario_modulos_FK` (`id_userapp`),
  CONSTRAINT `usuario_modulos_FK` FOREIGN KEY (`id_userapp`) REFERENCES `usuario_aplicacion` (`id_userapp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs ROW_FORMAT=DYNAMIC COMMENT='Determina los Posibles Módulos del Menú de Cada Usuario. Tabla que controla la pertenencia del menú con respecto a la aplicación (qué menú pertenece a qué aplicación).';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_modulos`
--

LOCK TABLES `usuario_modulos` WRITE;
/*!40000 ALTER TABLE `usuario_modulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_modulos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-13  3:57:14
