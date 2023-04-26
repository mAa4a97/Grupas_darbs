-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 02:33 AM
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
  `Pers_kods` varchar(100) NOT NULL,
  `unique_lietotajs` varchar(100) NOT NULL,
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

INSERT INTO `lietotaji` (`id`, `date`, `Vards`, `Uzvards`, `Pers_kods`, `unique_lietotajs`, `Stud_prog`, `CE_P1`, `CE_V1`, `CE_P2`, `CE_V2`, `Rangs`, `Vid`) VALUES
(1, '2023-04-20', 'Madars', 'Vagalis', '1594225129f3a65e1a05922a8719ae75', '', 'IT', 'math', 'A', 'lang', 'B', 11, 7),
(2, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(3, '2023-04-22', 'Elīna Laila', 'Frijāre', '140403-2', '', 'IT', 'math', 'A', 'lang', 'B', 11, 8),
(4, '2023-04-22', 'Gints', 'Kadeģis', '250703-2', '', 'IT', 'math', 'B', 'lang', 'B', 10, 7),
(5, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'new_media', 'LV', 'A', 'lang', 'A', 12, 8),
(6, '2023-04-20', 'Madars', 'Vagalis', '1594225129f3a65e1a05922a8719ae75', '', 'new_media', 'LV', 'A', 'lang', 'B', 11, 7),
(7, '2023-04-22', 'Elīna Laila', 'Frijāre', '140403-2', '', 'skolot', 'LV', 'A', 'math', 'B', 11, 8),
(11, '2023-04-26', 'Madars', 'Vagalis', '1594225129f3a65e1a05922a8719ae75', '', 'skolot', 'LV', 'A', 'math', 'A', 12, 7),
(17, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(18, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(19, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(20, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(21, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(22, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(23, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(24, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(25, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(26, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(27, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(28, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(29, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(30, '2023-04-22', 'Elīna Laila', 'Frijāre', '140403-2', '', 'IT', 'math', 'A', 'lang', 'B', 11, 8),
(31, '2023-04-22', 'Gints', 'Kadeģis', '250703-2', '', 'IT', 'math', 'B', 'lang', 'B', 10, 7),
(32, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(33, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(34, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(35, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(36, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(37, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(38, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(39, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(40, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(41, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(42, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(43, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(44, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(45, '2023-04-22', 'Elīna Laila', 'Frijāre', '140403-2', '', 'IT', 'math', 'A', 'lang', 'B', 11, 8),
(46, '2023-04-22', 'Gints', 'Kadeģis', '250703-2', '', 'IT', 'math', 'B', 'lang', 'B', 10, 7),
(47, '2023-04-22', 'Gints', 'Kadeģis', '250703-2', '', 'IT', 'math', 'B', 'lang', 'B', 10, 7),
(48, '2023-04-22', 'Elīna Laila', 'Frijāre', '140403-2', '', 'IT', 'math', 'A', 'lang', 'B', 11, 8),
(49, '2023-04-22', 'Gints', 'Kadeģis', '250703-2', '', 'IT', 'math', 'B', 'lang', 'B', 10, 7),
(50, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(51, '2023-04-22', 'Gints', 'Kadeģis', '250703-2', '', 'IT', 'math', 'B', 'lang', 'B', 10, 7),
(52, '2023-04-22', 'Gints', 'Kadeģis', '250703-2', '', 'IT', 'math', 'B', 'lang', 'B', 10, 7),
(53, '2023-04-22', 'Elīna Laila', 'Frijāre', '140403-2', '', 'IT', 'math', 'A', 'lang', 'B', 11, 8),
(54, '2023-04-22', 'Gints', 'Kadeģis', '250703-2', '', 'IT', 'math', 'B', 'lang', 'B', 10, 7),
(55, '2023-04-22', 'Amanda', 'Vītola', '110501-2', '', 'IT', 'math', 'A', 'lang', 'A', 12, 8),
(57, '2023-04-26', 'Egils', 'Levits', '47ac91cb8c40ed20fdf497e820a91e25', '', 'kult_vad', 'math', 'F', 'LV', 'D', 4, 4),
(58, '2023-04-26', 'Artūrs', 'Zvērs', '260423-34567', '620c7273af1e84b58105f8581a91874b', 'IT', 'math', 'F', 'lang', 'F', 2, 10);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `sadalas`
--
ALTER TABLE `sadalas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
