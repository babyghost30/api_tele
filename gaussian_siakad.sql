-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2018 at 01:45 PM
-- Server version: 5.5.59-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaussian_siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `student_number` varchar(15) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tgl_create` varchar(15) NOT NULL,
  `note` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`student_number`, `gambar`, `tgl_create`, `note`) VALUES
('1718010001', 'file_1518619294.png', '14-02-2018', 'drzgdftgdr'),
('1718010001', 'file_1518619315.png', '14-02-2018', 'fsgsrdg'),
('1718010002', 'file_1518667711.png', '15 - Feb - 2018', 'testt'),
('1718010002', 'file_1518671071.jpeg', '15 - Feb - 2018', 'kegiatan luar biasa'),
('1718010001', 'file_1522761487.jpg', '03 - Apr - 2018', 'coba coba');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nik` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_panggilan` varchar(20) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(12) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `wn` varchar(4) NOT NULL,
  `pendidikan` varchar(4) NOT NULL,
  `status` varchar(15) NOT NULL,
  `jumlah_anak` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`nik`, `password`, `nama_lengkap`, `nama_panggilan`, `no_ktp`, `tempat_lahir`, `ttl`, `jenis_kelamin`, `agama`, `wn`, `pendidikan`, `status`, `jumlah_anak`, `alamat`, `no_hp`, `email`, `foto`) VALUES
('111201408450', '304e2a3b544f6b9f267a151e1bcee487', 'Muh Aziz S', 'aziz', '11111996011235', 'Semarang', '1996-11-11', '', '', '', 'S1', '', '-', '', '082136830853', 'ust.crew404@gmail.com', 'file_1522776082.jpg'),
('001040417', '304e2a3b544f6b9f267a151e1bcee487', 'Atikah Hidayati', 'Tikka', '3317106702960007', 'Rembang', '1996-02-27', 'Perempuan', 'Islam', 'WNI', 'SMA', 'Belum Menikah', '', ' ', '085741747827', 'tikkaefendi@gmail.com', 'file_1525060406.jpg'),
('000000000', '1d15471434f29c97c57c78a7d8d0125d', 'Admin Admin', 'Admin', '3317106702960007', 'Rembang', '1996-02-27', 'Perempuan', 'Islam', 'WNI', 'SMA', 'Belum Menikah', '', ' ', '085741747827', 'tikkaefendi@gmail.com', 'file_1525060406.jpg'),
('002120717', '304e2a3b544f6b9f267a151e1bcee487', 'Pujiyanti Nurul Palupi', 'Lupi', '3303097006870003', 'Blora', '1987-06-30', 'Perempuan', 'Islam', 'WNI', 'S1', 'Sudah Menikah', '2', ' ', '085712407133', 'lupiprambudi@gmail.com', 'file_1531190913.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_ekstra`
--

CREATE TABLE `tb_nilai_ekstra` (
  `student_number` varchar(15) NOT NULL,
  `angklung` varchar(3) NOT NULL,
  `cooking` varchar(3) NOT NULL,
  `dancing` varchar(3) NOT NULL,
  `drawing` varchar(3) NOT NULL,
  `farming` varchar(3) NOT NULL,
  `notes` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai_ekstra`
--

INSERT INTO `tb_nilai_ekstra` (`student_number`, `angklung`, `cooking`, `dancing`, `drawing`, `farming`, `notes`) VALUES
('1718010001', 'G', 'G', 'WD', 'G', 'GT', 'wdawdadaw'),
('1718010002', 'GT', 'GT', 'GT', 'GT', 'GT', 'esdfcsaewacawdawdwad'),
('1718010003', 'G', 'WD', 'GT', 'G', 'WD', 'sangat kreatif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_hafalan`
--

CREATE TABLE `tb_nilai_hafalan` (
  `student_number` varchar(15) NOT NULL,
  `marking_A` varchar(3) NOT NULL,
  `marking_B` varchar(3) NOT NULL,
  `marking_C` varchar(3) NOT NULL,
  `marking_D` varchar(3) NOT NULL,
  `marking_E` varchar(2) NOT NULL,
  `marking_F` varchar(2) NOT NULL,
  `marking_G` varchar(2) NOT NULL,
  `marking_H` varchar(2) NOT NULL,
  `marking_I` varchar(2) NOT NULL,
  `marking_J` varchar(2) NOT NULL,
  `marking_K` varchar(2) NOT NULL,
  `marking_L` varchar(2) NOT NULL,
  `marking_M` varchar(2) NOT NULL,
  `marking_N` varchar(2) NOT NULL,
  `marking_O` varchar(2) NOT NULL,
  `marking_P` varchar(2) NOT NULL,
  `marking_Q` varchar(2) NOT NULL,
  `notes` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai_hafalan`
--

INSERT INTO `tb_nilai_hafalan` (`student_number`, `marking_A`, `marking_B`, `marking_C`, `marking_D`, `marking_E`, `marking_F`, `marking_G`, `marking_H`, `marking_I`, `marking_J`, `marking_K`, `marking_L`, `marking_M`, `marking_N`, `marking_O`, `marking_P`, `marking_Q`, `notes`) VALUES
('1718010001', 'E', 'WD', 'G', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', '4ewsfrgvefsefsef'),
('1718010003', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'qwdawdaw');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_karakter`
--

CREATE TABLE `tb_nilai_karakter` (
  `student_number` varchar(15) NOT NULL,
  `marking_A` varchar(2) NOT NULL,
  `marking_B` varchar(2) NOT NULL,
  `marking_C` varchar(2) NOT NULL,
  `marking_D` varchar(2) NOT NULL,
  `marking_E` varchar(2) NOT NULL,
  `marking_F` varchar(2) NOT NULL,
  `marking_G` varchar(2) NOT NULL,
  `marking_H` varchar(2) NOT NULL,
  `marking_I` varchar(2) NOT NULL,
  `marking_J` varchar(2) NOT NULL,
  `marking_K` varchar(2) NOT NULL,
  `marking_L` varchar(2) NOT NULL,
  `marking_M` varchar(2) NOT NULL,
  `marking_N` varchar(2) NOT NULL,
  `marking_O` varchar(2) NOT NULL,
  `marking_P` varchar(2) NOT NULL,
  `marking_Q` varchar(2) NOT NULL,
  `marking_R` varchar(2) NOT NULL,
  `marking_S` varchar(2) NOT NULL,
  `marking_T` varchar(2) NOT NULL,
  `marking_U` varchar(2) NOT NULL,
  `marking_V` varchar(2) NOT NULL,
  `marking_W` varchar(2) NOT NULL,
  `marking_X` varchar(2) NOT NULL,
  `marking_Y` varchar(2) NOT NULL,
  `marking_Z` varchar(2) NOT NULL,
  `marking_AA` varchar(2) NOT NULL,
  `marking_AB` varchar(2) NOT NULL,
  `marking_AC` varchar(2) NOT NULL,
  `marking_AD` varchar(2) NOT NULL,
  `marking_AE` varchar(2) NOT NULL,
  `marking_AF` varchar(2) NOT NULL,
  `marking_AG` varchar(2) NOT NULL,
  `marking_AH` varchar(2) NOT NULL,
  `marking_AI` varchar(2) NOT NULL,
  `marking_AJ` varchar(2) NOT NULL,
  `marking_AK` varchar(2) NOT NULL,
  `marking_AL` varchar(2) NOT NULL,
  `marking_AM` varchar(2) NOT NULL,
  `marking_AN` varchar(2) NOT NULL,
  `marking_AO` varchar(2) NOT NULL,
  `marking_AP` varchar(2) NOT NULL,
  `marking_AQ` varchar(2) NOT NULL,
  `marking_AR` varchar(2) NOT NULL,
  `marking_AS` varchar(2) NOT NULL,
  `marking_AT` varchar(2) NOT NULL,
  `marking_AU` varchar(2) NOT NULL,
  `marking_AV` varchar(2) NOT NULL,
  `marking_AW` varchar(2) NOT NULL,
  `marking_AX` varchar(2) NOT NULL,
  `marking_AY` varchar(2) NOT NULL,
  `marking_AZ` varchar(2) NOT NULL,
  `marking_AAA` varchar(2) NOT NULL,
  `marking_AAB` varchar(2) NOT NULL,
  `marking_AAC` varchar(2) NOT NULL,
  `marking_AAD` varchar(2) NOT NULL,
  `marking_AAE` varchar(2) NOT NULL,
  `marking_AAF` varchar(2) NOT NULL,
  `marking_AAG` varchar(2) NOT NULL,
  `marking_AAH` varchar(2) NOT NULL,
  `marking_AAI` varchar(2) NOT NULL,
  `marking_AAJ` varchar(2) NOT NULL,
  `marking_AAK` varchar(2) NOT NULL,
  `marking_AAL` varchar(2) NOT NULL,
  `marking_AAM` varchar(2) NOT NULL,
  `marking_AAN` varchar(2) NOT NULL,
  `marking_AAO` varchar(2) NOT NULL,
  `marking_AAP` varchar(2) NOT NULL,
  `marking_AAQ` varchar(2) NOT NULL,
  `marking_AAR` varchar(2) NOT NULL,
  `marking_AAS` varchar(2) NOT NULL,
  `marking_AAT` varchar(2) NOT NULL,
  `marking_AAU` varchar(2) NOT NULL,
  `marking_AAV` varchar(2) NOT NULL,
  `marking_AAW` varchar(2) NOT NULL,
  `marking_AAX` varchar(2) NOT NULL,
  `marking_AAY` varchar(2) NOT NULL,
  `marking_AAZ` varchar(2) NOT NULL,
  `marking_A1` varchar(2) NOT NULL,
  `notes` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai_karakter`
--

INSERT INTO `tb_nilai_karakter` (`student_number`, `marking_A`, `marking_B`, `marking_C`, `marking_D`, `marking_E`, `marking_F`, `marking_G`, `marking_H`, `marking_I`, `marking_J`, `marking_K`, `marking_L`, `marking_M`, `marking_N`, `marking_O`, `marking_P`, `marking_Q`, `marking_R`, `marking_S`, `marking_T`, `marking_U`, `marking_V`, `marking_W`, `marking_X`, `marking_Y`, `marking_Z`, `marking_AA`, `marking_AB`, `marking_AC`, `marking_AD`, `marking_AE`, `marking_AF`, `marking_AG`, `marking_AH`, `marking_AI`, `marking_AJ`, `marking_AK`, `marking_AL`, `marking_AM`, `marking_AN`, `marking_AO`, `marking_AP`, `marking_AQ`, `marking_AR`, `marking_AS`, `marking_AT`, `marking_AU`, `marking_AV`, `marking_AW`, `marking_AX`, `marking_AY`, `marking_AZ`, `marking_AAA`, `marking_AAB`, `marking_AAC`, `marking_AAD`, `marking_AAE`, `marking_AAF`, `marking_AAG`, `marking_AAH`, `marking_AAI`, `marking_AAJ`, `marking_AAK`, `marking_AAL`, `marking_AAM`, `marking_AAN`, `marking_AAO`, `marking_AAP`, `marking_AAQ`, `marking_AAR`, `marking_AAS`, `marking_AAT`, `marking_AAU`, `marking_AAV`, `marking_AAW`, `marking_AAX`, `marking_AAY`, `marking_AAZ`, `marking_A1`, `notes`) VALUES
('1718010001', 'G', 'G', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'efs3ef3sf3fawfsef'),
('1718010002', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'GT', 'a2wed2e2ea');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_panggilan` varchar(20) NOT NULL,
  `tmp_lahir` varchar(30) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `anak_ke` int(11) NOT NULL,
  `jml_sdr` int(11) NOT NULL,
  `kewarganegaraan` varchar(20) DEFAULT NULL,
  `brt_badan` varchar(3) NOT NULL,
  `tinggi_bdn` int(11) NOT NULL,
  `almt_rumah` text NOT NULL,
  `jarak` varchar(5) NOT NULL,
  `penyakit` varchar(20) NOT NULL,
  `penyakit_berat` varchar(20) NOT NULL,
  `pantangan_makanan` varchar(20) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `tempat_ayah` varchar(20) NOT NULL,
  `tgl_lahir_ayah` varchar(50) NOT NULL,
  `agama_ayah` varchar(20) DEFAULT NULL,
  `kwn_ayah` varchar(20) DEFAULT NULL,
  `pend_ayah` varchar(20) NOT NULL,
  `pekerjaan_ayah` varchar(20) NOT NULL,
  `alamat_kantor_ayah` text NOT NULL,
  `penghasilan_ayah` varchar(20) NOT NULL,
  `no_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `tempat_ibu` varchar(20) NOT NULL,
  `tgl_lahir_ibu` varchar(50) NOT NULL,
  `agama_ibu` varchar(20) DEFAULT NULL,
  `kwn_ibu` varchar(20) DEFAULT NULL,
  `pend_ibu` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(20) NOT NULL,
  `alamat_kantor_ibu` text NOT NULL,
  `penghasilan_ibu` varchar(20) NOT NULL,
  `no_ibu` varchar(12) NOT NULL,
  `nama_jmpt_1` varchar(20) NOT NULL,
  `no_jmpt_1` varchar(15) NOT NULL,
  `nama_jmpt_2` varchar(20) NOT NULL,
  `no_jmpt_2` varchar(12) NOT NULL,
  `nama_jmpt_3` varchar(20) NOT NULL,
  `no_jmpt_3` varchar(12) NOT NULL,
  `foto_siswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tampung`
--

CREATE TABLE `tb_tampung` (
  `id_siswa` int(11) NOT NULL,
  `nama_lengkap_siswa` varchar(50) NOT NULL,
  `nama_panggilan` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `jumlah_sdr` varchar(2) NOT NULL,
  `wn` varchar(4) NOT NULL,
  `berat_badan` varchar(4) NOT NULL,
  `tinggi_badan` varchar(4) NOT NULL,
  `alamat_rumah` text NOT NULL,
  `jarak_rumah` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tampung`
--

INSERT INTO `tb_tampung` (`id_siswa`, `nama_lengkap_siswa`, `nama_panggilan`, `tempat_lahir`, `ttl`, `jenis_kelamin`, `agama`, `anak_ke`, `jumlah_sdr`, `wn`, `berat_badan`, `tinggi_badan`, `alamat_rumah`, `jarak_rumah`) VALUES
(1, 'indirwan', 'wawan', 'tegal', '2010-07-06', 'Laki-Laki', 'Islam', 2, '3', 'WNI', '34', '60', 'Semarang RT 04/01', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nickname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nickname`) VALUES
(1, 'babyghost', 'tester', 'babyghost'),
(2, 'pys404', 'f5d1278e8109edd94e1e4197e04873b9', 'yanuar'),
(3, 'administrator', 'fe4a6390b1b5dc65fec195542d4dcfbb', 'administrator'),
(5, 'admin', '1d15471434f29c97c57c78a7d8d0125d', 'none');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_nilai_ekstra`
--
ALTER TABLE `tb_nilai_ekstra`
  ADD PRIMARY KEY (`student_number`);

--
-- Indexes for table `tb_nilai_hafalan`
--
ALTER TABLE `tb_nilai_hafalan`
  ADD PRIMARY KEY (`student_number`);

--
-- Indexes for table `tb_nilai_karakter`
--
ALTER TABLE `tb_nilai_karakter`
  ADD PRIMARY KEY (`student_number`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tampung`
--
ALTER TABLE `tb_tampung`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_tampung`
--
ALTER TABLE `tb_tampung`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
