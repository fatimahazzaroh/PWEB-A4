-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pweb-a4
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `alamat`
--

DROP TABLE IF EXISTS `alamat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alamat` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kabupaten_id` int NOT NULL,
  `kecamatan_id` int NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kabupaten_id` (`kabupaten_id`),
  KEY `kecamatan_id` (`kecamatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alamat`
--

LOCK TABLES `alamat` WRITE;
/*!40000 ALTER TABLE `alamat` DISABLE KEYS */;
INSERT INTO `alamat` VALUES (1,1,1,'Perumahan Argopuro SA 5'),(2,1,2,'Pesona Regency blok AA2, no 14'),(3,1,1,'Jalan Melati 12, no 31A'),(4,1,1,'Jalan Kenanga 11, no 2'),(5,1,1,'Jalan Cendana 7 no 25'),(6,1,4,'Jalan Merdeka 4 no 11\n'),(7,1,3,'Jalan Surya Kencana 3 no 17'),(8,1,3,'Jalan Pahlawan 5 no 9\n'),(9,1,1,'Jalan Diponegoro 8 no 23'),(10,1,2,'\rJalan Ganesha 6 no 31\r '),(11,1,2,'Pesona Regency blok AC5, no 6'),(24,1,1,'aaa');
/*!40000 ALTER TABLE `alamat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `individuals`
--

DROP TABLE IF EXISTS `individuals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `individuals` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `alamat_id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles_id` int unsigned NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  KEY `alamat_id` (`alamat_id`),
  KEY `roles_id` (`roles_id`),
  CONSTRAINT `individuals_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `individuals`
--

LOCK TABLES `individuals` WRITE;
/*!40000 ALTER TABLE `individuals` DISABLE KEYS */;
INSERT INTO `individuals` VALUES (1,'Desy Fitriani','081234567890',1,'owner@gmail.com','$2y$10$LSxYMjVZTMqVerAAFLm6S.ftnWHjoA9hSwLq9KXAEqd6Q8jZ8v/NO',1),(2,'Imayatun Nazziroh','087654321098',2,'admin@gmail.com','$2y$10$LSxYMjVZTMqVerAAFLm6S.ftnWHjoA9hSwLq9KXAEqd6Q8jZ8v/NO',2),(3,'Fina Aulia','089876543210',3,'cust1@gmail.com','$2y$10$LSxYMjVZTMqVerAAFLm6S.ftnWHjoA9hSwLq9KXAEqd6Q8jZ8v/NO',3),(4,'Andy Maulana','081234567891',4,'cust2@gmail.com','$2y$10$LSxYMjVZTMqVerAAFLm6S.ftnWHjoA9hSwLq9KXAEqd6Q8jZ8v/NO',3),(5,'Imam Adi Syahputra','085678901234',5,'cust3@gmail.com','$2y$10$LSxYMjVZTMqVerAAFLm6S.ftnWHjoA9hSwLq9KXAEqd6Q8jZ8v/NO',3),(6,'Agus Tio','089012345678',6,'cust4@gmail.com','$2y$10$LSxYMjVZTMqVerAAFLm6S.ftnWHjoA9hSwLq9KXAEqd6Q8jZ8v/NO',3),(7,'Rafi Ahsira','081234567892',7,'cust5@gmail.com','$2y$10$LSxYMjVZTMqVerAAFLm6S.ftnWHjoA9hSwLq9KXAEqd6Q8jZ8v/NO',3),(8,'Dimas Kemat','087654321099',8,'cust6@gmail.com','$2y$10$LSxYMjVZTMqVerAAFLm6S.ftnWHjoA9hSwLq9KXAEqd6Q8jZ8v/NO',3),(9,'Aldi Lutfiansyah','089876543211',9,'cust7@gmail.com','$2y$10$LSxYMjVZTMqVerAAFLm6S.ftnWHjoA9hSwLq9KXAEqd6Q8jZ8v/NO',3),(10,'Sindy Amelia','081234567893',10,'cust8@gmail.com','$2y$10$LSxYMjVZTMqVerAAFLm6S.ftnWHjoA9hSwLq9KXAEqd6Q8jZ8v/NO',3),(11,'Nanda syahputri','085678901235',11,'cust9@gmail.com','$2y$10$LSxYMjVZTMqVerAAFLm6S.ftnWHjoA9hSwLq9KXAEqd6Q8jZ8v/NO',3),(18,'aaa','22',24,'aaa@gmail.com','$2y$10$LSxYMjVZTMqVerAAFLm6S.ftnWHjoA9hSwLq9KXAEqd6Q8jZ8v/NO',3);
/*!40000 ALTER TABLE `individuals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_kamar`
--

DROP TABLE IF EXISTS `jenis_kamar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_kamar` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `jenis_kamar` varchar(255) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_kamar`
--

LOCK TABLES `jenis_kamar` WRITE;
/*!40000 ALTER TABLE `jenis_kamar` DISABLE KEYS */;
INSERT INTO `jenis_kamar` VALUES (1,'Pawtopia',100000,'Kandang berukuran 150 cm x 80 cm untuk kucing. Pasir diganti sehari 2x, pemberian makan sehari 3x'),(2,'Meowspace',150000,'Ruangan berukuran 2 m x 2 m, bersama 3 kucing lainnya. Pasir diganti sehari 2x, pemberian dry food 2x sehari, pemberian wetfood 1x sehari.');
/*!40000 ALTER TABLE `jenis_kamar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kabupaten`
--

DROP TABLE IF EXISTS `kabupaten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kabupaten` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kabupaten` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kabupaten`
--

LOCK TABLES `kabupaten` WRITE;
/*!40000 ALTER TABLE `kabupaten` DISABLE KEYS */;
INSERT INTO `kabupaten` VALUES (1,'Jember');
/*!40000 ALTER TABLE `kabupaten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kamar`
--

DROP TABLE IF EXISTS `kamar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kamar` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `jenis_kamar_id` int unsigned NOT NULL,
  `no_kamar` int NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`id`),
  KEY `jenis_kamar_id` (`jenis_kamar_id`),
  CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`jenis_kamar_id`) REFERENCES `jenis_kamar` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kamar`
--

LOCK TABLES `kamar` WRITE;
/*!40000 ALTER TABLE `kamar` DISABLE KEYS */;
INSERT INTO `kamar` VALUES (1,1,1,'enable'),(2,1,2,'enable'),(3,1,3,'enable'),(4,1,4,'disable'),(5,1,5,'disable'),(6,1,6,'disable'),(7,1,7,'disable'),(8,1,8,'disable'),(9,1,9,'disable'),(10,1,10,'enable'),(11,2,1,'enable'),(12,2,2,'enable'),(13,2,3,'enable'),(14,2,4,'enable'),(15,2,5,'enable'),(16,2,6,'enable'),(17,2,7,'enable'),(18,2,8,'enable'),(19,2,9,'enable'),(20,2,10,'enable');
/*!40000 ALTER TABLE `kamar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kecamatan` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kecamatan`
--

LOCK TABLES `kecamatan` WRITE;
/*!40000 ALTER TABLE `kecamatan` DISABLE KEYS */;
INSERT INTO `kecamatan` VALUES (1,'Ajung'),(2,'Ambulu'),(3,'Arjasa'),(4,'Balung'),(5,'Bangsalsari'),(6,'Gumukmas'),(7,'Jelbuk'),(8,'Jenggawah'),(9,'Jombang'),(10,'Kalisat'),(11,'Kaliwates'),(12,'Kencong'),(13,'Ledokombo'),(14,'Mayang'),(15,'Mumbulsari'),(16,'Pakusari'),(17,'Panti'),(18,'Patrang'),(19,'Puger'),(20,'Rambipuji'),(21,'Semboro'),(22,'Silo'),(23,'Sukorambi'),(24,'Sukowono'),(25,'Sumberbaru'),(26,'Sumberjambe'),(27,'Sumbersari'),(28,'Tanggul'),(29,'Tempurejo'),(30,'Umbulsari'),(31,'Wuluhan');
/*!40000 ALTER TABLE `kecamatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporan`
--

DROP TABLE IF EXISTS `laporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laporan` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text,
  `penitipan_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `penitipan_id_idx` (`penitipan_id`),
  CONSTRAINT `penitipan_id` FOREIGN KEY (`penitipan_id`) REFERENCES `penitipan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan`
--

LOCK TABLES `laporan` WRITE;
/*!40000 ALTER TABLE `laporan` DISABLE KEYS */;
INSERT INTO `laporan` VALUES (1,'2024-04-08','Kucing makan dengan lahap, sekarang sedang tidur','',1),(2,'2024-04-09','Kucing tidur sejak tadi, sepertinya kelelahan setelah banyak bermain','',2),(3,'2024-04-09','Kucing Anda baru saja selesai makan dengan lahap. ','',3),(4,'2024-04-14','Kucing Anda tidur seharian, sepertinya belum beradaptasi dilingkungan baru, tapi dia makan dengan lahap','',4),(5,'2024-04-16','Kucing aktif bermain dengan kucing lainnya. makanannya juga baru saja diberikan dan kucing Anda lahap memakannya','',5),(6,'2024-04-16','Kucing Anda adalah pendiam yang senang mengamati sekitarnya. Dia lebih suka diam dan menikmati kedamaian kandangnya sendiri, tetapi masih aktif bermain saat diundang oleh kucing lain','',6),(7,'2024-04-18','Kucing Anda adalah penikmat makanan yang baik. Setiap kali diberikan makanan, dia langsung menyantapnya dengan lahap dan terlihat sangat puas','',7),(8,'2024-04-20','Kucing Anda adalah penjelajah yang sangat aktif. Dia sering memeriksa setiap sudut kandang dan selalu siap untuk petualangan baru.','',8),(9,'2024-04-24','Kucing Anda sangat sosial dan senang berinteraksi dengan kucing lainnya. Dia sudah berbaur dengan baik di lingkungan penitipan dan terlihat bahagia.','',9);
/*!40000 ALTER TABLE `laporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penitipan`
--

DROP TABLE IF EXISTS `penitipan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penitipan` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `individuals_id` int unsigned NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `kamar_id` int unsigned NOT NULL,
  `nama_kucing` varchar(255) NOT NULL,
  `status_id` int unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `kamar_id` (`kamar_id`),
  KEY `individuals_id` (`individuals_id`),
  CONSTRAINT `penitipan_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `penitipan_ibfk_2` FOREIGN KEY (`kamar_id`) REFERENCES `kamar` (`id`),
  CONSTRAINT `penitipan_ibfk_3` FOREIGN KEY (`individuals_id`) REFERENCES `individuals` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penitipan`
--

LOCK TABLES `penitipan` WRITE;
/*!40000 ALTER TABLE `penitipan` DISABLE KEYS */;
INSERT INTO `penitipan` VALUES (1,3,'2024-04-08','2024-04-10',1,'Fluffy',3),(2,4,'2024-04-09','2024-04-12',2,'Milo',3),(3,5,'2024-04-09','2024-04-12',3,'Oreo',3),(4,6,'2024-04-14','2024-04-16',4,'Kitkat',2),(5,7,'2024-04-16','2024-04-18',5,'Panda',2),(6,8,'2024-04-16','2024-04-20',6,'Mitty',2),(7,9,'2024-04-18','2024-04-22',7,'Wisky',2),(8,10,'2024-04-20','2024-04-24',8,'Luna',1),(9,11,'2024-04-24','2024-04-26',9,'Coco',1);
/*!40000 ALTER TABLE `penitipan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'owner'),(2,'admin'),(3,'cust');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'booked'),(2,'progress'),(3,'done');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-03 14:07:10
