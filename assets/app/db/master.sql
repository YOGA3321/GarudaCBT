-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: GarudaCBT
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `api_setting`
--

DROP TABLE IF EXISTS `api_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `api_setting` (
  `id` int NOT NULL AUTO_INCREMENT,
  `auto_sync` int NOT NULL DEFAULT '0',
  `edit_profile_siswa` int NOT NULL DEFAULT '0',
  `edit_profile_guru` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_setting`
--

LOCK TABLES `api_setting` WRITE;
/*!40000 ALTER TABLE `api_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `api_token`
--

DROP TABLE IF EXISTS `api_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `api_token` (
  `id_api` int NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int NOT NULL,
  `address` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `agent` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `device` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_api`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_token`
--

LOCK TABLES `api_token` WRITE;
/*!40000 ALTER TABLE `api_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku_induk`
--

DROP TABLE IF EXISTS `buku_induk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buku_induk` (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rombel_awal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_panggilan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bahasa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jml_saudara_kandung` int NOT NULL DEFAULT '0',
  `jml_saudara_tiri` int NOT NULL DEFAULT '0',
  `jml_saudara_angkat` int NOT NULL DEFAULT '0',
  `yatim` int NOT NULL DEFAULT '0' COMMENT '0=ada orang-tua, 1=yatim, 2=yatim piatu',
  `tinggal_bersama` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '1=orang-tua, 2=saudara, 3=wali, 4=asrama/pesantren, 5=kost, 6=lainnya',
  `jarak` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gol_darah` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penyakit` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `kelainan_fisik` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kegemaran` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `beasiswa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `no_ijazah_sebelumnya` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun_lulus_sebelumnya` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pindahan_dari` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alasan_kepindahan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agama_ayah` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat_lahir_ayah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `wn_ayah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penghasilan_ayah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidup_meninggal_ayah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agama_ibu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat_lahir_ibu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `wn_ibu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penghasilan_ibu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidup_meninggal_ibu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat_lahir_wali` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agama_wali` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `wn_wali` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penghasilan_wali` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT '1' COMMENT '1= aktif, 2=lulus, 3=pindah, 4=keluar',
  `tahun_lulus` int DEFAULT NULL,
  `no_ijazah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelas_akhir` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lanjut_ke` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pindah_ke` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alasan_pindah` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_pindah` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bekerja_di` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `catatan_penting` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_siswa`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku_induk`
--

LOCK TABLES `buku_induk` WRITE;
/*!40000 ALTER TABLE `buku_induk` DISABLE KEYS */;
INSERT INTO `buku_induk` VALUES (1,'6d1ab06d-d1e6-11f0-8c64-00155df25222',NULL,NULL,NULL,0,0,0,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `buku_induk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bulan`
--

DROP TABLE IF EXISTS `bulan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bulan` (
  `id_bln` int NOT NULL AUTO_INCREMENT,
  `nama_bln` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_bln`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bulan`
--

LOCK TABLES `bulan` WRITE;
/*!40000 ALTER TABLE `bulan` DISABLE KEYS */;
INSERT INTO `bulan` VALUES (1,'Januari'),(2,'Februari'),(3,'Maret'),(4,'April'),(5,'Mei'),(6,'Juni'),(7,'Juli'),(8,'Agustus'),(9,'September'),(10,'Oktober'),(11,'November'),(12,'Desember');
/*!40000 ALTER TABLE `bulan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_bank_soal`
--

DROP TABLE IF EXISTS `cbt_bank_soal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_bank_soal` (
  `id_bank` int NOT NULL AUTO_INCREMENT,
  `bank_jenis_id` int NOT NULL DEFAULT '0',
  `bank_kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `bank_level` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bank_kelas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bank_mapel_id` int DEFAULT NULL,
  `bank_jurusan_id` int NOT NULL DEFAULT '0',
  `bank_guru_id` int DEFAULT NULL,
  `bank_nama` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kkm` int DEFAULT '0',
  `jml_soal` int NOT NULL DEFAULT '0',
  `jml_esai` int NOT NULL DEFAULT '0',
  `tampil_pg` int NOT NULL DEFAULT '0',
  `tampil_esai` int NOT NULL DEFAULT '0',
  `bobot_pg` int NOT NULL DEFAULT '0',
  `bobot_esai` int NOT NULL DEFAULT '0',
  `opsi` int NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '0',
  `soal_agama` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `jml_kompleks` int NOT NULL DEFAULT '0',
  `tampil_kompleks` int NOT NULL DEFAULT '0',
  `bobot_kompleks` int NOT NULL DEFAULT '0',
  `jml_jodohkan` int NOT NULL DEFAULT '0',
  `tampil_jodohkan` int NOT NULL DEFAULT '0',
  `bobot_jodohkan` int NOT NULL DEFAULT '0',
  `jml_isian` int NOT NULL DEFAULT '0',
  `tampil_isian` int NOT NULL DEFAULT '0',
  `bobot_isian` int NOT NULL DEFAULT '0',
  `status_soal` int NOT NULL DEFAULT '0' COMMENT '0=belum selesai, 1=sudah selesai',
  PRIMARY KEY (`id_bank`) USING BTREE,
  UNIQUE KEY `kode_bank_soal` (`bank_kode`(100))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_bank_soal`
--

LOCK TABLES `cbt_bank_soal` WRITE;
/*!40000 ALTER TABLE `cbt_bank_soal` DISABLE KEYS */;
INSERT INTO `cbt_bank_soal` VALUES (1,0,'kode1','1','a:2:{i:0;a:1:{s:8:\"kelas_id\";s:1:\"3\";}i:1;a:1:{s:8:\"kelas_id\";N;}}',6,0,1,'',0,10,0,10,0,20,0,3,'2025-12-05 14:53:32',1,'-',3,2,NULL,0,0,0,0,0,0,0,0,0,1),(2,0,'kode2','1','a:2:{i:0;a:1:{s:8:\"kelas_id\";s:1:\"3\";}i:1;a:1:{s:8:\"kelas_id\";N;}}',6,0,1,'',0,5,0,5,0,50,0,3,'2025-12-05 15:26:04',1,'-',3,2,NULL,0,0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `cbt_bank_soal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_durasi_siswa`
--

DROP TABLE IF EXISTS `cbt_durasi_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_durasi_siswa` (
  `id_durasi` int NOT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_jadwal` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0=belum ujian, 1=sedang ujian, 2=sudah ujian',
  `lama_ujian` time DEFAULT NULL,
  `mulai` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `selesai` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reset` int NOT NULL DEFAULT '0' COMMENT '0=tidak, 1=reset dari 0, 2=reset dari sisa waktu, 3=ulangi semua',
  `time_create` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_durasi`) USING BTREE,
  KEY `Cbt_index_id_durasi` (`id_durasi`) USING BTREE COMMENT 'id durasi',
  KEY `id_siswa` (`id_siswa`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_durasi_siswa`
--

LOCK TABLES `cbt_durasi_siswa` WRITE;
/*!40000 ALTER TABLE `cbt_durasi_siswa` DISABLE KEYS */;
INSERT INTO `cbt_durasi_siswa` VALUES (101,1,1,2,NULL,'2025-12-05 21:56:50','2025-12-05 21:59:20',0,'2025-12-05 21:59:20');
/*!40000 ALTER TABLE `cbt_durasi_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_jadwal`
--

DROP TABLE IF EXISTS `cbt_jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_jadwal` (
  `id_jadwal` int NOT NULL AUTO_INCREMENT,
  `id_tp` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_smt` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_bank` int DEFAULT NULL,
  `id_jenis` int DEFAULT NULL,
  `tgl_mulai` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_selesai` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `durasi_ujian` int NOT NULL,
  `pengawas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `acak_soal` int NOT NULL,
  `acak_opsi` int NOT NULL,
  `hasil_tampil` int NOT NULL,
  `token` int NOT NULL,
  `status` int NOT NULL,
  `ulang` int NOT NULL,
  `reset_login` int NOT NULL,
  `rekap` int NOT NULL DEFAULT '0',
  `jam_ke` int NOT NULL DEFAULT '0',
  `jarak` int NOT NULL DEFAULT '0',
  `time_create` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jadwal`) USING BTREE,
  UNIQUE KEY `idjawal_relation` (`id_jadwal`) USING BTREE,
  UNIQUE KEY `id_bank_soal` (`id_bank`) USING BTREE,
  KEY `idx_jns_fc` (`id_jenis`) USING BTREE,
  CONSTRAINT `id_bank_soal` FOREIGN KEY (`id_bank`) REFERENCES `cbt_bank_soal` (`id_bank`),
  CONSTRAINT `id_jns_idx_ifc` FOREIGN KEY (`id_jenis`) REFERENCES `cbt_jenis` (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_jadwal`
--

LOCK TABLES `cbt_jadwal` WRITE;
/*!40000 ALTER TABLE `cbt_jadwal` DISABLE KEYS */;
INSERT INTO `cbt_jadwal` VALUES (1,'3','2',1,1,'2025-12-05','2025-12-05',10,NULL,1,0,0,0,1,0,0,0,0,2,NULL);
/*!40000 ALTER TABLE `cbt_jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_jenis`
--

DROP TABLE IF EXISTS `cbt_jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_jenis` (
  `id_jenis` int NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_jenis` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_jenis`) USING BTREE,
  UNIQUE KEY `idx_jns` (`id_jenis`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_jenis`
--

LOCK TABLES `cbt_jenis` WRITE;
/*!40000 ALTER TABLE `cbt_jenis` DISABLE KEYS */;
INSERT INTO `cbt_jenis` VALUES (1,'Penilaian Harian','PH'),(2,'Penilaian Tengah Semester','PTS'),(3,'Penilaian Akhir Semester','PAS'),(4,'Penilaian Akhir Tahun','PAT'),(5,'Ujian Madrasah Berbasis Komputer','UMBK'),(6,'Try Out','TO'),(7,'Simulasi','SIML');
/*!40000 ALTER TABLE `cbt_jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_kelas_ruang`
--

DROP TABLE IF EXISTS `cbt_kelas_ruang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_kelas_ruang` (
  `id_kelas_ruang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_ruang` int NOT NULL,
  `id_sesi` int NOT NULL DEFAULT '0',
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `set_siswa` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kelas_ruang`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_kelas_ruang`
--

LOCK TABLES `cbt_kelas_ruang` WRITE;
/*!40000 ALTER TABLE `cbt_kelas_ruang` DISABLE KEYS */;
/*!40000 ALTER TABLE `cbt_kelas_ruang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_kop_absensi`
--

DROP TABLE IF EXISTS `cbt_kop_absensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_kop_absensi` (
  `id_kop` int NOT NULL,
  `header_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_4` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `proktor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pengawas_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pengawas_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_kop`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_kop_absensi`
--

LOCK TABLES `cbt_kop_absensi` WRITE;
/*!40000 ALTER TABLE `cbt_kop_absensi` DISABLE KEYS */;
/*!40000 ALTER TABLE `cbt_kop_absensi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_kop_berita`
--

DROP TABLE IF EXISTS `cbt_kop_berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_kop_berita` (
  `id_kop` int NOT NULL,
  `header_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_4` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_kop`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_kop_berita`
--

LOCK TABLES `cbt_kop_berita` WRITE;
/*!40000 ALTER TABLE `cbt_kop_berita` DISABLE KEYS */;
/*!40000 ALTER TABLE `cbt_kop_berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_kop_kartu`
--

DROP TABLE IF EXISTS `cbt_kop_kartu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_kop_kartu` (
  `id_set_kartu` int NOT NULL,
  `header_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_4` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_set_kartu`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_kop_kartu`
--

LOCK TABLES `cbt_kop_kartu` WRITE;
/*!40000 ALTER TABLE `cbt_kop_kartu` DISABLE KEYS */;
INSERT INTO `cbt_kop_kartu` VALUES (123456,'','','','','');
/*!40000 ALTER TABLE `cbt_kop_kartu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_nilai`
--

DROP TABLE IF EXISTS `cbt_nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_nilai` (
  `id_nilai` int NOT NULL,
  `pg_benar` int DEFAULT '0',
  `pg_nilai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '0',
  `essai_nilai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '0',
  `id_siswa` int DEFAULT NULL,
  `id_jadwal` int DEFAULT NULL,
  `kompleks_nilai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '0',
  `jodohkan_nilai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '0',
  `isian_nilai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '0',
  `dikoreksi` int NOT NULL DEFAULT '0',
  `time_create` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_nilai`) USING BTREE,
  UNIQUE KEY `id_nilai_idx` (`id_nilai`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_nilai`
--

LOCK TABLES `cbt_nilai` WRITE;
/*!40000 ALTER TABLE `cbt_nilai` DISABLE KEYS */;
INSERT INTO `cbt_nilai` VALUES (101,2,'4','0',1,1,'0','0','0',0,NULL);
/*!40000 ALTER TABLE `cbt_nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_nomor_peserta`
--

DROP TABLE IF EXISTS `cbt_nomor_peserta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_nomor_peserta` (
  `id_nomor` int NOT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL DEFAULT '1',
  `nomor_peserta` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_nomor`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_nomor_peserta`
--

LOCK TABLES `cbt_nomor_peserta` WRITE;
/*!40000 ALTER TABLE `cbt_nomor_peserta` DISABLE KEYS */;
INSERT INTO `cbt_nomor_peserta` VALUES (13,1,3,1,'2223.01.001');
/*!40000 ALTER TABLE `cbt_nomor_peserta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_pengawas`
--

DROP TABLE IF EXISTS `cbt_pengawas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_pengawas` (
  `id_pengawas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_jadwal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `id_ruang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_sesi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_guru` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_pengawas`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_pengawas`
--

LOCK TABLES `cbt_pengawas` WRITE;
/*!40000 ALTER TABLE `cbt_pengawas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cbt_pengawas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_rekap`
--

DROP TABLE IF EXISTS `cbt_rekap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_rekap` (
  `id_rekap` int NOT NULL AUTO_INCREMENT,
  `id_tp` int NOT NULL,
  `tp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_smt` int NOT NULL,
  `smt` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_jadwal` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_jenis` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_jenis` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_bank` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bank_kelas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bank_kode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bank_level` int NOT NULL,
  `id_mapel` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_mapel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_mulai` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_selesai` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tampil_pg` int NOT NULL,
  `jawaban_pg` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tampil_esai` int NOT NULL,
  `jawaban_esai` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bobot_pg` int NOT NULL,
  `bobot_esai` int NOT NULL,
  `id_guru` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_guru` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_kelas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `soal_kompleks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `soal_jodohkan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `soal_isian` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `soal_essai` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_rekap`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_rekap`
--

LOCK TABLES `cbt_rekap` WRITE;
/*!40000 ALTER TABLE `cbt_rekap` DISABLE KEYS */;
/*!40000 ALTER TABLE `cbt_rekap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_rekap_nilai`
--

DROP TABLE IF EXISTS `cbt_rekap_nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_rekap_nilai` (
  `id_rekap_nilai` int NOT NULL AUTO_INCREMENT,
  `id_jadwal` int DEFAULT NULL,
  `id_tp` int NOT NULL,
  `tp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_smt` int NOT NULL,
  `smt` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_jenis` int NOT NULL,
  `kode_jenis` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_bank` int DEFAULT NULL,
  `id_mapel` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_kelas` int DEFAULT '0',
  `kelas` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mulai` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `selesai` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `durasi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bobot_pg` int NOT NULL,
  `jawaban_pg` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nilai_pg` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bobot_esai` int NOT NULL,
  `jawaban_esai` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nilai_esai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_guru` int DEFAULT NULL,
  `nama_siswa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_peserta` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `soal_kompleks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `soal_jodohkan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `soal_isian` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `soal_essai` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `time_create` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rekap_nilai`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_rekap_nilai`
--

LOCK TABLES `cbt_rekap_nilai` WRITE;
/*!40000 ALTER TABLE `cbt_rekap_nilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `cbt_rekap_nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_ruang`
--

DROP TABLE IF EXISTS `cbt_ruang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_ruang` (
  `id_ruang` int NOT NULL AUTO_INCREMENT,
  `nama_ruang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_ruang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_ruang`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_ruang`
--

LOCK TABLES `cbt_ruang` WRITE;
/*!40000 ALTER TABLE `cbt_ruang` DISABLE KEYS */;
INSERT INTO `cbt_ruang` VALUES (1,'Ruang 1','LAB-KOM'),(2,'Ruang 2','R2'),(3,'Ruang 3','R3'),(4,'Ruang 4','R4'),(5,'Ruang 5','R5');
/*!40000 ALTER TABLE `cbt_ruang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_sesi`
--

DROP TABLE IF EXISTS `cbt_sesi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_sesi` (
  `id_sesi` int NOT NULL AUTO_INCREMENT,
  `nama_sesi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_sesi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `aktif` int NOT NULL,
  PRIMARY KEY (`id_sesi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_sesi`
--

LOCK TABLES `cbt_sesi` WRITE;
/*!40000 ALTER TABLE `cbt_sesi` DISABLE KEYS */;
INSERT INTO `cbt_sesi` VALUES (1,'Sesi 1','S1','07:30:00','22:30:00',1),(2,'Sesi 2','S2','09:00:00','12:30:00',1),(3,'Sesi 3','S3','10:30:00','14:00:00',1);
/*!40000 ALTER TABLE `cbt_sesi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_sesi_siswa`
--

DROP TABLE IF EXISTS `cbt_sesi_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_sesi_siswa` (
  `siswa_id` int NOT NULL,
  `kelas_id` int DEFAULT NULL,
  `ruang_id` int NOT NULL,
  `sesi_id` int NOT NULL,
  `tp_id` int NOT NULL,
  `smt_id` int NOT NULL,
  PRIMARY KEY (`siswa_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_sesi_siswa`
--

LOCK TABLES `cbt_sesi_siswa` WRITE;
/*!40000 ALTER TABLE `cbt_sesi_siswa` DISABLE KEYS */;
INSERT INTO `cbt_sesi_siswa` VALUES (1,1,1,1,3,1);
/*!40000 ALTER TABLE `cbt_sesi_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_soal`
--

DROP TABLE IF EXISTS `cbt_soal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_soal` (
  `id_soal` int NOT NULL AUTO_INCREMENT,
  `bank_id` int DEFAULT NULL,
  `mapel_id` int DEFAULT '0',
  `jenis` int NOT NULL COMMENT '1=ganda, 2=ganda kompleks, 3=menjodohkan, 4=isian singkat, 5=uraian',
  `nomor_soal` int DEFAULT '0',
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file1` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `tipe_file` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `soal` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `opsi_a` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `opsi_b` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `opsi_c` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `opsi_d` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `opsi_e` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `file_a` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_b` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_c` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_d` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_e` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_on` int DEFAULT NULL,
  `updated_on` int DEFAULT NULL,
  `tampilkan` int NOT NULL DEFAULT '0',
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kesulitan` int NOT NULL DEFAULT '1' COMMENT 'tingkat kesulitan 1-10',
  `timer` int NOT NULL DEFAULT '0' COMMENT '0=tidak, 1=ya',
  `timer_menit` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_soal`) USING BTREE,
  UNIQUE KEY `id_soal_idx` (`id_soal`) USING BTREE,
  KEY `id_bank_idx` (`bank_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_soal`
--

LOCK TABLES `cbt_soal` WRITE;
/*!40000 ALTER TABLE `cbt_soal` DISABLE KEYS */;
INSERT INTO `cbt_soal` VALUES (1,1,0,1,1,NULL,NULL,NULL,'hayo apa','satu','dua','tiga',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'b',1764946243,1764946307,1,'',1,0,0),(2,1,0,1,2,NULL,NULL,NULL,'kedua apa','pertama','kedua','ketiga',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'b',1764946310,1764946379,1,'',1,0,0),(3,1,0,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1764946336,1764946336,1,'',1,0,0),(4,1,0,1,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1764946337,1764946337,1,'',1,0,0),(5,1,0,1,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1764946338,1764946338,1,'',1,0,0),(6,1,0,1,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1764946339,1764946339,1,'',1,0,0),(7,1,0,1,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1764946340,1764946340,1,'',1,0,0),(8,1,0,1,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1764946341,1764946341,1,'',1,0,0),(9,1,0,1,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1764946342,1764946342,1,'',1,0,0),(10,1,0,1,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1764946343,1764946343,1,'',1,0,0),(11,1,0,1,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1764946344,1764946344,0,'',1,0,0),(12,2,0,1,1,'a:0:{}',NULL,NULL,'<p>Siapakah Presiden Indonesia pada tahun 1999 ?</p><p><img src=\"uploads/bank_soal/img_211_14e7b69b52454eba4bc6.jpg\"></p>\n','<p>Soekarno</p>\n','<p>Soeharto</p>\n','<p>B. J. Habibi</p>\n','<p>Abdurrahman Wahid</p>\n','<p>Megawati</p>\n',NULL,NULL,NULL,NULL,NULL,'C',1764948593,1764948593,0,'',8,0,0),(13,2,0,2,1,'a:0:{}',NULL,NULL,'<p>Contoh soal dengan banyak pilihan ganda:</p><p>Manakah diantara alat berikut ini yang merupakan peralatan dapur? </p>\n','a:6:{s:1:\"a\";s:15:\"<p>Cangkul</p>\n\";s:1:\"b\";s:13:\"<p>Pisau</p>\n\";s:1:\"c\";s:13:\"<p>Obeng</p>\n\";s:1:\"d\";s:15:\"<p>Spatula</p>\n\";s:1:\"e\";s:13:\"<p>Panci</p>\n\";s:1:\"f\";s:17:\"<p>Keranjang</p>\n\";}','','','','',NULL,NULL,NULL,NULL,NULL,'a:3:{i:0;s:1:\"b\";i:1;s:1:\"d\";i:2;s:1:\"e\";}',1764948593,1764948593,0,'',8,0,0),(14,2,0,2,2,'a:0:{}',NULL,NULL,'<p>Contoh soal dengan pilihan TRUE dan FALSE </p>\n','a:2:{s:1:\"a\";s:13:\"<p>Benar</p>\n\";s:1:\"b\";s:13:\"<p>Salah</p>\n\";}','','','','',NULL,NULL,NULL,NULL,NULL,'a:1:{i:0;s:1:\"a\";}',1764948593,1764948593,0,'',8,0,0),(15,2,0,2,3,'a:0:{}',NULL,NULL,'<p>Contoh soal dengan pilihan YES dan NO</p>\n','a:2:{s:1:\"a\";s:10:\"<p>Ya</p>\n\";s:1:\"b\";s:13:\"<p>Tidak</p>\n\";}','','','','',NULL,NULL,NULL,NULL,NULL,'a:1:{i:0;s:1:\"b\";}',1764948593,1764948593,0,'',8,0,0),(16,2,0,3,1,'a:0:{}',NULL,NULL,'<p>Contoh soal menjodohkan dengan satu baris berisi beberapa jawaban benar.<br><br>Cocokanlah peralatan dibawah ini sesuai tempat penggunannya</p>\n','','','','','',NULL,NULL,NULL,NULL,NULL,'a:3:{s:5:\"model\";s:1:\"2\";s:4:\"type\";s:1:\"1\";s:7:\"jawaban\";a:4:{i:0;a:9:{i:0;s:1:\"#\";i:1;s:15:\"<p>Cangkul</p>\n\";i:2;s:13:\"<p>Pisau</p>\n\";i:3;s:13:\"<p>Obeng</p>\n\";i:4;s:15:\"<p>Spatula</p>\n\";i:5;s:13:\"<p>Panci</p>\n\";i:6;s:17:\"<p>Keranjang</p>\n\";i:7;s:15:\"<p>Gergaji</p>\n\";i:8;s:12:\"<p>Palu</p>\n\";}i:1;a:9:{i:0;s:23:\"<p>Peralatan Dapur</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"0\";i:4;s:1:\"1\";i:5;s:1:\"0\";i:6;s:1:\"1\";i:7;s:1:\"0\";i:8;s:1:\"0\";}i:2;a:9:{i:0;s:23:\"<p>Peralatan Kebun</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:4;s:1:\"0\";i:5;s:1:\"0\";i:6;s:1:\"1\";i:7;s:1:\"0\";i:8;s:1:\"0\";}i:3;a:9:{i:0;s:33:\"<p>Peralatan Tukang Bangunan</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:4;s:1:\"0\";i:5;s:1:\"0\";i:6;s:1:\"0\";i:7;s:1:\"1\";i:8;s:1:\"1\";}}}',1764948593,1764948593,0,'',8,0,0),(17,2,0,3,2,'a:0:{}',NULL,NULL,'<p>Contoh soal menjodohkan dengan satu baris berisi jawaban benar bercampur.<br><br>Cocokanlah peralatan dibawah ini sesuai apa yang dihasilkannya</p>\n','','','','','',NULL,NULL,NULL,NULL,NULL,'a:3:{s:5:\"model\";s:1:\"2\";s:4:\"type\";s:1:\"1\";s:7:\"jawaban\";a:3:{i:0;a:6:{i:0;s:1:\"#\";i:1;s:21:\"<p>Speaker Aktif</p>\n\";i:2;s:16:\"<p>Televisi</p>\n\";i:3;s:13:\"<p>Radio</p>\n\";i:4;s:19:\"<p>Handphone  </p>\n\";i:5;s:28:\"<p>In Focus (proyektor)</p>\n\";}i:1;a:6:{i:0;s:30:\"<p>Media penghasil suara </p>\n\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"0\";}i:2;a:6:{i:0;s:30:\"<p>Media Penghasil gambar</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"0\";i:4;s:1:\"1\";i:5;s:1:\"1\";}}}',1764948593,1764948593,0,'',8,0,0),(18,2,0,3,3,'a:0:{}',NULL,NULL,'<p>Contoh soal menjodohkan dengan satu baris berisi satu jawaban benar.<br><br>Cocokanlah nama negara di bawah ini dengan Ibukotanya</p>\n','','','','','',NULL,NULL,NULL,NULL,NULL,'a:3:{s:5:\"model\";s:1:\"1\";s:4:\"type\";s:1:\"2\";s:7:\"jawaban\";a:4:{i:0;a:4:{i:0;s:1:\"#\";i:1;s:17:\"<p>Indonesia</p>\n\";i:2;s:14:\"<p>Jepang</p>\n\";i:3;s:21:\"<p>Korea Selatan</p>\n\";}i:1;a:4:{i:0;s:13:\"<p>Seoul</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"1\";}i:2;a:4:{i:0;s:15:\"<p>Jakarta</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";i:3;s:1:\"0\";}i:3;a:4:{i:0;s:13:\"<p>Tokyo</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"0\";}}}',1764948593,1764948593,0,'',8,0,0),(19,2,0,3,4,'a:0:{}',NULL,NULL,'<p>Contoh soal seperti contoh nomor 1, tapi baris dan kolom dibalik:<br><br>Cocokanlah peralatan dibawah ini sesuai tempat penggunannya</p>\n','','','','','',NULL,NULL,NULL,NULL,NULL,'a:3:{s:5:\"model\";s:1:\"2\";s:4:\"type\";s:1:\"2\";s:7:\"jawaban\";a:9:{i:0;a:4:{i:0;s:1:\"#\";i:1;s:23:\"<p>Peralatan Dapur</p>\n\";i:2;s:23:\"<p>Peralatan Kebun</p>\n\";i:3;s:33:\"<p>Peralatan Tukang Bangunan</p>\n\";}i:1;a:4:{i:0;s:15:\"<p>Cangkul</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"0\";}i:2;a:4:{i:0;s:13:\"<p>Pisau</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";i:3;s:1:\"0\";}i:3;a:4:{i:0;s:13:\"<p>Obeng</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"1\";}i:4;a:4:{i:0;s:15:\"<p>Spatula</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";i:3;s:1:\"0\";}i:5;a:4:{i:0;s:13:\"<p>Panci</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";i:3;s:1:\"0\";}i:6;a:4:{i:0;s:17:\"<p>Keranjang</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"0\";}i:7;a:4:{i:0;s:15:\"<p>Gergaji</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"1\";}i:8;a:4:{i:0;s:12:\"<p>Palu</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"1\";}}}',1764948593,1764948593,0,'',8,0,0),(20,2,0,3,5,'a:0:{}',NULL,NULL,'<p>Contoh soal seperti contoh nomor 2, tapi baris dan kolom dibalik:<br><br>Cocokanlah peralatan dibawah ini sesuai apa yang dihasilkannya</p>\n','','','','','',NULL,NULL,NULL,NULL,NULL,'a:3:{s:5:\"model\";s:1:\"2\";s:4:\"type\";s:1:\"1\";s:7:\"jawaban\";a:6:{i:0;a:3:{i:0;s:1:\"#\";i:1;s:30:\"<p>Media penghasil suara </p>\n\";i:2;s:30:\"<p>Media Penghasil gambar</p>\n\";}i:1;a:3:{i:0;s:21:\"<p>Speaker Aktif</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";}i:2;a:3:{i:0;s:16:\"<p>Televisi</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"1\";}i:3;a:3:{i:0;s:13:\"<p>Radio</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";}i:4;a:3:{i:0;s:19:\"<p>Handphone  </p>\n\";i:1;s:1:\"1\";i:2;s:1:\"1\";}i:5;a:3:{i:0;s:28:\"<p>In Focus (proyektor)</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";}}}',1764948593,1764948593,0,'',8,0,0),(21,2,0,3,6,'a:0:{}',NULL,NULL,'<p>Contoh soal dengan pilihan BENAR dan SALAH, atau YES dan No.</p><p>Jawab pernyataan di bawah ini</p>\n','','','','','',NULL,NULL,NULL,NULL,NULL,'a:3:{s:5:\"model\";s:1:\"2\";s:4:\"type\";s:1:\"2\";s:7:\"jawaban\";a:4:{i:0;a:3:{i:0;s:1:\"#\";i:1;s:13:\"<p>Benar</p>\n\";i:2;s:13:\"<p>Salah</p>\n\";}i:1;a:3:{i:0;s:20:\"<p>Saya pelajar</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";}i:2;a:3:{i:0;s:28:\"<p>Datang untuk bermain</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";}i:3;a:3:{i:0;s:25:\"<p>Belajar seenaknya</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";}}}',1764948593,1764948593,0,'',8,0,0),(22,2,0,4,1,'a:0:{}',NULL,NULL,'<p>soal isian singkat</p>\n','','','','','',NULL,NULL,NULL,NULL,NULL,'singkat',1764948593,1764948593,0,'',8,0,0),(23,2,0,5,1,'a:0:{}',NULL,NULL,'<p>uraian</p>\n','','','','','',NULL,NULL,NULL,NULL,NULL,'<p>jawab urai </p>\n',1764948593,1764948593,0,'',8,0,0),(24,2,0,5,2,'a:0:{}',NULL,NULL,'<p>soal uraian </p>\n','','','','','',NULL,NULL,NULL,NULL,NULL,'<p>uraian</p>\n',1764948593,1764948593,0,'',8,0,0);
/*!40000 ALTER TABLE `cbt_soal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_soal_siswa`
--

DROP TABLE IF EXISTS `cbt_soal_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_soal_siswa` (
  `id_soal_siswa` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_bank` int DEFAULT NULL,
  `id_jadwal` int DEFAULT NULL,
  `id_soal` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `jenis_soal` int NOT NULL,
  `no_soal_alias` int NOT NULL,
  `opsi_alias_a` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `opsi_alias_b` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `opsi_alias_c` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `opsi_alias_d` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `opsi_alias_e` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jawaban_alias` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `jawaban_siswa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `jawaban_benar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `point_essai` int DEFAULT '0',
  `soal_end` int NOT NULL DEFAULT '0',
  `point_soal` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nilai_koreksi` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nilai_otomatis` int NOT NULL DEFAULT '0' COMMENT '0=otomatis, 1=dari guru',
  `time_create` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_soal_siswa`) USING BTREE,
  UNIQUE KEY `is_soal_siswa` (`id_soal_siswa`) USING BTREE,
  KEY `id_siswa` (`id_siswa`) USING BTREE,
  KEY `id_jadwal` (`id_jadwal`) USING BTREE,
  KEY `id_soal_fc` (`id_soal`) USING BTREE,
  KEY `id_bank_fc` (`id_bank`) USING BTREE,
  CONSTRAINT `id_bank_fc` FOREIGN KEY (`id_bank`) REFERENCES `cbt_bank_soal` (`id_bank`),
  CONSTRAINT `id_jadwal_fc` FOREIGN KEY (`id_jadwal`) REFERENCES `cbt_jadwal` (`id_jadwal`),
  CONSTRAINT `Id_siswa_fc` FOREIGN KEY (`id_siswa`) REFERENCES `master_siswa` (`id_siswa`),
  CONSTRAINT `id_soal_fc` FOREIGN KEY (`id_soal`) REFERENCES `cbt_soal` (`id_soal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_soal_siswa`
--

LOCK TABLES `cbt_soal_siswa` WRITE;
/*!40000 ALTER TABLE `cbt_soal_siswa` DISABLE KEYS */;
INSERT INTO `cbt_soal_siswa` VALUES ('10111',1,1,10,1,1,1,'A','B','C','','','B','B',NULL,0,1,'2','0',0,'2025-12-05 21:57:33'),('101110',1,1,8,1,1,10,'A','B','C','','','A','A',NULL,0,0,'2','0',0,'2025-12-05 21:59:19'),('10112',1,1,7,1,1,2,'A','B','C','','','B','B',NULL,0,0,'2','0',0,'2025-12-05 21:57:46'),('10113',1,1,1,1,1,3,'A','B','C','','','B','B','b',0,0,'2','0',0,'2025-12-05 21:57:50'),('10114',1,1,5,1,1,4,'A','B','C','','','A','A',NULL,0,0,'2','0',0,'2025-12-05 21:59:03'),('10115',1,1,4,1,1,5,'A','B','C','','','C','C',NULL,0,0,'2','0',0,'2025-12-05 21:59:06'),('10116',1,1,9,1,1,6,'A','B','C','','','C','C',NULL,0,0,'2','0',0,'2025-12-05 21:59:08'),('10117',1,1,6,1,1,7,'A','B','C','','','A','A',NULL,0,0,'2','0',0,'2025-12-05 21:59:12'),('10118',1,1,2,1,1,8,'A','B','C','','','B','B','b',0,0,'2','0',0,'2025-12-05 21:57:57'),('10119',1,1,3,1,1,9,'A','B','C','','','A','A',NULL,0,0,'2','0',0,'2025-12-05 21:59:15');
/*!40000 ALTER TABLE `cbt_soal_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbt_token`
--

DROP TABLE IF EXISTS `cbt_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbt_token` (
  `token` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `auto` int NOT NULL,
  `id_token` int NOT NULL AUTO_INCREMENT,
  `jarak` int NOT NULL DEFAULT '0',
  `updated` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  PRIMARY KEY (`id_token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbt_token`
--

LOCK TABLES `cbt_token` WRITE;
/*!40000 ALTER TABLE `cbt_token` DISABLE KEYS */;
INSERT INTO `cbt_token` VALUES ('HILZCX',0,1,0,'2022-03-25 08:05:15');
/*!40000 ALTER TABLE `cbt_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groups` (
  `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'guru','Pembuat Soal dan ujian'),(3,'siswa','Peserta Ujian');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hari`
--

DROP TABLE IF EXISTS `hari`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hari` (
  `id_hri` int NOT NULL AUTO_INCREMENT,
  `nama_hri` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_hri`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hari`
--

LOCK TABLES `hari` WRITE;
/*!40000 ALTER TABLE `hari` DISABLE KEYS */;
INSERT INTO `hari` VALUES (1,'Senin'),(2,'Selasa'),(3,'Rabu'),(4,'Kamis'),(5,'Jum\'at'),(6,'Sabtu'),(7,'Minggu');
/*!40000 ALTER TABLE `hari` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan_guru`
--

DROP TABLE IF EXISTS `jabatan_guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jabatan_guru` (
  `id_jabatan_guru` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_guru` int DEFAULT NULL,
  `id_jabatan` int NOT NULL,
  `id_kelas` int DEFAULT '0',
  `mapel_kelas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `ekstra_kelas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  PRIMARY KEY (`id_jabatan_guru`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan_guru`
--

LOCK TABLES `jabatan_guru` WRITE;
/*!40000 ALTER TABLE `jabatan_guru` DISABLE KEYS */;
INSERT INTO `jabatan_guru` VALUES ('131',1,2,0,'a:0:{}','a:0:{}',3,1),('132',1,2,0,'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"6\";s:10:\"nama_mapel\";s:16:\"Bahasa Indonesia\";s:11:\"kelas_mapel\";a:2:{i:0;a:1:{s:5:\"kelas\";s:1:\"3\";}i:1;a:1:{s:5:\"kelas\";N;}}}}','a:0:{}',3,2);
/*!40000 ALTER TABLE `jabatan_guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas_catatan_mapel`
--

DROP TABLE IF EXISTS `kelas_catatan_mapel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas_catatan_mapel` (
  `id_catatan` int NOT NULL AUTO_INCREMENT,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `type` int NOT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_mapel` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_guru` int DEFAULT NULL,
  `level` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `readed` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `reading` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT 'array id_siswa yang membaca',
  `jml` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_catatan`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas_catatan_mapel`
--

LOCK TABLES `kelas_catatan_mapel` WRITE;
/*!40000 ALTER TABLE `kelas_catatan_mapel` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelas_catatan_mapel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas_catatan_wali`
--

DROP TABLE IF EXISTS `kelas_catatan_wali`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas_catatan_wali` (
  `id_catatan` int NOT NULL AUTO_INCREMENT,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `type` int NOT NULL COMMENT '1=semua siswa, 2=per siswa',
  `level` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '1=saran, 2=teguran, 3=peringatan, 4=sangsi',
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_siswa` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `text` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `readed` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `reading` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `jml` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_catatan`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas_catatan_wali`
--

LOCK TABLES `kelas_catatan_wali` WRITE;
/*!40000 ALTER TABLE `kelas_catatan_wali` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelas_catatan_wali` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas_ekstra`
--

DROP TABLE IF EXISTS `kelas_ekstra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas_ekstra` (
  `id_kelas_ekstra` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `id_kelas` int DEFAULT NULL,
  `ekstra` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kelas_ekstra`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas_ekstra`
--

LOCK TABLES `kelas_ekstra` WRITE;
/*!40000 ALTER TABLE `kelas_ekstra` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelas_ekstra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas_jadwal_kbm`
--

DROP TABLE IF EXISTS `kelas_jadwal_kbm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas_jadwal_kbm` (
  `id_kbm` int NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `id_kelas` int DEFAULT NULL,
  `kbm_jam_pel` int NOT NULL,
  `kbm_jam_mulai` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kbm_jml_mapel_hari` int NOT NULL,
  `istirahat` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kbm`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas_jadwal_kbm`
--

LOCK TABLES `kelas_jadwal_kbm` WRITE;
/*!40000 ALTER TABLE `kelas_jadwal_kbm` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelas_jadwal_kbm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas_jadwal_mapel`
--

DROP TABLE IF EXISTS `kelas_jadwal_mapel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas_jadwal_mapel` (
  `id_jadwal` int NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_hari` int NOT NULL,
  `jam_ke` int NOT NULL,
  `id_mapel` int DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas_jadwal_mapel`
--

LOCK TABLES `kelas_jadwal_mapel` WRITE;
/*!40000 ALTER TABLE `kelas_jadwal_mapel` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelas_jadwal_mapel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas_jadwal_materi`
--

DROP TABLE IF EXISTS `kelas_jadwal_materi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas_jadwal_materi` (
  `id_kjm` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `id_materi` int DEFAULT NULL,
  `id_mapel` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `jadwal_materi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis` int DEFAULT NULL COMMENT '1=materi, 2=tugas',
  PRIMARY KEY (`id_kjm`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas_jadwal_materi`
--

LOCK TABLES `kelas_jadwal_materi` WRITE;
/*!40000 ALTER TABLE `kelas_jadwal_materi` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelas_jadwal_materi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas_materi`
--

DROP TABLE IF EXISTS `kelas_materi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas_materi` (
  `id_materi` int NOT NULL AUTO_INCREMENT,
  `id_tp` int NOT NULL DEFAULT '1',
  `id_smt` int NOT NULL DEFAULT '1',
  `kode_materi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_guru` int DEFAULT NULL,
  `materi_kelas` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_mapel` int DEFAULT '0',
  `kode_mapel` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `judul_materi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isi_materi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `link_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis` int NOT NULL DEFAULT '1' COMMENT '1=materi, 2=tugas',
  PRIMARY KEY (`id_materi`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas_materi`
--

LOCK TABLES `kelas_materi` WRITE;
/*!40000 ALTER TABLE `kelas_materi` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelas_materi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas_siswa`
--

DROP TABLE IF EXISTS `kelas_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` int NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  PRIMARY KEY (`id_kelas_siswa`) USING BTREE,
  UNIQUE KEY `id_kelas_siswa_idx` (`id_kelas_siswa`) USING BTREE,
  KEY `id_siswa_idx` (`id_siswa`) USING BTREE,
  KEY `Id_kelas` (`id_kelas`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas_siswa`
--

LOCK TABLES `kelas_siswa` WRITE;
/*!40000 ALTER TABLE `kelas_siswa` DISABLE KEYS */;
INSERT INTO `kelas_siswa` VALUES (311,3,1,1,1),(321,3,2,1,3),(421,4,2,1,2);
/*!40000 ALTER TABLE `kelas_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas_struktur`
--

DROP TABLE IF EXISTS `kelas_struktur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas_struktur` (
  `id_kelas` int NOT NULL AUTO_INCREMENT,
  `ketua` int DEFAULT NULL,
  `wakil_ketua` int DEFAULT NULL,
  `sekretaris_1` int DEFAULT NULL,
  `sekretaris_2` int DEFAULT NULL,
  `bendahara_1` int DEFAULT NULL,
  `bendahara_2` int DEFAULT NULL,
  `sie_ekstrakurikuler` int DEFAULT NULL,
  `sie_upacara` int DEFAULT NULL,
  `sie_olahraga` int DEFAULT NULL,
  `sie_keagamaan` int DEFAULT NULL,
  `sie_keamanan` int DEFAULT NULL,
  `sie_ketertiban` int DEFAULT NULL,
  `sie_kebersihan` int DEFAULT NULL,
  `sie_keindahan` int DEFAULT NULL,
  `sie_kesehatan` int DEFAULT NULL,
  `sie_kekeluargaan` int DEFAULT NULL,
  `sie_humas` int DEFAULT NULL,
  PRIMARY KEY (`id_kelas`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas_struktur`
--

LOCK TABLES `kelas_struktur` WRITE;
/*!40000 ALTER TABLE `kelas_struktur` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelas_struktur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `level_guru`
--

DROP TABLE IF EXISTS `level_guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `level_guru` (
  `id_level` int NOT NULL AUTO_INCREMENT,
  `level` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_level`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `level_guru`
--

LOCK TABLES `level_guru` WRITE;
/*!40000 ALTER TABLE `level_guru` DISABLE KEYS */;
INSERT INTO `level_guru` VALUES (1,'Kepala Sekolah'),(2,'Wakil Kepala Sekolah'),(3,'Bimbingan Konseling'),(4,'Walikelas'),(5,'Guru');
/*!40000 ALTER TABLE `level_guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `level_kelas`
--

DROP TABLE IF EXISTS `level_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `level_kelas` (
  `id_level` int NOT NULL,
  `level` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_level`) USING BTREE,
  KEY `index_id_level` (`id_level`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `level_kelas`
--

LOCK TABLES `level_kelas` WRITE;
/*!40000 ALTER TABLE `level_kelas` DISABLE KEYS */;
INSERT INTO `level_kelas` VALUES (1,'1'),(2,'2'),(3,'3'),(4,'4'),(5,'5'),(6,'6'),(7,'7'),(8,'8'),(9,'9'),(10,'10'),(11,'11'),(12,'12');
/*!40000 ALTER TABLE `level_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log` (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `log_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int NOT NULL,
  `id_group` int NOT NULL,
  `name_group` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `log_type` int NOT NULL,
  `log_desc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `agent` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `device` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2025-12-05 21:20:14',1,1,'admin',0,'Login','::1','Chrome 142.0.0.0','Windows 10'),(2,'2025-12-05 21:33:18',1,1,'admin',0,'mengganti tahun ajaran aktif','::1','Chrome 142.0.0.0','Windows 10'),(3,'2025-12-05 21:33:22',1,1,'admin',0,'mengganti semester aktif','::1','Chrome 142.0.0.0','Windows 10'),(4,'2025-12-05 21:35:09',1,1,'admin',0,'mengganti semester aktif','::1','Chrome 142.0.0.0','Windows 10'),(5,'2025-12-05 21:36:19',1,1,'admin',0,'mengganti tahun ajaran aktif','::1','Chrome 142.0.0.0','Windows 10'),(6,'2025-12-05 21:39:40',2,3,'siswa',0,'Login','::1','Chrome 142.0.0.0','Windows 10'),(7,'2025-12-05 21:41:17',1,1,'admin',0,'mengganti semester aktif','::1','Chrome 142.0.0.0','Windows 10'),(8,'2025-12-05 21:49:20',1,1,'admin',0,'menambah bank soal','::1','Chrome 142.0.0.0','Windows 10'),(9,'2025-12-05 21:51:47',1,1,'admin',0,'mengedit soal','::1','Chrome 142.0.0.0','Windows 10'),(10,'2025-12-05 21:52:59',1,1,'admin',0,'mengedit soal','::1','Chrome 142.0.0.0','Windows 10'),(11,'2025-12-05 21:54:53',1,1,'admin',0,'menambah jadwal pelajaran','::1','Chrome 142.0.0.0','Windows 10'),(12,'2025-12-05 21:55:08',2,3,'siswa',0,'Login','::1','Chrome 142.0.0.0','Windows 10'),(13,'2025-12-05 22:05:08',3,2,'guru',0,'Login','::1','Chrome 142.0.0.0','Windows 10'),(14,'2025-12-05 22:26:04',1,1,'admin',0,'menambah bank soal','::1','Chrome 142.0.0.0','Windows 10'),(15,'2025-12-09 18:09:02',1,1,'admin',0,'Login','::1','Chrome 142.0.0.0','Windows 10'),(16,'2025-12-11 10:08:33',1,1,'admin',0,'Login','::1','Chrome 139.0.7258.139','Windows 10'),(17,'2025-12-11 16:34:16',1,1,'admin',0,'Login','::1','Chrome 142.0.0.0','Windows 10'),(18,'2025-12-11 16:36:36',2,3,'siswa',0,'Login','::1','Chrome 142.0.0.0','Windows 10'),(19,'2025-12-12 23:19:16',1,1,'admin',0,'Login','::1','Chrome 142.0.0.0','Windows 10'),(20,'2025-12-13 10:13:27',1,1,'admin',0,'Login','::1','Chrome 142.0.0.0','Windows 10');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_materi`
--

DROP TABLE IF EXISTS `log_materi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_materi` (
  `id_log` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `log_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_siswa` int DEFAULT NULL,
  `jam_ke` int NOT NULL,
  `id_materi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_mapel` int DEFAULT NULL,
  `log_type` int NOT NULL,
  `log_desc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `nilai` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `catatan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `address` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `agent` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `device` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `finish_time` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_materi`
--

LOCK TABLES `log_materi` WRITE;
/*!40000 ALTER TABLE `log_materi` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_materi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_ujian`
--

DROP TABLE IF EXISTS `log_ujian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_ujian` (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `log_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_siswa` int DEFAULT NULL,
  `id_jadwal` int DEFAULT NULL,
  `log_type` int NOT NULL,
  `log_desc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `agent` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `device` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reset` int NOT NULL COMMENT '0=tidak reset, 1=reset',
  `finish_time` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1013 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_ujian`
--

LOCK TABLES `log_ujian` WRITE;
/*!40000 ALTER TABLE `log_ujian` DISABLE KEYS */;
INSERT INTO `log_ujian` VALUES (1011,'2025-12-05 21:56:50',1,1,1,'Memulai Ujian','::1','Chrome 142.0.0.0','Windows 10',0,NULL),(1012,'2025-12-05 21:59:20',1,1,2,'Menyelesaikan Ujian','::1','Chrome 142.0.0.0','Windows 10',0,NULL);
/*!40000 ALTER TABLE `log_ujian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login_attempts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_ekstra`
--

DROP TABLE IF EXISTS `master_ekstra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_ekstra` (
  `id_ekstra` int NOT NULL AUTO_INCREMENT,
  `nama_ekstra` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_ekstra` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_ekstra`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_ekstra`
--

LOCK TABLES `master_ekstra` WRITE;
/*!40000 ALTER TABLE `master_ekstra` DISABLE KEYS */;
INSERT INTO `master_ekstra` VALUES (1,'Pramuka','PRAM'),(2,'Baca Tulis Al Quran','BTQ'),(3,'Tahfidz','TFZ');
/*!40000 ALTER TABLE `master_ekstra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_guru`
--

DROP TABLE IF EXISTS `master_guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_guru` (
  `id_guru` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `nip` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_guru` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kode_guru` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `no_ktp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat_lahir` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agama` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_hp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat_jalan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rt_rw` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dusun` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelurahan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kecamatan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kabupaten` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `provinsi` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kode_pos` int DEFAULT NULL,
  `kewarganegaraan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nuptk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_ptk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgs_tambahan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_aktif` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_nikah` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `keahlian_isyarat` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `npwp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_guru`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_guru`
--

LOCK TABLES `master_guru` WRITE;
/*!40000 ALTER TABLE `master_guru` DISABLE KEYS */;
INSERT INTO `master_guru` VALUES (1,3,'123456789','tukinem',NULL,NULL,'tukinem','tukinem',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'uploads/profiles/123456789.jpg');
/*!40000 ALTER TABLE `master_guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_hari_efektif`
--

DROP TABLE IF EXISTS `master_hari_efektif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_hari_efektif` (
  `id_hari_efektif` int NOT NULL AUTO_INCREMENT,
  `jml_hari_efektif` int NOT NULL,
  PRIMARY KEY (`id_hari_efektif`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_hari_efektif`
--

LOCK TABLES `master_hari_efektif` WRITE;
/*!40000 ALTER TABLE `master_hari_efektif` DISABLE KEYS */;
/*!40000 ALTER TABLE `master_hari_efektif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_jurusan`
--

DROP TABLE IF EXISTS `master_jurusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_jurusan` (
  `id_jurusan` int NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_jurusan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mapel_peminatan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` int NOT NULL DEFAULT '1',
  `deletable` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_jurusan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_jurusan`
--

LOCK TABLES `master_jurusan` WRITE;
/*!40000 ALTER TABLE `master_jurusan` DISABLE KEYS */;
INSERT INTO `master_jurusan` VALUES (1,'IPA','IPA',NULL,1,0),(2,'IPS','IPS',NULL,1,0),(3,'BAHASA','BAHASA',NULL,1,0),(4,'KEAGAMAAN','AGAMA',NULL,0,1),(5,'NON JURUSAN','NON',NULL,1,0);
/*!40000 ALTER TABLE `master_jurusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_kelas`
--

DROP TABLE IF EXISTS `master_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_kelas` (
  `id_kelas` int NOT NULL AUTO_INCREMENT,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `nama_kelas` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_kelas` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jurusan_id` int DEFAULT NULL,
  `level_id` int NOT NULL,
  `guru_id` int DEFAULT NULL,
  `siswa_id` int DEFAULT NULL,
  `jumlah_siswa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `set_siswa` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '0',
  PRIMARY KEY (`id_kelas`) USING BTREE,
  KEY `index_level_Id` (`level_id`) USING BTREE,
  CONSTRAINT `key_id_cek` FOREIGN KEY (`level_id`) REFERENCES `level_kelas` (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_kelas`
--

LOCK TABLES `master_kelas` WRITE;
/*!40000 ALTER TABLE `master_kelas` DISABLE KEYS */;
INSERT INTO `master_kelas` VALUES (1,3,1,'kelas 1','123',NULL,1,0,1,'a:1:{i:0;a:1:{s:2:\"id\";s:1:\"1\";}}','0'),(2,4,2,'kelas 2','789',NULL,2,0,1,'a:1:{i:0;a:1:{s:2:\"id\";s:1:\"1\";}}','0'),(3,3,2,'kelas 1','123',NULL,1,0,1,'a:1:{i:0;a:1:{s:2:\"id\";s:1:\"1\";}}','0');
/*!40000 ALTER TABLE `master_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_kelompok_mapel`
--

DROP TABLE IF EXISTS `master_kelompok_mapel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_kelompok_mapel` (
  `id_kel_mapel` int NOT NULL AUTO_INCREMENT,
  `kode_kel_mapel` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_kel_mapel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kategori` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_parent` int DEFAULT NULL,
  PRIMARY KEY (`id_kel_mapel`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_kelompok_mapel`
--

LOCK TABLES `master_kelompok_mapel` WRITE;
/*!40000 ALTER TABLE `master_kelompok_mapel` DISABLE KEYS */;
INSERT INTO `master_kelompok_mapel` VALUES (1,'A','Kelompok A (Wajib)','WAJIB',0),(2,'B','Kelompok B','WAJIB',0),(3,'C','Kelompok C','PEMINATAN',0),(4,'MULOK','Muatan Lokal','MULOK',0),(5,'C1','Kelompok C1','PEMINATAN',3),(6,'PAI','PAI','PAI (Kemenag)',0);
/*!40000 ALTER TABLE `master_kelompok_mapel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_mapel`
--

DROP TABLE IF EXISTS `master_mapel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_mapel` (
  `id_mapel` int NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelompok` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '-',
  `bobot_p` int NOT NULL DEFAULT '0',
  `bobot_k` int NOT NULL DEFAULT '0',
  `jenjang` int NOT NULL DEFAULT '0',
  `urutan` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `deletable` int NOT NULL DEFAULT '1',
  `urutan_tampil` int DEFAULT NULL,
  PRIMARY KEY (`id_mapel`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_mapel`
--

LOCK TABLES `master_mapel` WRITE;
/*!40000 ALTER TABLE `master_mapel` DISABLE KEYS */;
INSERT INTO `master_mapel` VALUES (1,'Al Quran-Hadis','QH','PAI',0,0,1,1,1,0,1),(2,'Fiqih','FQH','PAI',0,0,1,1,1,0,3),(3,'Akidah Akhlak','AA','PAI',0,0,1,1,1,0,2),(4,'Sejarah Kebudayaan Islam','SKI','PAI',0,0,1,1,1,0,4),(5,'Bahasa Arab','BAR','A',0,0,1,2,1,0,3),(6,'Bahasa Indonesia','BIND','A',0,0,1,2,1,0,2),(7,'Bahasa Inggris','BING','A',0,0,1,2,1,0,7),(8,'Matematika','MTK','A',0,0,1,2,1,0,4),(9,'Ilmu Pengetahuan Alam','IPA','A',0,0,1,2,1,0,5),(10,'Ilmu Pengetahuan Sosial','IPS','A',0,0,1,2,1,0,6),(11,'Pendidikan Pancasila dan Kewarganegaraan','PPKn','A',0,0,1,2,1,0,1),(12,'Pendidikan Jasmani Olah Raga dan Kesehatan','PJOK','B',0,0,1,3,1,0,2),(13,'Seni Budaya','SB','B',0,0,2,3,1,0,1),(14,'Prakarya','PRA','B',0,0,2,3,1,0,3),(15,'SBdP','SBDP','B',0,0,0,3,0,0,1),(16,'Akhlak','AK','C',0,0,3,0,0,0,19),(17,'Antropologi','ANT','C1',0,0,3,0,1,0,4),(18,'Bahasa Arab (Peminatan)','BAR-P','C',0,0,3,0,1,0,3),(19,'Bahasa dan Sastra Asing Lainnya','BSAL','C',0,0,3,0,1,0,16),(20,'Bahasa dan Sastra Indonesia','BSIN','C',0,0,3,0,1,0,15),(21,'Bahasa dan Sastra Inggris','BSING','C',0,0,3,0,1,0,14),(22,'Bahasa Jepang','JPN','C',0,0,3,0,1,0,18),(23,'Bahasa Jerman','JRM','C',0,0,3,0,1,0,12),(24,'Biologi','BIO','C',0,0,3,0,1,0,2),(25,'Ekonomi','EKN','C',0,0,3,0,1,0,11),(26,'Fikih (Peminatan)','FQH-P','C',0,0,3,0,1,0,4),(27,'Fikih - Ushul Fikih','UFQH','C',0,0,3,0,1,0,5),(28,'Fisika','FIS','C1',0,0,3,0,1,0,3),(29,'Geografi','GEO','C',0,0,3,0,1,0,10),(30,'Hadis - Ilmu Hadis','HA','C',0,0,3,0,1,0,6),(31,'Ilmu Kalam','IK','C',0,0,3,0,1,0,7),(32,'Informatika','INF','C',0,0,3,0,0,0,13),(33,'Keterampilan','KTR','C',0,0,3,0,0,0,17),(34,'Kimia','KIM','C1',0,0,3,0,1,0,2),(35,'Prakarya dan Kewirausahaan','PK','B',0,0,3,0,0,0,3),(36,'Sejarah','SEJ','C',0,0,3,0,1,0,8),(37,'Sejarah Indonesia','SJI','A',0,0,3,0,1,0,5),(38,'Sosiologi','SOS','C',0,0,3,0,1,0,9),(39,'Tafsir - Ilmu Tafsir','TT','C1',0,0,3,0,1,0,1),(40,'Bahasa Sunda','BSUND','MULOK',0,0,1,0,1,1,1),(41,'Pendidikan Agama dan Budi Pekerti','PABP','A',0,0,1,1,1,0,1),(42,'Matematika (Peminatan)','MTK-P','C',0,0,3,0,1,1,1);
/*!40000 ALTER TABLE `master_mapel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_siswa`
--

DROP TABLE IF EXISTS `master_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_siswa` (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
  `nisn` int(10) unsigned zerofill NOT NULL,
  `nis` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kelas_awal` int NOT NULL,
  `tahun_masuk` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sekolah_asal` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agama` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'siswa.png',
  `anak_ke` int DEFAULT NULL,
  `status_keluarga` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `rt` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rw` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelurahan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kecamatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kabupaten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `provinsi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kode_pos` int DEFAULT NULL,
  `nama_ayah` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_lahir_ayah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pendidikan_ayah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nohp_ayah` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat_ayah` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `nama_ibu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_lahir_ibu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pendidikan_ibu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nohp_ibu` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat_ibu` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `nama_wali` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_lahir_wali` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pendidikan_wali` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pekerjaan_wali` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nohp_wali` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat_wali` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `nik` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `warga_negara` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_siswa`,`uid`,`nisn`,`nis`) USING BTREE,
  UNIQUE KEY `Id_siswa_idx` (`id_siswa`) USING BTREE,
  UNIQUE KEY `uid_idx` (`uid`) USING BTREE,
  UNIQUE KEY `nisn` (`nisn`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_siswa`
--

LOCK TABLES `master_siswa` WRITE;
/*!40000 ALTER TABLE `master_siswa` DISABLE KEYS */;
INSERT INTO `master_siswa` VALUES (1,0012345678,'123456','kombon','L','kombon','kombon',1,'2025-12-05',NULL,NULL,NULL,NULL,NULL,NULL,'uploads/foto_siswa/123456jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','6d1ab06d-d1e6-11f0-8c64-00155df25222');
/*!40000 ALTER TABLE `master_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_smt`
--

DROP TABLE IF EXISTS `master_smt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_smt` (
  `id_smt` int NOT NULL AUTO_INCREMENT,
  `smt` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_smt` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` int NOT NULL,
  PRIMARY KEY (`id_smt`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_smt`
--

LOCK TABLES `master_smt` WRITE;
/*!40000 ALTER TABLE `master_smt` DISABLE KEYS */;
INSERT INTO `master_smt` VALUES (1,'Ganjil','I (satu)',0),(2,'Genap','II (dua)',1);
/*!40000 ALTER TABLE `master_smt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_tp`
--

DROP TABLE IF EXISTS `master_tp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_tp` (
  `id_tp` int NOT NULL AUTO_INCREMENT,
  `tahun` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` int NOT NULL,
  PRIMARY KEY (`id_tp`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_tp`
--

LOCK TABLES `master_tp` WRITE;
/*!40000 ALTER TABLE `master_tp` DISABLE KEYS */;
INSERT INTO `master_tp` VALUES (1,'2020/2021',0),(2,'2021/2022',0),(3,'2022/2023',1),(4,'2023/2024',0);
/*!40000 ALTER TABLE `master_tp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `dari` int DEFAULT NULL,
  `dari_group` int DEFAULT NULL,
  `kepada` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'group',
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_post`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_comments`
--

DROP TABLE IF EXISTS `post_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_comments` (
  `id_comment` int NOT NULL AUTO_INCREMENT,
  `id_post` int DEFAULT NULL,
  `dari` int DEFAULT NULL,
  `dari_group` int DEFAULT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '1:pengumuman, 2:materi, 3:tugas',
  PRIMARY KEY (`id_comment`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_comments`
--

LOCK TABLES `post_comments` WRITE;
/*!40000 ALTER TABLE `post_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_reply`
--

DROP TABLE IF EXISTS `post_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_reply` (
  `id_reply` int NOT NULL AUTO_INCREMENT,
  `id_comment` int DEFAULT NULL,
  `dari` int DEFAULT NULL,
  `dari_group` int DEFAULT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_reply`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_reply`
--

LOCK TABLES `post_reply` WRITE;
/*!40000 ALTER TABLE `post_reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `isi` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_user` int NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '1' COMMENT '1=publish, 0=draft',
  `kategori` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'Berita',
  `views` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'asasa','asasa','<p>sdsds</p>','',1,'2025-12-13 09:46:49',1,'Berita',1);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_admin_setting`
--

DROP TABLE IF EXISTS `rapor_admin_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_admin_setting` (
  `id_setting` int NOT NULL AUTO_INCREMENT,
  `id_tp` int NOT NULL DEFAULT '0',
  `id_smt` int NOT NULL DEFAULT '0',
  `kkm_tunggal` int NOT NULL DEFAULT '0',
  `kkm` int DEFAULT NULL,
  `bobot_ph` int DEFAULT NULL,
  `bobot_pts` int DEFAULT NULL,
  `bobot_pas` int DEFAULT NULL,
  `bobot_absen` int DEFAULT NULL,
  `tgl_rapor_akhir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_rapor_kelas_akhir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_rapor_pts` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nip_kepsek` int DEFAULT '0',
  `nip_walikelas` int DEFAULT '0',
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_admin_setting`
--

LOCK TABLES `rapor_admin_setting` WRITE;
/*!40000 ALTER TABLE `rapor_admin_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_admin_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_catatan_wali`
--

DROP TABLE IF EXISTS `rapor_catatan_wali`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_catatan_wali` (
  `id_catatan_wali` int NOT NULL AUTO_INCREMENT,
  `id_tp` int NOT NULL DEFAULT '0',
  `id_smt` int NOT NULL DEFAULT '0',
  `id_kelas` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `nilai` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_catatan_wali`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_catatan_wali`
--

LOCK TABLES `rapor_catatan_wali` WRITE;
/*!40000 ALTER TABLE `rapor_catatan_wali` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_catatan_wali` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_data_catatan`
--

DROP TABLE IF EXISTS `rapor_data_catatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_data_catatan` (
  `id_catatan` int NOT NULL AUTO_INCREMENT,
  `id_tp` int NOT NULL DEFAULT '0',
  `id_smt` int NOT NULL DEFAULT '0',
  `id_kelas` int DEFAULT NULL,
  `jenis` int NOT NULL COMMENT '1=desk absensi, 2=desk catatan, 3=desk ranking',
  `kode` int NOT NULL,
  `deskripsi` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rank` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_catatan`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_data_catatan`
--

LOCK TABLES `rapor_data_catatan` WRITE;
/*!40000 ALTER TABLE `rapor_data_catatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_data_catatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_data_fisik`
--

DROP TABLE IF EXISTS `rapor_data_fisik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_data_fisik` (
  `id_fisik` int NOT NULL AUTO_INCREMENT,
  `id_tp` int NOT NULL DEFAULT '0',
  `id_smt` int NOT NULL DEFAULT '0',
  `id_kelas` int DEFAULT NULL,
  `jenis` int NOT NULL COMMENT '1=pendengaran, 2=penglihatan, 3=gigi, 4=lain-lain',
  `kode` int NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_fisik`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_data_fisik`
--

LOCK TABLES `rapor_data_fisik` WRITE;
/*!40000 ALTER TABLE `rapor_data_fisik` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_data_fisik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_data_sikap`
--

DROP TABLE IF EXISTS `rapor_data_sikap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_data_sikap` (
  `id_sikap` int NOT NULL AUTO_INCREMENT,
  `id_tp` int NOT NULL DEFAULT '0',
  `id_smt` int NOT NULL DEFAULT '0',
  `id_kelas` int DEFAULT NULL,
  `jenis` int NOT NULL COMMENT '1=spiritual, 2=sosial',
  `kode` int NOT NULL,
  `sikap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_sikap`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_data_sikap`
--

LOCK TABLES `rapor_data_sikap` WRITE;
/*!40000 ALTER TABLE `rapor_data_sikap` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_data_sikap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_fisik`
--

DROP TABLE IF EXISTS `rapor_fisik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_fisik` (
  `id_fisik` int NOT NULL AUTO_INCREMENT,
  `id_kelas` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `kondisi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tinggi` int NOT NULL,
  `berat` int NOT NULL,
  PRIMARY KEY (`id_fisik`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_fisik`
--

LOCK TABLES `rapor_fisik` WRITE;
/*!40000 ALTER TABLE `rapor_fisik` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_fisik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_kikd`
--

DROP TABLE IF EXISTS `rapor_kikd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_kikd` (
  `id_kikd` int NOT NULL AUTO_INCREMENT,
  `id_mapel_kelas` int DEFAULT NULL,
  `aspek` int NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `materi_kikd` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kikd`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_kikd`
--

LOCK TABLES `rapor_kikd` WRITE;
/*!40000 ALTER TABLE `rapor_kikd` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_kikd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_kkm`
--

DROP TABLE IF EXISTS `rapor_kkm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_kkm` (
  `id_kkm` int NOT NULL AUTO_INCREMENT,
  `kkm` int DEFAULT '0',
  `bobot_ph` int DEFAULT '0',
  `bobot_pts` int DEFAULT '0',
  `bobot_pas` int DEFAULT '0',
  `bobot_absen` int DEFAULT '0',
  `beban_jam` int DEFAULT '0',
  `id_tp` int NOT NULL DEFAULT '0',
  `id_smt` int NOT NULL DEFAULT '0',
  `jenis` int NOT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_mapel` int DEFAULT NULL,
  PRIMARY KEY (`id_kkm`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_kkm`
--

LOCK TABLES `rapor_kkm` WRITE;
/*!40000 ALTER TABLE `rapor_kkm` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_kkm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_naik`
--

DROP TABLE IF EXISTS `rapor_naik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_naik` (
  `id_naik` int NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `id_siswa` int NOT NULL,
  `naik` int NOT NULL,
  PRIMARY KEY (`id_naik`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_naik`
--

LOCK TABLES `rapor_naik` WRITE;
/*!40000 ALTER TABLE `rapor_naik` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_naik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_nilai_akhir`
--

DROP TABLE IF EXISTS `rapor_nilai_akhir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_nilai_akhir` (
  `id_nilai_akhir` int NOT NULL AUTO_INCREMENT,
  `id_mapel` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `nilai` int DEFAULT '0',
  `akhir` int DEFAULT NULL,
  `predikat` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_nilai_akhir`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_nilai_akhir`
--

LOCK TABLES `rapor_nilai_akhir` WRITE;
/*!40000 ALTER TABLE `rapor_nilai_akhir` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_nilai_akhir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_nilai_ekstra`
--

DROP TABLE IF EXISTS `rapor_nilai_ekstra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_nilai_ekstra` (
  `id_nilai_ekstra` int NOT NULL AUTO_INCREMENT,
  `id_ekstra` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `nilai` int NOT NULL,
  `predikat` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_nilai_ekstra`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_nilai_ekstra`
--

LOCK TABLES `rapor_nilai_ekstra` WRITE;
/*!40000 ALTER TABLE `rapor_nilai_ekstra` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_nilai_ekstra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_nilai_harian`
--

DROP TABLE IF EXISTS `rapor_nilai_harian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_nilai_harian` (
  `id_nilai_harian` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int DEFAULT NULL,
  `id_mapel` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `p1` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p2` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p3` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p4` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p5` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p6` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p7` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p8` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p_rata_rata` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p_predikat` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p_deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `k1` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `k2` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `k3` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `k4` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `k5` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `k6` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `k7` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `k8` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `k_rata_rata` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `k_predikat` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `k_deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `jml` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_nilai_harian`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_nilai_harian`
--

LOCK TABLES `rapor_nilai_harian` WRITE;
/*!40000 ALTER TABLE `rapor_nilai_harian` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_nilai_harian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_nilai_pts`
--

DROP TABLE IF EXISTS `rapor_nilai_pts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_nilai_pts` (
  `id_nilai_pts` int NOT NULL AUTO_INCREMENT,
  `id_mapel` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `nilai` int DEFAULT '0',
  `predikat` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_nilai_pts`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_nilai_pts`
--

LOCK TABLES `rapor_nilai_pts` WRITE;
/*!40000 ALTER TABLE `rapor_nilai_pts` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_nilai_pts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_nilai_sikap`
--

DROP TABLE IF EXISTS `rapor_nilai_sikap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_nilai_sikap` (
  `id_nilai_sikap` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_tp` int NOT NULL DEFAULT '0',
  `id_smt` int NOT NULL DEFAULT '0',
  `jenis` int DEFAULT NULL,
  `nilai` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_nilai_sikap`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_nilai_sikap`
--

LOCK TABLES `rapor_nilai_sikap` WRITE;
/*!40000 ALTER TABLE `rapor_nilai_sikap` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_nilai_sikap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapor_prestasi`
--

DROP TABLE IF EXISTS `rapor_prestasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapor_prestasi` (
  `id_ranking` int NOT NULL AUTO_INCREMENT,
  `id_kelas` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `ranking` int NOT NULL,
  `deskripsi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `p1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `p1_desk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `p2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `p2_desk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `p3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `p3_desk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_ranking`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapor_prestasi`
--

LOCK TABLES `rapor_prestasi` WRITE;
/*!40000 ALTER TABLE `rapor_prestasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapor_prestasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `running_text`
--

DROP TABLE IF EXISTS `running_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `running_text` (
  `id_text` int NOT NULL AUTO_INCREMENT,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_text`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `running_text`
--

LOCK TABLES `running_text` WRITE;
/*!40000 ALTER TABLE `running_text` DISABLE KEYS */;
INSERT INTO `running_text` VALUES (1,'hey kamu'),(2,''),(3,''),(4,''),(5,'');
/*!40000 ALTER TABLE `running_text` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_profile`
--

DROP TABLE IF EXISTS `school_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `school_profile` (
  `id_profile` int NOT NULL AUTO_INCREMENT,
  `sejarah` longtext,
  `visi_misi` longtext,
  `struktur_organisasi` varchar(255) DEFAULT NULL,
  `link_fb` varchar(255) DEFAULT NULL,
  `link_ig` varchar(255) DEFAULT NULL,
  `link_yt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_profile`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_profile`
--

LOCK TABLES `school_profile` WRITE;
/*!40000 ALTER TABLE `school_profile` DISABLE KEYS */;
INSERT INTO `school_profile` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `school_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `setting` (
  `id_setting` int NOT NULL AUTO_INCREMENT,
  `kode_sekolah` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sekolah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `npsn` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nss` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenjang` int DEFAULT NULL,
  `kepsek` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nip` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanda_tangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `alamat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `desa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kecamatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kota` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `provinsi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kode_pos` int DEFAULT NULL,
  `telp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fax` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `web` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_aplikasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo_kanan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `logo_kiri` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `versi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ip_server` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `waktu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `server` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_server` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sekolah_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `db_versi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `satuan_pendidikan` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sambutan` text COLLATE utf8mb4_general_ci,
  `motto` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,NULL,'uptsdn','34','23',1,'saya','','','dusun pundut desa punduttrate rt 01 / rw 01','benjeng','benjeng','Gresik','Jawa Timur',61172,'','','https://uptsdn63gresik.sch.id/','sdnikerikergeger@gmail.com','classroom','','uploads/settings/logo_kiri.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','saya sambut hahaha','molto');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `activation_selector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `activation_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `forgotten_password_selector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `forgotten_password_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `forgotten_password_time` int unsigned DEFAULT NULL,
  `remember_selector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remember_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_on` int unsigned NOT NULL,
  `last_login` int unsigned DEFAULT NULL,
  `active` tinyint unsigned DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id_user` (`id`) USING BTREE,
  UNIQUE KEY `username_idx` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'::1','yoga','$2y$12$aXSXJ1rBJhk/h0S2sX1EXeXpzHy/yOHrCIsNGgvCpvEVP8GF.DX32','yoga@admin.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1764944386,1765595607,1,'Yoga','Yoga',NULL,NULL),(2,'::1','kombon','$2y$10$vgF17uW0h9HDdZpLDjJhBen3Ciguusm/pEl63wawjw03xxcDR44Hy','123456@siswa.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1764944871,1765445796,1,'kombon','kombon',NULL,NULL),(3,'::1','tukinem','$2y$10$D1MoF.VOsSelJM0vDhfI3.0Aj.iv8KVtQ3NIoFk3RQt5xhkITF4Ce','tukinem@guru.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1764945021,1764947108,1,'tukinem','tukinem',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `group_id` mediumint unsigned NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`) USING BTREE,
  KEY `fk_users_groups_users1_idx` (`user_id`) USING BTREE,
  KEY `fk_users_groups_groups1_idx` (`group_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(2,2,3),(3,3,2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_profile`
--

DROP TABLE IF EXISTS `users_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_profile` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `level_access` int NOT NULL DEFAULT '0',
  `foto` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_profile`
--

LOCK TABLES `users_profile` WRITE;
/*!40000 ALTER TABLE `users_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_profile` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-13 10:34:08
