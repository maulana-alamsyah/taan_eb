-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 04:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taan_eb`
--

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `galeri_id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `foto`, `tanggal`, `lokasi`, `keterangan`) VALUES
(4, 'Ohoitel_5795832.jpeg', '2022-12-04', 'Ohoitel', 'KTM'),
(5, 'Ohoitel_1131416.jpg', '2022-12-06', 'Taar', 'Deadpool'),
(6, 'Lebetawi_7315309.jpg', '2022-12-06', 'Lebetawi', 'Lamsyah');

-- --------------------------------------------------------

--
-- Table structure for table `harga_jual`
--

CREATE TABLE `harga_jual` (
  `harga_jual_id` int(11) NOT NULL,
  `kategori_id` varchar(255) NOT NULL,
  `teripang_pasir` varchar(255) NOT NULL,
  `gamat` varchar(255) NOT NULL,
  `polos` varchar(255) NOT NULL,
  `kuasa` varchar(255) NOT NULL,
  `bola` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga_jual`
--

INSERT INTO `harga_jual` (`harga_jual_id`, `kategori_id`, `teripang_pasir`, `gamat`, `polos`, `kuasa`, `bola`) VALUES
(61, 'basah_37294144', '12.000', '12.000', '12.000', '12.000', '12.000'),
(62, 'kering_37294144', '0', '0', '0', '0', '0'),
(63, 'benih_37294144', '0', '0', '0', '0', '0'),
(64, 'farmasi_37294144', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_jual`
--

CREATE TABLE `jenis_jual` (
  `jenis_jual_id` int(11) NOT NULL,
  `kategori_id` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_jual`
--

INSERT INTO `jenis_jual` (`jenis_jual_id`, `kategori_id`, `keterangan`) VALUES
(73, 'basah_37294144', 'Triwulan 1 check'),
(74, 'kering_37294144', ''),
(75, 'benih_37294144', ''),
(76, 'farmasi_37294144', '');

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `kuisioner_id` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `nama_pembudidaya` varchar(255) NOT NULL,
  `triwulan` varchar(255) NOT NULL,
  `basah_id` varchar(255) NOT NULL,
  `kering_id` varchar(255) NOT NULL,
  `benih_id` varchar(255) NOT NULL,
  `farmasi_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuisioner`
--

INSERT INTO `kuisioner` (`kuisioner_id`, `nama_petugas`, `tanggal`, `lokasi`, `nama_pembudidaya`, `triwulan`, `basah_id`, `kering_id`, `benih_id`, `farmasi_id`) VALUES
(33, 'maulana alamsyah', '2022-12-03', 'Dullah', 'maulana alamsyahsl', '1', 'basah_37294144', 'kering_37294144', 'benih_37294144', 'farmasi_37294144');

-- --------------------------------------------------------

--
-- Table structure for table `produksi_terjual`
--

CREATE TABLE `produksi_terjual` (
  `produksi_terjual_id` int(11) NOT NULL,
  `kategori_id` varchar(255) NOT NULL,
  `teripang_pasir` varchar(255) NOT NULL,
  `gamat` varchar(255) NOT NULL,
  `polos` varchar(255) NOT NULL,
  `kuasa` varchar(255) NOT NULL,
  `bola` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produksi_terjual`
--

INSERT INTO `produksi_terjual` (`produksi_terjual_id`, `kategori_id`, `teripang_pasir`, `gamat`, `polos`, `kuasa`, `bola`, `satuan`) VALUES
(61, 'basah_37294144', '12', '12', '12', '12', '12', 'Kg'),
(62, 'kering_37294144', '0', '0', '0', '0', '0', 'Kg'),
(63, 'benih_37294144', '0', '0', '0', '0', '0', 'Kg'),
(64, 'farmasi_37294144', '0', '0', '0', '0', '0', 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `profil_pembudidaya`
--

CREATE TABLE `profil_pembudidaya` (
  `profil_pembudidaya_id` int(11) NOT NULL,
  `nama_pembudidaya` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_kk` varchar(255) NOT NULL,
  `foto_lokasi` varchar(255) NOT NULL,
  `foto_jenis_teripang` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `lokasi_budidaya` varchar(255) NOT NULL,
  `titik_koordinat` varchar(255) NOT NULL,
  `luas_lahan` varchar(255) NOT NULL,
  `luas_lahan_terpakai` varchar(255) NOT NULL,
  `parameter_fisik` varchar(255) NOT NULL,
  `parameter_kimia` varchar(255) NOT NULL,
  `jenis_komoditas` varchar(255) NOT NULL,
  `metode_budidaya` varchar(255) NOT NULL,
  `punya_kartu_kusuka` varchar(255) NOT NULL,
  `dapat_bantuan` varchar(255) NOT NULL,
  `jenis_bantuan` varchar(255) NOT NULL,
  `sumber_bantuan` varchar(255) NOT NULL,
  `tahun_bantuan` varchar(255) NOT NULL,
  `kendala` varchar(255) NOT NULL,
  `solusi` varchar(255) NOT NULL,
  `tahun_mulai` varchar(255) NOT NULL,
  `pengeluaran` varchar(255) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `no_hp_pembeli` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil_pembudidaya`
--

INSERT INTO `profil_pembudidaya` (`profil_pembudidaya_id`, `nama_pembudidaya`, `nik`, `foto_ktp`, `foto_kk`, `foto_lokasi`, `foto_jenis_teripang`, `alamat`, `no_hp`, `lokasi_budidaya`, `titik_koordinat`, `luas_lahan`, `luas_lahan_terpakai`, `parameter_fisik`, `parameter_kimia`, `jenis_komoditas`, `metode_budidaya`, `punya_kartu_kusuka`, `dapat_bantuan`, `jenis_bantuan`, `sumber_bantuan`, `tahun_bantuan`, `kendala`, `solusi`, `tahun_mulai`, `pengeluaran`, `nama_pembeli`, `no_hp_pembeli`) VALUES
(7, 'maulana alamsyahsl', '3328122807000003', 'KTP_4151816.jpg', 'KK_4741816.jpg', 'Lokasi_7582635.jpg', 'Jenis_7552635.jpg', 'Desa Kebasen', '8963609270900', 'Mangon', '-6.889435424881633, 109.13818359375001', '1400', '1200', 'aman', 'aman', 'Pasir', 'Tawar', 'Tidak', 'Tidak', '', '', '', 'Jumlah air bersih kurang', 'Membuat  irigasi', '', '1.200.000', 'KARYONO', '08767876676767'),
(8, 'maulana', '3328122807000003', 'KTP_4214831.png', 'KK_6164535.jpg', 'Lokasi_5864535.png', 'Jenis_5604535.png', 'Desa apajaah', '0896360927272', 'Lebetawi', '-6.896581690185374, 109.1481399536133', '1200', '1200', 'aman', 'aman', 'Pasir', 'Basah', 'Tidak', 'Ya', 'apajah', 'apaja', '3123', 'tanah tidak rata', 'meratakan', '2010', '1.000.000', 'AIP', '0876262626262'),
(9, 'alamasyah', '1231312312312268', 'KTP_3205005.', 'KK_4015005.', 'Lokasi_7085005.', 'Jenis_6125005.', '', '', 'Taar', '-6.889520591612625, 109.38159942626955', '', '', '', '', '', '', 'Ya', 'Ya', 'asdf', 'adfa', '2018', '', '', '2018', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stok_tersedia`
--

CREATE TABLE `stok_tersedia` (
  `stok_id` int(11) NOT NULL,
  `kategori_id` varchar(255) NOT NULL,
  `teripang_pasir` varchar(255) NOT NULL,
  `gamat` varchar(255) NOT NULL,
  `polos` varchar(255) NOT NULL,
  `kuasa` varchar(255) NOT NULL,
  `bola` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_tersedia`
--

INSERT INTO `stok_tersedia` (`stok_id`, `kategori_id`, `teripang_pasir`, `gamat`, `polos`, `kuasa`, `bola`, `satuan`) VALUES
(62, 'basah_37294144', '12', '12', '12', '12', '12', 'Kg'),
(63, 'kering_37294144', '0', '0', '0', '0', '0', 'Kg'),
(64, 'benih_37294144', '0', '0', '0', '0', '0', 'Kg'),
(65, 'farmasi_37294144', '0', '0', '0', '0', '0', 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `total_nilai_produksi`
--

CREATE TABLE `total_nilai_produksi` (
  `total_nilai_produksi_id` int(11) NOT NULL,
  `kategori_id` varchar(255) NOT NULL,
  `teripang_pasir` varchar(255) NOT NULL,
  `gamat` varchar(255) NOT NULL,
  `polos` varchar(255) NOT NULL,
  `kuasa` varchar(255) NOT NULL,
  `bola` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_nilai_produksi`
--

INSERT INTO `total_nilai_produksi` (`total_nilai_produksi_id`, `kategori_id`, `teripang_pasir`, `gamat`, `polos`, `kuasa`, `bola`) VALUES
(61, 'basah_37294144', '12', '12', '12', '12', '12'),
(62, 'kering_37294144', '0', '0', '0', '0', '0'),
(63, 'benih_37294144', '0', '0', '0', '0', '0'),
(64, 'farmasi_37294144', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indexes for table `harga_jual`
--
ALTER TABLE `harga_jual`
  ADD PRIMARY KEY (`harga_jual_id`);

--
-- Indexes for table `jenis_jual`
--
ALTER TABLE `jenis_jual`
  ADD PRIMARY KEY (`jenis_jual_id`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`kuisioner_id`);

--
-- Indexes for table `produksi_terjual`
--
ALTER TABLE `produksi_terjual`
  ADD PRIMARY KEY (`produksi_terjual_id`);

--
-- Indexes for table `profil_pembudidaya`
--
ALTER TABLE `profil_pembudidaya`
  ADD PRIMARY KEY (`profil_pembudidaya_id`);

--
-- Indexes for table `stok_tersedia`
--
ALTER TABLE `stok_tersedia`
  ADD PRIMARY KEY (`stok_id`);

--
-- Indexes for table `total_nilai_produksi`
--
ALTER TABLE `total_nilai_produksi`
  ADD PRIMARY KEY (`total_nilai_produksi_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `galeri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `harga_jual`
--
ALTER TABLE `harga_jual`
  MODIFY `harga_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `jenis_jual`
--
ALTER TABLE `jenis_jual`
  MODIFY `jenis_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `kuisioner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `produksi_terjual`
--
ALTER TABLE `produksi_terjual`
  MODIFY `produksi_terjual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `profil_pembudidaya`
--
ALTER TABLE `profil_pembudidaya`
  MODIFY `profil_pembudidaya_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stok_tersedia`
--
ALTER TABLE `stok_tersedia`
  MODIFY `stok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `total_nilai_produksi`
--
ALTER TABLE `total_nilai_produksi`
  MODIFY `total_nilai_produksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
