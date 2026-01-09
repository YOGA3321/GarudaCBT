-- =====================================================
-- GarudaCBT - Missing Tables Fix
-- Import file ini ke database garudacbt via phpMyAdmin
-- =====================================================

-- 1. Table: school_profile
CREATE TABLE IF NOT EXISTS `school_profile` (
  `id_school_profile` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(255) NOT NULL DEFAULT 'Nama Sekolah',
  `alamat_sekolah` text,
  `logo_sekolah` varchar(255) DEFAULT 'uploads/settings/logo.png',
  `admin_name` varchar(255) DEFAULT 'Administrator',
  `admin_foto` varchar(255) DEFAULT 'uploads/settings/admin.jpg',
  `kepala_sekolah` varchar(255) DEFAULT 'Kepala Sekolah',
  `nip_kepala` varchar(50) DEFAULT '',
  `tanda_tangan` varchar(255) DEFAULT 'uploads/settings/ttd.png',
  PRIMARY KEY (`id_school_profile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `school_profile` (`nama_sekolah`, `alamat_sekolah`) VALUES ('Garuda CBT', 'Alamat Sekolah');

-- 2. Table: master_slider (dengan kolom caption yang benar)
CREATE TABLE IF NOT EXISTS `master_slider` (
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) DEFAULT NULL,
  `caption` text,
  `urutan` int(11) DEFAULT 0,
  `active` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 3. Table: master_gallery
CREATE TABLE IF NOT EXISTS `master_gallery` (
  `id_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(255) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gallery`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 4. Table: quotes
CREATE TABLE IF NOT EXISTS `quotes` (
  `id_quote` int(11) NOT NULL AUTO_INCREMENT,
  `quote` text,
  `author` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_quote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 5. Table: master_link
CREATE TABLE IF NOT EXISTS `master_link` (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `nama_link` varchar(255) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_link`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- =====================================================
-- Selesai! Semua tabel yang hilang telah dibuat.
-- =====================================================
