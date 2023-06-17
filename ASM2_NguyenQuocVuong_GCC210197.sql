-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: test1
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `test1`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `test1` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;

USE `test1`;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(8) NOT NULL,
  `user_id` int(3) NOT NULL,
  `count` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`cart_id`,`pid`),
  KEY `123product_cart_pid` (`pid`),
  CONSTRAINT `123product_cart_pid` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `cat_id` varchar(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES ('C01','Online'),('C02','Offline'),('C03','Online/Offline'),('C05','Coming Soon');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(3) NOT NULL,
  `sum` decimal(10,0) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`oid`),
  KEY `uid_order_cart` (`user_id`),
  CONSTRAINT `userid_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_detail` (
  `od_id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL,
  `pid` varchar(8) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`od_id`),
  KEY `order_odetail_oid` (`oid`),
  KEY `pid_ordetail_product1` (`pid`),
  CONSTRAINT `order_odetail_oid` FOREIGN KEY (`oid`) REFERENCES `order` (`oid`),
  CONSTRAINT `pid_ordetail_product1` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `pid` varchar(8) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `des` varchar(200) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `cat_id` varchar(8) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES ('P01','Genshin Impact','0',1,'logogenshin.jpg','Adventure',9,'C01'),('P02','PUBG','0',1,'logopubg.jpg','Survival',9,'C01'),('P03','GTA V','455000',1,'gtavlogo.png','Action',9,'C03'),('P04','Valorant','0',1,'valorantlogo.jpg','Action',9,'C01'),('P05','GTA Vice','0',1,'gtavicelogo.png','Action',9,'C02'),('P06','CSGO','0',1,'logocsgo.png','Action',9,'C01'),('P07','Assassin Creed','499000',1,'logoassassin.jpg','Action',100,'C02'),('P08','LOL','0',1,'lmhtlogo.jpg','Action',100,'C01');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'nguyenquocvuong9696@gmail.com','Nguyen Vuong',0,'Viet Nam','123123','admin','0824345490','2003-12-23'),(2,'nguyenquocvuong621@gmail.com','ousamanoone',0,'Viet Nam','123123','user','0334770757','2003-12-23'),(8,'nguyenquocvuong9696@gmail.com','ádfvgbn',0,'Azerbaijan','sadf','user','0824345490','2003-12-23');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-25 16:35:33
