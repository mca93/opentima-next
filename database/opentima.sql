-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: opentima
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

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
-- Table structure for table `actas`
--

DROP TABLE IF EXISTS `actas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `encontro_id` int(10) unsigned NOT NULL,
  `supervisao_id` int(10) unsigned NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pendente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `actas_encontro_id_foreign` (`encontro_id`),
  KEY `actas_supervisao_id_foreign` (`supervisao_id`),
  CONSTRAINT `actas_encontro_id_foreign` FOREIGN KEY (`encontro_id`) REFERENCES `encontros` (`id`),
  CONSTRAINT `actas_supervisao_id_foreign` FOREIGN KEY (`supervisao_id`) REFERENCES `supervisaos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actas`
--

LOCK TABLES `actas` WRITE;
/*!40000 ALTER TABLE `actas` DISABLE KEYS */;
/*!40000 ALTER TABLE `actas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activations`
--

DROP TABLE IF EXISTS `activations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activations`
--

LOCK TABLES `activations` WRITE;
/*!40000 ALTER TABLE `activations` DISABLE KEYS */;
INSERT INTO `activations` VALUES (1,1,'DioyvHJsbRVDACcYDg20eN9LcTL35EHU',1,'2019-12-15 06:26:54','2019-12-15 06:26:54','2019-12-15 06:26:54'),(2,2,'gVDCAKwQYXx0WcGqYnsRhUf2uomCb5By',1,'2019-12-15 07:06:47','2019-12-15 07:06:47','2019-12-15 07:06:47'),(3,4,'YPMIFSmIp8JRDq25yIRtiuT6jtmpSAXu',1,'2019-12-15 07:14:43','2019-12-15 07:14:43','2019-12-15 07:14:43'),(4,6,'0pIxTxfIsJYWC7YphxAun1YD5bdVm7wE',1,'2019-12-15 07:15:10','2019-12-15 07:15:10','2019-12-15 07:15:10'),(5,7,'hoyatLMXWsQCrC2lay4psGdv8C6BJFwo',1,'2019-12-15 07:29:08','2019-12-15 07:29:08','2019-12-15 07:29:08');
/*!40000 ALTER TABLE `activations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actividades`
--

DROP TABLE IF EXISTS `actividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designacao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peso` int(11) NOT NULL,
  `prioridade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisao_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `actividades_supervisao_id_foreign` (`supervisao_id`),
  CONSTRAINT `actividades_supervisao_id_foreign` FOREIGN KEY (`supervisao_id`) REFERENCES `supervisaos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividades`
--

LOCK TABLES `actividades` WRITE;
/*!40000 ALTER TABLE `actividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actividades_actas`
--

DROP TABLE IF EXISTS `actividades_actas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividades_actas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `actividade_id` int(10) unsigned NOT NULL,
  `acta_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `actividades_actas_actividade_id_foreign` (`actividade_id`),
  KEY `actividades_actas_acta_id_foreign` (`acta_id`),
  CONSTRAINT `actividades_actas_acta_id_foreign` FOREIGN KEY (`acta_id`) REFERENCES `actas` (`id`),
  CONSTRAINT `actividades_actas_actividade_id_foreign` FOREIGN KEY (`actividade_id`) REFERENCES `actividades` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividades_actas`
--

LOCK TABLES `actividades_actas` WRITE;
/*!40000 ALTER TABLE `actividades_actas` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividades_actas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designacao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curso_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `areas_curso_id_foreign` (`curso_id`),
  CONSTRAINT `areas_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'Blockchain','How banks can lavarege from blockchain.',1,'2019-12-15 08:20:31','2019-12-15 08:20:31');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidato_temas`
--

DROP TABLE IF EXISTS `candidato_temas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidato_temas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_estudante` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `candidato_temas_cod_estudante_unique` (`cod_estudante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidato_temas`
--

LOCK TABLES `candidato_temas` WRITE;
/*!40000 ALTER TABLE `candidato_temas` DISABLE KEYS */;
/*!40000 ALTER TABLE `candidato_temas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidatos_temas`
--

DROP TABLE IF EXISTS `candidatos_temas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidatos_temas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proposta_tema_id` int(10) unsigned NOT NULL,
  `problema` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao_problema` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidato_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `candidatos_temas_proposta_tema_id_foreign` (`proposta_tema_id`),
  KEY `candidatos_temas_candidato_id_foreign` (`candidato_id`),
  CONSTRAINT `candidatos_temas_candidato_id_foreign` FOREIGN KEY (`candidato_id`) REFERENCES `candidato_temas` (`id`),
  CONSTRAINT `candidatos_temas_proposta_tema_id_foreign` FOREIGN KEY (`proposta_tema_id`) REFERENCES `proposta_temas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidatos_temas`
--

LOCK TABLES `candidatos_temas` WRITE;
/*!40000 ALTER TABLE `candidatos_temas` DISABLE KEYS */;
/*!40000 ALTER TABLE `candidatos_temas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designacao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Inovation','Inovation','2019-12-15 06:26:54','2019-12-15 06:26:54'),(2,'Blockchain','Blockchain','2019-12-15 06:26:54','2019-12-15 06:26:54');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias_duvidas`
--

DROP TABLE IF EXISTS `categorias_duvidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias_duvidas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id` int(10) unsigned NOT NULL,
  `duvida_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorias_duvidas_categoria_id_foreign` (`categoria_id`),
  KEY `categorias_duvidas_duvida_id_foreign` (`duvida_id`),
  CONSTRAINT `categorias_duvidas_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `categorias_duvidas_duvida_id_foreign` FOREIGN KEY (`duvida_id`) REFERENCES `duvidas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias_duvidas`
--

LOCK TABLES `categorias_duvidas` WRITE;
/*!40000 ALTER TABLE `categorias_duvidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias_duvidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso_disciplinas`
--

DROP TABLE IF EXISTS `curso_disciplinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso_disciplinas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `disciplina_id` int(10) unsigned NOT NULL,
  `curso_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_disciplinas_disciplina_id_foreign` (`disciplina_id`),
  KEY `curso_disciplinas_curso_id_foreign` (`curso_id`),
  CONSTRAINT `curso_disciplinas_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  CONSTRAINT `curso_disciplinas_disciplina_id_foreign` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso_disciplinas`
--

LOCK TABLES `curso_disciplinas` WRITE;
/*!40000 ALTER TABLE `curso_disciplinas` DISABLE KEYS */;
/*!40000 ALTER TABLE `curso_disciplinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designacao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cursos_departamento_id_foreign` (`departamento_id`),
  CONSTRAINT `cursos_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Emerging technologies',1,'2019-12-15 08:07:43','2019-12-15 08:07:43');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `defesas`
--

DROP TABLE IF EXISTS `defesas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `defesas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supervisao_id` int(10) unsigned NOT NULL,
  `oponente_id` int(10) unsigned NOT NULL,
  `data` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `defesas_supervisao_id_unique` (`supervisao_id`),
  KEY `defesas_oponente_id_foreign` (`oponente_id`),
  CONSTRAINT `defesas_oponente_id_foreign` FOREIGN KEY (`oponente_id`) REFERENCES `docentes` (`id`),
  CONSTRAINT `defesas_supervisao_id_foreign` FOREIGN KEY (`supervisao_id`) REFERENCES `supervisaos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `defesas`
--

LOCK TABLES `defesas` WRITE;
/*!40000 ALTER TABLE `defesas` DISABLE KEYS */;
/*!40000 ALTER TABLE `defesas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designacao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chefe_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departamentos_chefe_id_foreign` (`chefe_id`),
  CONSTRAINT `departamentos_chefe_id_foreign` FOREIGN KEY (`chefe_id`) REFERENCES `docentes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'Human Capital','HR',1,'2019-12-15 06:53:43','2019-12-15 07:29:08'),(3,'Operations','OPS',4,'2019-12-15 07:08:42','2019-12-15 07:14:43'),(5,'Information Technology','IT',3,'2019-12-15 07:12:11','2019-12-15 07:15:10');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplinas`
--

DROP TABLE IF EXISTS `disciplinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplinas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designacao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semestre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '9 Semestre',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplinas`
--

LOCK TABLES `disciplinas` WRITE;
/*!40000 ALTER TABLE `disciplinas` DISABLE KEYS */;
/*!40000 ALTER TABLE `disciplinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docente_areas`
--

DROP TABLE IF EXISTS `docente_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docente_areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `docente_id` int(10) unsigned NOT NULL,
  `area_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `docente_areas_docente_id_foreign` (`docente_id`),
  KEY `docente_areas_area_id_foreign` (`area_id`),
  CONSTRAINT `docente_areas_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  CONSTRAINT `docente_areas_docente_id_foreign` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente_areas`
--

LOCK TABLES `docente_areas` WRITE;
/*!40000 ALTER TABLE `docente_areas` DISABLE KEYS */;
INSERT INTO `docente_areas` VALUES (1,2,1,NULL,NULL);
/*!40000 ALTER TABLE `docente_areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docentes`
--

DROP TABLE IF EXISTS `docentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docentes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `primeiro_nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ultimo_nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` int(11) NOT NULL,
  `departamento_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `docentes_email_unique` (`email`),
  UNIQUE KEY `docentes_celular_unique` (`celular`),
  KEY `docentes_departamento_id_foreign` (`departamento_id`),
  CONSTRAINT `docentes_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docentes`
--

LOCK TABLES `docentes` WRITE;
/*!40000 ALTER TABLE `docentes` DISABLE KEYS */;
INSERT INTO `docentes` VALUES (1,'Robert','Masango','robmasango@gmail.com',727601650,1,'2019-12-15 06:57:44','2019-12-15 06:57:44'),(2,'Muarucha','Assane','muarucha.assane@gmail.com',842729086,1,'2019-12-15 07:05:50','2019-12-15 07:05:50'),(3,'Mauro','Mauane','mauro@mauane.com',823114142,5,'2019-12-15 07:13:29','2019-12-15 07:13:29'),(4,'Jenit','Anantlal','jenit92@gmail.com',842942842,3,'2019-12-15 07:14:11','2019-12-15 07:14:11');
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duvidas`
--

DROP TABLE IF EXISTS `duvidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `duvidas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designacao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estudante_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pública',
  PRIMARY KEY (`id`),
  KEY `duvidas_estudante_id_foreign` (`estudante_id`),
  CONSTRAINT `duvidas_estudante_id_foreign` FOREIGN KEY (`estudante_id`) REFERENCES `estudantes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duvidas`
--

LOCK TABLES `duvidas` WRITE;
/*!40000 ALTER TABLE `duvidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `duvidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encontros`
--

DROP TABLE IF EXISTS `encontros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encontros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supervisao_id` int(10) unsigned NOT NULL,
  `data` date NOT NULL,
  `hora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `encontros_supervisao_id_foreign` (`supervisao_id`),
  CONSTRAINT `encontros_supervisao_id_foreign` FOREIGN KEY (`supervisao_id`) REFERENCES `supervisaos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encontros`
--

LOCK TABLES `encontros` WRITE;
/*!40000 ALTER TABLE `encontros` DISABLE KEYS */;
/*!40000 ALTER TABLE `encontros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudantes`
--

DROP TABLE IF EXISTS `estudantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudantes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_estudante` int(11) DEFAULT NULL,
  `primeiro_nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ultimo_nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` int(11) NOT NULL,
  `curso_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `estudantes_email_unique` (`email`),
  UNIQUE KEY `estudantes_celular_unique` (`celular`),
  UNIQUE KEY `estudantes_cod_estudante_unique` (`cod_estudante`),
  KEY `estudantes_curso_id_foreign` (`curso_id`),
  CONSTRAINT `estudantes_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudantes`
--

LOCK TABLES `estudantes` WRITE;
/*!40000 ALTER TABLE `estudantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudantes_disciplinas`
--

DROP TABLE IF EXISTS `estudantes_disciplinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudantes_disciplinas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estudante_id` int(10) unsigned NOT NULL,
  `disciplina_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estudantes_disciplinas_estudante_id_foreign` (`estudante_id`),
  KEY `estudantes_disciplinas_disciplina_id_foreign` (`disciplina_id`),
  CONSTRAINT `estudantes_disciplinas_disciplina_id_foreign` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`),
  CONSTRAINT `estudantes_disciplinas_estudante_id_foreign` FOREIGN KEY (`estudante_id`) REFERENCES `estudantes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudantes_disciplinas`
--

LOCK TABLES `estudantes_disciplinas` WRITE;
/*!40000 ALTER TABLE `estudantes_disciplinas` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudantes_disciplinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ficheiro__monografias`
--

DROP TABLE IF EXISTS `ficheiro__monografias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficheiro__monografias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extensao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamanho` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monografia_id` int(10) unsigned NOT NULL,
  `mime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'application/pdf',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ficheiro__monografias_path_unique` (`path`),
  KEY `ficheiro__monografias_monografia_id_foreign` (`monografia_id`),
  CONSTRAINT `ficheiro__monografias_monografia_id_foreign` FOREIGN KEY (`monografia_id`) REFERENCES `monografias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficheiro__monografias`
--

LOCK TABLES `ficheiro__monografias` WRITE;
/*!40000 ALTER TABLE `ficheiro__monografias` DISABLE KEYS */;
/*!40000 ALTER TABLE `ficheiro__monografias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ficheiros`
--

DROP TABLE IF EXISTS `ficheiros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficheiros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extensao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamanho` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acta_id` int(10) unsigned NOT NULL,
  `mime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'application/pdf',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ficheiros_path_unique` (`path`),
  KEY `ficheiros_acta_id_foreign` (`acta_id`),
  CONSTRAINT `ficheiros_acta_id_foreign` FOREIGN KEY (`acta_id`) REFERENCES `actas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficheiros`
--

LOCK TABLES `ficheiros` WRITE;
/*!40000 ALTER TABLE `ficheiros` DISABLE KEYS */;
/*!40000 ALTER TABLE `ficheiros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_07_02_230147_migration_cartalyst_sentinel',1),(2,'2017_04_13_234822_create_departamentos_table',1),(3,'2017_04_14_220631_create_cursos_table',1),(4,'2017_04_14_220926_create_docentes_table',1),(5,'2017_04_14_220957_create_estudantes_table',1),(6,'2017_04_14_224601_create_areas_table',1),(7,'2017_04_14_231759_create_disciplinas_table',1),(8,'2017_04_15_005605_create_curso_disciplina_tables',1),(9,'2017_04_15_010611_add_chefe_id_to_departamentos_table',1),(10,'2017_04_28_183253_add_sigla_to_departamentos_table',1),(11,'2017_05_24_235803_create_docente_areas_table',1),(12,'2017_05_26_164238_create_estudantes_disciplinas_table',1),(13,'2017_05_26_170039_create_temas_table',1),(14,'2017_05_27_064646_create_supervisao_table',1),(15,'2017_06_27_184457_create_actividades_table',1),(16,'2017_06_30_064220_create_encontros_table',1),(17,'2017_07_01_051457_create_candidato_temas_table',1),(18,'2017_07_01_054244_add_cod_estudante_to_estudantes_table',1),(19,'2017_07_01_083043_create_proposta_temas_table',1),(20,'2017_07_01_083729_create_candidatos_temas_table',1),(21,'2017_07_06_075730_add_problema_to_candidatos_temas_table',1),(22,'2017_07_06_080813_add_descricao_problema_to_candidatos_temas_table',1),(23,'2017_07_12_070836_create_actas_table',1),(24,'2017_07_12_071540_create_actividades_actas_table',1),(25,'2017_07_12_073148_create_ficheiros_table',1),(26,'2017_07_12_092958_add_supervisao_id_to_actas_table',1),(27,'2017_07_21_233526_create_categorias_table',1),(28,'2017_07_21_233928_create_duvidas_table',1),(29,'2017_07_21_234044_create_categorias_duvidas_table',1),(30,'2017_07_22_013732_add_estado_to_duvidas_table',1),(31,'2017_07_22_024203_create_respostas_table',1),(32,'2017_07_22_030548_add_user_resposta_id_to_resposta',1),(33,'2017_07_22_043103_add_progresso_to_supervisaos_table',1),(34,'2017_07_22_233738_create_monografias_table',1),(35,'2017_07_22_233955_create_ficheiro__monografias_table',1),(36,'2017_07_23_030206_add_estado_to_supervisaos_table',1),(37,'2017_07_23_211626_add_estado_to_proposta_temas_table',1),(38,'2017_07_23_225528_create_defesas_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monografias`
--

DROP TABLE IF EXISTS `monografias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monografias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pendente',
  `supervisao_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `monografias_supervisao_id_foreign` (`supervisao_id`),
  CONSTRAINT `monografias_supervisao_id_foreign` FOREIGN KEY (`supervisao_id`) REFERENCES `supervisaos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monografias`
--

LOCK TABLES `monografias` WRITE;
/*!40000 ALTER TABLE `monografias` DISABLE KEYS */;
/*!40000 ALTER TABLE `monografias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persistences`
--

DROP TABLE IF EXISTS `persistences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persistences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persistences`
--

LOCK TABLES `persistences` WRITE;
/*!40000 ALTER TABLE `persistences` DISABLE KEYS */;
INSERT INTO `persistences` VALUES (4,2,'HkKOrRbXmMb7ODJuyUyupeEHwd20L9fr','2019-12-15 07:48:47','2019-12-15 07:48:47'),(5,2,'ynYjADhPJ3dCZPxduzhyfnRraD6vpdgJ','2019-12-15 07:49:08','2019-12-15 07:49:08'),(12,7,'JdJS2GEDkmt6JOOdWTzEV6D88GFcG0Qe','2019-12-16 17:41:51','2019-12-16 17:41:51');
/*!40000 ALTER TABLE `persistences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proposta_temas`
--

DROP TABLE IF EXISTS `proposta_temas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proposta_temas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designacao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Disponivel',
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` int(10) unsigned NOT NULL,
  `docente_id` int(10) unsigned NOT NULL,
  `total_candidatos` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proposta_temas_area_id_foreign` (`area_id`),
  KEY `proposta_temas_docente_id_foreign` (`docente_id`),
  CONSTRAINT `proposta_temas_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  CONSTRAINT `proposta_temas_docente_id_foreign` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proposta_temas`
--

LOCK TABLES `proposta_temas` WRITE;
/*!40000 ALTER TABLE `proposta_temas` DISABLE KEYS */;
INSERT INTO `proposta_temas` VALUES (1,'The future of criptocurrencies','Disponivel','Bla bla bla',1,2,0,'2019-12-15 08:24:20','2019-12-15 08:24:20');
/*!40000 ALTER TABLE `proposta_temas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reminders`
--

LOCK TABLES `reminders` WRITE;
/*!40000 ALTER TABLE `reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respostas`
--

DROP TABLE IF EXISTS `respostas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respostas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resposta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '13',
  `duvida_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `respostas_duvida_id_foreign` (`duvida_id`),
  KEY `respostas_user_id_foreign` (`user_id`),
  CONSTRAINT `respostas_duvida_id_foreign` FOREIGN KEY (`duvida_id`) REFERENCES `duvidas` (`id`),
  CONSTRAINT `respostas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respostas`
--

LOCK TABLES `respostas` WRITE;
/*!40000 ALTER TABLE `respostas` DISABLE KEYS */;
/*!40000 ALTER TABLE `respostas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_users`
--

DROP TABLE IF EXISTS `role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_users`
--

LOCK TABLES `role_users` WRITE;
/*!40000 ALTER TABLE `role_users` DISABLE KEYS */;
INSERT INTO `role_users` VALUES (1,1,'2019-12-15 06:26:54','2019-12-15 06:26:54'),(2,4,NULL,NULL),(4,2,NULL,NULL),(6,2,NULL,NULL),(7,2,'2019-12-15 07:29:08','2019-12-15 07:29:08');
/*!40000 ALTER TABLE `role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrador','Administrador',NULL,NULL,NULL),(2,'chefe_do_departamento','Responsible of the department',NULL,NULL,NULL),(3,'estudante','Student',NULL,NULL,NULL),(4,'docente','Mentor',NULL,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supervisaos`
--

DROP TABLE IF EXISTS `supervisaos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supervisaos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dia_inicio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mes_inicio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano_inicio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_limite` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mes_limite` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano_limite` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tema_id` int(10) unsigned NOT NULL,
  `supervisor_id` int(10) unsigned NOT NULL,
  `papel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'supervisor',
  `estudante_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `progresso` int(11) NOT NULL DEFAULT '0',
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Em curso',
  PRIMARY KEY (`id`),
  KEY `supervisaos_tema_id_foreign` (`tema_id`),
  KEY `supervisaos_supervisor_id_foreign` (`supervisor_id`),
  KEY `supervisaos_estudante_id_foreign` (`estudante_id`),
  CONSTRAINT `supervisaos_estudante_id_foreign` FOREIGN KEY (`estudante_id`) REFERENCES `estudantes` (`id`),
  CONSTRAINT `supervisaos_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `docentes` (`id`),
  CONSTRAINT `supervisaos_tema_id_foreign` FOREIGN KEY (`tema_id`) REFERENCES `temas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisaos`
--

LOCK TABLES `supervisaos` WRITE;
/*!40000 ALTER TABLE `supervisaos` DISABLE KEYS */;
/*!40000 ALTER TABLE `supervisaos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temas`
--

DROP TABLE IF EXISTS `temas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designacao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` int(10) unsigned NOT NULL,
  `estudante_id` int(10) unsigned NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Não alocado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `temas_estudante_id_foreign` (`estudante_id`),
  KEY `temas_area_id_foreign` (`area_id`),
  CONSTRAINT `temas_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  CONSTRAINT `temas_estudante_id_foreign` FOREIGN KEY (`estudante_id`) REFERENCES `estudantes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temas`
--

LOCK TABLES `temas` WRITE;
/*!40000 ALTER TABLE `temas` DISABLE KEYS */;
/*!40000 ALTER TABLE `temas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `throttle`
--

LOCK TABLES `throttle` WRITE;
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;
INSERT INTO `throttle` VALUES (1,NULL,'global',NULL,'2019-12-15 07:23:46','2019-12-15 07:23:46'),(2,NULL,'ip','127.0.0.1','2019-12-15 07:23:46','2019-12-15 07:23:46');
/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@admin.com','$2y$10$UhXSRCw0bE/Fx/dbxg.1Ou4WvnJulePl9Xnmja4V.fF2R5EAwCH92','[\" \"]','2019-12-15 08:17:55','opentima','Administrador','2019-12-15 06:26:54','2019-12-15 08:17:55'),(2,'muarucha.assane@gmail.com','$2y$10$2Ni3MiXyc6S4k1SYvPxgdOh9YUETMtwBph9ZnQR2E.uj8A5oDI9FW','[\" \"]','2019-12-15 08:21:19','Muarucha','Assane','2019-12-15 07:06:47','2019-12-15 08:21:19'),(4,'jenit92@gmail.com','$2y$10$zBKY1rVSGoMfGoR8.SorxOkx5t5gdBdjJxWAce.yAeLRRfqFlqjoa','[\" \"]',NULL,'Jenit','Anantlal','2019-12-15 07:14:43','2019-12-15 07:14:43'),(6,'mauro@mauane.com','$2y$10$rcWa4kjxk6kfNDCjvQfxAuzDRnNVSSD2cRAha/cOo7WuH4kUG2bvK','[\" \"]',NULL,'Mauro','Mauane','2019-12-15 07:15:10','2019-12-15 07:15:10'),(7,'robmasango@gmail.com','$2y$10$1/yxQ4bEtAxnTjOAHOKXmeJb.QI.mNvNlX0ihyDshcKrOYuhB1NnS','[\" \"]','2019-12-16 17:41:51','Robert','Masango','2019-12-15 07:29:08','2019-12-16 17:41:51');
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

-- Dump completed on 2019-12-23  9:40:41
