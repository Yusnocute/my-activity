-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2020 pada 04.51
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
  `Time_Insert` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`FirstName`, `LastName`, `Username`, `Email`, `Address`, `Address2`, `Country`, `State`, `Zip`, `Payment`, `Name_Card`, `Credit_Number`, `Expiration`, `CVV`, `Time_Insert`) VALUES
('yusno', 'yuyus', 'yuyuscute', 'yusnoyuyus@gmail.com', 'jln.sejati unhas', 'kec. bola, kab. wajo', 'Indonesia', 'PNUP', '1234', 'credit', 'yusno', '12345678', '2020-11-04', '12345', '2020-04-12 09:32:38'),
('Ros', 'diana', 'rosdiana', 'rosdiana@gmail.com', 'jln.politeknik', 'siwa wajo', 'Indonesia', 'PNUP', '2345', 'debit', 'rosdiana', '234567891', '2020-11-04', '3456', '2020-04-12 09:46:50'),
('kirana', 'amelia', 'kirana', 'kiranaamelia@gmail.com', 'desa.kading, kec.bola kab.wajo', 'wajo sulsel', 'Indonesia', 'UNPRIMA', '7777', 'paypal', 'kirana', '111222333', '2020-11-04', '7654', '2020-04-12 09:48:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
