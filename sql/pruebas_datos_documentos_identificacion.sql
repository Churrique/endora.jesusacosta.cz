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
-- Table structure for table `datos_documentos_identificacion`
--

DROP TABLE IF EXISTS `datos_documentos_identificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datos_documentos_identificacion` (
  `iddatosidentificacion` int(12) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id. Dato Identificación',
  `iddatospersonales` int(12) unsigned DEFAULT 0 COMMENT 'Id. Datos Personales',
  `id_tm_documento_identificacion` int(12) unsigned DEFAULT 0 COMMENT 'Id. Documento de Identificación',
  `numeracion` varchar(30) COLLATE latin1_general_cs NOT NULL DEFAULT '0' COMMENT 'Número/Valor/Reseña',
  PRIMARY KEY (`iddatosidentificacion`),
  KEY `index_datosperso` (`iddatospersonales`),
  KEY `index_docidentifi` (`id_tm_documento_identificacion`),
  CONSTRAINT `fk_doc_iden` FOREIGN KEY (`iddatospersonales`) REFERENCES `datos_personales` (`iddatospersonales`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_tipodocu` FOREIGN KEY (`id_tm_documento_identificacion`) REFERENCES `_tm_documento_identificacion` (`id_tm_documento_identificacion`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs ROW_FORMAT=DYNAMIC COMMENT='Tabla de los Documentos de Identificación que puede tener una persona.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_documentos_identificacion`
--

LOCK TABLES `datos_documentos_identificacion` WRITE;
/*!40000 ALTER TABLE `datos_documentos_identificacion` DISABLE KEYS */;
INSERT INTO `datos_documentos_identificacion` VALUES (1,123,7,'951357'),(2,124,7,'999888777'),(3,125,6,'22115599'),(4,126,7,'88552200'),(5,127,7,'99663300'),(6,110,7,'33557799'),(7,121,7,'987321'),(8,75,1,'223344'),(9,99,4,'546546'),(10,77,1,'65656565'),(11,134,3,'22446688'),(12,27,5,'1133557799'),(13,77,1,'7687805643'),(14,107,4,'543554'),(15,75,1,'787698'),(16,135,6,'9898989898'),(17,100,8,'547546546435'),(18,124,7,'67686886'),(19,30,8,'2004005009'),(20,152,5,'65465654365'),(21,7,5,'57594H-X7574-90'),(22,153,7,'BG884H-75Z74-W90'),(23,154,6,'58866L-YRTGFV-888'),(24,155,3,'654654654654'),(25,157,7,'500B-800K'),(26,158,7,'EU58875-988K'),(27,159,7,'887459Y-JF777-00'),(28,153,7,'8989898989'),(29,109,7,'7665XX-9009944'),(30,109,3,'18569873'),(31,145,7,'55-4879-KL-654980'),(32,76,7,'54589-00-KL-X5210-89'),(33,147,7,'9999-00000-999999999'),(34,151,3,'123-KLM-99'),(35,93,8,'242589-ML-4K-98542'),(36,95,2,'8760-HK-9908-XX'),(37,97,4,'5676787-000-999'),(38,21,7,'8987-KLL-123-999');
/*!40000 ALTER TABLE `datos_documentos_identificacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-13  3:57:02
