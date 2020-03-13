-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-03-2020 a las 04:34:30
-- Versión del servidor: 8.0.13-4
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `00C3EkJLPr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `Id` int(11) NOT NULL,
  `First_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`Id`, `First_name`, `Last_name`, `Phone`, `Email`, `Address`, `City`, `Date`) VALUES
(0, 'juan', 'pedro', '3033356201', 'pedro@gmai.com', 'calle 69 sur N 29 - 30', 'Bogota', '2020-03-11 02:00:00'),
(1, 'camilo', 'pedro', '356289456', 'Camilo@gmai.com', 'calle 78 sur N 29 - 30', 'medellin', '2020-03-11 02:22:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Meat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Chicken` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Potatoes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Milk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`Id`, `Meat`, `Chicken`, `Potatoes`, `Milk`, `Date`) VALUES
(0, '100kg', '20kg', '70kg', '50l', '2020-03-09'),
(1, '300kg', '200kg', '100kg', '100l', '2020-03-10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
