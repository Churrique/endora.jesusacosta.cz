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
-- Table structure for table `datos_personales`
--

DROP TABLE IF EXISTS `datos_personales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datos_personales` (
  `iddatospersonales` int(12) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id. Datos Personales',
  `nombre` varchar(30) COLLATE latin1_general_cs NOT NULL COMMENT 'Nombre',
  `apellido` varchar(30) COLLATE latin1_general_cs NOT NULL COMMENT 'Apellido',
  `nombrecompleto` varchar(100) COLLATE latin1_general_cs DEFAULT NULL COMMENT 'Nombre Completo',
  `sexo` enum('No Indicado','Femenino','Masculino','Prefiero No Contestar') COLLATE latin1_general_cs NOT NULL DEFAULT 'No Indicado' COMMENT 'Sexo',
  `nacimiento` date DEFAULT NULL COMMENT 'Fecha de Nacimiento',
  `tiene_direccion` enum('','No Indicado','Si','No','Prefiero No Contestar') COLLATE latin1_general_cs NOT NULL DEFAULT 'No Indicado' COMMENT '¿Tiene Dirección?',
  `tiene_correo` enum('','No Indicado','Si','No','Prefiero No Contestar') COLLATE latin1_general_cs NOT NULL DEFAULT 'No Indicado' COMMENT '¿Tiene Correo Electrónico?',
  `tiene_telefono` enum('','No Indicado','Si','No','Prefiero No Contestar') COLLATE latin1_general_cs NOT NULL DEFAULT 'No Indicado' COMMENT '¿Tiene Teléfono?',
  PRIMARY KEY (`iddatospersonales`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs ROW_FORMAT=DYNAMIC COMMENT='Tabla de Datos Personales.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_personales`
--

LOCK TABLES `datos_personales` WRITE;
/*!40000 ALTER TABLE `datos_personales` DISABLE KEYS */;
INSERT INTO `datos_personales` VALUES (1,'JESÚS','ACOSTA','JESÚS ENRIQUE ACOSTA MARTÍNEZ','No Indicado','0000-00-00','No Indicado','No Indicado','No Indicado'),(2,'fghgfhgf','hgfhgfh','nmnmnmnmnmn','No Indicado',NULL,'No Indicado','No Indicado','No Indicado'),(3,'sddsfdfdsf','fdsfsdfdsf','fdsfsdfdsfdsfdsfsdf','Prefiero No Contestar',NULL,'Si','No','No Indicado'),(4,'Kery','Lary','mnmnmn ghghg ytytyty','Prefiero No Contestar','2022-03-29','No Indicado','No Indicado','No Indicado'),(5,'Kery','Lary','mnmnmn ghghg ytytyty','Prefiero No Contestar','2022-03-29','No Indicado','No Indicado','No Indicado'),(6,'Kery','Lary','nbmnbvnbmbnnbmnbm','Masculino','2022-03-24','No Indicado','No Indicado','No Indicado'),(7,'kkkkkkkkkkkk','xxxxxxxxxxxx','hghgh nbnbnbnbn trtrtrtrtrtr','Prefiero No Contestar','2022-04-23','No Indicado','No Indicado','No Indicado'),(8,'aaaaaaaaaaaaaaaaaaaa','bbbbbbbbbbbbbbbbbbbb','aaaaaaaaaaaa bbbbbbbbbbbb ccccccccccc','Masculino','2022-04-02','No Indicado','No Indicado','No Indicado'),(9,'xxxxxxxxxxxx','zzzzzzzzzzzz','vvvvvvvvv xxxxxxxxxx zzzzzzzzz','Masculino','2022-04-22','No Indicado','No Indicado','No Indicado'),(10,'kkkkkkkkkkkk','xxxxxxxxxxxx','bbbbbbb vvvvvvv dddddddd','Masculino','2022-04-02','No Indicado','No Indicado','No Indicado'),(11,'kkkkkkkkkkkk','xxxxxxxxxxxx','dsfsdfdfdsfsdfsdfdfdsfsdfdsf','Femenino','2022-04-15','No Indicado','No Indicado','No Indicado'),(12,'wwwwwwwwwwwww','qqqqqqqqqqqqqqqq','hgfhghg hghfghgfh gfhgf hgfhfgh','Femenino','2022-04-02','No Indicado','No Indicado','No Indicado'),(13,'kkkkkkkkkkkk','xxxxxxxxxxxx','','Prefiero No Contestar','2022-04-01','No Indicado','No Indicado','No Indicado'),(14,'wwwwwwwwwwwww','qqqqqqqqqqqqqqqq','','Prefiero No Contestar','2022-04-29','No Indicado','No Indicado','No Indicado'),(15,'wwwwwwwwwwwww','qqqqqqqqqqqqqqqq','ghgjhgjhgjhgjhgjhgjhgjhgjhgjhgjhg','Prefiero No Contestar','2022-04-20','No Indicado','No Indicado','No Indicado'),(16,'cacho','coton','fdsfdfsadfdsafdsf','Masculino','2022-04-16','No Indicado','No Indicado','No Indicado'),(17,'Jesús Enrique','Martínez','qwerewrwerwerqwer','Masculino','2022-04-28','No Indicado','No Indicado','No Indicado'),(18,'Jesús','Acosta','Jesús Enrique Acosta Martínez','Masculino','2022-04-22','No Indicado','No Indicado','No Indicado'),(19,'wwwwwwwwwwwww','qqqqqqqqqqqqqqqq','dsfdfdsfdsfs jhgjhgjhgjhg nbmbvmnm','Prefiero No Contestar','2022-04-14','No Indicado','No Indicado','No Indicado'),(20,'kkkkkkkkkkkk','xxxxxxxxxxxx','jhjhgjhj dfddgfdgf trytrytrytry','Prefiero No Contestar','2022-04-27','No Indicado','No Indicado','No Indicado'),(21,'Kery','Lary','kjkjk nmnmn vbvbvbv','Masculino','2022-04-13','No Indicado','No Indicado','No Indicado'),(25,'Mono','Coyote','gretwrtre hgfdhgfh bnmbmnbvmnbm','Prefiero No Contestar','2022-05-06','No Indicado','No Indicado','No Indicado'),(26,'Kery','Lary','vxbvcbvc mnbmbnvm hgfdhgfhgfdh','Prefiero No Contestar','2022-04-21','No Indicado','No Indicado','No Indicado'),(27,'Kery','Lary','kjkghjkhjkjkjghkhjkjhg','Prefiero No Contestar','2022-04-21','No Indicado','No Indicado','No Indicado'),(28,'Kery','Lary','jkjhkjhgkjhkjhkjh','Masculino','2022-04-19','No Indicado','No Indicado','No Indicado'),(29,'Kery','Lary','mnbnbnbnbnv','Femenino','2022-04-23','No Indicado','No Indicado','No Indicado'),(30,'Kery','Lary','retrewtrew rtegfgfsdgfsd dgfdsgsdfgfd','Prefiero No Contestar','2022-04-23','No Indicado','No Indicado','No Indicado'),(31,'Kery','Lary','mnbmnb gfdgfd rewrew','Masculino','2022-04-19','No Indicado','No Indicado','No Indicado'),(70,'Kery','Lary','Kery Lary','No Indicado','0000-00-00','No Indicado','No Indicado','No Indicado'),(75,'Kery','Lary','Kery Lary','No Indicado','2022-05-24','No Indicado','No Indicado','No Indicado'),(76,'Kery','Lary','Kery Lary','No Indicado','2022-05-19','No Indicado','No Indicado','No Indicado'),(77,'Kery','Lary','Kery Lary','No Indicado','2022-05-19','No Indicado','No Indicado','No Indicado'),(93,'Kery','Lary','Kery Lary','Masculino','2022-05-18','No Indicado','No Indicado','No Indicado'),(94,'Kery','Lary','Kery Lary','Femenino','2022-05-18','No Indicado','No Indicado','No Indicado'),(95,'Kery','Lary','Kery Lary','Femenino','2022-05-25','No Indicado','No Indicado','No Indicado'),(96,'Kery','Lary','Kery Lary','Femenino','2022-05-19','No Indicado','No Indicado','No Indicado'),(97,'Kery','Lary','Kery Lary','Masculino','2022-05-25','No Indicado','No Indicado','No Indicado'),(98,'Kery','Lary','Kery Lary','Femenino','2022-05-04','No Indicado','No Indicado','No Indicado'),(99,'Kery','Lary','Kery Lary','Femenino','2022-05-25','No Indicado','No Indicado','No Indicado'),(100,'Kery','Lary','Kery Lary','Masculino','2022-05-19','No Indicado','No Indicado','No Indicado'),(106,'Kery','Lary','Kery Lary','Masculino','2022-06-22','No Indicado','No Indicado','No Indicado'),(107,'Kery','Lary','Kery Lary','Masculino','2022-06-23','No Indicado','No Indicado','No Indicado'),(108,'Kery','Lary','Kery Lary','Masculino','2022-06-26','No Indicado','No Indicado','No Indicado'),(109,'Kery','Lary','Kery Lary','Masculino','2022-06-22','No Indicado','No Indicado','No Indicado'),(110,'Kery','Lary','Kery Lary','Prefiero No Contestar','2022-07-29','No Indicado','No Indicado','No Indicado'),(111,'elnombre','elapellido','elnombrecopleto','','0000-00-00','No Indicado','No Indicado','No Indicado'),(112,'elnombre','elapellido','elnombrecopleto','Prefiero No Contestar','2022-07-23','No Indicado','No Indicado','No Indicado'),(113,'elnombre','elapellido','elnombrecopleto','Masculino','2022-07-23','No Indicado','No Indicado','No Indicado'),(114,'elnombre','elapellido','elnombrecopleto','Masculino','2022-07-23','No Indicado','No Indicado','No Indicado'),(115,'elnombre','elapellido','elnombrecopleto','Masculino','2022-07-23','No Indicado','No Indicado','No Indicado'),(116,'Kery','Lary','Kery Lary','Masculino','2022-07-30','No Indicado','No Indicado','No Indicado'),(117,'Kery','Lary','Kery Lary','Masculino','2022-07-30','No Indicado','No Indicado','No Indicado'),(118,'Kery','Lary','Kery Lary','Prefiero No Contestar','2022-07-31','No Indicado','No Indicado','No Indicado'),(119,'Kery','Lary','Kery Lary','Femenino','2022-08-07','No Indicado','No Indicado','No Indicado'),(120,'Kery','Lary','Kery Lary','Femenino','2022-08-07','No Indicado','No Indicado','No Indicado'),(121,'Kery','Lary','Kery Lary','Prefiero No Contestar','2022-07-28','No Indicado','No Indicado','No Indicado'),(122,'Kery','Lary','Kery Lary','Masculino','2022-08-19','No Indicado','No Indicado','No Indicado'),(123,'Kery','Lary','Kery Lary','Masculino','2022-10-14','No Indicado','No Indicado','No Indicado'),(124,'Kery','Lary','Kery Lary','Prefiero No Contestar','2022-07-30','No Indicado','No Indicado','No Indicado'),(125,'Kery','Lary','Kery Lary','Masculino','2022-08-07','No Indicado','No Indicado','No Indicado'),(126,'Kery','Lary','Kery Lary','Masculino','2022-08-06','No Indicado','No Indicado','No Indicado'),(127,'Kery','Lary','Kery Lary','Femenino','2022-07-28','No Indicado','No Indicado','No Indicado'),(128,'Kery','Lary','Kery Lary','Femenino','2022-07-23','No Indicado','No Indicado','No Indicado'),(129,'Kery','Lary','Kery Lary','Masculino','2022-08-06','No Indicado','No Indicado','No Indicado'),(130,'Kery','Lary','Kery Lary','Masculino','2022-07-30','No Indicado','No Indicado','No Indicado'),(131,'Kery','Lary','Kery Lary','Masculino','2022-08-07','No Indicado','No Indicado','No Indicado'),(132,'Kery','Lary','Kery Lary','Femenino','2022-08-06','No Indicado','No Indicado','No Indicado'),(133,'Kery','Lary','Kery Lary','Femenino','2022-08-06','No Indicado','No Indicado','No Indicado'),(134,'Kery','Lary','Kery Lary','Masculino','2022-07-28','No Indicado','No Indicado','No Indicado'),(135,'Kery','Lary','Kery Lary','Femenino','2022-09-25','No Indicado','No Indicado','No Indicado'),(136,'Kery','Lary','Kery Lary','Femenino','2022-08-06','No Indicado','No Indicado','No Indicado'),(137,'Kery','Lary','Kery Lary','Femenino','2022-07-28','No Indicado','No Indicado','No Indicado'),(138,'Kery','Lary','Kery Lary','No Indicado','2022-08-06','No Indicado','No Indicado','No Indicado'),(139,'Kery','Lary','Kery Lary','Femenino','2022-08-07','No Indicado','No Indicado','No Indicado'),(140,'Kery','Lary','Kery Lary','Femenino','2022-08-27','No Indicado','No Indicado','No Indicado'),(141,'Kery','Lary','Kery Lary','Masculino','2022-07-30','No Indicado','No Indicado','No Indicado'),(142,'Kery','Lary','Kery Lary','Masculino','2022-11-03','No Indicado','No Indicado','No Indicado'),(143,'Kery','Lary','Kery Lary','Masculino','2022-11-03','No Indicado','No Indicado','No Indicado'),(144,'Kery','Lary','Kery Lary','Masculino','2022-07-31','No Indicado','No Indicado','No Indicado'),(145,'Kery','Lary','Kery Lary','Masculino','2022-07-31','No Indicado','No Indicado','No Indicado'),(146,'Kery','Lary','Kery Lary','Masculino','2022-07-31','No Indicado','No Indicado','No Indicado'),(147,'Kery','Lary','Kery Lary','Masculino','2022-07-31','No Indicado','No Indicado','No Indicado'),(148,'Kery','Lary','Kery Lary','Masculino','2022-07-31','No Indicado','No Indicado','No Indicado'),(149,'Kery','Lary','Kery Lary','Masculino','2022-07-31','No Indicado','No Indicado','No Indicado'),(150,'Kery','Lary','Kery Lary','Prefiero No Contestar','2022-07-31','No Indicado','No Indicado','No Indicado'),(151,'Kery','Lary','Kery Lary','Masculino','2022-07-31','No Indicado','No Indicado','No Indicado'),(152,'Kery','Lary','Kery Lary','Masculino','2022-07-31','No Indicado','No Indicado','No Indicado'),(153,'Kery','Lary','Kery Lary','Prefiero No Contestar','2022-07-31','No Indicado','No Indicado','No Indicado'),(154,'Kery','Lary','Kery Lary','Masculino','2022-07-29','No Indicado','No Indicado','No Indicado'),(155,'Kery','Lary','Kery Lary','Femenino','2022-07-29','No Indicado','No Indicado','No Indicado'),(156,'juan','bastidas','juan bastidas','Masculino','2022-07-31','No Indicado','No Indicado','No Indicado'),(157,'MARÍA','PLANCHAR','MARÍA PLANCHAR','Femenino','2022-07-31','No Indicado','No Indicado','No Indicado'),(158,'EUSTAQUIA','PLANCHAR','EUSTAQUIA PLANCHAR','Femenino','2022-07-31','No Indicado','No Indicado','No Indicado'),(159,'CESAR','ALVÁREZ','CESAR ALVÁREZ','Masculino','2022-07-31','No Indicado','No Indicado','No Indicado'),(160,'Kery','Lary','Kery Lary','Femenino','2022-07-31','No Indicado','No Indicado','No Indicado'),(161,'Kery','Lary','Kery Lary','Masculino','2022-08-07','No Indicado','No Indicado','No Indicado');
/*!40000 ALTER TABLE `datos_personales` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-13  3:57:11
