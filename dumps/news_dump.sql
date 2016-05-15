-- MySQL dump 10.13  Distrib 5.7.12, for Linux (x86_64)
--
-- Host: localhost    Database: portal
-- ------------------------------------------------------
-- Server version	5.7.12-0ubuntu1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `subtitle` varchar(90) DEFAULT NULL,
  `intro_text` varchar(150) DEFAULT NULL,
  `full_text` text,
  `image` varchar(120) DEFAULT NULL,
  `publish_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_news_1_idx` (`id_user`),
  CONSTRAINT `fk_news_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (2,'The latest cellphone','Watch our latest cellphone','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pulvinar pharetra feugiat. Nullam sit amet ex sit amet justo tincidunt cursus. Nam diam turpis, bibendum eget dapibus maximus, porta sed mi. Sed pharetra consectetur libero, vitae maximus magna efficitur quis. Curabitur ut aliquet nisl. Ut eu suscipit augue. Nunc euismod lacus eu bibendum ultrices. Nam quis aliquet nisi. Donec semper ut urna sit amet vestibulum.\r\n\r\nNunc sollicitudin tincidunt sapien vel bibendum. Phasellus a purus aliquet, maximus mi eget, eleifend purus. Phasellus efficitur volutpat accumsan. Sed nec vulputate felis, ut porta risus. Etiam risus mi, laoreet eu mi eget, tempor facilisis metus. Nunc bibendum varius nisi, non euismod quam iaculis sodales. Nulla tempus turpis ut purus fermentum egestas. Mauris nec mauris mauris. Phasellus ullamcorper imperdiet erat, posuere suscipit nibh lobortis non. Quisque convallis, velit suscipit condimentum auctor, elit ligula sollicitudin nulla, ac semper dolor nulla sit amet tellus. Curabitur et mauris urna. Sed pharetra lacinia ex eu pellentesque. Vivamus vel volutpat velit. Nam quam massa, posuere vitae rhoncus vel, lobortis ac eros. Vivamus condimentum diam a est tempor condimentum. Ut eu scelerisque nulla.\r\n\r\nSuspendisse vehicula justo efficitur, gravida dui non, vulputate neque. Nulla ac vulputate tellus, nec commodo nisl. Donec pulvinar lacinia orci quis consectetur. Donec sit amet ultricies leo, sit amet feugiat nulla. Sed pretium ultricies justo, cursus mattis nunc suscipit nec. Suspendisse sodales enim et metus volutpat interdum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras malesuada nunc malesuada purus eleifend, non vulputate purus condimentum. Aliquam id sem malesuada, pulvinar urna nec, euismod eros. Duis vel lacus non mi pretium tempor. Nam ex dui, aliquam eget mattis vel, feugiat eget nibh. Morbi molestie orci nec ex suscipit, sed pretium nulla varius. Fusce placerat, leo non lacinia varius, sapien ex cursus nisi, eget bibendum nisi sem sed nisl. Donec vitae vehicula risus. Vivamus sit amet odio gravida, rhoncus mauris non, venenatis ipsum. Ut eu tortor fringilla arcu egestas vestibulum.\r\n\r\nCurabitur nec condimentum eros, id laoreet ante. Etiam ante velit, rutrum vel ex ac, bibendum pellentesque mauris. Aenean porttitor scelerisque lorem, vel malesuada massa vulputate quis. Phasellus hendrerit, magna vel ornare ullamcorper, augue neque fringilla ipsum, a porttitor nibh leo et felis. Morbi et auctor sapien, eget accumsan urna. Maecenas in nisl sapien. Integer imperdiet sagittis nunc nec accumsan. Sed finibus nec lectus quis euismod. Suspendisse cursus quis diam sed hendrerit. Duis consectetur neque nunc, porta tincidunt lectus venenatis eget. Aenean molestie orci vitae lacus iaculis, vitae semper magna sodales.\r\n\r\nDuis fermentum lorem id nibh imperdiet, pretium pellentesque nisi vehicula. Praesent commodo urna in rutrum vestibulum. Ut facilisis orci in commodo fringilla. Donec sagittis lectus in lacus efficitur, sed ornare mauris tempor. Integer metus massa, sollicitudin non massa nec, fermentum mattis ex. Ut quis magna at lorem dapibus tincidunt in ac massa. Suspendisse vel nunc feugiat, tincidunt augue pharetra, vulputate lacus. Aliquam ultricies justo et est varius, id faucibus purus luctus. Maecenas feugiat sem nec ligula sodales, nec volutpat quam maximus. Morbi auctor a lorem id vestibulum. Suspendisse posuere ex lacus. Nullam purus metus, pellentesque eget metus id, aliquet laoreet mi. Sed sit amet metus ut tortor rutrum luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\nIn blandit arcu id nisl bibendum interdum. Donec venenatis ex leo, vitae porta risus elementum ac. Donec a ex vehicula, vulputate ex in, tincidunt risus. Vivamus a justo suscipit sem auctor malesuada. Maecenas pulvinar tempor nibh, et rutrum velit commodo vitae. Nullam a iaculis ligula. Aenean id lectus fringilla, auctor massa et, sollicitudin enim. Quisque tempus feugiat aliquam. Ut mattis fringilla convallis. Donec lacinia.','/uploads/news/ocQawfj3Rky2B9Z.jpg',NULL,'2016-05-15 17:50:43','2016-05-15 17:50:43',1),(3,'Mobile day','Enjoy our mobile day!','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pulvinar pharetra feugiat. Nullam sit amet ex sit amet justo tincidunt cursus. Nam diam turpis, bibendum eget dapibus maximus, porta sed mi. Sed pharetra consectetur libero, vitae maximus magna efficitur quis. Curabitur ut aliquet nisl. Ut eu suscipit augue. Nunc euismod lacus eu bibendum ultrices. Nam quis aliquet nisi. Donec semper ut urna sit amet vestibulum.\r\n\r\nNunc sollicitudin tincidunt sapien vel bibendum. Phasellus a purus aliquet, maximus mi eget, eleifend purus. Phasellus efficitur volutpat accumsan. Sed nec vulputate felis, ut porta risus. Etiam risus mi, laoreet eu mi eget, tempor facilisis metus. Nunc bibendum varius nisi, non euismod quam iaculis sodales. Nulla tempus turpis ut purus fermentum egestas. Mauris nec mauris mauris. Phasellus ullamcorper imperdiet erat, posuere suscipit nibh lobortis non. Quisque convallis, velit suscipit condimentum auctor, elit ligula sollicitudin nulla, ac semper dolor nulla sit amet tellus. Curabitur et mauris urna. Sed pharetra lacinia ex eu pellentesque. Vivamus vel volutpat velit. Nam quam massa, posuere vitae rhoncus vel, lobortis ac eros. Vivamus condimentum diam a est tempor condimentum. Ut eu scelerisque nulla.\r\n\r\nSuspendisse vehicula justo efficitur, gravida dui non, vulputate neque. Nulla ac vulputate tellus, nec commodo nisl. Donec pulvinar lacinia orci quis consectetur. Donec sit amet ultricies leo, sit amet feugiat nulla. Sed pretium ultricies justo, cursus mattis nunc suscipit nec. Suspendisse sodales enim et metus volutpat interdum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras malesuada nunc malesuada purus eleifend, non vulputate purus condimentum. Aliquam id sem malesuada, pulvinar urna nec, euismod eros. Duis vel lacus non mi pretium tempor. Nam ex dui, aliquam eget mattis vel, feugiat eget nibh. Morbi molestie orci nec ex suscipit, sed pretium nulla varius. Fusce placerat, leo non lacinia varius, sapien ex cursus nisi, eget bibendum nisi sem sed nisl. Donec vitae vehicula risus. Vivamus sit amet odio gravida, rhoncus mauris non, venenatis ipsum. Ut eu tortor fringilla arcu egestas vestibulum.\r\n\r\nCurabitur nec condimentum eros, id laoreet ante. Etiam ante velit, rutrum vel ex ac, bibendum pellentesque mauris. Aenean porttitor scelerisque lorem, vel malesuada massa vulputate quis. Phasellus hendrerit, magna vel ornare ullamcorper, augue neque fringilla ipsum, a porttitor nibh leo et felis. Morbi et auctor sapien, eget accumsan urna. Maecenas in nisl sapien. Integer imperdiet sagittis nunc nec accumsan. Sed finibus nec lectus quis euismod. Suspendisse cursus quis diam sed hendrerit. Duis consectetur neque nunc, porta tincidunt lectus venenatis eget. Aenean molestie orci vitae lacus iaculis, vitae semper magna sodales.\r\n\r\nDuis fermentum lorem id nibh imperdiet, pretium pellentesque nisi vehicula. Praesent commodo urna in rutrum vestibulum. Ut facilisis orci in commodo fringilla. Donec sagittis lectus in lacus efficitur, sed ornare mauris tempor. Integer metus massa, sollicitudin non massa nec, fermentum mattis ex. Ut quis magna at lorem dapibus tincidunt in ac massa. Suspendisse vel nunc feugiat, tincidunt augue pharetra, vulputate lacus. Aliquam ultricies justo et est varius, id faucibus purus luctus. Maecenas feugiat sem nec ligula sodales, nec volutpat quam maximus. Morbi auctor a lorem id vestibulum. Suspendisse posuere ex lacus. Nullam purus metus, pellentesque eget metus id, aliquet laoreet mi. Sed sit amet metus ut tortor rutrum luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\nIn blandit arcu id nisl bibendum interdum. Donec venenatis ex leo, vitae porta risus elementum ac. Donec a ex vehicula, vulputate ex in, tincidunt risus. Vivamus a justo suscipit sem auctor malesuada. Maecenas pulvinar tempor nibh, et rutrum velit commodo vitae. Nullam a iaculis ligula. Aenean id lectus fringilla, auctor massa et, sollicitudin enim. Quisque tempus feugiat aliquam. Ut mattis fringilla convallis. Donec lacinia.','/uploads/news/pAqGP7IiudNLfQo.jpg',NULL,'2016-05-15 17:58:22','2016-05-15 17:58:22',1),(4,'Test','Test','Test','Test','/uploads/news/GmW7wDaqUShLVeQ.jpg',NULL,'2016-05-15 19:11:21','2016-05-15 19:11:21',2);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'ADMIN_ACCESS'),(2,'LIST_NEWS'),(3,'EDIT_NEWS'),(4,'DELETE_NEWS'),(5,'ADD_NEWS'),(6,'SEE_ALL_NEWS');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permission`
--

DROP TABLE IF EXISTS `role_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_permission` (
  `id_role` int(11) NOT NULL,
  `id_permission` int(11) NOT NULL,
  PRIMARY KEY (`id_role`,`id_permission`),
  KEY `fk_role_permission_2_idx` (`id_permission`),
  CONSTRAINT `fk_role_permission_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_role_permission_2` FOREIGN KEY (`id_permission`) REFERENCES `permissions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permission`
--

LOCK TABLES `role_permission` WRITE;
/*!40000 ALTER TABLE `role_permission` DISABLE KEYS */;
INSERT INTO `role_permission` VALUES (1,1),(2,1),(1,2),(2,2),(1,3),(2,3),(1,4),(2,4),(1,5),(2,5),(1,6);
/*!40000 ALTER TABLE `role_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador'),(2,'Autor'),(3,'Lector');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_role`),
  KEY `fk_user_role_2_idx` (`id_role`),
  CONSTRAINT `fk_user_role_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_role_2` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,1),(2,2);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cookie` varchar(100) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@admin.com','$2y$10$qM0ZudI/Ad7o7NuaA7WUKOoDirulOTOgxrNwVD9wWYMbIAY6jlH6m','2016-05-14 23:49:17','2016-05-14 23:49:17',NULL,'Administrador','Administrador'),(2,'joadiaz','joadiaz_93@outlook.com','$2y$10$i8pVt/Oknlx1oFUe46YMh.P8i02U8trcqdGM6O7Cu5jYCNutNdlqe','2016-05-15 17:01:04','2016-05-15 17:01:04',NULL,'Joaquin','Diaz');
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

-- Dump completed on 2016-05-15 16:21:53
