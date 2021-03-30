-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: petnet-todo
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (27,'2014_10_12_000000_create_users_table',1),(28,'2021_03_25_171637_create_todos_table',1),(29,'2021_03_25_183200_users_verification',1),(30,'2021_03_25_183315_user_logs',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `todos`
--

DROP TABLE IF EXISTS `todos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `todos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_finished` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `todos`
--

LOCK TABLES `todos` WRITE;
/*!40000 ALTER TABLE `todos` DISABLE KEYS */;
INSERT INTO `todos` VALUES (2,1,'quis ut nam facilis et officia quidsdsddddd',1,'2021-03-26 06:14:41','2021-03-29 23:36:24',NULL),(3,1,'fugiat veniam minus',0,'2021-03-26 06:14:41',NULL,NULL),(4,1,'et porro tempora',1,'2021-03-26 06:14:41',NULL,NULL),(5,1,'laboriosam mollitia et enim quasi adipisci quia provident illum',0,'2021-03-26 06:14:41',NULL,NULL),(6,1,'qui ullam ratione quibusdam voluptatem quia omnis',0,'2021-03-26 06:14:41',NULL,NULL),(7,1,'illo expedita consequatur quia in',0,'2021-03-26 06:14:41',NULL,NULL),(8,1,'quo adipisci enim quam ut ab',1,'2021-03-26 06:14:41',NULL,NULL),(9,1,'molestiae perspiciatis ipsa',0,'2021-03-26 06:14:42',NULL,NULL),(10,1,'illo est ratione doloremque quia maiores aut',1,'2021-03-26 06:14:42',NULL,NULL),(11,1,'vero rerum temporibus dolor',1,'2021-03-26 06:14:42',NULL,NULL),(12,1,'ipsa repellendus fugit nisi',1,'2021-03-26 06:14:42',NULL,NULL),(13,1,'et doloremque nulla',0,'2021-03-26 06:14:42',NULL,NULL),(14,1,'repellendus sunt dolores architecto voluptatum',1,'2021-03-26 06:14:42',NULL,NULL),(15,1,'ab voluptatum amet voluptas',1,'2021-03-26 06:14:42',NULL,NULL),(16,1,'accusamus eos facilis sint et aut voluptatem',1,'2021-03-26 06:14:42',NULL,NULL),(17,1,'quo laboriosam deleniti aut qui',1,'2021-03-26 06:14:42',NULL,NULL),(18,1,'dolorum est consequatur ea mollitia in culpa',0,'2021-03-26 06:14:42',NULL,NULL),(19,1,'molestiae ipsa aut voluptatibus pariatur dolor nihil',1,'2021-03-26 06:14:42',NULL,NULL),(20,1,'ullam nobis libero sapiente ad optio sint',1,'2021-03-26 06:14:43',NULL,NULL),(21,2,'suscipit repellat esse quibusdam voluptatem incidunt',0,'2021-03-26 06:14:43',NULL,NULL),(22,2,'distinctio vitae autem nihil ut molestias quo',1,'2021-03-26 06:14:43',NULL,NULL),(23,2,'et itaque necessitatibus maxime molestiae qui quas velit',0,'2021-03-26 06:14:43',NULL,NULL),(24,2,'adipisci non ad dicta qui amet quaerat doloribus ea',0,'2021-03-26 06:14:43',NULL,NULL),(25,2,'voluptas quo tenetur perspiciatis explicabo natus',1,'2021-03-26 06:14:43',NULL,NULL),(26,2,'aliquam aut quasi',1,'2021-03-26 06:14:43',NULL,NULL),(27,2,'veritatis pariatur delectus',1,'2021-03-26 06:14:43',NULL,NULL),(28,2,'nesciunt totam sit blanditiis sit',0,'2021-03-26 06:14:43',NULL,NULL),(29,2,'laborum aut in quam',0,'2021-03-26 06:14:43',NULL,NULL),(30,2,'nemo perspiciatis repellat ut dolor libero commodi blanditiis omnis',1,'2021-03-26 06:14:43',NULL,NULL),(31,2,'repudiandae totam in est sint facere fuga',0,'2021-03-26 06:14:44',NULL,NULL),(32,2,'earum doloribus ea doloremque quis',0,'2021-03-26 06:14:44',NULL,NULL),(33,2,'sint sit aut vero',0,'2021-03-26 06:14:44',NULL,NULL),(34,2,'porro aut necessitatibus eaque distinctio',0,'2021-03-26 06:14:44',NULL,NULL),(35,2,'repellendus veritatis molestias dicta incidunt',1,'2021-03-26 06:14:44',NULL,NULL),(36,2,'excepturi deleniti adipisci voluptatem et neque optio illum ad',1,'2021-03-26 06:14:44',NULL,NULL),(37,2,'sunt cum tempora',0,'2021-03-26 06:14:44',NULL,NULL),(38,2,'totam quia non',0,'2021-03-26 06:14:44',NULL,'2021-03-29 23:32:19'),(39,2,'doloremque quibusdam asperiores libero corrupti illum qui omnis',0,'2021-03-26 06:14:45',NULL,'2021-03-29 23:32:11'),(41,3,'aliquid amet impedit consequatur aspernatur placeat eaque fugiat suscipit',0,'2021-03-26 06:14:45',NULL,NULL),(42,3,'rerum perferendis error quia ut eveniet',0,'2021-03-26 06:14:45',NULL,NULL),(43,3,'tempore ut sint quis recusandae',1,'2021-03-26 06:14:45',NULL,NULL),(44,3,'cum debitis quis accusamus doloremque ipsa natus sapiente omnis',1,'2021-03-26 06:14:45',NULL,NULL),(45,3,'velit soluta adipisci molestias reiciendis harum',0,'2021-03-26 06:14:45',NULL,NULL),(46,3,'vel voluptatem repellat nihil placeat corporis',0,'2021-03-26 06:14:45',NULL,NULL),(47,3,'nam qui rerum fugiat accusamus',0,'2021-03-26 06:14:46',NULL,NULL),(48,3,'sit reprehenderit omnis quia',0,'2021-03-26 06:14:46',NULL,NULL),(49,3,'ut necessitatibus aut maiores debitis officia blanditiis velit et',0,'2021-03-26 06:14:46',NULL,NULL),(50,3,'cupiditate necessitatibus ullam aut quis dolor voluptate',1,'2021-03-26 06:14:46',NULL,NULL),(51,3,'distinctio exercitationem ab doloribus',0,'2021-03-26 06:14:46',NULL,NULL),(52,3,'nesciunt dolorum quis recusandae ad pariatur ratione',0,'2021-03-26 06:14:46',NULL,NULL),(53,3,'qui labore est occaecati recusandae aliquid quam',0,'2021-03-26 06:14:46',NULL,NULL),(54,3,'quis et est ut voluptate quam dolor',1,'2021-03-26 06:14:46',NULL,NULL),(55,3,'voluptatum omnis minima qui occaecati provident nulla voluptatem ratione',1,'2021-03-26 06:14:46',NULL,NULL),(56,3,'deleniti ea temporibus enim',1,'2021-03-26 06:14:47',NULL,NULL),(57,3,'pariatur et magnam ea doloribus similique voluptatem rerum quia',0,'2021-03-26 06:14:47',NULL,NULL),(58,3,'est dicta totam qui explicabo doloribus qui dignissimos',0,'2021-03-26 06:14:47',NULL,NULL),(59,3,'perspiciatis velit id laborum placeat iusto et aliquam odio',0,'2021-03-26 06:14:47',NULL,NULL),(60,3,'et sequi qui architecto ut adipisci',1,'2021-03-26 06:14:47',NULL,NULL),(61,4,'odit optio omnis qui sunt',1,'2021-03-26 06:14:47',NULL,NULL),(62,4,'et placeat et tempore aspernatur sint numquam',0,'2021-03-26 06:14:47',NULL,NULL),(63,4,'doloremque aut dolores quidem fuga qui nulla',1,'2021-03-26 06:14:47',NULL,NULL),(64,4,'voluptas consequatur qui ut quia magnam nemo esse',0,'2021-03-26 06:14:47',NULL,NULL),(65,4,'fugiat pariatur ratione ut asperiores necessitatibus magni',0,'2021-03-26 06:14:48',NULL,NULL),(66,4,'rerum eum molestias autem voluptatum sit optio',0,'2021-03-26 06:14:48',NULL,NULL),(67,4,'quia voluptatibus voluptatem quos similique maiores repellat',0,'2021-03-26 06:14:48',NULL,NULL),(68,4,'aut id perspiciatis voluptatem iusto',0,'2021-03-26 06:14:48',NULL,NULL),(69,4,'doloribus sint dolorum ab adipisci itaque dignissimos aliquam suscipit',0,'2021-03-26 06:14:48',NULL,NULL),(70,4,'ut sequi accusantium et mollitia delectus sunt',0,'2021-03-26 06:14:48',NULL,NULL),(71,4,'aut velit saepe ullam',0,'2021-03-26 06:14:48',NULL,NULL),(72,4,'praesentium facilis facere quis harum voluptatibus voluptatem eum',0,'2021-03-26 06:14:48',NULL,NULL),(73,4,'sint amet quia totam corporis qui exercitationem commodi',1,'2021-03-26 06:14:49',NULL,NULL),(74,4,'expedita tempore nobis eveniet laborum maiores',0,'2021-03-26 06:14:49',NULL,NULL),(75,4,'occaecati adipisci est possimus totam',0,'2021-03-26 06:14:49',NULL,NULL),(76,4,'sequi dolorem sed',1,'2021-03-26 06:14:49',NULL,NULL),(77,4,'maiores aut nesciunt delectus exercitationem vel assumenda eligendi at',0,'2021-03-26 06:14:49',NULL,NULL),(78,4,'reiciendis est magnam amet nemo iste recusandae impedit quaerat',0,'2021-03-26 06:14:49',NULL,NULL),(79,4,'eum ipsa maxime ut',1,'2021-03-26 06:14:49',NULL,NULL),(80,4,'tempore molestias dolores rerum sequi voluptates ipsum consequatur',1,'2021-03-26 06:14:49',NULL,NULL),(81,5,'suscipit qui totam',1,'2021-03-26 06:14:50',NULL,NULL),(82,5,'voluptates eum voluptas et dicta',0,'2021-03-26 06:14:50',NULL,NULL),(83,5,'quidem at rerum quis ex aut sit quam',1,'2021-03-26 06:14:50',NULL,NULL),(84,5,'sunt veritatis ut voluptate',0,'2021-03-26 06:14:50',NULL,NULL),(85,5,'et quia ad iste a',1,'2021-03-26 06:14:50',NULL,NULL),(86,5,'incidunt ut saepe autem',1,'2021-03-26 06:14:50',NULL,NULL),(87,5,'laudantium quae eligendi consequatur quia et vero autem',1,'2021-03-26 06:14:50',NULL,NULL),(88,5,'vitae aut excepturi laboriosam sint aliquam et et accusantium',0,'2021-03-26 06:14:50',NULL,NULL),(89,5,'sequi ut omnis et',1,'2021-03-26 06:14:50',NULL,NULL),(90,5,'molestiae nisi accusantium tenetur dolorem et',1,'2021-03-26 06:14:51',NULL,NULL),(91,5,'nulla quis consequatur saepe qui id expedita',1,'2021-03-26 06:14:51',NULL,NULL),(92,5,'in omnis laboriosam',1,'2021-03-26 06:14:51',NULL,NULL),(93,5,'odio iure consequatur molestiae quibusdam necessitatibus quia sint',1,'2021-03-26 06:14:51',NULL,NULL),(94,5,'facilis modi saepe mollitia',0,'2021-03-26 06:14:51',NULL,NULL),(95,5,'vel nihil et molestiae iusto assumenda nemo quo ut',1,'2021-03-26 06:14:51',NULL,NULL),(96,5,'nobis suscipit ducimus enim asperiores voluptas',0,'2021-03-26 06:14:51',NULL,NULL),(97,5,'dolorum laboriosam eos qui iure aliquam',0,'2021-03-26 06:14:51',NULL,NULL),(98,5,'debitis accusantium ut quo facilis nihil quis sapiente necessitatibus',1,'2021-03-26 06:14:52',NULL,NULL),(99,5,'neque voluptates ratione',0,'2021-03-26 06:14:52',NULL,NULL),(100,5,'excepturi a et neque qui expedita vel voluptate',0,'2021-03-26 06:14:52',NULL,NULL),(101,6,'explicabo enim cumque porro aperiam occaecati minima',0,'2021-03-26 06:14:52',NULL,NULL),(102,6,'sed ab consequatur',0,'2021-03-26 06:14:52',NULL,NULL),(103,6,'non sunt delectus illo nulla tenetur enim omnis',0,'2021-03-26 06:14:53',NULL,NULL),(104,6,'excepturi non laudantium quo',0,'2021-03-26 06:14:53',NULL,NULL),(105,6,'totam quia dolorem et illum repellat voluptas optio',1,'2021-03-26 06:14:53',NULL,NULL),(106,6,'ad illo quis voluptatem temporibus',1,'2021-03-26 06:14:53',NULL,NULL),(107,6,'praesentium facilis omnis laudantium fugit ad iusto nihil nesciunt',0,'2021-03-26 06:14:53',NULL,NULL),(108,6,'a eos eaque nihil et exercitationem incidunt delectus',1,'2021-03-26 06:14:53',NULL,NULL),(109,6,'autem temporibus harum quisquam in culpa',1,'2021-03-26 06:14:54',NULL,NULL),(110,6,'aut aut ea corporis',1,'2021-03-26 06:14:54',NULL,NULL),(111,6,'magni accusantium labore et id quis provident',0,'2021-03-26 06:14:54',NULL,NULL),(112,6,'consectetur impedit quisquam qui deserunt non rerum consequuntur eius',0,'2021-03-26 06:14:54',NULL,NULL),(113,6,'quia atque aliquam sunt impedit voluptatum rerum assumenda nisi',0,'2021-03-26 06:14:54',NULL,NULL),(114,6,'cupiditate quos possimus corporis quisquam exercitationem beatae',0,'2021-03-26 06:14:54',NULL,NULL),(115,6,'sed et ea eum',0,'2021-03-26 06:14:55',NULL,NULL),(116,6,'ipsa dolores vel facilis ut',1,'2021-03-26 06:14:55',NULL,NULL),(117,6,'sequi quae est et qui qui eveniet asperiores',0,'2021-03-26 06:14:55',NULL,NULL),(118,6,'quia modi consequatur vero fugiat',0,'2021-03-26 06:14:55',NULL,NULL),(119,6,'corporis ducimus ea perspiciatis iste',0,'2021-03-26 06:14:55',NULL,NULL),(120,6,'dolorem laboriosam vel voluptas et aliquam quasi',0,'2021-03-26 06:14:55',NULL,NULL),(121,7,'inventore aut nihil minima laudantium hic qui omnis',1,'2021-03-26 06:14:55',NULL,NULL),(122,7,'provident aut nobis culpa',1,'2021-03-26 06:14:55',NULL,NULL),(123,7,'esse et quis iste est earum aut impedit',0,'2021-03-26 06:14:55',NULL,NULL),(124,7,'qui consectetur id',0,'2021-03-26 06:14:55',NULL,NULL),(125,7,'aut quasi autem iste tempore illum possimus',0,'2021-03-26 06:14:56',NULL,NULL),(126,7,'ut asperiores perspiciatis veniam ipsum rerum saepe',1,'2021-03-26 06:14:56',NULL,NULL),(127,7,'voluptatem libero consectetur rerum ut',1,'2021-03-26 06:14:56',NULL,NULL),(128,7,'eius omnis est qui voluptatem autem',0,'2021-03-26 06:14:56',NULL,NULL),(129,7,'rerum culpa quis harum',0,'2021-03-26 06:14:56',NULL,NULL),(130,7,'nulla aliquid eveniet harum laborum libero alias ut unde',1,'2021-03-26 06:14:56',NULL,NULL),(131,7,'qui ea incidunt quis',0,'2021-03-26 06:14:56',NULL,NULL),(132,7,'qui molestiae voluptatibus velit iure harum quisquam',1,'2021-03-26 06:14:56',NULL,NULL),(133,7,'et labore eos enim rerum consequatur sunt',1,'2021-03-26 06:14:56',NULL,NULL),(134,7,'molestiae doloribus et laborum quod ea',0,'2021-03-26 06:14:56',NULL,NULL),(135,7,'facere ipsa nam eum voluptates reiciendis vero qui',0,'2021-03-26 06:14:56',NULL,NULL),(136,7,'asperiores illo tempora fuga sed ut quasi adipisci',0,'2021-03-26 06:14:57',NULL,NULL),(137,7,'qui sit non',0,'2021-03-26 06:14:57',NULL,NULL),(138,7,'placeat minima consequatur rem qui ut',1,'2021-03-26 06:14:57',NULL,NULL),(139,7,'consequatur doloribus id possimus voluptas a voluptatem',0,'2021-03-26 06:14:57',NULL,NULL),(140,7,'aut consectetur in blanditiis deserunt quia sed laboriosam',1,'2021-03-26 06:14:57',NULL,NULL),(141,8,'explicabo consectetur debitis voluptates quas quae culpa rerum non',1,'2021-03-26 06:14:57',NULL,NULL),(142,8,'maiores accusantium architecto necessitatibus reiciendis ea aut',1,'2021-03-26 06:14:57',NULL,NULL),(143,8,'eum non recusandae cupiditate animi',0,'2021-03-26 06:14:57',NULL,NULL),(144,8,'ut eum exercitationem sint',0,'2021-03-26 06:14:58',NULL,NULL),(145,8,'beatae qui ullam incidunt voluptatem non nisi aliquam',0,'2021-03-26 06:14:58',NULL,NULL),(146,8,'molestiae suscipit ratione nihil odio libero impedit vero totam',1,'2021-03-26 06:14:58',NULL,NULL),(147,8,'eum itaque quod reprehenderit et facilis dolor autem ut',1,'2021-03-26 06:14:58',NULL,NULL),(148,8,'esse quas et quo quasi exercitationem',0,'2021-03-26 06:14:58',NULL,NULL),(149,8,'animi voluptas quod perferendis est',0,'2021-03-26 06:14:58',NULL,NULL),(150,8,'eos amet tempore laudantium fugit a',0,'2021-03-26 06:14:58',NULL,NULL),(151,8,'accusamus adipisci dicta qui quo ea explicabo sed vero',1,'2021-03-26 06:14:58',NULL,NULL),(152,8,'odit eligendi recusandae doloremque cumque non',0,'2021-03-26 06:14:58',NULL,NULL),(153,8,'ea aperiam consequatur qui repellat eos',0,'2021-03-26 06:14:58',NULL,NULL),(154,8,'rerum non ex sapiente',1,'2021-03-26 06:14:58',NULL,NULL),(155,8,'voluptatem nobis consequatur et assumenda magnam',1,'2021-03-26 06:14:59',NULL,NULL),(156,8,'nam quia quia nulla repellat assumenda quibusdam sit nobis',1,'2021-03-26 06:14:59',NULL,NULL),(157,8,'dolorem veniam quisquam deserunt repellendus',1,'2021-03-26 06:14:59',NULL,NULL),(158,8,'debitis vitae delectus et harum accusamus aut deleniti a',1,'2021-03-26 06:14:59',NULL,NULL),(159,8,'debitis adipisci quibusdam aliquam sed dolore ea praesentium nobis',1,'2021-03-26 06:14:59',NULL,NULL),(160,8,'et praesentium aliquam est',0,'2021-03-26 06:15:00',NULL,NULL),(161,9,'ex hic consequuntur earum omnis alias ut occaecati culpa',1,'2021-03-26 06:15:00',NULL,NULL),(162,9,'omnis laboriosam molestias animi sunt dolore',1,'2021-03-26 06:15:00',NULL,NULL),(163,9,'natus corrupti maxime laudantium et voluptatem laboriosam odit',0,'2021-03-26 06:15:00',NULL,NULL),(164,9,'reprehenderit quos aut aut consequatur est sed',0,'2021-03-26 06:15:00',NULL,NULL),(165,9,'fugiat perferendis sed aut quidem',0,'2021-03-26 06:15:00',NULL,NULL),(166,9,'quos quo possimus suscipit minima ut',0,'2021-03-26 06:15:00',NULL,NULL),(167,9,'et quis minus quo a asperiores molestiae',0,'2021-03-26 06:15:01',NULL,NULL),(168,9,'recusandae quia qui sunt libero',0,'2021-03-26 06:15:01',NULL,NULL),(169,9,'ea odio perferendis officiis',1,'2021-03-26 06:15:01',NULL,NULL),(170,9,'quisquam aliquam quia doloribus aut',0,'2021-03-26 06:15:01',NULL,NULL),(171,9,'fugiat aut voluptatibus corrupti deleniti velit iste odio',1,'2021-03-26 06:15:01',NULL,NULL),(172,9,'et provident amet rerum consectetur et voluptatum',0,'2021-03-26 06:15:01',NULL,NULL),(173,9,'harum ad aperiam quis',0,'2021-03-26 06:15:01',NULL,NULL),(174,9,'similique aut quo',0,'2021-03-26 06:15:01',NULL,NULL),(175,9,'laudantium eius officia perferendis provident perspiciatis asperiores',1,'2021-03-26 06:15:01',NULL,NULL),(176,9,'magni soluta corrupti ut maiores rem quidem',0,'2021-03-26 06:15:01',NULL,NULL),(177,9,'et placeat temporibus voluptas est tempora quos quibusdam',0,'2021-03-26 06:15:02',NULL,NULL),(178,9,'nesciunt itaque commodi tempore',1,'2021-03-26 06:15:02',NULL,NULL),(179,9,'omnis consequuntur cupiditate impedit itaque ipsam quo',1,'2021-03-26 06:15:02',NULL,NULL),(180,9,'debitis nisi et dolorem repellat et',1,'2021-03-26 06:15:02',NULL,NULL),(181,10,'ut cupiditate sequi aliquam fuga maiores',0,'2021-03-26 06:15:02',NULL,NULL),(182,10,'inventore saepe cumque et aut illum enim',1,'2021-03-26 06:15:02',NULL,NULL),(183,10,'omnis nulla eum aliquam distinctio',1,'2021-03-26 06:15:02',NULL,NULL),(184,10,'molestias modi perferendis perspiciatis',0,'2021-03-26 06:15:02',NULL,NULL),(185,10,'voluptates dignissimos sed doloribus animi quaerat aut',0,'2021-03-26 06:15:02',NULL,NULL),(186,10,'explicabo odio est et',0,'2021-03-26 06:15:03',NULL,NULL),(187,10,'consequuntur animi possimus',0,'2021-03-26 06:15:03',NULL,NULL),(188,10,'vel non beatae est',1,'2021-03-26 06:15:03',NULL,NULL),(189,10,'culpa eius et voluptatem et',1,'2021-03-26 06:15:03',NULL,NULL),(190,10,'accusamus sint iusto et voluptatem exercitationem',1,'2021-03-26 06:15:03',NULL,NULL),(191,10,'temporibus atque distinctio omnis eius impedit tempore molestias pariatur',1,'2021-03-26 06:15:03',NULL,NULL),(192,10,'ut quas possimus exercitationem sint voluptates',0,'2021-03-26 06:15:03',NULL,NULL),(193,10,'rerum debitis voluptatem qui eveniet tempora distinctio a',1,'2021-03-26 06:15:04',NULL,NULL),(194,10,'sed ut vero sit molestiae',0,'2021-03-26 06:15:04',NULL,NULL),(195,10,'rerum ex veniam mollitia voluptatibus pariatur',1,'2021-03-26 06:15:04',NULL,NULL),(196,10,'consequuntur aut ut fugit similique',1,'2021-03-26 06:15:04',NULL,NULL),(197,10,'dignissimos quo nobis earum saepe',1,'2021-03-26 06:15:04',NULL,NULL),(198,10,'quis eius est sint explicabo',1,'2021-03-26 06:15:04',NULL,NULL),(199,10,'numquam repellendus a magnam',1,'2021-03-26 06:15:04',NULL,NULL),(200,10,'ipsam aperiam voluptates qui',0,'2021-03-26 06:15:05',NULL,NULL),(202,1,'test',1,NULL,NULL,'2021-03-29 23:30:18');
/*!40000 ALTER TABLE `todos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_logs`
--

DROP TABLE IF EXISTS `user_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_logs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_logs_user_id_foreign` (`user_id`),
  CONSTRAINT `user_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logs`
--

LOCK TABLES `user_logs` WRITE;
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_verifications`
--

DROP TABLE IF EXISTS `user_verifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_verifications` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `token` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_verifications_user_id_foreign` (`user_id`),
  CONSTRAINT `user_verifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_verifications`
--

LOCK TABLES `user_verifications` WRITE;
/*!40000 ALTER TABLE `user_verifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_verifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('ADMIN','USER') COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','Admin','Admin','admin@todo.com','$2y$10$fAE4tk5NxKOSXJEc5/xoG.6SpkhPF3mILQSQPEqmviX0oind0hrDK','ADMIN',1,'2021-03-26 14:09:50','2021-03-26 14:09:50',NULL),(2,'user','user','user','user@todo.com','$2y$10$puvD365LGo3rS9ewePXk1.Nl8PcPqVcnV59MrAYMMagzMguETMym2','USER',1,'2021-03-26 14:09:50','2021-03-26 14:09:50',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-30 15:43:11
