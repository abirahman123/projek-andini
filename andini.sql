-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.3.0 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table andin.access
CREATE TABLE IF NOT EXISTS `access` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `module` varchar(200) NOT NULL,
  `menus_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `access_module_unique` (`module`),
  KEY `access_menus_id_foreign` (`menus_id`),
  CONSTRAINT `access_menus_id_foreign` FOREIGN KEY (`menus_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table andin.access: ~132 rows (approximately)
INSERT INTO `access` (`id`, `name`, `module`, `menus_id`, `created_at`, `updated_at`) VALUES
	(1, 'Dashboard create', 'dashboard-create', 1, NULL, NULL),
	(2, 'Dashboard read', 'dashboard-read', 1, NULL, NULL),
	(3, 'Dashboard update', 'dashboard-update', 1, NULL, NULL),
	(4, 'Dashboard delete', 'dashboard-delete', 1, NULL, NULL),
	(5, 'Data Master create', 'data-master-create', 2, NULL, NULL),
	(6, 'Data Master read', 'data-master-read', 2, NULL, NULL),
	(7, 'Data Master update', 'data-master-update', 2, NULL, NULL),
	(8, 'Data Master delete', 'data-master-delete', 2, NULL, NULL),
	(9, 'Instansi create', 'data-master.instansi-create', 3, NULL, NULL),
	(10, 'Instansi read', 'data-master.instansi-read', 3, NULL, NULL),
	(11, 'Instansi update', 'data-master.instansi-update', 3, NULL, NULL),
	(12, 'Instansi delete', 'data-master.instansi-delete', 3, NULL, NULL),
	(13, 'Jabatan Fungsional create', 'data-master.jabatan-create', 4, NULL, NULL),
	(14, 'Jabatan Fungsional read', 'data-master.jabatan-read', 4, NULL, NULL),
	(15, 'Jabatan Fungsional update', 'data-master.jabatan-update', 4, NULL, NULL),
	(16, 'Jabatan Fungsional delete', 'data-master.jabatan-delete', 4, NULL, NULL),
	(17, 'Persyaratan Dispensasi create', 'data-master.persyaratan-create', 5, NULL, NULL),
	(18, 'Persyaratan Dispensasi read', 'data-master.persyaratan-read', 5, NULL, NULL),
	(19, 'Persyaratan Dispensasi update', 'data-master.persyaratan-update', 5, NULL, NULL),
	(20, 'Persyaratan Dispensasi delete', 'data-master.persyaratan-delete', 5, NULL, NULL),
	(21, 'Data Kecamatan create', 'data-master.kecamatan-create', 6, NULL, NULL),
	(22, 'Data Kecamatan read', 'data-master.kecamatan-read', 6, NULL, NULL),
	(23, 'Data Kecamatan update', 'data-master.kecamatan-update', 6, NULL, NULL),
	(24, 'Data Kecamatan delete', 'data-master.kecamatan-delete', 6, NULL, NULL),
	(25, 'Data Kelurahan create', 'data-master.kelurahan-create', 7, NULL, NULL),
	(26, 'Data Kelurahan read', 'data-master.kelurahan-read', 7, NULL, NULL),
	(27, 'Data Kelurahan update', 'data-master.kelurahan-update', 7, NULL, NULL),
	(28, 'Data Kelurahan delete', 'data-master.kelurahan-delete', 7, NULL, NULL),
	(29, 'Data Periode create', 'data-master.periode-create', 8, NULL, NULL),
	(30, 'Data Periode read', 'data-master.periode-read', 8, NULL, NULL),
	(31, 'Data Periode update', 'data-master.periode-update', 8, NULL, NULL),
	(32, 'Data Periode delete', 'data-master.periode-delete', 8, NULL, NULL),
	(33, 'Data Pegawai create', 'data-master.pegawai-create', 9, NULL, NULL),
	(34, 'Data Pegawai read', 'data-master.pegawai-read', 9, NULL, NULL),
	(35, 'Data Pegawai update', 'data-master.pegawai-update', 9, NULL, NULL),
	(36, 'Data Pegawai delete', 'data-master.pegawai-delete', 9, NULL, NULL),
	(37, 'Calon Pengantin create', 'catin-create', 10, NULL, NULL),
	(38, 'Calon Pengantin read', 'catin-read', 10, NULL, NULL),
	(39, 'Calon Pengantin update', 'catin-update', 10, NULL, NULL),
	(40, 'Calon Pengantin delete', 'catin-delete', 10, NULL, NULL),
	(41, 'Data Catin create', 'catin.catin-create', 11, NULL, NULL),
	(42, 'Data Catin read', 'catin.catin-read', 11, NULL, NULL),
	(43, 'Data Catin update', 'catin.catin-update', 11, NULL, NULL),
	(44, 'Data Catin delete', 'catin.catin-delete', 11, NULL, NULL),
	(45, 'Verifikasi Catin create', 'catin.verifikasi-catin-create', 12, NULL, NULL),
	(46, 'Verifikasi Catin read', 'catin.verifikasi-catin-read', 12, NULL, NULL),
	(47, 'Verifikasi Catin update', 'catin.verifikasi-catin-update', 12, NULL, NULL),
	(48, 'Verifikasi Catin delete', 'catin.verifikasi-catin-delete', 12, NULL, NULL),
	(49, 'Asesmen create', 'asesmen-create', 13, NULL, NULL),
	(50, 'Asesmen read', 'asesmen-read', 13, NULL, NULL),
	(51, 'Asesmen update', 'asesmen-update', 13, NULL, NULL),
	(52, 'Asesmen delete', 'asesmen-delete', 13, NULL, NULL),
	(53, 'Asesor create', 'asesmen.asesor-create', 14, NULL, NULL),
	(54, 'Asesor read', 'asesmen.asesor-read', 14, NULL, NULL),
	(55, 'Asesor update', 'asesmen.asesor-update', 14, NULL, NULL),
	(56, 'Asesor delete', 'asesmen.asesor-delete', 14, NULL, NULL),
	(57, 'Jadwal Asesmen create', 'asesmen.jadwal-asesmen-create', 15, NULL, NULL),
	(58, 'Jadwal Asesmen read', 'asesmen.jadwal-asesmen-read', 15, NULL, NULL),
	(59, 'Jadwal Asesmen update', 'asesmen.jadwal-asesmen-update', 15, NULL, NULL),
	(60, 'Jadwal Asesmen delete', 'asesmen.jadwal-asesmen-delete', 15, NULL, NULL),
	(61, 'Maping Asesor create', 'asesmen.asesor-maping-create', 16, NULL, NULL),
	(62, 'Maping Asesor read', 'asesmen.asesor-maping-read', 16, NULL, NULL),
	(63, 'Maping Asesor update', 'asesmen.asesor-maping-update', 16, NULL, NULL),
	(64, 'Maping Asesor delete', 'asesmen.asesor-maping-delete', 16, NULL, NULL),
	(65, 'Profil create', 'profil-create', 17, NULL, NULL),
	(66, 'Profil read', 'profil-read', 17, NULL, NULL),
	(67, 'Profil update', 'profil-update', 17, NULL, NULL),
	(68, 'Profil delete', 'profil-delete', 17, NULL, NULL),
	(69, 'CMS create', 'cms-create', 18, NULL, NULL),
	(70, 'CMS read', 'cms-read', 18, NULL, NULL),
	(71, 'CMS update', 'cms-update', 18, NULL, NULL),
	(72, 'CMS delete', 'cms-delete', 18, NULL, NULL),
	(73, 'Slide show create', 'cms.slide-show-create', 19, NULL, NULL),
	(74, 'Slide show read', 'cms.slide-show-read', 19, NULL, NULL),
	(75, 'Slide show update', 'cms.slide-show-update', 19, NULL, NULL),
	(76, 'Slide show delete', 'cms.slide-show-delete', 19, NULL, NULL),
	(77, 'File Manager create', 'cms.file-manager-create', 20, NULL, NULL),
	(78, 'File Manager read', 'cms.file-manager-read', 20, NULL, NULL),
	(79, 'File Manager update', 'cms.file-manager-update', 20, NULL, NULL),
	(80, 'File Manager delete', 'cms.file-manager-delete', 20, NULL, NULL),
	(81, 'Berita create', 'cms.news-create', 21, NULL, NULL),
	(82, 'Berita read', 'cms.news-read', 21, NULL, NULL),
	(83, 'Berita update', 'cms.news-update', 21, NULL, NULL),
	(84, 'Berita delete', 'cms.news-delete', 21, NULL, NULL),
	(85, 'Documents create', 'cms.documents-create', 22, NULL, NULL),
	(86, 'Documents read', 'cms.documents-read', 22, NULL, NULL),
	(87, 'Documents update', 'cms.documents-update', 22, NULL, NULL),
	(88, 'Documents delete', 'cms.documents-delete', 22, NULL, NULL),
	(89, 'Kategori Berita create', 'cms.kategori-berita-create', 23, NULL, NULL),
	(90, 'Kategori Berita read', 'cms.kategori-berita-read', 23, NULL, NULL),
	(91, 'Kategori Berita update', 'cms.kategori-berita-update', 23, NULL, NULL),
	(92, 'Kategori Berita delete', 'cms.kategori-berita-delete', 23, NULL, NULL),
	(93, 'FAQs create', 'cms.faqs-create', 24, NULL, NULL),
	(94, 'FAQs read', 'cms.faqs-read', 24, NULL, NULL),
	(95, 'FAQs update', 'cms.faqs-update', 24, NULL, NULL),
	(96, 'FAQs delete', 'cms.faqs-delete', 24, NULL, NULL),
	(97, 'Settings create', 'setting-create', 25, NULL, NULL),
	(98, 'Settings read', 'setting-read', 25, NULL, NULL),
	(99, 'Settings update', 'setting-update', 25, NULL, NULL),
	(100, 'Settings delete', 'setting-delete', 25, NULL, NULL),
	(101, 'System Setting create', 'settings.system-setting-create', 26, NULL, NULL),
	(102, 'System Setting read', 'settings.system-setting-read', 26, NULL, NULL),
	(103, 'System Setting update', 'settings.system-setting-update', 26, NULL, NULL),
	(104, 'System Setting delete', 'settings.system-setting-delete', 26, NULL, NULL),
	(105, 'Site Setting create', 'settings.site-setting-create', 27, NULL, NULL),
	(106, 'Site Setting read', 'settings.site-setting-read', 27, NULL, NULL),
	(107, 'Site Setting update', 'settings.site-setting-update', 27, NULL, NULL),
	(108, 'Site Setting delete', 'settings.site-setting-delete', 27, NULL, NULL),
	(109, 'Menu create', 'settings.menu-create', 28, NULL, NULL),
	(110, 'Menu read', 'settings.menu-read', 28, NULL, NULL),
	(111, 'Menu update', 'settings.menu-update', 28, NULL, NULL),
	(112, 'Menu delete', 'settings.menu-delete', 28, NULL, NULL),
	(113, 'Backup Database create', 'settings.backup-create', 29, NULL, NULL),
	(114, 'Backup Database read', 'settings.backup-read', 29, NULL, NULL),
	(115, 'Backup Database update', 'settings.backup-update', 29, NULL, NULL),
	(116, 'Backup Database delete', 'settings.backup-delete', 29, NULL, NULL),
	(117, 'Users create', 'users-create', 30, NULL, NULL),
	(118, 'Users read', 'users-read', 30, NULL, NULL),
	(119, 'Users update', 'users-update', 30, NULL, NULL),
	(120, 'Users delete', 'users-delete', 30, NULL, NULL),
	(121, 'User List create', 'users.user-list-create', 31, NULL, NULL),
	(122, 'User List read', 'users.user-list-read', 31, NULL, NULL),
	(123, 'User List update', 'users.user-list-update', 31, NULL, NULL),
	(124, 'User List delete', 'users.user-list-delete', 31, NULL, NULL),
	(125, 'Role create', 'users.role-create', 32, NULL, NULL),
	(126, 'Role read', 'users.role-read', 32, NULL, NULL),
	(127, 'Role update', 'users.role-update', 32, NULL, NULL),
	(128, 'Role delete', 'users.role-delete', 32, NULL, NULL),
	(145, 'Berkas Catin create', 'berkascatin-create', 34, NULL, NULL),
	(146, 'Berkas Catin update', 'berkascatin-update', 34, NULL, NULL),
	(147, 'Berkas Catin delete', 'berkascatin-delete', 34, NULL, NULL),
	(148, 'Berkas Catin read', 'berkascatin-read', 34, NULL, NULL);

-- Dumping structure for table andin.asesmen_item
CREATE TABLE IF NOT EXISTS `asesmen_item` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `periode_id` bigint unsigned NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int unsigned NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `asesmen_item_periode_id_foreign` (`periode_id`),
  CONSTRAINT `asesmen_item_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.asesmen_item: ~0 rows (approximately)

-- Dumping structure for table andin.asesmen_jadwal
CREATE TABLE IF NOT EXISTS `asesmen_jadwal` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `register_id` bigint unsigned NOT NULL,
  `periode_id` bigint unsigned NOT NULL,
  `tanggal_asesmen` timestamp NULL DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `status` enum('SUBMITTED','REVISED','APPROVED','REJECTED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SUBMITTED' COMMENT 'SUBMITTED: Menunggu persetujuan, REVISED: Perlu revisi, APPROVED: Disetujui, REJECTED: Ditolak',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `asesmen_jadwal_register_id_foreign` (`register_id`),
  KEY `asesmen_jadwal_periode_id_foreign` (`periode_id`),
  CONSTRAINT `asesmen_jadwal_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `asesmen_jadwal_register_id_foreign` FOREIGN KEY (`register_id`) REFERENCES `register` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.asesmen_jadwal: ~0 rows (approximately)

-- Dumping structure for table andin.asesmen_penilaian
CREATE TABLE IF NOT EXISTS `asesmen_penilaian` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asesmen_id` bigint unsigned NOT NULL,
  `asesor_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penilaian` text COLLATE utf8mb4_unicode_ci,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `status_rekomendasi` enum('DIREKOMENDASIKAN','TIDAK_DIREKOMENDASIKAN') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'DIREKOMENDASIKAN: Direkomendasikan, TIDAK_DIREKOMENDASIKAN: Tidak direkomendasikan',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `asesmen_penilaian_asesmen_id_asesor_id_unique` (`asesmen_id`,`asesor_id`),
  KEY `asesmen_penilaian_asesor_id_foreign` (`asesor_id`),
  CONSTRAINT `asesmen_penilaian_asesmen_id_foreign` FOREIGN KEY (`asesmen_id`) REFERENCES `asesmen_jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `asesmen_penilaian_asesor_id_foreign` FOREIGN KEY (`asesor_id`) REFERENCES `asesor` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.asesmen_penilaian: ~0 rows (approximately)

-- Dumping structure for table andin.asesmen_penilaian_item
CREATE TABLE IF NOT EXISTS `asesmen_penilaian_item` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asesmen_penilaian_id` bigint unsigned NOT NULL,
  `asesmen_item_id` bigint unsigned DEFAULT NULL,
  `assesmen_item` text COLLATE utf8mb4_unicode_ci,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `asesmen_penilaian_item_asesmen_penilaian_id_foreign` (`asesmen_penilaian_id`),
  KEY `asesmen_penilaian_item_asesmen_item_id_foreign` (`asesmen_item_id`),
  CONSTRAINT `asesmen_penilaian_item_asesmen_item_id_foreign` FOREIGN KEY (`asesmen_item_id`) REFERENCES `asesmen_item` (`id`),
  CONSTRAINT `asesmen_penilaian_item_asesmen_penilaian_id_foreign` FOREIGN KEY (`asesmen_penilaian_id`) REFERENCES `asesmen_penilaian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.asesmen_penilaian_item: ~0 rows (approximately)

-- Dumping structure for table andin.asesor
CREATE TABLE IF NOT EXISTS `asesor` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` bigint unsigned NOT NULL,
  `kelurahan_id` bigint unsigned NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `asesor_email_unique` (`email`),
  KEY `asesor_kecamatan_id_foreign` (`kecamatan_id`),
  KEY `asesor_kelurahan_id_foreign` (`kelurahan_id`),
  KEY `asesor_user_id_foreign` (`user_id`),
  CONSTRAINT `asesor_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `ref_kecamatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `asesor_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `ref_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `asesor_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.asesor: ~0 rows (approximately)

-- Dumping structure for table andin.backup_histories
CREATE TABLE IF NOT EXISTS `backup_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `backup_schedule_id` bigint unsigned NOT NULL,
  `status` enum('success','failed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `backup_histories_backup_schedule_id_foreign` (`backup_schedule_id`),
  CONSTRAINT `backup_histories_backup_schedule_id_foreign` FOREIGN KEY (`backup_schedule_id`) REFERENCES `backup_schedules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.backup_histories: ~0 rows (approximately)

-- Dumping structure for table andin.backup_schedules
CREATE TABLE IF NOT EXISTS `backup_schedules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frequency` enum('daily','weekly','monthly') COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.backup_schedules: ~0 rows (approximately)

-- Dumping structure for table andin.backup_schedule_tables
CREATE TABLE IF NOT EXISTS `backup_schedule_tables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `backup_schedule_id` bigint unsigned NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `backup_schedule_tables_backup_schedule_id_foreign` (`backup_schedule_id`),
  CONSTRAINT `backup_schedule_tables_backup_schedule_id_foreign` FOREIGN KEY (`backup_schedule_id`) REFERENCES `backup_schedules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.backup_schedule_tables: ~0 rows (approximately)

-- Dumping structure for table andin.catin
CREATE TABLE IF NOT EXISTS `catin` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_id` bigint unsigned NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_id` bigint unsigned NOT NULL,
  `kelurahan_id` bigint unsigned NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `agama_id` bigint unsigned NOT NULL,
  `pendidikan_id` bigint unsigned NOT NULL,
  `nama_ayah` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_wali` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_verifikasi` enum('SUBMITTED','APPROVED','REJECTED') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'SUBMITTED = Diajukan, APPROVED = Disetujui, REJECTED = Ditolak',
  `pas_foto` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `catin_jenis_kelamin_register_id_unique` (`jenis_kelamin`,`register_id`),
  UNIQUE KEY `catin_nik_unique` (`nik`),
  KEY `catin_register_id_foreign` (`register_id`),
  KEY `catin_kecamatan_id_foreign` (`kecamatan_id`),
  KEY `catin_kelurahan_id_foreign` (`kelurahan_id`),
  KEY `catin_agama_id_foreign` (`agama_id`),
  KEY `catin_pendidikan_id_foreign` (`pendidikan_id`),
  CONSTRAINT `catin_agama_id_foreign` FOREIGN KEY (`agama_id`) REFERENCES `ref_agama` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `catin_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `ref_kecamatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `catin_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `ref_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `catin_pendidikan_id_foreign` FOREIGN KEY (`pendidikan_id`) REFERENCES `ref_pendidikan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `catin_register_id_foreign` FOREIGN KEY (`register_id`) REFERENCES `register` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.catin: ~2 rows (approximately)
INSERT INTO `catin` (`id`, `register_id`, `jenis_kelamin`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `nomor_hp`, `pekerjaan`, `kecamatan_id`, `kelurahan_id`, `alamat`, `agama_id`, `pendidikan_id`, `nama_ayah`, `nama_ibu`, `nama_wali`, `status_verifikasi`, `pas_foto`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	('1', 1, 'L', '1234567890123456', 'Karo', 'Jakarta', '1990-01-01', '08123456789', 'Pegawai Swasta', 1, 1, 'Jl. Dermaga No. 123', 1, 4, 'Ramto', 'Susana', 'Ratih', 'SUBMITTED', '/storage/app/public/foto/la.jpeg', 1, 1, '2024-05-05 09:57:35', '2024-05-05 09:57:35'),
	('2', 2, 'P', '6543210987654321', 'Loka', 'Bandung', '1992-05-15', '08765432100', 'Wiraswasta', 2, 2, 'Jl. Pelabuhan No. 456', 2, 4, 'Sumanto', 'Jenny', NULL, 'APPROVED', '/storage/app/public/foto/pe.jpeg', 2, 2, '2024-05-05 09:57:35', '2024-05-05 09:57:35');

-- Dumping structure for table andin.catin_persyaratan
CREATE TABLE IF NOT EXISTS `catin_persyaratan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `catin_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persyaratan_id` bigint unsigned NOT NULL,
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('SUBMITTED','REVISED','APPROVED','REJECTED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SUBMITTED',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `catin_persyaratan_catin_id_persyaratan_id_unique` (`catin_id`,`persyaratan_id`),
  KEY `catin_persyaratan_persyaratan_id_foreign` (`persyaratan_id`),
  CONSTRAINT `catin_persyaratan_catin_id_foreign` FOREIGN KEY (`catin_id`) REFERENCES `catin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `catin_persyaratan_persyaratan_id_foreign` FOREIGN KEY (`persyaratan_id`) REFERENCES `ref_persyaratan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.catin_persyaratan: ~2 rows (approximately)
INSERT INTO `catin_persyaratan` (`id`, `catin_id`, `persyaratan_id`, `file_path`, `status`, `keterangan`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, '1', 1, '/storage/app/public/catindoc/berkas.pdf', 'SUBMITTED', 'Berkas Catin 1', 1, 1, '2024-05-05 10:12:25', '2024-05-05 10:12:25'),
	(2, '2', 1, '/storage/app/public/catindoc/berkas.pdf', 'APPROVED', 'Berkas Catin 2', 1, 1, '2024-05-05 10:12:25', '2024-05-05 10:12:25');

-- Dumping structure for table andin.dokumen
CREATE TABLE IF NOT EXISTS `dokumen` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.dokumen: ~0 rows (approximately)

-- Dumping structure for table andin.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table andin.faqs
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.faqs: ~0 rows (approximately)

-- Dumping structure for table andin.file_management
CREATE TABLE IF NOT EXISTS `file_management` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `file_management_user_id_foreign` (`user_id`),
  CONSTRAINT `file_management_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.file_management: ~0 rows (approximately)

-- Dumping structure for table andin.instansi
CREATE TABLE IF NOT EXISTS `instansi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pendek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.instansi: ~0 rows (approximately)

-- Dumping structure for table andin.jabatan_fungsional
CREATE TABLE IF NOT EXISTS `jabatan_fungsional` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Golongan. Misal: III/a',
  `jabatan_fungsional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Jabatan Fungsional. Misal: Penata Muda',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jabatan_fungsional_kode_jabatan_unique` (`kode_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.jabatan_fungsional: ~0 rows (approximately)

-- Dumping structure for table andin.kategori_news
CREATE TABLE IF NOT EXISTS `kategori_news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.kategori_news: ~0 rows (approximately)

-- Dumping structure for table andin.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  `module` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` enum('group','menu','divider') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'menu',
  `icon` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `target` enum('_self','_blank') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '_self',
  `order` int NOT NULL DEFAULT '0',
  `is_active` enum('0','1') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=Non-Active, 1=Active',
  `location` enum('sidebar','topbar') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'sidebar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_slug_unique` (`slug`),
  UNIQUE KEY `menus_module_unique` (`module`),
  KEY `menus_parent_id_foreign` (`parent_id`),
  CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table andin.menus: ~33 rows (approximately)
INSERT INTO `menus` (`id`, `name`, `module`, `slug`, `type`, `icon`, `url`, `parent_id`, `target`, `order`, `is_active`, `location`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Dashboard', 'dashboard', 'admin-dashboard', 'menu', 'fal fa-house', '/dashboard', NULL, '_self', 1, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(2, 'Data Master', 'data-master', 'data-master', 'menu', 'fal fa-database', '', NULL, '_self', 2, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(3, 'Instansi', 'data-master.instansi', 'data-master-instansi', 'menu', 'fal fa-map-marker-alt', '/master/instansi', 2, '_self', 1, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(4, 'Jabatan Fungsional', 'data-master.jabatan', 'data-master-jabatan', 'menu', 'fal fa-map-marker-alt', '/master/jabatan', 2, '_self', 2, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(5, 'Persyaratan Dispensasi', 'data-master.persyaratan', 'data-master.persyaratan', 'menu', 'fal fa-map-marker-alt', '/master/persyaratan', 2, '_self', 3, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(6, 'Data Kecamatan', 'data-master.kecamatan', 'data-master-kecamatan', 'menu', 'fal fa-graduation-cap', '/master/kecamatan', 2, '_self', 4, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(7, 'Data Kelurahan', 'data-master.kelurahan', 'data-master-kelurahan', 'menu', 'fal fa-balance-scale', '/master/kelurahan', 2, '_self', 5, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(8, 'Data Periode', 'data-master.periode', 'data-master-periode', 'menu', 'fal fa-balance-scale', '/master/periode', 2, '_self', 6, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(9, 'Data Pegawai', 'data-master.pegawai', 'data-master-pegawai', 'menu', 'fal fa-balance-scale', '/master/pegawai', 2, '_self', 7, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(10, 'Calon Pengantin', 'catin', 'catin', 'menu', 'fal fa-list', NULL, NULL, '_self', 3, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(11, 'Data Catin', 'catin.catin', 'catin-catin', 'menu', 'fal fa-id-badge', '/catin/catin', 10, '_self', 0, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(12, 'Verifikasi Catin', 'catin.verifikasi-catin', 'catin-verifikasi-catin', 'menu', 'fal fa-books', '/catin/verifikasi-catin', 10, '_self', 1, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(13, 'Asesmen', 'asesmen', 'asesmen', 'menu', 'fal fa-graduation-cap', NULL, NULL, '_self', 4, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(14, 'Asesor', 'asesmen.asesor', 'asesmen-asesor', 'menu', 'fal fa-calendar-alt', '/asesmen/asesor', 13, '_self', 1, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(15, 'Jadwal Asesmen', 'asesmen.jadwal-asesmen', 'asesmen-jadwal-asesmen', 'menu', 'fal fa-university', '/asesmen/jadwal-asesmen', 13, '_self', 2, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(16, 'Maping Asesor', 'asesmen.asesor-maping', 'asesmen-asesor-maping', 'menu', 'fal fa-book', '/asesmen/asesor-maping', 13, '_self', 3, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(17, 'Profil', 'profil', 'profil', 'menu', 'fal fa-pray', '/profil', NULL, '_self', 5, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(18, 'CMS', 'cms', 'cms', 'menu', 'fal fa-newspaper', '', NULL, '_self', 6, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(19, 'Slide show', 'cms.slide-show', 'cms-slide-show', 'menu', 'fal fa-images', '/cms/slideshow', 18, '_self', 1, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(20, 'File Manager', 'cms.file-manager', 'cms-file-manager', 'menu', 'fal fa-file', '/cms/file-manager', 18, '_self', 2, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(21, 'Berita', 'cms.news', 'cms-berita', 'menu', 'fal fa-newspaper', '/cms/news', 18, '_self', 3, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(22, 'Documents', 'cms.documents', 'cms-document', 'menu', 'fal fa-file-alt', '/cms/document', 18, '_self', 4, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(23, 'Kategori Berita', 'cms.kategori-berita', 'cms-kategori-berita', 'menu', 'fal fa-calendar-alt', '/cms/kategori-berita', 18, '_self', 4, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(24, 'FAQs', 'cms.faqs', 'cms-faqs', 'menu', 'fal fa-question-circle', '/cms/faqs', 18, '_self', 5, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(25, 'Settings', 'setting', 'admin-setting', 'menu', 'fal fa-cogs', NULL, NULL, '_self', 7, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(26, 'System Setting', 'settings.system-setting', 'settings-system-setting', 'menu', 'fal fa-cog', '/setting/system-setting', 25, '_self', 1, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(27, 'Site Setting', 'settings.site-setting', 'settings-site-setting', 'menu', 'fal fa-user-cog', '/setting/site-settings', 25, '_self', 0, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(28, 'Menu', 'settings.menu', 'settings-menu', 'menu', 'fal fa-list', '/setting/menu', 25, '_self', 3, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(29, 'Backup Database', 'settings.backup', 'settings-backup', 'menu', 'fal fa-cloud-upload', '/setting/backup', 25, '_self', 5, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(30, 'Users', 'users', 'users', 'menu', 'fal fa-users', NULL, NULL, '_self', 8, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(31, 'User List', 'users.user-list', 'users-admin-user-list', 'menu', 'fal fa-user', '/users/user-list', 30, '_self', 1, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(32, 'Role', 'users.role', 'users-role', 'menu', 'fal fa-user-secret', '/users/role', 30, '_self', 2, '1', 'sidebar', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(34, 'Berkas Catin', 'berkascatin', 'berkas-catin', 'menu', 'fal fa-file-alt', '/assesor/catin-persyaratan', NULL, '_self', 4, '1', 'sidebar', '2024-05-04 11:43:55', '2024-05-04 15:19:54', NULL);

-- Dumping structure for table andin.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.migrations: ~42 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2024_03_26_042806_create_permission_tables', 1),
	(7, '2024_03_26_051829_create_dokumen_table', 1),
	(8, '2024_03_27_021516_create_menus_table', 1),
	(9, '2024_03_28_030714_create_backup_schedules_table', 1),
	(10, '2024_03_28_030721_create_backup_histories_table', 1),
	(11, '2024_03_28_031821_create_backup_schedule_tables_table', 1),
	(12, '2024_03_28_083153_create_site_settings_table', 1),
	(13, '2024_03_28_091851_create_system_settings_table', 1),
	(14, '2024_03_29_072705_create_news_table', 1),
	(15, '2024_03_29_114108_create_access_table', 1),
	(16, '2024_04_02_062848_create_slideshow_table', 1),
	(17, '2024_04_02_063048_create_slideshow_items_table', 1),
	(18, '2024_04_04_091400_create_file_management_table', 1),
	(19, '2024_04_14_144903_change_description_column_to_news_table', 1),
	(20, '2024_04_16_030957_create_faqs_table', 1),
	(21, '2024_04_16_032539_add_deleted_at_column_to_users_table', 1),
	(22, '2024_04_23_102742_create_kategori_news_table', 1),
	(23, '2024_04_25_105529_create_instansi_table', 1),
	(24, '2024_04_25_105920_create_jabatan_fungsional_table', 1),
	(25, '2024_04_25_110126_create_periode_table', 1),
	(26, '2024_04_25_110310_create_ref_persyaratan_table', 1),
	(27, '2024_04_25_111203_create_ref_kecamatan_table', 1),
	(28, '2024_04_25_111317_create_ref_kelurahan_table', 1),
	(29, '2024_04_25_111426_create_pegawai_table', 1),
	(30, '2024_04_25_114042_create_register_table', 1),
	(31, '2024_04_25_115353_create_catin_table', 1),
	(32, '2024_04_25_131046_create_ref_agama_table', 1),
	(33, '2024_04_25_131151_create_ref_pendidikan_table', 1),
	(34, '2024_04_25_131230_add_column_to_pegawai_table', 1),
	(35, '2024_04_25_131307_add_column_to_catin_table', 1),
	(36, '2024_04_25_132745_create_catin_persyaratan_table', 1),
	(37, '2024_04_25_133322_create_asesor_table', 1),
	(38, '2024_04_25_133515_create_asesmen_item_table', 1),
	(39, '2024_04_25_133654_create_asesmen_table', 1),
	(40, '2024_04_25_133940_create_asesmen_penilaian_table', 1),
	(41, '2024_04_25_134238_create_asesmen_penilaian_item_table', 1),
	(42, '2024_04_25_135230_add_column_to_register_table', 1);

-- Dumping structure for table andin.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.model_has_permissions: ~0 rows (approximately)

-- Dumping structure for table andin.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.model_has_roles: ~13 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(3, 'App\\Models\\User', 2),
	(2, 'App\\Models\\User', 3),
	(4, 'App\\Models\\User', 4),
	(4, 'App\\Models\\User', 5),
	(4, 'App\\Models\\User', 6),
	(4, 'App\\Models\\User', 7),
	(4, 'App\\Models\\User', 8),
	(4, 'App\\Models\\User', 9),
	(4, 'App\\Models\\User', 10),
	(4, 'App\\Models\\User', 11),
	(4, 'App\\Models\\User', 12),
	(4, 'App\\Models\\User', 13);

-- Dumping structure for table andin.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image_url` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.news: ~0 rows (approximately)

-- Dumping structure for table andin.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.password_resets: ~0 rows (approximately)

-- Dumping structure for table andin.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table andin.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jabatan_fungsional_id` bigint unsigned NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_id` bigint unsigned NOT NULL,
  `kelurahan_id` bigint unsigned NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama_id` bigint unsigned NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pegawai_nip_unique` (`nip`),
  KEY `pegawai_jabatan_fungsional_id_foreign` (`jabatan_fungsional_id`),
  KEY `pegawai_kecamatan_id_foreign` (`kecamatan_id`),
  KEY `pegawai_kelurahan_id_foreign` (`kelurahan_id`),
  KEY `pegawai_agama_id_foreign` (`agama_id`),
  CONSTRAINT `pegawai_agama_id_foreign` FOREIGN KEY (`agama_id`) REFERENCES `ref_agama` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `pegawai_jabatan_fungsional_id_foreign` FOREIGN KEY (`jabatan_fungsional_id`) REFERENCES `jabatan_fungsional` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `pegawai_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `ref_kecamatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `pegawai_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `ref_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.pegawai: ~0 rows (approximately)

-- Dumping structure for table andin.periode
CREATE TABLE IF NOT EXISTS `periode` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Periode. Misal: 2024/2025',
  `tahun` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tahun. Misal: 2024',
  `keterangan` text COLLATE utf8mb4_unicode_ci COMMENT 'Keterangan',
  `is_active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 = Aktif, 0 = Tidak Aktif',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `periode_tahun_unique` (`tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.periode: ~3 rows (approximately)
INSERT INTO `periode` (`id`, `periode`, `tahun`, `keterangan`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(7, 'Januari', '2021', 'Periode bulan Januari tahun 2024', '0', 1, 1, '2024-05-05 08:57:00', NULL),
	(8, 'Februari', '2022', 'Periode bulan Februari tahun 2024', '0', 1, 1, '2024-05-05 08:57:00', NULL),
	(9, 'Maret', '2023', 'Periode bulan Maret tahun 2024', '0', 1, 1, '2024-05-05 08:57:00', NULL);

-- Dumping structure for table andin.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.permissions: ~165 rows (approximately)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'dashboard', 'web', NULL, NULL),
	(2, 'dashboard-create', 'web', NULL, NULL),
	(3, 'dashboard-read', 'web', NULL, NULL),
	(4, 'dashboard-update', 'web', NULL, NULL),
	(5, 'dashboard-delete', 'web', NULL, NULL),
	(6, 'data-master', 'web', NULL, NULL),
	(7, 'data-master-create', 'web', NULL, NULL),
	(8, 'data-master-read', 'web', NULL, NULL),
	(9, 'data-master-update', 'web', NULL, NULL),
	(10, 'data-master-delete', 'web', NULL, NULL),
	(11, 'data-master.instansi', 'web', NULL, NULL),
	(12, 'data-master.instansi-create', 'web', NULL, NULL),
	(13, 'data-master.instansi-read', 'web', NULL, NULL),
	(14, 'data-master.instansi-update', 'web', NULL, NULL),
	(15, 'data-master.instansi-delete', 'web', NULL, NULL),
	(16, 'data-master.jabatan', 'web', NULL, NULL),
	(17, 'data-master.jabatan-create', 'web', NULL, NULL),
	(18, 'data-master.jabatan-read', 'web', NULL, NULL),
	(19, 'data-master.jabatan-update', 'web', NULL, NULL),
	(20, 'data-master.jabatan-delete', 'web', NULL, NULL),
	(21, 'data-master.persyaratan', 'web', NULL, NULL),
	(22, 'data-master.persyaratan-create', 'web', NULL, NULL),
	(23, 'data-master.persyaratan-read', 'web', NULL, NULL),
	(24, 'data-master.persyaratan-update', 'web', NULL, NULL),
	(25, 'data-master.persyaratan-delete', 'web', NULL, NULL),
	(26, 'data-master.kecamatan', 'web', NULL, NULL),
	(27, 'data-master.kecamatan-create', 'web', NULL, NULL),
	(28, 'data-master.kecamatan-read', 'web', NULL, NULL),
	(29, 'data-master.kecamatan-update', 'web', NULL, NULL),
	(30, 'data-master.kecamatan-delete', 'web', NULL, NULL),
	(31, 'data-master.kelurahan', 'web', NULL, NULL),
	(32, 'data-master.kelurahan-create', 'web', NULL, NULL),
	(33, 'data-master.kelurahan-read', 'web', NULL, NULL),
	(34, 'data-master.kelurahan-update', 'web', NULL, NULL),
	(35, 'data-master.kelurahan-delete', 'web', NULL, NULL),
	(36, 'data-master.periode', 'web', NULL, NULL),
	(37, 'data-master.periode-create', 'web', NULL, NULL),
	(38, 'data-master.periode-read', 'web', NULL, NULL),
	(39, 'data-master.periode-update', 'web', NULL, NULL),
	(40, 'data-master.periode-delete', 'web', NULL, NULL),
	(41, 'data-master.pegawai', 'web', NULL, NULL),
	(42, 'data-master.pegawai-create', 'web', NULL, NULL),
	(43, 'data-master.pegawai-read', 'web', NULL, NULL),
	(44, 'data-master.pegawai-update', 'web', NULL, NULL),
	(45, 'data-master.pegawai-delete', 'web', NULL, NULL),
	(46, 'catin', 'web', NULL, NULL),
	(47, 'catin-create', 'web', NULL, NULL),
	(48, 'catin-read', 'web', NULL, NULL),
	(49, 'catin-update', 'web', NULL, NULL),
	(50, 'catin-delete', 'web', NULL, NULL),
	(51, 'catin.catin', 'web', NULL, NULL),
	(52, 'catin.catin-create', 'web', NULL, NULL),
	(53, 'catin.catin-read', 'web', NULL, NULL),
	(54, 'catin.catin-update', 'web', NULL, NULL),
	(55, 'catin.catin-delete', 'web', NULL, NULL),
	(56, 'catin.verifikasi-catin', 'web', NULL, NULL),
	(57, 'catin.verifikasi-catin-create', 'web', NULL, NULL),
	(58, 'catin.verifikasi-catin-read', 'web', NULL, NULL),
	(59, 'catin.verifikasi-catin-update', 'web', NULL, NULL),
	(60, 'catin.verifikasi-catin-delete', 'web', NULL, NULL),
	(61, 'asesmen', 'web', NULL, NULL),
	(62, 'asesmen-create', 'web', NULL, NULL),
	(63, 'asesmen-read', 'web', NULL, NULL),
	(64, 'asesmen-update', 'web', NULL, NULL),
	(65, 'asesmen-delete', 'web', NULL, NULL),
	(66, 'asesmen.asesor', 'web', NULL, NULL),
	(67, 'asesmen.asesor-create', 'web', NULL, NULL),
	(68, 'asesmen.asesor-read', 'web', NULL, NULL),
	(69, 'asesmen.asesor-update', 'web', NULL, NULL),
	(70, 'asesmen.asesor-delete', 'web', NULL, NULL),
	(71, 'asesmen.jadwal-asesmen', 'web', NULL, NULL),
	(72, 'asesmen.jadwal-asesmen-create', 'web', NULL, NULL),
	(73, 'asesmen.jadwal-asesmen-read', 'web', NULL, NULL),
	(74, 'asesmen.jadwal-asesmen-update', 'web', NULL, NULL),
	(75, 'asesmen.jadwal-asesmen-delete', 'web', NULL, NULL),
	(76, 'asesmen.asesor-maping', 'web', NULL, NULL),
	(77, 'asesmen.asesor-maping-create', 'web', NULL, NULL),
	(78, 'asesmen.asesor-maping-read', 'web', NULL, NULL),
	(79, 'asesmen.asesor-maping-update', 'web', NULL, NULL),
	(80, 'asesmen.asesor-maping-delete', 'web', NULL, NULL),
	(81, 'profil', 'web', NULL, NULL),
	(82, 'profil-create', 'web', NULL, NULL),
	(83, 'profil-read', 'web', NULL, NULL),
	(84, 'profil-update', 'web', NULL, NULL),
	(85, 'profil-delete', 'web', NULL, NULL),
	(86, 'cms', 'web', NULL, NULL),
	(87, 'cms-create', 'web', NULL, NULL),
	(88, 'cms-read', 'web', NULL, NULL),
	(89, 'cms-update', 'web', NULL, NULL),
	(90, 'cms-delete', 'web', NULL, NULL),
	(91, 'cms.slide-show', 'web', NULL, NULL),
	(92, 'cms.slide-show-create', 'web', NULL, NULL),
	(93, 'cms.slide-show-read', 'web', NULL, NULL),
	(94, 'cms.slide-show-update', 'web', NULL, NULL),
	(95, 'cms.slide-show-delete', 'web', NULL, NULL),
	(96, 'cms.file-manager', 'web', NULL, NULL),
	(97, 'cms.file-manager-create', 'web', NULL, NULL),
	(98, 'cms.file-manager-read', 'web', NULL, NULL),
	(99, 'cms.file-manager-update', 'web', NULL, NULL),
	(100, 'cms.file-manager-delete', 'web', NULL, NULL),
	(101, 'cms.news', 'web', NULL, NULL),
	(102, 'cms.news-create', 'web', NULL, NULL),
	(103, 'cms.news-read', 'web', NULL, NULL),
	(104, 'cms.news-update', 'web', NULL, NULL),
	(105, 'cms.news-delete', 'web', NULL, NULL),
	(106, 'cms.documents', 'web', NULL, NULL),
	(107, 'cms.documents-create', 'web', NULL, NULL),
	(108, 'cms.documents-read', 'web', NULL, NULL),
	(109, 'cms.documents-update', 'web', NULL, NULL),
	(110, 'cms.documents-delete', 'web', NULL, NULL),
	(111, 'cms.kategori-berita', 'web', NULL, NULL),
	(112, 'cms.kategori-berita-create', 'web', NULL, NULL),
	(113, 'cms.kategori-berita-read', 'web', NULL, NULL),
	(114, 'cms.kategori-berita-update', 'web', NULL, NULL),
	(115, 'cms.kategori-berita-delete', 'web', NULL, NULL),
	(116, 'cms.faqs', 'web', NULL, NULL),
	(117, 'cms.faqs-create', 'web', NULL, NULL),
	(118, 'cms.faqs-read', 'web', NULL, NULL),
	(119, 'cms.faqs-update', 'web', NULL, NULL),
	(120, 'cms.faqs-delete', 'web', NULL, NULL),
	(121, 'setting', 'web', NULL, NULL),
	(122, 'setting-create', 'web', NULL, NULL),
	(123, 'setting-read', 'web', NULL, NULL),
	(124, 'setting-update', 'web', NULL, NULL),
	(125, 'setting-delete', 'web', NULL, NULL),
	(126, 'settings.system-setting', 'web', NULL, NULL),
	(127, 'settings.system-setting-create', 'web', NULL, NULL),
	(128, 'settings.system-setting-read', 'web', NULL, NULL),
	(129, 'settings.system-setting-update', 'web', NULL, NULL),
	(130, 'settings.system-setting-delete', 'web', NULL, NULL),
	(131, 'settings.site-setting', 'web', NULL, NULL),
	(132, 'settings.site-setting-create', 'web', NULL, NULL),
	(133, 'settings.site-setting-read', 'web', NULL, NULL),
	(134, 'settings.site-setting-update', 'web', NULL, NULL),
	(135, 'settings.site-setting-delete', 'web', NULL, NULL),
	(136, 'settings.menu', 'web', NULL, NULL),
	(137, 'settings.menu-create', 'web', NULL, NULL),
	(138, 'settings.menu-read', 'web', NULL, NULL),
	(139, 'settings.menu-update', 'web', NULL, NULL),
	(140, 'settings.menu-delete', 'web', NULL, NULL),
	(141, 'settings.backup', 'web', NULL, NULL),
	(142, 'settings.backup-create', 'web', NULL, NULL),
	(143, 'settings.backup-read', 'web', NULL, NULL),
	(144, 'settings.backup-update', 'web', NULL, NULL),
	(145, 'settings.backup-delete', 'web', NULL, NULL),
	(146, 'users', 'web', NULL, NULL),
	(147, 'users-create', 'web', NULL, NULL),
	(148, 'users-read', 'web', NULL, NULL),
	(149, 'users-update', 'web', NULL, NULL),
	(150, 'users-delete', 'web', NULL, NULL),
	(151, 'users.user-list', 'web', NULL, NULL),
	(152, 'users.user-list-create', 'web', NULL, NULL),
	(153, 'users.user-list-read', 'web', NULL, NULL),
	(154, 'users.user-list-update', 'web', NULL, NULL),
	(155, 'users.user-list-delete', 'web', NULL, NULL),
	(156, 'users.role', 'web', NULL, NULL),
	(157, 'users.role-create', 'web', NULL, NULL),
	(158, 'users.role-read', 'web', NULL, NULL),
	(159, 'users.role-update', 'web', NULL, NULL),
	(160, 'users.role-delete', 'web', NULL, NULL),
	(181, 'berkascatin', 'web', NULL, NULL),
	(182, 'berkascatin-read', 'web', NULL, NULL),
	(183, 'berkascatin-create', 'web', NULL, NULL),
	(184, 'berkascatin-update', 'web', NULL, NULL),
	(185, 'berkascatin-delete', 'web', NULL, NULL);

-- Dumping structure for table andin.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table andin.ref_agama
CREATE TABLE IF NOT EXISTS `ref_agama` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.ref_agama: ~6 rows (approximately)
INSERT INTO `ref_agama` (`id`, `agama`, `keterangan`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 'Islam', 'Agama Islam', 1, NULL, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(2, 'Kristen', 'Agama Kristen', 1, NULL, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(3, 'Katolik', 'Agama Katolik', 1, NULL, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(4, 'Hindu', 'Agama Hindu', 1, NULL, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(5, 'Budha', 'Agama Budha', 1, NULL, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(6, 'Konghucu', 'Agama Konghucu', 1, NULL, '2024-05-04 06:20:42', '2024-05-04 06:20:42');

-- Dumping structure for table andin.ref_kecamatan
CREATE TABLE IF NOT EXISTS `ref_kecamatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_kecamatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `is_active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Aktif, 0 = Tidak Aktif',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ref_kecamatan_kode_kecamatan_unique` (`kode_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.ref_kecamatan: ~22 rows (approximately)
INSERT INTO `ref_kecamatan` (`id`, `kode_kecamatan`, `nama_kecamatan`, `latitude`, `longitude`, `keterangan`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, '3505080', 'Kanigoro', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(2, '3505160', 'Garum', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(3, '3505170', 'Nglegok', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(4, '3505180', 'Sanankulon', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(5, '3505190', 'Ponggok', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(6, '3505200', 'Srengat', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(7, '3505220', 'Udanawu', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(8, '3505010', 'Bakung', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(9, '3505030', 'Panggungrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(10, '3505040', 'Wates', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(11, '3505050', 'Binangun', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(12, '3505060', 'Sutojayan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(13, '3505070', 'Kademangan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(14, '3505210', 'Wonodadi', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(15, '3505090', 'Talun', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(16, '3505100', 'Selopuro', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(17, '3505110', 'Kesamben', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(18, '3505120', 'Selorejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(19, '3505130', 'Doko', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(20, '3505150', 'Gandusari', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(21, '3505020', 'Wonotirto', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(22, '3505140', 'Wlingi', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42');

-- Dumping structure for table andin.ref_kelurahan
CREATE TABLE IF NOT EXISTS `ref_kelurahan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan_id` bigint unsigned NOT NULL,
  `kode_kelurahan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `is_active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Aktif, 0 = Tidak Aktif',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ref_kelurahan_kode_kelurahan_unique` (`kode_kelurahan`),
  KEY `ref_kelurahan_kecamatan_id_foreign` (`kecamatan_id`),
  CONSTRAINT `ref_kelurahan_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `ref_kecamatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.ref_kelurahan: ~248 rows (approximately)
INSERT INTO `ref_kelurahan` (`id`, `kecamatan_id`, `kode_kelurahan`, `nama_kelurahan`, `latitude`, `longitude`, `keterangan`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 1, '3505080009', 'Kuningan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(2, 1, '3505080007', 'Gaprang', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(3, 1, '3505080003', 'Karangsono', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(4, 1, '3505080001', 'Minggirsari', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(5, 1, '3505080002', 'Gogodeso', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(6, 1, '3505080004', 'Satreyan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(7, 1, '3505080005', 'Kanigoro', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(8, 1, '3505080006', 'Tlogo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(9, 1, '3505080008', 'Jatinom', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(10, 1, '3505080010', 'Papungan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(11, 1, '3505080011', 'Banggle', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(12, 1, '3505080012', 'Sawentar', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(13, 2, '3505160002', 'Sumberdiren', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(14, 2, '3505160001', 'Pojok', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(15, 2, '3505160003', 'Garum', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(16, 2, '3505160004', 'Tingal', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(17, 2, '3505160005', 'Bence', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(18, 2, '3505160006', 'Tawangsari', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(19, 2, '3505160007', 'Slorok', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(20, 2, '3505160008', 'Sidodadi', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(21, 2, '3505160009', 'Karangrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(22, 3, '3505170001', 'Bangsri', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(23, 3, '3505170002', 'Jiwut', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(24, 3, '3505170003', 'Krenceng', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(25, 3, '3505170004', 'Kemloko', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(26, 3, '3505170005', 'Dayu', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(27, 3, '3505170006', 'Ngoran', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(28, 3, '3505170007', 'Nglegok', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(29, 3, '3505170008', 'Modangan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(30, 3, '3505170009', 'Penataran', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(31, 3, '3505170010', 'Kedawung', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(32, 3, '3505170011', 'Sumberasri', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(33, 4, '3505180001', 'Plosoarang', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(34, 4, '3505180002', 'Tuliskriyo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(35, 4, '3505180008', 'Sumber', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(36, 4, '3505180009', 'Sumberjo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(37, 4, '3505180010', 'Jeding', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(38, 4, '3505180011', 'Gledug', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(39, 4, '3505180003', 'Bendowulung', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(40, 4, '3505180004', 'Purworejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(41, 4, '3505180005', 'Bendosari', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(42, 4, '3505180006', 'Sanankulon', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(43, 4, '3505180007', 'Kalipucung', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(44, 4, '3505180012', 'Sumberingin', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(45, 5, '3505190006', 'Dadaplangu', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(46, 5, '3505190001', 'Bendo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(47, 5, '3505190002', 'Jatilengger', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(48, 5, '3505190003', 'Maliran', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(49, 5, '3505190004', 'Kawedusan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(50, 5, '3505190013', 'Ringinanyar', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(51, 5, '3505190005', 'Langon', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(52, 5, '3505190007', 'Kebonduren', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(53, 5, '3505190008', 'Pojok', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(54, 5, '3505190009', 'Ponggok', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(55, 5, '3505190010', 'Karangbendo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(56, 5, '3505190011', 'Candirejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(57, 5, '3505190012', 'Bacem', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(58, 5, '3505190014', 'Gembongan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(59, 5, '3505190015', 'Sidorejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(60, 6, '3505200001', 'Purwokerto', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(61, 6, '3505200012', 'Wonorejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(62, 6, '3505200020', 'Dermojayan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(63, 6, '3505200016', 'Dandong', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(64, 6, '3505200014', 'Kandangan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(65, 6, '3505200015', 'Kendalrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(66, 6, '3505200002', 'Selokajang', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(67, 6, '3505200003', 'Ngaglik', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(68, 6, '3505200004', 'Maron', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(69, 6, '3505200005', 'Pakisrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(70, 6, '3505200006', 'Karanggayam', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(71, 6, '3505200011', 'Kerjen', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(72, 6, '3505200013', 'Kauman', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(73, 6, '3505200017', 'Bagelenan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(74, 6, '3505200018', 'Srengat', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(75, 6, '3505200019', 'Togogan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(76, 7, '3505220019', 'Bendorejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(77, 7, '3505220006', 'Ringinanom', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(78, 7, '3505220007', 'Sumberasri', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(79, 7, '3505220008', 'Karanggondang', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(80, 7, '3505220009', 'Tunjung', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(81, 7, '3505220010', 'Jati', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(82, 7, '3505220013', 'Temenggungan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(83, 7, '3505220014', 'Besuki', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(84, 7, '3505220015', 'Bakung', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(85, 7, '3505220016', 'Mangunan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(86, 7, '3505220017', 'Sukorejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(87, 7, '3505220018', 'Slemanan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(88, 8, '3505010012', 'Sumberdadi', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(89, 8, '3505010001', 'Plandirejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(90, 8, '3505010002', 'Tumpakoyot', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(91, 8, '3505010003', 'Bululawang', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(92, 8, '3505010004', 'Sidomulyo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(93, 8, '3505010005', 'Tumpakkepuh', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(94, 8, '3505010009', 'Lorejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(95, 8, '3505010010', 'Kedungbanteng', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(96, 8, '3505010011', 'Bakung', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(97, 8, '3505010013', 'Pulerejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(98, 8, '3505010014', 'Ngrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(99, 9, '3505030010', 'Panggungasri', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(100, 9, '3505030001', 'Serang', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(101, 9, '3505030002', 'Sumbersih', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(102, 9, '3505030003', 'Kaligambir', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(103, 9, '3505030004', 'Balerejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(104, 9, '3505030005', 'Sumberagung', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(105, 9, '3505030006', 'Panggungrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(106, 9, '3505030007', 'Kalitengah', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(107, 9, '3505030008', 'Margomulyo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(108, 9, '3505030009', 'Bumiayu', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(109, 10, '3505040006', 'Purworejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(110, 10, '3505040005', 'Tulungrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(111, 10, '3505040007', 'Sumberarum', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(112, 10, '3505040008', 'Mojorejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(113, 10, '3505040001', 'Ringinrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(114, 10, '3505040002', 'Sukorejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(115, 10, '3505040003', 'Tugurejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(116, 10, '3505040004', 'Wates', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(117, 11, '3505050005', 'Sukorame', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(118, 11, '3505050009', 'Umbuldamar', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(119, 11, '3505050001', 'Salamrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(120, 11, '3505050012', 'Kedungwungu', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(121, 11, '3505050002', 'Sumberkembar', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(122, 11, '3505050003', 'Binangun', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(123, 11, '3505050004', 'Birowo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(124, 11, '3505050006', 'Ngadri', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(125, 11, '3505050007', 'Sambigede', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(126, 11, '3505050008', 'Rejoso', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(127, 11, '3505050010', 'Tawangrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(128, 11, '3505050011', 'Ngembul', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(129, 12, '3505060008', 'Sutojayan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(130, 12, '3505060016', 'Jegu', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(131, 12, '3505060006', 'Pandanarum', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(132, 12, '3505060007', 'Kedungbunder', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(133, 12, '3505060009', 'Bacem', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(134, 12, '3505060010', 'Sumberjo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(135, 12, '3505060011', 'Sukorejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(136, 12, '3505060012', 'Kalipang', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(137, 12, '3505060013', 'Jingglong', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(138, 12, '3505060014', 'Kaulon', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(139, 12, '3505060015', 'Kembangarum', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(140, 13, '3505070007', 'Sumberjo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(141, 13, '3505070015', 'Darungan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(142, 13, '3505070001', 'Panggungduwet', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(143, 13, '3505070002', 'Pakisaji', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(144, 13, '3505070003', 'Kebonsari', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(145, 13, '3505070004', 'Bendosari', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(146, 13, '3505070005', 'Suruhwadang', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(147, 13, '3505070006', 'Maron', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(148, 13, '3505070008', 'Dawuhan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(149, 13, '3505070009', 'Sumberjati', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(150, 13, '3505070010', 'Plumpungrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(151, 13, '3505070011', 'Jimbe', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(152, 13, '3505070012', 'Kademangan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(153, 13, '3505070013', 'Rejowinangun', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(154, 13, '3505070014', 'Plosorejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(155, 14, '3505210006', 'Kaliboto', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(156, 14, '3505210011', 'Jaten', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(157, 14, '3505210010', 'Salam', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(158, 14, '3505210001', 'Gandekan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(159, 14, '3505210002', 'Kunir', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(160, 14, '3505210003', 'Kolomayan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(161, 14, '3505210004', 'Pikatan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(162, 14, '3505210005', 'Wonodadi', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(163, 14, '3505210007', 'Rejosari', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(164, 14, '3505210008', 'Tawangrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(165, 14, '3505210009', 'Kebonagung', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(166, 15, '3505090001', 'Tumpang', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(167, 15, '3505090009', 'Pasirharjo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(168, 15, '3505090002', 'Jabung', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(169, 15, '3505090003', 'Jeblog', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(170, 15, '3505090004', 'Bendosewu', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(171, 15, '3505090006', 'Duren', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(172, 15, '3505090007', 'Sragi', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(173, 15, '3505090008', 'Wonorejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(174, 15, '3505090010', 'Kendalrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(175, 15, '3505090011', 'Talun', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(176, 15, '3505090012', 'Bajang', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(177, 15, '3505090013', 'Kaweron', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(178, 15, '3505090014', 'Jajar', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(179, 15, '3505090015', 'Kamulan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(180, 16, '3505100004', 'Jatitengah', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(181, 16, '3505100001', 'Mandesan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(182, 16, '3505100002', 'Selopuro', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(183, 16, '3505100003', 'Ploso', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(184, 16, '3505100005', 'Jambewangi', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(185, 16, '3505100006', 'Tegalrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(186, 16, '3505100007', 'Mronjo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(187, 16, '3505100008', 'Popoh', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(188, 17, '3505110005', 'Sukoanyar', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(189, 17, '3505110016', 'Kemirigede', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(190, 17, '3505110001', 'Siraman', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(191, 17, '3505110002', 'Jugo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(192, 17, '3505110003', 'Kesamben', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(193, 17, '3505110004', 'Pagergunung', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(194, 17, '3505110013', 'Tapakrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(195, 17, '3505110014', 'Pagerwojo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(196, 17, '3505110015', 'Tepas', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(197, 17, '3505110017', 'Bumirejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(198, 18, '3505120008', 'Ngrendeng', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(199, 18, '3505120001', 'Pohgajih', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(200, 18, '3505120002', 'Selorejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(201, 18, '3505120003', 'Ngreco', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(202, 18, '3505120004', 'Boro', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(203, 18, '3505120005', 'Olak-Alen', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(204, 18, '3505120006', 'Sumberagung', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(205, 18, '3505120007', 'Banjarsari', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(206, 18, '3505120009', 'Sidomulyo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(207, 18, '3505120010', 'Ampelgading', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(208, 19, '3505130010', 'Kalimanis', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(209, 19, '3505130002', 'Genengan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(210, 19, '3505130003', 'Jambepawon', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(211, 19, '3505130001', 'Slorok', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(212, 19, '3505130004', 'Sidorejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(213, 19, '3505130005', 'Doko', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(214, 19, '3505130006', 'Suru', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(215, 19, '3505130007', 'Plumbangan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(216, 19, '3505130008', 'Sumberurip', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(217, 19, '3505130009', 'Resapombo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(218, 20, '3505150002', 'Gondang', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(219, 20, '3505150003', 'Kotes', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(220, 20, '3505150011', 'Slumbung', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(221, 20, '3505150006', 'Gandusari', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(222, 20, '3505150001', 'Sumberagung', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(223, 20, '3505150004', 'Tambakan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(224, 20, '3505150005', 'Butun', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(225, 20, '3505150007', 'Sukosewu', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(226, 20, '3505150008', 'Gadungan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(227, 20, '3505150009', 'Ngaringan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(228, 20, '3505150010', 'Soso', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(229, 20, '3505150012', 'Semen', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(230, 20, '3505150013', 'Tulungrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(231, 20, '3505150014', 'Krisik', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(232, 21, '3505020006', 'Ngadipuro', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(233, 21, '3505020001', 'Tambakrejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(234, 21, '3505020002', 'Kaligrenjeng', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(235, 21, '3505020003', 'Pasiraman', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(236, 21, '3505020004', 'Sumberboto', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(237, 21, '3505020005', 'Gununggede', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(238, 21, '3505020007', 'Ngeni', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(239, 21, '3505020008', 'Wonotirto', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(240, 22, '3505140007', 'Klemunan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(241, 22, '3505140009', 'Wlingi', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(242, 22, '3505140010', 'Tangkil', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(243, 22, '3505140011', 'Beru', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(244, 22, '3505140012', 'Babadan', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(245, 22, '3505140013', 'Tembalang', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(246, 22, '3505140014', 'Ngadirenggo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(247, 22, '3505140015', 'Tegalasri', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(248, 22, '3505140016', 'Balerejo', NULL, NULL, NULL, '1', 1, 1, '2024-05-04 06:20:42', '2024-05-04 06:20:42');

-- Dumping structure for table andin.ref_pendidikan
CREATE TABLE IF NOT EXISTS `ref_pendidikan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.ref_pendidikan: ~5 rows (approximately)
INSERT INTO `ref_pendidikan` (`id`, `pendidikan`, `keterangan`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 'Tidak Tamat SD', 'Tidak Tamat SD', 1, NULL, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(2, 'Tamat SD', 'Tamat SD', 1, NULL, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(3, 'Tamat SMP', 'Tamat SMP', 1, NULL, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(4, 'Tamat SMA', 'Tamat SMA', 1, NULL, '2024-05-04 06:20:42', '2024-05-04 06:20:42'),
	(5, 'D3/D4/Sarjana', 'D3/D4/Sarjana', 1, NULL, '2024-05-04 06:20:42', '2024-05-04 06:20:42');

-- Dumping structure for table andin.ref_persyaratan
CREATE TABLE IF NOT EXISTS `ref_persyaratan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `periode_id` bigint unsigned NOT NULL,
  `nama_persyaratan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `file_pendukung` text COLLATE utf8mb4_unicode_ci,
  `is_wajib` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Wajib, 0 = Tidak Wajib',
  `is_active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Aktif, 0 = Tidak Aktif',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ref_persyaratan_periode_id_foreign` (`periode_id`),
  CONSTRAINT `ref_persyaratan_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.ref_persyaratan: ~1 rows (approximately)
INSERT INTO `ref_persyaratan` (`id`, `periode_id`, `nama_persyaratan`, `keterangan`, `file_pendukung`, `is_wajib`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 7, 'Persyaratan Pengajuan Nikah', 'Usia 18 Tahun keatas memakai map warna merah dan usia 18 Tahun kebawah memakai map warna biru', 'storage/berkas.pdf', '1', '1', 1, 1, '2024-05-05 09:22:44', NULL);

-- Dumping structure for table andin.register
CREATE TABLE IF NOT EXISTS `register` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` bigint unsigned DEFAULT NULL,
  `kelurahan_id` bigint unsigned DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama_id` bigint unsigned DEFAULT NULL,
  `is_active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Aktif, 0 = Tidak Aktif',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `register_email_unique` (`email`),
  UNIQUE KEY `register_nomor_hp_unique` (`nomor_hp`),
  KEY `register_user_id_foreign` (`user_id`),
  KEY `register_kecamatan_id_foreign` (`kecamatan_id`),
  KEY `register_kelurahan_id_foreign` (`kelurahan_id`),
  KEY `register_agama_id_foreign` (`agama_id`),
  CONSTRAINT `register_agama_id_foreign` FOREIGN KEY (`agama_id`) REFERENCES `ref_agama` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `register_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `ref_kecamatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `register_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `ref_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `register_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.register: ~2 rows (approximately)
INSERT INTO `register` (`id`, `user_id`, `nama`, `email`, `nomor_hp`, `kecamatan_id`, `kelurahan_id`, `alamat`, `agama_id`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 4, 'Catin 1', 'catin1@arkatama.test', '08123456789', 1, 1, 'Alamat Pengguna', 1, '1', 1, 1, '2024-05-05 09:40:23', NULL),
	(2, 5, 'Catin 2', 'catin2@arkatama.test', '08123456788', 2, 2, 'Alamat Pengguna Lain', 2, '1', 1, 1, '2024-05-05 09:40:23', NULL);

-- Dumping structure for table andin.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.roles: ~4 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2024-05-04 06:20:40', '2024-05-04 06:20:40'),
	(2, 'pengadilan-agama', 'web', '2024-05-04 06:20:40', '2024-05-04 06:20:40'),
	(3, 'asesor', 'web', '2024-05-04 06:20:40', '2024-05-04 06:20:40'),
	(4, 'catin', 'web', '2024-05-04 06:20:40', '2024-05-04 06:20:40');

-- Dumping structure for table andin.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.role_has_permissions: ~172 rows (approximately)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(16, 1),
	(21, 1),
	(26, 1),
	(31, 1),
	(36, 1),
	(41, 1),
	(46, 1),
	(47, 1),
	(48, 1),
	(49, 1),
	(50, 1),
	(51, 1),
	(52, 1),
	(53, 1),
	(54, 1),
	(55, 1),
	(56, 1),
	(57, 1),
	(58, 1),
	(59, 1),
	(60, 1),
	(61, 1),
	(62, 1),
	(63, 1),
	(64, 1),
	(65, 1),
	(66, 1),
	(67, 1),
	(68, 1),
	(69, 1),
	(70, 1),
	(71, 1),
	(72, 1),
	(73, 1),
	(74, 1),
	(75, 1),
	(76, 1),
	(77, 1),
	(78, 1),
	(79, 1),
	(80, 1),
	(81, 1),
	(82, 1),
	(83, 1),
	(84, 1),
	(85, 1),
	(86, 1),
	(87, 1),
	(88, 1),
	(89, 1),
	(90, 1),
	(91, 1),
	(92, 1),
	(93, 1),
	(94, 1),
	(95, 1),
	(96, 1),
	(97, 1),
	(98, 1),
	(99, 1),
	(100, 1),
	(101, 1),
	(102, 1),
	(103, 1),
	(104, 1),
	(105, 1),
	(106, 1),
	(107, 1),
	(108, 1),
	(109, 1),
	(110, 1),
	(111, 1),
	(112, 1),
	(113, 1),
	(114, 1),
	(115, 1),
	(116, 1),
	(117, 1),
	(118, 1),
	(119, 1),
	(120, 1),
	(121, 1),
	(122, 1),
	(123, 1),
	(124, 1),
	(125, 1),
	(126, 1),
	(127, 1),
	(128, 1),
	(129, 1),
	(130, 1),
	(131, 1),
	(132, 1),
	(133, 1),
	(134, 1),
	(135, 1),
	(136, 1),
	(137, 1),
	(138, 1),
	(139, 1),
	(140, 1),
	(141, 1),
	(142, 1),
	(143, 1),
	(144, 1),
	(145, 1),
	(146, 1),
	(147, 1),
	(148, 1),
	(149, 1),
	(150, 1),
	(151, 1),
	(152, 1),
	(153, 1),
	(154, 1),
	(155, 1),
	(156, 1),
	(157, 1),
	(158, 1),
	(159, 1),
	(160, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(5, 2),
	(46, 2),
	(47, 2),
	(48, 2),
	(49, 2),
	(50, 2),
	(51, 2),
	(52, 2),
	(53, 2),
	(54, 2),
	(55, 2),
	(56, 2),
	(57, 2),
	(58, 2),
	(59, 2),
	(60, 2),
	(81, 2),
	(82, 2),
	(83, 2),
	(84, 2),
	(85, 2),
	(1, 3),
	(2, 3),
	(3, 3),
	(4, 3),
	(5, 3),
	(181, 3),
	(182, 3),
	(183, 3),
	(184, 3),
	(185, 3),
	(1, 4),
	(2, 4),
	(3, 4),
	(4, 4),
	(5, 4);

-- Dumping structure for table andin.site_settings
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('site-identity','hero','profile') NOT NULL DEFAULT 'site-identity',
  `name` varchar(200) NOT NULL,
  `value` varchar(255) NOT NULL,
  `description` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_settings_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table andin.site_settings: ~2 rows (approximately)
INSERT INTO `site_settings` (`id`, `type`, `name`, `value`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'site-identity', 'site_name', 'Andini App', 'Application Name', NULL, NULL, NULL),
	(2, 'site-identity', 'site_description', 'Platform untuk anda yang ingin nikah dini, tanpa takut polisi', 'Application Description', NULL, NULL, NULL);

-- Dumping structure for table andin.slideshow
CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.slideshow: ~0 rows (approximately)

-- Dumping structure for table andin.slideshow_items
CREATE TABLE IF NOT EXISTS `slideshow_items` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slideshow_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slideshow_items_slideshow_id_foreign` (`slideshow_id`),
  CONSTRAINT `slideshow_items_slideshow_id_foreign` FOREIGN KEY (`slideshow_id`) REFERENCES `slideshow` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.slideshow_items: ~0 rows (approximately)

-- Dumping structure for table andin.system_settings
CREATE TABLE IF NOT EXISTS `system_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `value` varchar(255) NOT NULL,
  `description` text,
  `type` enum('string','integer','boolean','array','object','null') NOT NULL DEFAULT 'string',
  `is_active` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=Non-Active, 1=Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `system_settings_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table andin.system_settings: ~0 rows (approximately)

-- Dumping structure for table andin.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table andin.users: ~13 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Admin', 'admin@arkatama.test', '2024-05-04 06:20:40', '$2y$10$nJuCaQv1EjKwhWC9u8ejFeS4RXd6t27KQKPZWu6URjYUV6LrPQ01G', 'm7pojjCXhZnVJY3Q5MxfFmJkymqExP3Hmq8qTNhmKPfYRcIo0CkRqAJohFIs', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(2, 'Assesor', 'asesor@arkatama.test', '2024-05-04 06:20:40', '$2y$10$jxPQR5WMVpso54SLRR9Pc.HT/4.fibbmXf9oAT1rjSlMzpmeXiL1i', '3OfDlO8epEjCS1qCsn2oOsKdZuUtOfUze74nvXfaCetc3OFyWKMdWlefGKrn', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(3, 'Pengadilan Agama', 'pa@arkatama.test', '2024-05-04 06:20:40', '$2y$10$l6AoYMNmWmecEsmIedMIDethSUlY8BjNwK044ctdSl5cYG9hCSoFK', 'yf9jPchRh6', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(4, 'Catin 1', 'catin1@arkatama.test', '2024-05-04 06:20:40', '$2y$10$/8j50JzlOz84SkZNdeSrs.N0AhtuelH6MEL1/7uwUqCqsLFcUtx36', 'oiMuqkHoN2', '2024-05-04 06:20:40', '2024-05-04 06:20:40', NULL),
	(5, 'Catin 2', 'catin2@arkatama.test', '2024-05-04 06:20:41', '$2y$10$S.JYAnuxj0GQiLanNPsm7uoO21aQZ.zkYxAvyyp1Rs5.E8osXA8O.', 'ktUDkE7li8', '2024-05-04 06:20:41', '2024-05-04 06:20:41', NULL),
	(6, 'Catin 3', 'catin3@arkatama.test', '2024-05-04 06:20:41', '$2y$10$d32CR86b5/WFOjXJc71T/Ouf1lybJBifEjA/zMsm.iFl3KR4j/RFK', '79liQt43FS', '2024-05-04 06:20:41', '2024-05-04 06:20:41', NULL),
	(7, 'Catin 4', 'catin4@arkatama.test', '2024-05-04 06:20:41', '$2y$10$589KTGnYzHWWcgJyKbKP6etMF1cvmkfqObpJBRxIswsfJaIBxrzWK', 'jg8TQ0aiF7', '2024-05-04 06:20:41', '2024-05-04 06:20:41', NULL),
	(8, 'Catin 5', 'catin5@arkatama.test', '2024-05-04 06:20:41', '$2y$10$jWFJUYRCYtukV.kgP7Q9HuHa2XrrIYFvSuP4pAy6Im1IyIR.hDE9q', 'z7fjg8gArw', '2024-05-04 06:20:41', '2024-05-04 06:20:41', NULL),
	(9, 'Catin 6', 'catin6@arkatama.test', '2024-05-04 06:20:41', '$2y$10$6POcFnFBYChFi3Ztb60Sj.JikpvRAPEaVAkM8xdNiLwvIf4ad1SWy', '5bHq3IX71D', '2024-05-04 06:20:41', '2024-05-04 06:20:41', NULL),
	(10, 'Catin 7', 'catin7@arkatama.test', '2024-05-04 06:20:41', '$2y$10$.iIAgzcAP7qztkrGpLlZVuCac3n/S64429h.tXFNz9EqG7g//2mI6', 'suC347Pxmp', '2024-05-04 06:20:41', '2024-05-04 06:20:41', NULL),
	(11, 'Catin 8', 'catin8@arkatama.test', '2024-05-04 06:20:41', '$2y$10$piInplOJW8woQESaHDu5HOWJ.4KEW1jSelKu4PmZLVVY//9dGRi4m', 'aepJ5ESfXk', '2024-05-04 06:20:41', '2024-05-04 06:20:41', NULL),
	(12, 'Catin 9', 'catin9@arkatama.test', '2024-05-04 06:20:41', '$2y$10$u309TxZTkRp4bjTfnBdHGuoDT4ickWOXsFxk3U1Ubhd2EZFHgdUnK', 'zU1rZQmcqB', '2024-05-04 06:20:41', '2024-05-04 06:20:41', NULL),
	(13, 'Catin 10', 'catin10@arkatama.test', '2024-05-04 06:20:41', '$2y$10$s3x6YluouktvEvR4/N0RE..7hUidc8Y6NFe0o/bci4AYZz1YPDXdS', 'dvJYZWgGOR', '2024-05-04 06:20:41', '2024-05-04 06:20:41', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
