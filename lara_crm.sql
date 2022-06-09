-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 06:04 AM
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
(6, 'pria', 'L-Spesial', '50000', '2022-06-07 08:11:24', '2022-06-08 12:57:08');

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
(14, 'Mr. Braden Kreiger PhD', '240 Karli Highway Suite 737Lefflermouth, OK 50415', 'pria', '6289524432340', '1654717329.jpg', 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-05-12', '2022-06-08 01:56:08', '2022-06-08 12:42:09'),
(15, 'Mur Prakoso', '3001 Marlene Extensions Apt. 660Travonmouth, SC 81499', 'pria', '6289524432340', '1654717051.png', 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-05-12', '2022-06-08 01:56:08', '2022-06-08 12:37:31'),
(16, 'Joko Bertu', 'Pontianak', 'pria', '6289524432340', NULL, 'Laboriosam ut cupid', '45000', 'harian', 'gym', '2022-06-08', '2022-06-08', '2022-06-08 09:47:01', '2022-06-08 12:17:06'),
(17, 'Voluptatibus eveniet', 'Pontianak', 'pria', '6289524432340', '1654719031.png', 'Mahasiswa', '45000', 'harian', 'cardio', '2022-06-09', '2022-07-09', '2022-06-08 13:10:31', '2022-06-08 13:10:31'),
(18, 'Anabel Ziemann Jr.', '780 Garrick Roads\nPort Eldridge, CA 93534-9227', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:36:39', '2022-06-08 20:36:39'),
(19, 'Amani Boyer MD', '102 Donald Forks\nNorth Alborough, RI 92376', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:36:39', '2022-06-08 20:36:39'),
(20, 'Godfrey Zboncak', '280 Waters Lodge Apt. 181\nLake Elfrieda, KS 36862', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:36:40', '2022-06-08 20:36:40'),
(21, 'Beatrice Kuhn DVM', '5729 Hillary Spring\nArmstrongfort, RI 95242-2522', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:36:40', '2022-06-08 20:36:40'),
(22, 'Keith Altenwerth', '25852 Buster Parkway\nWest Elyseview, ID 39564-2720', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:36:40', '2022-06-08 20:36:40'),
(23, 'Cielo Von', '17856 Keeling Ferry Suite 664\nWest Giashire, NV 96044-0851', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:36:40', '2022-06-08 20:36:40'),
(24, 'Mr. Marc Metz', '1707 DuBuque Harbors\nPort Alvis, GA 55861', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:36:40', '2022-06-08 20:36:40'),
(25, 'Vince Feest', '2380 King Pike\nBiankabury, MN 49446', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:36:40', '2022-06-08 20:36:40'),
(26, 'Mrs. Heather Parker', '3798 Bradtke Lodge Suite 112\nWest Eusebio, GA 45373', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:36:40', '2022-06-08 20:36:40'),
(27, 'Nathanial Leffler', '4842 Luigi Squares\nErnserview, MD 28465-5992', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:36:41', '2022-06-08 20:36:41'),
(28, 'Ms. Marilou Connelly', '3658 Alycia Squares\nSouth Sonny, ME 90921', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:36:41', '2022-06-08 20:36:41'),
(29, 'Savion Walker', '71653 Wiza Mountain Apt. 042\nRutherfordberg, MA 62812-6515', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:36:41', '2022-06-08 20:36:41'),
(30, 'Miss Roselyn Nader', '725 Elliot Village\nEast Meaghanchester, IL 48625', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:36:41', '2022-06-08 20:36:41'),
(31, 'Emory Waters', '413 Gusikowski Way\nHyattberg, NM 32068-4436', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:36:41', '2022-06-08 20:36:41'),
(32, 'Bailee Terry', '11827 Jarred Forge\nPort Raheem, WV 03285-8908', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:36:41', '2022-06-08 20:36:41'),
(33, 'Lauriane Greenholt', '709 Prudence Drive\nNew Lucilechester, TX 10149', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:36:41', '2022-06-08 20:36:41'),
(34, 'Einar Shields', '625 Ike Drives\nSouth London, NV 90024-1960', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:36:41', '2022-06-08 20:36:41'),
(35, 'Christop Yost', '4825 Roselyn Prairie Apt. 367\nJustenside, MT 83840', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:36:41', '2022-06-08 20:36:41'),
(36, 'Rocky Muller', '981 Marquardt Extension Suite 966\nNew Rosaleestad, VT 67510-7275', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:36:41', '2022-06-08 20:36:41'),
(37, 'Columbus Bogisich', '30744 Kiera Circles\nArlenefort, AR 82723-4387', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:36:42', '2022-06-08 20:36:42'),
(38, 'Colin Nader', '443 Becker Avenue Apt. 484\nWest Leon, TX 21128-4403', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:49:36', '2022-06-08 20:49:36'),
(39, 'Grayce Bogisich', '5008 Catalina View Apt. 476\nSchultzhaven, OR 82394-6850', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:49:36', '2022-06-08 20:49:36'),
(40, 'Dedric Sauer', '49229 Karlie Ports Suite 402\nLake Zanebury, NE 14156-3593', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:49:36', '2022-06-08 20:49:36'),
(41, 'Prof. Joany Hegmann', '4202 Janie RidgeBessieside, GA 44748', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-05-12', '2022-06-08 20:49:37', '2022-06-08 21:00:24'),
(42, 'Caleigh Russel', '326 Bashirian Trail Apt. 475\nLake Precious, KS 62301-0403', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:49:37', '2022-06-08 20:49:37'),
(43, 'Wilford Doyle', '5798 Berneice Orchard Apt. 653\nPort Elwynside, UT 36383', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:49:37', '2022-06-08 20:49:37'),
(44, 'Suzanne Bosco', '5145 Westley Square Apt. 358\nEast Raphaellefurt, KY 25586', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:49:37', '2022-06-08 20:49:37'),
(45, 'Ben Conn', '9220 Josianne Green Suite 472\nWeberton, WY 68667', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:49:37', '2022-06-08 20:49:37'),
(46, 'Pascale Kshlerin', '91933 Jast Ports Apt. 600\nNorth Francis, MA 79286', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:49:37', '2022-06-08 20:49:37'),
(47, 'Lucas Corwin', '4472 Werner Islands\nLake Shaina, WY 93899', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:49:37', '2022-06-08 20:49:37'),
(48, 'Miss Cynthia Cormier', '5692 Wolff Meadows\nWest Sandrabury, ND 21342', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:49:37', '2022-06-08 20:49:37'),
(49, 'Myrtle Bahringer', '6030 Myron Flats Apt. 617\nEbertland, NY 17207-1373', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:49:37', '2022-06-08 20:49:37'),
(50, 'Alda Dickinson', '144 Cedrick Wells Apt. 848\nWest Kendalltown, AK 66927', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:49:37', '2022-06-08 20:49:37'),
(51, 'Milford Thiel', '9016 Mann Court Suite 680\nSouth Sim, DE 10001', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:49:37', '2022-06-08 20:49:37'),
(52, 'Prof. Lee Hickle DDS', '39974 Suzanne Stream\nNew Sofia, MD 04400', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:49:38', '2022-06-08 20:49:38'),
(53, 'Mr. Pierre Reynolds II', '66902 Willard Roads Apt. 023\nClementmouth, DC 11506-2588', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:49:38', '2022-06-08 20:49:38'),
(54, 'Mr. Justyn Fritsch', '499 Lenore Manor Apt. 040\nSouth Scotton, TN 51950', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:49:38', '2022-06-08 20:49:38'),
(55, 'Belle Marks', '5006 Trever Run Apt. 213\nWisokyfurt, GA 71396', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:49:38', '2022-06-08 20:49:38'),
(56, 'Mossie Rempel', '75129 Xavier Locks Apt. 889\nLavonneside, GA 80395', 'pria', '6289524432340', NULL, 'Mahasiswa', '40000', 'tetap', 'cardio', '2022-05-12', '2022-06-08', '2022-06-08 20:49:38', '2022-06-08 20:49:38'),
(57, 'Prof. Kaia Osinski', '57509 Mack Manor\nKilbackview, VT 99447-9130', 'wanita', '6289524432340', NULL, 'Mahasiswa', '40000', 'harian', 'gym', '2022-05-12', '2022-06-08', '2022-06-08 20:49:38', '2022-06-08 20:49:38');

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
(10, '2022_06_08_092835_create_pesans_table', 5),
(11, '2022_06_08_112421_add_phone_to_users', 6);

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
(2, 'pesan promosi', 'lorem ipsum sit dolor amet', '2022-06-08 03:58:05', '2022-06-08 06:32:09'),
(4, 'Peringantan msa tenggang', 'test 123', '2022-06-08 04:01:57', '2022-06-08 06:32:27');

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
(1, 'Administrator', 'admin@test.com', NULL, '$2y$10$LQ5N6JLTK1O04VV.TM3jh.f/8MQ36h6HdO02nXb3LN2gBKKb1iqFC', '6281258008824', NULL, NULL, '2022-06-08 07:34:53');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
