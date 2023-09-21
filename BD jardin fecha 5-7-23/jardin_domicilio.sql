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
-- Table structure for table `domicilio`
--

DROP TABLE IF EXISTS `domicilio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domicilio` (
  `Provincia` varchar(75) NOT NULL,
  `Localidad` varchar(45) NOT NULL,
  `Código_postal` int NOT NULL,
  `Barrio` varchar(45) NOT NULL,
  `Calle` varchar(75) NOT NULL,
  `Número` varchar(12) NOT NULL COMMENT 'En ciertos casos las casas no tienen numeros, si no un nombre como \\n\\nEj: Lote 4',
  `id_tutor` int DEFAULT NULL,
  `id_niño` int DEFAULT NULL,
  KEY `fk_domicilio_tutor1_idx` (`id_tutor`),
  KEY `fk_domicilio_niño1_idx` (`id_niño`),
  CONSTRAINT `fk_domicilio_niño1` FOREIGN KEY (`id_niño`) REFERENCES `niño` (`id_niño`),
  CONSTRAINT `fk_domicilio_tutor1` FOREIGN KEY (`id_tutor`) REFERENCES `tutor` (`id_tutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domicilio`
--

LOCK TABLES `domicilio` WRITE;
/*!40000 ALTER TABLE `domicilio` DISABLE KEYS */;
/*!40000 ALTER TABLE `domicilio` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-05  5:43:22
