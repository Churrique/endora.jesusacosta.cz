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
-- Table structure for table `_tm_usuario`
--

DROP TABLE IF EXISTS `_tm_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `_tm_usuario` (
  `id_tm_usuario` int(12) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id. Usuario',
  `pass` blob NOT NULL COMMENT 'Contrase√±a Usuario',
  `keyrecover` varchar(16) COLLATE latin1_general_cs NOT NULL COMMENT 'Llave de Recuperaci√≥n',
  `usserr` varchar(20) COLLATE latin1_general_cs NOT NULL COMMENT 'Usuario',
  `fullname` varchar(30) COLLATE latin1_general_cs DEFAULT NULL COMMENT 'Nombre Completo Usuario',
  `hasexpiration` enum('---','Si','No') COLLATE latin1_general_cs NOT NULL DEFAULT 'Si' COMMENT 'Tiene Expiraci√≥n',
  `exxpire` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha Expiraci√≥n',
  `sessionn` enum('---','No','Si') COLLATE latin1_general_cs NOT NULL DEFAULT 'No' COMMENT 'Ingres√≥ al Sistema',
  `loadmenu` enum('---------','Din√°mico','Est√°tico') COLLATE latin1_general_cs NOT NULL DEFAULT 'Din√°mico' COMMENT 'Carga del Men√∫',
  `deluser` enum('---','Si','No') COLLATE latin1_general_cs NOT NULL DEFAULT 'Si' COMMENT 'Eliminar Usuario',
  `email` varchar(50) COLLATE latin1_general_cs DEFAULT NULL COMMENT 'E-mail para enviar informaci√≥n importante.',
  PRIMARY KEY (`id_tm_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs ROW_FORMAT=DYNAMIC COMMENT='Tabla Maestra para Registrar y Configurar los Usuarios al Esquema de la Aplicaci√≥n.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tm_usuario`
--

LOCK TABLES `_tm_usuario` WRITE;
/*!40000 ALTER TABLE `_tm_usuario` DISABLE KEYS */;
INSERT INTO `_tm_usuario` VALUES (1,_binary '-´Lúõ∏n∑á<,?;∂','Merondio','juan.M','Juan Merombio','Si','2022-12-21 01:15:00','No','Est√°tico','Si','fjfjf@email.com'),(2,_binary 'w±-\Ó\"pΩ\‹qCö\\◊°jL','Barrueta','kiko.B','Francisco Barrueta','Si','2022-12-29 10:51:00','No','Din√°mico','Si','giyodac714@tsclip.com');
/*!40000 ALTER TABLE `_tm_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-13  3:57:07
