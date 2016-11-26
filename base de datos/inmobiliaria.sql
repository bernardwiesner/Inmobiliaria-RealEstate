-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2016 at 04:10 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Table structure for table `accion`
--

CREATE TABLE `accion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accion`
--

INSERT INTO `accion` (`id`, `nombre`) VALUES
(1, 'Vender'),
(3, 'Alquilar');

-- --------------------------------------------------------

--
-- Table structure for table `anuncio`
--

CREATE TABLE `anuncio` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_accion` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `ubicacion` varchar(300) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anuncio`
--

INSERT INTO `anuncio` (`id`, `titulo`, `direccion`, `precio`, `id_accion`, `descripcion`, `ubicacion`, `id_tipo`, `id_usuario`, `activo`) VALUES
(1, 'Apartamento 2 Habt en Colinas del Seminario', 'Santo Domingo, Distrito Nacional', 13000, 3, ' Se Alquila apartamento de 2 Habitaciones, 1 baño, patio, parqueo, area de lavado, excelente residencial con seguridad patrullada 24/7, tranquilo excelente para la familia.\r\n\r\nEsta ubicado en la manzana 1, frente al seminario\r\n\r\n$13,000 mensuales ', '18.48755399377117, -69.90283584455028', 1, 1, 1),
(2, 'Bello apartamento amueblado full naco', 'Santo Domingo, Distrito Nacional', 40000, 3, 'Inmueble: Apartamentos\r\nOperación: Alquiler\r\nNúmero de habitaciones: 1\r\nBaños: 2.5\r\nMetros totales (m²): 100\r\nAmoblado: Sí\r\nAscensor: 1\r\nParqueo: Sí\r\nNiveles: 4\r\nAmbientes\r\nCocina\r\nComedor\r\nArea de servicio\r\nArea de lavado\r\nRecibidor\r\nSala\r\nComodidades y ambientes\r\nAscensor de servicio\r\nAcceso a internet\r\nLinea telefónica\r\nTV/Cable\r\nSeguridad\r\nPrecio= 1.000 US$ NEGOCIABLE. Incluye mantenimiento', '18.50630780246645, -69.99098968226463', 1, 2, 1),
(3, 'Apartamento de 1 habitación Ens. Paraiso ', 'Santo Domingo, Distrito Nacional', 36000, 3, 'orre de 8 niveles\r\n\r\nDisponibles Apts. C-4, C-5, C-6 y C-7 (pisos 4, 5, 6 y 7)\r\n\r\nApts. de 73 mts2.\r\n\r\n1 habitación ', '18.520241588430114, -69.77950286585838', 1, 2, 1),
(4, '', '', 0, 1, '', '', 1, 1, 1),
(5, '', '', 0, 1, '', '', 1, 1, 1),
(6, '', '', 0, 1, '', '', 1, 1, 1),
(7, '', '', 0, 1, '', '', 1, 1, 1),
(8, '', '', 0, 1, '', '', 1, 1, 1),
(9, '', '', 0, 1, '', '', 1, 1, 1),
(10, '', '', 0, 0, '', '', 0, 1, 1),
(11, '', '', 0, 1, '', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `id_anuncio`, `foto`, `num`) VALUES
(1, 1, 'files/2666485846.jpg', 1),
(12, 1, 'files/fondo.jpg', 2),
(4, 2, 'files/2621305862.jpg', 1),
(5, 2, 'files/2612782543.jpg', 2),
(6, 2, 'files/2629829181.jpg', 3),
(7, 2, 'files/2638352500.jpg', 4),
(9, 3, 'files/7504603018.jpg', 1),
(10, 3, 'files/26383525001.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`) VALUES
(1, 'Apartamento'),
(3, 'Solar');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `informacion` text NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `clave`, `cedula`, `correo`, `nombre`, `apellido`, `telefono`, `celular`, `fax`, `informacion`, `activo`, `admin`) VALUES
(1, 'beni', '202cb962ac59075b964b07152d234b70', '402-246598-0', 'deamonlinker@yahoo.com', 'Bernard', 'Wiesner', '809-585-5535', '809-374-5535', '809-374-5555', 'Soy vendedor', 1, 1),
(2, 'suna', '202cb962ac59075b964b07152d234b70', '402-246598-0', 'suna@yahoo.com', 'Suna', 'Wiesner', '809-585-5535', '809-374-5535', '809-374-5555', 'Soy vendedora', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accion`
--
ALTER TABLE `accion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accion`
--
ALTER TABLE `accion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
