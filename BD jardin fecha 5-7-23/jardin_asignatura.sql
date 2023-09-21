-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: jardin
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asignatura` (
  `Código_de_asignatura` int NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Fecha` date NOT NULL,
  `Condición` varchar(8) NOT NULL,
  `Calificación` int DEFAULT NULL,
  `id_tutor` int NOT NULL,
  `Código_de_carrera` int NOT NULL,
  PRIMARY KEY (`Código_de_asignatura`),
  UNIQUE KEY `Código_de_asignatura_UNIQUE` (`Código_de_asignatura`),
  KEY `fk_asignatura_alumno1_idx` (`id_tutor`),
  KEY `fk_asignatura_carrera1_idx` (`Código_de_carrera`),
  CONSTRAINT `fk_asignatura_alumno1` FOREIGN KEY (`id_tutor`) REFERENCES `alumno` (`id_tutor`),
  CONSTRAINT `fk_asignatura_carrera1` FOREIGN KEY (`Código_de_carrera`) REFERENCES `carrera` (`Código_de_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura`
--

LOCK TABLES `asignatura` WRITE;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-05  5:45:15
