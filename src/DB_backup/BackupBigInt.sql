-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: meu_projeto
-- ------------------------------------------------------
-- Server version	5.7.18

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `endereco` varchar(20) NOT NULL,
  `clientecol` varchar(45) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `nome` (`nome`),
  UNIQUE KEY `endereco` (`endereco`),
  UNIQUE KEY `clientecol_UNIQUE` (`clientecol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(90) DEFAULT NULL,
  `rua` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datatables_demo`
--

DROP TABLE IF EXISTS `datatables_demo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datatables_demo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) NOT NULL DEFAULT '',
  `last_name` varchar(250) NOT NULL DEFAULT '',
  `position` varchar(250) NOT NULL DEFAULT '',
  `email` varchar(250) NOT NULL DEFAULT '',
  `office` varchar(250) NOT NULL DEFAULT '',
  `start_date` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `seq` int(11) DEFAULT NULL,
  `extn` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datatables_demo`
--

LOCK TABLES `datatables_demo` WRITE;
/*!40000 ALTER TABLE `datatables_demo` DISABLE KEYS */;
INSERT INTO `datatables_demo` VALUES (1,'Aguinaldo Zé Adão','Alves','System Architect','t.nixon@datatables.net','Edinburgh','2011-04-25',61,320800,2,'5421'),(3,'Luiz Magalhães','Cox','Junior Technical Author','a.cox@datatables.net','San Francisco','2009-01-12',66,86000,6,'1562'),(4,'Cedric','Kelly','Senior Javascript Developer','c.kelly@datatables.net','Edinburgh','2012-03-29',22,433060,41,'6224'),(6,'Brielle x','Williamson','Integration Specialist','b.williamson@datatables.net','New York','2012-12-02',61,372000,21,'4804'),(7,'Herrod','Chandler','Sales Assistant','h.chandler@datatables.net','San Francisco','2012-08-06',59,137500,46,'9608'),(8,'Rhona','Davidson','Integration Specialist','r.davidson@datatables.net','Tokyo','2010-10-14',55,327900,50,'6200'),(9,'Colleen','Hurst','Javascript Developer','c.hurst@datatables.net','San Francisco','2009-09-15',39,205500,26,'2360'),(10,'Sonya','Frost','Software Engineer','s.frost@datatables.net','Edinburgh','2008-12-13',23,103600,18,'1667'),(11,'Jena Xaid','Gaines','Office Manager','j.gaines@datatables.net','London','2008-12-19',30,90560,13,'3814'),(12,'Quinn','Flynn','Support Lead','q.flynn@datatables.net','Edinburgh','2013-03-03',22,342000,23,'9497'),(13,'Charde','Marshall','Regional Director','c.marshall@datatables.net','San Francisco','2008-10-16',36,470600,14,'6741'),(14,'Haley','Kennedy','Senior Marketing Designer','h.kennedy@datatables.net','London','2012-12-18',43,313500,12,'3597'),(15,'Tatyana','Fitzpatrick','Regional Director','t.fitzpatrick@datatables.net','London','2010-03-17',19,385750,54,'1965'),(16,'Michael','Silva','Marketing Designer','m.silva@datatables.net','London','2012-11-27',66,198500,37,'1581'),(17,'Paul','Byrd','Chief Financial Officer (CFO)','p.byrd@datatables.net','New York','2010-06-09',64,725000,32,'3059'),(18,'Gloria','Little','Systems Administrator','g.little@datatables.net','New York','2009-04-10',59,237500,35,'1721'),(19,'Bruna Gonçalves','Greer','Software Engineer','b.greer@datatables.net','London','2012-10-13',41,132000,48,'2558'),(20,'Dai Dias Ribeiro','Rios','Personnel Lead','d.rios@datatables.net','Edinburgh','2012-09-26',35,217500,45,'2290'),(21,'Jenette','Caldwell','Development Lead','j.caldwell@datatables.net','New York','2011-09-03',30,345000,17,'1937'),(22,'Yuri','Berry','Chief Marketing Officer (CMO)','y.berry@datatables.net','New York','2009-06-25',40,675000,57,'6154'),(23,'Caesar','Vance','Pre-Sales Support','c.vance@datatables.net','New York','2011-12-12',21,106450,29,'8330'),(24,'Doris','Wilder','Sales Assistant','d.wilder@datatables.net','Sidney','2010-09-20',23,85600,56,'3023'),(26,'Gavin','Joyce','Developer','g.joyce@datatables.net','Edinburgh','2010-12-22',42,92575,5,'8822'),(27,'Jennifer','Chang','Regional Director','j.chang@datatables.net','Singapore','2010-11-14',28,357650,51,'9239'),(28,'Brenden','Wagner','Software Engineer','b.wagner@datatables.net','San Francisco','2011-06-07',28,206850,20,'1314'),(29,'Fiona','Green','Chief Operating Officer (COO)','f.green@datatables.net','San Francisco','2010-03-11',48,850000,7,'2947'),(30,'Shou','Itou','Regional Marketing','s.itou@datatables.net','Tokyo','2011-08-14',20,163000,1,'8899'),(31,'Michelle','House','Integration Specialist','m.house@datatables.net','Sidney','2011-06-02',37,95400,39,'2769'),(32,'Suki','Burks','Developer','s.burks@datatables.net','London','2009-10-22',53,114500,40,'6832'),(33,'Prescott','Bartlett','Technical Author','p.bartlett@datatables.net','London','2011-05-07',27,145000,47,'3606'),(34,'Gavin','Cortez','Team Leader','g.cortez@datatables.net','San Francisco','2008-10-26',22,235500,52,'2860'),(35,'Martena','Mccray','Post-Sales support','m.mccray@datatables.net','Edinburgh','2011-03-09',46,324050,8,'8240'),(36,'Unity','Butler','Marketing Designer','u.butler@datatables.net','San Francisco','2009-12-09',47,85675,24,'5384'),(37,'Howard','Hatfield','Office Manager','h.hatfield@datatables.net','San Francisco','2008-12-16',51,164500,38,'7031'),(38,'Hope','Fuentes','Secretary','h.fuentes@datatables.net','San Francisco','2010-02-12',41,109850,53,'6318'),(39,'Vivian','Harrell','Financial Controller','v.harrell@datatables.net','San Francisco','2009-02-14',62,452500,30,'9422'),(40,'Timothy','Mooney','Office Manager','t.mooney@datatables.net','London','2008-12-11',37,136200,28,'7580'),(41,'Jackson Norris','Bradshaw','Director','j.bradshaw@datatables.net','New York','2008-09-26',65,645750,34,'1042'),(42,'Olivia','Liang','Support Engineer','o.liang@datatables.net','Singapore','2011-02-03',64,234500,4,'2120'),(43,'Bruno 14','Nash','Software Engineer','b.nash@datatables.net','London','2011-05-03',38,163500,3,'6222'),(44,'Sakura','Yamamoto','Support Engineer','s.yamamoto@datatables.net','Tokyo','2009-08-19',37,139575,31,'9383'),(45,'Thor','Walton','Developer','t.walton@datatables.net','New York','2013-08-11',61,98540,11,'8327'),(46,'Finn','Camacho','Support Engineer','f.camacho@datatables.net','San Francisco','2009-07-07',47,87500,10,'2927'),(47,'Serge','Baldwin','Data Coordinator','s.baldwin@datatables.net','Singapore','2012-04-15',64,138575,44,'8352'),(48,'José Adao GonCalves ','Frank','Software Engineer','z.frank@datatables.net','New York','2010-01-04',63,125250,42,'7439'),(49,'Zorita','Serrano','Software Engineer','z.serrano@datatables.net','San Francisco','2012-06-01',56,115000,27,'4389'),(50,'Jennifer','Acosta','Junior Javascript Developer','j.acosta@datatables.net','Edinburgh','2013-02-01',43,75650,49,'3431'),(51,'Cássia José','Stevens','Sales Assistant','c.stevens@datatables.net','New York','2011-12-06',46,145600,15,'3990'),(52,'Hermione','Butler','Regional Director','h.butler@datatables.net','London','2011-03-21',47,356250,9,'1016'),(53,'Lael','Greer','Systems Administrator','l.greer@datatables.net','London','2009-02-27',21,103500,25,'6733'),(54,'Jonas','Alexander','Developer','j.alexander@datatables.net','San Francisco','2010-07-14',30,86500,33,'8196'),(55,'Shad','Decker','Regional Director','s.decker@datatables.net','Edinburgh','2008-11-13',51,183000,43,'6373'),(56,'Michael','Bruce','Javascript Developer','m.bruce@datatables.net','Singapore','2011-06-27',29,183000,16,'5384'),(57,'Donna','Snider','Customer Support','d.snider@datatables.net','New York','2011-01-25',27,112000,19,'4226'),(58,'Tiger','Nixon','System Architect','t.nixon@datatables.net','Edinburgh','2011-04-25',61,320800,2,'5421'),(59,'Garrett','Winters','Accountant','g.winters@datatables.net','Tokyo','2011-07-25',63,170750,22,'8422'),(60,'Jose ticha Goncalves','Cox','Junior Technical Author','a.cox@datatables.net','San Francisco','2009-01-12',66,86000,6,'1562'),(61,'Cedric','Kelly','Senior Javascript Developer','c.kelly@datatables.net','Edinburgh','2012-03-29',22,433060,41,'6224'),(64,'Herrod','Chandler','Sales Assistant','h.chandler@datatables.net','San Francisco','2012-08-06',59,137500,46,'9608'),(65,'Rhona','Davidson','Integration Specialist','r.davidson@datatables.net','Tokyo','2010-10-14',55,327900,50,'6200'),(66,'Colleen','Hurst','Javascript Developer','c.hurst@datatables.net','San Francisco','2009-09-15',39,205500,26,'2360'),(67,'Sonya','Frost','Software Engineer','s.frost@datatables.net','Edinburgh','2008-12-13',23,103600,18,'1667'),(68,'Jena','Gaines','Office Manager','j.gaines@datatables.net','London','2008-12-19',30,90560,13,'3814'),(69,'Quinn','Flynn','Support Lead','q.flynn@datatables.net','Edinburgh','2013-03-03',22,342000,23,'9497'),(70,'Charde','Marshall','Regional Director','c.marshall@datatables.net','San Francisco','2008-10-16',36,470600,14,'6741'),(71,'Haley','Kennedy','Senior Marketing Designer','h.kennedy@datatables.net','London','2012-12-18',43,313500,12,'3597'),(72,'Tatyana','Fitzpatrick','Regional Director','t.fitzpatrick@datatables.net','London','2010-03-17',19,385750,54,'1965'),(73,'Michael','Silva','Marketing Designer','m.silva@datatables.net','London','2012-11-27',66,198500,37,'1581'),(74,'Paul','Byrd','Chief Financial Officer (CFO)','p.byrd@datatables.net','New York','2010-06-09',64,725000,32,'3059'),(75,'Gloria','Little','Systems Administrator','g.little@datatables.net','New York','2009-04-10',59,237500,35,'1721'),(77,'Dai Nepomucento','Rios','Personnel Lead','d.rios@datatables.net','Edinburgh','2012-09-26',35,217500,45,'2290'),(78,'Jenette','Caldwell','Development Lead','j.caldwell@datatables.net','New York','2011-09-03',30,345000,17,'1937'),(79,'Yuri','Berry','Chief Marketing Officer (CMO)','y.berry@datatables.net','New York','2009-06-25',40,675000,57,'6154'),(80,'Caesar','Vance','Pre-Sales Support','c.vance@datatables.net','New York','2011-12-12',21,106450,29,'8330'),(81,'Doris','Wilder','Sales Assistant','d.wilder@datatables.net','Sidney','2010-09-20',23,85600,56,'3023'),(83,'Gavin','Joyce','Developer','g.joyce@datatables.net','Edinburgh','2010-12-22',42,92575,5,'8822'),(84,'Jennifer','Chang','Regional Director','j.chang@datatables.net','Singapore','2010-11-14',28,357650,51,'9239'),(86,'Fiona','Green','Chief Operating Officer (COO)','f.green@datatables.net','San Francisco','2010-03-11',48,850000,7,'2947'),(87,'Shou','Itou','Regional Marketing','s.itou@datatables.net','Tokyo','2011-08-14',20,163000,1,'8899'),(88,'Michelle','House','Integration Specialist','m.house@datatables.net','Sidney','2011-06-02',37,95400,39,'2769'),(89,'Suki','Burks','Developer','s.burks@datatables.net','London','2009-10-22',53,114500,40,'6832'),(90,'Prescott','Bartlett','Technical Author','p.bartlett@datatables.net','London','2011-05-07',27,145000,47,'3606'),(91,'Gavin','Cortez','Team Leader','g.cortez@datatables.net','San Francisco','2008-10-26',22,235500,52,'2860'),(92,'Martena','Mccray','Post-Sales support','m.mccray@datatables.net','Edinburgh','2011-03-09',46,324050,8,'8240'),(93,'Unity','Butler','Marketing Designer','u.butler@datatables.net','San Francisco','2009-12-09',47,85675,24,'5384'),(94,'Howard','Hatfield','Office Manager','h.hatfield@datatables.net','San Francisco','2008-12-16',51,164500,38,'7031'),(95,'Hope','Fuentes','Secretary','h.fuentes@datatables.net','San Francisco','2010-02-12',41,109850,53,'6318'),(96,'Vivian','Harrell','Financial Controller','v.harrell@datatables.net','San Francisco','2009-02-14',62,452500,30,'9422'),(97,'Timothy','Mooney','Office Manager','t.mooney@datatables.net','London','2008-12-11',37,136200,28,'7580'),(98,'Jackson','Bradshaw','Director','j.bradshaw@datatables.net','New York','2008-09-26',65,645750,34,'1042'),(99,'Olivia','Liang','Support Engineer','o.liang@datatables.net','Singapore','2011-02-03',64,234500,4,'2120'),(100,'Bruno','Nash','Software Engineer','b.nash@datatables.net','London','2011-05-03',38,163500,3,'6222'),(101,'Sakura','Yamamoto','Support Engineer','s.yamamoto@datatables.net','Tokyo','2009-08-19',37,139575,31,'9383'),(102,'Thor','Walton','Developer','t.walton@datatables.net','New York','2013-08-11',61,98540,11,'8327'),(103,'Finn','Camacho','Support Engineer','f.camacho@datatables.net','San Francisco','2009-07-07',47,87500,10,'2927'),(104,'Serge','Baldwin','Data Coordinator','s.baldwin@datatables.net','Singapore','2012-04-09',64,138575,44,'8352'),(105,'Douglas Silva','Frank','Software Engineer','z.frank@datatables.net','New York','2010-01-04',63,125250,42,'7439'),(106,'Zorita','Serrano','Software Engineer','z.serrano@datatables.net','San Francisco','2012-06-01',56,115000,27,'4389'),(107,'Jennifer','Acosta','Junior Javascript Developer','j.acosta@datatables.net','Edinburgh','2013-02-01',43,75650,49,'3431'),(108,'Cara','Stevens','Sales Assistant','c.stevens@datatables.net','New York','2011-12-06',46,145600,15,'3990'),(109,'Hermione','Butler','Regional Director','h.butler@datatables.net','London','2011-03-21',47,356250,9,'1016'),(110,'Lael','Greer','Systems Administrator','l.greer@datatables.net','London','2009-02-27',21,103500,25,'6733'),(111,'Jonas','Alexander','Developer','j.alexander@datatables.net','San Francisco','2010-07-14',30,86500,33,'8196'),(112,'Shad','Decker','Regional Director','s.decker@datatables.net','Edinburgh','2008-11-13',51,183000,43,'6373'),(113,'Michael','Bruce','Javascript Developer','m.bruce@datatables.net','Singapore','2011-06-27',29,183000,16,'5384'),(114,'Donna','Snider','Customer Support','d.snider@datatables.net','New York','2011-01-25',27,112000,19,'4226');
/*!40000 ALTER TABLE `datatables_demo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `permission` varchar(90) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Administrador'),(2,'Fornecedor'),(3,'Representante'),(4,'Visitante');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'BOTA'),(2,'CHAPÉU'),(3,'CAMISA');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `active` int(4) DEFAULT '1',
  `documento` varchar(30) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `cep` varchar(11) DEFAULT NULL,
  `telefone` varchar(17) DEFAULT NULL,
  `plano` int(4) DEFAULT '1',
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `documento` (`documento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Aguinaldo','aguinaldoa80@gmail.com','$2y$10$PAzgJnHd/gTQzNznVg7un.HGEuGHYtYACCFknGuf.4diSunu3MA7C','Aguinaldo Alves Moreira','www.aguinaldoprof.com',1,'06104510655','rua 16 de abril, 921 - centro','joão pinheiro','38770000','038998982005',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_permissions`
--

DROP TABLE IF EXISTS `users_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_permissions` (
  `fkuser` bigint(20) unsigned DEFAULT NULL,
  `fkpermission` bigint(20) unsigned DEFAULT NULL,
  KEY `fkuser` (`fkuser`),
  KEY `fkpermission` (`fkpermission`),
  CONSTRAINT `users_permissions_ibfk_1` FOREIGN KEY (`fkuser`) REFERENCES `users` (`id`),
  CONSTRAINT `users_permissions_ibfk_2` FOREIGN KEY (`fkpermission`) REFERENCES `permissions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_permissions`
--

LOCK TABLES `users_permissions` WRITE;
/*!40000 ALTER TABLE `users_permissions` DISABLE KEYS */;
INSERT INTO `users_permissions` VALUES (2,1),(2,4);
/*!40000 ALTER TABLE `users_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(230) DEFAULT NULL,
  `apelido` varchar(230) DEFAULT NULL,
  `dni` int(11) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Aguinaldo','pé na cova',123456,1),(2,'Alice','stelinha',123321,1),(3,'Andressa','dessinha',123322,1),(4,'Rhavanna','caninana',123323,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-15 15:40:26