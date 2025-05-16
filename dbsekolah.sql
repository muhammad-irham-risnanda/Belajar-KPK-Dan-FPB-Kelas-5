-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 08:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi`
--

CREATE TABLE `evaluasi` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `answer` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evaluasi`
--

INSERT INTO `evaluasi` (`id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(1, 'Bilangan berikut yang merupakan kelipatan dari 7 adalah… ', 'A. 28', 'B. 35   ', 'C. 49   ', 'D. Semua jawaban benar', 'D'),
(2, 'Faktor dari 30 adalah…', 'A. 1, 2, 3, 5, 6, 10, 15, 30   ', 'B. 1, 2, 4, 5, 10, 15, 30   ', 'C. 1, 3, 6, 9, 18, 30   ', 'D. 1, 2, 3, 5, 15, 30  ', 'A'),
(3, 'Bilangan berikut yang bukan faktor dari 36 adalah… ', 'A. 4   ', 'B. 6   ', 'C. 9   ', 'D. 10  ', 'D'),
(4, 'Persekutuan faktor dari 16 dan 24 adalah… ', 'A. 1, 2, 4, 8   ', 'B. 1, 2, 4, 6   ', 'C. 1, 2, 8, 16   ', 'D. 1, 2, 4, 12  ', 'A'),
(5, 'Faktor yang tidak termasuk persekutuan faktor dari 18 dan 27 adalah… ', 'A. 1   ', 'B. 3   ', 'C. 6   ', 'D. 9  ', 'C'),
(6, 'Kelipatan persekutuan dari 3 dan 4 yang terkecil adalah … ', 'A. 6   ', 'B. 8   ', 'C. 10   ', 'D. 12', 'D'),
(7, 'Bilangan berikut yang merupakan kelipatan persekutuan dari 5 dan 7 adalah … ', 'A. 35   ', 'B. 45   ', 'C. 50   ', 'D. 60  ', 'A'),
(8, 'KPK dari 8 dan 12 adalah… ', 'A. 12   ', 'B. 16   ', 'C. 24   ', 'D. 36', 'C'),
(9, 'Bilangan berikut yang merupakan KPK dari 9 dan 15 adalah… ', 'A. 30   ', 'B. 45   ', 'C. 60   ', 'D. 75 ', 'B'),
(10, 'FPB dari 48 dan 60 adalah… ', 'A. 6   ', 'B. 12   ', 'C. 8   ', 'D. 24  ', 'B'),
(11, 'Bilangan berikut yang merupakan FPB dari 36 dan 54 adalah … ', 'A. 18   ', 'B. 12   ', 'C. 6   ', 'D. 24', 'A'),
(12, 'Siti memiliki 18 permen coklat dan 24 permen karet. Ia ingin membagikan permen-permen tersebut ke dalam beberapa kantong dengan jumlah permen yang sama dan setiap kantong harus berisi permen coklat dan permen karet. Jumlah minimal permen di setiap kantong adalah… ', 'A. 6  ', 'B. 8   ', 'C. 12   ', 'D. 24  ', 'C'),
(13, 'Andi memiliki 72 buah jeruk dan 108 buah apel. Ia ingin menempatkan buah-buah tersebut ke dalam beberapa keranjang dengan jumlah yang sama tanpa ada sisa. Jumlah maksimal buah yang bisa dimasukkan ke setiap keranjang adalah… ', 'A. 12   ', 'B. 18   ', 'C. 24   ', 'D. 36', 'D'),
(14, 'Kelipatan dari 6 adalah… ', 'A. 18, 24, 30 ', 'B. 16, 22, 28 ', 'C. 15, 21, 27 ', 'D. 19, 25, 31', 'A'),
(15, 'Faktor dari 24 adalah… ', 'A. 1, 2, 4, 6, 12 ', 'B. 1, 3, 8, 12, 16 ', 'C. 1, 2, 3, 4, 6, 8, 12, 24 ', 'D. 2, 4, 8, 12, 24', 'C'),
(16, 'Faktor persekutuan dari 18 dan 24 adalah… ', 'A. 1, 3, 9 ', 'B. 1, 2, 3, 6 ', 'C. 1, 2, 4, 6, 8 ', 'D. 1, 2, 4, 12', 'B'),
(17, 'Kelipatan persekutuan dari 4 dan 5 yang terkecil adalah… ', 'A. 10 ', 'B. 15 ', 'C. 20 ', 'D. 25', 'C'),
(18, 'KPK dari 6 dan 8 adalah… ', 'A. 12 ', 'B. 16 ', 'C. 18 ', 'D. 24', 'D'),
(19, 'FPB dari 24 dan 36 adalah… ', 'A. 4 ', 'B. 6 ', 'C. 8 ', 'D. 12', 'D'),
(20, 'Ani memiliki 3 buah permen, Budi memiliki 4 buah permen. Jika mereka ingin membagikan permen tersebut dalam jumlah yang sama tanpa sisa, Jumlah permen yang minimal harus mereka miliki adalah… ', 'A. 12 ', 'B. 15 ', 'C. 18 ', 'D. 24', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `faktor_prima`
--

CREATE TABLE `faktor_prima` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `answer` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faktor_prima`
--

INSERT INTO `faktor_prima` (`id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(1, 'KPK dari 12 dan 15 adalah …. ', 'A. 30 ', 'B. 45 ', 'C. 60 ', 'D. 75', 'C'),
(2, 'FPB dari 24 dan 36 adalah ….', 'A. 6 ', 'B. 8', 'C. 12 ', 'D. 18', 'C'),
(3, 'Dua bilangan memiliki KPK 40 dan FPB 4. Jika salah satu bilangan adalah 8, maka bilangan lainnya adalah ... ', 'A. 16 ', 'B. 20 ', 'C. 24 ', 'D. 32', 'B'),
(4, 'KPK dari 18, 24, dan 30 adalah… ', 'A. 90', 'B. 180 ', 'C. 270 ', 'D. 360', 'D'),
(5, 'FPB dari 56 dan 72 adalah … ', 'A. 4 	', 'B. 8 	', 'C. 12', 'D. 16', 'B'),
(6, 'FPB dari 14, 21, dan 35 adalah ... ', 'A. 3 	', 'B. 5 	', 'C. 7 ', 'D. 9', 'C'),
(7, 'KPK dari 7 dan 9 adalah… ', 'A. 21 ', 'B. 27 ', 'C. 63 ', 'D. 72', 'C'),
(8, 'FPB dari 48 dan 60 adalah… 	', 'A. 12  ', 'B. 8  ', 'C. 6 ', 'D. 24', 'A'),
(9, 'Dua bilangan yang memiliki KPK 24 dan FPB 2 adalah ...', 'A. 4 dan 12 ', 'B. 6 dan 8 ', 'C. 8 dan 6 ', 'D. 12 dan 4', 'B'),
(10, 'KPK dari 20 dan 30 adalah ... ', 'A. 40 ', 'B. 50 ', 'C. 70 ', 'D. 60', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `fpb`
--

CREATE TABLE `fpb` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `answer` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fpb`
--

INSERT INTO `fpb` (`id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(1, 'Faktor dari bilangan 45 adalah…', 'A. 1, 3, 5, 9, 15, 45', 'B. 1, 3, 5, 9, 15, 25 ', 'C. 1, 2, 3, 5, 15, 45 ', 'D. 1, 3, 9, 15, 25, 45', 'A'),
(2, 'Bilangan berikut yang merupakan faktor dari 56 adalah…', 'A. 3 ', 'B. 4 ', 'C. 9 ', 'D. 12', 'B'),
(3, 'Faktor dari bilangan 18 antara lain… ', 'A. 1, 2, 3, 6, 9, 18 ', 'B. 1, 2, 4, 6, 9, 18', 'C. 1, 3, 6, 9, 18 ', 'D. 1, 2, 3, 4, 6, 9, 18', 'A'),
(4, 'Persekutuan faktor dari bilangan 20 dan 25 adalah….. ', 'A. 1 ', 'B. 1, 2, 5 ', 'C. 1, 5 ', 'D. 5', 'C'),
(5, 'Persekutuan faktor dari bilangan 18 dan 30 adalah…. ', 'A. 1, 2, 3 ', 'B. 1, 3, 6 ', 'C. 2, 3, 6 ', 'D. 1, 2, 3, 6', 'D'),
(6, 'Faktor dari bilangan 36 yang juga merupakan faktor dari bilangan 54 adalah…. ', 'A. 2 ', 'B. 3 ', 'C. 4 ', 'D. 6', 'D'),
(7, 'Bilangan yang merupakan Faktor Persekutuan Terbesar (FPB) dari 21 dan 28 adalah…', 'A. 3 ', 'B. 4 ', 'C. 7 ', 'D. 9', 'C'),
(8, 'Doni memiliki 24 buah apel dan 36 buah jeruk. Ia ingin membagikan buah-buah tersebut ke dalam kantong-kantong dengan jumlah yang sama tanpa ada sisa. Jumlah maksimal buah yang bisa dimasukkan ke setiap kantong adalah… ', 'A. 6 ', 'B. 12 ', 'C. 10 ', 'D. 18', 'B'),
(9, 'Di sebuah sekolah, terdapat 36 murid laki-laki dan 54 murid perempuan. Kepala sekolah ingin membagi semua murid ke dalam beberapa kelompok dengan jumlah murid yang sama tanpa ada sisa. Jumlah maksimal murid dalam setiap kelompok adalah… ', 'A. 6 ', 'B. 9 ', 'C. 12 ', 'D. 18', 'D'),
(10, 'Siti memiliki 28 kelereng hijau dan 42 kelereng merah. Ia ingin membagi kelereng-kelereng tersebut ke dalam beberapa kantong dengan jumlah yang sama tanpa ada sisa. Jumlah maksimal kelereng dalam setiap kantong adalah… ', 'A. 7 ', 'B. 14 ', 'C. 21 ', 'D. 28', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `kpk`
--

CREATE TABLE `kpk` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `answer` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kpk`
--

INSERT INTO `kpk` (`id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(1, 'Kelipatan persekutuan dari 6 dan 8 adalah …', 'A. 12', 'B. 24 ', 'C. 36 ', 'D. 64', 'B'),
(2, 'Bilangan 20 merupakan kelipatan dari bilangan … ', 'A. 2 ', 'B. 7 ', 'C. 12 ', 'D. 15', 'A'),
(3, 'Yang merupakan kelipatan 9 adalah ... ', 'A. 24 ', 'B. 30 ', 'C. 22 ', 'D. 18', 'D'),
(4, 'Jika Andi menabung Rp4.000 setiap hari, setelah 7 hari jumlah uang yang ia tabung adalah... ', 'A. Rp25.000 ', 'B. Rp27.000 ', 'C. Rp28.000 ', 'D. Rp30.000', 'C'),
(5, 'Kelipatan dari 5 adalah ...', 'A. 5, 10, 14, 19, 20, ... ', 'B. 5, 10, 13, 15, 22, ... ', 'C. 5, 10, 16, 20, 25, ...', 'D. 5, 10, 15, 20, 25, ...', 'D'),
(6, 'Mita mengunjungi perpustakaan setiap 3 hari sekali dan Zury setiap 4 hari sekali. Jika tanggal 20 Mei mereka mengunjungi perpustakaan, mereka akan ke perpustakaan secara bersamaan lagi pada tanggal ...', 'A. 24 Mei ', 'B. 27 Mei ', 'C. 1 Juni ', 'D. 2 Juni', 'C'),
(7, 'KPK dari 2 dan 6 adalah ... ', 'A. 2 ', 'B. 4 ', 'C. 6 ', 'D. 8', 'C'),
(8, 'KPK dari 7 dan 11 adalah... ', 'A. 49 ', 'B. 56 ', 'C. 77 ', 'D. 88', 'C'),
(9, 'kelipatan dari 7 adalah …. ', 'A. 14, 21, 28, dan 35 ', 'B. 7, 14, 20, dan 28', 'C. 14, 21, 27, dan 32 ', 'D. 21, 28, 36, dan 42', 'A'),
(10, 'Seorang petani menanam jagung di lahannya. Setiap 6 hari sekali, dia memupuk tanaman jagungnya, dan setiap 8 hari sekali, dia menyiram tanaman tersebut dengan pupuk cair. Pada hari ke berapakah pertama kali dia akan memupuk dan menyiram tanaman jagungnya secara bersamaan adalah pada hari ke……. ', 'A. 12 ', 'B. 24 ', 'C. 36 ', 'D. 48', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `skor` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `kelas`, `skor`) VALUES
(1, 'gina', '5', 0),
(2, 'gina', '5', 0),
(3, 'gina', '5', 0),
(4, 'gina', '5', 0),
(5, 'gina', '5', 30),
(6, 'gina', '5', 30),
(7, 'gina', '5', 20),
(8, 'gina', '5', 17),
(9, 'gina', '5', 20);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_evaluasi`
--

CREATE TABLE `siswa_evaluasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `skor` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa_evaluasi`
--

INSERT INTO `siswa_evaluasi` (`id`, `nama`, `kelas`, `skor`) VALUES
(1, 'gina', '5', 3),
(2, 'gina', '5', 3),
(3, 'gina', '5', 8),
(4, 'gina', '5', 30);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_faktor_prima`
--

CREATE TABLE `siswa_faktor_prima` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `skor` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa_faktor_prima`
--

INSERT INTO `siswa_faktor_prima` (`id`, `nama`, `kelas`, `skor`) VALUES
(1, 'lana', '5', 2),
(2, 'lana', '5', 2),
(3, 'gina', '5', 4),
(4, 'gina', '5', 0),
(5, 'gina', '5', 40);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_fpb`
--

CREATE TABLE `siswa_fpb` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `skor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa_fpb`
--

INSERT INTO `siswa_fpb` (`id`, `nama`, `kelas`, `skor`) VALUES
(1, 'gina', '5', 5),
(2, 'gina', '5', 2),
(3, 'gina', '5', 3),
(4, 'lana', '5', 1),
(5, 'lana', '5', 2),
(6, 'lana', '5', 2),
(7, 'gina', '5', 5),
(8, 'gina', '5', 0),
(9, 'gina', '5', 20),
(10, 'gina', '5', 20);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `class` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `class`, `password`) VALUES
(1, 'gina', 5, '$2y$10$8w1ck8nshGsu3u6hZLEk/OdwdF9MiJ4m/SEeajFyZEiTwp3Xm9iIK'),
(2, 'lana', 5, '$2y$10$Iifd77/QSvw4bBbp3dA50uNoC4Enz3gxX6ajxyC2FXLXSS6AWJ0QK'),
(3, 'juna', 5, '$2y$10$YmuToPjPOfeDl5j43d.NHuIwapO71mkSfxCS4z5B6ftsv5i0YbNMC'),
(4, 'karma', 5, '$2y$10$LQmR4wjz6nN9Nwu2DOjT/OFJMhLIAEQ0PPufnkdC5Vgw8vtMf6sBG'),
(5, 'udin', 5, '$2y$10$UuMPC5qMhwW7588ny9F74OqItDc2hN1eX/zerHb.uF5hicaHbmf2q');

-- --------------------------------------------------------

--
-- Table structure for table `time_limits`
--

CREATE TABLE `time_limits` (
  `id` int(11) NOT NULL,
  `time_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_limits`
--

INSERT INTO `time_limits` (`id`, `time_limit`) VALUES
(5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'desy', '$2y$10$qCnF4fDVF0lMqF/nmHWWne8oWfZKLJ50UgC8eTkd5HdQrONf/yhBi'),
(2, 'inah', '$2y$10$lcWhwAOcaopGmnjO6gI8b.woAdF/02JZgYzSGRNX0Jgq0FmbEGkA6'),
(3, 'ulah', '$2y$10$ewc6Q5ZKfmpd7oyNS.AR0.eZ1AZViSTorE8PHh3fBxcEY/zs6uhhm'),
(4, 'uya', '$2y$10$G7N/yDNXB.3ayHZf4fv7/OcFEJWGLlIbUdnexDvSY0IjPSOcFZYF.'),
(6, 'jani', '$2y$10$5x27A2Ek7BOT65EwhOJ82uUALu6q1Zhone0wHKbHkKrY3DrFyYavC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faktor_prima`
--
ALTER TABLE `faktor_prima`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fpb`
--
ALTER TABLE `fpb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpk`
--
ALTER TABLE `kpk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa_evaluasi`
--
ALTER TABLE `siswa_evaluasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa_faktor_prima`
--
ALTER TABLE `siswa_faktor_prima`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa_fpb`
--
ALTER TABLE `siswa_fpb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `time_limits`
--
ALTER TABLE `time_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `faktor_prima`
--
ALTER TABLE `faktor_prima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fpb`
--
ALTER TABLE `fpb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kpk`
--
ALTER TABLE `kpk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `siswa_evaluasi`
--
ALTER TABLE `siswa_evaluasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa_faktor_prima`
--
ALTER TABLE `siswa_faktor_prima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa_fpb`
--
ALTER TABLE `siswa_fpb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `time_limits`
--
ALTER TABLE `time_limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
