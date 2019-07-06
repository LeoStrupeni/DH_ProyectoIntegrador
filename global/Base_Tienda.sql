-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2019 a las 22:05:33
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` int(11) NOT NULL,
  `Usuario_id` int(11) DEFAULT NULL,
  `Producto_id` int(11) DEFAULT NULL,
  `Cantidad` tinyint(4) DEFAULT NULL,
  `Productos_idProductos` int(11) NOT NULL,
  `Productos_Marcas_idMarcas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategorias` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `TipoBebida` varchar(30) DEFAULT NULL,
  `CategoriaPadre` int(11) DEFAULT NULL,
  `Categorias_idCategorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `idMarcas` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas_has_categorias`
--

CREATE TABLE `marcas_has_categorias` (
  `Marcas_idMarcas` int(11) NOT NULL,
  `Categorias_idCategorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Precio` decimal(10,2) UNSIGNED NOT NULL,
  `Graduacion` decimal(10,2) NOT NULL,
  `Origen` varchar(30) NOT NULL,
  `imagen` varchar(20) NOT NULL,
  `Año` int(11) NOT NULL,
  `Volumen` int(11) NOT NULL,
  `Marcas_idMarcas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `Name`, `Descripcion`, `Precio`, `Graduacion`, `Origen`, `imagen`, `Año`, `Volumen`, `Marcas_idMarcas`) VALUES
(1, 'Amrut Fusion Single Malt', 'Jim Murray?s Third Finest Whisky in the World for 2010, Amrut Fusion is distilled from barley from Scotland and India, making this a true fusion of countries. Nose: Rich, barley, fruity. Big on citrus, spices, creamy sweetness. A hint of peat. Palate: Oak', '129.99', '0.10', 'Importado', 'imagen1.jpg', 2010, 750, 1),
(2, '8 Seconds Canadian Whisky', 'This unique Canadian Whisky developed elegant nuances from its aging in oak barrels and has become one of the smoothest, most refined Canadian Whiskies on the market today.', '574.99', '0.10', 'Importado', 'imagen2.jpg', 2011, 750, 2),
(3, 'Black Velvet Canadian Whisky', 'In 1909, CHIVAS REGAL 25 Year Old made a ceremonious New York debut and delivered a new level of luxury and glamour to The Citys uppermost denizens. Soon, it became the whisky of choice among the fashionable and glamorous elite. With the onset of World Wa', '199.99', '0.40', 'Importado', 'imagen3.jpg', 2014, 1800, 3),
(4, 'Bastille Whisky Hand-crafted', 'Bastille 1789 is produced from barley and wheat from northeast France and water from Gensac Spring...', '74.99', '0.40', 'Importado', 'imagen4.jpg', 2012, 1000, 4),
(5, 'Balcones Whisky Brimstone', 'Made from 100% blue corn, this whiskey is smoked using Texas scrub oak rather than traditional Scottish peat...', '99.99', '0.40', 'Importado', 'imagen5.jpg', 2014, 750, 5),
(6, 'Canadian Whisky 12 Year Privat', 'Adelphi bottles straight from the cask without colouring or chill-filtration. This allows the true and ...', '219.99', '0.45', 'Importado', 'imagen6.jpg', 2007, 750, 6),
(7, 'Avion Silver Agave Tequila', 'Voted World´s Best Tasting Tequila and Best Unaged White Spirit at the San Francisco World Spirits...', '129.99', '0.40', 'Importado', 'imagen7.jpg', 2014, 750, 7),
(8, 'Beefeater London Dry Gin', 'Beefeater London Dry Gin is a handcrafted gin, with a characteristic crisp, clean, well balanced flavour...', '574.99', '0.47', 'Importado', 'imagen8.jpg', 2019, 750, 8),
(9, 'Bombay Gin Sapphire', 'BOMBAY SAPPHIRE gin has a ripe citrus aroma with rounded spice and a touch of juniper. Taste BOMBAY SAPPHIRE...', '199.99', '0.47', 'Importado', 'imagen9.jpg', 2014, 1800, 8),
(10, 'Absolut Elyx Vodka', 'Absolut Elyx is a new super-premium single-batch vodka from the makers of Absolut. Every batch is produced in...', '71.99', '0.42', 'Importado', 'imagen10.jpg', 2019, 750, 10),
(11, 'Absolut Grapevine Vodka', 'Introduced in January 2012, Absolut Grapevine is the latest flavor in the Absolut family. Absolut Grapevine is...', '99.49', '0.40', 'Importado', 'imagen11.jpg', 2019, 750, 11),
(12, 'Absolut Apeach Vodka', 'The vibrant and fresh aroma of Absolut Citron showcases a straightforward and well-balanced lemon flavored vodka.', '219.49', '0.40', 'Importado', 'imagen12.jpg', 2019, 750, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `TipoDoc` varchar(10) NOT NULL,
  `Documento` int(10) UNSIGNED NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Nacimiento` date NOT NULL,
  `Telefono` int(10) UNSIGNED NOT NULL,
  `Calle` varchar(30) NOT NULL,
  `Altura` smallint(5) UNSIGNED NOT NULL,
  `Piso` tinyint(3) UNSIGNED NOT NULL,
  `Dpto` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_perfil`
--

CREATE TABLE `usuarios_perfil` (
  `idUsuario_Perfil` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVentas` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Producto_id` varchar(45) DEFAULT NULL,
  `Cantidad` tinyint(4) DEFAULT NULL,
  `Precio` decimal(10,0) DEFAULT NULL,
  `Usuario_Id` int(11) DEFAULT NULL,
  `Productos_Marcas_idMarcas` int(11) NOT NULL,
  `Carrito_idCarrito` int(11) NOT NULL,
  `Carrito_Productos_idProductos` int(11) NOT NULL,
  `Carrito_Productos_Marcas_idMarcas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idCarrito`,`Productos_idProductos`,`Productos_Marcas_idMarcas`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategorias`,`Categorias_idCategorias`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idMarcas`);

--
-- Indices de la tabla `marcas_has_categorias`
--
ALTER TABLE `marcas_has_categorias`
  ADD PRIMARY KEY (`Marcas_idMarcas`,`Categorias_idCategorias`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`,`Marcas_idMarcas`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD UNIQUE KEY `email_UNIQUE` (`Email`),
  ADD UNIQUE KEY `Documento_UNIQUE` (`Documento`),
  ADD UNIQUE KEY `Telefono_UNIQUE` (`Telefono`);

--
-- Indices de la tabla `usuarios_perfil`
--
ALTER TABLE `usuarios_perfil`
  ADD PRIMARY KEY (`idUsuario_Perfil`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVentas`,`Productos_Marcas_idMarcas`,`Carrito_idCarrito`,`Carrito_Productos_idProductos`,`Carrito_Productos_Marcas_idMarcas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
