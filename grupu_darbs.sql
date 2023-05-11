-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 01:39 PM
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
(1, '2023-05-11', 'Jānis', 'Auziņš', '4124ba81d9e07b16383472af4806d33d', '659959982081e1c2a0b7daa9a0c341d3', 'tour_vad', 'lang', 'A', 'math', 'A', 12, 7),
(2, '2023-05-11', 'Elvis', 'Zīlonis', 'dd2c6f623f93f8d7d288c8a99687dc3f', '9b3b3562e0f834a4ae63566cc222e46d', 'kult_vad', 'LV', 'A', 'math', 'A', 12, 7),
(3, '2023-05-11', 'Austris', 'Kutra', '0bf2304ca77a87358a3b54c4e839072a', 'bfd53b56fbeff02be39ba0983fa0224d', 'buisness', 'math', 'B', 'lang', 'C', 9, 6),
(4, '2023-05-11', 'Armands', 'Vītols', '0ebabdfaf49d666650d63053b03e860f', '79d5b34f51653ff5c8d9a7b2b624b03d', 'skolot', 'LV', 'B', 'math', 'A', 11, 8),
(5, '2023-05-11', 'Ilze', 'Milze', 'f289dd1153f7d9c1b1110a861a5e96e6', 'e50c4a3c5f4803c7f508f338ded4577b', 'sakumsk_skol', 'LV', 'B', 'lang', 'D', 8, 7),
(6, '2023-05-11', 'Juris', 'Puris', '2222b4bcb2e52bbfd6bf06fa17f069b4', '001378a456d646508780c23fa090f39d', 'pirmsk_skol', 'math', 'C', 'lang', 'C', 8, 7),
(7, '2023-05-11', 'Nikolajs', 'Puzikovs', '8a914c0b916ba59ff739060daa947b1c', 'f1ec52c5d845d034d94b188f445d47f7', 'soc_darb', 'lang', 'A', 'math', 'A', 12, 9),
(8, '2023-05-11', 'Alīne', 'Draiskule', '88ab0f4173d60b1a3364f6cba14eec26', 'cd5d9749e3901fa0b41f399148674fcf', 'logop', 'lang', 'C', 'math', 'B', 9, 7),
(9, '2023-05-11', 'Andrejs', 'Kurkulis', '696ffe42e963d7eb78f79739223e928e', '2911207276a0037291e47a433770d3a6', 'new_media', 'LV', 'B', 'lang', 'A', 11, 8),
(10, '2023-05-11', 'Laura', 'Druvaskalne', '53da8130225661d6848c4802f2b41ac0', '00d19e94e6846021097cc66c87da6196', 'eu_val', 'LV', 'C', 'lang', 'D', 7, 6),
(11, '2023-05-11', 'Jana', 'Zibenovska', '95b925963a5621ba77cfb21be1551d7a', '83ea2aafd8818e5ac715c3bd18179097', 'baltu_val', 'lang', 'C', 'math', 'B', 9, 5),
(12, '2023-05-11', 'Zaiga', 'Zaglīte', 'e8facd39bd640626bfdbcb046cc6fd7d', 'd517ffc78b693c80f483e6c0aaf95603', 'vides_tech', 'lang', 'B', 'math', 'D', 8, 7),
(13, '2023-05-11', 'Sintija', 'Volkska', 'e0c3392713277d680282b30069d47fe3', 'c49e9b77422534fab8798b4a032f3363', 'vied_tech', 'math', 'D', 'LV', 'B', 8, 6),
(14, '2023-05-11', 'Elizabete', 'Biete', '7ddcf0f2f626f5a11c59572878800dbc', 'd84f8e0e216236b0d6a38869a4f8120b', 'IT', 'lang', 'B', 'math', 'B', 10, 5),
(15, '2023-05-11', 'Ivanova', 'Pilnoja', '13f1dd395bd7039e1bfbb3669651f7a8', 'fdd0ca418f445706c1b053577073e3df', 'vides_tech', 'lang', 'A', 'LV', 'E', 8, 7),
(80, '2023-05-11', 'Konsantīns', 'Mežiņš', '7a903c955cbd6bb8645f7b2a99047ecb', '6858639b3f9bf525c852c5f208c50883', 'tour_vad', 'lang', 'A', 'math', 'B', 11, 7),
(81, '2023-05-11', 'Madars', 'Vagalis', '67877ed73db0a0c5fb1cf88fb5321df9', '1594225129f3a65e1a05922a8719ae75', 'IT', 'lang', 'A', 'math', 'B', 11, 7),
(82, '2023-05-11', 'Madars', 'Vagalis', '67877ed73db0a0c5fb1cf88fb5321df9', '1594225129f3a65e1a05922a8719ae75', 'vied_tech', 'LV', 'B', 'math', 'B', 10, 8),
(83, '2023-05-11', 'Madars', 'Vagalis', '67877ed73db0a0c5fb1cf88fb5321df9', '1594225129f3a65e1a05922a8719ae75', 'sakumsk_skol', 'lang', 'D', 'LV', 'C', 7, 8);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `sadalas`
--
ALTER TABLE `sadalas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
