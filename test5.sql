-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 03:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test5`
--

-- --------------------------------------------------------

--
-- Table structure for table `lietotaji`
--

CREATE TABLE `lietotaji` (
  `id` int(10) UNSIGNED NOT NULL,
  `lietotajvards` varchar(50) NOT NULL,
  `parole` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `lietotaji`
--

INSERT INTO `lietotaji` (`id`, `lietotajvards`, `parole`) VALUES
(6, 'lietotajs8', '1190c6c719be98e664f9b60a16fca319'),
(7, 'lietotajs99', '1ea59f92ad3ef3495442139fe654ff10');

-- --------------------------------------------------------

--
-- Table structure for table `sadalas`
--

CREATE TABLE `sadalas` (
  `id` int(11) NOT NULL,
  `adrese` varchar(100) NOT NULL,
  `nosaukums` varchar(100) NOT NULL,
  `redzams` varchar(100) NOT NULL,
  `informacija` varchar(100) NOT NULL,
  `tips` enum('datubaze','fails') NOT NULL,
  `saturs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `sadalas`
--

INSERT INTO `sadalas` (`id`, `adrese`, `nosaukums`, `redzams`, `informacija`, `tips`, `saturs`) VALUES
(1, 'sakums', 'Sākums', 'visiem', '', 'datubaze', 'sakums...'),
(2, 'summa', 'Summa', 'visiem', '', 'fails', ''),
(3, 'kontakti', 'Kontakti', 'visiem', '', 'datubaze', 'kontakti...\r\n\r\nfghfg\r\nh\r\nfgh\r\nfgh\r\n\r\n56\r\n786\r\n867\r\n867\r\n8\r\n67867\r\n867\r\n867\r\n867\r\n8\r\n678\r\n'),
(4, 'parmums', 'Par mums', 'visiem', '', 'datubaze', 'par mums...56756756756756756756756756756\r\n\r\n\r\nfghfghfghfgh\r\nfghfgh\r\nfgh\r\nfg\r\nhfg\r\nh\r\nfgh\r\n'),
(5, 'lietotaji', 'Lietotāji', 'autorizetiem', '', 'fails', ''),
(6, 'vestules', 'Vēstules', 'autorizetiem', '6', 'datubaze', 'vēstules...'),
(7, 'autorizeties', 'Autorizēties', 'neautorizetiem', '', 'fails', ''),
(8, 'iziet', 'Iziet', 'autorizetiem', '', 'fails', ''),
(9, 'saturs', 'Saturs', 'autorizetiem', '', 'fails', ''),
(10, 'sadala10', 'Test10', 'visiem', '', 'datubaze', 'rwertertert');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lietotaji`
--
ALTER TABLE `lietotaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sadalas`
--
ALTER TABLE `sadalas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lietotaji`
--
ALTER TABLE `lietotaji`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sadalas`
--
ALTER TABLE `sadalas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
