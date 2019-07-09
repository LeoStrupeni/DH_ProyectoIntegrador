-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2019 a las 21:36:10
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
-- Estructura de tabla para la tabla `dom_ciudad`
--

CREATE TABLE `dom_ciudad` (
  `Id_Localidad` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dom_estado`
--

CREATE TABLE `dom_estado` (
  `IdEstado` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dom_pais`
--

CREATE TABLE `dom_pais` (
  `Id_Pais` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` decimal(10,2) UNSIGNED NOT NULL,
  `Graduacion` decimal(10,2) NOT NULL,
  `Origen` varchar(30) NOT NULL,
  `imagen` varchar(20) NOT NULL,
  `Año` int(11) NOT NULL,
  `Volumen` int(11) NOT NULL,
  `Marcas_idMarcas` int(11) NOT NULL,
  `Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `Name`, `Descripcion`, `Precio`, `Graduacion`, `Origen`, `imagen`, `Año`, `Volumen`, `Marcas_idMarcas`, `Categoria`) VALUES
(1, 'Jägermeister', 'Nuestro licor único fue creado por Curt Mast en Wolfenbüttel, Alemania. Aunque los tiempos hayan cambiado, su receta sigue siendo la misma. No se toca una fórmula ganadora. Ser icónico es así de sencillo.\r\nLa naturaleza los crea, nosotros los metemos en una botella. Las mejores hierbas, flores, raíces y frutas de todo el mundo se unen para formar cuatro macerados distintos que después son combinados gracias a la alquimia moderna para elaborar nuestro licor de hierbas. La lista de ingredientes completa es un secreto celosamente guardado, pero si te llevas una copa a los labios probarás sabores de todos los rincones del mundo.', '1099.00', '0.35', 'Importado', 'imagen1.jpg', 2018, 750, 1, 3),
(2, 'Baileys', 'Baileys Irish Cream es un licor basado en whisky irlandés y crema de leche, fabricado por R. A. Bailey & Cia. de Dublín, Irlanda. La marca es actualmente propiedad de Diageo. Según se indica, su contenido alcohólico es del 17 % en volumen', '574.99', '0.17', 'Importado', 'imagen2.jpg', 2018, 750, 2, 3),
(3, 'Khlibniy', 'Utilizando agua extraída de las profundidades de Cherkass, el vodka ucraniano Khlibnyi Dar usa una mezcla de grano 100 % ecológico madurado al sol como base para producir este destilado. Es tremendamente popular en todos los paises de la antigua Unión Soviética.', '1599.00', '0.40', 'Importado', 'imagen3.jpg', 2002, 900, 4, 4),
(4, 'Jack Daniel\'s old No. 7', 'Suavizado gota a gota a través de tres metros de carbón de arce de azúcar, tras lo cual es madurado en barriles hechos a mano por nosotros. Y nuestro Tennessee Whiskey no sigue un calendario. Está listo cuando los catadores lo dicen. Juzgamos por su apariencia. Por su aroma. Y, por supuesto, por su sabor. Así lo hacía Jack Daniel en persona un siglo atrás. Y así lo seguimos haciendo hoy.', '1765.00', '0.40', 'Importado', 'imagen4.jpg', 2012, 1000, 5, 2),
(5, 'Absolut Vodka Clasico', 'Absolut Vodka es un vodka sueco elaborado exclusivamente a partir de ingredientes naturales, y a diferencia de algunos otros vodkas, no contiene azúcar añadido. De hecho Absolut es tan limpio como puede ser el vodka. Aún así, tiene un cierto sabor: rico, con cuerpo y complejo, pero suave y maduro con un carácter distinto de cereales, seguido de un toque de frutos secos.\r\n\r\nHecho en Suecia por: Åhus, Suecia, The Absolut Company Ab, 117 97 Estocolmo, Suecia\r\n\r\nBotella de 750 ml\r\n\r\nConsejo del Bartender: Añadir 1 parte Absolut Vanilia y 3 partes Cola, servir en vaso alto con hielo en cubos.\r\n\r\nIngredientes: Trigo de invierno, agua prístina\r\n\r\nUn poco de historía: Absolut fue pionera en el mercado de los vodkas con sabor a mediados de 1980, con el lanzamiento del ya legendario Absolut Absolut Citron y Peppar. Lo que comenzó como dos, ahora se ha convertido en una colección de 17 sabores.', '799.00', '0.40', 'Importado', 'imagen5.jpg', 2014, 750, 6, 4),
(6, 'Captain Morgan Original Spiced', 'Mezclado por expertos con especias y sabores naturales, mi Capitán Morgan Original Spiced Gold es la figura principal de mi barco.\r\n\r\nUna receta secreta de especia aventurera y sabores naturales que se combinan de forma experta con el fino ron caribeño, que luego se envejece en barricas de roble blanco carbonizado para crear un sabor y un color tan rico como un bolsillo lleno de doblones de oro. Para una bebida de sabor suave y refrescante, Captain Morgan Original Spiced Gold se sirve mejor en una jarra sobre hielo, con cola y una rodaja de limón.\r\n\r\nNotas de cata: Notas de rica vainilla natural, azúcar moreno, frutas secas, especias cálidas con toques de roble, se unen para crear un espíritu perfectamente equilibrado con un acabado suave.\r\n\r\nBeber responsablemente - las órdenes del capitán!', '359.00', '0.35', 'Importado', 'imagen6.jpg', 2007, 750, 7, 5),
(7, 'Mcdowell\'s whisky', 'McDowell\'s No.1 es un whisky de procedencia India, elaborado por United Spirits Limited, que goza de gran popularidad en su país. Es uno de los whiskies más vendidos del mundo por volumen. Fue lanzado en 1968.\r\n\r\nEl whisky McDowell\'s No.1 es una blended whisky, mezcla de whiskies importados de Escocia y whiskies indios de malta seleccionados. Se caracteriza por su sutil y dulce aroma y sabor a vainilla, el cual le brinda suavidad y ligereza.\r\n\r\nSe presenta en una botella de planta rectangular, con hombros redondeados y estrias en los laterales. La etiqueta del whisky McDowell\'s Nº1, Reserve Whisky, es de tonos dorados, con la marca escrita en blanco sobre fondo negro y rojo. La botella tiene una capacidad de 75 centilitros y el whisky.', '2200.00', '0.40', 'Importado', 'imagen7.jpg', 2014, 750, 10, 2),
(8, 'Johnnie Walker Black Label', 'Johnnie Walker Black Label es un verdadero ícono, reconocido como referente para todas las otras mezclas de lujo. Creado usando sólo whiskies con un mínimo de 12 años de añejamiento de los 4 rincones de Escocia, Johnnie Walker Black Label tiene un inconfundible carácter profundo, suave y complejo. Un whisky excepcional para compartir en cualquier ocasión, sea pasando un rato agradable en casa con sus amigos o en una salida inolvidable.\r\n\r\nJohnnie Walker Black Label es rico, complejo y bien balanceado, un blend con notas a frutos del bosque, vainilla y tierra ahumada.\r\n\r\nMezclado exclusivamente con whiskies madurados por al menos 12 años, reúne sabores de los 4 rincones de Escocia para crear una experiencia compleja, profunda y enriquecedora. Johnnie Walker Black Label se desarrolla suavemente sobre la lengua, liberando notas intensas de vainilla dulce que dan paso a notas de cáscara de naranja y aromas a especias y pasas. El final es increíblemente suave y equilibrado, rico en humo, turba y malta.', '2500.00', '0.47', 'Importado', 'imagen8.jpg', 2007, 750, 12, 2),
(9, 'Barcelo Ron', 'Ron de alta gama cuya calidad reside en varias claves: control de la producción de la caña de azúcar, el empleo del agua más pura, el añejamiento en barricas de roble americano de primer uso en bourbon en las condiciones óptimas que ofrece el clima de República Dominicana y la experiencia de 70 años mezclando los más finos rones.\r\n\r\nBrillante color ámbar cobrizo. Aromas de crema de mantequilla, cerezas secas, vainilla intensa, mermelada de piña y nueces caramelizadas seguidas de una suave entrada a un seco pero afrutado, mediano y exuberante cuerpo con gran profundidad y equilibrio. Finaliza con un sabor a helado de pastel de zanahoria, nuez de cola, moca y un robusto sabor tostado que poco a poco se desvanece.', '1540.00', '0.38', 'Importado', 'imagen9.jpg', 2018, 750, 23, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prod_categorias`
--

CREATE TABLE `prod_categorias` (
  `idCategoria` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prod_categorias`
--

INSERT INTO `prod_categorias` (`idCategoria`, `Nombre`) VALUES
(7, 'Brandy'),
(6, 'Cachaça'),
(1, 'Cerveza'),
(12, 'Champagne'),
(8, 'Ginebra'),
(3, 'Licor'),
(5, 'Ron'),
(9, 'Soju'),
(10, 'Tequila'),
(11, 'Vino'),
(4, 'Vodka'),
(2, 'Whiskey');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prod_marcas`
--

CREATE TABLE `prod_marcas` (
  `idMarcas` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prod_marcas`
--

INSERT INTO `prod_marcas` (`idMarcas`, `Nombre`) VALUES
(6, 'Absolut'),
(16, 'Bacardi'),
(9, 'Bagpiper United Spirits'),
(2, 'Baileys'),
(23, 'Barcelo'),
(22, 'Baron B'),
(29, 'Beefeater'),
(28, 'Bombay Sapphire'),
(7, 'Captain Morgan'),
(26, 'Cazadores'),
(3, 'Corona'),
(30, 'Don Perignon'),
(17, 'Emperador'),
(5, 'Jack Daniels'),
(24, 'Jameson'),
(21, 'Jinro'),
(12, 'Johnnie Walker'),
(25, 'Jose Cuervo'),
(1, 'Jägermeister'),
(4, 'Khlibniy'),
(10, 'McDowell ‘s'),
(11, 'Officer ‘s'),
(13, 'Pirassunga 51'),
(8, 'Red Star Er Guo'),
(18, 'San Miguel'),
(20, 'Smirnoff'),
(14, 'Snow'),
(19, 'Soju Chum Churum'),
(15, 'Tanduay'),
(27, 'Tanqueray');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `IdPerfil` int(11) NOT NULL,
  `TipoDoc` varchar(10) NOT NULL,
  `Documento` int(10) UNSIGNED NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Nacimiento` date NOT NULL,
  `Telefono` int(10) UNSIGNED NOT NULL,
  `Calle` varchar(30) NOT NULL,
  `Altura` smallint(5) UNSIGNED NOT NULL,
  `Piso` tinyint(3) UNSIGNED NOT NULL,
  `Dpto` varchar(2) NOT NULL,
  `Ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_perfil`
--

CREATE TABLE `usuarios_perfil` (
  `idUsuario_Perfil` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_perfil`
--

INSERT INTO `usuarios_perfil` (`idUsuario_Perfil`, `Name`) VALUES
(1, 'Administrador'),
(2, 'Desarrollo'),
(3, 'Mayorista'),
(4, 'Minorista'),
(5, 'Consumidor Final');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tipodoc`
--

CREATE TABLE `usuarios_tipodoc` (
  `Id_Doc` int(11) NOT NULL,
  `Nombre` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_tipodoc`
--

INSERT INTO `usuarios_tipodoc` (`Id_Doc`, `Nombre`) VALUES
(1, 'DNI'),
(2, 'LC'),
(3, 'LE'),
(4, 'PASAPORTE'),
(5, 'CUIT'),
(6, 'CUIL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `IdVentas` int(11) NOT NULL,
  `ClaveTransaccion` varchar(250) NOT NULL,
  `DatosPago` text NOT NULL,
  `Fecha` datetime NOT NULL,
  `Correo` varchar(5000) NOT NULL,
  `Usuario` int(11) NOT NULL,
  `Total` decimal(60,2) NOT NULL,
  `Estado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`IdVentas`, `ClaveTransaccion`, `DatosPago`, `Fecha`, `Correo`, `Usuario`, `Total`, `Estado`) VALUES
(4, '1234567', '', '2019-01-01 00:00:00', 'leo@leo.com', 0, '100.00', 'Pendiente'),
(5, '1234567', '', '2019-01-01 00:00:00', 'leo@leo.com', 0, '100.00', 'Pendiente'),
(6, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 12:24:42', 'leonardo.strupeni@gmail.com', 0, '574.99', 'Pendiente'),
(7, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 12:36:49', 'juanpedro@lpaaa.com.ar', 0, '439.48', 'Pendiente'),
(8, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 12:39:05', 'juanpedro@lpaaa.com.ar', 0, '439.48', 'Pendiente'),
(9, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:06:13', 'leonardo.strupeni@gmail.com', 0, '219.99', 'Pendiente'),
(10, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:09:04', 'leonardo.strupeni@gmail.com', 0, '774.98', 'Pendiente'),
(11, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:10:20', 'juanpedro@lpaaa.com.ar', 0, '774.98', 'Pendiente'),
(12, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:10:27', 'juanpedro@lpaaa.com.ar', 0, '774.98', 'Pendiente'),
(13, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:11:00', 'juan@easy.com', 0, '574.99', 'Pendiente'),
(14, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:11:32', 'juan@easy.com', 0, '574.99', 'Pendiente'),
(15, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:16:48', 'juan@easy.com', 0, '574.99', 'Pendiente'),
(16, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:17:35', 'juanpedro@lpaaa.com.ar', 0, '459.97', 'Pendiente'),
(17, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:22:36', 'juan@easy.com', 0, '199.99', 'Pendiente'),
(18, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:23:54', 'juan@easy.com', 0, '199.99', 'Pendiente'),
(19, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:24:17', 'juan@easy.com', 0, '199.99', 'Pendiente'),
(20, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:24:52', 'juan@easy.com', 0, '199.99', 'Pendiente'),
(21, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:29:32', 'juan@easy.com', 0, '199.99', 'Pendiente'),
(22, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:30:02', 'juan@easy.com', 0, '199.99', 'Pendiente'),
(23, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:30:24', 'juan@easy.com', 0, '199.99', 'Pendiente'),
(24, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:30:36', 'juan@easy.com', 0, '199.99', 'Pendiente'),
(25, 'ca6m9l5oa9o6nnflk1v8p4qvko', '', '2019-07-08 13:30:52', 'juan@easy.com', 0, '199.99', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasdetalles`
--

CREATE TABLE `ventasdetalles` (
  `IdVentaDetalle` int(11) NOT NULL,
  `IDVENTA` int(11) NOT NULL,
  `IDPRODUCTO` int(11) NOT NULL,
  `PRECIOUNITARIO` decimal(20,2) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `DESCARGADO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventasdetalles`
--

INSERT INTO `ventasdetalles` (`IdVentaDetalle`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) VALUES
(5, 15, 2, '574.99', 1, 0),
(6, 16, 1, '129.99', 1, 0),
(7, 16, 3, '199.99', 1, 0),
(8, 16, 7, '129.99', 1, 0),
(9, 17, 3, '199.99', 1, 0),
(10, 18, 3, '199.99', 1, 0),
(11, 19, 3, '199.99', 1, 0),
(12, 20, 3, '199.99', 1, 0),
(13, 21, 3, '199.99', 1, 0),
(14, 22, 3, '199.99', 1, 0),
(15, 23, 3, '199.99', 1, 0),
(16, 24, 3, '199.99', 1, 0),
(17, 25, 3, '199.99', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dom_ciudad`
--
ALTER TABLE `dom_ciudad`
  ADD PRIMARY KEY (`Id_Localidad`);

--
-- Indices de la tabla `dom_estado`
--
ALTER TABLE `dom_estado`
  ADD PRIMARY KEY (`IdEstado`);

--
-- Indices de la tabla `dom_pais`
--
ALTER TABLE `dom_pais`
  ADD PRIMARY KEY (`Id_Pais`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`,`Marcas_idMarcas`);

--
-- Indices de la tabla `prod_categorias`
--
ALTER TABLE `prod_categorias`
  ADD PRIMARY KEY (`idCategoria`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `prod_marcas`
--
ALTER TABLE `prod_marcas`
  ADD PRIMARY KEY (`idMarcas`),
  ADD UNIQUE KEY `Name` (`Nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD UNIQUE KEY `email_UNIQUE` (`Email`),
  ADD UNIQUE KEY `Documento_UNIQUE` (`Documento`),
  ADD UNIQUE KEY `Telefono_UNIQUE` (`Telefono`),
  ADD KEY `IdPerfil` (`IdPerfil`),
  ADD KEY `TipoDoc` (`TipoDoc`),
  ADD KEY `Ciudad` (`Ciudad`);

--
-- Indices de la tabla `usuarios_perfil`
--
ALTER TABLE `usuarios_perfil`
  ADD PRIMARY KEY (`idUsuario_Perfil`);

--
-- Indices de la tabla `usuarios_tipodoc`
--
ALTER TABLE `usuarios_tipodoc`
  ADD PRIMARY KEY (`Id_Doc`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IdVentas`);

--
-- Indices de la tabla `ventasdetalles`
--
ALTER TABLE `ventasdetalles`
  ADD PRIMARY KEY (`IdVentaDetalle`),
  ADD KEY `IDVENTA` (`IDVENTA`),
  ADD KEY `IDPRODUCTO` (`IDPRODUCTO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dom_ciudad`
--
ALTER TABLE `dom_ciudad`
  MODIFY `Id_Localidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dom_estado`
--
ALTER TABLE `dom_estado`
  MODIFY `IdEstado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dom_pais`
--
ALTER TABLE `dom_pais`
  MODIFY `Id_Pais` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `prod_categorias`
--
ALTER TABLE `prod_categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `prod_marcas`
--
ALTER TABLE `prod_marcas`
  MODIFY `idMarcas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_perfil`
--
ALTER TABLE `usuarios_perfil`
  MODIFY `idUsuario_Perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios_tipodoc`
--
ALTER TABLE `usuarios_tipodoc`
  MODIFY `Id_Doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IdVentas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `ventasdetalles`
--
ALTER TABLE `ventasdetalles`
  MODIFY `IdVentaDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventasdetalles`
--
ALTER TABLE `ventasdetalles`
  ADD CONSTRAINT `ventasdetalles_ibfk_1` FOREIGN KEY (`IDVENTA`) REFERENCES `ventas` (`IdVentas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventasdetalles_ibfk_2` FOREIGN KEY (`IDPRODUCTO`) REFERENCES `productos` (`idProductos`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
