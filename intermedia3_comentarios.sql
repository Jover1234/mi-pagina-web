CREATE DATABASE  IF NOT EXISTS `intermedia3` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `intermedia3`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: intermedia3
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(200) DEFAULT NULL,
  `Comentario` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Usuario_Fk_idx` (`Usuario`),
  CONSTRAINT `Usuario_Fk` FOREIGN KEY (`Usuario`) REFERENCES `users` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (19,'jov14edu@gmail.com','Excelente Variedad de Productos: \"La página web de animales ofrece una amplia variedad de productos para mascotas. Desde alimentos hasta juguetes y accesorios, encuentro todo lo que necesito para mis mascotas en un solo lugar. La navegación fácil y la entrega rápida son definitivamente puntos a favor.\"'),(20,'hola@gmail.com','Información Útil sobre Cuidado de Mascotas: \"Me encanta la sección de consejos y artículos informativos sobre el cuidado de mascotas. La página web no solo vende productos, sino que también se preocupa por educar a los dueños de mascotas. Los consejos prácticos y las guías son muy útiles para brindar el mejor cuidado a mis animales.'),(21,'jov14edu@gmail.com','Atención al Cliente Sobresaliente: \"La atención al cliente es excepcional. Responden rápidamente a mis preguntas y resuelven cualquier problema de manera eficiente. Me siento respaldado como cliente, lo cual es crucial cuando se trata de productos para mis adorables mascotas.\"'),(25,'Tiponormal@gmail.com','Buena Experiencia General: \"Mi experiencia en la página web fue en general positiva. Encontré lo que necesitaba para mi mascota y la compra fue fácil. Sin embargo, no hubo nada extraordinario que destacara la experiencia. Fue una transacción estándar sin mayores sorpresas.'),(26,'hater@gmail.com','Importante Mejora Necesaria: \"Esta página es un desastre. La interfaz es confusa, los productos son de baja calidad y el servicio al cliente es inexistente. No sé cómo alguien puede recomendar este lugar. ¡Evítenlo a toda costa si valoran a sus mascotas!\"');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-25  2:45:22
