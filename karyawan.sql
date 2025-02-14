-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for karyawan
CREATE DATABASE IF NOT EXISTS `karyawan` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `karyawan`;

-- Dumping structure for table karyawan.biodata
CREATE TABLE IF NOT EXISTS `biodata` (
  `id_pelamar` int(5) NOT NULL AUTO_INCREMENT,
  `posisi_pelamar` varchar(50) NOT NULL,
  `nama_pelamar` varchar(50) NOT NULL,
  `ktp_pelamar` varchar(16) NOT NULL,
  `ttl_pelamar` varchar(50) NOT NULL,
  `jk_pelamar` enum('LAKI-LAKI','PEREMPUAN') NOT NULL,
  `agama_pelamar` varchar(50) NOT NULL,
  `goldar_pelamar` varchar(3) NOT NULL,
  `status_pelamar` varchar(50) NOT NULL,
  `alamat_ktp_pelamar` varchar(50) NOT NULL,
  `alamat_tinggal_pelamar` varchar(50) NOT NULL,
  `email_pelamar` varchar(50) NOT NULL,
  `tlp_pelamar` varchar(13) NOT NULL,
  `tlp2_pelamar` varchar(13) NOT NULL,
  `skill_pelamar` longtext NOT NULL,
  `ekspektasi_salary_pelamar` decimal(20,6) NOT NULL DEFAULT 0.000000,
  PRIMARY KEY (`id_pelamar`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table karyawan.biodata: ~2 rows (approximately)
DELETE FROM `biodata`;
INSERT INTO `biodata` (`id_pelamar`, `posisi_pelamar`, `nama_pelamar`, `ktp_pelamar`, `ttl_pelamar`, `jk_pelamar`, `agama_pelamar`, `goldar_pelamar`, `status_pelamar`, `alamat_ktp_pelamar`, `alamat_tinggal_pelamar`, `email_pelamar`, `tlp_pelamar`, `tlp2_pelamar`, `skill_pelamar`, `ekspektasi_salary_pelamar`) VALUES
	(1, 'Back End Developer', 'Vivin Vellicia', '1097360133124132', 'Osaka, 14 April 1994', 'PEREMPUAN', 'No Religion', 'AB', 'Album', 'Depok', 'Jl Tomang Raya 47 A-B, Dki Jakarta', 'vivin.vellicia.work@gmail.com', '081214141994', '081214141994', 'Java (Spring Boot), MySQL, React JS', 100000000.000000),
	(4, 'Java Developer', 'TEST', '0249235863298562', 'London, 15 Februari 2025', 'PEREMPUAN', 'Shinto', 'AB', 'Album', 'London', 'Indonesia', 'user001@gmail.com', '6736482352387', '2657325623562', 'HEHE', 90000000.000000);

-- Dumping structure for table karyawan.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table karyawan.migration: ~3 rows (approximately)
DELETE FROM `migration`;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1739440530),
	('m130524_201442_init', 1739453447),
	('m190124_110200_add_verification_token_column_to_user_table', 1739453447);

-- Dumping structure for table karyawan.pekerjaan
CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id_pekerjaan` int(5) NOT NULL AUTO_INCREMENT,
  `perusahaan_riwayat` varchar(50) NOT NULL,
  `posisi_riwayat` varchar(50) NOT NULL,
  `salary_riwayat` decimal(20,6) NOT NULL DEFAULT 0.000000,
  `tahun_pekerjaan_riwayat` varchar(50) NOT NULL,
  `id_pelamar` int(5) NOT NULL,
  PRIMARY KEY (`id_pekerjaan`),
  KEY `FK_pekerjaan_biodata` (`id_pelamar`),
  CONSTRAINT `FK_pekerjaan_biodata` FOREIGN KEY (`id_pelamar`) REFERENCES `biodata` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table karyawan.pekerjaan: ~2 rows (approximately)
DELETE FROM `pekerjaan`;
INSERT INTO `pekerjaan` (`id_pekerjaan`, `perusahaan_riwayat`, `posisi_riwayat`, `salary_riwayat`, `tahun_pekerjaan_riwayat`, `id_pelamar`) VALUES
	(9, 'korindo', 'OB', 709000.000000, '2019', 4),
	(10, 'edii', 'Adminstrasi', 400000.000000, '2024', 4);

-- Dumping structure for table karyawan.pelatihan
CREATE TABLE IF NOT EXISTS `pelatihan` (
  `id_pelatihan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pelatihan` varchar(50) NOT NULL,
  `sertifikat_pelatihan` enum('Ada','Tidak') NOT NULL,
  `tahun_pelatihan` varchar(50) NOT NULL,
  `id_pelamar` int(5) NOT NULL,
  PRIMARY KEY (`id_pelatihan`),
  KEY `FK_pelatihan_biodata` (`id_pelamar`),
  CONSTRAINT `FK_pelatihan_biodata` FOREIGN KEY (`id_pelamar`) REFERENCES `biodata` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table karyawan.pelatihan: ~1 rows (approximately)
DELETE FROM `pelatihan`;
INSERT INTO `pelatihan` (`id_pelatihan`, `nama_pelatihan`, `sertifikat_pelatihan`, `tahun_pelatihan`, `id_pelamar`) VALUES
	(5, 'Simpli Learn', 'Ada', '2015', 4);

-- Dumping structure for table karyawan.pendidikan
CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id_pendidikan` int(5) NOT NULL AUTO_INCREMENT,
  `pendidikan_riwayat` varchar(50) NOT NULL,
  `nama_pendidikan_riwayat` varchar(50) NOT NULL,
  `jurusan_pendidikan_riwayat` varchar(50) NOT NULL,
  `tahun_lulus_riwayat` varchar(50) NOT NULL,
  `ipk_riwayat` varchar(50) NOT NULL,
  `id_pelamar` int(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_pendidikan`),
  KEY `FK_pendidikan_biodata` (`id_pelamar`),
  CONSTRAINT `FK_pendidikan_biodata` FOREIGN KEY (`id_pelamar`) REFERENCES `biodata` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table karyawan.pendidikan: ~1 rows (approximately)
DELETE FROM `pendidikan`;
INSERT INTO `pendidikan` (`id_pendidikan`, `pendidikan_riwayat`, `nama_pendidikan_riwayat`, `jurusan_pendidikan_riwayat`, `tahun_lulus_riwayat`, `ipk_riwayat`, `id_pelamar`) VALUES
	(5, 'S2', 'binus oke', 'SI', '2019', '4', 4);

-- Dumping structure for table karyawan.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `has_filled_form` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table karyawan.user: ~3 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `has_filled_form`) VALUES
	(1, 'admin', 'ybOIR73BYC762-uAvTjYdDAh8o2OdC-x', '$2y$13$nS8jthz4ofLs5sd2OUXKyOaPUksyUuzAiQi.OXLOQwqiZMtieLomi', NULL, 'vinvellicia94@gmail.com', 10, 1739462547, 1739462547, 'l5GHFE-aVYdALob2umgzV4Hmr0zP8Ka-_1739462547', 0),
	(4, 'user', 'OmgBycQ7GJPp1XWrjBEt0wCqJVQCNMFN', '$2y$13$0S7kXUK4eA0XLPNv05Ut0.ulwqNSkSeIFh0QrLFzQ8ZTAqaSBIs.W', NULL, 'vinvellicia@ymail.ne.jp', 10, 1739471173, 1739471173, '0J6IueLGV8kKiagmkyepbtxwusvI-aGs_1739471173', 1),
	(5, 'vin', 'rIDYW4JL46WIyI-n9mSV5d4VvEqiI7LQ', '$2y$13$Pi6EpE20CKu1Rvn.56nrAuLNhzimizg/R3qcYLaP7pnXm2fHIFvYi', NULL, 'vin001@gmail.com', 10, 1739507443, 1739507443, 'h77oX_ZiYSMwulS-q2GKf07vk6N0OGeG_1739507442', 0);

-- Dumping structure for table karyawan.userdb
CREATE TABLE IF NOT EXISTS `userdb` (
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `role_user` varchar(50) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`email_user`),
  UNIQUE KEY `email_user` (`email_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table karyawan.userdb: ~2 rows (approximately)
DELETE FROM `userdb`;
INSERT INTO `userdb` (`email_user`, `password_user`, `role_user`) VALUES
	('admin@gmail.com', '00000', 'admin'),
	('user01@gmail.com', '12345', 'user'),
	('vivin.vellicia.work@gmail.com', '12345', 'user');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
