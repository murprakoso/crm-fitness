-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 05:44 PM
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
(1, 'pria', 'P-Standar', '40000', '2022-07-10 14:29:48', '2022-07-10 14:29:48'),
(2, 'pria', 'P-Spesial', '50000', '2022-07-10 14:30:00', '2022-07-10 14:30:00'),
(3, 'wanita', 'W-Standar', '35000', '2022-07-10 14:30:11', '2022-07-10 14:30:11'),
(4, 'wanita', 'W-Spesial', '45000', '2022-07-10 14:30:34', '2022-07-10 14:30:43');

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
  `status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `tipe_member` enum('harian','tetap') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_member` enum('cardio','gym') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masa_tenggang` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `nama`, `alamat`, `gender`, `no_hp`, `foto`, `job`, `status`, `tipe_member`, `jenis_member`, `masa_tenggang`, `created_at`, `updated_at`) VALUES
(1, 'Prasetyo Mandala', 'Jln. Sukabumi No. 899, Administrasi Jakarta Selatan 37640, Bengkulu', 'wanita', '6289524432340', NULL, 'Mahasiswa', '1', 'tetap', 'gym', '2022-08-10', '2022-07-10 14:27:59', '2022-07-14 13:06:30'),
(2, 'Ika Kani Hariyah S.Pd', 'Gg. Baja No. 113, Pekanbaru 88883, Gorontalo', 'wanita', '6289524432340', NULL, 'Mahasiswa', '3', 'tetap', 'gym', '2022-07-10', '2022-07-10 14:27:59', '2022-07-10 14:55:53'),
(3, 'Halim Saptono', 'Jln. Wahidin Sudirohusodo No. 857, Bekasi 55125, DIY', 'pria', '6289524432340', NULL, 'Wiraswasta', '3', 'harian', 'cardio', '2022-07-14', '2022-07-10 14:27:59', '2022-07-14 13:23:09'),
(4, 'Gilang Lutfan Simbolon S.T.', 'Dk. Sadang Serang No. 64, Blitar 46422, Riau', 'pria', '6289524432340', NULL, 'Mahasiswa', '1', 'tetap', 'gym', '2022-08-01', '2022-07-10 14:27:59', '2022-07-10 14:56:22'),
(5, 'Rendy Kasiran Mandala', 'Psr. Supomo No. 276, Banjarmasin 59319, Kaltim', 'wanita', '6289524432340', NULL, 'Wiraswasta', '2', NULL, NULL, NULL, '2022-07-10 14:27:59', '2022-07-10 14:27:59'),
(6, 'Digdaya Bagiya Saefullah', 'Gg. Uluwatu No. 156, Lubuklinggau 88087, Sultra', 'wanita', '6289524432340', NULL, 'Wiraswasta', '2', NULL, NULL, NULL, '2022-07-10 14:27:59', '2022-07-10 14:27:59'),
(7, 'Jamil Suwarno', 'Jr. Dewi Sartika No. 253, Probolinggo 10324, Sulut', 'pria', '6289524432340', NULL, 'Wiraswasta', '2', NULL, NULL, NULL, '2022-07-10 14:27:59', '2022-07-10 14:27:59'),
(8, 'Laila Winarsih M.Kom.', 'Jr. Jambu No. 596, Parepare 40965, Jateng', 'wanita', '6289524432340', NULL, 'ASN', '1', 'tetap', 'cardio', '2022-08-01', '2022-07-10 14:27:59', '2022-07-10 14:46:04'),
(9, 'Indah Irma Laksita', 'Ds. Padma No. 667, Pasuruan 68461, Sulut', 'wanita', '6289524432340', NULL, 'Wiraswasta', '1', 'tetap', 'gym', '2022-08-06', '2022-07-10 14:27:59', '2022-07-10 14:45:01');

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
(5, '2022_06_02_070826_create_members_table', 1),
(6, '2022_06_04_082537_create_harga_table', 1),
(7, '2022_06_08_092835_create_pesans_table', 1),
(8, '2022_06_08_112421_add_phone_to_users', 1),
(9, '2022_07_09_042437_create_transaksis_table', 1),
(10, '2022_07_10_163441_add_status_to_members', 1),
(13, '2022_07_14_205041_create_presensis_table', 2);

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

--
-- Dumping data for table `pesans`
--

INSERT INTO `pesans` (`id`, `keterangan`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'Pengingat', 'Ada sedang berada dalam masa tenggang', '2022-07-10 14:26:09', '2022-07-10 14:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `presensis`
--

CREATE TABLE `presensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presensis`
--

INSERT INTO `presensis` (`id`, `member_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 1, 'Hadir', '2022-07-14 15:37:19', '2022-07-14 15:37:19'),
(4, 3, 'Hadir', '2022-07-14 15:37:23', '2022-07-14 15:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `harga` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe_member` enum('harian','tetap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_member` enum('cardio','gym') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `masa_tenggang` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `member_id`, `harga`, `tipe_member`, `jenis_member`, `tanggal_daftar`, `masa_tenggang`, `created_at`, `updated_at`) VALUES
(1, 9, '35000', 'harian', 'cardio', '2022-07-10', '2022-07-10', '2022-07-10 14:41:13', '2022-07-10 14:41:13'),
(3, 9, '50000', 'harian', 'gym', '2022-07-06', '2022-08-06', '2022-07-10 14:45:01', '2022-07-10 14:45:01'),
(4, 8, '50000', 'harian', 'cardio', '2022-07-01', '2022-08-01', '2022-07-10 14:46:04', '2022-07-10 14:46:04'),
(5, 4, '50000', 'harian', 'gym', '2022-06-10', '2022-07-10', '2022-07-10 14:47:41', '2022-07-10 14:47:41'),
(6, 2, '50000', 'harian', 'gym', '2022-06-10', '2022-07-10', '2022-07-10 14:53:59', '2022-07-10 14:53:59'),
(7, 4, '40000', 'harian', 'gym', '2022-07-01', '2022-08-01', '2022-07-10 14:56:22', '2022-07-10 14:56:22'),
(8, 1, '50000', 'harian', 'gym', '2022-07-10', '2022-08-10', '2022-07-10 15:02:08', '2022-07-14 13:06:30');

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
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@test.com', NULL, '$2y$10$8xxfr.HC9gxSdlRDWqxBFuDzh1p1/AWRdaCAXZ22gow6sj7x11dVO', NULL, NULL, NULL, NULL);

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
-- Indexes for table `presensis`
--
ALTER TABLE `presensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presensis_member_id_foreign` (`member_id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_member_id_foreign` (`member_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `presensis`
--
ALTER TABLE `presensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `presensis`
--
ALTER TABLE `presensis`
  ADD CONSTRAINT `presensis_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
