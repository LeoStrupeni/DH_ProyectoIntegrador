-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2019 a las 07:02:00
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `store`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2019-08-24 09:04:35', '2019-08-24 09:04:35', 'dolores'),
(2, '2019-08-24 09:04:35', '2019-08-24 09:04:35', 'veniam'),
(3, '2019-08-24 09:04:35', '2019-08-24 09:04:35', 'cupiditate'),
(4, '2019-08-24 09:04:35', '2019-08-24 09:04:35', 'debitis'),
(5, '2019-08-24 09:04:35', '2019-08-24 09:04:35', 'nihil'),
(6, '2019-08-24 09:04:35', '2019-08-24 09:04:35', 'explicabo'),
(7, '2019-08-24 09:04:35', '2019-08-24 09:04:35', 'sed'),
(8, '2019-08-24 09:04:35', '2019-08-24 09:04:35', 'possimus'),
(9, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'eum'),
(10, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'aliquam'),
(11, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'consectetur'),
(12, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'quibusdam'),
(13, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'et'),
(14, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'occaecati'),
(15, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'vel'),
(16, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'eaque'),
(17, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'placeat'),
(18, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'id'),
(19, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'quae'),
(20, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'aut'),
(21, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'dolore'),
(22, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'velit'),
(23, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'eius'),
(24, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'porro'),
(25, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'a'),
(26, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'aperiam'),
(27, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'asperiores'),
(28, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'et'),
(29, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'aut'),
(30, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'ut'),
(31, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'beatae'),
(32, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'omnis'),
(33, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'iste'),
(34, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'dicta'),
(35, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'cupiditate'),
(36, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'omnis'),
(37, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'praesentium'),
(38, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'rem'),
(39, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'ad'),
(40, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'inventore'),
(41, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'culpa'),
(42, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'reprehenderit'),
(43, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'laborum'),
(44, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'sit'),
(45, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'et'),
(46, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'qui'),
(47, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'et'),
(48, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'aut'),
(49, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'similique'),
(50, '2019-08-24 09:04:36', '2019-08-24 09:04:36', 'ad'),
(51, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'atque'),
(52, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'nihil'),
(53, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'facere'),
(54, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'odio'),
(55, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'sapiente'),
(56, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'facilis'),
(57, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'ut'),
(58, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'dolores'),
(59, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'dolorem'),
(60, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'et'),
(61, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'sit'),
(62, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'voluptates'),
(63, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'maxime'),
(64, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'asperiores'),
(65, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'deserunt'),
(66, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'vel'),
(67, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'dolore'),
(68, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'consequatur'),
(69, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'voluptatem'),
(70, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'eaque'),
(71, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'minima'),
(72, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'cum'),
(73, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'voluptatum'),
(74, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'provident'),
(75, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'impedit'),
(76, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'numquam'),
(77, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'perspiciatis'),
(78, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'temporibus'),
(79, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'dolorum'),
(80, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'quis'),
(81, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'ut'),
(82, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'rem'),
(83, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'pariatur'),
(84, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'est'),
(85, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'ipsum'),
(86, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'neque'),
(87, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'harum'),
(88, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'fuga'),
(89, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'ratione'),
(90, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'dolor'),
(91, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'doloremque'),
(92, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'magni'),
(93, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'est'),
(94, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'amet'),
(95, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'amet'),
(96, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'veritatis'),
(97, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'libero'),
(98, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'quis'),
(99, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'fugit'),
(100, '2019-08-24 09:05:22', '2019-08-24 09:05:22', 'consequatur'),
(101, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'sequi'),
(102, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'quia'),
(103, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'repudiandae'),
(104, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'perferendis'),
(105, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'qui'),
(106, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'quis'),
(107, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'aliquid'),
(108, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'error'),
(109, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'saepe'),
(110, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'facilis'),
(111, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'quas'),
(112, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'sint'),
(113, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'temporibus'),
(114, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'et'),
(115, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'voluptatibus'),
(116, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'doloribus'),
(117, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'velit'),
(118, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'nulla'),
(119, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'ex'),
(120, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'magni'),
(121, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'non'),
(122, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'eum'),
(123, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'error'),
(124, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'sed'),
(125, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'tempora'),
(126, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'voluptatem'),
(127, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'occaecati'),
(128, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'reiciendis'),
(129, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'itaque'),
(130, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'eveniet'),
(131, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'itaque'),
(132, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'asperiores'),
(133, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'ut'),
(134, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'voluptatem'),
(135, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'quia'),
(136, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'id'),
(137, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'corporis'),
(138, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'sunt'),
(139, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'necessitatibus'),
(140, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'aut'),
(141, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'veritatis'),
(142, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'eligendi'),
(143, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'voluptas'),
(144, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'quas'),
(145, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'ipsum'),
(146, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'praesentium'),
(147, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'officiis'),
(148, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'sed'),
(149, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'cupiditate'),
(150, '2019-08-24 09:18:19', '2019-08-24 09:18:19', 'quam'),
(151, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'quam'),
(152, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'et'),
(153, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'enim'),
(154, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'aut'),
(155, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'et'),
(156, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'aut'),
(157, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'odit'),
(158, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'velit'),
(159, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'earum'),
(160, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'ipsam'),
(161, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'voluptatibus'),
(162, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'aliquid'),
(163, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'nulla'),
(164, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'nihil'),
(165, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'assumenda'),
(166, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'molestias'),
(167, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'ipsum'),
(168, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'consequatur'),
(169, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'magni'),
(170, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'at'),
(171, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'quos'),
(172, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'tempore'),
(173, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'unde'),
(174, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'quis'),
(175, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'asperiores'),
(176, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'fugiat'),
(177, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'assumenda'),
(178, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'repellendus'),
(179, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'doloribus'),
(180, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'pariatur'),
(181, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'ea'),
(182, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'a'),
(183, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'quisquam'),
(184, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'laboriosam'),
(185, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'eum'),
(186, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'in'),
(187, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'saepe'),
(188, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'voluptas'),
(189, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'rem'),
(190, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'et'),
(191, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'est'),
(192, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'nemo'),
(193, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'dolores'),
(194, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'fugiat'),
(195, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'qui'),
(196, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'voluptatem'),
(197, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'non'),
(198, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'quo'),
(199, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'molestias'),
(200, '2019-08-24 09:21:28', '2019-08-24 09:21:28', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_parent_category` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`, `id_parent_category`) VALUES
(1, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Goldner-Abernathy', 0),
(2, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Beahan, Wiza and Johnson', 0),
(3, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Larson, Heathcote and Kertzmann', 0),
(4, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Kessler, Altenwerth and Littel', 0),
(5, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Lynch-Simonis', 0),
(6, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Leannon-Luettgen', 0),
(7, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Spinka PLC', 0),
(8, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Becker-Johnson', 0),
(9, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Zemlak-Klein', 0),
(10, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Schimmel-Abbott', 0),
(11, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Rowe, Goyette and Keebler', 0),
(12, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Schamberger-Reilly', 0),
(13, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Towne-Botsford', 0),
(14, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Pfannerstill-Gutkowski', 0),
(15, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Zieme Inc', 0),
(16, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Abernathy, Koss and Franecki', 0),
(17, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Effertz, Funk and Quitzon', 0),
(18, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Hammes, Hoppe and Quigley', 0),
(19, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Fisher-Kuhic', 0),
(20, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'McClure Group', 0),
(21, '2019-08-24 09:05:31', '2019-08-24 09:05:31', 'Spinka Inc', 0),
(22, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Bednar, Denesik and Haley', 0),
(23, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Okuneva, Haley and Keeling', 0),
(24, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Prohaska and Sons', 0),
(25, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Jones-Barton', 0),
(26, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Bernhard, Pfannerstill and Sanford', 0),
(27, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Ebert PLC', 0),
(28, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Lueilwitz, Kuhn and Kuhic', 0),
(29, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Will LLC', 0),
(30, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Reilly-Keebler', 0),
(31, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Bernhard LLC', 0),
(32, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Schmidt, Hill and Torphy', 0),
(33, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Stroman Group', 0),
(34, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Bashirian PLC', 0),
(35, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Turcotte, Kuvalis and Gaylord', 0),
(36, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Davis Group', 0),
(37, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Erdman LLC', 0),
(38, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Sawayn-Jenkins', 0),
(39, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Reilly-Dietrich', 0),
(40, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Klein-Kreiger', 0),
(41, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Jast LLC', 0),
(42, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Gleason Ltd', 0),
(43, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Cruickshank, Howell and Aufderhar', 0),
(44, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Mohr, Medhurst and Lockman', 0),
(45, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Wilkinson, Haley and Cronin', 0),
(46, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Bins, Dooley and Bartell', 0),
(47, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Beer-Rowe', 0),
(48, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Swift, Schmeler and McClure', 0),
(49, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Jakubowski-Douglas', 0),
(50, '2019-08-24 09:05:32', '2019-08-24 09:05:32', 'Metz-Cassin', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_24_042034_create_products_table', 2),
(4, '2019_08_24_042044_create_brands_table', 2),
(5, '2019_08_24_042057_create_categories_table', 2),
(6, '2019_08_24_042351_create_sales_table', 2),
(7, '2019_08_24_042622_modify_users_table', 3),
(8, '2019_08_24_043008_modify_products_table', 4),
(9, '2019_08_24_060233_modify_categories_table', 5),
(10, '2019_08_24_060353_modify_brands_table', 5),
(11, '2019_08_24_142637_modify_categories_table', 6),
(12, '2019_08_24_152629_modify_sales_table', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `graduation` tinyint(3) UNSIGNED NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` smallint(5) UNSIGNED NOT NULL,
  `volume` smallint(5) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `name`, `description`, `price`, `graduation`, `origin`, `image`, `year`, `volume`, `brand_id`, `category_id`) VALUES
(1, '2019-08-24 09:15:56', '2019-08-24 09:15:56', 'Pigeon. \'I can tell you his history,\' As they.', 'IT. It\'s HIM.\' \'I don\'t like them raw.\' \'Well, be off, and she felt that it had grown to her very.', '302.30', 4, 'Comoros', 'C:\\Users\\corte\\AppData\\Local\\Temp\\b5dc0bf45bdd511890477a0cc2ee0b6b.jpg', 2004, 550, 8, 30),
(2, '2019-08-24 09:15:56', '2019-08-24 09:15:56', 'I like\"!\' \'You might just as I tell you, you.', 'Alice. The poor little thing sat down and looked at the stick, and made a rush at Alice as she was.', '265.00', 5, 'Swaziland', 'C:\\Users\\corte\\AppData\\Local\\Temp\\f6ed81b1c8aaa28265d1f62e53cd89fa.jpg', 2018, 567, 33, 19),
(3, '2019-08-24 09:15:56', '2019-08-24 09:15:56', 'The further off from England the nearer is to do.', 'No, it\'ll never do to hold it. As soon as she tucked her arm affectionately into Alice\'s, and they.', '63.42', 9, 'Maldives', 'C:\\Users\\corte\\AppData\\Local\\Temp\\b4c5d93a984b1aeb963f222185c442ab.jpg', 1983, 310, 63, 1),
(4, '2019-08-24 09:15:56', '2019-08-24 09:15:56', 'I\'ll be jury,\" Said cunning old Fury: \"I\'ll try.', 'Eaglet, and several other curious creatures. Alice led the way, and the executioner ran wildly up.', '78.04', 9, 'Germany', 'C:\\Users\\corte\\AppData\\Local\\Temp\\9f888d13a1575b1d953b9c409005dc98.jpg', 2004, 907, 85, 14),
(5, '2019-08-24 09:15:56', '2019-08-24 09:15:56', 'She had already heard her voice close to her.', 'I\'d only been the whiting,\' said the Caterpillar; and it put the hookah out of the trees upon her.', '421.78', 3, 'Azerbaijan', 'C:\\Users\\corte\\AppData\\Local\\Temp\\c4321fcefefb4dc018ad67bfaec9757c.jpg', 1982, 428, 35, 43),
(6, '2019-08-24 09:15:56', '2019-08-24 09:15:56', 'Dinah! I wonder what they said. The.', 'ONE respectable person!\' Soon her eye fell upon a little while, however, she again heard a little.', '422.00', 1, 'Puerto Rico', 'C:\\Users\\corte\\AppData\\Local\\Temp\\7f8240c7ccdb949baa1a41a4f5da69bb.jpg', 1970, 377, 16, 21),
(7, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'White Rabbit returning, splendidly dressed, with.', 'Alice felt that there was hardly room for this, and she felt that it would be quite as much.', '451.83', 7, 'Saint Helena', 'C:\\Users\\corte\\AppData\\Local\\Temp\\fa87b45c633a2f5b62a38f901fa89a0b.jpg', 2001, 579, 13, 4),
(8, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'She went in search of her favourite word.', 'Alice very politely; but she thought to herself. Imagine her surprise, when the race was over.', '28.55', 6, 'Saint Lucia', 'C:\\Users\\corte\\AppData\\Local\\Temp\\fb88d6ac63336332f0adb8688f08d536.jpg', 2009, 47, 75, 41),
(9, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'King, and the two creatures, who had got its.', 'Alice, \'we learned French and music.\' \'And washing?\' said the Caterpillar. Alice said very.', '273.71', 1, 'Brazil', 'C:\\Users\\corte\\AppData\\Local\\Temp\\65e5acbf9693c91c87dd597631ebe1cd.jpg', 1976, 755, 31, 17),
(10, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'English,\' thought Alice; \'only, as it\'s asleep.', 'Lory hastily. \'I thought you did,\' said the cook. The King laid his hand upon her arm, that it.', '372.60', 8, 'Syrian Arab Republic', 'C:\\Users\\corte\\AppData\\Local\\Temp\\479a235888110554f47d565f7e86a8be.jpg', 1990, 658, 41, 33),
(11, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Improve his shining tail, And pour the waters of.', 'Do you think you might catch a bad cold if she meant to take MORE than nothing.\' \'Nobody asked.', '73.14', 0, 'Saint Barthelemy', 'C:\\Users\\corte\\AppData\\Local\\Temp\\41e85f2fdf3dbfda9c852c1f3f556b92.jpg', 1978, 106, 72, 36),
(12, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'I do,\' said the Mock Turtle. \'Very much indeed,\'.', 'Caterpillar. Alice folded her hands, and began:-- \'You are old, Father William,\' the young lady.', '237.00', 7, 'United States Minor Outlying Islands', 'C:\\Users\\corte\\AppData\\Local\\Temp\\52cef1e730edac59ccdb76feca9446a6.jpg', 1994, 379, 7, 6),
(13, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'I\'m better now--but I\'m a deal too far off to.', 'Alice, that she began again. \'I should think it so VERY nearly at the stick, and made another rush.', '397.94', 5, 'Angola', 'C:\\Users\\corte\\AppData\\Local\\Temp\\c1cec6d9c9b883291a98bf0d90f6fbc6.jpg', 2004, 112, 83, 4),
(14, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'CHAPTER VI. Pig and Pepper For a minute or two.', 'Queen said to Alice, and she thought it must be the right size for going through the door, she.', '62.29', 4, 'Armenia', 'C:\\Users\\corte\\AppData\\Local\\Temp\\e9d912365fdd724fd0642faef6d010fe.jpg', 1986, 383, 48, 48),
(15, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'I almost think I can guess that,\' she added in a.', 'Footman went on for some time busily writing in his turn; and both footmen, Alice noticed, had.', '432.00', 2, 'Guinea-Bissau', 'C:\\Users\\corte\\AppData\\Local\\Temp\\2d9ac9b52e350ad25a5a00e15ccc254d.jpg', 1994, 425, 91, 21),
(16, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice. \'Well, then,\' the Cat went on, \'I must be.', 'Number One,\' said Alice. \'Oh, don\'t talk about cats or dogs either, if you don\'t even know what to.', '22.57', 6, 'Italy', 'C:\\Users\\corte\\AppData\\Local\\Temp\\a6ca9c7dc0df0367416c7bc71c8dcff8.jpg', 2018, 613, 54, 44),
(17, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Eaglet, and several other curious creatures.', 'Alice looked down at her hands, and was just possible it had grown so large in the middle, nursing.', '111.89', 8, 'Pitcairn Islands', 'C:\\Users\\corte\\AppData\\Local\\Temp\\9c903b60dd3d3b85b5876a38e6f70cbd.jpg', 1985, 789, 55, 10),
(18, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Hatter. \'He won\'t stand beating. Now, if you.', 'I COULD NOT SWIM--\" you can\'t be Mabel, for I know I do!\' said Alice thoughtfully: \'but then--I.', '174.00', 3, 'Wallis and Futuna', 'C:\\Users\\corte\\AppData\\Local\\Temp\\33803eaba9136eeaa3d7c1c6a9c6243b.jpg', 2016, 581, 4, 14),
(19, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice would not give all else for two Pennyworth.', 'RED rose-tree, and we put a stop to this,\' she said aloud. \'I shall be late!\' (when she thought it.', '256.75', 5, 'Honduras', 'C:\\Users\\corte\\AppData\\Local\\Temp\\61846b4fb7f56b1d3844271d5ce24a6d.jpg', 1983, 977, 79, 2),
(20, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice put down yet, before the officer could get.', 'I\'ll tell him--it was for bringing the cook took the place where it had a little bit of mushroom.', '177.84', 9, 'Bermuda', 'C:\\Users\\corte\\AppData\\Local\\Temp\\2b1e91cc1fd1390f14941e5da4111f99.jpg', 1974, 347, 90, 19),
(21, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'That your eye was as much as serpents do, you.', 'It doesn\'t look like it?\' he said. (Which he certainly did NOT, being made entirely of cardboard.).', '9.61', 9, 'Italy', 'C:\\Users\\corte\\AppData\\Local\\Temp\\a04bff7102174f324a66002cd8d828ce.jpg', 2014, 846, 63, 31),
(22, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Queen. \'Never!\' said the Hatter: \'but you could.', 'Alice, \'it\'s very easy to take out of its mouth, and its great eyes half shut. This seemed to be.', '186.00', 6, 'Panama', 'C:\\Users\\corte\\AppData\\Local\\Temp\\b9a6a6bde124036a1ad75511605161df.jpg', 2011, 279, 36, 38),
(23, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice. \'Only a thimble,\' said Alice in a natural.', 'Little Bill It was as much as she left her, leaning her head to feel very queer to ME.\' \'You!\'.', '316.07', 7, 'Cocos (Keeling) Islands', 'C:\\Users\\corte\\AppData\\Local\\Temp\\ad86787090470ffbd43ef521710c8b6e.jpg', 2004, 693, 34, 29),
(24, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice was not quite like the tone of delight.', 'I\'d only been the whiting,\' said Alice, (she had grown so large in the common way. So she tucked.', '42.95', 0, 'Western Sahara', 'C:\\Users\\corte\\AppData\\Local\\Temp\\c931c96007f9beaeb1a13e8413ee133d.jpg', 2019, 531, 87, 46),
(25, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Dodo replied very politely, feeling quite.', 'Gryphon. \'I\'ve forgotten the Duchess replied, in a low, timid voice, \'If you knew Time as well.', '244.56', 3, 'British Virgin Islands', 'C:\\Users\\corte\\AppData\\Local\\Temp\\9bd6bc43369cb5d44e9d3a4556444ac6.jpg', 1993, 213, 14, 50),
(26, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'She took down a large rabbit-hole under the.', 'When the Mouse was bristling all over, and both the hedgehogs were out of the moment she felt that.', '371.39', 5, 'Turks and Caicos Islands', 'C:\\Users\\corte\\AppData\\Local\\Temp\\99e903bafb286972166f2666b522d3f5.jpg', 1974, 692, 32, 39),
(27, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice. \'Well, I never was so small as this is.', 'And yet I don\'t take this child away with me,\' thought Alice, as the soldiers shouted in reply.', '262.15', 5, 'Bhutan', 'C:\\Users\\corte\\AppData\\Local\\Temp\\b86809ce33e3f8f185bc0954a30bfd90.jpg', 1993, 638, 14, 43),
(28, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'OURS they had at the number of bathing machines.', 'There was a real nose; also its eyes were looking up into a sort of idea that they were playing.', '162.62', 4, 'Bolivia', 'C:\\Users\\corte\\AppData\\Local\\Temp\\5a0c8a8af281233cd5415a99e4609748.jpg', 1998, 527, 47, 30),
(29, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Dodo in an offended tone, \'was, that the reason.', 'ALICE\'S RIGHT FOOT, ESQ. HEARTHRUG, NEAR THE FENDER, (WITH ALICE\'S LOVE). Oh dear, what nonsense.', '67.84', 7, 'San Marino', 'C:\\Users\\corte\\AppData\\Local\\Temp\\d3c736fbf6abbc0e2047cba04fd599ac.jpg', 1986, 579, 1, 7),
(30, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Dinah, tell me your history, she do.\' \'I\'ll tell.', 'Alice gently remarked; \'they\'d have been changed for any lesson-books!\' And so she turned away.', '8.48', 8, 'Costa Rica', 'C:\\Users\\corte\\AppData\\Local\\Temp\\725924fefe158f009aaa225607c17095.jpg', 1993, 343, 3, 42),
(31, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'O Mouse!\' (Alice thought this a very difficult.', 'Queen said to herself, for she was going to leave off this minute!\' She generally gave herself.', '100.57', 0, 'Saint Pierre and Miquelon', 'C:\\Users\\corte\\AppData\\Local\\Temp\\a865e6fe1be368fce2ad4998dff0908c.jpg', 1980, 297, 74, 47),
(32, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Zealand or Australia?\' (and she tried the roots.', 'Rabbit noticed Alice, as she went on for some time without interrupting it. \'They must go by the.', '277.00', 6, 'Algeria', 'C:\\Users\\corte\\AppData\\Local\\Temp\\b56ba0c1f7381e4b7fd8bb82d2c0058b.jpg', 1981, 818, 28, 26),
(33, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'I might venture to go among mad people,\' Alice.', 'Caterpillar. This was not a bit hurt, and she at once set to partners--\' \'--change lobsters, and.', '393.92', 7, 'Marshall Islands', 'C:\\Users\\corte\\AppData\\Local\\Temp\\635adfd2929f8375e392821391c952d6.jpg', 2009, 9, 40, 14),
(34, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'King in a minute, while Alice thought she might.', 'And yet I wish I hadn\'t to bring but one; Bill\'s got the other--Bill! fetch it here, lad!--Here.', '425.00', 3, 'Niue', 'C:\\Users\\corte\\AppData\\Local\\Temp\\e3e1e13000f1b721d0637989a42d2e1c.jpg', 1976, 953, 87, 22),
(35, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Oh, how I wish you wouldn\'t keep appearing and.', 'The Queen had only one way of keeping up the little door: but, alas! the little golden key, and.', '114.29', 0, 'Bolivia', 'C:\\Users\\corte\\AppData\\Local\\Temp\\c4f8820c4f21da4ccac0ff01b873f2d3.jpg', 1993, 861, 81, 31),
(36, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'King. \'When did you begin?\' The Hatter shook his.', 'I suppose I ought to be ashamed of yourself for asking such a simple question,\' added the Gryphon.', '293.49', 4, 'Malta', 'C:\\Users\\corte\\AppData\\Local\\Temp\\1ab7930dcfcb744ea578516431428919.jpg', 1973, 136, 40, 21),
(37, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Duck: \'it\'s generally a frog or a serpent?\' \'It.', 'ALL RETURNED FROM HIM TO YOU,\"\' said Alice. \'Then you shouldn\'t talk,\' said the Gryphon: \'I went.', '329.00', 0, 'Iraq', 'C:\\Users\\corte\\AppData\\Local\\Temp\\ba0294f5c4f290207055e1bb63cad15d.jpg', 1986, 402, 4, 32),
(38, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice think it was,\' the March Hare interrupted.', 'Tale They were indeed a queer-looking party that assembled on the whole court was a real Turtle.\'.', '424.44', 7, 'France', 'C:\\Users\\corte\\AppData\\Local\\Temp\\d7972053977fc8aea074ab3491fbf55f.jpg', 2006, 881, 82, 5),
(39, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'First, she dreamed of little cartwheels, and the.', 'Bill\'s place for a dunce? Go on!\' \'I\'m a poor man, your Majesty,\' said Alice in a coaxing tone.', '86.98', 7, 'Zambia', 'C:\\Users\\corte\\AppData\\Local\\Temp\\31752dd7c2ef5db0ff82d5079396c05e.jpg', 1989, 807, 27, 25),
(40, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Gryphon replied rather impatiently: \'any shrimp.', 'I\'ve tried banks, and I\'ve tried to look through into the wood. \'It\'s the oldest rule in the last.', '83.70', 5, 'Russian Federation', 'C:\\Users\\corte\\AppData\\Local\\Temp\\02b3d439af0806ab84f9d178442c31cd.jpg', 2016, 124, 14, 44),
(41, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'The hedgehog was engaged in a languid, sleepy.', 'The Antipathies, I think--\' (she was rather glad there WAS no one to listen to her. The Cat only.', '55.70', 6, 'Falkland Islands (Malvinas)', 'C:\\Users\\corte\\AppData\\Local\\Temp\\5dfd01c1d8ea0ab74e8d80cb061e0da9.jpg', 1979, 322, 46, 27),
(42, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'GAVE HIM TWO--\" why, that must be getting home.', 'Hatter added as an explanation. \'Oh, you\'re sure to make ONE respectable person!\' Soon her eye.', '200.92', 9, 'Spain', 'C:\\Users\\corte\\AppData\\Local\\Temp\\968daaad97df9b36fcb27286a9cb348e.jpg', 2010, 165, 34, 40),
(43, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'King and the King had said that day. \'That.', 'Alice as she could, and waited till she heard was a child,\' said the Caterpillar. Alice thought.', '456.70', 5, 'Austria', 'C:\\Users\\corte\\AppData\\Local\\Temp\\2e7734b36ff145008174c661ad371cd2.jpg', 1984, 570, 89, 50),
(44, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Mary Ann, what ARE you doing out here? Run home.', 'White Rabbit as he spoke. \'UNimportant, of course, Alice could only see her. She is such a fall as.', '74.76', 6, 'Ecuador', 'C:\\Users\\corte\\AppData\\Local\\Temp\\2253fd5b20c98dfbc099080f8f959529.jpg', 1986, 228, 12, 33),
(45, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice, \'Have you seen the Mock Turtle: \'crumbs.', 'So she was considering in her face, and large eyes full of the evening, beautiful Soup! Soup of.', '405.05', 3, 'Liberia', 'C:\\Users\\corte\\AppData\\Local\\Temp\\315fa3ab535f8a099aba21a5c47081ec.jpg', 1997, 75, 1, 24),
(46, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Queen furiously, throwing an inkstand at the top.', 'I\'LL soon make you grow shorter.\' \'One side of the Mock Turtle\'s Story \'You can\'t think how glad I.', '189.37', 4, 'Panama', 'C:\\Users\\corte\\AppData\\Local\\Temp\\8f9c34986ad994a8333917e0ae227c3d.jpg', 1993, 125, 37, 37),
(47, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'As there seemed to be talking in his throat,\'.', 'Alice. \'I\'m glad they\'ve begun asking riddles.--I believe I can say.\' This was quite out of the.', '434.90', 8, 'Madagascar', 'C:\\Users\\corte\\AppData\\Local\\Temp\\dc3d05d338829b73f403f8bab9170b3f.jpg', 1982, 277, 96, 3),
(48, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Dormouse, without considering at all a proper.', 'I\'ll be jury,\" Said cunning old Fury: \"I\'ll try the effect: the next witness!\' said the Duchess.', '405.00', 3, 'French Guiana', 'C:\\Users\\corte\\AppData\\Local\\Temp\\0f119c4134f08955e470d2d95aaac993.jpg', 1971, 740, 56, 9),
(49, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'For anything tougher than suet; Yet you finished.', 'Alice. \'Of course you don\'t!\' the Hatter said, tossing his head mournfully. \'Not I!\' said the.', '257.83', 5, 'Portugal', 'C:\\Users\\corte\\AppData\\Local\\Temp\\1a94be1976893caa53f7d5404afa722d.jpg', 2017, 897, 86, 36),
(50, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice, \'I\'ve often seen a rabbit with either a.', 'Now I growl when I\'m angry. Therefore I\'m mad.\' \'I call it purring, not growling,\' said Alice.', '241.42', 0, 'Micronesia', 'C:\\Users\\corte\\AppData\\Local\\Temp\\e865e5f6cf0dd9e89536ef89abeab108.jpg', 1997, 180, 51, 1),
(51, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'MARMALADE\', but to get into that lovely garden.', 'Alice gently remarked; \'they\'d have been changed several times since then.\' \'What do you know.', '46.27', 0, 'Guyana', 'C:\\Users\\corte\\AppData\\Local\\Temp\\3612511b04522e62e6fcb256fd8b8fe4.jpg', 1983, 626, 8, 24),
(52, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice did not notice this question, but.', 'See how eagerly the lobsters to the baby, and not to make ONE respectable person!\' Soon her eye.', '128.60', 5, 'Finland', 'C:\\Users\\corte\\AppData\\Local\\Temp\\2ec9fd5d686298d03aace5f93d2a402c.jpg', 1995, 566, 53, 18),
(53, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Queen of Hearts were seated on their slates.', 'While the Owl and the Dormouse said--\' the Hatter went on again:-- \'You may not have lived much.', '490.43', 6, 'Anguilla', 'C:\\Users\\corte\\AppData\\Local\\Temp\\8eb504afe8d5c40f771cb01dad57d45f.jpg', 1976, 935, 42, 2),
(54, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice. \'Who\'s making personal remarks now?\' the.', 'Alice did not come the same as the White Rabbit, who said in a deep, hollow tone: \'sit down, both.', '308.89', 4, 'Gibraltar', 'C:\\Users\\corte\\AppData\\Local\\Temp\\7914ae2df1e7db071275192f7fdfad6d.jpg', 2006, 125, 58, 48),
(55, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Mock Turtle yawned and shut his eyes.--\'Tell her.', 'I was going to turn into a chrysalis--you will some day, you know--and then after that savage.', '448.00', 0, 'Switzerland', 'C:\\Users\\corte\\AppData\\Local\\Temp\\0394bac45e5c9b8e8ac97d105a5a85cf.jpg', 2007, 557, 67, 49),
(56, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice to herself, as usual. \'Come, there\'s half.', 'I\'ve got to?\' (Alice had been would have this cat removed!\' The Queen turned angrily away from.', '219.82', 2, 'Barbados', 'C:\\Users\\corte\\AppData\\Local\\Temp\\a650f643a87d9d419faf90ba1e7f3db0.jpg', 1994, 141, 65, 2),
(57, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Hatter said, tossing his head sadly. \'Do I look.', 'I\'ll look first,\' she said, \'and see whether it\'s marked \"poison\" or not\'; for she had drunk half.', '41.87', 9, 'Czech Republic', 'C:\\Users\\corte\\AppData\\Local\\Temp\\ffac6e01ac0405ea402d361a51e1cff2.jpg', 1997, 587, 40, 50),
(58, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'She hastily put down the chimney, and said to.', 'ALICE\'S RIGHT FOOT, ESQ. HEARTHRUG, NEAR THE FENDER, (WITH ALICE\'S LOVE). Oh dear, what nonsense.', '62.88', 5, 'Greece', 'C:\\Users\\corte\\AppData\\Local\\Temp\\88ed7288705ebec38923c91fab4d6db9.jpg', 1976, 402, 36, 41),
(59, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Duchess. An invitation for the baby, the shriek.', 'King, who had been would have this cat removed!\' The Queen smiled and passed on. \'Who ARE you.', '111.41', 5, 'Romania', 'C:\\Users\\corte\\AppData\\Local\\Temp\\636c63d1b34cdf636c70633a605a461b.jpg', 1998, 663, 66, 18),
(60, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'WHAT? The other side will make you grow taller.', 'Alice replied very solemnly. Alice was just going to remark myself.\' \'Have you seen the Mock.', '360.23', 3, 'Isle of Man', 'C:\\Users\\corte\\AppData\\Local\\Temp\\6eb0a0fc6bb21218612bbfceaaa15ffc.jpg', 2010, 34, 1, 12),
(61, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice, and, after waiting till she got up, and.', 'I think--\' (she was rather doubtful whether she ought to have no sort of lullaby to it in a low.', '336.05', 2, 'Lebanon', 'C:\\Users\\corte\\AppData\\Local\\Temp\\4f0aa1f0de11f6fa1ea6bb7d1a9148a4.jpg', 1999, 83, 59, 10),
(62, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'The chief difficulty Alice found at first was.', 'After a while she was terribly frightened all the rats and--oh dear!\' cried Alice, quite.', '223.39', 1, 'Belgium', 'C:\\Users\\corte\\AppData\\Local\\Temp\\38442e3a9a02c93fd3790babb8986560.jpg', 2017, 44, 94, 20),
(63, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'I was a bright brass plate with the edge of the.', 'Duchess, the Duchess! Oh! won\'t she be savage if I\'ve been changed several times since then.\'.', '448.16', 4, 'Bhutan', 'C:\\Users\\corte\\AppData\\Local\\Temp\\234a739ebf4b8051a49b8fb7dd3dca70.jpg', 2013, 698, 76, 13),
(64, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'How she longed to get hold of its mouth, and its.', 'Like a tea-tray in the sea. But they HAVE their tails fast in their paws. \'And how did you manage.', '159.19', 2, 'Pakistan', 'C:\\Users\\corte\\AppData\\Local\\Temp\\a79296f7dbcbaf4a70adbe48602de41f.jpg', 1978, 362, 36, 10),
(65, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'The Cat\'s head began fading away the moment she.', 'Alice. \'Off with her friend. When she got up this morning, but I grow up, I\'ll write one--but I\'m.', '380.81', 0, 'Canada', 'C:\\Users\\corte\\AppData\\Local\\Temp\\ad6975d68fa118435ae47ea2b2d4168c.jpg', 2008, 297, 41, 20),
(66, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'The Hatter was out of their hearing her; and.', 'Knave shook his head mournfully. \'Not I!\' he replied. \'We quarrelled last March--just before HE.', '21.79', 2, 'Nicaragua', 'C:\\Users\\corte\\AppData\\Local\\Temp\\a4df3da0c00bae610826988d7ccb7af3.jpg', 1979, 709, 91, 2),
(67, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Then they all spoke at once, in a deep voice.', 'Five, in a great many teeth, so she went out, but it puzzled her too much, so she sat down at.', '51.80', 7, 'Saint Martin', 'C:\\Users\\corte\\AppData\\Local\\Temp\\46b6f4ef8f2a5ca9525a8dd9db9caf04.jpg', 2003, 375, 72, 22),
(68, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Let me see: I\'ll give them a new pair of boots.', 'Down, down, down. There was nothing on it were nine o\'clock in the same thing as \"I sleep when I.', '50.60', 8, 'Kenya', 'C:\\Users\\corte\\AppData\\Local\\Temp\\8396c45b744434216b4876f0895d44c1.jpg', 1995, 720, 68, 21),
(69, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Last came a little three-legged table, all made.', 'Tarts? The King looked anxiously round, to make out at the stick, running a very fine day!\' said a.', '402.64', 8, 'Germany', 'C:\\Users\\corte\\AppData\\Local\\Temp\\08dc5500d49d3014d72fb05623514c38.jpg', 2006, 20, 92, 41),
(70, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Dormouse shall!\' they both cried. \'Wake up.', 'Our family always HATED cats: nasty, low, vulgar things! Don\'t let him know she liked them best.', '73.84', 1, 'Albania', 'C:\\Users\\corte\\AppData\\Local\\Temp\\cf5498d34c777e0e31fa0269198cbe18.jpg', 2001, 194, 11, 25),
(71, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'When the sands are all pardoned.\' \'Come, THAT\'S.', 'Alice loudly. \'The idea of having the sentence first!\' \'Hold your tongue!\' added the Dormouse.', '416.20', 1, 'Malawi', 'C:\\Users\\corte\\AppData\\Local\\Temp\\6f2ce97a79b3e19624a10e8eece96cc6.jpg', 1973, 340, 10, 3),
(72, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'I? Ah, THAT\'S the great question is, what?\' The.', 'I don\'t care which happens!\' She ate a little queer, won\'t you?\' \'Not a bit,\' said the.', '34.94', 6, 'Guyana', 'C:\\Users\\corte\\AppData\\Local\\Temp\\aa34a2fc10a45362a1e3ff88273585c5.jpg', 1991, 97, 93, 49),
(73, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'I can listen all day about it!\' and he checked.', 'Alice as she remembered having seen such a pleasant temper, and thought to herself. \'Of the.', '343.22', 4, 'Rwanda', 'C:\\Users\\corte\\AppData\\Local\\Temp\\8f365cc068e9373d5c88591acaeeac42.jpg', 1987, 73, 23, 3),
(74, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Said the mouse doesn\'t get out.\" Only I don\'t.', 'Duck. \'Found IT,\' the Mouse heard this, it turned a corner, \'Oh my ears and the Queen had only one.', '152.14', 1, 'Cyprus', 'C:\\Users\\corte\\AppData\\Local\\Temp\\fb5d4d14a375a8d7668d1be8f59f0ae7.jpg', 1989, 370, 16, 12),
(75, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Long Tale They were just beginning to end,\' said.', 'Footman continued in the middle. Alice kept her waiting!\' Alice felt that it was good practice to.', '222.07', 2, 'Sierra Leone', 'C:\\Users\\corte\\AppData\\Local\\Temp\\0dbc74a464f1b6dd201045ace7321681.jpg', 2003, 731, 86, 16),
(76, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Queen, and Alice looked very anxiously into her.', 'Alice for protection. \'You shan\'t be able! I shall be a LITTLE larger, sir, if you want to stay.', '267.49', 1, 'Mozambique', 'C:\\Users\\corte\\AppData\\Local\\Temp\\099b17c02ab80a65b7a5ad5f23968594.jpg', 1978, 232, 68, 44),
(77, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'And so it was as steady as ever; Yet you.', 'Was kindly permitted to pocket the spoon: While the Duchess to play croquet.\' The Frog-Footman.', '330.45', 6, 'Thailand', 'C:\\Users\\corte\\AppData\\Local\\Temp\\238780ca18c3f554e6950af3e8fe289a.jpg', 1987, 322, 44, 13),
(78, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'There was certainly too much of it had finished.', 'She was walking hand in hand with Dinah, and saying \"Come up again, dear!\" I shall be a letter.', '424.00', 0, 'Rwanda', 'C:\\Users\\corte\\AppData\\Local\\Temp\\2b410e6610606994b128acc9cbd1ac30.jpg', 1986, 378, 36, 33),
(79, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'I am in the pool, and the fall NEVER come to the.', 'Duchess: \'and the moral of that is, but I don\'t want YOU with us!\"\' \'They were learning to draw.', '436.90', 2, 'Isle of Man', 'C:\\Users\\corte\\AppData\\Local\\Temp\\75f198b7525f218549e9ae52cea29067.jpg', 2003, 761, 1, 49),
(80, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'King said to one of its little eyes, but it just.', 'Beautiful, beautiful Soup! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Soo--oop of the sense.', '138.60', 4, 'Isle of Man', 'C:\\Users\\corte\\AppData\\Local\\Temp\\269ef29b78eabfdb1f0c82a3676811ab.jpg', 1990, 689, 37, 25),
(81, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Turtle.\' These words were followed by a very.', 'Gryphon. \'Well, I shan\'t go, at any rate a book of rules for shutting people up like a wild beast.', '404.79', 0, 'Bulgaria', 'C:\\Users\\corte\\AppData\\Local\\Temp\\8cbd57cbcd39e90a517b587a492cad7b.jpg', 2016, 562, 18, 26),
(82, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice, that she had brought herself down to look.', 'IS that to be seen--everything seemed to follow, except a little bit, and said to the Dormouse.', '477.00', 1, 'Papua New Guinea', 'C:\\Users\\corte\\AppData\\Local\\Temp\\c6193c8d8946023cf77547b024d8215b.jpg', 1986, 420, 67, 48),
(83, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Dinah, and saying \"Come up again, dear!\" I shall.', 'HATED cats: nasty, low, vulgar things! Don\'t let me help to undo it!\' \'I shall be punished for it.', '162.03', 9, 'Peru', 'C:\\Users\\corte\\AppData\\Local\\Temp\\c4d9f09eb533b605b5fb3c30fb8926b0.jpg', 2006, 901, 35, 31),
(84, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice said to herself, \'I don\'t believe it,\'.', 'I want to see it quite plainly through the neighbouring pool--she could hear him sighing as if his.', '82.02', 7, 'Chile', 'C:\\Users\\corte\\AppData\\Local\\Temp\\0124aa13c0c0f07029706ca6b8040a76.jpg', 2012, 32, 99, 24),
(85, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice whispered, \'that it\'s done by everybody.', 'King sharply. \'Do you know what to beautify is, I can\'t see you?\' She was close behind her.', '377.00', 4, 'Aruba', 'C:\\Users\\corte\\AppData\\Local\\Temp\\46c9d4f695212564479bb603e7967176.jpg', 1989, 923, 69, 45),
(86, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Hatter, \'or you\'ll be telling me next that you.', 'I\'ve got to?\' (Alice had no idea what to do, and in another minute there was Mystery,\' the Mock.', '476.51', 1, 'Armenia', 'C:\\Users\\corte\\AppData\\Local\\Temp\\5b7f1bab7da7595e34ddd1c86dbdd21e.jpg', 2013, 339, 80, 3),
(87, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice could hear him sighing as if she were.', 'Alice ventured to say. \'What is his sorrow?\' she asked the Mock Turtle, \'they--you\'ve seen them.', '51.10', 7, 'Uruguay', 'C:\\Users\\corte\\AppData\\Local\\Temp\\41a6e85f2feaba08cbf2cc9e6041423a.jpg', 2008, 731, 87, 22),
(88, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'I know?\' said Alice, \'a great girl like you,\'.', 'However, \'jury-men\' would have made a rush at Alice the moment she appeared; but she had nibbled.', '291.00', 7, 'Haiti', 'C:\\Users\\corte\\AppData\\Local\\Temp\\0bc8f55152aeb82b30a026f4d78b33ac.jpg', 1986, 713, 25, 49),
(89, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice indignantly, and she felt sure it would.', 'And she went on, \'if you don\'t like them raw.\' \'Well, be off, then!\' said the Dodo solemnly.', '368.73', 9, 'Malaysia', 'C:\\Users\\corte\\AppData\\Local\\Temp\\f9f864ab1697589ddefb226f827dc5ba.jpg', 2007, 504, 44, 2),
(90, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'She was looking at everything that Alice said.', 'Good-bye, feet!\' (for when she looked back once or twice, half hoping that the Queen said--\' \'Get.', '66.00', 6, 'Kazakhstan', 'C:\\Users\\corte\\AppData\\Local\\Temp\\e1034c06b4b0dd7c8421881c848487ef.jpg', 2007, 61, 99, 46),
(91, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Miss, this here ought to be seen: she found her.', 'Who Stole the Tarts? The King turned pale, and shut his note-book hastily. \'Consider your.', '33.37', 4, 'Iran', 'C:\\Users\\corte\\AppData\\Local\\Temp\\0c39eb8d852e7554f231ac23bacee770.jpg', 2008, 450, 20, 3),
(92, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Dormouse\'s place, and Alice guessed in a great.', 'This did not see anything that looked like the look of the sea.\' \'I couldn\'t help it,\' she said to.', '91.35', 4, 'Armenia', 'C:\\Users\\corte\\AppData\\Local\\Temp\\e1cd17eb7605f79ac6366df45b910f81.jpg', 1976, 240, 13, 50),
(93, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'ITS WAISTCOAT-POCKET, and looked at her, and.', 'Mock Turtle went on, \'What\'s your name, child?\' \'My name is Alice, so please your Majesty?\' he.', '122.10', 3, 'Sri Lanka', 'C:\\Users\\corte\\AppData\\Local\\Temp\\6c8d927d381a3ba0bcdf24ba26bc1ff9.jpg', 2003, 156, 60, 47),
(94, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'However, she soon found herself falling down a.', 'I got up in a court of justice before, but she could not stand, and she jumped up in a melancholy.', '287.00', 5, 'Niue', 'C:\\Users\\corte\\AppData\\Local\\Temp\\ef4cb94029b153b54ad7bce2b7ba326f.jpg', 2016, 549, 53, 8),
(95, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice thought decidedly uncivil. \'But perhaps it.', 'Dormouse say?\' one of the cattle in the sea!\' cried the Mouse, getting up and ran off, thinking.', '350.66', 8, 'Estonia', 'C:\\Users\\corte\\AppData\\Local\\Temp\\4503df85a7cc04f3c4f24e66a2fb4bb2.jpg', 1982, 792, 78, 44),
(96, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'I wish I had not a moment to be seen--everything.', 'Trims his belt and his buttons, and turns out his toes.\' [later editions continued as follows The.', '61.14', 9, 'Andorra', 'C:\\Users\\corte\\AppData\\Local\\Temp\\eba29a0e9a6ee5da7b7ec683d6d16627.jpg', 2012, 852, 9, 46),
(97, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'I can say.\' This was quite tired and out of the.', 'While the Owl had the dish as its share of the evening, beautiful Soup! Beau--ootiful Soo--oop!.', '103.76', 3, 'Germany', 'C:\\Users\\corte\\AppData\\Local\\Temp\\426c2b389eb9d0b7021cdad0e4eb19f3.jpg', 1999, 987, 85, 8),
(98, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Hatter. He came in sight of the tail, and ending.', 'King, \'or I\'ll have you executed, whether you\'re a little girl she\'ll think me for asking! No.', '159.10', 8, 'Sudan', 'C:\\Users\\corte\\AppData\\Local\\Temp\\b02bc026dafa15580168641abf421e6d.jpg', 2017, 478, 43, 9),
(99, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'Alice more boldly: \'you know you\'re growing.', 'For anything tougher than suet; Yet you finished the first day,\' said the Hatter: \'as the things.', '294.14', 6, 'Seychelles', 'C:\\Users\\corte\\AppData\\Local\\Temp\\c5b599c9bd991ae923d80a14e542aa4e.jpg', 2016, 909, 18, 10),
(100, '2019-08-24 09:15:57', '2019-08-24 09:15:57', 'I didn\'t know how to get in?\' asked Alice again.', 'I hadn\'t to bring tears into her eyes--and still as she could have been changed in the wind, and.', '104.44', 1, 'Philippines', 'C:\\Users\\corte\\AppData\\Local\\Temp\\83e28c4959444ad5c7f45a853d6033d8.jpg', 1975, 55, 4, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` datetime NOT NULL,
  `total` decimal(8,2) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_id` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `email_verified_at`, `password`, `personal_id`, `birthday`, `country`, `remember_token`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 'Santiago', 'Cortez', 'sanfctz@gmail.com', NULL, '$2y$10$hhlInVGxDQfRT3UEFlyDo.33qX.8qfqpz0GbF1frMSbMm6mH2m0vK', 37299940, '2019-08-09', 'AR', NULL, '2019-08-24 10:16:29', '2019-08-24 10:16:29', 'q20WCofNHuAyqrMU8DeZH7XhM3D1U5dYM4JDZHFQ.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
