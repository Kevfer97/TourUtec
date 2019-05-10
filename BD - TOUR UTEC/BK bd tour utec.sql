-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: tourutec
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.37-MariaDB

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
-- Table structure for table `adm_cmt_comentarios`
--

DROP TABLE IF EXISTS `adm_cmt_comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_cmt_comentarios` (
  `cmt_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cmt_comentario` varchar(1000) NOT NULL,
  `cmt_codusr` int(11) NOT NULL,
  `cmt_fecha` datetime NOT NULL,
  `cmt_estado` varchar(1) DEFAULT NULL,
  `cmt_codsec` int(11) DEFAULT NULL,
  PRIMARY KEY (`cmt_codigo`),
  KEY `FK_usr_cmt_idx` (`cmt_codusr`),
  KEY `FK_sec_cmt_idx` (`cmt_codsec`),
  CONSTRAINT `FK_sec_cmt` FOREIGN KEY (`cmt_codsec`) REFERENCES `adm_sec_seccion` (`sec_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_usr_cmt` FOREIGN KEY (`cmt_codusr`) REFERENCES `sec_usr_usuarios` (`usr_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_cmt_comentarios`
--

LOCK TABLES `adm_cmt_comentarios` WRITE;
/*!40000 ALTER TABLE `adm_cmt_comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `adm_cmt_comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_edf_edificio`
--

DROP TABLE IF EXISTS `adm_edf_edificio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_edf_edificio` (
  `edf_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `edf_nombre` varchar(100) NOT NULL,
  `edf_orden` int(11) NOT NULL,
  `edf_latitud` double NOT NULL,
  `edf_altitud` double NOT NULL,
  PRIMARY KEY (`edf_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_edf_edificio`
--

LOCK TABLES `adm_edf_edificio` WRITE;
/*!40000 ALTER TABLE `adm_edf_edificio` DISABLE KEYS */;
/*!40000 ALTER TABLE `adm_edf_edificio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_idm_idioma`
--

DROP TABLE IF EXISTS `adm_idm_idioma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_idm_idioma` (
  `idm_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `idm_nombre` int(11) NOT NULL,
  `idm_icono` varchar(200) NOT NULL,
  `idm_audio` varchar(200) NOT NULL,
  PRIMARY KEY (`idm_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_idm_idioma`
--

LOCK TABLES `adm_idm_idioma` WRITE;
/*!40000 ALTER TABLE `adm_idm_idioma` DISABLE KEYS */;
/*!40000 ALTER TABLE `adm_idm_idioma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_rec_recursos`
--

DROP TABLE IF EXISTS `adm_rec_recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_rec_recursos` (
  `rec_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `rec_codsec` int(11) NOT NULL,
  `rec_codidm` int(11) NOT NULL,
  `rec_url` varchar(300) NOT NULL,
  `rec_tipo` varchar(3) NOT NULL,
  PRIMARY KEY (`rec_codigo`),
  KEY `FK_sec_rec_idx` (`rec_codsec`),
  KEY `FK_idm_rec_idx` (`rec_codidm`),
  CONSTRAINT `FK_idm_rec` FOREIGN KEY (`rec_codidm`) REFERENCES `adm_idm_idioma` (`idm_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_sec_rec` FOREIGN KEY (`rec_codsec`) REFERENCES `adm_sec_seccion` (`sec_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_rec_recursos`
--

LOCK TABLES `adm_rec_recursos` WRITE;
/*!40000 ALTER TABLE `adm_rec_recursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `adm_rec_recursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_sec_seccion`
--

DROP TABLE IF EXISTS `adm_sec_seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_sec_seccion` (
  `sec_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `sec_codedf` int(11) NOT NULL,
  `sec_orden` int(11) NOT NULL,
  `sec_nombre` varchar(150) NOT NULL,
  `sec_latitud` double NOT NULL,
  `sec_altitud` double NOT NULL,
  PRIMARY KEY (`sec_codigo`),
  KEY `FK_edf_sec_idx` (`sec_codedf`),
  CONSTRAINT `FK_edf_sec` FOREIGN KEY (`sec_codedf`) REFERENCES `adm_edf_edificio` (`edf_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_sec_seccion`
--

LOCK TABLES `adm_sec_seccion` WRITE;
/*!40000 ALTER TABLE `adm_sec_seccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `adm_sec_seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_tex_texto`
--

DROP TABLE IF EXISTS `adm_tex_texto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_tex_texto` (
  `tex_codsec` int(11) NOT NULL,
  `tex_codidm` int(11) NOT NULL,
  `tex_titulo` varchar(200) NOT NULL,
  `tex_contenido` varchar(3000) NOT NULL,
  PRIMARY KEY (`tex_codsec`,`tex_codidm`),
  KEY `FK_idm_tex_idx` (`tex_codidm`),
  CONSTRAINT `FK_idm_tex` FOREIGN KEY (`tex_codidm`) REFERENCES `adm_idm_idioma` (`idm_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_sec_tex` FOREIGN KEY (`tex_codsec`) REFERENCES `adm_sec_seccion` (`sec_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_tex_texto`
--

LOCK TABLES `adm_tex_texto` WRITE;
/*!40000 ALTER TABLE `adm_tex_texto` DISABLE KEYS */;
/*!40000 ALTER TABLE `adm_tex_texto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_bit_bitacora`
--

DROP TABLE IF EXISTS `sec_bit_bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_bit_bitacora` (
  `bit_codigo` int(11) NOT NULL,
  `bit_codusr` int(11) NOT NULL,
  `bit_codtia` int(11) NOT NULL,
  `bit_fecha` datetime NOT NULL,
  `bit_descripcion` varchar(150) NOT NULL,
  PRIMARY KEY (`bit_codigo`),
  KEY `FK_usr_bit_idx` (`bit_codusr`),
  KEY `FK_tia_bit_idx` (`bit_codtia`),
  CONSTRAINT `FK_tia_bit` FOREIGN KEY (`bit_codtia`) REFERENCES `sec_tia_tipo_accion` (`tia_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_usr_bit` FOREIGN KEY (`bit_codusr`) REFERENCES `sec_usr_usuarios` (`usr_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_bit_bitacora`
--

LOCK TABLES `sec_bit_bitacora` WRITE;
/*!40000 ALTER TABLE `sec_bit_bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `sec_bit_bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_tia_tipo_accion`
--

DROP TABLE IF EXISTS `sec_tia_tipo_accion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_tia_tipo_accion` (
  `tia_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `tia_nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`tia_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_tia_tipo_accion`
--

LOCK TABLES `sec_tia_tipo_accion` WRITE;
/*!40000 ALTER TABLE `sec_tia_tipo_accion` DISABLE KEYS */;
/*!40000 ALTER TABLE `sec_tia_tipo_accion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_usr_usuarios`
--

DROP TABLE IF EXISTS `sec_usr_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_usr_usuarios` (
  `usr_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usr_correo` varchar(100) NOT NULL,
  `usr_contrasena` varchar(50) NOT NULL,
  `usr_cod_confirma` varchar(10) NOT NULL,
  `usr_estado` bit(1) NOT NULL,
  `usr_tipo` varchar(1) NOT NULL,
  PRIMARY KEY (`usr_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_usr_usuarios`
--

LOCK TABLES `sec_usr_usuarios` WRITE;
/*!40000 ALTER TABLE `sec_usr_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `sec_usr_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-10 17:20:07
