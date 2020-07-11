-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 03:05 PM
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
-- Database: `ppdbsooko`
--

-- --------------------------------------------------------

--
-- Table structure for table `siswa_pendaftar`
--

CREATE TABLE `siswa_pendaftar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jeniskelamin` varchar(15) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `sekolahasal` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `statusdaftar` varchar(20) NOT NULL DEFAULT 'Diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa_pendaftar`
--

INSERT INTO `siswa_pendaftar` (`id`, `nama`, `alamat`, `jeniskelamin`, `agama`, `sekolahasal`, `email`, `password`, `statusdaftar`) VALUES
(1, 'M. Auliya Mirzaq Romdloni', 'Perum Griya Japan Raya Jl. Bola Volly A.20, Kecamatan Sooko, Kabupaten Mojokerto', 'Laki-Laki', 'Islam', 'SMPN 4 Kota Mojokerto', 'mirzaqarjap@gmail.com', '$2y$10$P47q.rAZeCYLE25HfSxSJO2c2.dhIpM2DJ2j7ABtcDt5bRV.Yw3iK', 'Diproses'),
(2, 'Bramantya Wahyu Nugroho', 'Wisma Sooko Indah', 'Laki-Laki', 'Islam', 'SMP TNH', 'bram@gmail.com', '$2y$10$qf5rdmlNPoDsSaRd15LLv.d2kkazoWAUNLbsBSBcMMK21CQB6HuCa', 'Diterima'),
(4, 'Yohanes Felix Ardiyansyah', 'Griya Japan Raya Jl. Basket C.10, Sooko, Mojokerto', 'Laki-Laki', 'Kristen', 'SMPN 1 Sooko', 'yohanesfelix@gmail.com', '$2y$10$IUd3z7X6Iwdbuex4ZxJPau/UoDVDCAAEUiYJOpzmIymqCtJhnnUhG', 'Diproses'),
(5, 'Velicia Michelle Pratmojo', 'Prajurit Kulon', 'Perempuan', 'Islam', 'SMP 1 Sooko', 'velimichell@gmail.com', '$2y$10$dmK2z1JoC.NsqfLJfNrJ1e4aIArmpR9QvV/47RccMxjd3/Yi3lwDW', 'Diterima'),
(6, 'Annisa Amalia Zahra', 'Griya Japan Raya Jl. Renang B.21', 'Perempuan', 'Islam', 'SMPN 1 Kota Mojokerto', 'annzahra2006@gmail.com', '$2y$10$eUuCUNOWMcvkUxy9iTaMeeWTPMIPaBDl99zbpssjbFLHR7NmbM1ru', 'Diterima'),
(8, 'Naufal Izza Fikry', 'Desa Puri, Kecamatan Puri', 'Laki-Laki', 'Islam', 'SMPN 1 Ngoro', 'naufalizza123@gmail.com', '$2y$10$MyGtgOmYtrH/DUxmdYbr3OPGr20tOIzD8Mi3PS5kh6ACH6ACRWNOu', 'Diproses'),
(10, 'Richard Asmarakandi', 'Surabaya Pusat', 'Laki-Laki', 'Islam', 'SMP 29 Surabaya', 'richard@gmail.com', '$2y$10$sc0ZwN66aGnLz94bBdR8S.BoAmXPt35F29HONN/R54AkSzaQOI9WK', 'Diproses'),
(13, 'Budi Setyawan', 'Surabaya', 'Laki-Laki', 'Islam', 'SMP 36 Surabaya', 'budisetyawan@gmail.com', '$2y$10$wI4gU7TsMbA5S/8.aJXSIOXuNHr0x4aDL.CK8NtoTOLM8Jhc2n8QW', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jeniskelamin` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`id`, `nama`, `jeniskelamin`, `username`, `email`, `password`) VALUES
(1, 'M. Auliya Mirzaq Romdloni', 'Laki-Laki', 'mirzaq19', 'mirzaqarjap@gmail.com', '$2y$10$/VwOWgcaF8/oezm5ykj4X.VhUY0AgwRxCLGPv6GTyh69hdiCmV6jK'),
(3, 'Bramantya', 'Laki-Laki', 'bram123', 'bram@gmail.com', '$2y$10$x3H2zgoyCnUUMfW8r6NoKOAwvc6FCquQnUembVB.bke6mFMxD8FdG'),
(5, 'admin', 'Laki-Laki', 'admin', 'admin@gmail.com', '$2y$10$0ntj8lisZ8OAAZMhBhe5hun.0ABz2Mc2oQNpUrsVaYqiPsH4fB3JG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siswa_pendaftar`
--
ALTER TABLE `siswa_pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswa_pendaftar`
--
ALTER TABLE `siswa_pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
