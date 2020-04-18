-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Apr 2020 pada 21.32
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formyus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Address2` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Zip` varchar(50) NOT NULL,
  `Payment` varchar(50) NOT NULL,
  `Name_Card` varchar(50) NOT NULL,
  `Credit_Number` varchar(50) NOT NULL,
  `Expiration` varchar(50) NOT NULL,
  `CVV` varchar(50) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `Time_Insert` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`FirstName`, `LastName`, `Username`, `Email`, `Address`, `Address2`, `Country`, `State`, `Zip`, `Payment`, `Name_Card`, `Credit_Number`, `Expiration`, `CVV`, `foto`, `Time_Insert`) VALUES
('marni', 'adilla', 'marniadilla', 'mar22ni@gmail.com', 'daya', 'makassar', 'Indonesia', 'UNHAS', '999883', 'paypal', 'marni', '112112', '2020-04-19', '123123', '112112.jpeg', '2020-04-19 01:59:01'),
('yusno', 'yuyus', 'yusnocute', 'yusnoyuyus@gmail.com', 'jln.sejati', 'wajo sulsel', 'Indonesia', 'UNHAS', '9634782', 'debit', 'yusno', '3323321', '2020-04-19', '38428', '3323321.jpeg', '2020-04-19 02:03:30'),
('nursuheini', 'sulaiman', 'nursuheini', 'nurshnsulaiman@gmail.com', 'jl.lembu', 'sengkang', 'Indonesia', 'UNPRIMA', '394284', 'debit', 'nur', '8823119', '2020-04-19', '339482', '8823119.PNG', '2020-04-19 02:24:01'),
('adrian', 'saputra', 'adrian saputra', 'adrsaputra@gmail.com', 'depok', 'jawa barat', 'Indonesia', 'UI', '3940224', 'credit', 'adrian', '11199921', '2020-04-19', '11221122', '11199921.jpg', '2020-04-19 02:28:37');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
