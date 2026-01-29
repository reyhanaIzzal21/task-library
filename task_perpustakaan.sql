-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2026 pada 01.26
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` char(36) NOT NULL,
  `category_id` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `stock` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `available_stock` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `category_id`, `title`, `slug`, `author`, `publisher`, `year`, `isbn`, `description`, `cover_image`, `stock`, `available_stock`, `created_at`, `updated_at`) VALUES
('019bb06a-77cc-71d1-b5ee-329675fdb8c3', '019bb06a-7745-7318-9d75-49724676d246', 'Laskar Pelangi', 'laskar-pelangi', 'Andrea Hirata', 'Bentang Pustaka', '2005', '9789793062792', 'Novel tentang perjuangan anak-anak di Belitung untuk mendapatkan pendidikan yang layak.', 'covers/4mklIx4FXacjBJXsVHxoKBF2h8Ldtccdqx0s9Pn8.jpg', 5, 5, '2026-01-11 21:15:26', '2026-01-11 22:43:17'),
('019bb06a-77cf-7149-a6ac-85af4b4489c3', '019bb06a-7745-7318-9d75-49724676d246', 'Bumi Manusia', 'bumi-manusia', 'Pramoedya Ananta Toer', 'Hasta Mitra', '1980', '9789799731234', 'Novel pertama dari Tetralogi Buru yang mengisahkan perjuangan Minke melawan kolonialisme.', NULL, 3, 3, '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77d3-72c8-aee4-4770ea8ea015', '019bb06a-7745-7318-9d75-49724676d246', 'Ronggeng Dukuh Paruk', 'ronggeng-dukuh-paruk', 'Ahmad Tohari', 'Gramedia Pustaka Utama', '1982', '9789792234567', 'Novel yang mengisahkan kehidupan Srintil sebagai ronggeng di sebuah desa terpencil.', NULL, 4, 4, '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77d7-7168-932e-4b4cefa6660e', '019bb06a-77b1-707e-863c-2daff500bd64', 'Sapiens: A Brief History of Humankind', 'sapiens-a-brief-history-of-humankind', 'Yuval Noah Harari', 'Harper', '2014', '9780062316097', 'Buku yang membahas sejarah manusia dari zaman batu hingga era modern.', NULL, 3, 3, '2026-01-11 21:15:26', '2026-01-11 21:50:49'),
('019bb06a-77da-7393-a2cc-109a258fc521', '019bb06a-77b1-707e-863c-2daff500bd64', 'Atomic Habits', 'atomic-habits', 'James Clear', 'Avery', '2018', '9780735211292', 'Panduan praktis untuk membangun kebiasaan baik dan menghilangkan kebiasaan buruk.', NULL, 6, 6, '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77dd-7350-acf8-2707958060e5', '019bb06a-77b4-7069-b09a-467937a54744', 'A Brief History of Time', 'a-brief-history-of-time', 'Stephen Hawking', 'Bantam Books', '1988', '9780553380163', 'Penjelasan tentang kosmologi, lubang hitam, dan asal-usul alam semesta.', NULL, 1, 0, '2026-01-11 21:15:26', '2026-01-11 21:50:48'),
('019bb06a-77df-70b0-9fbe-b3b293c114d3', '019bb06a-77b4-7069-b09a-467937a54744', 'Cosmos', 'cosmos', 'Carl Sagan', 'Random House', '1980', '9780345331359', 'Eksplorasi mendalam tentang alam semesta dan tempat manusia di dalamnya.', NULL, 3, 3, '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77e2-7395-b569-00a5f4f4fac4', '019bb06a-77ba-70da-91a7-83317c0222b9', 'Sejarah Indonesia Modern 1200-2008', 'sejarah-indonesia-modern-1200-2008', 'M.C. Ricklefs', 'Serambi', '2008', '9789791600132', 'Buku lengkap tentang sejarah Indonesia dari masa kerajaan hingga era reformasi.', NULL, 4, 4, '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77e5-7139-8eb4-1bf3052a126b', '019bb06a-77bc-709f-b5cb-828a1a66bd7d', 'Steve Jobs', 'steve-jobs', 'Walter Isaacson', 'Simon & Schuster', '2011', '9781451648539', 'Biografi resmi pendiri Apple yang penuh inspirasi dan kontroversi.', NULL, 3, 3, '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77e7-700b-904a-35d6c3d3faa9', '019bb06a-77bf-705b-bf3b-04a3c8096ab0', 'Matematika Dasar untuk Perguruan Tinggi', 'matematika-dasar-untuk-perguruan-tinggi', 'Tim Penulis', 'Erlangga', '2020', '9786024847890', 'Buku panduan matematika dasar untuk mahasiswa semester awal.', NULL, 10, 10, '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77ea-72fb-9fe5-ccb9e03a0115', '019bb06a-77c1-71da-8290-094f6b15c021', 'Tafsirul Quran', 'tafsirul-quran', 'Quraish Shihab', 'Lentera Hati', '2002', '9789793123450', 'Tafsir Al-Quran yang mudah dipahami untuk pembaca modern.', NULL, 5, 5, '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77ec-7042-8b5d-0925c0029623', '019bb06a-77c3-71c1-8116-d3263a0f5d08', 'One Piece Vol. 1', 'one-piece-vol-1', 'Eiichiro Oda', 'Elex Media Komputindo', '1997', '9784088725093', 'Petualangan Monkey D. Luffy untuk menjadi Raja Bajak Laut.', NULL, 8, 8, '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb086-51a1-7041-8701-fa70dac1c648', '019bb06a-77bf-705b-bf3b-04a3c8096ab0', 'the intelligent investor', 'the-intelligent-investor-pJS2D', 'Beljamin Graham', 'Gramedia', '1949', '983757357367847', 'Pertama kali terbit tahun 1949, berfokus pada investasi nilai dan margin of safety.', 'covers/lyR4yjjj6HhrUX6WxCGoI6XMMoekKkqzY38e8AXE.png', 100, 99, '2026-01-11 21:45:51', '2026-01-28 17:16:35'),
('019bb5ac-0a4b-709a-bc91-b6c8c56f0e86', '019bb06a-7745-7318-9d75-49724676d246', 'buku 2', 'buku-2-iF651', 'rama', 'gramedia', '2000', '9247284742', 'lorem insum', 'covers/lWsHwLod6g80wzwgmp8ObXymLxlNrvMKe4bnv72n.png', 100, 100, '2026-01-12 21:45:09', '2026-01-12 21:46:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `borrowings`
--

CREATE TABLE `borrowings` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `borrow_date` date NOT NULL,
  `due_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `status` enum('pending','approved','rejected','borrowed','returned') NOT NULL DEFAULT 'pending',
  `admin_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `borrowings`
--

INSERT INTO `borrowings` (`id`, `user_id`, `book_id`, `name`, `email`, `phone`, `address`, `borrow_date`, `due_date`, `return_date`, `status`, `admin_notes`, `created_at`, `updated_at`) VALUES
('019bb083-6ea1-7245-b93b-e4cc6255a793', 2, '019bb06a-77d7-7168-932e-4b4cefa6660e', 'User Perpustakaan', 'user@perpustakaan.com', '088934762344', 'Babilonia', '2026-01-12', '2026-01-19', '2026-01-12', 'returned', NULL, '2026-01-11 21:42:42', '2026-01-11 21:50:49'),
('019bb08a-2333-711c-ab99-aa92a3928e25', 2, '019bb06a-77dd-7350-acf8-2707958060e5', 'audrey', 'audrey@gmail.com', '924834', 'Ponorogo', '2026-01-12', '2026-01-19', NULL, 'borrowed', NULL, '2026-01-11 21:50:01', '2026-01-11 21:50:48'),
('019bb0e2-b348-718b-af01-55dda56849b8', 2, '019bb086-51a1-7041-8701-fa70dac1c648', 'User Perpustakaan', 'user@perpustakaan.com', '09889898784', 'ponorogo', '2026-01-12', '2026-01-19', NULL, 'pending', NULL, '2026-01-11 23:26:45', '2026-01-11 23:26:45'),
('019c071a-e821-7208-bc98-e5dc02860e21', 6, '019bb086-51a1-7041-8701-fa70dac1c648', 'Shelley Conley', 'qaradigag@mailinator.com', '0889082383', 'Ponorogo', '2026-01-29', '2026-02-20', NULL, 'borrowed', NULL, '2026-01-28 17:15:29', '2026-01-28 17:16:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-095b89b57eefcc8477463a318ffa913a', 'i:2;', 1769646058),
('laravel-cache-095b89b57eefcc8477463a318ffa913a:timer', 'i:1769646058;', 1769646058),
('laravel-cache-0b5ed025495008a307f6b06dd1e4cce2', 'i:1;', 1768199151),
('laravel-cache-0b5ed025495008a307f6b06dd1e4cce2:timer', 'i:1768199151;', 1768199151),
('laravel-cache-0c827637ba77c621d0421ac8086dc66f', 'i:1;', 1769646119),
('laravel-cache-0c827637ba77c621d0421ac8086dc66f:timer', 'i:1769646119;', 1769646119),
('laravel-cache-46ef73c52b73e4ac440708874bd2ff64', 'i:1;', 1768279534),
('laravel-cache-46ef73c52b73e4ac440708874bd2ff64:timer', 'i:1768279534;', 1768279534),
('laravel-cache-c525a5357e97fef8d3db25841c86da1a', 'i:1;', 1769645834),
('laravel-cache-c525a5357e97fef8d3db25841c86da1a:timer', 'i:1769645834;', 1769645834),
('laravel-cache-user@gmail.com|127.0.0.1', 'i:1;', 1768199151),
('laravel-cache-user@gmail.com|127.0.0.1:timer', 'i:1768199151;', 1768199151);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
('019bb06a-7745-7318-9d75-49724676d246', 'Fiksi', 'fiksi', 'Novel, cerpen, dan karya fiksi lainnya', '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77b1-707e-863c-2daff500bd64', 'Non-Fiksi', 'non-fiksi', 'Buku berdasarkan fakta dan pengetahuan', '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77b4-7069-b09a-467937a54744', 'Sains', 'sains', 'Buku tentang ilmu pengetahuan dan teknologi', '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77ba-70da-91a7-83317c0222b9', 'Sejarah', 'sejarah', 'Buku tentang sejarah dunia dan Indonesia', '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77bc-709f-b5cb-828a1a66bd7d', 'Biografi', 'biografi', 'Kisah hidup tokoh-tokoh terkenal', '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77bf-705b-bf3b-04a3c8096ab0', 'Pendidikan', 'pendidikan', 'Buku pelajaran dan referensi akademik', '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77c1-71da-8290-094f6b15c021', 'Agama', 'agama', 'Buku tentang agama dan spiritualitas', '2026-01-11 21:15:26', '2026-01-11 21:15:26'),
('019bb06a-77c3-71c1-8116-d3263a0f5d08', 'Komik & Manga', 'komik-manga', 'Komik dan manga dari berbagai negara', '2026-01-11 21:15:26', '2026-01-11 21:15:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `book_id`, `created_at`, `updated_at`) VALUES
(1, 2, '019bb06a-77d7-7168-932e-4b4cefa6660e', '2026-01-11 21:42:08', '2026-01-11 21:42:08'),
(3, 2, '019bb086-51a1-7041-8701-fa70dac1c648', '2026-01-11 22:00:25', '2026-01-11 22:00:25'),
(4, 6, '019bb086-51a1-7041-8701-fa70dac1c648', '2026-01-28 17:15:53', '2026-01-28 17:15:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_02_075243_add_two_factor_columns_to_users_table', 1),
(5, '2026_01_12_023005_create_permission_tables', 1),
(6, '2026_01_12_040000_create_categories_table', 1),
(7, '2026_01_12_040001_create_books_table', 1),
(8, '2026_01_12_040002_create_borrowings_table', 1),
(9, '2026_01_12_040003_create_favorites_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2026-01-11 21:15:23', '2026-01-11 21:15:23'),
(2, 'user', 'web', '2026-01-11 21:15:23', '2026-01-11 21:15:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('a6GzApOi8hJNIIOnpAmWaDACPZ01OuI5B6FwwSx5', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS2RyY1E0U1NHTUpEdDVzalRhczFQdUZoWno3SE5uUzFXaHA1Mk5YaiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9hZG1pbi9tZW1iZXJzIjtzOjU6InJvdXRlIjtzOjE5OiJhZG1pbi5tZW1iZXJzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1769645975),
('fjZYrtdH1J9iexJx7zfzjw3gPO8t5OW0xM5FtuIC', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicVJTRTAxTmpRRnJIVElJallYQWlla1VScGplVXlaeVBIS08xM29GWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS91c2VyL2Rhc2hib2FyZCI7czo1OiJyb3V0ZSI7czoxNDoidXNlci5kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1769646060);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@perpustakaan.com', NULL, '$2y$12$U4l0PENK/pCfSzJIReEwD.k7MjOa59SCau8VY7e1AD31pdFjA5fcq', NULL, NULL, NULL, NULL, '2026-01-11 21:15:23', '2026-01-11 21:15:23'),
(2, 'User Perpustakaan', 'user@perpustakaan.com', NULL, '$2y$12$43vw7K4bklJ88hjiD0e04uonu9Prs7tA7k7g9lZ2UMYS5mL9ub21q', NULL, NULL, NULL, NULL, '2026-01-11 21:15:24', '2026-01-11 21:15:24'),
(3, 'admin', 'admin@gmail.com', NULL, '$2y$12$wgvYySrgJ.S9R535Rn93Mu9JOeKp1Z/RVGgQAkRmpQIo9ZA.Sm2Fa', NULL, NULL, NULL, NULL, '2026-01-11 21:26:38', '2026-01-11 21:26:38'),
(4, 'user2', 'user2@gmail.com', NULL, '$2y$12$ubfudSI6bJfnjwL6v/ZCiu.p9UTjPN7VMpUgxypCfxoZG3kJtePOe', NULL, NULL, NULL, NULL, '2026-01-12 21:42:23', '2026-01-12 21:42:23'),
(5, 'user4', 'user4@gmail.com', NULL, '$2y$12$TAn2Ouw9KXJAP590zUy1fe0ATPp0xn86I9BzjWirfjygCSmqtwogO', NULL, NULL, NULL, NULL, '2026-01-12 21:44:02', '2026-01-12 21:44:02'),
(6, 'Shelley Conley', 'qaradigag@mailinator.com', NULL, '$2y$12$RJwBNN157QTIs1I2ZbKpgeqMDaAlHSeUAULtoQd0gPqpZLBXrFN86', NULL, NULL, NULL, NULL, '2026-01-28 17:14:35', '2026-01-28 17:14:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_slug_unique` (`slug`),
  ADD UNIQUE KEY `books_isbn_unique` (`isbn`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `borrowings`
--
ALTER TABLE `borrowings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowings_user_id_foreign` (`user_id`),
  ADD KEY `borrowings_book_id_foreign` (`book_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favorites_user_id_book_id_unique` (`user_id`,`book_id`),
  ADD KEY `favorites_book_id_foreign` (`book_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `borrowings`
--
ALTER TABLE `borrowings`
  ADD CONSTRAINT `borrowings_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrowings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
