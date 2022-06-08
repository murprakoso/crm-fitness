-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 11:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender` enum('pria','wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id`, `gender`, `keterangan`, `harga`, `created_at`, `updated_at`) VALUES
(3, 'pria', 'L-Standar #23', '42000', '2022-06-07 07:33:54', '2022-06-07 08:08:41'),
(4, 'pria', 'L-Spesial', '45000', '2022-06-07 07:34:31', '2022-06-07 07:34:31'),
(5, 'wanita', 'W-Standar', '40000', '2022-06-07 07:35:38', '2022-06-07 07:35:38'),
(6, 'pria', 'L-Spesial', '45000', '2022-06-07 08:11:24', '2022-06-07 08:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('pria','wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe_member` enum('harian','tetap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_member` enum('cardio','gym') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `masa_tenggang` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `nama`, `alamat`, `gender`, `no_hp`, `foto`, `job`, `harga`, `tipe_member`, `jenis_member`, `tanggal_daftar`, `masa_tenggang`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Callie Brekke', '14067 Eda Summit Apt. 309\nGerdashire, CA 81144', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-15', '2022-06-08 01:55:10', '2022-06-08 01:55:10'),
(2, 'Norberto Watsica', '1657 Dorian Cape\nEast Wilburnville, WI 65935', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-09', '2022-06-08 01:55:10', '2022-06-08 01:55:10'),
(3, 'Shany Sanford II', '2692 William Ports Suite 056\nMcKenzieton, LA 69676', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-09', '2022-06-08 01:55:10', '2022-06-08 01:55:10'),
(4, 'Margarette Rodriguez', '274 Beatty Radial\nLake Ernestineland, DE 64458', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-09', '2022-06-08 01:55:10', '2022-06-08 01:55:10'),
(5, 'Blaise Rowe', '866 Brittany Islands\nLillianamouth, SD 38952', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'cardio', '2022-05-12', '2022-06-09', '2022-06-08 01:55:10', '2022-06-08 01:55:10'),
(6, 'Maritza Fritsch', '878 Mittie River\nLake Hildashire, ND 15312', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'gym', '2022-05-12', '2022-06-09', '2022-06-08 01:55:10', '2022-06-08 01:55:10'),
(7, 'Mr. Toy Bayer PhD', '2847 Denesik Harbors\nEast Loycebury, NC 92198-0441', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-09', '2022-06-08 01:55:10', '2022-06-08 01:55:10'),
(8, 'Peter Lubowitz', '36135 Gerhold Expressway Suite 369\nNew Kayleeport, ME 05789', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'cardio', '2022-05-12', '2022-06-09', '2022-06-08 01:55:10', '2022-06-08 01:55:10'),
(9, 'Deonte VonRueden', '40310 Morton Junction Suite 379\nAdolfotown, OR 85380-0283', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-09', '2022-06-08 01:55:10', '2022-06-08 01:55:10'),
(10, 'Maxie Williamson', '6509 Moen Street\nPort Estellaville, SD 54497', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'gym', '2022-05-12', '2022-06-09', '2022-06-08 01:55:10', '2022-06-08 01:55:10'),
(11, 'Ms. Andreanne Bosco', '1283 Catharine Freeway\nTanyaland, PA 67871-6449', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 01:56:07', '2022-06-08 01:56:07'),
(12, 'Kaycee Becker', '2721 Thompson Bypass\nNew Dixie, AL 66931-9619', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 01:56:07', '2022-06-08 01:56:07'),
(13, 'Elta Schulist', '763 Lynch Square\nEast Jamar, AZ 51718-4722', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 01:56:07', '2022-06-08 01:56:07'),
(14, 'Mr. Braden Kreiger PhD', '240 Karli Highway Suite 737\nLefflermouth, OK 50415', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 01:56:08', '2022-06-08 01:56:08'),
(15, 'Princess Leuschke DDS', '3001 Marlene Extensions Apt. 660\nTravonmouth, SC 81499', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 01:56:08', '2022-06-08 01:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_06_04_082537_create_harga_table', 2),
(8, '2022_06_02_070826_create_members_table', 3),
(9, '2022_06_08_064719_add_masa_tenggang_to_members', 4),
(10, '2022_06_08_092835_create_pesans_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesans`
--

CREATE TABLE `pesans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@test.com', NULL, '$2y$10$LQ5N6JLTK1O04VV.TM3jh.f/8MQ36h6HdO02nXb3LN2gBKKb1iqFC', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesans`
--
ALTER TABLE `pesans`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
