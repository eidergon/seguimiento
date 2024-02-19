-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2023 a las 00:33:05
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `id` int(11) NOT NULL,
  `user` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `cargo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`id`, `user`, `pass`, `nombre`, `cargo`) VALUES
(1, 'gonxa', '12345', 'eider gonzalez', 'back'),
(2, 'ihera', '123', 'iheranyely martinez', 'back'),
(3, 'santiago', '111', 'santiago valencia', 'admin'),
(4, 'lis', '1234', 'lisbet sanchez', 'back');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempos`
--

CREATE TABLE `tiempos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `user` varchar(20) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `hora` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiempos`
--

INSERT INTO `tiempos` (`id`, `tipo`, `user`, `fecha`, `hora`) VALUES
(20, 'entrada', 'eider gonzalez', '2023-10-24', '13:43:37'),
(21, 'entrada', 'iheranyely martinez', '2023-10-24', '13:45:17'),
(22, 'salida', 'iheranyely martinez', '2023-10-24', '14:17:41'),
(23, 'entrada', 'lisbet sanchez', '2023-10-24', '16:48:53');

-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
