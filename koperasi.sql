-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 05:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(35) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat_agt` varchar(500) NOT NULL,
  `ttl_agt` varchar(50) NOT NULL,
  `jenis_kelamin_agt` varchar(10) NOT NULL,
  `email` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `file_surat` varchar(500) NOT NULL,
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(255) DEFAULT NULL,
  `password_expire_date` datetime DEFAULT '2021-08-24 00:00:00',
  `password_reset_key` varchar(255) DEFAULT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `email`, `photo`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`, `user_role_id`) VALUES
(1, 'admin', '$2y$10$QVkGPnb1Ag.9Ds8Mhq31iuoRV9/TY8sqrrykLMK1gd4jUEc6hcvtm', 'Administrator', 'admin@gmail.com', 'http://localhost/koperasi/uploads/files/1621929810.png', NULL, NULL, '2021-08-26 11:02:24', NULL, 1),
(2, 'user', '$2y$10$Aynn6wy0rLBzSx4smF5VcO0MXoCSGZKMia9SgsEVLlS11as2W0SRO', 'User', '12452@gamaial.com', 'http://localhost/koperasi/uploads/files/1622020736.png', NULL, NULL, '2021-08-24 00:00:00', NULL, 2),
(5, 'iqbal', '$2y$10$8j9AFKhkEZT0/hd/XLuppeI66IhvX33wARaYWeR56Yu.e6NrMVSYu', 'Iqbal Setiyadi', 'iqbalsetiyadi08@gmail.com', 'http://localhost/koperasi/uploads/files/1689742311.jpg', NULL, NULL, '2021-08-24 00:00:00', NULL, 1),
(6, 'roby', '$2y$10$XhXb.louDVIRq2OtSdans.lYsfGUKel5J6oBFiZuLAxm/IeBLcr0a', 'Roby', 'roby2121@gmail.com', 'http://localhost/koperasi/uploads/files/1719795816.png', NULL, NULL, '2021-08-24 00:00:00', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `action_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`permission_id`, `role_id`, `page_name`, `action_name`) VALUES
(1, 1, 'pengguna', 'list'),
(2, 1, 'pengguna', 'view'),
(3, 1, 'pengguna', 'add'),
(4, 1, 'pengguna', 'edit'),
(5, 1, 'pengguna', 'editfield'),
(6, 1, 'pengguna', 'delete'),
(7, 1, 'pengguna', 'import_data'),
(8, 1, 'surat_keluar', 'list'),
(9, 1, 'surat_keluar', 'view'),
(10, 1, 'surat_keluar', 'add'),
(11, 1, 'surat_keluar', 'edit'),
(12, 1, 'surat_keluar', 'editfield'),
(13, 1, 'surat_keluar', 'delete'),
(14, 1, 'surat_keluar', 'import_data'),
(15, 1, 'pendapatan', 'list'),
(16, 1, 'pendapatan', 'view'),
(17, 1, 'pendapatan', 'add'),
(18, 1, 'pendapatan', 'edit'),
(19, 1, 'pendapatan', 'editfield'),
(20, 1, 'pendapatan', 'delete'),
(21, 1, 'pendapatan', 'import_data'),
(22, 1, 'pengguna', 'accountedit'),
(23, 1, 'pengguna', 'accountview'),
(24, 1, 'role_permissions', 'list'),
(25, 1, 'role_permissions', 'view'),
(26, 1, 'role_permissions', 'add'),
(27, 1, 'role_permissions', 'edit'),
(28, 1, 'role_permissions', 'editfield'),
(29, 1, 'role_permissions', 'delete'),
(30, 1, 'roles', 'list'),
(31, 1, 'roles', 'view'),
(32, 1, 'roles', 'add'),
(33, 1, 'roles', 'edit'),
(34, 1, 'roles', 'editfield'),
(35, 1, 'roles', 'delete'),
(36, 2, 'surat_keluar', 'list'),
(37, 2, 'surat_keluar', 'view'),
(38, 2, 'surat_keluar', 'add'),
(39, 2, 'surat_keluar', 'edit'),
(40, 2, 'surat_keluar', 'editfield'),
(45, 2, 'pendapatan', 'editfield'),
(46, 2, 'pengguna', 'accountedit'),
(47, 2, 'pengguna', 'accountview');
(48, 1, 'pendapatan', 'edit'),
(49, 2, 'pendapatan', 'list'),
(50, 2, 'pendapatan', 'view'),
(51, 2, 'pendapatan', 'add'),
(52, 2, 'pendapatan', 'edit'),
(53, 2, 'pendapatan', 'editfield'),
(54, 2, 'pendapatan', 'delete'),
(55, 2, 'pendapatan', 'import_data'),
(56, 2, 'pengguna', 'list'),
(57, 2, 'pengguna', 'view'),
(58, 2, 'pengguna', 'add'),
(59, 2, 'pengguna', 'edit'),
(60, 2, 'pengguna', 'editfield'),
(61, 2, 'pengguna', 'delete'),
(62, 2, 'pengguna', 'import_data'),

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `No_Agenda` int(15) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `Tujuan_surat` varchar(255) NOT NULL,
  `Nomor_surat` varchar(255) NOT NULL,
  `perihal` varchar(500) NOT NULL,
  `file_surat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`No_Agenda`, `tanggal_surat`, `asal_surat`, `Tujuan_surat`, `Nomor_surat`, `perihal`, `file_surat`) VALUES
(1, '2021-05-24', 'Semarang', 'Surabaya', '123/2021-SRB', 'Terima Kerjasama', 'http://localhost/koperasi/uploads/files/ivb7pc36wzgqn_f.jpg'),
(2, '2021-05-24', 'Jakarta', 'Surabaya', '123/2021-jkt', 'Persetujuan kerjasama', 'http://localhost/koperasi/uploads/files/4ekix7gm95zw1fa.pdf'),
(3, '2021-05-26', 'Mojokerto', 'Surabaya', '123/2021-jkt-90', 'Persetujuan Kerjasama', 'http://localhost/koperasi/uploads/files/qwmz0v5obs2gtky.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `surat_masuk` (
  `No_Agenda` int(15) NOT NULL,
  `Nomor_Surat` varchar(255) NOT NULL,
  `Tanggal_surat` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `Asal_surat` varchar(255) NOT NULL,
  `perihal` varchar(500) NOT NULL,
  `file_surat` varchar(500) NOT NULL,
  `disposisi` varchar(255) NOT NULL,
  `penerima` varchar(35) NOT NULL,
  `pelaksana` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
CREATE TABLE `pendapatan` (
  `No_Agenda` int(15) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `pendapatan` varchar(20) NOT NULL,
  `file_surat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`No_Agenda`, `Tanggal_surat`, `nama`, `alamat`, `pendapatan`, `file_surat`) VALUES
(1, 'PLK/123345', '2021-05-24', '2021-05-24', 'Surabaya', 'Perjanjian Kerjasama Antara dua perusahaan', 'http://localhost/koperasi/uploads/files/h7td8ly3cpavxi1.jpg', 'Laksanakan Perjanjian Kerjasama, Juli 2021', 'iqbal', 'Staff Tata Usaha'),
(2, '8199882', '2021-05-25', '2021-05-26', 'jabiren', 'Kerjasama', 'http://localhost/koperasi/uploads/files/n681yqz29f4d53s.pdf', 'Laksanakan Perjanjian Kerjasama, juli 2022', 'iqbal', 'Staff Tata Usaha'),
(3, '12345678', '2021-05-26', '2021-05-26', 'Surabaya', 'Kerjasama', 'http://localhost/koperasi/uploads/files/v7j0bps_3wk65fc.pdf', 'Laksanakan Perjanjian Kerjasama , Juni 2021', 'iqbal', 'Staff Tata Usaha'),
(4, '9098-JKt-2021', '2021-05-12', '2021-05-26', 'Surabaya', 'Kerjasama', 'http://localhost/koperasi/uploads/files/jpy5cfwhdlx3bz4.pdf', 'Laksanakan Perjanjian Kerjasama dengan BPS utk magang Mahasiswa, Okt 2022', 'iqbal', 'Staff Administrator'),
(5, '080121', '2018-08-25', '2023-07-07', 'Jakarta', 'UAS', 'http://localhost/koperasi/uploads/files/n_meq5d23biwjv1.pdf', 'Laksanakan, dan laporkan hasilnya. Tindak lanjut sebelum tgl 14 bulan ini.', 'iqbal', 'Staff Kemahasiswaan');

--
-- Indexes for dumped tables
--
CREATE TABLE `pendapatan1` (
  `No_Agenda` int(15) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `induk_kering1` varchar(20) NOT NULL,
  `induk_kering2` varchar(20) NOT NULL,
  `induk_laktasi1` varchar(20) NOT NULL,
  `induk_laktasi2` varchar(20) NOT NULL,
  `dara1` varchar(20) NOT NULL,
  `dara2` varchar(20) NOT NULL,
  `pedet_jtn` varchar(20) NOT NULL,
  `pedet_btn` varchar(20) NOT NULL,
  `pendapatan` varchar(20) NOT NULL,
  `file_surat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--


CREATE TABLE `bulanan` (
  `No_Agenda` int(15) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `induk_kering1` varchar(20) NOT NULL,
  `induk_kering2` varchar(20) NOT NULL,
  `induk_laktasi1` varchar(20) NOT NULL,
  `induk_laktasi2` varchar(20) NOT NULL,
  `dara1` varchar(20) NOT NULL,
  `dara2` varchar(20) NOT NULL,
  `pedet_jtn` varchar(20) NOT NULL,
  `pedet_btn` varchar(20) NOT NULL,
  `pendapatan` varchar(20) NOT NULL,
  `produktivitas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`No_Agenda`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`No_Agenda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `No_Agenda` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `No_Agenda` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
