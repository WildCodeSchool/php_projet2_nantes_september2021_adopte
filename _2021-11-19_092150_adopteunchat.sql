-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: adopteunchat
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_connexion`
--

DROP TABLE IF EXISTS `admin_connexion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_connexion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_connexion`
--

/*!40000 ALTER TABLE `admin_connexion` DISABLE KEYS */;
INSERT INTO `admin_connexion` VALUES (1,'admin','$2y$10$VFBgcdgksrSdlRXgCgpm9OuVhamOBJdwsNdxsTaa2OxqcU76QxZoO');
/*!40000 ALTER TABLE `admin_connexion` ENABLE KEYS */;

--
-- Table structure for table `adoptant`
--

DROP TABLE IF EXISTS `adoptant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adoptant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(300) NOT NULL,
  `telephone` int NOT NULL,
  `Code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adoptant`
--

/*!40000 ALTER TABLE `adoptant` DISABLE KEYS */;
/*!40000 ALTER TABLE `adoptant` ENABLE KEYS */;

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `age` int NOT NULL,
  `race` varchar(50) DEFAULT NULL,
  `couleur` varchar(100) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `date_arrivee` date NOT NULL,
  `vaccin` varchar(10) DEFAULT NULL,
  `sterilise` varchar(10) DEFAULT NULL,
  `compatibilite_autre_animaux` varchar(10) DEFAULT NULL,
  `presentation` text,
  `famille_accueil_id` int DEFAULT NULL,
  `adoptant_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Chats_famille_accueil_id` (`famille_accueil_id`),
  KEY `fk_Chats_adoptant_id` (`adoptant_id`),
  CONSTRAINT `fk_Chats_adoptant_id` FOREIGN KEY (`adoptant_id`) REFERENCES `adoptant` (`id`),
  CONSTRAINT `fk_Chats_famille_accueil_id` FOREIGN KEY (`famille_accueil_id`) REFERENCES `famille_accueil` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` VALUES (3,'Channel',5,'inconnu','roux','Male','/assets/images/Cat/Channel.jpg','2015-11-18','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(4,'Chaplin',1,'inconnu','noir et blanc','Male','/assets/images/Cat/Chaplin.jpg','2020-11-04','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(5,'Monster',8,'inconnu','fauve','Male','/assets/images/Cat/Monster.jpg','2013-11-27','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(6,'Sanka',4,'inconnu','roux tigre','Male','/assets/images/Cat/Sanka.jpg','2017-06-25','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(7,'Chamalow',5,'chartreux','bleu','Male','/assets/images/Cat/Chamalow.jpg','2016-11-23','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(8,'Gayah',3,'Maincoon','Roux et blanc','Femelle','/assets/images/Cat/Gayah.jpg','2019-11-20','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(9,'James',12,'inconnu','noir blanc roux','Male','/assets/images/Cat/James.jpg','2021-10-20','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(10,'Kuba',1,'inconnu','noir blanc roux','Femelle','/assets/images/Cat/Kuba.jpg','2021-11-17','non','non','inconnu','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(11,'Pilou',4,'Maincoon','gris','Male','/assets/images/Cat/Pilou.jpg','2020-11-25','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(12,'Rayu',2,'angora','roux','Male','/assets/images/Cat/Rayu.jpg','2021-12-08','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(13,'Shaw',3,'inconnu','roux et blanc','Male','/assets/images/Cat/Shaw.jpg','2021-12-02','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(14,'Splash',5,'inconnu','noir blanc roux','Femelle','/assets/images/Cat/Splash.jpg','2021-11-24','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(15,'Stone',6,'ecaille de tortue','fauve noir','Femelle','/assets/images/Cat/Stone.jpg','2021-12-08','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(16,'Wale',15,'inconnu','gris tigre noir','Femelle','/assets/images/Cat/Wale.jpg','2021-12-11','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(17,'Alvan',1,'siamoi','beige','Male','/assets/images/Cat/Alvan.jpg','2021-11-23','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(18,'Dorothea',1,'inconnu','roux blanc noir','Femelle','/assets/images/Cat/Dorothea.jpg','2021-11-08','non','non','non','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(19,'Kim',1,'inconnu','gris tigre noir','Femelle','/assets/images/Cat/Kim.jpg','2021-11-25','non','non','non','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(20,'Leonsa',1,'siamoi','beige blanc noir','Femelle','/assets/images/Cat/Leonsa.jpg','2021-11-16','non','non','non','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(21,'Locky',1,'inconnu','marron et blanc','Male','/assets/images/Cat/Locky.jpg','2021-11-17','non','non','non','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(22,'Lucky',1,'inconnu','noir','Male','/assets/images/Cat/Lucky.jpg','2021-11-01','non','non','non','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(23,'Yosei',1,'inconnu','noire','Femelle','/assets/images/Cat/Yosei.jpg','2021-11-09','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(24,'Zhang',1,' inconnu','roux et blanc','Male','/assets/images/Cat/Zhang.jpg','2021-11-08','oui','oui','oui','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL),(25,'Zoubi',1,'inconnu','gris et blanc','Male','/assets/images/Cat/Zoubi.jpg','2021-11-16','non','non','non','Lorem ipsum dolor sit amet. Et dolor ratione eos incidunt inventore sit voluptas accusantium. Aut cupiditate pariatur hic laborum excepturi ut nesciunt alias aut quas voluptatem sit consequatur voluptatum ut corporis quasi et impedit alias.  Ex veritatis vitae ea corrupti ullam ut maiores iure qui earum unde sed dolorem provident. Et quidem consequuntur qui minima officia et dolorem voluptatum et expedita quia.',NULL,NULL);
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-19  9:21:53
