-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2021 a las 00:16:29
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'sistem123', '28-12-2016 11:42:05 AM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(3, 'Demo test', 7, 6, 600, '2019-06-29', '9:15 AM', '2019-06-23 23:31:28', 1, 0, '2019-11-10 23:48:30'),
(4, 'Ayurveda', 5, 5, 8050, '2019-11-08', '1:00 PM', '2019-11-05 15:28:54', 1, 1, '2019-11-10 23:48:30'),
(5, 'Dermatologist', 9, 7, 500, '2019-11-30', '5:30 PM', '2019-11-10 23:41:34', 1, 0, '2019-11-10 23:48:30'),
(6, 'Dentista', 7, 2, 200, '2020-10-21', '3:30 PM', '2020-10-16 10:14:44', 0, 1, '2020-10-16 11:32:54'),
(7, 'Dentista', 7, 2, 200, '2020-10-29', '5:00 PM', '2020-10-16 11:32:26', 1, 0, '2021-05-25 02:27:53'),
(8, 'Enfermera', 10, 2, 40, '2021-05-27', '9:30 AM', '2021-05-25 02:30:01', 1, 1, NULL),
(9, 'Dermatóloga', 12, 8, 150, '2021-05-27', '10:00 PM', '2021-05-25 02:42:36', 0, 1, '2021-05-25 02:44:13'),
(10, 'Dentista', 7, 10, 200, '2021-06-08', '4:30 PM', '2021-06-04 21:28:31', 1, 1, NULL),
(11, 'dentista', 18, 11, 225, '2021-06-16', '12:00 PM', '2021-06-18 16:59:51', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `dni` int(8) DEFAULT NULL,
  `apellidos` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`, `dni`, `apellidos`) VALUES
(19, 'Dentista', 'Daniel', 'Andahuaylas ', '20', 952662437, 'doctor@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2021-06-19 23:07:45', '2021-07-04 20:41:13', 70586862, 'Quispe Rojas'),
(20, 'Dermatólogo ', 'Jhonn', 'Andahuaylas ', '80', 952668759, 'perez@gmail.com', '28832e9014b21c449758e9f4c0382b81', '2021-07-02 19:16:26', '2021-07-03 00:06:35', 12345678, 'Perez Rojas'),
(22, 'Medicina General', 'Javier', 'Andahuyalas', '200', 952668759, 'torres@gmail.com', 'a8890e276528a221793633089dde51b2', '2021-07-04 20:07:58', NULL, 70586862, 'Torres Torres'),
(23, 'Ginecólogo ', 'Raúl Rodrigo', 'Talavera', '80', 958634886, 'raul@gmail.com', '1402f2ba80e3556bd4bcfdde3b54deba', '2021-07-05 01:51:50', '2021-07-05 02:17:28', 70586923, 'Perez Torres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(20, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2020-10-12 07:13:41', NULL, 0),
(21, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-10-12 07:14:33', '12-10-2020 10:35:59 AM', 1),
(22, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-10-15 09:21:35', '15-10-2020 10:50:19 AM', 1),
(23, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-10-15 10:26:14', '15-10-2020 10:57:18 AM', 1),
(24, NULL, 'sxsxs', 0x3a3a3100000000000000000000000000, '2020-10-16 10:39:07', NULL, 0),
(25, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2020-10-16 11:26:16', '16-10-2020 11:59:22 AM', 1),
(26, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-25 02:26:58', '25-05-2021 07:58:01 AM', 1),
(27, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-25 02:31:22', '25-05-2021 08:01:54 AM', 1),
(28, NULL, 'maria@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-25 02:38:58', NULL, 0),
(29, NULL, 'maria@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-25 02:39:15', NULL, 0),
(30, 12, 'maria@gmailcom', 0x3a3a3100000000000000000000000000, '2021-05-25 02:40:03', '25-05-2021 08:14:37 AM', 1),
(31, NULL, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-25 15:43:56', NULL, 0),
(32, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-25 15:44:20', '25-05-2021 09:44:36 PM', 1),
(33, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-26 03:30:54', '26-05-2021 09:02:03 AM', 1),
(34, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-26 03:38:52', NULL, 1),
(35, NULL, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-28 03:32:42', NULL, 0),
(36, NULL, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-28 03:33:03', NULL, 0),
(37, NULL, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-28 03:34:35', NULL, 0),
(38, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-28 03:35:10', '28-05-2021 09:39:39 AM', 1),
(39, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-04 21:22:47', '05-06-2021 03:11:31 AM', 1),
(40, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-04 21:43:20', '05-06-2021 03:24:51 AM', 1),
(41, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-10 03:28:31', '10-06-2021 09:02:10 AM', 1),
(42, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-10 13:42:31', '10-06-2021 07:12:44 PM', 1),
(43, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-11 15:42:59', '11-06-2021 09:48:47 PM', 1),
(44, NULL, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 03:34:57', NULL, 0),
(45, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 03:35:13', '12-06-2021 09:05:34 AM', 1),
(46, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 03:38:32', '12-06-2021 09:10:49 AM', 1),
(47, 7, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 04:58:47', '12-06-2021 10:31:14 AM', 1),
(48, NULL, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 17:28:04', NULL, 0),
(49, 7, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 17:28:22', '12-06-2021 11:07:45 PM', 1),
(50, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-19 23:08:15', '20-06-2021 04:40:24 AM', 1),
(51, NULL, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-19 23:11:09', NULL, 0),
(52, NULL, 'df', 0x3a3a3100000000000000000000000000, '2021-06-19 23:11:46', NULL, 0),
(53, NULL, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-19 23:12:22', NULL, 0),
(54, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-19 23:13:45', '20-06-2021 04:43:57 AM', 1),
(55, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-20 19:54:06', NULL, 1),
(56, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-20 20:04:52', NULL, 1),
(57, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-20 20:07:04', NULL, 1),
(58, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-20 20:08:45', NULL, 1),
(59, 19, 'doctor@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-20 20:10:37', '21-06-2021 02:35:30 AM', 1),
(60, 19, 'doctor@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-20 21:06:59', '21-06-2021 02:52:28 AM', 1),
(61, 19, 'doctor@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-20 21:29:20', '21-06-2021 02:59:28 AM', 1),
(62, 19, 'doctor@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-22 00:10:52', '22-06-2021 05:42:18 AM', 1),
(63, 19, 'doctor@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-22 00:12:29', '22-06-2021 05:42:42 AM', 1),
(64, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-22 00:38:35', NULL, 1),
(65, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-22 02:51:04', '22-06-2021 08:21:50 AM', 1),
(66, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-25 16:52:53', NULL, 1),
(67, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-25 16:52:53', '25-06-2021 10:23:24 PM', 1),
(68, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-25 20:07:50', '26-06-2021 01:38:31 AM', 1),
(69, 20, 'perez@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-02 19:20:10', '03-07-2021 12:51:00 AM', 1),
(70, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-02 19:34:53', '03-07-2021 01:12:27 AM', 1),
(71, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-03 03:16:42', '03-07-2021 09:12:12 AM', 1),
(72, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:55:31', NULL, 0),
(73, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:55:32', NULL, 0),
(74, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:57:46', NULL, 0),
(75, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:57:47', NULL, 0),
(76, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:57:47', NULL, 0),
(77, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:58:39', NULL, 0),
(78, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:58:40', NULL, 0),
(79, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:58:40', NULL, 0),
(80, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:58:41', NULL, 0),
(81, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:58:41', NULL, 0),
(82, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:58:41', NULL, 0),
(83, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:58:41', NULL, 0),
(84, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:58:42', NULL, 0),
(85, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:58:43', NULL, 0),
(86, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:59:50', NULL, 0),
(87, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:59:51', NULL, 0),
(88, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 03:59:51', NULL, 0),
(89, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 04:03:37', NULL, 0),
(90, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 04:03:38', NULL, 0),
(91, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 04:03:38', NULL, 0),
(92, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 04:03:38', NULL, 0),
(93, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 04:03:38', NULL, 0),
(94, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 04:03:38', NULL, 0),
(95, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 04:03:53', NULL, 0),
(96, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 04:03:53', NULL, 0),
(97, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 04:03:54', NULL, 0),
(98, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 04:03:54', NULL, 0),
(99, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 04:05:40', NULL, 0),
(100, NULL, '', 0x3a3a3100000000000000000000000000, '2021-07-03 04:05:43', NULL, 0),
(101, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-03 13:14:16', NULL, 1),
(102, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-03 13:49:59', '03-07-2021 07:20:49 PM', 1),
(103, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-03 19:09:56', NULL, 1),
(104, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-04 00:22:58', '04-07-2021 06:04:27 AM', 1),
(105, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-04 00:36:57', '04-07-2021 08:06:06 AM', 1),
(106, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2021-07-04 03:13:56', NULL, 0),
(107, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-04 03:14:04', '04-07-2021 08:45:28 AM', 1),
(108, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-04 19:54:09', NULL, 1),
(109, NULL, 'aergfhj', 0x3a3a3100000000000000000000000000, '2021-07-04 19:57:42', NULL, 0),
(110, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-04 19:57:51', '05-07-2021 01:30:39 AM', 1),
(111, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-04 20:20:44', '05-07-2021 01:54:53 AM', 1),
(112, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-04 20:41:27', '05-07-2021 02:11:35 AM', 1),
(113, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-04 23:13:00', '05-07-2021 05:17:41 AM', 1),
(114, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-05 01:38:42', '05-07-2021 07:09:29 AM', 1),
(115, 23, 'raul@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-05 01:58:59', '05-07-2021 07:42:00 AM', 1),
(116, 23, 'raul@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-05 02:13:21', '05-07-2021 07:43:36 AM', 1),
(117, 23, 'raul@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-05 02:17:40', '05-07-2021 07:47:46 AM', 1),
(118, 23, 'raul@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-05 02:23:20', '05-07-2021 07:54:34 AM', 1),
(119, 23, 'raul@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-05 02:26:50', '05-07-2021 07:57:32 AM', 1),
(120, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-05 16:39:36', '05-07-2021 10:09:39 PM', 1),
(121, 23, 'raul@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-05 16:42:58', '05-07-2021 10:13:02 PM', 1),
(122, NULL, 'erer', 0x3a3a3100000000000000000000000000, '2021-07-05 16:43:23', NULL, 0),
(123, 23, 'raul@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-05 16:46:53', '05-07-2021 10:18:18 PM', 1),
(124, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-05 16:58:49', '05-07-2021 10:32:15 PM', 1),
(125, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-05 17:02:24', '05-07-2021 10:32:27 PM', 1),
(126, 23, 'raul@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-05 17:02:35', '05-07-2021 10:32:39 PM', 1),
(127, 19, 'doctor@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-05 17:24:31', '05-07-2021 10:55:35 PM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(27, 'Dentista', '2021-06-18 16:03:52', '2021-07-02 23:57:01'),
(28, 'Dermatólogo ', '2021-07-02 19:13:13', NULL),
(35, 'Medicina física y rehabilitación', '2021-07-02 23:43:46', NULL),
(40, 'Medicina General', '2021-07-04 20:01:24', NULL),
(41, 'Ginecólogo ', '2021-07-05 01:48:37', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(4, 'Edison Quispe Vargas', 'edisonquispevargas@gmail.com', 952662437, ' este mensaje es de prueba para el curso de ingeniería de software 2', '2021-06-15 20:59:11', 'leído ', '2021-06-15 21:00:12', 1),
(5, 'Daniel', 'daniel@gmail.com', 986523457, ' Donde es la dirección de la clínica', '2021-07-03 00:18:53', NULL, NULL, NULL),
(6, 'Rocio Quispe Rojas', 'quisperocio.r@gmail.com', 956243897, ' costo de consulta de ginecología ', '2021-07-05 01:42:57', 'Leído ', '2021-07-05 01:47:14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(2, 3, '120/185', '80/120', '85 Kg', '101 degree', '#Fever, #BP high\r\n1.Paracetamol\r\n2.jocib tab\r\n', '2019-11-06 09:20:07'),
(3, 2, '90/120', '92/190', '86 kg', '99 deg', '#Sugar High\r\n1.Petz 30', '2019-11-06 09:31:24'),
(4, 1, '125/200', '86/120', '56 kg', '98 deg', '# blood pressure is high\r\n1.koil cipla', '2019-11-06 09:52:42'),
(5, 1, '96/120', '98/120', '57 kg', '102 deg', '#Viral\r\n1.gjgjh-1Ml\r\n2.kjhuiy-2M', '2019-11-06 09:56:55'),
(6, 4, '90/120', '120', '56', '98 F', '#blood sugar high\r\n#Asthma problem', '2019-11-06 19:38:33'),
(7, 5, '80/120', '120', '85', '98.6', 'Rx\r\n\r\nAbc tab\r\nxyz Syrup', '2019-11-10 23:50:23'),
(8, 7, '60', '40', '70', '80', 'dolor de estomago y colico ', '2020-10-16 11:28:28'),
(9, 6, '50', 'sggfd', '200', '25', 'dormir todo el día ', '2021-05-25 15:52:52'),
(12, 21, 'Atención por Gripe ', 'fiebre y tos ', 'el paciente debe de reposar ', '25', 'dos pastillas de la marca 02222', '2021-07-04 00:46:25'),
(13, 22, 'Atención prenatal ', '8 meses de gestación ', 'Embarazo de alto riesgo', '37', 'Reposo absoluto ', '2021-07-05 02:08:56'),
(14, 12, 'Atención prenatal ', 'fiebre', 'fiebre alta', '38', 'tomar paracetamol dos veces al dia', '2021-07-05 17:25:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `dnipaciente` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`, `dnipaciente`) VALUES
(8, 19, 'edison', 952662437, 'edison@gmail.com', 'Masculino', 'Andahuaylas', 21, 'Dada de alta', '2021-07-02 19:41:21', '2021-07-04 02:35:50', 98745612),
(12, 19, 'prueba', 61123, '123@gmail.com', 'Masculino', 'lima\r\n125', 89, 'sdfghn', '2021-07-03 13:48:47', '2021-07-04 02:35:40', 12345678),
(21, 19, 'Emilia Vargas Atao', 983893738, 'emilia@gmail.com', 'Masculino', 'San jerónimo ', 45, 'listo para enviar', '2021-07-03 20:01:14', '2021-07-03 20:02:26', 12345665),
(22, 23, 'Sonia Mallqui Huaman', 986666522, 'emerson@gmail.com', 'Femenino', 'Andahuaylas ', 50, 'Ginecología ', '2021-07-05 02:04:11', '2021-07-05 16:47:19', 89755556);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(24, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-10-15 10:56:38', NULL, 1),
(25, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2020-10-16 09:39:08', '16-10-2020 11:02:58 AM', 1),
(26, NULL, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2020-10-16 11:29:47', NULL, 0),
(27, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2020-10-16 11:30:03', '16-10-2020 12:03:14 PM', 1),
(28, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-25 02:29:20', '25-05-2021 08:10:20 AM', 1),
(29, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-25 02:41:45', '25-05-2021 08:16:44 AM', 1),
(30, NULL, 'rubin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-25 15:20:29', NULL, 0),
(31, 9, 'robin@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-25 15:20:44', '25-05-2021 08:51:38 PM', 1),
(32, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-25 15:35:19', '25-05-2021 09:11:48 PM', 1),
(33, NULL, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-26 03:21:22', NULL, 0),
(34, NULL, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-26 03:21:43', NULL, 0),
(35, NULL, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-26 03:22:34', NULL, 0),
(36, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-26 03:23:17', '26-05-2021 08:59:52 AM', 1),
(37, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-05-26 03:59:38', NULL, 1),
(38, 10, 'mario@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-04 21:26:56', '05-06-2021 03:29:48 AM', 1),
(39, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-09 16:26:24', NULL, 1),
(40, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-10 03:25:37', '10-06-2021 08:57:57 AM', 1),
(41, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-10 04:19:48', NULL, 1),
(42, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-10 13:43:09', NULL, 1),
(43, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-11 22:11:35', NULL, 1),
(44, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-11 23:03:08', NULL, 1),
(45, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-11 23:03:08', NULL, 1),
(46, NULL, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 02:58:33', NULL, 0),
(47, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 02:58:40', NULL, 1),
(48, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 03:00:14', '12-06-2021 08:54:35 AM', 1),
(49, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 03:24:47', NULL, 1),
(50, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 03:28:08', '12-06-2021 09:03:45 AM', 1),
(51, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 03:35:49', '12-06-2021 09:08:18 AM', 1),
(52, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 03:41:00', '12-06-2021 09:17:31 AM', 1),
(53, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 04:01:35', NULL, 1),
(54, NULL, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 04:08:15', NULL, 0),
(55, NULL, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 04:08:21', NULL, 0),
(56, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 04:08:29', '12-06-2021 09:41:10 AM', 1),
(57, NULL, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 04:12:20', NULL, 0),
(58, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 04:12:37', NULL, 1),
(59, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 04:25:13', NULL, 1),
(60, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 05:08:00', '12-06-2021 10:38:28 AM', 1),
(61, NULL, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 13:07:30', NULL, 0),
(62, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 13:07:42', NULL, 1),
(63, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 13:15:01', NULL, 1),
(64, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 13:18:37', NULL, 1),
(65, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 13:32:57', NULL, 1),
(66, NULL, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 15:08:15', NULL, 0),
(67, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 15:08:28', NULL, 1),
(68, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 17:16:43', NULL, 1),
(69, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 17:19:22', NULL, 1),
(70, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 17:24:05', '12-06-2021 10:57:43 PM', 1),
(71, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 17:38:04', '12-06-2021 11:16:02 PM', 1),
(72, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 17:58:06', NULL, 1),
(73, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 18:14:18', '12-06-2021 11:44:44 PM', 1),
(74, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 18:15:10', '12-06-2021 11:46:14 PM', 1),
(75, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 18:16:51', '13-06-2021 12:09:06 AM', 1),
(76, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 21:49:02', NULL, 1),
(77, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 21:50:56', NULL, 1),
(78, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 21:53:37', '13-06-2021 03:25:01 AM', 1),
(79, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 21:59:37', '13-06-2021 03:46:57 AM', 1),
(80, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-12 22:17:06', NULL, 1),
(81, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-12 23:09:44', NULL, 1),
(82, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-13 01:01:56', '13-06-2021 06:32:33 AM', 1),
(83, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-13 01:33:39', '13-06-2021 07:05:37 AM', 1),
(84, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-13 02:30:16', '13-06-2021 09:03:59 AM', 1),
(85, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-13 14:33:51', NULL, 1),
(86, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-13 15:08:26', '13-06-2021 08:39:44 PM', 1),
(87, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-13 15:15:48', NULL, 1),
(88, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-13 15:29:07', NULL, 1),
(89, NULL, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-13 15:29:56', NULL, 0),
(90, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-13 15:30:00', NULL, 1),
(91, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-13 15:30:51', NULL, 1),
(92, 8, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-13 18:50:29', '14-06-2021 12:20:56 AM', 1),
(93, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-13 19:45:09', NULL, 1),
(94, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-13 19:47:34', '14-06-2021 01:20:46 AM', 1),
(95, 8, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-13 22:39:43', '14-06-2021 04:26:36 AM', 1),
(96, NULL, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-13 23:32:26', NULL, 0),
(97, NULL, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-13 23:32:34', NULL, 0),
(98, 11, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-13 23:33:29', NULL, 1),
(99, 11, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-14 01:02:52', '14-06-2021 06:33:03 AM', 1),
(100, 11, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-14 16:15:38', '14-06-2021 09:45:54 PM', 1),
(101, 11, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-15 20:53:01', '16-06-2021 02:23:24 AM', 1),
(102, NULL, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-15 21:01:46', NULL, 0),
(103, 11, 'edison@gmail.com', 0x3132372e302e302e3100000000000000, '2021-06-15 21:01:52', NULL, 1),
(104, 11, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-15 21:21:22', '16-06-2021 02:52:17 AM', 1),
(105, 11, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-18 16:59:35', '18-06-2021 10:30:30 PM', 1),
(106, 11, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-19 22:09:28', NULL, 1),
(107, 11, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-19 22:18:16', '20-06-2021 03:54:54 AM', 1),
(108, 11, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-19 22:26:11', '20-06-2021 03:56:22 AM', 1),
(109, 11, 'edison@gmail.com', 0x3a3a3100000000000000000000000000, '2021-06-19 22:29:24', '20-06-2021 04:05:18 AM', 1),
(110, NULL, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-04 19:55:16', NULL, 0),
(111, NULL, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-04 19:55:36', NULL, 0),
(112, 12, 'edisonquispevargas@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-04 19:56:39', '05-07-2021 01:27:20 AM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
