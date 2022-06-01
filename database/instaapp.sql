-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2022 pada 07.02
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instaapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_postingan`
--

CREATE TABLE `komentar_postingan` (
  `id` int(11) NOT NULL,
  `komentar` varchar(255) DEFAULT NULL,
  `id_postingan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar_postingan`
--

INSERT INTO `komentar_postingan` (`id`, `komentar`, `id_postingan`, `id_user`, `status`, `tanggal`) VALUES
(1, 'testing comment', 3, 2, 1, '2022-05-31 17:00:00'),
(2, 'balas comment', 3, 1, 0, '2022-05-31 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `like_postingan`
--

CREATE TABLE `like_postingan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_postingan` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `like_postingan`
--

INSERT INTO `like_postingan` (`id`, `id_user`, `id_postingan`, `tanggal`) VALUES
(5, 2, 4, '2022-06-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1653983063),
('m130524_201442_init', 1653983066),
('m190124_110200_add_verification_token_column_to_user_table', 1653983066);

-- --------------------------------------------------------

--
-- Struktur dari tabel `postingan`
--

CREATE TABLE `postingan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `caption` text DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `count_like` int(11) DEFAULT NULL,
  `tanggal_posting` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `postingan`
--

INSERT INTO `postingan` (`id`, `id_user`, `caption`, `photo`, `count_like`, `tanggal_posting`, `status`) VALUES
(3, 1, '#hastag\r\ndetail dari postingan', '124032785331052022103727.png', 1, '2022-05-31', 10),
(4, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\nLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. \r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\n#lorem #ipsum', '21295632910106202261307.jpg', 1, '2022-06-01', 10),
(5, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '15141724580106202263816.jpg', NULL, '2022-06-01', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `bio` text DEFAULT NULL,
  `photo_profil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `bio`, `photo_profil`) VALUES
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\nLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, \r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen book.', '22627761360106202254633.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password_text`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'maharani', 'maharani', 'P@s5w0rd', 'JWvB9LxZ2tyVFYdb-QrIyisbKwlV5NCk', '$2y$13$4YbxBgPoNzUG1tmdtAhSWOPK5QqUEjpurORqIC3KCnpTw/CV0NEdq', NULL, 'chaniagomaharani@gmail.com', 'pengguna', 10, 1653983535, 1653983535, 'HZJG2S7LadbblZzkJUb_s-iGhj6hfEFT_1653983535'),
(2, 'CHANIAGO', 'chaniago', 'P@s5w0rd', 'zP03INRXBJ8Gjkvs_vvzh_jHEqSLReS9', '$2y$13$VRodGBWyDpgHFsrhviO1WObKl9o84b.2UtF8A1KrtDENLdy3ts8jq', NULL, 'chaniago@gmail.com', 'pengguna', 10, 1654051369, 1654051369, 'hie--MG0US6BrKxNBtObA9mJHZoFrfIJ_1654051369'),
(5, 'ijah1234', 'ijah1234', 'P@s5w0rd', '6F-D_zUY0RY5-91lysOSbNBCgkvOG6S1', '$2y$13$tYWsz.g/fkiEhsMqUZccau1lE7uvOeVRlxS9VcdYPm/v0I179GRAq', NULL, 'ijah@gmail.com', 'pengguna', 10, 1654058906, 1654058906, 'oA-U_5queRob0q4wSBmp2681USRf2iug_1654058906'),
(6, 'ijah12345', 'ijah12345', 'P@s5w0rd', 'cD470cIYblaPwvrMMqC9puwWvJ702av4', '$2y$13$Wdvd.0n9gyOSC4STK8R.1.asa8FAt096CyUlnWT1BEsqdyFkIdxCO', NULL, 'ijah5@gmail.com', 'pengguna', 10, 1654058925, 1654058925, 'U5oFalB9LtawBUCFwrE2sg3ejPHYOSZj_1654058925'),
(8, 'demo', 'demo', '12345678', '7nz7dJEU5UtlGCzb4RnkGt3aT9Gj2DQk', '$2y$13$KLE8wHzqRAmd2KaCLaiSv.OFMt1FYTq/PdVH/v5RTSnScHSCqX1Ym', NULL, 'demo123@gmail.com', 'pengguna', 10, 1654059028, 1654059028, 'L9s3wnIywvXHSVIdTU2MksdD8cX7g-SN_1654059028'),
(9, 'satu123', 'satu123', 'P@s5w0ed', '37z89DkfXQOnXdm7v3rX6iaj43bRloUT', '$2y$13$6YF3nysAB6NFHR3xI6Bm/OPeUkc4zDxX6Cw9z79uN6RTlkHJ.uXpO', NULL, 'satu123@gmail.com', 'pengguna', 10, 1654059137, 1654059137, 'MZm-VBByQVfXwUynKL8q2tyobI5tRlh7_1654059137');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komentar_postingan`
--
ALTER TABLE `komentar_postingan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_postingan` (`id_postingan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `like_postingan`
--
ALTER TABLE `like_postingan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_postingan` (`id_postingan`);

--
-- Indeks untuk tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komentar_postingan`
--
ALTER TABLE `komentar_postingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `like_postingan`
--
ALTER TABLE `like_postingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komentar_postingan`
--
ALTER TABLE `komentar_postingan`
  ADD CONSTRAINT `komentar_postingan_ibfk_1` FOREIGN KEY (`id_postingan`) REFERENCES `postingan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_postingan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `like_postingan`
--
ALTER TABLE `like_postingan`
  ADD CONSTRAINT `like_postingan_ibfk_1` FOREIGN KEY (`id_postingan`) REFERENCES `postingan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_postingan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `postingan`
--
ALTER TABLE `postingan`
  ADD CONSTRAINT `postingan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `profil_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
