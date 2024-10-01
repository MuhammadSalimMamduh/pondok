-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2024 at 04:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pondok`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(254) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `email`) VALUES
(12345, 'admin', '0192023a7bbd73250516f069df18b500', 'admin123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agama`
--

CREATE TABLE `tbl_agama` (
  `id` int(11) NOT NULL,
  `agama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_agama`
--

INSERT INTO `tbl_agama` (`id`, `agama`) VALUES
(1, 'katolik'),
(2, 'buda'),
(4, 'islam'),
(5, 'kristen'),
(6, 'konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aktivasi`
--

CREATE TABLE `tbl_aktivasi` (
  `id` int(11) NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_aktivasi`
--

INSERT INTO `tbl_aktivasi` (`id`, `tgl_buka`, `tgl_tutup`) VALUES
(1, '2024-10-01', '2024-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_angkatan`
--

CREATE TABLE `tbl_angkatan` (
  `id` int(11) NOT NULL,
  `angkatan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_angkatan`
--

INSERT INTO `tbl_angkatan` (`id`, `angkatan`) VALUES
(1, '2021'),
(2, '2023'),
(3, '2024'),
(4, '2025'),
(5, '2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `id_berkas` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `fc_akte` text DEFAULT NULL,
  `fc_kk` text DEFAULT NULL,
  `fc_ijazah` text DEFAULT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bukti_du` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_berkas`
--

INSERT INTO `tbl_berkas` (`id_berkas`, `foto`, `fc_akte`, `fc_kk`, `fc_ijazah`, `nik`, `nama`, `bukti_du`) VALUES
(2, '../img/foto_santri/foto-santriBrosur-up.jpg', '../img/berkas/berkasakta.jpg', '../img/foto_santri/akteBrosur-up.jpg', '../img/foto_santri/ijazahBrosur-up.jpg', '0000', '', ''),
(4, '../img/berkas/buktiimg-logoapp1725939125.jpeg', '../img/berkas/berkasakta.jpg', '../img/berkas/berkaskk.jpg', '../img/berkas/berkasijazah.jpg', '1111111111111111', 'Mansur Ahmad', ''),
(5, '../img/berkas/berkasimg-logoapp1725939226.png', NULL, NULL, NULL, '3328172636', 'Moch Zaky Widodo', ''),
(7, '../img/foto_santri/foto-santriMAMDUH PAS FOTO (1).png', '../img/foto_santri/akteWhatsApp_Image_2024-09-22_at_11.03.59-removebg-preview.png', '../img/foto_santri/kartu_keluargaWhatsApp Image 2024-09-22 at 11.28.56.jpeg', '../img/foto_santri/ijazahWhatsApp Image 2024-09-22 at 11.03.59.jpeg', '3322314314134214', '', '../img/bukti_du/buktiScreenshot 2024-09-30 100651.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` varchar(1) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
('1', 'kitab'),
('2', 'hafalan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `angkatan` varchar(5) NOT NULL,
  `wali_kelas` varchar(225) NOT NULL,
  `id_jurusan` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id`, `nama_kelas`, `angkatan`, `wali_kelas`, `id_jurusan`) VALUES
(0, 'Al-Jurumiyah', '3', 'Ustd Prof Muhammad Salim Mamduh', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id` int(11) NOT NULL,
  `kode_formulir` varchar(10) DEFAULT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_casis` varchar(250) NOT NULL,
  `status` varchar(1) NOT NULL,
  `no_wa` varchar(14) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id`, `kode_formulir`, `nisn`, `nama_casis`, `status`, `no_wa`, `bukti`) VALUES
(14, '123', '9898989898', 'Agung Lope Anis', '1', '97653490800', 'bukti'),
(15, '1234', '1221212121', 'mamamd', '1', '098765431234', 'buktioke.png'),
(16, '123', '3232322222', 'salim', '0', '08976543214', 'buktiWhatsApp Image 2024-09-20 at 18.24.45.jpeg'),
(17, '', '1234567891', 'M Ali Zulfan', '0', '08651727381', 'buktiWhatsApp_Image_2024-09-22_at_11.03.59-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `nis` varchar(18) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `asal_sekolah` varchar(150) NOT NULL,
  `ayah` varchar(100) NOT NULL,
  `ibu` varchar(100) NOT NULL,
  `wali` varchar(100) NOT NULL,
  `no_orangtua` varchar(16) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `riwayat_penyakit` varchar(100) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`nis`, `nik`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `alamat`, `asal_sekolah`, `ayah`, `ibu`, `wali`, `no_orangtua`, `tgl_daftar`, `riwayat_penyakit`, `kelamin`, `jurusan`) VALUES
('', '0000', 'M. Zidni Ilman', 'Brebes', '2003-08-08', 'Desa Penggarutan Rw.01 Rw.04', 'SMK', 'mamad', '', '', '08970987654', '2024-09-24', '', 'Laki-Laki', '1'),
('', '1111111111111111', 'Mansur Ahmad', '', '2024-09-26', 'Desa Penggarutan Rw.01 Rw.04', 'MA', 'Bapa', 'Mama', '', '0909090909090', '2024-09-25', '', 'Laki-Laki', '1'),
('', '33210182751', 'Muhammad Salim Mamduh', 'Brebes', '2003-01-06', 'Dk.sawangan RT02/RW04 Desa Bumiayu Kec.Bumiayu Kab.brebes', 'SMP NEGERI 1 BUMIAYU', 'Salim', '', '', '085316512', '2024-09-18', '', 'Laki-Laki', '1'),
('', '3322314314134214', 'M. Salim Mamduh', 'Brebes', '2003-01-06', 'Desa Penggarutan Rw.01 Rw.04', 'SMK ISLAM ALMADINAH PAGUYANGAN', 'Ayahnya Mamduh', 'Ibunya Mamduh', '', '081222222222', '2024-09-26', 'BENGEK', 'Laki-Laki', '1'),
('', '3328172636', 'Moch Zaky Widodo', 'Brebes', '2005-01-11', 'Dk.Karangturi RT01/RW02 Desa Bumiayu', 'SMP NEGERI 2 BUMIAYU', 'Mono', '', '', '0812636124', '2024-09-18', 'Asma', 'Laki-Laki', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `nik` varchar(20) NOT NULL,
  `user` varchar(200) NOT NULL,
  `pass` varchar(254) NOT NULL,
  `nama` text NOT NULL,
  `kode_agama` int(11) NOT NULL,
  `kelamin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`nik`, `user`, `pass`, `nama`, `kode_agama`, `kelamin`) VALUES
('1221312', 'iw', '856d3eb283c3bc43b95ba734a3e794f1', 'iw', 5, 'P'),
('12312412', 'agung', 'e59cd3ce33a68f536c19fedb82a7936f', 'agung', 1, 'L'),
('123124324', 'ADMIN', 'af0ba11942d932e2dcfe5aee0857f775', 'ADMIN', 2, 'P'),
('124132', 'mamduh', '5a4141c790b0f8651dc525ea23a39f13', 'mamduh', 4, 'L'),
('126356152', 'arya', '5882985c8b1e2dce2763072d56a1d6e5', 'zaky', 4, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `rekening` varchar(15) NOT NULL,
  `tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id`, `nama`, `rekening`, `tujuan`) VALUES
(1, 'BRI', '1287376126', 'M Zidni Ilman'),
(2, 'BNI', '1178772146', 'Muhammad Salim Mamduh'),
(3, 'DANA', '0831348219', 'Agung Hapsah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_santri`
--

CREATE TABLE `tbl_santri` (
  `nis` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_santri` varchar(200) NOT NULL,
  `kelamin` varchar(254) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `nama_ayah` varchar(200) NOT NULL,
  `nama_ibu` varchar(200) NOT NULL,
  `wali` varchar(254) DEFAULT NULL,
  `jurusan` varchar(20) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `asal_sekolah` varchar(200) NOT NULL,
  `riwayat_penyakit` varchar(200) DEFAULT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_santri`
--

INSERT INTO `tbl_santri` (`nis`, `nik`, `nama_santri`, `kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nama_ayah`, `nama_ibu`, `wali`, `jurusan`, `kontak`, `asal_sekolah`, `riwayat_penyakit`, `tgl_daftar`) VALUES
('NIS-00001', '0000', 'M. Zidni Ilman', 'Laki-Laki', 'Brebes', '2003-08-08', 'Desa Penggarutan Rw.01 Rw.04', 'mamad', '', '', '1', '08970987654', 'SMK', '', '2024-09-24'),
('NIS-00002', '1111111111111111', 'Mansur Ahmad', 'Laki-Laki', '', '2024-09-26', 'Desa Penggarutan Rw.01 Rw.04', 'Bapa', 'Mama', '', '1', '0909090909090', 'MA', '', '2024-09-25'),
('NIS-00003', '3328172636', 'Moch Zaky Widodo', 'Laki-Laki', 'Brebes', '2005-01-11', 'Dk.Karangturi RT01/RW02 Desa Bumiayu', 'Mono', '', '', '2', '0812636124', 'SMP NEGERI 2 BUMIAYU', 'Asma', '2024-09-18'),
('NIS-00004', '3322314314134214', 'M. Salim Mamduh', 'Laki-Laki', 'Brebes', '2003-01-06', 'Desa Penggarutan Rw.01 Rw.04', 'Ayahnya Mamduh', 'Ibunya Mamduh', '', '1', '081222222222', 'SMK ISLAM ALMADINAH PAGUYANGAN', 'BENGEK', '2024-09-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_aktivasi`
--
ALTER TABLE `tbl_aktivasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_angkatan`
--
ALTER TABLE `tbl_angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_santri`
--
ALTER TABLE `tbl_santri`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
