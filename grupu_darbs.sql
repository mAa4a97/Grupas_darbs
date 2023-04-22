-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 02:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grupu_darbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `lietotaji`
--

CREATE TABLE `lietotaji` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `Vards` varchar(20) NOT NULL,
  `Uzvards` varchar(20) NOT NULL,
  `Pers_kods` varchar(12) NOT NULL,
  `Stud_prog` varchar(50) NOT NULL,
  `CE_P1` varchar(50) NOT NULL,
  `CE_V1` varchar(1) NOT NULL,
  `CE_P2` varchar(50) NOT NULL,
  `CE_V2` varchar(1) NOT NULL,
  `Rangs` int(50) NOT NULL,
  `Vid` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `lietotaji`
--

INSERT INTO `lietotaji` (`id`, `date`, `Vards`, `Uzvards`, `Pers_kods`, `Stud_prog`, `CE_P1`, `CE_V1`, `CE_P2`, `CE_V2`, `Rangs`, `Vid`) VALUES
(1, '2023-04-20', 'Madars', 'Vagalis', '180303-22226', 'IT', 'math', 'A', 'lang', 'B', 11, 7),
(2, '2023-04-22', 'Amanda', 'Vītola', '110501-2', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(3, '2023-04-22', 'Elīna Laila', 'Frijāre', '140403-2', 'IT', 'math', 'A', 'lang', 'B', 11, 8),
(4, '2023-04-22', 'Gints', 'Kadeģis', '250703-2', 'IT', 'math', 'B', 'lang', 'B', 10, 7),
(5, '2023-04-22', 'Amanda', 'Vītola', '110501-2', 'new_media', 'LV', 'A', 'lang', 'A', 12, 8),
(6, '2023-04-20', 'Madars', 'Vagalis', '180303-22226', 'new_media', 'LV', 'A', 'lang', 'B', 11, 7),
(7, '2023-04-22', 'Elīna Laila', 'Frijāre', '140403-2', 'skolot', 'LV', 'A', 'math', 'B', 11, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sadalas`
--

CREATE TABLE `sadalas` (
  `id` int(10) UNSIGNED NOT NULL,
  `adrese` varchar(100) NOT NULL,
  `nosaukums` varchar(100) NOT NULL,
  `redzams` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `sadalas`
--

INSERT INTO `sadalas` (`id`, `adrese`, `nosaukums`, `redzams`) VALUES
(1, 'sakums', 'Sākums', 'neautorizetiem'),
(2, 'autorizeties', 'Autorizēties', 'neautorizetiem'),
(3, 'reg', 'Reģistrēties kursiem', 'autorizetiem'),
(4, 'rangs', 'Rangs', 'autorizetiem'),
(5, 'iziet', 'Iziet', 'autorizetiem');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
