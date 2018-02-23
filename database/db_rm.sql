-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2017 at 04:05 AM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_rm`
--

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE IF NOT EXISTS `hak_akses` (
`id_hak_akses` tinyint(4) NOT NULL,
  `nama_hak_akses` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_hak_akses`, `nama_hak_akses`) VALUES
(1, 'karyawan'),
(2, 'dokter'),
(5, 'admin'),
(6, 'kepala');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE IF NOT EXISTS `tb_dokter` (
`id_dokter` tinyint(4) NOT NULL,
  `NIP` char(18) NOT NULL DEFAULT '',
  `nama` varchar(30) DEFAULT NULL,
  `jenis_poli` varchar(20) DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `NIP`, `nama`, `jenis_poli`, `jk`, `alamat`, `no_hp`, `username`) VALUES
(32, '198403032011561103', 'dr. Ardiansyah', 'UMUM', 'Laki-laki', 'Sukorejo ', '08733400288', 'ardian'),
(34, '198705222014062311', 'drg. Amanda', 'GIGI', 'Perempuan', 'Sukosari', '085330490500', 'amanda'),
(33, '19910730201204077', 'Diana A.Md.Keb', 'KIA', 'Perempuan', 'Ngabean', '089776232435', 'diana');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_poli`
--

CREATE TABLE IF NOT EXISTS `tb_jenis_poli` (
`id_jenis` tinyint(4) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_poli`
--

INSERT INTO `tb_jenis_poli` (`id_jenis`, `nama_jenis`) VALUES
(1, 'UMUM'),
(3, 'KIA'),
(4, 'GIGI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE IF NOT EXISTS `tb_karyawan` (
`id_karyawan` tinyint(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama`, `tgl_lahir`, `alamat`, `no_hp`, `username`) VALUES
(4, 'Sobri', '1991-03-01', 'Gemawang', '085292331112', 'sobri'),
(5, 'Emiyati', '1989-05-16', 'Samigaluh', '085444923177', 'emiyati');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
`id_login` tinyint(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(32) DEFAULT NULL,
  `posisi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `username`, `password`, `posisi`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(44, 'amanda', '6209804952225ab3d14348307b5a4a27', 'dokter'),
(41, 'ardian', '46632a526b980b41478ca6078fb02c28', 'dokter'),
(15, 'asep', 'dc855efb0dc7476760afaa1b281665f1', 'admin'),
(43, 'diana', '3a23bb515e06d0e944ff916e79a7775c', 'dokter'),
(45, 'emiyati', '130537f1bc32bdedc0df45e6fc4bb59b', 'karyawan'),
(4, 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', 'kepala'),
(42, 'sobri', 'c4488d5f18f4494949d67b72926a183c', 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE IF NOT EXISTS `tb_obat` (
`id_obat` int(11) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `jenis_obat` varchar(20) DEFAULT NULL,
  `kategori_obat` varchar(20) DEFAULT NULL,
  `harga_obat` int(11) DEFAULT NULL,
  `stok_obat` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `jenis_obat`, `kategori_obat`, `harga_obat`, `stok_obat`) VALUES
(2, 'Captropil  50mg Box 50s', 'G', 'Tab', 3400, 138),
(3, 'Paracetamol 500mg', 'G', 'Tab', 1250, 7),
(4, 'Ibuprofen 500mg', 'G', 'Tab', 1500, 130),
(5, 'OBH Herbal 250ml', 'G', 'Btl', 17000, 5),
(6, 'Amoxilin 30mg', 'G', 'Tab', 3500, 69),
(7, 'Amphicilin 200mg', 'G', 'Tab', 7500, 50),
(8, 'Betahistine 6mg', 'G', 'Tab', 2100, 46),
(9, 'Cetirizine 10mg', 'G', 'Tab', 4000, 40),
(10, 'Nifedipine 5mg', 'G', 'Tab', 1760, 59),
(11, 'Ambroxol 15mg/5cc', 'G', 'Srp', 5600, 32),
(12, 'Gentamicin 0,1%', 'G', 'Crm', 8000, 43);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE IF NOT EXISTS `tb_pasien` (
`id_pasien` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `pendidikan` varchar(10) DEFAULT NULL,
  `alamat` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nama`, `tgl_lahir`, `jk`, `agama`, `pekerjaan`, `pendidikan`, `alamat`) VALUES
(1, 'Rahmat Hanafi', '1996-10-26', 'Laki-laki', 'Islam', 'Pelajar', 'SMA', 'Kayu Manis RT 09/02'),
(2, 'Suprapto', '1981-01-09', 'Laki-laki', 'Islam', 'PNS', 'S1', 'Campursalam '),
(3, 'Siti Watiah', '1979-02-21', 'Perempuan', 'Islam', 'Buruh', 'SD', 'Serpong'),
(6, 'Yuniati', '1993-09-18', 'Perempuan', 'Islam', 'IRT', 'SMA', 'Sumerurip RT09/03'),
(11, 'Yayuk Sari', '1980-10-18', 'Perempuan', 'Islam', 'IRT', 'SMP', 'Wonosewu Sendangadi'),
(12, 'Zulkifli Syukur', '1982-05-22', 'Laki-laki', 'Islam', 'Atlet', 'SMA', 'Demangan RT03/02'),
(13, 'Lukman Hakim', '1981-08-22', 'Laki-laki', 'Islam', 'Pedagang', 'SMA', 'Mekarsari Gunungjati'),
(14, 'Irfan Ali', '1986-07-19', 'Laki-laki', 'Islam', 'Petani', 'SD', 'Rejosari RT03/01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `tb_pendaftaran` (
`id_rawat` tinyint(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `proses` enum('UMUM','KIA','GIGI','') NOT NULL,
  `biaya` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` enum('Selesai','Menunggu...','','') NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `id_karyawan` tinyint(4) DEFAULT NULL,
  `no_cm` char(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_rawat`, `nama`, `tanggal`, `waktu`, `proses`, `biaya`, `status`, `keterangan`, `id_pasien`, `id_karyawan`, `no_cm`) VALUES
(24, 'Rahmat Hanafi', '2017-08-31', '15:50:51', 'UMUM', 10000, 'Aktif', 'Selesai', 1, 5, '1369'),
(25, 'Suprapto', '2017-09-05', '18:25:38', 'UMUM', 10000, 'Aktif', 'Selesai', 2, 5, '0167'),
(26, 'Siti Watiah', '2017-09-12', '10:37:49', 'UMUM', 10000, 'Aktif', 'Selesai', 3, 5, '0459'),
(31, 'Yuniati', '2017-09-19', '08:25:13', 'UMUM', 10000, 'Aktif', 'Selesai', 6, 5, '1346'),
(34, 'Suprapto', '2017-09-22', '13:43:49', 'KIA', 10000, 'Aktif', 'Selesai', 2, 5, '2345'),
(36, 'Siti Watiah', '2017-10-01', '22:00:09', 'KIA', 10000, 'Aktif', 'Selesai', 3, 5, '0245'),
(42, 'Yuniati', '2017-10-03', '09:00:37', 'KIA', 10000, 'Aktif', 'Selesai', 6, 5, '3468'),
(43, 'Irfan Ali', '2017-10-07', '21:16:23', 'GIGI', 10000, 'Aktif', 'Selesai', 14, 5, '1479'),
(44, 'Lukman Hakim', '2017-10-07', '21:16:49', 'GIGI', 10000, 'Aktif', 'Menunggu...', 13, 5, '0579'),
(45, 'Yayuk Sari', '2017-10-07', '21:19:11', 'KIA', 10000, 'Aktif', 'Selesai', 11, 5, '0567'),
(47, 'Zulkifli Syukur', '2017-10-14', '03:50:36', 'UMUM', 10000, 'Aktif', 'Menunggu...', 12, 5, '1256');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekam_medis`
--

CREATE TABLE IF NOT EXISTS `tb_rekam_medis` (
`no_rm` int(11) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `tgl_rekam` date NOT NULL,
  `jam` time NOT NULL,
  `NIP` char(18) DEFAULT NULL,
  `periksa` varchar(30) NOT NULL,
  `diagnosa` varchar(30) NOT NULL,
  `tindakan` varchar(40) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekam_medis`
--

INSERT INTO `tb_rekam_medis` (`no_rm`, `id_pasien`, `tgl_rekam`, `jam`, `NIP`, `periksa`, `diagnosa`, `tindakan`, `biaya`) VALUES
(83, 1, '2017-08-31', '15:51:09', '198403032011561103', 'periksa perut', 'gejala maag', 'kasih obat maag', 53000),
(84, 2, '2017-09-05', '18:26:00', '198403032011561103', 'periksa kepala', 'kurang darah', 'kasih obat', 20000),
(85, 3, '2017-09-12', '10:38:35', '198403032011561103', 'Periksa darah', 'Diabetes', 'kasih insulin', 30000),
(89, 2, '2017-09-22', '14:00:02', '19910730201204077', 'cek kelamin', 'subur', 'kasih obat', 20000),
(99, 6, '2017-10-03', '09:01:50', '19910730201204077', 'cek kandungan', 'bayi sungsang', 'terapi', 33000),
(101, 11, '2017-10-13', '20:20:34', '19910730201204077', 'Gigi berlubang', 'Gigi graham keropos', 'penambalan', 75000),
(102, 14, '2017-10-13', '20:24:24', '198705222014062311', 'Gigi berlubang', 'Gigi graham keropos', 'penambalan', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_resep_obat`
--

CREATE TABLE IF NOT EXISTS `tb_resep_obat` (
`kode_resep` int(11) NOT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `no_rm` int(11) NOT NULL,
  `status` enum('Diambil','Belum Diambil','Tidak Ada Obat','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_resep_obat`
--

INSERT INTO `tb_resep_obat` (`kode_resep`, `id_obat`, `jumlah`, `total`, `no_rm`, `status`) VALUES
(44, 2, 4, 13600, 83, 'Diambil'),
(45, 3, 5, 6250, 84, 'Diambil'),
(46, 4, 3, 4500, 85, 'Diambil'),
(53, 3, 3, 3750, 89, 'Diambil'),
(64, 3, 2, 2500, 99, 'Belum Diambil'),
(65, 5, 2, 34000, 99, 'Belum Diambil'),
(66, 2, 2, 6800, 101, 'Belum Diambil'),
(67, NULL, 0, 0, 102, 'Tidak Ada Obat');

--
-- Triggers `tb_resep_obat`
--
DELIMITER //
CREATE TRIGGER `kurangi_stok` AFTER INSERT ON `tb_resep_obat`
 FOR EACH ROW Begin
UPDATE tb_obat set stok_obat=stok_obat-NEW.jumlah where id_obat=NEW.id_obat;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
`id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `status_bayar` enum('Belum Lunas','Lunas','','') NOT NULL,
  `no_rm` int(11) DEFAULT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `tgl_transaksi`, `id_pasien`, `status_bayar`, `no_rm`, `Total`) VALUES
(1, '2017-08-31', 1, 'Lunas', 83, 66600),
(2, '2017-09-05', 2, 'Lunas', 84, 26250),
(3, '2017-09-12', 3, 'Lunas', 85, 34500),
(7, '2017-09-22', 2, 'Lunas', 89, 23750),
(18, '2017-10-03', 6, 'Belum Lunas', 99, 69500),
(19, '2017-10-13', 11, 'Belum Lunas', 101, 36800),
(20, '2017-10-13', 14, 'Belum Lunas', 102, 55000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
 ADD PRIMARY KEY (`nama_hak_akses`), ADD KEY `id_hak_akses` (`id_hak_akses`);

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
 ADD PRIMARY KEY (`NIP`), ADD KEY `id_dokter` (`id_dokter`), ADD KEY `fk2` (`jenis_poli`), ADD KEY `id_login` (`username`);

--
-- Indexes for table `tb_jenis_poli`
--
ALTER TABLE `tb_jenis_poli`
 ADD PRIMARY KEY (`nama_jenis`), ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
 ADD PRIMARY KEY (`id_karyawan`), ADD KEY `username` (`username`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
 ADD PRIMARY KEY (`username`), ADD KEY `id_login` (`id_login`), ADD KEY `fk1` (`posisi`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
 ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
 ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
 ADD PRIMARY KEY (`id_rawat`), ADD KEY `id_pasien` (`id_pasien`), ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
 ADD PRIMARY KEY (`no_rm`), ADD KEY `id_pasien` (`id_pasien`), ADD KEY `nip` (`NIP`);

--
-- Indexes for table `tb_resep_obat`
--
ALTER TABLE `tb_resep_obat`
 ADD PRIMARY KEY (`kode_resep`), ADD KEY `kode_resep` (`kode_resep`), ADD KEY `no_rm` (`no_rm`), ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
 ADD PRIMARY KEY (`id_transaksi`), ADD UNIQUE KEY `no_rm` (`no_rm`), ADD KEY `fk3` (`id_pasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
MODIFY `id_hak_akses` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
MODIFY `id_dokter` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tb_jenis_poli`
--
ALTER TABLE `tb_jenis_poli`
MODIFY `id_jenis` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
MODIFY `id_karyawan` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
MODIFY `id_login` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
MODIFY `id_rawat` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
MODIFY `no_rm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `tb_resep_obat`
--
ALTER TABLE `tb_resep_obat`
MODIFY `kode_resep` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
ADD CONSTRAINT `fk22` FOREIGN KEY (`jenis_poli`) REFERENCES `tb_jenis_poli` (`nama_jenis`) ON DELETE CASCADE ON UPDATE SET NULL,
ADD CONSTRAINT `tb_dokter_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_login` (`username`);

--
-- Constraints for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
ADD CONSTRAINT `tb_karyawan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_login` (`username`);

--
-- Constraints for table `tb_login`
--
ALTER TABLE `tb_login`
ADD CONSTRAINT `fk1` FOREIGN KEY (`posisi`) REFERENCES `hak_akses` (`nama_hak_akses`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
ADD CONSTRAINT `fk53` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `tb_pendaftaran_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
ADD CONSTRAINT `fk88` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `fk99` FOREIGN KEY (`NIP`) REFERENCES `tb_dokter` (`NIP`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_resep_obat`
--
ALTER TABLE `tb_resep_obat`
ADD CONSTRAINT `tb_resep_obat_ibfk_1` FOREIGN KEY (`no_rm`) REFERENCES `tb_rekam_medis` (`no_rm`),
ADD CONSTRAINT `tb_resep_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
ADD CONSTRAINT `fk3` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk70` FOREIGN KEY (`no_rm`) REFERENCES `tb_rekam_medis` (`no_rm`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
