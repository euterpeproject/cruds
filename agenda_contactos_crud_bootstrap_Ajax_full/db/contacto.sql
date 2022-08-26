-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2022 a las 19:53:38
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda_contactos2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `age` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `name`, `phone`, `date`, `age`, `address`, `email`) VALUES
(1, 'Juan', '362012457', '1993-06-13', '29', 'calle 33', 'user2@localhost'),
(2, 'raul', '32154858', '2022-08-18', '0', 'calle 22', 'user10@localhost'),
(3, 'victor ', '2124575', '1998-07-23', '24', 'calle 33', 'user@localhost'),
(4, 'luzmila', '32154858', '2022-08-25', '0', 'calle 33', 'user77@localhost'),
(5, 'Manuela', '32154858', '2022-08-18', '19', 'calle 1999', 'user1990@localhost'),
(6, 'Pedro', '32154858', '2022-08-26', '56', 'calle 33', 'user154@localhost'),
(7, 'carlos ', '47574777878', '2022-08-11', '45', 'calle 2234555443', 'user1@localhost'),
(8, 'Maria', '654654654654', '2022-08-19', '0', 'gfyhgfhtftf5565', 'user4@localhost'),
(9, 'hola', '3433434343', '2022-08-17', '43', 'hola324323', 'user3@localhost'),
(10, 'hola 333', '5665456454', '2022-08-12', '0', 'calle 33gdfgdfgdfgf', 'user1212@localhost'),
(11, 'hola 888', '3434343', '2022-08-12', '0', 'calle 22dsdfdsf', 'user143@localhost'),
(12, 'hola 999', '546546434534', '2017-06-15', '5', 'calle 22dgfddfgdfgd', 'user61@localhost');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
