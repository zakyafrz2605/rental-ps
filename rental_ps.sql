-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
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

-- Dumping data for table rental_ps.games: ~0 rows (approximately)
INSERT IGNORE INTO `games` (`id`, `judul`, `genre`, `deskripsi`, `image`, `link`) VALUES
	(2, 'Serial Experiments Lain', '{"genre": "Mystery, Dementia"}', NULL, '1704626039_Iwakura Lain.png', 'https://www.youtube.com/watch?v=5m5CTaF-qHE'),
	(5, 'GTA V', '{"genre": "Action, Adventure, Open World"}', 'Grand Theft Auto', '1704630040_Grand_Theft_Auto_V.png', NULL);

-- Dumping data for table rental_ps.konsols: ~3 rows (approximately)
INSERT IGNORE INTO `konsols` (`id`, `id_game`, `status`, `created_at`) VALUES
	(2, '', 'aktif', '2024-01-06 22:06:51'),
	(3, '5', 'aktif', '2024-01-06 22:41:52'),
	(4, NULL, 'aktif', '2024-01-07 13:04:02');

-- Dumping data for table rental_ps.migrations: ~8 rows (approximately)
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(43, '2024_01_05_032139_create_users_table', 1),
	(51, '2_create_konsols_table', 2),
	(61, '3_create_rentals_table', 3),
	(69, '1_create_users_table', 4),
	(70, '2019_12_14_000001_create_personal_access_tokens_table', 4),
	(76, '2_create_games_table', 6),
	(77, '3_create_konsols_table', 7),
	(78, '5_create_pembayarans_table', 8),
	(79, '4_create_rentals_table', 9);

-- Dumping data for table rental_ps.pembayarans: ~0 rows (approximately)
INSERT IGNORE INTO `pembayarans` (`id`, `nominal`, `status`, `bukti_pembayaran`, `created_at`, `updated_at`) VALUES
	(1, 120000, 'pending', '1704636042_Ayanami Rei.png', '2024-01-07 06:04:38', '2024-01-07 07:00:42'),
	(2, 15000, 'lunas', NULL, '2024-01-07 06:05:56', '2024-01-07 07:01:21'),
	(3, 0, 'pending', NULL, '2024-01-07 06:27:23', '2024-01-07 06:27:23');

-- Dumping data for table rental_ps.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table rental_ps.rentals: ~0 rows (approximately)
INSERT IGNORE INTO `rentals` (`id`, `id_customer`, `id_konsol`, `id_pembayaran`, `mulai`, `selesai`) VALUES
	(1, 1, 2, 3, '2024-01-07 20:28:00', '2024-01-08 20:27:00');

-- Dumping data for table rental_ps.users: ~3 rows (approximately)
INSERT IGNORE INTO `users` (`id`, `nama`, `nomor_telepon`, `alamat`, `email`, `role`, `password`, `created_at`) VALUES
	(1, 'Daffa', '081234567821', 'Bandung', 'dafiraone@gmail.com', 'admin', '$2y$12$xjwlH1rPi57fZ0oiUTn9xODW8sxDlhnTxO0tjpdki458ViyYvrNIq', '2024-01-06 10:26:52'),
	(2, 'Deli', '089876543121', NULL, 'deli@gmail.com', 'customer', '$2y$12$yoK/C.wjeZoQgv0/SL80EOWVgsmVrwrURwuayKG.ij2q65qmhjLrC', '2024-01-06 10:26:52');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
