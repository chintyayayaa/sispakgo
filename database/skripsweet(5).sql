-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 01:59 PM
-- Server version: 10.3.10-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsweet`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(11) DEFAULT NULL,
  `gejala` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `gejala`, `created_at`, `update_at`) VALUES
(1, 'G01', 'Saya memikirkan game online sepanjang hari ', '2020-01-08 09:26:52', '2020-01-08 09:26:52'),
(2, 'G02', 'Ketika saya bermain game saya tidak memperdulikan aktivitas lain bahkan untuk kepentingan saya sendiri (misalnya makan,bekerja,belajar', '2020-01-08 09:26:52', '2020-01-08 09:26:52'),
(3, 'G03', 'Saya tetap bermain game meskipun sudah tahu berdampak negative', '2020-01-08 09:26:52', '2020-02-01 10:43:01'),
(4, 'G04', 'Saya kembali bermain game setelah sempat berhenti ', '2020-01-08 09:26:52', '2020-01-08 09:26:52'),
(5, 'G05', 'Waktu bermain saya bertambah ( misalnya dari 1 jam menjadi 2 jam setiap kali main)', '2020-01-08 09:26:52', '2020-02-01 10:43:29'),
(6, 'G06', 'Saya sudah rutin bermain game online selama 12 bulan', '2020-01-08 09:26:52', '2020-01-08 09:26:52'),
(7, 'G07', 'Saya merasa excited / senang / high ketika bermain game online ', '2020-01-08 09:26:52', '2020-01-08 09:26:52'),
(8, 'G08', 'Saya bermain game untuk melarikan diri dari masalah', '2020-01-08 09:26:52', '2020-01-08 09:26:52'),
(9, 'G09', 'Saya merasa tidak nyaman (gelisah) / marah / sedih ketika tidak dapat bermain game', '2020-01-08 09:26:52', '2020-01-08 09:26:52'),
(10, 'G10', 'Bermain game online membuat hubungan saya dengan orang lain bermasalah ( berbohong, menipu, berdebat) ', '2020-01-08 09:26:52', '2020-02-01 10:44:04'),
(11, 'G11', 'Bermain game online membuat saya memiliki masalah ( misalnya dalam sekolah, pekerjaan, lingkungan )', '2020-01-08 09:26:52', '2020-01-08 09:26:52'),
(12, 'G12', 'Bermain game online membuat saya kehilangan kendali ', '2020-01-08 09:26:52', '2020-01-08 09:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_perilaku`
--

CREATE TABLE `jenis_perilaku` (
  `id_jp` int(11) NOT NULL,
  `kode_jp` varchar(11) DEFAULT NULL,
  `jenis_perilaku` varchar(255) DEFAULT NULL,
  `rules` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_perilaku`
--

INSERT INTO `jenis_perilaku` (`id_jp`, `kode_jp`, `jenis_perilaku`, `rules`, `created_at`, `update_at`) VALUES
(1, 'JP01', 'Saliance', 'G01,G02,G03', '2020-01-08 09:26:14', '2020-01-14 05:07:28'),
(2, 'JP02', 'Relapse', 'G04', '2020-01-08 09:26:14', '2020-01-14 05:07:29'),
(3, 'JP03', 'Tolerance', 'G05,G06', '2020-01-08 09:26:14', '2020-01-14 05:07:29'),
(4, 'JP04', 'Mood Modifiction', 'G07,G08', '2020-01-08 09:26:14', '2020-01-14 05:07:29'),
(5, 'JP05', 'Withdrawal', 'G09', '2020-01-08 09:26:14', '2020-01-14 05:07:29'),
(6, 'JP06', 'Conflict', 'G10', '2020-01-08 09:26:14', '2020-01-14 05:07:29'),
(7, 'JP07', 'Problems', 'G11,G12', '2020-01-08 09:26:14', '2020-01-14 05:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `hasil_screening` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `user_id`, `jawaban`, `hasil_screening`, `created_at`, `time_stamp`) VALUES
(84, 18, '[{\"kode_gejala\":\"G01\",\"value\":\"0\"},{\"kode_gejala\":\"G02\",\"value\":\"0\"},{\"kode_gejala\":\"G03\",\"value\":\"0\"},{\"kode_gejala\":\"G04\",\"value\":\"0\"},{\"kode_gejala\":\"G05\",\"value\":\"0\"},{\"kode_gejala\":\"G06\",\"value\":\"1\"},{\"kode_gejala\":\"G07\",\"value\":\"0\"},{\"kode_gejala\":\"G08\",\"value\":\"0\"},{\"kode_gejala\":\"G09\",\"value\":\"0\"},{\"kode_gejala\":\"G10\",\"value\":\"0\"},{\"kode_gejala\":\"G11\",\"value\":\"0\"},{\"kode_gejala\":\"G12\",\"value\":\"0\"}]', 0, '2020-02-01 13:15:57', '2020-02-01 13:15:57'),
(85, 19, '[{\"kode_gejala\":\"G01\",\"value\":\"1\"},{\"kode_gejala\":\"G02\",\"value\":\"1\"},{\"kode_gejala\":\"G03\",\"value\":\"1\"},{\"kode_gejala\":\"G04\",\"value\":\"1\"},{\"kode_gejala\":\"G05\",\"value\":\"1\"},{\"kode_gejala\":\"G06\",\"value\":\"1\"},{\"kode_gejala\":\"G07\",\"value\":\"1\"},{\"kode_gejala\":\"G08\",\"value\":\"1\"},{\"kode_gejala\":\"G09\",\"value\":\"1\"},{\"kode_gejala\":\"G10\",\"value\":\"1\"},{\"kode_gejala\":\"G11\",\"value\":\"1\"},{\"kode_gejala\":\"G12\",\"value\":\"1\"}]', 1, '2020-02-01 13:18:01', '2020-02-01 13:18:01'),
(86, 19, '[{\"kode_gejala\":\"G01\",\"value\":\"0\"},{\"kode_gejala\":\"G02\",\"value\":\"0\"},{\"kode_gejala\":\"G03\",\"value\":\"0\"},{\"kode_gejala\":\"G04\",\"value\":\"0\"},{\"kode_gejala\":\"G05\",\"value\":\"0\"},{\"kode_gejala\":\"G06\",\"value\":\"0\"},{\"kode_gejala\":\"G07\",\"value\":\"0\"},{\"kode_gejala\":\"G08\",\"value\":\"0\"},{\"kode_gejala\":\"G09\",\"value\":\"0\"},{\"kode_gejala\":\"G10\",\"value\":\"0\"},{\"kode_gejala\":\"G11\",\"value\":\"0\"},{\"kode_gejala\":\"G12\",\"value\":\"0\"}]', 0, '2020-02-01 13:19:33', '2020-02-01 13:19:33'),
(87, 18, '[{\"kode_gejala\":\"G01\",\"value\":\"0\"},{\"kode_gejala\":\"G02\",\"value\":\"0\"},{\"kode_gejala\":\"G03\",\"value\":\"1\"},{\"kode_gejala\":\"G04\",\"value\":\"1\"},{\"kode_gejala\":\"G05\",\"value\":\"1\"},{\"kode_gejala\":\"G06\",\"value\":\"1\"},{\"kode_gejala\":\"G07\",\"value\":\"1\"},{\"kode_gejala\":\"G08\",\"value\":\"1\"},{\"kode_gejala\":\"G09\",\"value\":\"1\"},{\"kode_gejala\":\"G10\",\"value\":\"1\"},{\"kode_gejala\":\"G11\",\"value\":\"1\"},{\"kode_gejala\":\"G12\",\"value\":\"1\"}]', 1, '2020-02-01 13:24:19', '2020-02-01 13:24:19'),
(88, 20, '[{\"kode_gejala\":\"G01\",\"value\":\"1\"},{\"kode_gejala\":\"G02\",\"value\":\"1\"},{\"kode_gejala\":\"G03\",\"value\":\"1\"},{\"kode_gejala\":\"G04\",\"value\":\"1\"},{\"kode_gejala\":\"G05\",\"value\":\"1\"},{\"kode_gejala\":\"G06\",\"value\":\"1\"},{\"kode_gejala\":\"G07\",\"value\":\"1\"},{\"kode_gejala\":\"G08\",\"value\":\"1\"},{\"kode_gejala\":\"G09\",\"value\":\"1\"},{\"kode_gejala\":\"G10\",\"value\":\"1\"},{\"kode_gejala\":\"G11\",\"value\":\"1\"},{\"kode_gejala\":\"G12\",\"value\":\"1\"}]', 1, '2020-02-01 13:30:31', '2020-02-01 13:30:31'),
(89, 21, '[{\"kode_gejala\":\"G01\",\"value\":\"0\"},{\"kode_gejala\":\"G02\",\"value\":\"0\"},{\"kode_gejala\":\"G03\",\"value\":\"0\"},{\"kode_gejala\":\"G04\",\"value\":\"0\"},{\"kode_gejala\":\"G05\",\"value\":\"0\"},{\"kode_gejala\":\"G06\",\"value\":\"0\"},{\"kode_gejala\":\"G07\",\"value\":\"0\"},{\"kode_gejala\":\"G08\",\"value\":\"0\"},{\"kode_gejala\":\"G09\",\"value\":\"0\"},{\"kode_gejala\":\"G10\",\"value\":\"0\"},{\"kode_gejala\":\"G11\",\"value\":\"0\"},{\"kode_gejala\":\"G12\",\"value\":\"0\"}]', 0, '2020-02-01 13:31:47', '2020-02-01 13:31:47'),
(90, 22, '[{\"kode_gejala\":\"G01\",\"value\":\"1\"},{\"kode_gejala\":\"G02\",\"value\":\"1\"},{\"kode_gejala\":\"G03\",\"value\":\"1\"},{\"kode_gejala\":\"G04\",\"value\":\"0\"},{\"kode_gejala\":\"G05\",\"value\":\"0\"},{\"kode_gejala\":\"G06\",\"value\":\"0\"},{\"kode_gejala\":\"G07\",\"value\":\"1\"},{\"kode_gejala\":\"G08\",\"value\":\"1\"},{\"kode_gejala\":\"G09\",\"value\":\"1\"},{\"kode_gejala\":\"G10\",\"value\":\"1\"},{\"kode_gejala\":\"G11\",\"value\":\"0\"},{\"kode_gejala\":\"G12\",\"value\":\"1\"}]', 1, '2020-02-04 02:21:57', '2020-02-04 02:21:57'),
(91, 23, '[{\"kode_gejala\":\"G01\",\"value\":\"1\"},{\"kode_gejala\":\"G02\",\"value\":\"1\"},{\"kode_gejala\":\"G03\",\"value\":\"1\"},{\"kode_gejala\":\"G04\",\"value\":\"1\"},{\"kode_gejala\":\"G05\",\"value\":\"0\"},{\"kode_gejala\":\"G06\",\"value\":\"0\"},{\"kode_gejala\":\"G07\",\"value\":\"1\"},{\"kode_gejala\":\"G08\",\"value\":\"1\"},{\"kode_gejala\":\"G09\",\"value\":\"1\"},{\"kode_gejala\":\"G10\",\"value\":\"1\"},{\"kode_gejala\":\"G11\",\"value\":\"1\"},{\"kode_gejala\":\"G12\",\"value\":\"1\"}]', 1, '2020-02-04 06:26:25', '2020-02-04 06:26:25'),
(92, 24, '[{\"kode_gejala\":\"G01\",\"value\":\"0\"},{\"kode_gejala\":\"G02\",\"value\":\"1\"},{\"kode_gejala\":\"G03\",\"value\":\"1\"},{\"kode_gejala\":\"G04\",\"value\":\"0\"},{\"kode_gejala\":\"G05\",\"value\":\"0\"},{\"kode_gejala\":\"G06\",\"value\":\"1\"},{\"kode_gejala\":\"G07\",\"value\":\"0\"},{\"kode_gejala\":\"G08\",\"value\":\"0\"},{\"kode_gejala\":\"G09\",\"value\":\"1\"},{\"kode_gejala\":\"G10\",\"value\":\"0\"},{\"kode_gejala\":\"G11\",\"value\":\"1\"},{\"kode_gejala\":\"G12\",\"value\":\"0\"}]', 1, '2020-02-05 04:14:26', '2020-02-05 04:14:26'),
(93, 24, '[{\"kode_gejala\":\"G01\",\"value\":\"0\"},{\"kode_gejala\":\"G02\",\"value\":\"1\"},{\"kode_gejala\":\"G03\",\"value\":\"1\"},{\"kode_gejala\":\"G04\",\"value\":\"0\"},{\"kode_gejala\":\"G05\",\"value\":\"0\"},{\"kode_gejala\":\"G06\",\"value\":\"1\"},{\"kode_gejala\":\"G07\",\"value\":\"0\"},{\"kode_gejala\":\"G08\",\"value\":\"0\"},{\"kode_gejala\":\"G09\",\"value\":\"1\"},{\"kode_gejala\":\"G10\",\"value\":\"0\"},{\"kode_gejala\":\"G11\",\"value\":\"1\"},{\"kode_gejala\":\"G12\",\"value\":\"0\"}]', 1, '2020-02-05 04:14:26', '2020-02-05 04:14:26'),
(94, 24, '[{\"kode_gejala\":\"G01\",\"value\":\"0\"},{\"kode_gejala\":\"G02\",\"value\":\"1\"},{\"kode_gejala\":\"G03\",\"value\":\"1\"},{\"kode_gejala\":\"G04\",\"value\":\"0\"},{\"kode_gejala\":\"G05\",\"value\":\"0\"},{\"kode_gejala\":\"G06\",\"value\":\"1\"},{\"kode_gejala\":\"G07\",\"value\":\"0\"},{\"kode_gejala\":\"G08\",\"value\":\"0\"},{\"kode_gejala\":\"G09\",\"value\":\"1\"},{\"kode_gejala\":\"G10\",\"value\":\"0\"},{\"kode_gejala\":\"G11\",\"value\":\"1\"},{\"kode_gejala\":\"G12\",\"value\":\"0\"}]', 1, '2020-02-05 04:14:26', '2020-02-05 04:14:26'),
(95, 24, '[{\"kode_gejala\":\"G01\",\"value\":\"0\"},{\"kode_gejala\":\"G02\",\"value\":\"1\"},{\"kode_gejala\":\"G03\",\"value\":\"1\"},{\"kode_gejala\":\"G04\",\"value\":\"0\"},{\"kode_gejala\":\"G05\",\"value\":\"0\"},{\"kode_gejala\":\"G06\",\"value\":\"1\"},{\"kode_gejala\":\"G07\",\"value\":\"0\"},{\"kode_gejala\":\"G08\",\"value\":\"0\"},{\"kode_gejala\":\"G09\",\"value\":\"1\"},{\"kode_gejala\":\"G10\",\"value\":\"0\"},{\"kode_gejala\":\"G11\",\"value\":\"1\"},{\"kode_gejala\":\"G12\",\"value\":\"0\"}]', 1, '2020-02-05 04:14:26', '2020-02-05 04:14:26'),
(96, 25, '[{\"kode_gejala\":\"G01\",\"value\":\"1\"},{\"kode_gejala\":\"G02\",\"value\":\"0\"},{\"kode_gejala\":\"G03\",\"value\":\"1\"},{\"kode_gejala\":\"G04\",\"value\":\"1\"},{\"kode_gejala\":\"G05\",\"value\":\"1\"},{\"kode_gejala\":\"G06\",\"value\":\"1\"},{\"kode_gejala\":\"G07\",\"value\":\"0\"},{\"kode_gejala\":\"G08\",\"value\":\"1\"},{\"kode_gejala\":\"G09\",\"value\":\"1\"},{\"kode_gejala\":\"G10\",\"value\":\"0\"},{\"kode_gejala\":\"G11\",\"value\":\"1\"},{\"kode_gejala\":\"G12\",\"value\":\"0\"}]', 1, '2020-02-05 12:35:32', '2020-02-05 12:35:32'),
(97, 26, '[{\"kode_gejala\":\"G01\",\"value\":\"0\"},{\"kode_gejala\":\"G02\",\"value\":\"1\"},{\"kode_gejala\":\"G03\",\"value\":\"0\"},{\"kode_gejala\":\"G04\",\"value\":\"0\"},{\"kode_gejala\":\"G05\",\"value\":\"0\"},{\"kode_gejala\":\"G06\",\"value\":\"0\"},{\"kode_gejala\":\"G07\",\"value\":\"0\"},{\"kode_gejala\":\"G08\",\"value\":\"0\"},{\"kode_gejala\":\"G09\",\"value\":\"0\"},{\"kode_gejala\":\"G10\",\"value\":\"0\"},{\"kode_gejala\":\"G11\",\"value\":\"0\"},{\"kode_gejala\":\"G12\",\"value\":\"0\"}]', 0, '2020-02-07 11:18:34', '2020-02-07 11:18:34'),
(98, 27, '[{\"kode_gejala\":\"G01\",\"value\":\"0\"},{\"kode_gejala\":\"G02\",\"value\":\"0\"},{\"kode_gejala\":\"G03\",\"value\":\"0\"},{\"kode_gejala\":\"G04\",\"value\":\"0\"},{\"kode_gejala\":\"G05\",\"value\":\"0\"},{\"kode_gejala\":\"G06\",\"value\":\"0\"},{\"kode_gejala\":\"G07\",\"value\":\"0\"},{\"kode_gejala\":\"G08\",\"value\":\"0\"},{\"kode_gejala\":\"G09\",\"value\":\"0\"},{\"kode_gejala\":\"G10\",\"value\":\"0\"},{\"kode_gejala\":\"G11\",\"value\":\"0\"},{\"kode_gejala\":\"G12\",\"value\":\"0\"}]', 0, '2020-02-07 11:38:13', '2020-02-07 11:38:13'),
(99, 28, '[{\"kode_gejala\":\"G01\",\"value\":\"1\"},{\"kode_gejala\":\"G02\",\"value\":\"0\"},{\"kode_gejala\":\"G03\",\"value\":\"0\"},{\"kode_gejala\":\"G04\",\"value\":\"0\"},{\"kode_gejala\":\"G05\",\"value\":\"0\"},{\"kode_gejala\":\"G06\",\"value\":\"0\"},{\"kode_gejala\":\"G07\",\"value\":\"0\"},{\"kode_gejala\":\"G08\",\"value\":\"0\"},{\"kode_gejala\":\"G09\",\"value\":\"0\"},{\"kode_gejala\":\"G10\",\"value\":\"0\"},{\"kode_gejala\":\"G11\",\"value\":\"0\"},{\"kode_gejala\":\"G12\",\"value\":\"0\"}]', 0, '2020-02-07 11:40:30', '2020-02-07 11:40:30'),
(100, 29, '[{\"kode_gejala\":\"G01\",\"value\":\"0\"},{\"kode_gejala\":\"G02\",\"value\":\"0\"},{\"kode_gejala\":\"G03\",\"value\":\"0\"},{\"kode_gejala\":\"G04\",\"value\":\"1\"},{\"kode_gejala\":\"G05\",\"value\":\"1\"},{\"kode_gejala\":\"G06\",\"value\":\"1\"},{\"kode_gejala\":\"G07\",\"value\":\"0\"},{\"kode_gejala\":\"G08\",\"value\":\"0\"},{\"kode_gejala\":\"G09\",\"value\":\"0\"},{\"kode_gejala\":\"G10\",\"value\":\"1\"},{\"kode_gejala\":\"G11\",\"value\":\"1\"},{\"kode_gejala\":\"G12\",\"value\":\"0\"}]', 1, '2020-02-07 12:28:21', '2020-02-07 12:28:21'),
(101, 30, '[{\"kode_gejala\":\"G01\",\"value\":\"1\"},{\"kode_gejala\":\"G02\",\"value\":\"0\"},{\"kode_gejala\":\"G03\",\"value\":\"0\"},{\"kode_gejala\":\"G04\",\"value\":\"1\"},{\"kode_gejala\":\"G05\",\"value\":\"0\"},{\"kode_gejala\":\"G06\",\"value\":\"1\"},{\"kode_gejala\":\"G07\",\"value\":\"1\"},{\"kode_gejala\":\"G08\",\"value\":\"1\"},{\"kode_gejala\":\"G09\",\"value\":\"1\"},{\"kode_gejala\":\"G10\",\"value\":\"1\"},{\"kode_gejala\":\"G11\",\"value\":\"1\"},{\"kode_gejala\":\"G12\",\"value\":\"1\"}]', 1, '2020-02-07 12:31:12', '2020-02-07 12:31:12'),
(102, 31, '[{\"kode_gejala\":\"G01\",\"value\":\"0\"},{\"kode_gejala\":\"G02\",\"value\":\"0\"},{\"kode_gejala\":\"G03\",\"value\":\"0\"},{\"kode_gejala\":\"G04\",\"value\":\"1\"},{\"kode_gejala\":\"G05\",\"value\":\"1\"},{\"kode_gejala\":\"G06\",\"value\":\"1\"},{\"kode_gejala\":\"G07\",\"value\":\"0\"},{\"kode_gejala\":\"G08\",\"value\":\"0\"},{\"kode_gejala\":\"G09\",\"value\":\"0\"},{\"kode_gejala\":\"G10\",\"value\":\"0\"},{\"kode_gejala\":\"G11\",\"value\":\"1\"},{\"kode_gejala\":\"G12\",\"value\":\"1\"}]', 0, '2020-02-07 12:33:13', '2020-02-07 12:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `game_list` varchar(255) NOT NULL,
  `lama_bermain` varchar(11) NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `tanggal_lahir`, `jenis_kelamin`, `game_list`, `lama_bermain`, `no_handphone`, `created_at`, `update_at`) VALUES
(18, 'Firdaus Alif', 'firdausalif414@gmail.com', '1997-12-19', 0, 'black desert mobile', '0', '083871920833', '2020-02-01 13:15:57', '2020-02-01 13:15:57'),
(19, 'joki', 'chintyaadindaa@gmail.com', '1997-01-08', 0, 'pubg', '0', '097689008888', '2020-02-01 13:18:01', '2020-02-01 13:18:01'),
(20, 'daus', 'ss@mail.com', '1997-12-12', 0, 'ml', '0', '089067899876', '2020-02-01 13:30:31', '2020-02-01 13:30:31'),
(21, 'hh', 'gg@mail.com', '8981-09-09', 1, 'gg', '0', '087698537646', '2020-02-01 13:31:47', '2020-02-01 13:31:47'),
(22, 'hh', 'hhl@mail.com', '2098-01-09', 1, 'ml', '0', '098667899876', '2020-02-04 02:21:56', '2020-02-04 02:21:56'),
(23, 'erik', 'erik@mail.com', '1998-01-01', 0, 'ML', '12', '089789077656', '2020-02-04 06:26:24', '2020-02-04 06:26:24'),
(24, 'hh', 'ssh@mail.com', '1998-01-01', 1, 'dddd', '12', '0987898888', '2020-02-05 04:14:26', '2020-02-05 04:14:26'),
(25, 'Firdaus Alif F', 'lskadsa@gmail.com', '1997-12-19', 0, 'Mobile Legend', '10', '083871920833', '2020-02-05 12:35:32', '2020-02-05 12:35:32'),
(26, 'Firdaus Alif Fahruddin', 'ksaljdlakj@ail.com', '1997-12-19', 0, 'ML', '10', '0838239198201', '2020-02-07 11:18:34', '2020-02-07 11:18:34'),
(27, 'aiosudioausd', 'jkajslkaj@mial.soma', '1997-12-19', 0, 'kajsdklajlksa', '10', '0832187617', '2020-02-07 11:38:13', '2020-02-07 11:38:13'),
(28, 'asdajdask', 'askljdakj@mia.com', '0000-00-00', 0, 'kajsdakj', '10', '083781723191', '2020-02-07 11:40:30', '2020-02-07 11:40:30'),
(29, 'popopop', 'kasjdkaj@mkam.omc', '2092-12-31', 0, 'skldsalksda', '10', '08318298191', '2020-02-07 12:28:21', '2020-02-07 12:28:21'),
(30, 'dinda', 'jj@mail.com', '1999-01-01', 1, 'ml', '12', '0986557903', '2020-02-07 12:31:12', '2020-02-07 12:31:12'),
(31, 'poapsodpao', 'sajdk@mai.sal', '1977-12-19', 0, 'kasjdkajs', '20', '08327182122', '2020-02-07 12:33:13', '2020-02-07 12:33:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`),
  ADD UNIQUE KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `jenis_perilaku`
--
ALTER TABLE `jenis_perilaku`
  ADD PRIMARY KEY (`id_jp`),
  ADD UNIQUE KEY `kode_jp` (`kode_jp`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jenis_perilaku`
--
ALTER TABLE `jenis_perilaku`
  MODIFY `id_jp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
