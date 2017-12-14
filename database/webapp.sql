/**
* Implementacao do modelo de dados para o sistema web
* @author 	TBrito1
* @since 	2017-11-21
* @version 	0.0.1
*/

--
-- Database structure for db `webapp`
--
CREATE DATABASE IF NOT EXISTS `webapp`;
USE `webapp`;

--
-- Table structure for table `usuario`
--
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--
LOCK TABLES `usuario` WRITE;
INSERT INTO `usuario` VALUES (1,'admin','admin');
UNLOCK TABLES;