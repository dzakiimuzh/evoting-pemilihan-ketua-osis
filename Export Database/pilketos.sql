-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 06:49 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pilketos`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2020_10_27_020304_create_tbl_paslon', 2),
(5, '2020_10_27_020715_create_tbl_paslon', 3),
(6, '2020_11_05_011013_create_tbl_voting', 4),
(7, '2020_11_05_015018_create_tbl_hasil_voting', 5);

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
-- Table structure for table `tbl_hasil_voting`
--

CREATE TABLE `tbl_hasil_voting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_urut_paslon` int(11) NOT NULL,
  `jumlah_vote` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paslon`
--

CREATE TABLE `tbl_paslon` (
  `id` bigint(20) NOT NULL,
  `no_urut_paslon` int(11) NOT NULL,
  `ketua_paslon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wakil_paslon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi_paslon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi_paslon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_ketua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_wakil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_paslon`
--

INSERT INTO `tbl_paslon` (`id`, `no_urut_paslon`, `ketua_paslon`, `wakil_paslon`, `visi_paslon`, `misi_paslon`, `img_ketua`, `img_wakil`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dzaki Muzhaffar', 'Guntur Setiawan', 'Menjadikan sekolah SMK BINA MANDIRI MULTIMEDIA mejadi sekolah yang berkualitas baik dan menjadikan siswa/siswi nya disiplin dan bertanggung jawab', '1. Menumbuhkan keimanan\r\n2. menjadikan siswa/siswi aktif dalam kegiatan akademik maupun non akademik\r\n3. Menumbuhkan rasa peduli dan cinta terhadap sekolah kita', '1607706753_images.png', '1607706753_images.png', '2020-10-28 16:53:47', '2020-12-11 17:12:33'),
(2, 2, 'Ari Wahyudi', 'Reffy Ardian', 'Menjadikan OSIS sebagai organisasi positif yang dapat berkolaborasi internal maupun eksternal dan sebagai wadah kreativitas, inspirasi dan aspirasi dengan landasan iman dan takwa', '1. Meningkatkan rasa kekeluargaan antara OSIS dengan siswa\r\n2. Meningkatkan kedisiplinan siswa\r\n3. Melanjutkan dan mengembangkan program kerja yang telah ada\r\n4. Mengadakan acara yang bertujuan untuk meningkatkan kebersamaan', '1607706791_images.png', '1607706791_images.png', '2020-11-02 16:24:31', '2020-12-11 17:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_voting`
--

CREATE TABLE `tbl_voting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_urut_paslon` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `username`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dzakimuzhaffar', 'admin', 'dzakimuzh@gmail.com', NULL, '$2y$10$HC25bYOzehY2RxNQ/gpNTeuzg4ZywPpkfaUM2AIJyDimyT7y6ychW', NULL, '2020-10-26 18:21:38', '2020-10-26 18:21:38'),
(2, 'firmanmaulana', 'siswa', 'firman@gmail.com', NULL, '$2y$10$FZENtWl8zuYj5CLA4Hy2euME1QWOhCsJ7muwSTspgYtjl9E37xsIG', NULL, '2020-10-26 18:46:57', '2020-10-26 18:46:57'),
(83, 'godel', 'siswa', 'godel@gmail.com', NULL, '$2y$10$5i0K3s6U06hw3MgjBQA78uJJrodDloxnUnGLIOJxtHJQXUgQmGXxu', NULL, '2020-11-11 20:51:28', '2020-11-11 20:51:28'),
(84, 'fahmi', 'siswa', 'fahmi@gmail.com', NULL, '$2y$10$ColOt3o6BSJGKeXhVjJzTOGBe4uQlqWSJKcvyNfO/uT8be4ymCqLC', NULL, '2020-11-11 20:51:28', '2020-11-11 20:51:28'),
(85, 'gilang', 'siswa', 'gilang@gmail.com', NULL, '$2y$10$syFW0N8vO6OdpMQULZ5s1uqE0jMMm5uDQpO0cgTJfN9h82/xrHvYC', NULL, '2020-11-11 20:51:29', '2020-11-11 20:51:29'),
(86, 'irham', 'siswa', 'irham@gmail.com', NULL, '$2y$10$1hS00atKfHRXXb8lnFBA5.wNRhJQKWK9Q7NjWIEni.4gI3Z/cNMO6', NULL, '2020-11-11 20:51:29', '2020-11-11 20:51:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `tbl_hasil_voting`
--
ALTER TABLE `tbl_hasil_voting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_urut_paslon` (`no_urut_paslon`);

--
-- Indexes for table `tbl_paslon`
--
ALTER TABLE `tbl_paslon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_voting`
--
ALTER TABLE `tbl_voting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_hasil_voting`
--
ALTER TABLE `tbl_hasil_voting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_paslon`
--
ALTER TABLE `tbl_paslon`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_voting`
--
ALTER TABLE `tbl_voting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
