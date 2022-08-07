-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2022 at 12:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
(1, 'pria', 'Harian GYM', '45000', NULL, NULL),
(2, 'pria', 'Member GYM', '275000', NULL, NULL),
(3, 'wanita', 'Harian GYM', '40000', NULL, NULL),
(4, 'wanita', 'Member GYM', '150000', NULL, NULL),
(5, 'pria', 'Harian CARDIO', '55000', NULL, NULL),
(6, 'pria', 'Member CARDIO', '375000', NULL, NULL),
(7, 'wanita', 'Harian CARDIO', '50000', NULL, NULL),
(8, 'wanita', 'Member CARDIO', '250000', NULL, NULL);

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
(5, 'HERMANSYAH', 'JL UJUNG PANDANG', 'pria', '6289524432340', NULL, 'DOSEN', '2', NULL, NULL, '1970-01-01', '2022-05-29 19:52:06', '2022-07-29 19:58:52'),
(6, 'ARI JIDAN', 'CAHAYA PAL', 'pria', '6285956132151', NULL, 'TRAINER', '2', 'tetap', 'gym', '2022-07-24', '2022-05-29 19:52:06', '2022-07-29 19:07:38'),
(7, 'AGGRA', 'JL AMPERA', 'wanita', '6289514793069', NULL, 'TRAINER', '1', 'tetap', 'gym', '2022-08-21', '2022-07-29 19:52:06', '2022-07-24 09:06:13'),
(8, 'ALYA', 'JL UJUNG PANDANG', 'wanita', '62895600008059', NULL, 'ADMIN ALFA', '2', 'tetap', 'gym', '2022-07-24', '2022-07-29 19:52:06', '2022-07-29 19:07:38'),
(9, 'Eko Murdianto Prakoso', 'Pontianak', 'pria', '6289524432340', NULL, 'Mahasiswa', '2', NULL, NULL, '1970-01-01', '2022-06-29 19:52:06', '2022-07-29 20:50:48'),
(10, 'Paman Yoko', 'Pontianak', 'pria', '6281257466118', NULL, 'PNS', '2', NULL, NULL, '1970-01-01', '2022-07-29 20:55:41', '2022-07-30 06:59:15'),
(11, 'Bang Patel', 'Pontianak', 'pria', '628952443234000', NULL, 'Mahasiswa', '2', NULL, NULL, '1970-01-01', '2022-07-30 08:01:59', '2022-08-05 10:43:25'),
(12, 'Wulan Gunarto', 'Dk. Teuku Umar No. 360, Bogor 16675, NTB', 'pria', '6289524432340', NULL, 'Mahasiswa', '2', NULL, NULL, NULL, '2023-03-06 17:52:06', '2022-08-05 18:32:19'),
(13, 'Jaya Hakim', 'Ki. Baja Raya No. 623, Balikpapan 62927, Aceh', 'wanita', '6289524432340', NULL, 'Wiraswasta', '2', NULL, NULL, NULL, '2022-08-01 07:52:06', '2022-08-05 18:32:19'),
(14, 'Mursinin Santoso', 'Jln. Bakin No. 231, Pekanbaru 98378, Sulteng', 'pria', '6289524432340', NULL, 'Mahasiswa', '2', NULL, NULL, NULL, '2022-10-05 16:52:06', '2022-08-05 18:32:19'),
(15, 'Uchita Pertiwi', 'Ki. Imam No. 97, Ambon 14014, DIY', 'wanita', '6289524432340', NULL, 'Wiraswasta', '2', NULL, NULL, NULL, '2022-12-04 05:52:06', '2022-08-05 18:32:19'),
(16, 'Kanda Jailani', 'Psr. Cut Nyak Dien No. 728, Administrasi Jakarta Timur 27207, DIY', 'pria', '6289524432340', NULL, 'Mahasiswa', '2', NULL, NULL, NULL, '2022-08-04 14:52:06', '2022-08-05 18:32:19'),
(17, 'Kiandra Wijaya', 'Ds. Jakarta No. 18, Pasuruan 78626, Jatim', 'wanita', '6289524432340', NULL, 'Mahasiswa', '2', NULL, NULL, NULL, '2023-02-02 13:52:06', '2022-08-05 18:32:19'),
(18, 'Yuni Nuraini', 'Ki. Bagonwoto  No. 46, Gunungsitoli 59500, Sumsel', 'wanita', '6289524432340', NULL, 'Mahasiswa', '2', NULL, NULL, NULL, '2022-12-04 01:52:06', '2022-08-05 18:32:19'),
(19, 'Zahra Mansur', 'Psr. Suharso No. 714, Depok 46213, Jatim', 'wanita', '6289524432340', NULL, 'IRT', '2', NULL, NULL, NULL, '2022-08-03 09:52:06', '2022-08-05 18:32:19'),
(20, 'Umi Wijaya', 'Ki. Bawal No. 239, Kediri 60980, Kalbar', 'pria', '6289524432340', NULL, 'Wiraswasta', '2', NULL, NULL, NULL, '2022-10-31 11:52:06', '2022-08-05 18:32:19'),
(21, 'Cahyadi Suryatmi', 'Kpg. Bakit  No. 948, Ambon 46332, Malut', 'pria', '6289524432340', NULL, 'Mahasiswa', '2', NULL, NULL, NULL, '2023-03-03 18:52:06', '2022-08-05 18:32:19'),
(22, 'Diah Simanjuntak', 'Jr. Yogyakarta No. 582, Administrasi Jakarta Timur 92380, Jatim', 'wanita', '6289524432340', NULL, 'Mahasiswa', '2', NULL, NULL, NULL, '2022-08-05 13:52:06', '2022-08-05 18:32:19'),
(23, 'Elisa Kusumo', 'Ds. Kiaracondong No. 700, Banjar 84278, Bengkulu', 'wanita', '6289524432340', NULL, 'IRT', '2', NULL, NULL, NULL, '2023-01-05 17:52:06', '2022-08-05 18:32:19'),
(24, 'Jefri Setiawan', 'Dk. Bakit  No. 182, Tidore Kepulauan 74115, DIY', 'pria', '6289524432340', NULL, 'IRT', '2', NULL, NULL, NULL, '2022-10-02 00:52:06', '2022-08-05 18:32:19'),
(25, 'Raditya Kusumo', 'Dk. Salatiga No. 306, Gorontalo 15542, Sulut', 'wanita', '6289524432340', NULL, 'Mahasiswa', '2', NULL, NULL, NULL, '2022-08-30 22:52:06', '2022-08-05 18:32:19'),
(26, 'Jessica Setiawan', 'Ds. Gading No. 547, Ternate 26416, NTB', 'wanita', '6289524432340', NULL, 'Mahasiswa', '2', NULL, NULL, NULL, '2023-03-05 14:52:06', '2022-08-05 18:32:19'),
(27, 'Nadia Anggriawan', 'Dk. Adisucipto No. 472, Cimahi 57521, Jateng', 'wanita', '6289524432340', NULL, 'IRT', '2', NULL, NULL, NULL, '2022-11-04 08:52:06', '2022-08-05 18:32:19'),
(28, 'Nilam Kuswoyo', 'Gg. Babah No. 182, Kediri 48471, Jatim', 'wanita', '6289524432340', NULL, 'Wiraswasta', '2', NULL, NULL, NULL, '2022-07-01 13:52:06', '2022-08-05 18:32:19'),
(29, 'Suci Wahyuni', 'Dk. Agus Salim No. 30, Madiun 51691, Banten', 'wanita', '6289524432340', NULL, 'Wiraswasta', '2', NULL, NULL, NULL, '2022-10-01 05:52:06', '2022-08-05 18:32:19'),
(30, 'Olivia Pradipta', 'Psr. Jend. A. Yani No. 476, Mojokerto 11297, Banten', 'wanita', '6289524432340', NULL, 'Wiraswasta', '2', NULL, NULL, NULL, '2022-07-04 22:52:06', '2022-08-05 18:32:19'),
(31, 'Titin Nuraini', 'Kpg. Abdul Rahmat No. 712, Pekanbaru 65772, DKI', 'wanita', '6289524432340', NULL, 'Wiraswasta', '2', NULL, NULL, NULL, '2022-12-01 17:52:06', '2022-08-05 18:32:19'),
(32, 'Okto Saragih', 'Kpg. Dr. Junjunan No. 544, Kediri 96563, Kaltara', 'pria', '6289524432340', NULL, 'Mahasiswa', '2', NULL, NULL, NULL, '2022-11-05 11:52:06', '2022-08-05 18:32:19'),
(33, 'Galang Kusmawati', 'Ds. B.Agam 1 No. 297, Makassar 14762, Sumut', 'pria', '6289524432340', NULL, 'Wiraswasta', '2', NULL, NULL, NULL, '2022-07-31 05:52:06', '2022-08-05 18:32:19');

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
(11, '2022_07_14_205041_create_presensis_table', 1),
(12, '2022_08_05_224039_add_status_to_pesans', 2),
(14, '2022_08_07_123902_update_table_pesans', 3);

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
  `ke` enum('status','gender','job') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','2','3') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('pria','wanita') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesans`
--

INSERT INTO `pesans` (`id`, `keterangan`, `pesan`, `ke`, `status`, `gender`, `job`, `created_at`, `updated_at`) VALUES
(1, 'Pengingat Jatuh Tempo', '*Halo pelanggan setia kami*... salam sehat :) \\r\\n Kami ingin memberitahukan bahwa masa aktif member anda akan segera berakhir, silahkan lakukan perpanjangan dan abaikan pesan jika sudah melakukan pembayaran. trimakasih :)', NULL, '1', NULL, NULL, NULL, '2022-08-05 16:39:03'),
(2, 'informasi promo 17 agustus', 'Merdeka !!! untuk memperingati hari kemerdekaan Republik Indonesia AMgym mengadakan promo bagi member yang tanggal lahirnya pada hari kemerdekaan yaitu 17 Agustus dengan potongan harga member sebesar 50% !!! buruan daftar slot terbatass', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Member Mahasiswa', 'Test kirim wa ke member tidak aktif', 'status', '2', NULL, NULL, '2022-08-05 15:50:33', '2022-08-07 09:59:10'),
(5, 'Member Dalam Masa Tenggang', 'Test kirim wa ke member masa tenggang', 'status', '3', NULL, NULL, '2022-08-05 16:01:28', '2022-08-07 09:33:00'),
(8, 'Promo untuk pria', 'Promo khuusus', 'gender', NULL, 'pria', NULL, '2022-08-07 09:33:28', '2022-08-07 09:42:12');

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
(10, 6, '275000', 'tetap', 'gym', '2022-06-24', '2022-07-24', '2022-07-24 08:51:44', '2022-07-24 08:51:44'),
(11, 7, '275000', 'tetap', 'gym', '2022-07-21', '2022-08-21', '2022-07-24 09:06:13', '2022-07-24 09:06:13'),
(12, 8, '275000', 'tetap', 'gym', '2022-06-24', '2022-07-24', '2022-07-24 09:07:48', '2022-07-24 09:08:33');

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
(1, 'Administrator', 'admin@test.com', NULL, '$2y$10$IJUN8BDtV8YqipwtLLYimuON7/Mryl0h1TsNDRgoIdhFl758KsqPm', '6281258008824', NULL, NULL, '2022-07-23 05:39:46');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `presensis`
--
ALTER TABLE `presensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
