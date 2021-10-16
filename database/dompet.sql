-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Okt 2021 pada 02.41
-- Versi server: 5.7.24
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dompet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet`
--

CREATE TABLE `dompet` (
  `ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `status_ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dompet`
--

INSERT INTO `dompet` (`ID`, `nama`, `referensi`, `deskripsi`, `status_ID`, `created_at`, `updated_at`) VALUES
('74df6edc-c6a2-4355-bcdc-4984a8889565', 'Dompet Cadangan', '5270072504', 'Bank Permmata', '128b4140-005b-436c-a443-081b06b48230', '2021-10-15 16:55:38', '2021-10-15 16:55:38'),
('c1122acc-d17d-4add-83a9-7453c86727cb', 'Dompet Tagihan', '5270072503', 'Bank BCA', 'b7774f1f-4c02-4152-96e8-ab9b5d3be3fc', '2021-10-15 16:55:17', '2021-10-15 16:55:17'),
('ff3dd7ca-7de0-49e8-a758-3f246ddfb9b8', 'Dompet Utama', '5270072502', 'Bank BCA', '9e91f8cf-64b6-463f-82de-760900fd807d', '2021-10-15 16:54:57', '2021-10-15 16:54:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet_status`
--

CREATE TABLE `dompet_status` (
  `ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_dompet` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dompet_status`
--

INSERT INTO `dompet_status` (`ID`, `status_dompet`, `created_at`, `updated_at`) VALUES
('128b4140-005b-436c-a443-081b06b48230', 'Aktif', '2021-10-15 16:55:38', '2021-10-15 16:55:38'),
('27e0f4c6-d0ed-425c-9b14-bfb5a1ac3a8f', 'Aktif', '2021-10-15 16:54:14', '2021-10-15 16:54:14'),
('9e91f8cf-64b6-463f-82de-760900fd807d', 'Aktif', '2021-10-15 16:54:57', '2021-10-15 16:54:57'),
('b7774f1f-4c02-4152-96e8-ab9b5d3be3fc', 'Aktif', '2021-10-15 16:55:17', '2021-10-15 16:55:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `status_ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`ID`, `nama`, `deskripsi`, `status_ID`, `created_at`, `updated_at`) VALUES
('3b376108-5842-48be-8e29-b69236b43661', 'Pengeluaran', 'Kategori untuk Pengeluaran', '021495ea-3d73-4dcc-b3f6-9cf0c35287a8', '2021-10-15 16:55:59', '2021-10-15 16:55:59'),
('6a3f3ccd-eca4-44d4-8ee3-7e392b1f14e1', 'Pemasukkan', 'Kategori untuk Pemasukkan', '74978ff9-c2d8-4d7a-90da-d443dc957744', '2021-10-15 16:56:13', '2021-10-15 16:56:13'),
('9e9e9d52-27e4-4de4-9725-03007204a2d1', 'Lain - Lain', 'Kategori lain lain', '5281dcca-e94a-4fe0-add1-9cdfcac4cecf', '2021-10-15 16:56:25', '2021-10-15 18:21:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_status`
--

CREATE TABLE `kategori_status` (
  `ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kategori` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_status`
--

INSERT INTO `kategori_status` (`ID`, `status_kategori`, `created_at`, `updated_at`) VALUES
('021495ea-3d73-4dcc-b3f6-9cf0c35287a8', 'Aktif', '2021-10-15 16:55:59', '2021-10-15 16:55:59'),
('5281dcca-e94a-4fe0-add1-9cdfcac4cecf', 'Aktif', '2021-10-15 16:56:25', '2021-10-15 16:56:25'),
('74978ff9-c2d8-4d7a-90da-d443dc957744', 'Aktif', '2021-10-15 16:56:13', '2021-10-15 16:56:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(23, '2021_10_14_082407_dompet_status_table', 1),
(24, '2021_10_14_082408_dompet_table', 1),
(25, '2021_10_14_083533_create_kategori_status', 1),
(26, '2021_10_14_083708_create_kategori', 1),
(27, '2021_10_14_083953_create_transaksi_status', 1),
(28, '2021_10_14_083959_create_transaksi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `tanggal` date NOT NULL,
  `nilai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dompet_ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID`, `kode`, `deskripsi`, `tanggal`, `nilai`, `dompet_ID`, `kategori_ID`, `status_ID`, `created_at`, `updated_at`) VALUES
('293fbf34-ee82-4e5c-a5ba-acbb2a5b8e40', 'WIN2934081', 'Gaji bulan januari', '2021-10-16', '3500000', 'ff3dd7ca-7de0-49e8-a758-3f246ddfb9b8', '6a3f3ccd-eca4-44d4-8ee3-7e392b1f14e1', '5e1d971b-0b36-4fb7-996a-72f747f56767', '2021-10-15 17:02:20', '2021-10-15 17:02:20'),
('8fd20ea6-1e2d-4612-b0dc-5ac3232c33f0', 'WOUT7240312', 'Bayar kos', '2021-10-16', '500000', 'ff3dd7ca-7de0-49e8-a758-3f246ddfb9b8', '3b376108-5842-48be-8e29-b69236b43661', '9164cd00-c052-489e-b615-4ddf1b90f86d', '2021-10-15 17:04:54', '2021-10-15 17:04:54'),
('e08be5a8-9483-43af-92dc-a5ae9d4b8eee', 'WOUT5134082', 'Bayar dokter', '2021-10-16', '50000', '74df6edc-c6a2-4355-bcdc-4984a8889565', '3b376108-5842-48be-8e29-b69236b43661', 'f7dd043d-baf3-47a5-8430-0194cac5dc4e', '2021-10-15 17:04:34', '2021-10-15 17:04:34'),
('e1ccbb75-64e5-4adb-bda2-6da5fdf3c753', 'WIN2387911', 'Saldo Awal', '2021-10-16', '100000', '74df6edc-c6a2-4355-bcdc-4984a8889565', '6a3f3ccd-eca4-44d4-8ee3-7e392b1f14e1', '6e5188d4-87b9-4eb5-a2ac-6f6661872288', '2021-10-15 17:01:58', '2021-10-15 17:01:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_status`
--

CREATE TABLE `transaksi_status` (
  `ID` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_transaksi` enum('Masuk','Keluar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_status`
--

INSERT INTO `transaksi_status` (`ID`, `status_transaksi`, `created_at`, `updated_at`) VALUES
('54888241-3163-4277-af44-a054498c9c01', 'Keluar', '2021-10-15 17:03:39', '2021-10-15 17:03:39'),
('5e1d971b-0b36-4fb7-996a-72f747f56767', 'Masuk', '2021-10-15 17:02:20', '2021-10-15 17:02:20'),
('6e5188d4-87b9-4eb5-a2ac-6f6661872288', 'Masuk', '2021-10-15 17:01:58', '2021-10-15 17:01:58'),
('9164cd00-c052-489e-b615-4ddf1b90f86d', 'Keluar', '2021-10-15 17:04:54', '2021-10-15 17:04:54'),
('f7dd043d-baf3-47a5-8430-0194cac5dc4e', 'Keluar', '2021-10-15 17:04:34', '2021-10-15 17:04:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dompet`
--
ALTER TABLE `dompet`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `dompet_status_id_foreign` (`status_ID`);

--
-- Indeks untuk tabel `dompet_status`
--
ALTER TABLE `dompet_status`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `kategori_status_id_foreign` (`status_ID`);

--
-- Indeks untuk tabel `kategori_status`
--
ALTER TABLE `kategori_status`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `transaksi_dompet_id_foreign` (`dompet_ID`),
  ADD KEY `transaksi_kategori_id_foreign` (`kategori_ID`),
  ADD KEY `transaksi_status_id_foreign` (`status_ID`);

--
-- Indeks untuk tabel `transaksi_status`
--
ALTER TABLE `transaksi_status`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dompet`
--
ALTER TABLE `dompet`
  ADD CONSTRAINT `dompet_status_id_foreign` FOREIGN KEY (`status_ID`) REFERENCES `dompet_status` (`ID`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_status_id_foreign` FOREIGN KEY (`status_ID`) REFERENCES `kategori_status` (`ID`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_dompet_id_foreign` FOREIGN KEY (`dompet_ID`) REFERENCES `dompet` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_kategori_id_foreign` FOREIGN KEY (`kategori_ID`) REFERENCES `kategori` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_status_id_foreign` FOREIGN KEY (`status_ID`) REFERENCES `transaksi_status` (`ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
