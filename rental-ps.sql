/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `rental-ps` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `rental-ps`;

CREATE TABLE IF NOT EXISTS `games` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `games_chk_1` CHECK (json_valid(`genre`))
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT IGNORE INTO `games` (`id`, `judul`, `genre`, `deskripsi`, `image`, `link`) VALUES
	(5, 'GTA VI', '{"genre":"Open World"}', 'Grand Theft Auto', '1707284387_gta-6-everything-we-know-so-far-guide-1.webp', 'https://www.youtube.com/watch?v=QdBZY2fkU-0'),
	(2, 'Red Dead Redemption 2', '{"genre":"Action, Adventure, Open World"}', 'America, 1899.\r\n\r\nArthur Morgan and the Van der Linde gang are outlaws on the run. With federal agents and the best bounty hunters in the nation massing on their heels, the gang must rob, steal and fight their way across the rugged heartland of America in order to survive. As deepening internal divisions threaten to tear the gang apart, Arthur must make a choice between his own ideals and loyalty to the gang who raised him.', '1707284391_icon0.jpg', 'https://www.youtube.com/watch?v=eaW0tYpxyp0'),
	(4, 'Teardown', '{"genre":"Voxel, Destruction, Physics"}', NULL, '1707284396_capsule_616x353.jpg', NULL);
/*!40000 ALTER TABLE `games` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `konsols` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_game` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `konsols` DISABLE KEYS */;
INSERT IGNORE INTO `konsols` (`id`, `id_game`, `status`, `created_at`) VALUES
	(1, '2,4,6', 'aktif', '2024-01-07 20:34:33'),
	(2, '5,2,4', 'aktif', '2024-01-08 01:02:22');
/*!40000 ALTER TABLE `konsols` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '1_create_users_table', 1),
	(2, '2_create_games_table', 2),
	(3, '3_create_konsols_table', 3),
	(4, '4_create_pembayarans_table', 4),
	(5, '5_create_rentals_table', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pembayarans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nominal` int NOT NULL DEFAULT '0',
  `status` enum('pending','lunas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `pembayarans` DISABLE KEYS */;
INSERT IGNORE INTO `pembayarans` (`id`, `nominal`, `status`, `bukti_pembayaran`, `created_at`, `updated_at`) VALUES
	(1, 360000, 'lunas', '', '2024-01-07 13:35:01', '2024-01-07 13:36:07'),
	(2, 0, 'pending', NULL, '2024-01-07 20:00:28', '2024-01-07 20:00:28'),
	(3, 0, 'pending', NULL, '2024-01-08 23:55:50', '2024-01-08 23:55:50'),
	(4, 0, 'pending', NULL, '2024-01-08 23:56:30', '2024-01-08 23:56:30');
/*!40000 ALTER TABLE `pembayarans` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `rentals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_customer` bigint unsigned NOT NULL,
  `id_konsol` bigint unsigned NOT NULL,
  `id_pembayaran` bigint unsigned NOT NULL,
  `mulai` datetime NOT NULL,
  `selesai` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rentals_id_customer_foreign` (`id_customer`),
  KEY `rentals_id_konsol_foreign` (`id_konsol`),
  KEY `rentals_id_pembayaran_foreign` (`id_pembayaran`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `rentals` DISABLE KEYS */;
INSERT IGNORE INTO `rentals` (`id`, `id_customer`, `id_konsol`, `id_pembayaran`, `mulai`, `selesai`) VALUES
	(3, 5, 1, 3, '2024-01-09 15:00:00', '2024-01-10 00:00:00'),
	(4, 5, 2, 4, '2024-01-09 18:00:00', '2024-01-11 00:00:00');
/*!40000 ALTER TABLE `rentals` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('customer','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `nama`, `nomor_telepon`, `alamat`, `email`, `role`, `password`, `created_at`) VALUES
	(1, 'Daffa', '08123456789', 'Bandung', 'dafiraone@gmail.com', 'admin', '$2y$12$FWw6iU9236zBnSOD7sCsR.yG26.m99hGYHWmyK7rFNc7f2HPpr68W', '2024-01-07 18:27:54'),
	(2, 'Deli', '08987654321', NULL, 'deli@gmail.com', 'customer', '$2y$12$gpEELf/9W4MaKDyE40wfI.4SBkCIjqLYg0vaABVxLPkcBG5eNnfG2', '2024-01-07 22:31:17'),
	(3, 'Raihan', '081230659880', 'Dihatimu no 32', 'alrais.raihan@gmail.com', 'admin', '$2y$12$tXcVZqUEcllUMvBC5kHH2e4MrfcO8nK43u3KqQGbGprKlinhbJXS2', '2024-01-08 01:51:45'),
	(4, 'Zaky', '081232345456', 'Bandung', 'zaky@gmail.com', 'customer', '$2y$12$C68C3.ArHIe2rR1iYm0...OwJFloTyLtdNvvIqkNN/LZ6uPMUCbcu', '2024-01-08 02:59:21'),
	(5, 'afrizal', '08154546555645', 'Bandung', 'afriz@itenas.com', 'customer', '$2y$12$9HSb0UHV9x2pcBMyvShctOCXvBoEfMU4gC49ZagiFf5izxagdtG96', '2024-01-09 06:53:43'),
	(6, 'agiel', '081234567890', 'cibiru', 'projecttugas123@gmail.com', 'customer', '$2y$12$reDHWooEwMiuGRs9xYzC9ONhbp.ukh5XABM2Uy43YA5VmTCKl01BK', '2024-01-12 13:16:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
