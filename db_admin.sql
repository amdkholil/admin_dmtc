-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Jul 2017 pada 14.22
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_admin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `action`
--

CREATE TABLE `action` (
  `id_action` int(11) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `action`
--

INSERT INTO `action` (`id_action`, `action`) VALUES
(1, 'Lapping'),
(2, 'Cleaning'),
(3, 'Cek Cooling'),
(4, 'Cek Squeeze'),
(5, 'Coating'),
(7, 'Finishing'),
(8, 'Overlay'),
(10, 'Ganti Oring'),
(11, 'Ganti Corepin'),
(12, 'Awase'),
(14, 'Spoting'),
(16, 'Washing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `die`
--

CREATE TABLE `die` (
  `id_die` int(11) NOT NULL,
  `name_die` varchar(50) NOT NULL,
  `nick_die` varchar(16) NOT NULL,
  `no_die` varchar(16) NOT NULL,
  `kategori` varchar(16) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `die`
--

INSERT INTO `die` (`id_die`, `name_die`, `nick_die`, `no_die`, `kategori`, `location`) VALUES
(1, 'FC 10SRE15 (IMV)', 'FC SRE15', '311-144-000', 'Casting', 'R21'),
(2, 'FC 10SRE18 (IMV)', 'FC SRE18', '311-146-000', 'Casting', 'R22'),
(3, 'FC 10SRE11 (IMV)`', 'FC SRE11', '', 'Casting', ''),
(4, 'FH 10SA13C (D46T A)', 'FH D46T A', '', 'Casting', ''),
(5, 'FH 10SA13C (D46T B)', 'FH D46T B', '', '', ''),
(6, 'FH 10SA13C (D46T J3)', 'FH D46T J3', '', '', ''),
(7, 'FH 10SA13C (D46T J4)', 'FH D46T J4', '', '', ''),
(8, 'FH 10SA13C (D46T J5)', 'FH D46T J5', '', 'Moulding', ''),
(9, 'FH 10SA13C (D46T J6)', 'FH D46T J6', '', '', ''),
(10, 'FC 10SRE15 (PAJERO)', 'FC PAJERO', '', '', ''),
(11, 'RC 10SRE15C (PAJERO)', 'RC PAJERO', '', 'Casting', ''),
(12, 'FC 10SA13C (D46T A)', 'FC D46T A', '', '', ''),
(13, 'FC 10SA13C (D46T B)', 'FC D46T B', '', '', ''),
(14, 'RH 10SRE11 (IMV)', 'RH SRE11', '', '', ''),
(15, 'RH 10SRE15 (IMV)', 'RH SRE15', '', '', ''),
(16, 'RH 10SRE18 (IMV)', 'RH SRE18', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama`, `jabatan`) VALUES
(1, 'Maryanto', 'Leader'),
(2, 'Sugiyo', 'Foreman'),
(3, 'Slamet', 'Teknisi'),
(4, 'Hosni', 'Teknisi'),
(5, 'Kholil', 'Teknisi'),
(6, 'Agus', 'Teknisi'),
(7, 'Elis', 'Teknisi'),
(8, 'Yoga', 'Teknisi'),
(9, 'Sukirno', 'Leader'),
(10, 'Muhroji', 'Teknisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mesin`
--

CREATE TABLE `mesin` (
  `id_mesin` int(11) NOT NULL,
  `kd_mesin` varchar(6) NOT NULL,
  `nama_mesin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mesin`
--

INSERT INTO `mesin` (`id_mesin`, `kd_mesin`, `nama_mesin`) VALUES
(1, 'DCM 3', 'Die Casting Machine 3'),
(2, 'DCM 4', 'Die Casting Machine 4'),
(3, 'DCM 5', 'Die Casting Machine 5'),
(4, 'DCM 6', 'Die Casting Machine 6'),
(5, 'DCM 7', 'Die Casting Machine 7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `problem`
--

CREATE TABLE `problem` (
  `id_problem` int(11) NOT NULL,
  `problem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `problem`
--

INSERT INTO `problem` (`id_problem`, `problem`) VALUES
(1, 'Galling'),
(2, 'Part Nempel di Cavity'),
(3, 'Part Nempel di Chillvent'),
(5, 'Corepin Patah'),
(6, 'Cooling Bocor'),
(7, 'Squeeze Bocor'),
(8, 'Soldermark'),
(9, 'Die Flushing'),
(10, 'Core/Cavity Retak, Missrun'),
(11, 'Ejector Abnormal'),
(13, 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `problem_die`
--

CREATE TABLE `problem_die` (
  `id_problem_die` int(11) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(6) NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `id_die` int(11) NOT NULL,
  `id_problem` int(11) NOT NULL,
  `detail_problem` text NOT NULL,
  `action` text NOT NULL,
  `freq` int(11) NOT NULL,
  `minutes` int(11) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `problem_die`
--

INSERT INTO `problem_die` (`id_problem_die`, `date`, `shift`, `id_mesin`, `id_die`, `id_problem`, `detail_problem`, `action`, `freq`, `minutes`, `id_member`) VALUES
(1, '2017-06-01', 'Siang', 1, 4, 4, 'Slidecore', 'Lapping															', 1, 20, 5),
(4, '2017-06-08', 'Siang', 4, 3, 2, 'adlfnvan', 'Lapping, 															', 3, 60, 4),
(5, '2017-07-12', 'Siang', 2, 4, 1, '', 'Cleaning, ', 2, 20, 1),
(6, '2017-07-04', 'Siang', 3, 13, 3, '', 'Lapping, ', 1, 20, 5),
(7, '2017-07-23', 'Siang', 3, 2, 2, '', 'Burning, Lepas Material', 1, 30, 8),
(8, '2017-07-04', 'Siang', 1, 4, 1, '', 'Lapping, ', 2, 30, 4),
(9, '2017-07-02', 'Siang', 3, 10, 1, '', 'Lapping, ', 1, 15, 8),
(10, '2017-07-03', 'Siang', 4, 6, 6, 'Hose robek', 'potong hose, sambung kembali', 1, 20, 3),
(11, '2017-07-06', 'Siang', 3, 2, 5, 'J2', 'Dandori', 1, 30, 9),
(12, '2017-07-10', 'Siang', 4, 2, 9, '', 'Cleaning, ', 1, 10, 7),
(13, '2017-07-10', 'Siang', 3, 13, 9, '', 'Cleaning, ', 1, 15, 4),
(14, '2017-07-11', 'Siang', 4, 1, 1, '', 'Lapping, ', 2, 30, 4),
(15, '2017-07-12', 'Siang', 2, 10, 1, '', 'Lapping, ', 2, 30, 6),
(16, '2017-07-12', 'Siang', 1, 1, 5, 'posisi j2', 'dandori', 1, 30, 1),
(17, '2017-07-13', 'Siang', 2, 13, 1, '', 'Lapping, ', 1, 20, 8),
(18, '2017-07-14', 'Siang', 3, 9, 8, 'Cavity J1', 'Finishing, Overlay, ', 25, 1, 3),
(19, '2017-07-17', 'Siang', 3, 10, 3, '', 'Finishing, ', 2, 30, 3),
(20, '2017-07-20', 'Siang', 1, 2, 1, '', 'Lapping, ', 2, 35, 7),
(21, '2017-07-19', 'Siang', 4, 1, 7, 'Posisi Slidecore', 'Dandori', 1, 30, 3),
(22, '2017-07-21', 'Siang', 2, 4, 6, 'Fitting pecah', 'ganti fitting', 1, 10, 4),
(23, '2017-07-22', 'Siang', 1, 9, 1, '', 'Lapping, ', 1, 10, 8),
(24, '2017-07-23', 'Malam', 1, 13, 9, '', 'Finishing, ', 1, 15, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `repair_die`
--

CREATE TABLE `repair_die` (
  `id_repair_die` int(11) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(5) NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `id_die` int(11) NOT NULL,
  `pm_bm` varchar(4) NOT NULL,
  `id_problem` int(11) NOT NULL,
  `action` text NOT NULL,
  `minutes` int(11) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `repair_die`
--

INSERT INTO `repair_die` (`id_repair_die`, `date`, `shift`, `id_mesin`, `id_die`, `pm_bm`, `id_problem`, `action`, `minutes`, `id_member`) VALUES
(3, '2017-05-18', 'Malam', 2, 1, 'PM', 1, 'Lapping,', 12, 3),
(4, '2017-05-18', 'siang', 2, 2, 'PM', 2, 'Laping, ', 15, 1),
(5, '2017-05-18', 'Siang', 1, 2, 'PM', 1, 'Lapping, ', 15, 3),
(6, '2017-05-18', 'Siang', 1, 1, 'PM', 1, 'Lapping, Coating, ', 20, 3),
(7, '2017-05-18', 'Siang', 1, 1, 'PM', 1, 'Lapping, ', 12, 3),
(8, '2017-05-18', 'Siang', 2, 1, 'PM', 1, 'Lapping, ', 23, 3),
(9, '2017-05-18', 'Siang', 2, 2, 'PM', 2, 'Finishing, ', 120, 3),
(10, '2017-05-18', 'Siang', 2, 2, 'PM', 2, 'Finishing, Lapping, Cleaning, ', 30, 2),
(11, '2017-05-11', 'Siang', 2, 2, 'PM', 1, 'asfse afaefawev av;amedvae dfae ', 3, 2),
(12, '2017-05-19', 'Siang', 1, 1, 'PM', 1, 'Lapping, Cek Cooling, ', 120, 1),
(13, '2017-05-19', 'Malam', 1, 2, 'PM', 2, 'Cek Squeeze, ', 30, 2),
(14, '2017-05-19', 'Malam', 2, 2, 'PM', 1, 'Lapping, ', 120, 2),
(15, '2017-05-19', 'Siang', 2, 1, 'BM', 2, 'Lapping, ', 130, 2),
(16, '2017-05-19', 'Malam', 2, 2, 'PM', 1, 'zhdrug ne ahriga gewhfvais evaguenv avgznrg gazernvagr zhdrug ne ahriga gewhfvais evaguenv avgznrg gazernvagr zhdrug ne ahriga gewhfvais evaguenv avgznrg gazernvagr zhdrug ne ahriga gewhfvais evaguenv avgznrg gazernvagr zhdrug ne ahriga gewhfvais evaguenv avgznrg gazernvagr', 130, 1),
(17, '2017-05-19', 'Malam', 2, 1, 'BM', 1, 'fajkawelf ahf aiewhfi awehaiuhe viehraga errgvhaihegr va;weojf gqao g gahigfa hfoaerrv aevyga irh garehgqaerfiaherg ahrg aher g qarehgqa rhge rgahergpi aervgaehr oager hgqaerjpaqeir edfv ahe', 120, 2),
(18, '2017-05-23', 'Siang', 2, 1, 'PM', 1, 'Lapping, ', 12, 3),
(19, '2017-05-23', 'Siang', 4, 2, 'PM', 1, 'Lapping, Cek Cooling, ', 100, 1),
(20, '2017-05-30', 'Malam', 1, 10, 'BM', 1, 'Cek Cooling, ', 120, 1),
(21, '2017-06-01', 'Siang', 4, 2, 'PM', 10, 'Lapping, ', 12, 2),
(22, '2016-11-16', 'Siang', 3, 3, 'BM', 5, 'Ganti Corepin, Cleaning, Lapping, Cek Cooling, Cek Squeeze, ', 150, 1),
(23, '2017-06-10', 'Siang', 2, 2, 'PM', 5, 'Cleaning, Lapping, Ganti Corepin, ', 70, 1),
(24, '2017-06-06', 'Siang', 1, 2, 'PM', 4, 'Cleaning, Cek Cooling, Cek Squeeze, ganti angular pin', 40, 2),
(25, '2017-06-08', 'Malam', 3, 4, 'PM', 3, 'Finishing, ', 20, 3),
(26, '2017-06-02', 'Siang', 1, 2, 'PM', 1, 'Lapping, ', 20, 3),
(27, '2017-06-09', 'Siang', 2, 2, 'PM', 1, 'Lapping, ', 30, 4),
(28, '2017-07-11', 'Siang', 1, 1, 'PM', 1, 'Lapping, ', 20, 1),
(29, '2017-07-03', 'Siang', 2, 2, 'PM', 0, 'Washing, Cleaning, Lapping, Cek Cooling, Cek Squeeze, ', 157, 4),
(30, '2017-07-05', 'Siang', 2, 2, 'PM', 5, 'Washing, Cleaning, Lapping, Cek Cooling, Cek Squeeze, ganti core pin', 192, 4),
(31, '2017-07-10', 'Siang', 2, 3, 'PM', 9, 'Washing, Cleaning, Lapping, Cek Cooling, Cek Squeeze, ', 164, 8),
(32, '2017-07-01', 'Siang', 3, 2, 'PM', 7, 'Washing, Cleaning, Lapping, Cek Cooling, Repair SQ, Cek Squeeze, ', 147, 4),
(33, '2017-07-18', 'Siang', 2, 3, 'PM', 6, 'Washing, Cleaning, Lapping,Repair Cooling, Cek Cooling, Cek Squeeze, ', 143, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `level` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `fullname`, `email`, `phone`, `level`) VALUES
(1, 'admin', 'admin', 'adminstrator', 'admin@admin', '085647953233', 'admin'),
(2, 'user', 'user', 'user', 'user@user', '08765', 'user'),
(4, 'jadi', 'jadi', 'jadi hisam', 'jadi@admin', '085', 'admin'),
(5, 'kholil', 'kholil', 'ahmad kholil', 'amdkholil@gmail.com', '0856479', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id_action`);

--
-- Indexes for table `die`
--
ALTER TABLE `die`
  ADD PRIMARY KEY (`id_die`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id_mesin`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`id_problem`);

--
-- Indexes for table `problem_die`
--
ALTER TABLE `problem_die`
  ADD PRIMARY KEY (`id_problem_die`);

--
-- Indexes for table `repair_die`
--
ALTER TABLE `repair_die`
  ADD PRIMARY KEY (`id_repair_die`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `die`
--
ALTER TABLE `die`
  MODIFY `id_die` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `id_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `id_problem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `problem_die`
--
ALTER TABLE `problem_die`
  MODIFY `id_problem_die` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `repair_die`
--
ALTER TABLE `repair_die`
  MODIFY `id_repair_die` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
