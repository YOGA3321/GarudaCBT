-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2026 at 06:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garudacbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id_album` int UNSIGNED NOT NULL,
  `nama_album` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `api_setting`
--

CREATE TABLE `api_setting` (
  `id` int NOT NULL,
  `auto_sync` int NOT NULL DEFAULT '0',
  `edit_profile_siswa` int NOT NULL DEFAULT '0',
  `edit_profile_guru` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `api_token`
--

CREATE TABLE `api_token` (
  `id_api` int NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int NOT NULL,
  `address` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `agent` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `device` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `buku_induk`
--

CREATE TABLE `buku_induk` (
  `id_siswa` int NOT NULL,
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
  `catatan_penting` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `buku_induk`
--

INSERT INTO `buku_induk` (`id_siswa`, `uid`, `rombel_awal`, `nama_panggilan`, `bahasa`, `jml_saudara_kandung`, `jml_saudara_tiri`, `jml_saudara_angkat`, `yatim`, `tinggal_bersama`, `jarak`, `gol_darah`, `penyakit`, `kelainan_fisik`, `kegemaran`, `beasiswa`, `no_ijazah_sebelumnya`, `tahun_lulus_sebelumnya`, `pindahan_dari`, `alasan_kepindahan`, `agama_ayah`, `tempat_lahir_ayah`, `wn_ayah`, `penghasilan_ayah`, `hidup_meninggal_ayah`, `agama_ibu`, `tempat_lahir_ibu`, `wn_ibu`, `penghasilan_ibu`, `hidup_meninggal_ibu`, `tempat_lahir_wali`, `agama_wali`, `wn_wali`, `penghasilan_wali`, `status`, `tahun_lulus`, `no_ijazah`, `kelas_akhir`, `lanjut_ke`, `pindah_ke`, `alasan_pindah`, `tgl_pindah`, `bekerja_di`, `catatan_penting`) VALUES
(1, '6d1ab06d-d1e6-11f0-8c64-00155df25222', NULL, NULL, NULL, 0, 0, 0, 0, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bln` int NOT NULL,
  `nama_bln` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `cbt_bank_soal`
--

CREATE TABLE `cbt_bank_soal` (
  `id_bank` int NOT NULL,
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
  `status_soal` int NOT NULL DEFAULT '0' COMMENT '0=belum selesai, 1=sudah selesai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cbt_bank_soal`
--

INSERT INTO `cbt_bank_soal` (`id_bank`, `bank_jenis_id`, `bank_kode`, `bank_level`, `bank_kelas`, `bank_mapel_id`, `bank_jurusan_id`, `bank_guru_id`, `bank_nama`, `kkm`, `jml_soal`, `jml_esai`, `tampil_pg`, `tampil_esai`, `bobot_pg`, `bobot_esai`, `opsi`, `date`, `status`, `soal_agama`, `id_tp`, `id_smt`, `deskripsi`, `jml_kompleks`, `tampil_kompleks`, `bobot_kompleks`, `jml_jodohkan`, `tampil_jodohkan`, `bobot_jodohkan`, `jml_isian`, `tampil_isian`, `bobot_isian`, `status_soal`) VALUES
(1, 0, 'kode1', '1', 'a:2:{i:0;a:1:{s:8:\"kelas_id\";s:1:\"3\";}i:1;a:1:{s:8:\"kelas_id\";N;}}', 6, 0, 1, '', 0, 10, 0, 10, 0, 20, 0, 3, '2025-12-05 14:53:32', 1, '-', 3, 2, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(2, 0, 'kode2', '1', 'a:2:{i:0;a:1:{s:8:\"kelas_id\";s:1:\"3\";}i:1;a:1:{s:8:\"kelas_id\";N;}}', 6, 0, 1, '', 0, 5, 0, 5, 0, 50, 0, 3, '2025-12-05 15:26:04', 1, '-', 3, 2, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cbt_durasi_siswa`
--

CREATE TABLE `cbt_durasi_siswa` (
  `id_durasi` int NOT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_jadwal` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0=belum ujian, 1=sedang ujian, 2=sudah ujian',
  `lama_ujian` time DEFAULT NULL,
  `mulai` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `selesai` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reset` int NOT NULL DEFAULT '0' COMMENT '0=tidak, 1=reset dari 0, 2=reset dari sisa waktu, 3=ulangi semua',
  `time_create` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cbt_durasi_siswa`
--

INSERT INTO `cbt_durasi_siswa` (`id_durasi`, `id_siswa`, `id_jadwal`, `status`, `lama_ujian`, `mulai`, `selesai`, `reset`, `time_create`) VALUES
(101, 1, 1, 2, NULL, '2025-12-05 21:56:50', '2025-12-05 21:59:20', 0, '2025-12-05 21:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `cbt_jadwal`
--

CREATE TABLE `cbt_jadwal` (
  `id_jadwal` int NOT NULL,
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
  `time_create` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cbt_jadwal`
--

INSERT INTO `cbt_jadwal` (`id_jadwal`, `id_tp`, `id_smt`, `id_bank`, `id_jenis`, `tgl_mulai`, `tgl_selesai`, `durasi_ujian`, `pengawas`, `acak_soal`, `acak_opsi`, `hasil_tampil`, `token`, `status`, `ulang`, `reset_login`, `rekap`, `jam_ke`, `jarak`, `time_create`) VALUES
(1, '3', '2', 1, 1, '2025-12-05', '2025-12-05', 10, NULL, 1, 0, 0, 0, 1, 0, 0, 0, 0, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cbt_jenis`
--

CREATE TABLE `cbt_jenis` (
  `id_jenis` int NOT NULL,
  `nama_jenis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_jenis` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cbt_jenis`
--

INSERT INTO `cbt_jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`) VALUES
(1, 'Penilaian Harian', 'PH'),
(2, 'Penilaian Tengah Semester', 'PTS'),
(3, 'Penilaian Akhir Semester', 'PAS'),
(4, 'Penilaian Akhir Tahun', 'PAT'),
(5, 'Ujian Madrasah Berbasis Komputer', 'UMBK'),
(6, 'Try Out', 'TO'),
(7, 'Simulasi', 'SIML');

-- --------------------------------------------------------

--
-- Table structure for table `cbt_kelas_ruang`
--

CREATE TABLE `cbt_kelas_ruang` (
  `id_kelas_ruang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_ruang` int NOT NULL,
  `id_sesi` int NOT NULL DEFAULT '0',
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `set_siswa` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_kop_absensi`
--

CREATE TABLE `cbt_kop_absensi` (
  `id_kop` int NOT NULL,
  `header_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_4` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `proktor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pengawas_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pengawas_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_kop_berita`
--

CREATE TABLE `cbt_kop_berita` (
  `id_kop` int NOT NULL,
  `header_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_4` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_kop_kartu`
--

CREATE TABLE `cbt_kop_kartu` (
  `id_set_kartu` int NOT NULL,
  `header_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_4` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cbt_kop_kartu`
--

INSERT INTO `cbt_kop_kartu` (`id_set_kartu`, `header_1`, `header_2`, `header_3`, `header_4`, `tanggal`) VALUES
(123456, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cbt_nilai`
--

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
  `time_create` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cbt_nilai`
--

INSERT INTO `cbt_nilai` (`id_nilai`, `pg_benar`, `pg_nilai`, `essai_nilai`, `id_siswa`, `id_jadwal`, `kompleks_nilai`, `jodohkan_nilai`, `isian_nilai`, `dikoreksi`, `time_create`) VALUES
(101, 2, '4', '0', 1, 1, '0', '0', '0', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cbt_nomor_peserta`
--

CREATE TABLE `cbt_nomor_peserta` (
  `id_nomor` int NOT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL DEFAULT '1',
  `nomor_peserta` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cbt_nomor_peserta`
--

INSERT INTO `cbt_nomor_peserta` (`id_nomor`, `id_siswa`, `id_tp`, `id_smt`, `nomor_peserta`) VALUES
(13, 1, 3, 1, '2223.01.001');

-- --------------------------------------------------------

--
-- Table structure for table `cbt_pengawas`
--

CREATE TABLE `cbt_pengawas` (
  `id_pengawas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_jadwal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `id_ruang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_sesi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_guru` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_rekap`
--

CREATE TABLE `cbt_rekap` (
  `id_rekap` int NOT NULL,
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
  `soal_essai` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_rekap_nilai`
--

CREATE TABLE `cbt_rekap_nilai` (
  `id_rekap_nilai` int NOT NULL,
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
  `time_create` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_ruang`
--

CREATE TABLE `cbt_ruang` (
  `id_ruang` int NOT NULL,
  `nama_ruang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_ruang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cbt_ruang`
--

INSERT INTO `cbt_ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`) VALUES
(1, 'Ruang 1', 'LAB-KOM'),
(2, 'Ruang 2', 'R2'),
(3, 'Ruang 3', 'R3'),
(4, 'Ruang 4', 'R4'),
(5, 'Ruang 5', 'R5');

-- --------------------------------------------------------

--
-- Table structure for table `cbt_sesi`
--

CREATE TABLE `cbt_sesi` (
  `id_sesi` int NOT NULL,
  `nama_sesi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_sesi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `aktif` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cbt_sesi`
--

INSERT INTO `cbt_sesi` (`id_sesi`, `nama_sesi`, `kode_sesi`, `waktu_mulai`, `waktu_akhir`, `aktif`) VALUES
(1, 'Sesi 1', 'S1', '07:30:00', '22:30:00', 1),
(2, 'Sesi 2', 'S2', '09:00:00', '12:30:00', 1),
(3, 'Sesi 3', 'S3', '10:30:00', '14:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cbt_sesi_siswa`
--

CREATE TABLE `cbt_sesi_siswa` (
  `siswa_id` int NOT NULL,
  `kelas_id` int DEFAULT NULL,
  `ruang_id` int NOT NULL,
  `sesi_id` int NOT NULL,
  `tp_id` int NOT NULL,
  `smt_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cbt_sesi_siswa`
--

INSERT INTO `cbt_sesi_siswa` (`siswa_id`, `kelas_id`, `ruang_id`, `sesi_id`, `tp_id`, `smt_id`) VALUES
(1, 1, 1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cbt_soal`
--

CREATE TABLE `cbt_soal` (
  `id_soal` int NOT NULL,
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
  `timer_menit` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cbt_soal`
--

INSERT INTO `cbt_soal` (`id_soal`, `bank_id`, `mapel_id`, `jenis`, `nomor_soal`, `file`, `file1`, `tipe_file`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `file_a`, `file_b`, `file_c`, `file_d`, `file_e`, `jawaban`, `created_on`, `updated_on`, `tampilkan`, `deskripsi`, `kesulitan`, `timer`, `timer_menit`) VALUES
(1, 1, 0, 1, 1, NULL, NULL, NULL, 'hayo apa', 'satu', 'dua', 'tiga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b', 1764946243, 1764946307, 1, '', 1, 0, 0),
(2, 1, 0, 1, 2, NULL, NULL, NULL, 'kedua apa', 'pertama', 'kedua', 'ketiga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b', 1764946310, 1764946379, 1, '', 1, 0, 0),
(3, 1, 0, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1764946336, 1764946336, 1, '', 1, 0, 0),
(4, 1, 0, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1764946337, 1764946337, 1, '', 1, 0, 0),
(5, 1, 0, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1764946338, 1764946338, 1, '', 1, 0, 0),
(6, 1, 0, 1, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1764946339, 1764946339, 1, '', 1, 0, 0),
(7, 1, 0, 1, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1764946340, 1764946340, 1, '', 1, 0, 0),
(8, 1, 0, 1, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1764946341, 1764946341, 1, '', 1, 0, 0),
(9, 1, 0, 1, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1764946342, 1764946342, 1, '', 1, 0, 0),
(10, 1, 0, 1, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1764946343, 1764946343, 1, '', 1, 0, 0),
(11, 1, 0, 1, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1764946344, 1764946344, 0, '', 1, 0, 0),
(12, 2, 0, 1, 1, 'a:0:{}', NULL, NULL, '<p>Siapakah Presiden Indonesia pada tahun 1999 ?</p><p><img src=\"uploads/bank_soal/img_211_14e7b69b52454eba4bc6.jpg\"></p>\n', '<p>Soekarno</p>\n', '<p>Soeharto</p>\n', '<p>B. J. Habibi</p>\n', '<p>Abdurrahman Wahid</p>\n', '<p>Megawati</p>\n', NULL, NULL, NULL, NULL, NULL, 'C', 1764948593, 1764948593, 0, '', 8, 0, 0),
(13, 2, 0, 2, 1, 'a:0:{}', NULL, NULL, '<p>Contoh soal dengan banyak pilihan ganda:</p><p>Manakah diantara alat berikut ini yang merupakan peralatan dapur? </p>\n', 'a:6:{s:1:\"a\";s:15:\"<p>Cangkul</p>\n\";s:1:\"b\";s:13:\"<p>Pisau</p>\n\";s:1:\"c\";s:13:\"<p>Obeng</p>\n\";s:1:\"d\";s:15:\"<p>Spatula</p>\n\";s:1:\"e\";s:13:\"<p>Panci</p>\n\";s:1:\"f\";s:17:\"<p>Keranjang</p>\n\";}', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 'a:3:{i:0;s:1:\"b\";i:1;s:1:\"d\";i:2;s:1:\"e\";}', 1764948593, 1764948593, 0, '', 8, 0, 0),
(14, 2, 0, 2, 2, 'a:0:{}', NULL, NULL, '<p>Contoh soal dengan pilihan TRUE dan FALSE </p>\n', 'a:2:{s:1:\"a\";s:13:\"<p>Benar</p>\n\";s:1:\"b\";s:13:\"<p>Salah</p>\n\";}', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 'a:1:{i:0;s:1:\"a\";}', 1764948593, 1764948593, 0, '', 8, 0, 0),
(15, 2, 0, 2, 3, 'a:0:{}', NULL, NULL, '<p>Contoh soal dengan pilihan YES dan NO</p>\n', 'a:2:{s:1:\"a\";s:10:\"<p>Ya</p>\n\";s:1:\"b\";s:13:\"<p>Tidak</p>\n\";}', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 'a:1:{i:0;s:1:\"b\";}', 1764948593, 1764948593, 0, '', 8, 0, 0),
(16, 2, 0, 3, 1, 'a:0:{}', NULL, NULL, '<p>Contoh soal menjodohkan dengan satu baris berisi beberapa jawaban benar.<br><br>Cocokanlah peralatan dibawah ini sesuai tempat penggunannya</p>\n', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 'a:3:{s:5:\"model\";s:1:\"2\";s:4:\"type\";s:1:\"1\";s:7:\"jawaban\";a:4:{i:0;a:9:{i:0;s:1:\"#\";i:1;s:15:\"<p>Cangkul</p>\n\";i:2;s:13:\"<p>Pisau</p>\n\";i:3;s:13:\"<p>Obeng</p>\n\";i:4;s:15:\"<p>Spatula</p>\n\";i:5;s:13:\"<p>Panci</p>\n\";i:6;s:17:\"<p>Keranjang</p>\n\";i:7;s:15:\"<p>Gergaji</p>\n\";i:8;s:12:\"<p>Palu</p>\n\";}i:1;a:9:{i:0;s:23:\"<p>Peralatan Dapur</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"0\";i:4;s:1:\"1\";i:5;s:1:\"0\";i:6;s:1:\"1\";i:7;s:1:\"0\";i:8;s:1:\"0\";}i:2;a:9:{i:0;s:23:\"<p>Peralatan Kebun</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:4;s:1:\"0\";i:5;s:1:\"0\";i:6;s:1:\"1\";i:7;s:1:\"0\";i:8;s:1:\"0\";}i:3;a:9:{i:0;s:33:\"<p>Peralatan Tukang Bangunan</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:4;s:1:\"0\";i:5;s:1:\"0\";i:6;s:1:\"0\";i:7;s:1:\"1\";i:8;s:1:\"1\";}}}', 1764948593, 1764948593, 0, '', 8, 0, 0),
(17, 2, 0, 3, 2, 'a:0:{}', NULL, NULL, '<p>Contoh soal menjodohkan dengan satu baris berisi jawaban benar bercampur.<br><br>Cocokanlah peralatan dibawah ini sesuai apa yang dihasilkannya</p>\n', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 'a:3:{s:5:\"model\";s:1:\"2\";s:4:\"type\";s:1:\"1\";s:7:\"jawaban\";a:3:{i:0;a:6:{i:0;s:1:\"#\";i:1;s:21:\"<p>Speaker Aktif</p>\n\";i:2;s:16:\"<p>Televisi</p>\n\";i:3;s:13:\"<p>Radio</p>\n\";i:4;s:19:\"<p>Handphone  </p>\n\";i:5;s:28:\"<p>In Focus (proyektor)</p>\n\";}i:1;a:6:{i:0;s:30:\"<p>Media penghasil suara </p>\n\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"0\";}i:2;a:6:{i:0;s:30:\"<p>Media Penghasil gambar</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"0\";i:4;s:1:\"1\";i:5;s:1:\"1\";}}}', 1764948593, 1764948593, 0, '', 8, 0, 0),
(18, 2, 0, 3, 3, 'a:0:{}', NULL, NULL, '<p>Contoh soal menjodohkan dengan satu baris berisi satu jawaban benar.<br><br>Cocokanlah nama negara di bawah ini dengan Ibukotanya</p>\n', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 'a:3:{s:5:\"model\";s:1:\"1\";s:4:\"type\";s:1:\"2\";s:7:\"jawaban\";a:4:{i:0;a:4:{i:0;s:1:\"#\";i:1;s:17:\"<p>Indonesia</p>\n\";i:2;s:14:\"<p>Jepang</p>\n\";i:3;s:21:\"<p>Korea Selatan</p>\n\";}i:1;a:4:{i:0;s:13:\"<p>Seoul</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"1\";}i:2;a:4:{i:0;s:15:\"<p>Jakarta</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";i:3;s:1:\"0\";}i:3;a:4:{i:0;s:13:\"<p>Tokyo</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"0\";}}}', 1764948593, 1764948593, 0, '', 8, 0, 0),
(19, 2, 0, 3, 4, 'a:0:{}', NULL, NULL, '<p>Contoh soal seperti contoh nomor 1, tapi baris dan kolom dibalik:<br><br>Cocokanlah peralatan dibawah ini sesuai tempat penggunannya</p>\n', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 'a:3:{s:5:\"model\";s:1:\"2\";s:4:\"type\";s:1:\"2\";s:7:\"jawaban\";a:9:{i:0;a:4:{i:0;s:1:\"#\";i:1;s:23:\"<p>Peralatan Dapur</p>\n\";i:2;s:23:\"<p>Peralatan Kebun</p>\n\";i:3;s:33:\"<p>Peralatan Tukang Bangunan</p>\n\";}i:1;a:4:{i:0;s:15:\"<p>Cangkul</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"0\";}i:2;a:4:{i:0;s:13:\"<p>Pisau</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";i:3;s:1:\"0\";}i:3;a:4:{i:0;s:13:\"<p>Obeng</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"1\";}i:4;a:4:{i:0;s:15:\"<p>Spatula</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";i:3;s:1:\"0\";}i:5;a:4:{i:0;s:13:\"<p>Panci</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";i:3;s:1:\"0\";}i:6;a:4:{i:0;s:17:\"<p>Keranjang</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";i:3;s:1:\"0\";}i:7;a:4:{i:0;s:15:\"<p>Gergaji</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"1\";}i:8;a:4:{i:0;s:12:\"<p>Palu</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"0\";i:3;s:1:\"1\";}}}', 1764948593, 1764948593, 0, '', 8, 0, 0),
(20, 2, 0, 3, 5, 'a:0:{}', NULL, NULL, '<p>Contoh soal seperti contoh nomor 2, tapi baris dan kolom dibalik:<br><br>Cocokanlah peralatan dibawah ini sesuai apa yang dihasilkannya</p>\n', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 'a:3:{s:5:\"model\";s:1:\"2\";s:4:\"type\";s:1:\"1\";s:7:\"jawaban\";a:6:{i:0;a:3:{i:0;s:1:\"#\";i:1;s:30:\"<p>Media penghasil suara </p>\n\";i:2;s:30:\"<p>Media Penghasil gambar</p>\n\";}i:1;a:3:{i:0;s:21:\"<p>Speaker Aktif</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";}i:2;a:3:{i:0;s:16:\"<p>Televisi</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"1\";}i:3;a:3:{i:0;s:13:\"<p>Radio</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";}i:4;a:3:{i:0;s:19:\"<p>Handphone  </p>\n\";i:1;s:1:\"1\";i:2;s:1:\"1\";}i:5;a:3:{i:0;s:28:\"<p>In Focus (proyektor)</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";}}}', 1764948593, 1764948593, 0, '', 8, 0, 0),
(21, 2, 0, 3, 6, 'a:0:{}', NULL, NULL, '<p>Contoh soal dengan pilihan BENAR dan SALAH, atau YES dan No.</p><p>Jawab pernyataan di bawah ini</p>\n', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 'a:3:{s:5:\"model\";s:1:\"2\";s:4:\"type\";s:1:\"2\";s:7:\"jawaban\";a:4:{i:0;a:3:{i:0;s:1:\"#\";i:1;s:13:\"<p>Benar</p>\n\";i:2;s:13:\"<p>Salah</p>\n\";}i:1;a:3:{i:0;s:20:\"<p>Saya pelajar</p>\n\";i:1;s:1:\"1\";i:2;s:1:\"0\";}i:2;a:3:{i:0;s:28:\"<p>Datang untuk bermain</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";}i:3;a:3:{i:0;s:25:\"<p>Belajar seenaknya</p>\n\";i:1;s:1:\"0\";i:2;s:1:\"1\";}}}', 1764948593, 1764948593, 0, '', 8, 0, 0),
(22, 2, 0, 4, 1, 'a:0:{}', NULL, NULL, '<p>soal isian singkat</p>\n', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 'singkat', 1764948593, 1764948593, 0, '', 8, 0, 0),
(23, 2, 0, 5, 1, 'a:0:{}', NULL, NULL, '<p>uraian</p>\n', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '<p>jawab urai </p>\n', 1764948593, 1764948593, 0, '', 8, 0, 0),
(24, 2, 0, 5, 2, 'a:0:{}', NULL, NULL, '<p>soal uraian </p>\n', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '<p>uraian</p>\n', 1764948593, 1764948593, 0, '', 8, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cbt_soal_siswa`
--

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
  `time_create` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cbt_soal_siswa`
--

INSERT INTO `cbt_soal_siswa` (`id_soal_siswa`, `id_bank`, `id_jadwal`, `id_soal`, `id_siswa`, `jenis_soal`, `no_soal_alias`, `opsi_alias_a`, `opsi_alias_b`, `opsi_alias_c`, `opsi_alias_d`, `opsi_alias_e`, `jawaban_alias`, `jawaban_siswa`, `jawaban_benar`, `point_essai`, `soal_end`, `point_soal`, `nilai_koreksi`, `nilai_otomatis`, `time_create`) VALUES
('10111', 1, 1, 10, 1, 1, 1, 'A', 'B', 'C', '', '', 'B', 'B', NULL, 0, 1, '2', '0', 0, '2025-12-05 21:57:33'),
('101110', 1, 1, 8, 1, 1, 10, 'A', 'B', 'C', '', '', 'A', 'A', NULL, 0, 0, '2', '0', 0, '2025-12-05 21:59:19'),
('10112', 1, 1, 7, 1, 1, 2, 'A', 'B', 'C', '', '', 'B', 'B', NULL, 0, 0, '2', '0', 0, '2025-12-05 21:57:46'),
('10113', 1, 1, 1, 1, 1, 3, 'A', 'B', 'C', '', '', 'B', 'B', 'b', 0, 0, '2', '0', 0, '2025-12-05 21:57:50'),
('10114', 1, 1, 5, 1, 1, 4, 'A', 'B', 'C', '', '', 'A', 'A', NULL, 0, 0, '2', '0', 0, '2025-12-05 21:59:03'),
('10115', 1, 1, 4, 1, 1, 5, 'A', 'B', 'C', '', '', 'C', 'C', NULL, 0, 0, '2', '0', 0, '2025-12-05 21:59:06'),
('10116', 1, 1, 9, 1, 1, 6, 'A', 'B', 'C', '', '', 'C', 'C', NULL, 0, 0, '2', '0', 0, '2025-12-05 21:59:08'),
('10117', 1, 1, 6, 1, 1, 7, 'A', 'B', 'C', '', '', 'A', 'A', NULL, 0, 0, '2', '0', 0, '2025-12-05 21:59:12'),
('10118', 1, 1, 2, 1, 1, 8, 'A', 'B', 'C', '', '', 'B', 'B', 'b', 0, 0, '2', '0', 0, '2025-12-05 21:57:57'),
('10119', 1, 1, 3, 1, 1, 9, 'A', 'B', 'C', '', '', 'A', 'A', NULL, 0, 0, '2', '0', 0, '2025-12-05 21:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `cbt_token`
--

CREATE TABLE `cbt_token` (
  `token` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `auto` int NOT NULL,
  `id_token` int NOT NULL,
  `jarak` int NOT NULL DEFAULT '0',
  `updated` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cbt_token`
--

INSERT INTO `cbt_token` (`token`, `auto`, `id_token`, `jarak`, `updated`) VALUES
('HILZCX', 0, 1, 0, '2022-03-25 08:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int NOT NULL,
  `id_post` int DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `body` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comment`, `id_post`, `name`, `email`, `body`, `created_at`, `status`) VALUES
(1, 1, 'ss', 'ageng.prayoga321@gmail.com', 'ddsds', '2025-12-13 11:39:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint UNSIGNED NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'guru', 'Pembuat Soal dan ujian'),
(3, 'siswa', 'Peserta Ujian');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hri` int NOT NULL,
  `nama_hri` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hri`, `nama_hri`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jum\'at'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_guru`
--

CREATE TABLE `jabatan_guru` (
  `id_jabatan_guru` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_guru` int DEFAULT NULL,
  `id_jabatan` int NOT NULL,
  `id_kelas` int DEFAULT '0',
  `mapel_kelas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `ekstra_kelas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jabatan_guru`
--

INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES
('131', 1, 2, 0, 'a:0:{}', 'a:0:{}', 3, 1),
('132', 1, 5, 0, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"1\";s:10:\"nama_mapel\";s:14:\"Al Quran-Hadis\";s:11:\"kelas_mapel\";a:2:{i:0;a:1:{s:5:\"kelas\";s:1:\"3\";}i:1;a:1:{s:5:\"kelas\";N;}}}}', 'a:0:{}', 3, 2),
('232', 2, 5, 0, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:2:\"42\";s:10:\"nama_mapel\";s:22:\"Matematika (Peminatan)\";s:11:\"kelas_mapel\";a:2:{i:0;a:1:{s:5:\"kelas\";s:1:\"3\";}i:1;a:1:{s:5:\"kelas\";N;}}}}', 'a:0:{}', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_catatan_mapel`
--

CREATE TABLE `kelas_catatan_mapel` (
  `id_catatan` int NOT NULL,
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
  `jml` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_catatan_wali`
--

CREATE TABLE `kelas_catatan_wali` (
  `id_catatan` int NOT NULL,
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
  `jml` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_ekstra`
--

CREATE TABLE `kelas_ekstra` (
  `id_kelas_ekstra` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `id_kelas` int DEFAULT NULL,
  `ekstra` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_jadwal_kbm`
--

CREATE TABLE `kelas_jadwal_kbm` (
  `id_kbm` int NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `id_kelas` int DEFAULT NULL,
  `kbm_jam_pel` int NOT NULL,
  `kbm_jam_mulai` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kbm_jml_mapel_hari` int NOT NULL,
  `istirahat` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_jadwal_mapel`
--

CREATE TABLE `kelas_jadwal_mapel` (
  `id_jadwal` int NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_hari` int NOT NULL,
  `jam_ke` int NOT NULL,
  `id_mapel` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_jadwal_materi`
--

CREATE TABLE `kelas_jadwal_materi` (
  `id_kjm` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `id_materi` int DEFAULT NULL,
  `id_mapel` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `jadwal_materi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis` int DEFAULT NULL COMMENT '1=materi, 2=tugas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_materi`
--

CREATE TABLE `kelas_materi` (
  `id_materi` int NOT NULL,
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
  `jenis` int NOT NULL DEFAULT '1' COMMENT '1=materi, 2=tugas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` int NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_kelas_siswa`, `id_tp`, `id_smt`, `id_siswa`, `id_kelas`) VALUES
(311, 3, 1, 1, 1),
(321, 3, 2, 1, 3),
(421, 4, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_struktur`
--

CREATE TABLE `kelas_struktur` (
  `id_kelas` int NOT NULL,
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
  `sie_humas` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `level_guru`
--

CREATE TABLE `level_guru` (
  `id_level` int NOT NULL,
  `level` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `level_guru`
--

INSERT INTO `level_guru` (`id_level`, `level`) VALUES
(1, 'Kepala Sekolah'),
(2, 'Wakil Kepala Sekolah'),
(3, 'Bimbingan Konseling'),
(4, 'Walikelas'),
(5, 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `level_kelas`
--

CREATE TABLE `level_kelas` (
  `id_level` int NOT NULL,
  `level` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `level_kelas`
--

INSERT INTO `level_kelas` (`id_level`, `level`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int NOT NULL,
  `log_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int NOT NULL,
  `id_group` int NOT NULL,
  `name_group` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `log_type` int NOT NULL,
  `log_desc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `agent` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `device` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `log_time`, `id_user`, `id_group`, `name_group`, `log_type`, `log_desc`, `address`, `agent`, `device`) VALUES
(1, '2025-12-05 21:20:14', 1, 1, 'admin', 0, 'Login', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(2, '2025-12-05 21:33:18', 1, 1, 'admin', 0, 'mengganti tahun ajaran aktif', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(3, '2025-12-05 21:33:22', 1, 1, 'admin', 0, 'mengganti semester aktif', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(4, '2025-12-05 21:35:09', 1, 1, 'admin', 0, 'mengganti semester aktif', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(5, '2025-12-05 21:36:19', 1, 1, 'admin', 0, 'mengganti tahun ajaran aktif', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(6, '2025-12-05 21:39:40', 2, 3, 'siswa', 0, 'Login', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(7, '2025-12-05 21:41:17', 1, 1, 'admin', 0, 'mengganti semester aktif', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(8, '2025-12-05 21:49:20', 1, 1, 'admin', 0, 'menambah bank soal', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(9, '2025-12-05 21:51:47', 1, 1, 'admin', 0, 'mengedit soal', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(10, '2025-12-05 21:52:59', 1, 1, 'admin', 0, 'mengedit soal', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(11, '2025-12-05 21:54:53', 1, 1, 'admin', 0, 'menambah jadwal pelajaran', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(12, '2025-12-05 21:55:08', 2, 3, 'siswa', 0, 'Login', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(13, '2025-12-05 22:05:08', 3, 2, 'guru', 0, 'Login', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(14, '2025-12-05 22:26:04', 1, 1, 'admin', 0, 'menambah bank soal', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(15, '2025-12-09 18:09:02', 1, 1, 'admin', 0, 'Login', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(16, '2025-12-11 10:08:33', 1, 1, 'admin', 0, 'Login', '::1', 'Chrome 139.0.7258.139', 'Windows 10'),
(17, '2025-12-11 16:34:16', 1, 1, 'admin', 0, 'Login', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(18, '2025-12-11 16:36:36', 2, 3, 'siswa', 0, 'Login', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(19, '2025-12-12 23:19:16', 1, 1, 'admin', 0, 'Login', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(20, '2025-12-13 10:13:27', 1, 1, 'admin', 0, 'Login', '::1', 'Chrome 142.0.0.0', 'Windows 10'),
(21, '2025-12-16 09:52:25', 3, 2, 'guru', 0, 'Login', '::1', 'Chrome 143.0.0.0', 'Windows 10'),
(22, '2025-12-16 09:53:45', 3, 2, 'guru', 0, 'Login', '::1', 'Chrome 143.0.0.0', 'Windows 10'),
(23, '2025-12-16 09:57:45', 3, 2, 'guru', 0, 'Login', '::1', 'Chrome 143.0.0.0', 'Windows 10'),
(24, '2025-12-16 13:02:15', 3, 2, 'guru', 0, 'Login', '::1', 'Chrome 143.0.0.0', 'Windows 10'),
(25, '2025-12-16 13:11:44', 3, 2, 'guru', 0, 'Login', '::1', 'Chrome 143.0.0.0', 'Windows 10'),
(26, '2025-12-16 13:21:10', 3, 2, 'guru', 0, 'Login', '::1', 'Chrome 143.0.0.0', 'Windows 10'),
(27, '2026-01-05 17:11:20', 1, 1, 'admin', 0, 'Login', '::1', 'Chrome 143.0.0.0', 'Windows 10'),
(28, '2026-01-05 22:15:26', 1, 1, 'admin', 0, 'Login', '::1', 'Chrome 143.0.0.0', 'Windows 10'),
(29, '2026-01-06 12:24:52', 4, 2, 'guru', 0, 'Login', '::1', 'Chrome 143.0.0.0', 'Windows 10'),
(30, '2026-01-06 12:25:15', 3, 2, 'guru', 0, 'Login', '::1', 'Chrome 143.0.0.0', 'Windows 10'),
(31, '2026-01-06 12:25:35', 4, 2, 'guru', 0, 'Login', '::1', 'Chrome 143.0.0.0', 'Windows 10'),
(32, '2026-01-06 12:31:08', 4, 2, 'guru', 0, 'Login', '::1', 'Chrome 143.0.0.0', 'Windows 10'),
(33, '2026-01-06 12:53:51', 3, 2, 'guru', 0, 'Login', '::1', 'Chrome 143.0.0.0', 'Windows 10'),
(34, '2026-01-06 13:11:55', 5, 2, 'guru', 0, 'Login', '::1', 'Chrome 143.0.0.0', 'Windows 10');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(8, '::1', 'admin', 1767677351),
(9, '::1', 'tukinem1', 1767679911);

-- --------------------------------------------------------

--
-- Table structure for table `log_materi`
--

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
  `finish_time` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `log_ujian`
--

CREATE TABLE `log_ujian` (
  `id_log` int NOT NULL,
  `log_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_siswa` int DEFAULT NULL,
  `id_jadwal` int DEFAULT NULL,
  `log_type` int NOT NULL,
  `log_desc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `agent` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `device` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reset` int NOT NULL COMMENT '0=tidak reset, 1=reset',
  `finish_time` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `log_ujian`
--

INSERT INTO `log_ujian` (`id_log`, `log_time`, `id_siswa`, `id_jadwal`, `log_type`, `log_desc`, `address`, `agent`, `device`, `reset`, `finish_time`) VALUES
(1011, '2025-12-05 21:56:50', 1, 1, 1, 'Memulai Ujian', '::1', 'Chrome 142.0.0.0', 'Windows 10', 0, NULL),
(1012, '2025-12-05 21:59:20', 1, 1, 2, 'Menyelesaikan Ujian', '::1', 'Chrome 142.0.0.0', 'Windows 10', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_ekstra`
--

CREATE TABLE `master_ekstra` (
  `id_ekstra` int NOT NULL,
  `nama_ekstra` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_ekstra` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `master_ekstra`
--

INSERT INTO `master_ekstra` (`id_ekstra`, `nama_ekstra`, `kode_ekstra`) VALUES
(1, 'Pramuka', 'PRAM'),
(2, 'Baca Tulis Al Quran', 'BTQ'),
(3, 'Tahfidz', 'TFZ');

-- --------------------------------------------------------

--
-- Table structure for table `master_gallery`
--

CREATE TABLE `master_gallery` (
  `id_gallery` int UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL DEFAULT 'Umum',
  `deskripsi` text,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `master_gallery`
--

INSERT INTO `master_gallery` (`id_gallery`, `judul`, `gambar`, `kategori`, `deskripsi`, `created_at`) VALUES
(1, 'waktu menggambar', 'uploads/gallery/gallery_1765859338.webp', 'Umum', 'deskripsi singkat', '2025-12-15 15:07:44'),
(3, 'belajar bersama', 'uploads/gallery/gallery_1765859315.webp', 'Umum', 'belajar bareng', '2025-12-16 11:28:37'),
(4, 'belajar dikelas', 'uploads/gallery/gallery_1765859395.webp', 'Kegiatan', 'pembelajaran di kelas', '2025-12-16 11:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `master_guru`
--

CREATE TABLE `master_guru` (
  `id_guru` int NOT NULL,
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
  `foto` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `master_guru`
--

INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES
(1, 5, '123456789', 'tukinem', 'jbsjs@gmail.com', NULL, 'tukinem', 'tukinem1', '', '', '0000-00-00', 'P', 'Pilih Agam', '0800', '', NULL, NULL, NULL, '', '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 4, '0987654321', 'parjo', 'fake123email@notreal.xyz', NULL, 'parjo', 'parjo', '', '', '0000-00-00', 'L', 'Islam', '5678', '', NULL, NULL, NULL, '', '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_hari_efektif`
--

CREATE TABLE `master_hari_efektif` (
  `id_hari_efektif` int NOT NULL,
  `jml_hari_efektif` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `master_jurusan`
--

CREATE TABLE `master_jurusan` (
  `id_jurusan` int NOT NULL,
  `nama_jurusan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_jurusan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mapel_peminatan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` int NOT NULL DEFAULT '1',
  `deletable` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `master_jurusan`
--

INSERT INTO `master_jurusan` (`id_jurusan`, `nama_jurusan`, `kode_jurusan`, `mapel_peminatan`, `status`, `deletable`) VALUES
(1, 'IPA', 'IPA', NULL, 1, 0),
(2, 'IPS', 'IPS', NULL, 1, 0),
(3, 'BAHASA', 'BAHASA', NULL, 1, 0),
(4, 'KEAGAMAAN', 'AGAMA', NULL, 0, 1),
(5, 'NON JURUSAN', 'NON', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_kelas`
--

CREATE TABLE `master_kelas` (
  `id_kelas` int NOT NULL,
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
  `aktif` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `master_kelas`
--

INSERT INTO `master_kelas` (`id_kelas`, `id_tp`, `id_smt`, `nama_kelas`, `kode_kelas`, `jurusan_id`, `level_id`, `guru_id`, `siswa_id`, `jumlah_siswa`, `set_siswa`, `aktif`) VALUES
(1, 3, 1, 'kelas 1', '123', NULL, 1, 0, 1, 'a:1:{i:0;a:1:{s:2:\"id\";s:1:\"1\";}}', '0', 1),
(2, 4, 2, 'kelas 2', '789', NULL, 2, 0, 1, 'a:1:{i:0;a:1:{s:2:\"id\";s:1:\"1\";}}', '0', 1),
(3, 3, 2, 'kelas 1', '123', NULL, 1, 0, 1, 'a:1:{i:0;a:1:{s:2:\"id\";s:1:\"1\";}}', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_kelompok_mapel`
--

CREATE TABLE `master_kelompok_mapel` (
  `id_kel_mapel` int NOT NULL,
  `kode_kel_mapel` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_kel_mapel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kategori` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_parent` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `master_kelompok_mapel`
--

INSERT INTO `master_kelompok_mapel` (`id_kel_mapel`, `kode_kel_mapel`, `nama_kel_mapel`, `kategori`, `id_parent`) VALUES
(1, 'A', 'Kelompok A (Wajib)', 'WAJIB', 0),
(2, 'B', 'Kelompok B', 'WAJIB', 0),
(3, 'C', 'Kelompok C', 'PEMINATAN', 0),
(4, 'MULOK', 'Muatan Lokal', 'MULOK', 0),
(5, 'C1', 'Kelompok C1', 'PEMINATAN', 3),
(6, 'PAI', 'PAI', 'PAI (Kemenag)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_link`
--

CREATE TABLE `master_link` (
  `id_link` int NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `target` varchar(20) DEFAULT '_blank',
  `status` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `master_link`
--

INSERT INTO `master_link` (`id_link`, `judul`, `url`, `target`, `status`) VALUES
(1, 'Kemdikbud', 'https://kemendikdasmen.go.id/', '_blank', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_mapel`
--

CREATE TABLE `master_mapel` (
  `id_mapel` int NOT NULL,
  `nama_mapel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelompok` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '-',
  `bobot_p` int NOT NULL DEFAULT '0',
  `bobot_k` int NOT NULL DEFAULT '0',
  `jenjang` int NOT NULL DEFAULT '0',
  `urutan` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `deletable` int NOT NULL DEFAULT '1',
  `urutan_tampil` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `master_mapel`
--

INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`, `urutan_tampil`) VALUES
(1, 'Al Quran-Hadis', 'QH', 'PAI', 0, 0, 1, 1, 1, 0, 1),
(2, 'Fiqih', 'FQH', 'PAI', 0, 0, 1, 1, 1, 0, 3),
(3, 'Akidah Akhlak', 'AA', 'PAI', 0, 0, 1, 1, 1, 0, 2),
(4, 'Sejarah Kebudayaan Islam', 'SKI', 'PAI', 0, 0, 1, 1, 1, 0, 4),
(5, 'Bahasa Arab', 'BAR', 'A', 0, 0, 1, 2, 1, 0, 3),
(6, 'Bahasa Indonesia', 'BIND', 'A', 0, 0, 1, 2, 1, 0, 2),
(7, 'Bahasa Inggris', 'BING', 'A', 0, 0, 1, 2, 1, 0, 7),
(8, 'Matematika', 'MTK', 'A', 0, 0, 1, 2, 1, 0, 4),
(9, 'Ilmu Pengetahuan Alam', 'IPA', 'A', 0, 0, 1, 2, 1, 0, 5),
(10, 'Ilmu Pengetahuan Sosial', 'IPS', 'A', 0, 0, 1, 2, 1, 0, 6),
(11, 'Pendidikan Pancasila dan Kewarganegaraan', 'PPKn', 'A', 0, 0, 1, 2, 1, 0, 1),
(12, 'Pendidikan Jasmani Olah Raga dan Kesehatan', 'PJOK', 'B', 0, 0, 1, 3, 1, 0, 2),
(13, 'Seni Budaya', 'SB', 'B', 0, 0, 2, 3, 1, 0, 1),
(14, 'Prakarya', 'PRA', 'B', 0, 0, 2, 3, 1, 0, 3),
(15, 'SBdP', 'SBDP', 'B', 0, 0, 0, 3, 0, 0, 1),
(16, 'Akhlak', 'AK', 'C', 0, 0, 3, 0, 0, 0, 19),
(17, 'Antropologi', 'ANT', 'C1', 0, 0, 3, 0, 1, 0, 4),
(18, 'Bahasa Arab (Peminatan)', 'BAR-P', 'C', 0, 0, 3, 0, 1, 0, 3),
(19, 'Bahasa dan Sastra Asing Lainnya', 'BSAL', 'C', 0, 0, 3, 0, 1, 0, 16),
(20, 'Bahasa dan Sastra Indonesia', 'BSIN', 'C', 0, 0, 3, 0, 1, 0, 15),
(21, 'Bahasa dan Sastra Inggris', 'BSING', 'C', 0, 0, 3, 0, 1, 0, 14),
(22, 'Bahasa Jepang', 'JPN', 'C', 0, 0, 3, 0, 1, 0, 18),
(23, 'Bahasa Jerman', 'JRM', 'C', 0, 0, 3, 0, 1, 0, 12),
(24, 'Biologi', 'BIO', 'C', 0, 0, 3, 0, 1, 0, 2),
(25, 'Ekonomi', 'EKN', 'C', 0, 0, 3, 0, 1, 0, 11),
(26, 'Fikih (Peminatan)', 'FQH-P', 'C', 0, 0, 3, 0, 1, 0, 4),
(27, 'Fikih - Ushul Fikih', 'UFQH', 'C', 0, 0, 3, 0, 1, 0, 5),
(28, 'Fisika', 'FIS', 'C1', 0, 0, 3, 0, 1, 0, 3),
(29, 'Geografi', 'GEO', 'C', 0, 0, 3, 0, 1, 0, 10),
(30, 'Hadis - Ilmu Hadis', 'HA', 'C', 0, 0, 3, 0, 1, 0, 6),
(31, 'Ilmu Kalam', 'IK', 'C', 0, 0, 3, 0, 1, 0, 7),
(32, 'Informatika', 'INF', 'C', 0, 0, 3, 0, 0, 0, 13),
(33, 'Keterampilan', 'KTR', 'C', 0, 0, 3, 0, 0, 0, 17),
(34, 'Kimia', 'KIM', 'C1', 0, 0, 3, 0, 1, 0, 2),
(35, 'Prakarya dan Kewirausahaan', 'PK', 'B', 0, 0, 3, 0, 0, 0, 3),
(36, 'Sejarah', 'SEJ', 'C', 0, 0, 3, 0, 1, 0, 8),
(37, 'Sejarah Indonesia', 'SJI', 'A', 0, 0, 3, 0, 1, 0, 5),
(38, 'Sosiologi', 'SOS', 'C', 0, 0, 3, 0, 1, 0, 9),
(39, 'Tafsir - Ilmu Tafsir', 'TT', 'C1', 0, 0, 3, 0, 1, 0, 1),
(40, 'Bahasa Sunda', 'BSUND', 'MULOK', 0, 0, 1, 0, 1, 1, 1),
(41, 'Pendidikan Agama dan Budi Pekerti', 'PABP', 'A', 0, 0, 1, 1, 1, 0, 1),
(42, 'Matematika (Peminatan)', 'MTK-P', 'C', 0, 0, 3, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_siswa`
--

CREATE TABLE `master_siswa` (
  `id_siswa` int NOT NULL,
  `nisn` int(10) UNSIGNED ZEROFILL NOT NULL,
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
  `uid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `master_siswa`
--

INSERT INTO `master_siswa` (`id_siswa`, `nisn`, `nis`, `nama`, `jenis_kelamin`, `username`, `password`, `kelas_awal`, `tahun_masuk`, `sekolah_asal`, `tempat_lahir`, `tanggal_lahir`, `agama`, `hp`, `email`, `foto`, `anak_ke`, `status_keluarga`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `nama_ayah`, `tgl_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `nohp_ayah`, `alamat_ayah`, `nama_ibu`, `tgl_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `nohp_ibu`, `alamat_ibu`, `nama_wali`, `tgl_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `nik`, `warga_negara`, `uid`) VALUES
(1, 0012345678, '123456', 'kombon', 'L', 'kombon', 'kombon', 1, '2025-12-05', '', '', '', 'Pilih Agam', '', NULL, 'uploads/foto_siswa/123456.jpg', 0, '0', '', '', '', '', '', '', NULL, 0, '', NULL, NULL, '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, '', '', '', '', '', '6d1ab06d-d1e6-11f0-8c64-00155df25222');

-- --------------------------------------------------------

--
-- Table structure for table `master_slider`
--

CREATE TABLE `master_slider` (
  `id_slider` int UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `urutan` int NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `master_slider`
--

INSERT INTO `master_slider` (`id_slider`, `gambar`, `caption`, `urutan`, `active`) VALUES
(1, 'uploads/slider/slider_1765858291.webp', 'ini caption lo', 1, 1),
(2, 'uploads/slider/slider_1765858413.webp', 'ini caption kedua lo', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_smt`
--

CREATE TABLE `master_smt` (
  `id_smt` int NOT NULL,
  `smt` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_smt` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `master_smt`
--

INSERT INTO `master_smt` (`id_smt`, `smt`, `nama_smt`, `active`) VALUES
(1, 'Ganjil', 'I (satu)', 0),
(2, 'Genap', 'II (dua)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_tp`
--

CREATE TABLE `master_tp` (
  `id_tp` int NOT NULL,
  `tahun` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `master_tp`
--

INSERT INTO `master_tp` (`id_tp`, `tahun`, `active`) VALUES
(1, '2020/2021', 0),
(2, '2021/2022', 0),
(3, '2022/2023', 1),
(4, '2023/2024', 0);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id_photo` int UNSIGNED NOT NULL,
  `id_album` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int NOT NULL,
  `dari` int DEFAULT NULL,
  `dari_group` int DEFAULT NULL,
  `kepada` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'group',
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `isi` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_user` int NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '1' COMMENT '1=publish, 0=draft',
  `kategori` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'Berita',
  `views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `judul`, `slug`, `isi`, `gambar`, `id_user`, `tanggal`, `status`, `kategori`, `views`) VALUES
(1, 'Pramuka', 'pramuka', '<p>.Extrakurikuler Pramuka merupakan extra wajib yang harus diikuti siswa kelas 4,5 dan 6. kegiatan ini melatih kemandirian dan ketangguhan anak anak. </p><p><br></p><p></p>', 'uploads/posts/post_1765857325.webp', 1, '2025-12-13 09:46:49', 1, 'Berita', 27);

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id_comment` int NOT NULL,
  `id_post` int DEFAULT NULL,
  `dari` int DEFAULT NULL,
  `dari_group` int DEFAULT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '1:pengumuman, 2:materi, 3:tugas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `post_reply`
--

CREATE TABLE `post_reply` (
  `id_reply` int NOT NULL,
  `id_comment` int DEFAULT NULL,
  `dari` int DEFAULT NULL,
  `dari_group` int DEFAULT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id_quote` int NOT NULL,
  `content` text,
  `author` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id_quote`, `content`, `author`, `role`) VALUES
(1, 'quotes nya apa nih?', 'yogabd', 'admin'),
(2, 'Pendidikan merupakan tiket untuk masa depan. Hari esok untuk orang-orang yang telah mempersiapkan dirinya hari ini', 'Anonim', 'pegawai'),
(3, 'Agama tanpa ilmu pengetahuan adalah buta. Dan ilmu pengetahuan tanpa agama adalah lumpuh', 'Anonim', 'Pegawai'),
(4, 'Hiduplah seakan-akan kau akan mati besok. Belajarlah seakan-akan kau akan hidup selamanya', 'Anonim', 'pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `rapor_admin_setting`
--

CREATE TABLE `rapor_admin_setting` (
  `id_setting` int NOT NULL,
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
  `nip_walikelas` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_catatan_wali`
--

CREATE TABLE `rapor_catatan_wali` (
  `id_catatan_wali` int NOT NULL,
  `id_tp` int NOT NULL DEFAULT '0',
  `id_smt` int NOT NULL DEFAULT '0',
  `id_kelas` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `nilai` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_data_catatan`
--

CREATE TABLE `rapor_data_catatan` (
  `id_catatan` int NOT NULL,
  `id_tp` int NOT NULL DEFAULT '0',
  `id_smt` int NOT NULL DEFAULT '0',
  `id_kelas` int DEFAULT NULL,
  `jenis` int NOT NULL COMMENT '1=desk absensi, 2=desk catatan, 3=desk ranking',
  `kode` int NOT NULL,
  `deskripsi` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rank` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_data_fisik`
--

CREATE TABLE `rapor_data_fisik` (
  `id_fisik` int NOT NULL,
  `id_tp` int NOT NULL DEFAULT '0',
  `id_smt` int NOT NULL DEFAULT '0',
  `id_kelas` int DEFAULT NULL,
  `jenis` int NOT NULL COMMENT '1=pendengaran, 2=penglihatan, 3=gigi, 4=lain-lain',
  `kode` int NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_data_sikap`
--

CREATE TABLE `rapor_data_sikap` (
  `id_sikap` int NOT NULL,
  `id_tp` int NOT NULL DEFAULT '0',
  `id_smt` int NOT NULL DEFAULT '0',
  `id_kelas` int DEFAULT NULL,
  `jenis` int NOT NULL COMMENT '1=spiritual, 2=sosial',
  `kode` int NOT NULL,
  `sikap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_fisik`
--

CREATE TABLE `rapor_fisik` (
  `id_fisik` int NOT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `kondisi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tinggi` int NOT NULL,
  `berat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_kikd`
--

CREATE TABLE `rapor_kikd` (
  `id_kikd` int NOT NULL,
  `id_mapel_kelas` int DEFAULT NULL,
  `aspek` int NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `materi_kikd` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_kkm`
--

CREATE TABLE `rapor_kkm` (
  `id_kkm` int NOT NULL,
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
  `id_mapel` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_naik`
--

CREATE TABLE `rapor_naik` (
  `id_naik` int NOT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `id_siswa` int NOT NULL,
  `naik` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_nilai_akhir`
--

CREATE TABLE `rapor_nilai_akhir` (
  `id_nilai_akhir` int NOT NULL,
  `id_mapel` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `nilai` int DEFAULT '0',
  `akhir` int DEFAULT NULL,
  `predikat` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_nilai_ekstra`
--

CREATE TABLE `rapor_nilai_ekstra` (
  `id_nilai_ekstra` int NOT NULL,
  `id_ekstra` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `nilai` int NOT NULL,
  `predikat` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_nilai_harian`
--

CREATE TABLE `rapor_nilai_harian` (
  `id_nilai_harian` int NOT NULL,
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
  `jml` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_nilai_pts`
--

CREATE TABLE `rapor_nilai_pts` (
  `id_nilai_pts` int NOT NULL,
  `id_mapel` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_tp` int NOT NULL,
  `id_smt` int NOT NULL,
  `nilai` int DEFAULT '0',
  `predikat` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_nilai_sikap`
--

CREATE TABLE `rapor_nilai_sikap` (
  `id_nilai_sikap` int NOT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_tp` int NOT NULL DEFAULT '0',
  `id_smt` int NOT NULL DEFAULT '0',
  `jenis` int DEFAULT NULL,
  `nilai` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_prestasi`
--

CREATE TABLE `rapor_prestasi` (
  `id_ranking` int NOT NULL,
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
  `p3_desk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `running_text`
--

CREATE TABLE `running_text` (
  `id_text` int NOT NULL,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `running_text`
--

INSERT INTO `running_text` (`id_text`, `text`) VALUES
(1, 'hey kamu'),
(2, ''),
(3, ''),
(4, ''),
(5, '');

-- --------------------------------------------------------

--
-- Table structure for table `school_profile`
--

CREATE TABLE `school_profile` (
  `id_profile` int NOT NULL,
  `sejarah` longtext,
  `visi_misi` longtext,
  `struktur_organisasi` varchar(255) DEFAULT NULL,
  `link_fb` varchar(255) DEFAULT NULL,
  `link_ig` varchar(255) DEFAULT NULL,
  `link_yt` varchar(255) DEFAULT NULL,
  `link_twitter` varchar(255) DEFAULT NULL,
  `link_tiktok` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `school_profile`
--

INSERT INTO `school_profile` (`id_profile`, `sejarah`, `visi_misi`, `struktur_organisasi`, `link_fb`, `link_ig`, `link_yt`, `link_twitter`, `link_tiktok`) VALUES
(1, '<p>Sekolah ini berada di dusun Jurit Desa Iker Iker Geger kecamatan Cerme. sebelum berganti nama menjadi UPT SD Negeri 63 Gresik,sekolah ini bernama SDN Iker Iker Geger sesuai dengan<span style=\"font-size: 0.875rem;\">nama desa setempat. Sekolah ini berdiri pada tahun 1983.</span></p><p><span style=\"font-size: 0.875rem;\"><br></span><img src=\"https://uptsdn63gresik.sch.id/media_library/posts/post-image-1721422922787.jpg\" alt=\"\" width=\"586\" height=\"620\" style=\"font-size: 0.875rem;\"></p>', '<p><strong> A. Visi </strong></p><p style=\"padding-left: 30px;\">“Terwujudnya siswa yang berkarakter, berprestasi, cinta lingkungan serta berwawasan global yang berlandaskan akhlakul karimah” </p><p style=\"padding-left: 30px;\">Indikator Visi :</p><ol>\r\n<li>Menanamkan keyakinan/aqidah melalui pengamalan ajaran agama kepada peserta didik.</li>\r\n<li>Mengoptimalkan proses pembelajaran kepada peserta didik.</li>\r\n<li>Menanamkan budi pekerti luhur kepada peserta didik.</li>\r\n<li>Menanamkan budaya hidup mandiri dan berdaya saing secara sehat.</li>\r\n<li>Mengembangkan pengetahuan di bidang IPTEK kepada peserta didik.</li>\r\n<li>Menanamkan rasa cinta dan peduli pada lingkungan </li>\r\n</ol><p><strong> B. Misi </strong></p><p>\r\n\r\n\r\n\r\n\r\n</p><ol>\r\n<li>Mengoptimalkan proses pembelajaran yang efektif melalui pendekatan PAIKEM,</li>\r\n<li>Menanamkan religius keimanan dan ketaqwaan kepada Tuhan YME dan dapat mengamalkan ajaran Agama dalam kehidupan sehari-hari,</li>\r\n<li>Mewujudkan lulusan yang berkarakter</li>\r\n<li>Mewujudkan lulusan yang berbudaya berdaya saing tinggi melalui penguasaan ilmu pengetahuan dan Teknologi</li>\r\n<li>Mewujudkan lingkungan yang ramah, bersih, indah, dan nyaman</li>\r\n<li>Meningkatkan kepedulian pada lingkungan hidup dalam upaya pelestarian lingkungan</li></ol>', '', 'https://www.facebook.com/sdnikeriker sdnikeriker', 'https://www.instagram.com/uptsdn63gresik_sdnikeriker?igsh=MWF5cm8xcTVnaW9vdQ==', 'https://www.youtube.com/@uptsdnegeri63gresik', NULL, 'https://www.tiktok.com/@uptsdn63gresik?is_from_webapp=1&sender_device=pc');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int NOT NULL,
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
  `link_twitter` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link_linkedin` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `kode_sekolah`, `sekolah`, `npsn`, `nss`, `jenjang`, `kepsek`, `nip`, `tanda_tangan`, `alamat`, `desa`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `telp`, `fax`, `web`, `email`, `nama_aplikasi`, `logo_kanan`, `logo_kiri`, `versi`, `ip_server`, `waktu`, `server`, `id_server`, `sekolah_id`, `db_versi`, `satuan_pendidikan`, `sambutan`, `motto`, `link_twitter`, `link_linkedin`, `favicon`, `logo`) VALUES
(1, NULL, 'UPT SD Negeri 63 Gresik', '20500376', '23', 1, 'MUH.SAIFUL MUDAWWAM,S.Pd.SD', '', '', 'Jl. Jurit Betiting', 'Iker Iker Geger', 'Cerme', 'Gresik', 'Jawa Timur', 61171, '0317992965', '0232123456', 'https://uptsdn63gresik.sch.id/', 'sdnikerikergeger@gmail.com', 'classroom', '', 'uploads/settings/logo_kiri_1765860267.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Assalamu\'alaikum wr.wb.\r\n\r\nAlhamdulillahirabbilalamin, puji dan syukur kami panjatkan kahadirat Allah SWT atas limpahan rahmat, hidayah, dan kenikmatan - NYA sehingga kami dapat merealisasikan Website UPT SD Negeri 63 Gresik. Website ini mudah-mudahan dapat membuka jalur-lajur informasi secara utuh dan meyeluruh khususnya perkembangan dalam dunia pendidikan di era global dan dapat meningkatkan pelayanan pendidikan serta meningkatkan kualitas pembelajaran peserta didik yang akhirnya dapat meningkatkan pelayanan kepada semua pihak, utamanya steak holders UPT SD Negeri 63 Gresik.', 'molto', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id_slider` int NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(255) NOT NULL,
  `urutan` int DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id_slider`, `judul`, `deskripsi`, `gambar`, `urutan`, `status`, `created_at`) VALUES
(1, 'Selamat Datang di Sekolah Kami', 'Platform digital terintegrasi untuk mendukung kegiatan belajar mengajar', 'assets/img/bg_1.jpg', 1, 1, '2025-12-15 05:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `activation_selector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `activation_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `forgotten_password_selector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `forgotten_password_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `forgotten_password_time` int UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remember_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_on` int UNSIGNED NOT NULL,
  `last_login` int UNSIGNED DEFAULT NULL,
  `active` tinyint UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '::1', 'yoga', '$2y$12$aXSXJ1rBJhk/h0S2sX1EXeXpzHy/yOHrCIsNGgvCpvEVP8GF.DX32', 'yoga@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1764944386, 1767626126, 1, 'Yoga', 'Yoga', NULL, NULL),
(2, '::1', 'kombon', '$2y$10$vgF17uW0h9HDdZpLDjJhBen3Ciguusm/pEl63wawjw03xxcDR44Hy', '123456@siswa.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1764944871, 1765445796, 1, 'kombon', 'kombon', NULL, NULL),
(4, '::1', 'parjo', '$2y$10$uHbMnCj0VZcEUaYTuXTUIOryXTuFRbjEfaQSp0H4dsmXz8kXVa7ie', 'parjo@guru.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1767677088, 1767677468, 1, 'parjo', 'parjo', NULL, NULL),
(5, '::1', 'tukinem', '$2y$10$p6CNPIMAmfAu7zzXj8DLs.pUiXdzdgEpq0HGp9ewZYuYvZb7MH.2m', 'tukinem@guru.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1767679901, 1767679915, 1, 'tukinem', 'tukinem', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `group_id` mediumint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 3),
(4, 4, 2),
(5, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `id_user` int NOT NULL,
  `nama_lengkap` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `level_access` int NOT NULL DEFAULT '0',
  `foto` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id_video` int UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `link_youtube` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `api_setting`
--
ALTER TABLE `api_setting`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `api_token`
--
ALTER TABLE `api_token`
  ADD PRIMARY KEY (`id_api`) USING BTREE;

--
-- Indexes for table `buku_induk`
--
ALTER TABLE `buku_induk`
  ADD PRIMARY KEY (`id_siswa`) USING BTREE;

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bln`) USING BTREE;

--
-- Indexes for table `cbt_bank_soal`
--
ALTER TABLE `cbt_bank_soal`
  ADD PRIMARY KEY (`id_bank`) USING BTREE,
  ADD UNIQUE KEY `kode_bank_soal` (`bank_kode`(100));

--
-- Indexes for table `cbt_durasi_siswa`
--
ALTER TABLE `cbt_durasi_siswa`
  ADD PRIMARY KEY (`id_durasi`) USING BTREE,
  ADD KEY `Cbt_index_id_durasi` (`id_durasi`) USING BTREE COMMENT 'id durasi',
  ADD KEY `id_siswa` (`id_siswa`) USING BTREE;

--
-- Indexes for table `cbt_jadwal`
--
ALTER TABLE `cbt_jadwal`
  ADD PRIMARY KEY (`id_jadwal`) USING BTREE,
  ADD UNIQUE KEY `idjawal_relation` (`id_jadwal`) USING BTREE,
  ADD UNIQUE KEY `id_bank_soal` (`id_bank`) USING BTREE,
  ADD KEY `idx_jns_fc` (`id_jenis`) USING BTREE;

--
-- Indexes for table `cbt_jenis`
--
ALTER TABLE `cbt_jenis`
  ADD PRIMARY KEY (`id_jenis`) USING BTREE,
  ADD UNIQUE KEY `idx_jns` (`id_jenis`) USING BTREE;

--
-- Indexes for table `cbt_kelas_ruang`
--
ALTER TABLE `cbt_kelas_ruang`
  ADD PRIMARY KEY (`id_kelas_ruang`) USING BTREE;

--
-- Indexes for table `cbt_kop_absensi`
--
ALTER TABLE `cbt_kop_absensi`
  ADD PRIMARY KEY (`id_kop`) USING BTREE;

--
-- Indexes for table `cbt_kop_berita`
--
ALTER TABLE `cbt_kop_berita`
  ADD PRIMARY KEY (`id_kop`) USING BTREE;

--
-- Indexes for table `cbt_kop_kartu`
--
ALTER TABLE `cbt_kop_kartu`
  ADD PRIMARY KEY (`id_set_kartu`) USING BTREE;

--
-- Indexes for table `cbt_nilai`
--
ALTER TABLE `cbt_nilai`
  ADD PRIMARY KEY (`id_nilai`) USING BTREE,
  ADD UNIQUE KEY `id_nilai_idx` (`id_nilai`) USING BTREE;

--
-- Indexes for table `cbt_nomor_peserta`
--
ALTER TABLE `cbt_nomor_peserta`
  ADD PRIMARY KEY (`id_nomor`) USING BTREE;

--
-- Indexes for table `cbt_pengawas`
--
ALTER TABLE `cbt_pengawas`
  ADD PRIMARY KEY (`id_pengawas`) USING BTREE;

--
-- Indexes for table `cbt_rekap`
--
ALTER TABLE `cbt_rekap`
  ADD PRIMARY KEY (`id_rekap`) USING BTREE;

--
-- Indexes for table `cbt_rekap_nilai`
--
ALTER TABLE `cbt_rekap_nilai`
  ADD PRIMARY KEY (`id_rekap_nilai`) USING BTREE;

--
-- Indexes for table `cbt_ruang`
--
ALTER TABLE `cbt_ruang`
  ADD PRIMARY KEY (`id_ruang`) USING BTREE;

--
-- Indexes for table `cbt_sesi`
--
ALTER TABLE `cbt_sesi`
  ADD PRIMARY KEY (`id_sesi`) USING BTREE;

--
-- Indexes for table `cbt_sesi_siswa`
--
ALTER TABLE `cbt_sesi_siswa`
  ADD PRIMARY KEY (`siswa_id`) USING BTREE;

--
-- Indexes for table `cbt_soal`
--
ALTER TABLE `cbt_soal`
  ADD PRIMARY KEY (`id_soal`) USING BTREE,
  ADD UNIQUE KEY `id_soal_idx` (`id_soal`) USING BTREE,
  ADD KEY `id_bank_idx` (`bank_id`) USING BTREE;

--
-- Indexes for table `cbt_soal_siswa`
--
ALTER TABLE `cbt_soal_siswa`
  ADD PRIMARY KEY (`id_soal_siswa`) USING BTREE,
  ADD UNIQUE KEY `is_soal_siswa` (`id_soal_siswa`) USING BTREE,
  ADD KEY `id_siswa` (`id_siswa`) USING BTREE,
  ADD KEY `id_jadwal` (`id_jadwal`) USING BTREE,
  ADD KEY `id_soal_fc` (`id_soal`) USING BTREE,
  ADD KEY `id_bank_fc` (`id_bank`) USING BTREE;

--
-- Indexes for table `cbt_token`
--
ALTER TABLE `cbt_token`
  ADD PRIMARY KEY (`id_token`) USING BTREE;

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hri`) USING BTREE;

--
-- Indexes for table `jabatan_guru`
--
ALTER TABLE `jabatan_guru`
  ADD PRIMARY KEY (`id_jabatan_guru`) USING BTREE;

--
-- Indexes for table `kelas_catatan_mapel`
--
ALTER TABLE `kelas_catatan_mapel`
  ADD PRIMARY KEY (`id_catatan`) USING BTREE;

--
-- Indexes for table `kelas_catatan_wali`
--
ALTER TABLE `kelas_catatan_wali`
  ADD PRIMARY KEY (`id_catatan`) USING BTREE;

--
-- Indexes for table `kelas_ekstra`
--
ALTER TABLE `kelas_ekstra`
  ADD PRIMARY KEY (`id_kelas_ekstra`) USING BTREE;

--
-- Indexes for table `kelas_jadwal_kbm`
--
ALTER TABLE `kelas_jadwal_kbm`
  ADD PRIMARY KEY (`id_kbm`) USING BTREE;

--
-- Indexes for table `kelas_jadwal_mapel`
--
ALTER TABLE `kelas_jadwal_mapel`
  ADD PRIMARY KEY (`id_jadwal`) USING BTREE;

--
-- Indexes for table `kelas_jadwal_materi`
--
ALTER TABLE `kelas_jadwal_materi`
  ADD PRIMARY KEY (`id_kjm`) USING BTREE;

--
-- Indexes for table `kelas_materi`
--
ALTER TABLE `kelas_materi`
  ADD PRIMARY KEY (`id_materi`) USING BTREE;

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelas_siswa`) USING BTREE,
  ADD UNIQUE KEY `id_kelas_siswa_idx` (`id_kelas_siswa`) USING BTREE,
  ADD KEY `id_siswa_idx` (`id_siswa`) USING BTREE,
  ADD KEY `Id_kelas` (`id_kelas`) USING BTREE;

--
-- Indexes for table `kelas_struktur`
--
ALTER TABLE `kelas_struktur`
  ADD PRIMARY KEY (`id_kelas`) USING BTREE;

--
-- Indexes for table `level_guru`
--
ALTER TABLE `level_guru`
  ADD PRIMARY KEY (`id_level`) USING BTREE;

--
-- Indexes for table `level_kelas`
--
ALTER TABLE `level_kelas`
  ADD PRIMARY KEY (`id_level`) USING BTREE,
  ADD KEY `index_id_level` (`id_level`) USING BTREE;

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`) USING BTREE;

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `log_materi`
--
ALTER TABLE `log_materi`
  ADD PRIMARY KEY (`id_log`) USING BTREE;

--
-- Indexes for table `log_ujian`
--
ALTER TABLE `log_ujian`
  ADD PRIMARY KEY (`id_log`) USING BTREE;

--
-- Indexes for table `master_ekstra`
--
ALTER TABLE `master_ekstra`
  ADD PRIMARY KEY (`id_ekstra`) USING BTREE;

--
-- Indexes for table `master_gallery`
--
ALTER TABLE `master_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `master_guru`
--
ALTER TABLE `master_guru`
  ADD PRIMARY KEY (`id_guru`) USING BTREE;

--
-- Indexes for table `master_hari_efektif`
--
ALTER TABLE `master_hari_efektif`
  ADD PRIMARY KEY (`id_hari_efektif`) USING BTREE;

--
-- Indexes for table `master_jurusan`
--
ALTER TABLE `master_jurusan`
  ADD PRIMARY KEY (`id_jurusan`) USING BTREE;

--
-- Indexes for table `master_kelas`
--
ALTER TABLE `master_kelas`
  ADD PRIMARY KEY (`id_kelas`) USING BTREE,
  ADD KEY `index_level_Id` (`level_id`) USING BTREE;

--
-- Indexes for table `master_kelompok_mapel`
--
ALTER TABLE `master_kelompok_mapel`
  ADD PRIMARY KEY (`id_kel_mapel`) USING BTREE;

--
-- Indexes for table `master_link`
--
ALTER TABLE `master_link`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `master_mapel`
--
ALTER TABLE `master_mapel`
  ADD PRIMARY KEY (`id_mapel`) USING BTREE;

--
-- Indexes for table `master_siswa`
--
ALTER TABLE `master_siswa`
  ADD PRIMARY KEY (`id_siswa`,`uid`,`nisn`,`nis`) USING BTREE,
  ADD UNIQUE KEY `Id_siswa_idx` (`id_siswa`) USING BTREE,
  ADD UNIQUE KEY `uid_idx` (`uid`) USING BTREE,
  ADD UNIQUE KEY `nisn` (`nisn`) USING BTREE;

--
-- Indexes for table `master_slider`
--
ALTER TABLE `master_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `master_smt`
--
ALTER TABLE `master_smt`
  ADD PRIMARY KEY (`id_smt`) USING BTREE;

--
-- Indexes for table `master_tp`
--
ALTER TABLE `master_tp`
  ADD PRIMARY KEY (`id_tp`) USING BTREE;

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_photo`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`) USING BTREE;

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id_comment`) USING BTREE;

--
-- Indexes for table `post_reply`
--
ALTER TABLE `post_reply`
  ADD PRIMARY KEY (`id_reply`) USING BTREE;

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id_quote`);

--
-- Indexes for table `rapor_admin_setting`
--
ALTER TABLE `rapor_admin_setting`
  ADD PRIMARY KEY (`id_setting`) USING BTREE;

--
-- Indexes for table `rapor_catatan_wali`
--
ALTER TABLE `rapor_catatan_wali`
  ADD PRIMARY KEY (`id_catatan_wali`) USING BTREE;

--
-- Indexes for table `rapor_data_catatan`
--
ALTER TABLE `rapor_data_catatan`
  ADD PRIMARY KEY (`id_catatan`) USING BTREE;

--
-- Indexes for table `rapor_data_fisik`
--
ALTER TABLE `rapor_data_fisik`
  ADD PRIMARY KEY (`id_fisik`) USING BTREE;

--
-- Indexes for table `rapor_data_sikap`
--
ALTER TABLE `rapor_data_sikap`
  ADD PRIMARY KEY (`id_sikap`) USING BTREE;

--
-- Indexes for table `rapor_fisik`
--
ALTER TABLE `rapor_fisik`
  ADD PRIMARY KEY (`id_fisik`) USING BTREE;

--
-- Indexes for table `rapor_kikd`
--
ALTER TABLE `rapor_kikd`
  ADD PRIMARY KEY (`id_kikd`) USING BTREE;

--
-- Indexes for table `rapor_kkm`
--
ALTER TABLE `rapor_kkm`
  ADD PRIMARY KEY (`id_kkm`) USING BTREE;

--
-- Indexes for table `rapor_naik`
--
ALTER TABLE `rapor_naik`
  ADD PRIMARY KEY (`id_naik`) USING BTREE;

--
-- Indexes for table `rapor_nilai_akhir`
--
ALTER TABLE `rapor_nilai_akhir`
  ADD PRIMARY KEY (`id_nilai_akhir`) USING BTREE;

--
-- Indexes for table `rapor_nilai_ekstra`
--
ALTER TABLE `rapor_nilai_ekstra`
  ADD PRIMARY KEY (`id_nilai_ekstra`) USING BTREE;

--
-- Indexes for table `rapor_nilai_harian`
--
ALTER TABLE `rapor_nilai_harian`
  ADD PRIMARY KEY (`id_nilai_harian`) USING BTREE;

--
-- Indexes for table `rapor_nilai_pts`
--
ALTER TABLE `rapor_nilai_pts`
  ADD PRIMARY KEY (`id_nilai_pts`) USING BTREE;

--
-- Indexes for table `rapor_nilai_sikap`
--
ALTER TABLE `rapor_nilai_sikap`
  ADD PRIMARY KEY (`id_nilai_sikap`) USING BTREE;

--
-- Indexes for table `rapor_prestasi`
--
ALTER TABLE `rapor_prestasi`
  ADD PRIMARY KEY (`id_ranking`) USING BTREE;

--
-- Indexes for table `running_text`
--
ALTER TABLE `running_text`
  ADD PRIMARY KEY (`id_text`) USING BTREE;

--
-- Indexes for table `school_profile`
--
ALTER TABLE `school_profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`) USING BTREE;

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id_user` (`id`) USING BTREE,
  ADD UNIQUE KEY `username_idx` (`username`) USING BTREE;

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`) USING BTREE,
  ADD KEY `fk_users_groups_users1_idx` (`user_id`) USING BTREE,
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`) USING BTREE;

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id_album` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_setting`
--
ALTER TABLE `api_setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_token`
--
ALTER TABLE `api_token`
  MODIFY `id_api` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku_induk`
--
ALTER TABLE `buku_induk`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bln` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cbt_bank_soal`
--
ALTER TABLE `cbt_bank_soal`
  MODIFY `id_bank` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cbt_jadwal`
--
ALTER TABLE `cbt_jadwal`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cbt_jenis`
--
ALTER TABLE `cbt_jenis`
  MODIFY `id_jenis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cbt_rekap`
--
ALTER TABLE `cbt_rekap`
  MODIFY `id_rekap` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_rekap_nilai`
--
ALTER TABLE `cbt_rekap_nilai`
  MODIFY `id_rekap_nilai` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_ruang`
--
ALTER TABLE `cbt_ruang`
  MODIFY `id_ruang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cbt_sesi`
--
ALTER TABLE `cbt_sesi`
  MODIFY `id_sesi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cbt_soal`
--
ALTER TABLE `cbt_soal`
  MODIFY `id_soal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cbt_token`
--
ALTER TABLE `cbt_token`
  MODIFY `id_token` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hri` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas_catatan_mapel`
--
ALTER TABLE `kelas_catatan_mapel`
  MODIFY `id_catatan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_catatan_wali`
--
ALTER TABLE `kelas_catatan_wali`
  MODIFY `id_catatan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_materi`
--
ALTER TABLE `kelas_materi`
  MODIFY `id_materi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_struktur`
--
ALTER TABLE `kelas_struktur`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_guru`
--
ALTER TABLE `level_guru`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `log_ujian`
--
ALTER TABLE `log_ujian`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT for table `master_ekstra`
--
ALTER TABLE `master_ekstra`
  MODIFY `id_ekstra` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_gallery`
--
ALTER TABLE `master_gallery`
  MODIFY `id_gallery` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_guru`
--
ALTER TABLE `master_guru`
  MODIFY `id_guru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_hari_efektif`
--
ALTER TABLE `master_hari_efektif`
  MODIFY `id_hari_efektif` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_jurusan`
--
ALTER TABLE `master_jurusan`
  MODIFY `id_jurusan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `master_kelas`
--
ALTER TABLE `master_kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_kelompok_mapel`
--
ALTER TABLE `master_kelompok_mapel`
  MODIFY `id_kel_mapel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master_link`
--
ALTER TABLE `master_link`
  MODIFY `id_link` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_mapel`
--
ALTER TABLE `master_mapel`
  MODIFY `id_mapel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `master_siswa`
--
ALTER TABLE `master_siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_slider`
--
ALTER TABLE `master_slider`
  MODIFY `id_slider` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_smt`
--
ALTER TABLE `master_smt`
  MODIFY `id_smt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_tp`
--
ALTER TABLE `master_tp`
  MODIFY `id_tp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_reply`
--
ALTER TABLE `post_reply`
  MODIFY `id_reply` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id_quote` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rapor_admin_setting`
--
ALTER TABLE `rapor_admin_setting`
  MODIFY `id_setting` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_catatan_wali`
--
ALTER TABLE `rapor_catatan_wali`
  MODIFY `id_catatan_wali` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_data_catatan`
--
ALTER TABLE `rapor_data_catatan`
  MODIFY `id_catatan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_data_fisik`
--
ALTER TABLE `rapor_data_fisik`
  MODIFY `id_fisik` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_data_sikap`
--
ALTER TABLE `rapor_data_sikap`
  MODIFY `id_sikap` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_fisik`
--
ALTER TABLE `rapor_fisik`
  MODIFY `id_fisik` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_kikd`
--
ALTER TABLE `rapor_kikd`
  MODIFY `id_kikd` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_kkm`
--
ALTER TABLE `rapor_kkm`
  MODIFY `id_kkm` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_nilai_akhir`
--
ALTER TABLE `rapor_nilai_akhir`
  MODIFY `id_nilai_akhir` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_nilai_ekstra`
--
ALTER TABLE `rapor_nilai_ekstra`
  MODIFY `id_nilai_ekstra` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_nilai_harian`
--
ALTER TABLE `rapor_nilai_harian`
  MODIFY `id_nilai_harian` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_nilai_pts`
--
ALTER TABLE `rapor_nilai_pts`
  MODIFY `id_nilai_pts` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_nilai_sikap`
--
ALTER TABLE `rapor_nilai_sikap`
  MODIFY `id_nilai_sikap` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_prestasi`
--
ALTER TABLE `rapor_prestasi`
  MODIFY `id_ranking` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `running_text`
--
ALTER TABLE `running_text`
  MODIFY `id_text` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school_profile`
--
ALTER TABLE `school_profile`
  MODIFY `id_profile` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id_slider` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id_video` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cbt_jadwal`
--
ALTER TABLE `cbt_jadwal`
  ADD CONSTRAINT `id_bank_soal` FOREIGN KEY (`id_bank`) REFERENCES `cbt_bank_soal` (`id_bank`),
  ADD CONSTRAINT `id_jns_idx_ifc` FOREIGN KEY (`id_jenis`) REFERENCES `cbt_jenis` (`id_jenis`);

--
-- Constraints for table `cbt_soal_siswa`
--
ALTER TABLE `cbt_soal_siswa`
  ADD CONSTRAINT `id_bank_fc` FOREIGN KEY (`id_bank`) REFERENCES `cbt_bank_soal` (`id_bank`),
  ADD CONSTRAINT `id_jadwal_fc` FOREIGN KEY (`id_jadwal`) REFERENCES `cbt_jadwal` (`id_jadwal`),
  ADD CONSTRAINT `Id_siswa_fc` FOREIGN KEY (`id_siswa`) REFERENCES `master_siswa` (`id_siswa`),
  ADD CONSTRAINT `id_soal_fc` FOREIGN KEY (`id_soal`) REFERENCES `cbt_soal` (`id_soal`);

--
-- Constraints for table `master_kelas`
--
ALTER TABLE `master_kelas`
  ADD CONSTRAINT `key_id_cek` FOREIGN KEY (`level_id`) REFERENCES `level_kelas` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
