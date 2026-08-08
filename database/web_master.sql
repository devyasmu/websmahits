-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2026 at 06:30 AM
-- Server version: 9.4.0
-- PHP Version: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `slug`, `content`, `priority`, `is_active`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Libur Semester Ganjil Tahun Ajaran 2024/2025', 'libur-semester-ganjil-tahun-ajaran-20242025', '<p>Diberitahukan kepada seluruh siswa dan orang tua bahwa libur semester ganjil akan dimulai pada tanggal 20 Desember 2024 dan akan berakhir pada tanggal 6 Januari 2025.</p><p>Selama libur semester, siswa diharapkan untuk:</p><ul><li>Istirahat yang cukup</li><li>Mengisi waktu dengan kegiatan positif</li><li>Mempersiapkan diri untuk semester genap</li></ul><p>Kegiatan belajar mengajar akan dimulai kembali pada tanggal 7 Januari 2025.</p>', 'high', 1, '2025-10-25 05:47:44', '2025-11-24 05:47:44', '2025-10-25 05:47:44', '2025-10-27 20:32:25'),
(2, 'Jadwal Ujian Akhir Semester Ganjil', 'jadwal-ujian-akhir-semester-ganjil', '<p>Berikut adalah jadwal ujian akhir semester ganjil tahun ajaran 2024/2025:</p><ul><li>Tanggal 10-15 Desember 2024: Ujian Tulis</li><li>Tanggal 16-18 Desember 2024: Ujian Lisan</li><li>Tanggal 19 Desember 2024: Pengumuman Hasil</li></ul><p>Seluruh siswa diharapkan mempersiapkan diri dengan baik untuk menghadapi ujian ini.</p>', 'medium', 1, '2025-10-25 05:47:44', '2025-11-09 05:47:44', '2025-10-25 05:47:44', '2025-10-27 20:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#007bff',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `color`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Berita', 'berita', 'Berita dan informasi terkini dari yayasan', '#007bff', 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43'),
(2, 'Pengumuman', 'pengumuman', 'Pengumuman penting untuk siswa dan orang tua', '#28a745', 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43'),
(3, 'Kegiatan', 'kegiatan', 'Kegiatan dan acara yayasan', '#ffc107', 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43'),
(4, 'Prestasi', 'prestasi', 'Prestasi dan pencapaian siswa', '#dc3545', 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43'),
(5, 'Galeri', 'galeri', 'Foto dan video kegiatan', '#6f42c1', 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43'),
(6, 'Dokumen', 'dokumen', 'Dokumen dan file penting', '#17a2b8', 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `commentable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` int NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `download_count` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Bagaimana cara mendaftar sebagai siswa baru?', '<p>Untuk mendaftar sebagai siswa baru, Anda dapat:</p><ol><li>Mengisi formulir pendaftaran online di website kami</li><li>Atau datang langsung ke kantor yayasan dengan membawa dokumen yang diperlukan</li><li>Mengikuti tes masuk yang akan dijadwalkan</li><li>Melakukan pembayaran biaya pendaftaran</li></ol>', 1, 1, '2025-10-25 05:47:44', '2025-10-25 05:47:44'),
(2, 'Apakah ada program beasiswa untuk siswa berprestasi?', '<p>Ya, kami menyediakan program beasiswa untuk siswa berprestasi dengan kriteria:</p><ul><li>Memiliki nilai akademik yang baik</li><li>Memiliki prestasi di bidang non-akademik</li><li>Memiliki akhlak yang baik</li><li>Keluarga yang membutuhkan bantuan finansial</li></ul><p>Untuk informasi lebih lanjut, silakan hubungi bagian administrasi.</p>', 2, 1, '2025-10-25 05:47:44', '2025-10-25 05:47:44'),
(3, 'Jam operasional yayasan?', '<p>Jam operasional yayasan adalah:</p><ul><li>Senin - Jumat: 07:00 - 16:00 WIB</li><li>Sabtu: 07:00 - 12:00 WIB</li><li>Minggu: Tutup</li></ul><p>Untuk informasi lebih lanjut, silakan hubungi kami di nomor yang tertera di halaman kontak.</p>', 3, 1, '2025-10-25 05:47:44', '2025-10-25 05:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `event_date` date DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` json DEFAULT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `video_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `slug`, `description`, `content`, `event_date`, `location`, `is_featured`, `image`, `featured_image`, `images`, `thumbnail`, `type`, `video_url`, `category_id`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Uji', 'uji', 'rangkaian galeri haflah.', '<p>afagafsgsfgsdfg</p>', NULL, NULL, 0, 'galleries/5Ig27BGqFftIheSPWMiznbRUnc3rXEfayGjhekYM.jpg', NULL, '[\"galleries/E1oQwBmZXrxyNBNuRDgXpbJylo90TDYZuZIJfWJ0.png\", \"galleries/7muqJ2ghynebR2TqZ7Sj4VxavFgvQRoJnegHwHpG.png\", \"galleries/3VsgZBwSOHEU93MxHb70rZ7QOMoIsjmGxEY7QQzo.png\", \"galleries/mcfzwjET6x28T3yZ3lSpsXLZuwPrGt2lmRUxuHNT.png\", \"galleries/ksplhdsMEyRCa61gAvRk9nxmu1wKGg2PgVVjGNOa.png\"]', 'galleries/5Ig27BGqFftIheSPWMiznbRUnc3rXEfayGjhekYM.jpg', 'image', NULL, NULL, 1, 1, '2025-10-28 01:18:47', '2025-10-28 08:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint UNSIGNED NOT NULL,
  `likeable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `likeable_id` bigint UNSIGNED NOT NULL,
  `user_ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `url`, `target`, `parent_id`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Beranda', '/', '_self', NULL, 1, 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43'),
(2, 'Tentang Kami', '/tentang-kami', '_self', NULL, 2, 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43'),
(3, 'Program', '/program', '_self', NULL, 3, 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43'),
(4, 'Berita', '/berita', '_self', NULL, 4, 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43'),
(5, 'Galeri', '/galeri', '_self', NULL, 5, 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43'),
(6, 'Download', '/download', '_self', NULL, 6, 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43'),
(7, 'Kontak', '/kontak', '_self', NULL, 7, 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_10_20_133741_create_site_settings_table', 1),
(7, '2025_10_20_133745_create_pages_table', 1),
(8, '2025_10_20_133745_create_running_texts_table', 1),
(9, '2025_10_20_133745_create_sliders_table', 1),
(10, '2025_10_20_133746_create_categories_table', 1),
(11, '2025_10_20_133746_create_menus_table', 1),
(12, '2025_10_20_133750_create_posts_table', 1),
(13, '2025_10_20_133751_create_galleries_table', 1),
(14, '2025_10_20_133751_create_programs_table', 1),
(15, '2025_10_20_133752_create_announcements_table', 1),
(16, '2025_10_20_133752_create_downloads_table', 1),
(17, '2025_10_20_133756_create_testimonials_table', 1),
(18, '2025_10_20_133757_create_contacts_table', 1),
(19, '2025_10_20_133757_create_faqs_table', 1),
(20, '2025_10_21_045900_add_slug_to_galleries_table', 1),
(21, '2025_10_21_060505_add_theme_settings_to_site_settings_table', 1),
(22, '2025_10_21_172439_add_transparency_settings_to_site_settings_table', 1),
(23, '2025_10_21_174138_add_card_button_colors_to_site_settings_table', 1),
(24, '2025_10_21_180339_add_detailed_color_settings_to_site_settings_table', 1),
(25, '2025_10_21_191545_add_slug_to_announcements_table', 1),
(26, '2025_10_21_194006_add_footer_color_settings_to_site_settings_table', 1),
(27, '2025_10_23_023251_create_statistics_table', 1),
(28, '2025_10_23_023256_create_features_table', 1),
(29, '2025_10_28_000000_update_galleries_add_fields', 2),
(30, '2025_10_28_000001_add_images_json_to_galleries', 3),
(31, '2025_10_28_171626_create_likes_table', 4),
(32, '2025_10_28_171631_create_comments_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `meta_title`, `meta_description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Tentang Kami', 'about', '<h2>Sejarah Yayasan</h2><p>Yayasan Pendidikan Islam didirikan pada tahun 1995 dengan visi membangun generasi yang berakhlak mulia dan berprestasi. Kami telah melayani ribuan siswa dan alumni yang tersebar di berbagai penjuru negeri.</p><h2>Visi</h2><p>Menjadi lembaga pendidikan Islam terdepan yang mencetak generasi berakhlak mulia, berprestasi, dan bermanfaat bagi umat.</p><h2>Misi</h2><ul><li>Menyelenggarakan pendidikan Islam yang berkualitas</li><li>Membangun karakter dan akhlak mulia</li><li>Mengembangkan potensi akademik dan non-akademik</li><li>Membentuk generasi yang siap menghadapi tantangan masa depan</li></ul>', 'Tentang Kami - Yayasan Pendidikan Islam', 'Pelajari lebih lanjut tentang sejarah, visi, dan misi Yayasan Pendidikan Islam', 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43'),
(2, 'Visi & Misi', 'vision-mission', '<h2>Visi</h2><p>Menjadi lembaga pendidikan Islam terdepan yang mencetak generasi berakhlak mulia, berprestasi, dan bermanfaat bagi umat.</p><h2>Misi</h2><ul><li>Menyelenggarakan pendidikan Islam yang berkualitas dan terintegrasi</li><li>Membangun karakter dan akhlak mulia berdasarkan Al-Quran dan Sunnah</li><li>Mengembangkan potensi akademik dan non-akademik siswa secara optimal</li><li>Membentuk generasi yang siap menghadapi tantangan masa depan</li><li>Menjalin kerjasama dengan berbagai pihak untuk kemajuan pendidikan</li></ul>', 'Visi & Misi - Yayasan Pendidikan Islam', 'Visi dan misi Yayasan Pendidikan Islam dalam membangun generasi yang berakhlak mulia', 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `views` int NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `excerpt`, `content`, `featured_image`, `category_id`, `user_id`, `meta_title`, `meta_description`, `is_published`, `is_featured`, `views`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Pembukaan Pendaftaran Siswa Baru Tahun Ajaran 2024/2025', 'pembukaan-pendaftaran-siswa-baru-2024-2025', 'Yayasan Pendidikan Islam membuka pendaftaran siswa baru untuk tahun ajaran 2024/2025. Segera daftarkan putra-putri Anda.', '<p>Yayasan Pendidikan Islam dengan bangga mengumumkan pembukaan pendaftaran siswa baru untuk tahun ajaran 2024/2025. Kami menyediakan program pendidikan yang komprehensif mulai dari tingkat TK, SD, SMP, hingga SMA.</p>\r\n<h3>Persyaratan Pendaftaran:</h3>\r\n<ul>\r\n<li>Mengisi formulir pendaftaran</li>\r\n<li>Menyerahkan fotokopi akta kelahiran</li>\r\n<li>Menyerahkan fotokopi KK</li>\r\n<li>Pas foto 3x4 sebanyak 2 lembar</li>\r\n<li>Mengikuti tes masuk</li>\r\n</ul>\r\n<p>Pendaftaran dibuka mulai tanggal 1 Januari 2024. Segera daftarkan putra-putri Anda untuk mendapatkan pendidikan terbaik.</p>', 'posts/pRcdPSRlADdkcTG3XlrGsvN7DU0wVLlm0F1VOLim.png', 1, 1, 'Pendaftaran Siswa Baru 2024/2025 - Yayasan Pendidikan Islam', 'Informasi lengkap tentang pendaftaran siswa baru tahun ajaran 2024/2025 di Yayasan Pendidikan Islam', 1, 1, 0, '2025-10-25 05:47:00', '2025-10-25 05:47:43', '2025-12-24 07:18:21'),
(2, 'Kegiatan Outbound Siswa Kelas 6 SD', 'kegiatan-outbound-siswa-kelas-6-sd', 'Siswa kelas 6 SD mengikuti kegiatan outbound di Taman Nasional untuk mengembangkan kerja sama tim.', '<p>Pada hari Sabtu, 15 Oktober 2024, siswa kelas 6 SD Yayasan Pendidikan Islam mengikuti kegiatan outbound di Taman Nasional. Kegiatan ini bertujuan untuk mengembangkan kerja sama tim, kepemimpinan, dan kemandirian siswa.</p>\r\n<p>Kegiatan outbound meliputi berbagai permainan yang menantang seperti flying fox, jembatan tali, dan permainan team building lainnya. Semua siswa terlihat antusias dan bersemangat mengikuti setiap aktivitas.</p>\r\n<p>Kegiatan ini diharapkan dapat membangun karakter siswa yang tangguh, mandiri, dan mampu bekerja sama dalam tim.</p>', 'posts/MpSX8lVSrHbPXs7sXjpeFmyGZv0m45XeIhgRC9Gk.png', 3, 1, 'Kegiatan Outbound Siswa Kelas 6 SD - Yayasan Pendidikan Islam', 'Laporan kegiatan outbound siswa kelas 6 SD di Taman Nasional untuk mengembangkan kerja sama tim', 1, 0, 0, '2025-10-23 05:47:00', '2025-10-25 05:47:43', '2025-10-28 11:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age_group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `slug`, `excerpt`, `content`, `featured_image`, `icon`, `duration`, `age_group`, `price`, `is_featured`, `is_active`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Program Tahfidz Al-Quran', 'program-tahfidz-al-quran', 'Program khusus untuk menghafal Al-Quran dengan metode yang efektif dan menyenangkan.', '<h3>Deskripsi Program</h3><p>Program Tahfidz Al-Quran adalah program unggulan Yayasan Pendidikan Islam yang dirancang khusus untuk membantu siswa menghafal Al-Quran dengan metode yang efektif dan menyenangkan.</p><h3>Keunggulan Program:</h3><ul><li>Metode pembelajaran yang terstruktur</li><li>Guru yang berpengalaman dan bersertifikat</li><li>Evaluasi berkala untuk memantau perkembangan</li><li>Suasana belajar yang kondusif</li></ul><h3>Target Pencapaian:</h3><p>Siswa diharapkan dapat menghafal minimal 1 juz per tahun dengan kualitas hafalan yang baik.</p>', 'programs/tahfidz-al-quran.jpg', 'fas fa-quran', '1 Tahun', '7-18 Tahun', 500000.00, 1, 1, 1, '2025-10-25 05:47:44', '2025-10-25 05:47:44'),
(2, 'Program Bahasa Arab', 'program-bahasa-arab', 'Belajar bahasa Arab dengan metode komunikatif untuk memahami Al-Quran dan Hadits.', '<h3>Deskripsi Program</h3><p>Program Bahasa Arab dirancang untuk membantu siswa menguasai bahasa Arab dengan metode komunikatif yang menyenangkan.</p><h3>Materi Pembelajaran:</h3><ul><li>Kosakata dasar bahasa Arab</li><li>Struktur kalimat sederhana</li><li>Percakapan sehari-hari</li><li>Pemahaman teks Al-Quran dan Hadits</li></ul>', 'programs/bahasa-arab.jpg', 'fas fa-language', '6 Bulan', '10-18 Tahun', 300000.00, 0, 1, 2, '2025-10-25 05:47:44', '2025-10-25 05:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `running_texts`
--

CREATE TABLE `running_texts` (
  `id` bigint UNSIGNED NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `running_texts`
--

INSERT INTO `running_texts` (`id`, `text`, `link`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Pendaftaran Siswa Baru Tahun Ajaran 2024/2025 telah dibuka!', '/announcements', 1, 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43'),
(2, 'Program Beasiswa untuk Siswa Berprestasi - Hubungi Admin', '/contact', 2, 1, '2025-10-25 05:47:43', '2025-10-25 05:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `site_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_tagline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `primary_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#007bff',
  `secondary_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#6c757d',
  `accent_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#28a745',
  `header_bg_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#ffffff',
  `footer_bg_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#343a40',
  `body_bg_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#f8f9fa',
  `header_text_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  `footer_text_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#ffffff',
  `body_text_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#333333',
  `button_primary_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#007bff',
  `button_primary_hover` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#0056b3',
  `button_secondary_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#6c757d',
  `button_secondary_hover` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#545b62',
  `link_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#007bff',
  `link_hover_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#0056b3',
  `card_bg_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#ffffff',
  `card_border_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#dee2e6',
  `card_shadow_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  `admin_sidebar_bg` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#343a40',
  `admin_sidebar_text` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#ffffff',
  `admin_sidebar_hover` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#495057',
  `admin_header_bg` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#ffffff',
  `admin_header_text` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#333333',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `navbar_transparency` int NOT NULL DEFAULT '100' COMMENT 'Navbar transparency percentage (0-100)',
  `header_transparency` int NOT NULL DEFAULT '100' COMMENT 'Header transparency percentage (0-100)',
  `footer_transparency` int NOT NULL DEFAULT '100' COMMENT 'Footer transparency percentage (0-100)',
  `enable_blur_effect` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Enable blur effect for transparent elements',
  `card_button_bg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Card button background color',
  `card_button_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Card button text color',
  `card_button_border` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Card button border color',
  `card_button_hover_bg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Card button hover background color',
  `card_button_hover_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Card button hover text color',
  `card_button_hover_border` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Card button hover border color',
  `section_bg_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Section background color',
  `section_text_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Section text color',
  `button_text_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Button text color',
  `button_outline_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Button outline color',
  `link_text_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Link text color',
  `badge_bg_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Badge background color',
  `badge_text_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Badge text color',
  `footer_link_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_link_hover_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_border_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_social_bg_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_social_hover_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `site_tagline`, `site_description`, `logo`, `favicon`, `email`, `phone`, `address`, `facebook`, `instagram`, `youtube`, `twitter`, `linkedin`, `meta_title`, `meta_description`, `meta_keywords`, `primary_color`, `secondary_color`, `accent_color`, `header_bg_color`, `footer_bg_color`, `body_bg_color`, `header_text_color`, `footer_text_color`, `body_text_color`, `button_primary_color`, `button_primary_hover`, `button_secondary_color`, `button_secondary_hover`, `link_color`, `link_hover_color`, `card_bg_color`, `card_border_color`, `card_shadow_color`, `admin_sidebar_bg`, `admin_sidebar_text`, `admin_sidebar_hover`, `admin_header_bg`, `admin_header_text`, `created_at`, `updated_at`, `navbar_transparency`, `header_transparency`, `footer_transparency`, `enable_blur_effect`, `card_button_bg`, `card_button_text`, `card_button_border`, `card_button_hover_bg`, `card_button_hover_text`, `card_button_hover_border`, `section_bg_color`, `section_text_color`, `button_text_color`, `button_outline_color`, `link_text_color`, `badge_bg_color`, `badge_text_color`, `footer_link_color`, `footer_link_hover_color`, `footer_border_color`, `footer_social_bg_color`, `footer_social_hover_color`) VALUES
(1, 'YASMU', 'Membangun Generasi Berkarakter dan Berprestasi', 'Yayasan Mu\'allimin Mu\'allimat yang berkomitmen untuk memberikan pendidikan berkualitas dengan nilai-nilai Islam yang kuat.', 'logos/C7Cf50Qa1NSbJ7wh3Q8pQvRzjnWdBh5O9JJ2InGF.png', 'favicons/GhK9DO7MKYUALaRGwDzKNJ0ReUSEOURwIBVoizqR.png', 'yasmumanyar1@gmail.com', '031 3930001', 'Jl. Kyai Sahlan I No. 24 Manyarejo Manyar Gresik', 'https://facebook.com/yasmu', 'https://instagram.com/yasmu', 'https://youtube.com/yasmu', NULL, NULL, 'Yayasan Mu\'allimin Mu\'allimat YASMU- Membangun Generasi Berkarakter', 'Yayasan Mu\'allimin Mu\'allimat YASMU yang berkomitmen untuk memberikan pendidikan berkualitas dengan nilai-nilai Islam yang kuat.', 'yayasan, pendidikan, islam, yasmu, sekolah, madrasah, karakter, prestasi', '#068423', '#6c757d', '#20c997', '#ffffff', '#343a40', '#f8fff9', '#000000', '#ffffff', '#333333', '#a3c10b', '#71f901', '#6c757d', '#545b62', '#323433', '#0056b3', '#ffffff', '#dee2e6', '#000000', '#155724', '#ffffff', '#0d4f1c', '#ffffff', '#333333', '2025-10-25 05:47:43', '2026-01-21 17:56:14', 100, 100, 100, 0, '#a3c10b', '#ffffff', '#2b5601', '#e2e8ee', '#ffffff', '#84d61f', '#f8f9fa', '#333333', '#007bff', '#007bff', '#007bff', '#1f8703', '#ffffff', '#ffffff', '#007bff', '#333333', '#333333', '#007bff');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `button_text`, `button_link`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'YASMU Manyar Gresik', 'Membangun generasi yang berakhlak mulia dan berprestasi', 'sliders/19z8naBnQ0O26cuCLzKa4FTZAlfRGpaX56f05Xnw.jpg', 'Pelajari Lebih Lanjut', 'https://yasmumanyar.or.id/about', 1, 1, '2025-10-25 05:47:43', '2025-10-28 09:34:50'),
(2, 'Program Unggulan Tahfidz Al-Quran', 'Mencetak generasi penghafal Al-Quran yang berkualitas', 'sliders/j8n89yK6FRtYxNdSDXNyVgEUMQSMUShxy1ITQmnI.png', 'Daftar Sekarang', 'https://yasmumanyar.or.id/programs/program-tahfidz-al-quran', 2, 1, '2025-10-25 05:47:43', '2025-10-28 09:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `position`, `company`, `testimonial`, `photo`, `rating`, `is_featured`, `is_active`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Rizki', 'Orang Tua Siswa', 'Kelas 5 SD', 'Alhamdulillah, putra saya sangat senang belajar di Yayasan Pendidikan Islam. Metode pembelajaran yang menyenangkan dan guru yang sabar membuat anak saya semakin semangat belajar.', 'testimonials/ahmad-rizki.jpg', 5, 1, 1, 1, '2025-10-25 05:47:44', '2025-10-25 05:47:44'),
(2, 'Siti Nurhaliza', 'Alumni', 'Lulusan 2020', 'Berkat pendidikan di Yayasan Pendidikan Islam, saya bisa melanjutkan studi ke perguruan tinggi negeri. Fondasi agama dan akademik yang kuat sangat membantu saya.', 'testimonials/siti-nurhaliza.jpg', 5, 1, 1, 2, '2025-10-25 05:47:44', '2025-10-25 05:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@webdomain.com', '2025-10-25 05:47:43', '$2y$12$pQWF4/gpRM8inHaLN3zt5.MYPBsiRuVSi2tGxZVvm73CMVegd6ePa', NULL, '2025-10-25 05:47:43', '2026-01-21 18:12:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  ADD KEY `comments_commentable_id_commentable_type_index` (`commentable_id`,`commentable_type`),
  ADD KEY `comments_is_approved_index` (`is_approved`),
  ADD KEY `comments_created_at_index` (`created_at`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downloads_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `galleries_slug_unique` (`slug`),
  ADD KEY `galleries_category_id_foreign` (`category_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_likeable_type_likeable_id_index` (`likeable_type`,`likeable_id`),
  ADD KEY `likes_likeable_id_likeable_type_index` (`likeable_id`,`likeable_type`),
  ADD KEY `likes_user_ip_index` (`user_ip`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programs_slug_unique` (`slug`);

--
-- Indexes for table `running_texts`
--
ALTER TABLE `running_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `running_texts`
--
ALTER TABLE `running_texts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
