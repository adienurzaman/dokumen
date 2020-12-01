-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 01:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iqbal`
--

-- --------------------------------------------------------

--
-- Table structure for table `standar`
--

CREATE TABLE `standar` (
  `id_standar` int(11) NOT NULL,
  `parent_standar` int(5) NOT NULL,
  `level_standar` int(10) NOT NULL,
  `nama_standar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standar`
--

INSERT INTO `standar` (`id_standar`, `parent_standar`, `level_standar`, `nama_standar`) VALUES
(1, 0, 1, 'VISI, MISI, TUJUAN DAN STRATEGI'),
(2, 0, 1, 'TATA PAMONG, TATA KELOLA, DAN KERJASAMA'),
(3, 0, 1, 'MAHASISWA'),
(4, 0, 1, 'SUMBER DAYA MANUSIA '),
(5, 0, 1, 'KEUANGAN, SARANA DAN PRASARANA'),
(6, 0, 1, 'PENDIDIKAN '),
(7, 0, 1, 'PENELITIAN'),
(8, 0, 1, 'PENGABDIAN KEPADA MASYARAKAT '),
(9, 0, 1, 'LUARAN DAN CAPAIAN TRIDHARMA'),
(10, 1, 2, 'Tabel 1.1. Dasar Penyusunan dan Mekanisme Penyusunan Visi, Misi, Tujuan dan Sasaran'),
(11, 1, 2, 'Tabel 1.2. Pernyataan Tonggak-Tonggak Capaian (Milestones) Tujuan'),
(12, 11, 3, 'Tabel 1.1. Rumusan Tujuan dan Pentahapan Renstra '),
(13, 11, 3, 'Tabel 1.2. Sasaran, Strategi dan Tahun Pencapaian '),
(14, 1, 2, 'Tabel 1.3. Sosialisasi Visi, Misi, Tujuan, Sasaran dan Strategi Pencapaian dan Penggunaannya Sebagai Acuan dalam Penyusunan Rencana Kerja Institusi PT'),
(15, 14, 3, 'Tabel 1.3.1  Sosialisasi Visi, Misi, Tujuan, dan Sasaran PT Agar Dipahami Seluruh Pemangku Kepentingan (Sivitas Akademika, Tenaga Kependidikan, Pengguna Lulusan, dan Masyarakat)'),
(16, 14, 3, 'Tabel 1.3.2  Visi, Misi, Tujuan, dan Sasaran PT Serta Strategi Pencapaiannya Untuk Dijadikan Sebagai Acuan Semua Unit Dalam Institusi Perguruan Tinggi Dalam Menyusun Rencana Strategis (Renstra) dan/atau Rencana Kerja Unit Bersangkutan'),
(17, 1, 2, 'Latar Belakang'),
(18, 1, 2, 'Kebijakan'),
(19, 1, 2, 'Strategi Pencapaian VMTS'),
(20, 1, 2, 'Indikator Kinerja Utama'),
(21, 1, 2, 'Indikator Kinerja Tambahan'),
(22, 1, 2, 'Evaluasi Capaian Kinerja'),
(23, 1, 2, 'Kesimpulan Hasil Evaluasi Ketercapaian VMTS dan Tindak Lanjut'),
(24, 2, 2, 'Tabel 1 Kerjasama Tridharma'),
(25, 2, 2, 'Latar Belakang'),
(26, 2, 2, 'Kebijakan'),
(27, 2, 2, 'Standar Perguruan Tinggi dan Strategi Pencapaian'),
(28, 2, 2, 'Indikator Kinerja Utama'),
(29, 2, 2, 'Indikator Kinerja Tambahan'),
(30, 2, 2, 'Evaluasi Capaian Kinerja'),
(31, 2, 2, 'Penjaminan Mutu Tata Pamong, Tata Kelola, dan\r\nKerjasama'),
(32, 2, 2, 'Kepuasan Pengguna'),
(33, 2, 2, 'Kesimpulan Hasil Evaluasi Ketercapaian dan Tindak Lanjut'),
(34, 3, 2, 'Tabel 2.a Seleksi Mahasiswa'),
(35, 3, 2, 'Tabel 2.b Mahasiswa Asing'),
(36, 3, 2, 'Latar Belakang'),
(37, 3, 2, 'Kebijakan'),
(38, 3, 2, 'Standar Perguruan Tinggi dan Strategi Pencapaian'),
(39, 3, 2, 'Indikator Kinerja Utama'),
(40, 3, 2, 'Indikator Kinerja Tambahan'),
(41, 3, 2, 'Evaluasi Capaian Kinerja'),
(42, 3, 2, 'Penjaminaan Mutu Mahasiswa'),
(43, 3, 2, 'Kepuasan Pengguna'),
(44, 3, 2, 'Kesimpulan Hasil Evaluasi Ketercapaian dan Tindak Lanjut'),
(45, 4, 2, 'Tabel 3.a.1) Dosen Tetap Perguruan Tinggi yang ditugaskan sebagai pengampu mata kuliah di Program Studi yang diakreditasi '),
(46, 4, 2, 'Tabel 3.a.2) Dosen Pembimbing Utama Tugas Akhir '),
(47, 4, 2, 'Tabel 3.a.3) Ekuivalen Waktu Mengajar Penuh (EWMP) Dosen Tetap Perguruan Tinggi'),
(48, 4, 2, 'Tabel 3.a.4) Dosen Tidak Tetap yang ditugaskan sebagai pengampu mata kuliah di Program Studi yang Diakreditasi  '),
(49, 4, 2, 'Tabel 3.b.1) Pengakuan/Rekognisi DTPS  '),
(50, 4, 2, 'Tabel 3.b.2) Penelitian DTPS'),
(51, 4, 2, 'Tabel 3.b.3) Pengabdian kepada Masyarakat (PkM) DTPS '),
(52, 4, 2, 'Tabel 3.b.4) Publikasi Ilmiah DTPS '),
(53, 4, 2, 'Tabel 3.b.5) Karya ilmiah DTPS yang disitasi dalam 3 tahun terakhir '),
(54, 4, 2, 'Tabel 3.b.7) Luaran Penelitian/PkM Lainnya oleh DTPS'),
(55, 4, 2, 'Latar Belakang '),
(56, 4, 2, 'Kebijakan '),
(57, 4, 2, 'Standar Perguruan Tinggi dan Strategi Pencapaian'),
(58, 4, 2, 'Indikator Kinerja Utama'),
(59, 4, 2, 'Indikator Kinerja Tambahan'),
(60, 4, 2, 'Evaluasi Capaian Kinerja'),
(61, 4, 2, 'Penjaminaan Mutu SDM'),
(62, 4, 2, 'Kepuasan Pengguna'),
(63, 4, 2, 'Kesimpulan Hasil Evaluasi Ketercapaian dan Tindak Lanjut'),
(64, 5, 2, 'Tabel 4 Penggunaan Dana '),
(65, 5, 2, 'Latar Belakang'),
(66, 5, 2, 'Kebijakan'),
(67, 5, 2, 'Standar Perguruan Tinggi dan Strategi Pencapaian'),
(68, 5, 2, 'Indikator Kinerja Utama'),
(69, 5, 2, 'Indikator Kinerja Tambahan'),
(70, 5, 2, 'Evaluasi Capaian Kinerja'),
(71, 5, 2, 'Penjaminaan Mutu Keuangan dan Sarpras'),
(72, 5, 2, 'Kepuasan Pengguna'),
(73, 5, 2, 'Kesimpulan Hasil Evaluasi Ketercapaian dan Tindak Lanjut'),
(74, 6, 2, 'Tabel 5.a Kurikulum, Capaian Pembelajaran, dan Rencana Pembelajaran '),
(75, 6, 2, 'Tabel 5.b Integrasi Kegiatan Penelitian/PkM dalam Pembelajaran '),
(76, 6, 2, 'Tabel 5.c Kepuasan Mahasiswa '),
(77, 6, 2, 'Latar Belakang'),
(78, 6, 2, 'Kebijakan'),
(79, 6, 2, 'Standar Perguruan Tinggi dan Strategi Pencapaian'),
(80, 6, 2, 'Indikator Kinerja Utama'),
(81, 6, 2, 'Indikator Kinerja Tambahan'),
(82, 6, 2, 'Evaluasi Capaian Kinerja'),
(83, 6, 2, 'Penjaminaan Mutu Pendidikan'),
(84, 6, 2, 'Kepuasan Pengguna'),
(85, 6, 2, 'Kesimpulan Hasil Evaluasi Ketercapaian dan Tindak Lanjut'),
(86, 7, 2, ' Tabel 6.a Penelitian DTPS yang melibatkan mahasiswa'),
(87, 7, 2, 'Tabel 6.b Penelitian DTPS yang menjadi rujukan tema tesis/disertasi'),
(88, 7, 2, 'Latar Belakang'),
(89, 7, 2, 'Kebijakan'),
(90, 7, 2, 'Standar Perguruan Tinggi dan Strategi Pencapaian'),
(91, 7, 2, 'Indikator Kinerja Utama'),
(92, 7, 2, 'Indikator Kinerja Tambahan'),
(93, 7, 2, 'Evaluasi Capaian Kinerja'),
(94, 7, 2, 'Penjaminaan Mutu Penelitian'),
(95, 7, 2, 'Kepuasan Pengguna'),
(96, 7, 2, 'Kesimpulan Hasil Evaluasi Ketercapaian dan Tindak Lanjut'),
(97, 8, 2, 'Tabel 7. PkM DTPS yang melibatkan mahasiswa'),
(98, 8, 2, 'Latar Belakang'),
(99, 8, 2, 'Kebijakan'),
(100, 8, 2, 'Standar Perguruan Tinggi dan Strategi Pencapaian'),
(101, 8, 2, 'Indikator Kinerja Utama'),
(102, 8, 2, 'Indikator Kinerja Tambahan'),
(103, 8, 2, 'Evaluasi Capaian Kinerja'),
(104, 8, 2, 'Penjaminaan Mutu Pengabdian'),
(105, 8, 2, 'Kepuasan Pengguna'),
(106, 8, 2, 'Kesimpulan Hasil Evaluasi Ketercapaian dan Tindak Lanjut'),
(107, 9, 2, 'Tabel 8.a IPK Lulusan'),
(108, 9, 2, 'Tabel 8.b.1) Prestasi Akademik'),
(109, 9, 2, 'Tabel 8.b.2) Prestasi Nonakademik Mahasiswa'),
(110, 9, 2, 'Tabel 8.c. Masa Studi Lulusan Program Studi'),
(111, 9, 2, 'Tabel 8.d.1) Waktu Tunggu Lulusan'),
(112, 9, 2, 'Tabel 8.d.2) Kesesuaian Bidang Kerja Lulusan'),
(113, 9, 2, 'Tabel 8.e.1) Tempat Kerja Lulusan'),
(114, 9, 2, 'Tabel 8.e.2) Kepuasan Pengguna'),
(115, 9, 2, 'Tabel 8.f.1) Publikasi Ilmiah mahasiswa'),
(116, 9, 2, 'Tabel 8.f.2) Karya ilmiah mahasiswa yang disitasi'),
(117, 9, 2, 'Tabel 8.f.4) Luaran penelitian/PkM yang dihasilkan mahasiswa'),
(118, 9, 2, 'Indikator Kinerja Utama'),
(119, 9, 2, 'Indikator Kinerja Tambahan'),
(120, 9, 2, 'Evaluasi Capaian Kinerja'),
(121, 9, 2, 'Penjaminaan Mutu SDM'),
(122, 9, 2, 'Kepuasan Pengguna'),
(123, 9, 2, 'Kesimpulan Hasil Evaluasi Ketercapaian dan Tindak Lanjut'),
(124, 0, 1, 'LUARAN DAN CAPAIAN TRIDHARMA 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `standar`
--
ALTER TABLE `standar`
  ADD PRIMARY KEY (`id_standar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `standar`
--
ALTER TABLE `standar`
  MODIFY `id_standar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
