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


-- Dumping database structure for green_mix_db
USE `wr3xl0tvmy15_greenmix_db`;

-- Dumping structure for table green_mix_db.addresses
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci,
  `iframe` longtext COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL,
  `is_show` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.addresses: ~2 rows (approximately)
INSERT INTO `addresses` (`id`, `name`, `detail`, `iframe`, `order`, `is_show`, `created_at`, `updated_at`) VALUES
	(1, 'Trụ sở Hà Nội', 'Lầu 6, toà Lotte, Phạm Hùng, Thanh Xuân, Hà Nội', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3534.905539825332!2d105.80976912493875!3d21.03205728766596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab6c93b61439%3A0x6a6bc262254f572f!2sLotte%20Mart!5e1!3m2!1svi!2s!4v1732328355126!5m2!1svi!2s', 1, 1, '2024-11-22 23:19:49', '2024-11-22 23:19:49'),
	(2, 'Nhà máy Hải Dương', 'Nhà máy Green Mix, Lô 4 - Cụm Công Nghiệp Thôn Xuân Mang, Tuấn Việt, Kim Thành, Hải Dương', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3534.905539825332!2d105.80976912493875!3d21.03205728766596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab6c93b61439%3A0x6a6bc262254f572f!2sLotte%20Mart!5e1!3m2!1svi!2s!4v1732328355126!5m2!1svi!2s', 2, 1, '2024-11-22 23:21:04', '2024-11-22 23:21:04');

-- Dumping structure for table green_mix_db.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `attach_link` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `path` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.banners: ~3 rows (approximately)
INSERT INTO `banners` (`id`, `name`, `title`, `description`, `attach_link`, `is_show`, `path`, `order`, `created_at`, `updated_at`) VALUES
	(2, 'Banner trang chủ', 'Tự hào tiên phong trong lĩnh vực sản suất phụ gia bê tông', NULL, 'http://greenmix.th', 1, '/storage/files/shares/banner/banner.png', 1, '2024-11-27 09:42:22', '2024-11-27 09:42:22'),
	(3, 'Banner trang chủ', 'Tự hào tiên phong trong lĩnh vực sản suất phụ gia bê tông', 'Tự hào tiên phong trong lĩnh vực sản suất phụ gia bê tông', '#', 1, '/storage/files/shares/banner/img_nature_wide.jpg', 2, '2024-11-28 09:54:15', '2024-11-28 09:54:15'),
	(4, 'Banner trang chủ', 'Tự hào tiên phong trong lĩnh vực sản xuất phụ gia bê tông', 'Tự hào tiên phong trong lĩnh vực sản xuất phụ gia bê tông', '#', 1, '/storage/files/shares/banner/img_snow_wide.jpg', 3, '2024-11-28 09:54:51', '2024-11-28 09:54:51');

-- Dumping structure for table green_mix_db.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint unsigned NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.categories: ~9 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `parent_id`, `description`, `type`, `created_at`, `updated_at`) VALUES
	(9, 'Kế toán', 'ke-toan', '/images/icons/accountant-icon.png', 0, '', 'recruitment', '2024-11-12 07:53:47', '2024-11-12 07:53:47'),
	(10, 'Nhân viên kinh doanh', 'nhan-vien-kinh-doanh', '/images/icons/sale-icon.png', 0, '', 'recruitment', '2024-11-12 07:54:00', '2024-11-12 07:54:00'),
	(11, 'Kỹ thuật viên', 'ky-thuat-vien', '/images/icons/technical-staff-icon.png', 0, '', 'recruitment', '2024-11-12 07:54:14', '2024-11-12 07:54:14'),
	(12, 'Phiên dịch', 'phien-dich', '/images/icons/translate-icon.png', 0, '', 'recruitment', '2024-11-12 07:54:24', '2024-11-12 07:54:24'),
	(20, 'Truyền thông', 'tin-tuc-1', '', 0, '', 'news', '2024-11-27 10:00:29', '2024-12-04 05:00:05'),
	(24, 'Bài viết 1', 'bai-viet-1', '', 0, '', 'post', '2024-11-27 10:04:32', '2024-11-27 10:04:32'),
	(25, 'Bài viết 2', 'bai-viet-2', '', 0, '', 'post', '2024-11-27 10:04:40', '2024-11-27 10:04:40'),
	(26, 'Kiến thức xây dựng', 'kien-thuc-xay-dung', '', 0, 'Kiến thức xây dựng', 'knowledge', '2024-12-04 05:00:41', '2024-12-04 05:00:41'),
	(27, 'Kiến thức về bê tông', 'kien-thuc-ve-be-tong', '', 0, 'Kiến thức về bê tông', 'knowledge', '2024-12-04 05:00:52', '2024-12-04 05:00:52');

-- Dumping structure for table green_mix_db.data_users
CREATE TABLE IF NOT EXISTS `data_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.data_users: ~0 rows (approximately)

-- Dumping structure for table green_mix_db.failed_jobs
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

-- Dumping data for table green_mix_db.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table green_mix_db.fields
CREATE TABLE IF NOT EXISTS `fields` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `post_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.fields: ~4 rows (approximately)
INSERT INTO `fields` (`id`, `name`, `slug`, `images`, `description`, `post_id`, `created_at`, `updated_at`) VALUES
	(1, 'Phụ gia bê tông', 'phu-gia-be-tong', '["\\/storage\\/files\\/shares\\/linh-vuc-kinh-doanh\\/phu-gia-be-tong.png"]', 'Phụ gia bê tông', 1, '2024-11-28 06:08:43', '2024-11-28 06:08:43'),
	(2, 'Phụ gia xi măng', 'phu-gia-xi-mang', '["\\/storage\\/files\\/shares\\/linh-vuc-kinh-doanh\\/phu-gia-xi-mang.png"]', 'Phụ gia xi măng', 2, '2024-11-28 06:09:14', '2024-11-28 06:09:14'),
	(3, 'Sản phẩm phụ trợ xây dựng', 'san-pham-phu-tro-xay-dung', '["\\/storage\\/files\\/shares\\/linh-vuc-kinh-doanh\\/san-pham-phu-tro.png"]', 'Sản phẩm phụ trợ xây dựng', 3, '2024-11-28 06:09:42', '2024-11-28 06:09:42'),
	(4, 'Phụ gia cho vữa giãn nở', 'phu-gia-cho-vua-gian-no', '["\\/storage\\/files\\/shares\\/linh-vuc-kinh-doanh\\/phu-gia-xi-mang.png"]', 'Phụ gia cho vữa giãn nở', 4, '2024-11-28 06:14:56', '2024-11-28 06:14:56');

-- Dumping structure for table green_mix_db.languagues
CREATE TABLE IF NOT EXISTS `languagues` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` mediumtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `languagues_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.languagues: ~3 rows (approximately)
INSERT INTO `languagues` (`id`, `name`, `icon`, `slug`, `created_at`, `updated_at`) VALUES
	(3, 'Tiếng Việt', '/storage/files/shares/language/vietnamese.png', 'tieng-viet', '2024-11-27 09:21:13', '2024-11-27 09:21:13'),
	(4, 'English', '/storage/files/shares/language/united-states.png', 'english', '2024-11-27 09:21:39', '2024-11-27 09:21:39'),
	(5, '中文', '/storage/files/shares/language/chinese.png', '', '2024-11-27 09:24:11', '2024-11-27 09:24:11');

-- Dumping structure for table green_mix_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.migrations: ~18 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_11_11_131331_create_sessions_table', 2),
	(6, '2024_11_12_070120_create_categories_table', 3),
	(8, '2024_11_13_170232_create_news_table', 4),
	(9, '2024_11_14_034613_creat_table_languagues_table', 5),
	(10, '2024_11_15_032858_create_project_table', 5),
	(12, '2024_11_15_163402_create_banners_table', 5),
	(13, '2024_11_16_035124_create_addresses_table', 5),
	(15, '2024_11_16_070656_create_partners_table', 6),
	(16, '2024_11_13_154152_create_post_table', 7),
	(18, '2024_11_28_043640_create_fields_table', 8),
	(19, '2024_11_16_084059_create_product_table', 9),
	(20, '2024_11_29_055702_create_data_users_table', 10),
	(21, '2024_11_15_071054_create_recruitment_table', 11),
	(22, '2024_12_04_065012_create_recruitment_table', 12);

-- Dumping structure for table green_mix_db.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_post_id_foreign` (`post_id`),
  KEY `news_category_id_foreign` (`category_id`),
  CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `news_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.news: ~4 rows (approximately)
INSERT INTO `news` (`id`, `name`, `slug`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
	(2, 'Kiến thức xây dựng 1', 'kien-thuc-xay-dung-1', 16, 26, '2024-12-04 23:46:44', '2024-12-04 23:46:44'),
	(3, 'Kiến thức xây dựng 2', 'kien-thuc-xay-dung-2', 17, 26, '2024-12-04 23:47:05', '2024-12-04 23:47:05'),
	(4, 'Kiến thức về bê tông 1', 'kien-thuc-ve-be-tong-1', 18, 27, '2024-12-04 23:47:37', '2024-12-04 23:47:37'),
	(5, 'Kiến thức về bê tông 2', 'kien-thuc-ve-be-tong-2', 19, 27, '2024-12-04 23:48:00', '2024-12-04 23:48:00');

-- Dumping structure for table green_mix_db.partners
CREATE TABLE IF NOT EXISTS `partners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` mediumtext COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.partners: ~10 rows (approximately)
INSERT INTO `partners` (`id`, `name`, `logo`, `url`, `order`, `created_at`, `updated_at`) VALUES
	(1, 'Phan Vũ', '/storage/files/shares/doi-tac/phan-vu.png', '#', 1, '2024-11-27 05:14:55', '2024-11-27 05:14:55'),
	(2, 'Vinhomes', '/storage/files/shares/doi-tac/vinhomes.png', 'https://vinhomes.vn/vi', 2, '2024-11-27 05:18:11', '2024-11-27 05:34:04'),
	(3, 'Unicons', '/storage/files/shares/doi-tac/unicons.png', '#', 4, '2024-11-27 05:18:42', '2024-11-27 05:19:03'),
	(4, 'Central', '/storage/files/shares/doi-tac/central.png', '#', 3, '2024-11-27 05:19:22', '2024-11-27 05:19:22'),
	(5, 'Newtecon', '/storage/files/shares/doi-tac/newtecons.png', '#', 5, '2024-11-27 05:20:05', '2024-11-27 05:20:05'),
	(6, 'Hòa Bình', '/storage/files/shares/doi-tac/hoa-binh.png', '#', 6, '2024-11-27 05:20:24', '2024-11-27 05:20:24'),
	(7, 'Viettel Construction', '/storage/files/shares/doi-tac/viettel-construction.png', '#', 8, '2024-11-27 05:20:59', '2024-11-27 05:20:59'),
	(8, 'Ricons', '/storage/files/shares/doi-tac/ricons.png', '#', 9, '2024-11-27 05:21:17', '2024-11-27 05:21:17'),
	(9, 'Novaland', '/storage/files/shares/doi-tac/novaland.png', '#', 10, '2024-11-27 05:21:47', '2024-11-27 05:21:47'),
	(10, 'Hưng Thịnh', '/storage/files/shares/doi-tac/hung-thinh-corporation.png', '#', 11, '2024-11-27 05:22:08', '2024-11-27 05:22:08');

-- Dumping structure for table green_mix_db.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table green_mix_db.personal_access_tokens
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

-- Dumping data for table green_mix_db.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table green_mix_db.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` bigint unsigned NOT NULL DEFAULT '0',
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_keyword` text COLLATE utf8mb4_unicode_ci,
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `seo_description` longtext COLLATE utf8mb4_unicode_ci,
  `viewer` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.post: ~17 rows (approximately)
INSERT INTO `post` (`id`, `name`, `title`, `slug`, `description`, `type_id`, `content`, `images`, `seo_keyword`, `seo_title`, `seo_description`, `viewer`, `created_at`, `updated_at`) VALUES
	(1, 'Phụ gia bê tông', 'Phụ gia bê tông', 'phu-gia-be-tong', 'Phụ gia bê tông', 5, '<p>Phụ gia b&ecirc; t&ocirc;ng</p>', '["\\/storage\\/files\\/shares\\/linh-vuc-kinh-doanh\\/phu-gia-be-tong.png"]', NULL, NULL, NULL, 0, '2024-11-28 06:08:43', '2024-11-28 06:08:43'),
	(2, 'Phụ gia xi măng', 'Phụ gia xi măng', 'phu-gia-xi-mang', 'Phụ gia xi măng', 5, '<p>Phụ gia xi măng</p>', '["\\/storage\\/files\\/shares\\/linh-vuc-kinh-doanh\\/phu-gia-xi-mang.png"]', NULL, NULL, NULL, 0, '2024-11-28 06:09:14', '2024-11-28 06:09:14'),
	(3, 'Sản phẩm phụ trợ xây dựng', 'Sản phẩm phụ trợ xây dựng', 'san-pham-phu-tro-xay-dung', 'Sản phẩm phụ trợ xây dựng', 5, '<p>Sản phẩm phụ trợ x&acirc;y dựng</p>', '["\\/storage\\/files\\/shares\\/linh-vuc-kinh-doanh\\/san-pham-phu-tro.png"]', NULL, NULL, NULL, 0, '2024-11-28 06:09:42', '2024-11-28 06:09:42'),
	(4, 'Phụ gia cho vữa giãn nở', 'Phụ gia cho vữa giãn nở', 'phu-gia-cho-vua-gian-no', 'Phụ gia cho vữa giãn nở', 5, '<p>Phụ gia cho vữa gi&atilde;n nở</p>', '["\\/storage\\/files\\/shares\\/linh-vuc-kinh-doanh\\/phu-gia-xi-mang.png"]', NULL, NULL, NULL, 0, '2024-11-28 06:14:56', '2024-11-28 06:14:56'),
	(5, 'Dòng phụ gia hoá dẻo S300', 'Dòng phụ gia hoá dẻo S300', 'dong-phu-gia-hoa-deo-s300', 'Dòng phụ gia hoá dẻo S300', 4, '<p>D&ograve;ng phụ gia ho&aacute; dẻo S300</p>', '["\\/storage\\/files\\/shares\\/san-pham\\/sample.png"]', NULL, NULL, NULL, 0, '2024-11-28 06:54:02', '2024-11-28 06:54:02'),
	(6, 'Dòng phụ gia hoá dẻo S500', 'Dòng phụ gia hoá dẻo S500', 'dong-phu-gia-hoa-deo-s500', 'Dòng phụ gia hoá dẻo S500', 4, '<p>D&ograve;ng phụ gia ho&aacute; dẻo S500</p>', '["\\/storage\\/files\\/shares\\/san-pham\\/sample.png"]', NULL, NULL, NULL, 0, '2024-11-28 06:54:25', '2024-11-28 06:54:25'),
	(7, 'Dòng phụ gia siêu dẻo 3000H', 'Dòng phụ gia siêu dẻo 3000H', 'dong-phu-gia-sieu-deo-3000h', 'Dòng phụ gia siêu dẻo 3000H', 4, '<p>D&ograve;ng phụ gia si&ecirc;u dẻo 3000H</p>', '["\\/storage\\/files\\/shares\\/san-pham\\/sample.png"]', NULL, NULL, NULL, 0, '2024-11-28 06:54:45', '2024-11-28 06:54:45'),
	(8, 'Dòng phụ gia siêu dẻo 5000S', 'Dòng phụ gia siêu dẻo 5000S', 'dong-phu-gia-sieu-deo-5000s', 'Dòng phụ gia siêu dẻo 5000S', 4, '<p>D&ograve;ng phụ gia si&ecirc;u dẻo 5000S</p>', '["\\/storage\\/files\\/shares\\/san-pham\\/sample.png"]', NULL, NULL, NULL, 0, '2024-11-28 06:55:03', '2024-11-28 06:55:03'),
	(9, 'Dòng phụ gia loại F CP5000', 'Dòng phụ gia loại F CP5000', 'dong-phu-gia-loai-f-cp5000', '<ul>\r\n<li>D&ograve;ng phụ gia loại F CP5000</li>\r\n<li>D&ograve;ng phụ gia loại F CP5000</li>\r\n<li>D&ograve;ng phụ gia loại F CP5000</li>\r\n<li>D&ograve;ng phụ gia loại F CP5000</li>\r\n<li>D&ograve;ng phụ gia loại F CP5000</li>\r\n<li>D&ograve;ng phụ gia loại F CP5000</li>\r\n</ul>', 4, '<p>D&ograve;ng phụ gia loại F CP5000</p>', '["\\/storage\\/files\\/shares\\/san-pham\\/sample.png"]', NULL, NULL, NULL, 0, '2024-11-28 06:55:22', '2024-12-04 04:11:26'),
	(10, 'Giới thiệu về greenmix', 'Giới thiệu về greenmix', 'gioi-thieu-ve-greenmix', 'Giới thiệu về greenmix', 0, '<p>Giới thiệu về greenmix</p>', '/storage/files/shares/he-thong/logo-greenmix.png', NULL, NULL, NULL, 0, '2024-12-04 01:38:26', '2024-12-04 01:38:26'),
	(11, 'Lịch sử phát triển', 'Lịch sử phát triển', 'lich-su-phat-trien', 'Lịch sử phát triển', 0, '<p>Lịch sử ph&aacute;t triển</p>', '/storage/files/shares/he-thong/logo-greenmix.png', NULL, NULL, NULL, 0, '2024-12-04 01:38:54', '2024-12-04 01:38:54'),
	(13, 'Truyền thông 1', 'Truyền thông 1', 'truyen-thong-1', 'Truyền thông 1', 2, '<p>Truyền th&ocirc;ng 1</p>', '/storage/files/shares/bai-viet/sample-post.png', NULL, NULL, NULL, 0, '2024-12-04 05:16:40', '2024-12-05 04:24:54'),
	(14, 'Truyền thông 2', 'Truyền thông 2', 'truyen-thong-2', 'Truyền thông 2', 2, '<p>Truyền th&ocirc;ng 2</p>', '/storage/files/shares/bai-viet/sample-post.png', NULL, NULL, NULL, 0, '2024-12-04 05:17:01', '2024-12-05 04:23:17'),
	(16, 'Kiến thức xây dựng 1', 'Kiến thức xây dựng 1', 'kien-thuc-xay-dung-1', 'Kiến thức xây dựng 1', 0, '<p>Kiến thức x&acirc;y dựng 1</p>', '/storage/files/shares/bai-viet/sample-post.png', NULL, NULL, NULL, 0, '2024-12-04 23:46:44', '2024-12-05 04:21:09'),
	(17, 'Kiến thức xây dựng 2', 'Kiến thức xây dựng 2', 'kien-thuc-xay-dung-2', 'Kiến thức xây dựng 2', 0, '<p>Kiến thức x&acirc;y dựng 2</p>', '/storage/files/shares/bai-viet/sample-post.png', NULL, NULL, NULL, 0, '2024-12-04 23:47:05', '2024-12-05 04:20:58'),
	(18, 'Kiến thức về bê tông 1', 'Kiến thức về bê tông 1', 'kien-thuc-ve-be-tong-1', 'Kiến thức về bê tông 1', 0, '<p>Kiến thức về b&ecirc; t&ocirc;ng 1</p>', '/storage/files/shares/bai-viet/sample-post.png', NULL, NULL, NULL, 0, '2024-12-04 23:47:37', '2024-12-05 04:20:47'),
	(19, 'Kiến thức về bê tông 2', 'Kiến thức về bê tông 2', 'kien-thuc-ve-be-tong-2', 'Kiến thức về bê tông 2', 0, '<p>Kiến thức về b&ecirc; t&ocirc;ng 2</p>', '/storage/files/shares/bai-viet/sample-post.png', NULL, NULL, NULL, 0, '2024-12-04 23:48:00', '2024-12-05 04:20:38');

-- Dumping structure for table green_mix_db.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `post_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.products: ~5 rows (approximately)
INSERT INTO `products` (`id`, `name`, `slug`, `images`, `description`, `post_id`, `created_at`, `updated_at`) VALUES
	(1, 'Dòng phụ gia hoá dẻo S300', 'dong-phu-gia-hoa-deo-s300', '["\\/storage\\/files\\/shares\\/san-pham\\/sample.png"]', 'Dòng phụ gia hoá dẻo S300', 5, '2024-11-28 06:54:02', '2024-11-28 06:54:02'),
	(2, 'Dòng phụ gia hoá dẻo S500', 'dong-phu-gia-hoa-deo-s500', '["\\/storage\\/files\\/shares\\/san-pham\\/sample.png"]', 'Dòng phụ gia hoá dẻo S500', 6, '2024-11-28 06:54:25', '2024-11-28 06:54:25'),
	(3, 'Dòng phụ gia siêu dẻo 3000H', 'dong-phu-gia-sieu-deo-3000h', '["\\/storage\\/files\\/shares\\/san-pham\\/sample.png"]', 'Dòng phụ gia siêu dẻo 3000H', 7, '2024-11-28 06:54:45', '2024-11-28 06:54:45'),
	(4, 'Dòng phụ gia siêu dẻo 5000S', 'dong-phu-gia-sieu-deo-5000s', '["\\/storage\\/files\\/shares\\/san-pham\\/sample.png"]', 'Dòng phụ gia siêu dẻo 5000S', 8, '2024-11-28 06:55:04', '2024-11-28 06:55:04'),
	(5, 'Dòng phụ gia loại F CP5000', 'dong-phu-gia-loai-f-cp5000', '["\\/storage\\/files\\/shares\\/san-pham\\/sample.png"]', '<ul>\r\n<li>D&ograve;ng phụ gia loại F CP5000</li>\r\n<li>D&ograve;ng phụ gia loại F CP5000</li>\r\n<li>D&ograve;ng phụ gia loại F CP5000</li>\r\n<li>D&ograve;ng phụ gia loại F CP5000</li>\r\n<li>D&ograve;ng phụ gia loại F CP5000</li>\r\n<li>D&ograve;ng phụ gia loại F CP5000</li>\r\n</ul>', 9, '2024-11-28 06:55:22', '2024-12-04 04:11:26');

-- Dumping structure for table green_mix_db.project
CREATE TABLE IF NOT EXISTS `project` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  `order` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.project: ~4 rows (approximately)
INSERT INTO `project` (`id`, `name`, `address`, `image`, `order`, `created_at`, `updated_at`) VALUES
	(11, 'Dự án VinHome Vũ Yên', 'Hải Phòng', '/storage/files/shares/du-an/vinhome-vu-yen.png', NULL, '2024-11-23 21:52:11', '2024-11-23 21:52:11'),
	(12, 'Dự án hầm núi Phượng Hoàng', 'Triệu Khánh, Trung Quốc', '/storage/files/shares/du-an/ham-nui-phuong-hoang.png', NULL, '2024-11-23 21:52:44', '2024-11-23 21:52:44'),
	(13, 'Dự Án Đường Vành Đai 4', 'Bắc Ninh', '/storage/files/shares/du-an/duong-vanh-dai-4.png', NULL, '2024-11-23 21:53:18', '2024-11-23 21:53:18'),
	(14, 'Dự Án Đường Sắt Cao Tốc', 'Tam Thủy, Trung Quốc', '/storage/files/shares/du-an/duong-sat-cao-toc.png', NULL, '2024-11-23 21:53:47', '2024-11-23 21:53:47');

-- Dumping structure for table green_mix_db.recruitment
CREATE TABLE IF NOT EXISTS `recruitment` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `category_id` bigint NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_people` int unsigned NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `benefit` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.recruitment: ~1 rows (approximately)
INSERT INTO `recruitment` (`id`, `name`, `start_date`, `end_date`, `category_id`, `address`, `num_people`, `description`, `requirements`, `benefit`, `content`, `slug`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'Kế toán', '2024-12-05', '2024-12-06', 9, 'ZHGaor dipmg', 12, 'sd', '<p>ds</p>', 'ds', 'sd', 'ke-toan', '/storage/files/2/ricons.png', '2024-12-05 04:42:01', '2024-12-05 04:42:01');

-- Dumping structure for table green_mix_db.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('QcFyXuTxVB1QX6tf2DnMpuCeYFQXXsTXAr3jLed2', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ00zTVlTS0xTemJDb0dNWkN4N0FLZVZyNE4yTkw4TjBURFJ6bnZzRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9ncmVlbm1peC50aC9hZG1pbi9yZWNydWl0bWVudCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1733385037);

-- Dumping structure for table green_mix_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table green_mix_db.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Quản trị viên', 'greenmix@gmail.com', NULL, '$2y$12$fF1NqF.45RWQRPthWcpmW.OO8M4wBdC3opU5er.N4/SRhWTiGuZDe', NULL, '2024-11-11 10:16:09', '2024-11-11 10:16:09'),
	(2, 'Trần Huy Hoàng', 'admin@gmail.com', NULL, '$2y$12$Nn8qNIvzrey4e3ijlYerxerHOrNuGkyiKm.W3N7ICsmc0FsDUWW1K', 'MMHqFOPcbYkQWYp9bQrms6Droqwrf3wxEu6eEZpGV9dXONOaTLGXAHwg78eX', '2024-11-11 10:43:43', '2024-11-11 10:43:43'),
	(4, 'Trường Nguyễn', 'truongnguyen@greenmix.com.vn', NULL, '$2y$12$oPQY7ZHKEJ4HYtT.P0qx0.cLrRKNN35xsXUkCSFWcE6ez/15lAIUC', NULL, '2024-11-23 21:47:09', '2024-11-23 21:47:09');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
