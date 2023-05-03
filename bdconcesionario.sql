-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2022 a las 18:07:49
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdconcesionario`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizaCategoria` (IN `IdC` INT, IN `NomC` VARCHAR(50))   BEGIN
UPDATE categoria SET NomCat = NomC WHERE IdCat = IdC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizaCliente` (IN `IdCl` INT, IN `Nombr` VARCHAR(50), IN `Tele` CHAR(9), IN `Cor` VARCHAR(50), IN `Ru` CHAR(11))   BEGIN
UPDATE cliente SET NomCli = Nombr, Telefono = Tele, Correo = Cor, Ruc = Ru WHERE IdCli = IdCl;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizaContacto` (IN `Dn` CHAR(8), IN `Nom` VARCHAR(50), IN `Tel` CHAR(9), IN `Corr` VARCHAR(50), IN `Mens` VARCHAR(200))   BEGIN
UPDATE contactos SET Nombre = Nom, Telefono = Tel, Correo = Corr, Mensaje = Mens WHERE Dni = Dn;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizaMarca` (IN `IdM` CHAR(4), IN `NomM` VARCHAR(50))   BEGIN
UPDATE marca SET NomMar = NomM WHERE IdMar = IdM;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizaProducto2` (IN `IdPro` INT, IN `NomPro` VARCHAR(50), IN `Prec` DECIMAL, IN `St` INT, IN `cantidad2` CHAR(4), IN `imagen` VARCHAR(50))   BEGIN
UPDATE productotrue SET NomProd = NomPro, Precio = Prec, Stock = St, 
cantidad2 = cantidad2, imagen = imagen WHERE IdProd = IdPro;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizaProveedor` (IN `IdProv` INT, IN `NomProv` VARCHAR(50), IN `Ru` CHAR(11), IN `Telef` CHAR(9), IN `Cor` VARCHAR(50))   BEGIN
UPDATE proveedores SET NomProv = NomProv, Ruc = Ru, Telefono = Telef, Correo = Cor WHERE IdProv = IdProv;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizaUsuario` (IN `CodUsu` INT, IN `Lgn` VARCHAR(30), IN `Clav` VARCHAR(30), IN `Tip` VARCHAR(30), IN `ICli` INT)   BEGIN
UPDATE usuario SET Login = Lgn, Clave = Clav, Tipo = Tip, IdCli = ICli WHERE CodUsuario = CodUsu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminaCategoria` (IN `IdCat` INT)   BEGIN
 DELETE FROM categoria Where IdCat = IdCat;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminaCliente` (IN `IdCl` INT)   BEGIN
 DELETE FROM cliente Where IdCli = IdCl;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminaContacto` (IN `Dn` CHAR(8))   BEGIN
 DELETE FROM contactos Where Dni = Dn;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminaMarca` (IN `IdM` CHAR(4))   BEGIN
 DELETE FROM marca Where IdMar = IdM;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminaProducto` (IN `IdPro` INT)   BEGIN
 DELETE FROM producto Where IdProd = IdPro;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminaProveedor` (IN `IdProv` INT)   BEGIN
 DELETE FROM proveedores Where IdProv = IdProv;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminaUsuario` (IN `CodUsu` INT)   BEGIN
 DELETE FROM usuario Where CodUsuario = CodUsu;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertaCategoria` (IN `NomC` VARCHAR(50))   BEGIN
Insert Into categoria (NomCat)
values (NomC);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertaCliente` (IN `Nombr` VARCHAR(50), IN `Tele` CHAR(9), IN `Cor` VARCHAR(50), IN `Ru` CHAR(11))   BEGIN
Insert Into cliente ( NomCli, Telefono, Correo, Ruc)
values( Nombr, Tele, Cor, Ru);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertaContacto` (IN `Dn` CHAR(8), IN `Nom` VARCHAR(50), IN `Tel` CHAR(9), IN `Corr` VARCHAR(50), IN `Mens` VARCHAR(200))   BEGIN
Insert Into contactos (Dni, Nombre, Telefono, Correo, Mensaje)
values(Dn, Nom, Tel, Corr, Mens);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertaDetalle_Venta` (IN `NumVe` INT, IN `IdP` CHAR(4), IN `IdC` INT, IN `Can` INT, IN `PreVen` DECIMAL, IN `MonTot` DECIMAL)   BEGIN
Insert Into detalle_ventas (NumVenta, IdProd, IdCli, Cantidad, PrecioVenta, MontoTotal)
values(NumVe, IdP, IdC, Can, PreVen, MonTot);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertaMarca` (IN `IdM` CHAR(4), IN `NomM` VARCHAR(50))   BEGIN
Insert Into marca (IdMar, NomMar)
values(IdM, NomM);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertaProducto` (IN `IdPro` CHAR(4), IN `NomPro` VARCHAR(50), IN `Prec` DECIMAL, IN `St` INT, IN `IdM` CHAR(4), IN `IdC` INT)   BEGIN
Insert Into producto (IdProd, NomProd, Precio, Stock, IdMar, IdCat)
values(IdPro, NomPro, Prec, St, IdM, IdC);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertaProveedor` (IN `IdPr` INT, IN `NomPr` VARCHAR(50), IN `Ru` CHAR(11), IN `Telef` CHAR(9), IN `Cor` VARCHAR(50))   BEGIN
Insert Into proveedores (IdProv, NomProv, Ruc, Telefono, Correo)
values(IdPr, NomPr, Ru, Telef, Cor);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertaUsuario` (IN `CodUsu` INT, IN `Lgn` VARCHAR(30), IN `Clav` VARCHAR(30), IN `Tip` VARCHAR(30), IN `ICli` INT)   BEGIN
Insert Into usuario (CodUsuario, Login, Clave, Tipo, IdCli)
values(CodUsu, Lgn, Clav, Tip, ICli);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertaVenta` (IN `FecPe` DATE, IN `FecEnt` DATE)   BEGIN
Insert Into ventas ( FechaPed, FechaEnt)
values( FecPe, FecEnt);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListaCategorias` ()   BEGIN
SELECT * FROM categoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListaClientes` ()   BEGIN
SELECT * FROM cliente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListaContactos` ()   BEGIN
SELECT * FROM contactos;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListaDetalle_Ventas` ()   BEGIN
Select d.NumVenta, c.IdCli, c.NomCli, c.Ruc, p.IdProd, p.NomProd, p.Precio, d.MontoTotal, v.FechaPed
From cliente C, detalle_ventas D, producto P, ventas V
Where C.IdCli = D.IdCli AND D.IdProd = P.IdProd AND D.NumVenta = V.NumVenta; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListaMarcas` ()   BEGIN
SELECT * FROM marca;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListaProductos` ()   BEGIN
Select IdProd, NomProd, Precio, Stock, NomMar, NomCat
From marca M, producto P, categoria C
Where M.IdMar = P.IdMar AND P.IdCat = C.IdCat;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListaProveedores` ()   BEGIN
SELECT * FROM proveedores;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListaVentas` ()   BEGIN
Select NumVenta, FechaPed, FechaEnt, NomCli
From cliente C, ventas V
Where C.IdCli = V.IdCli;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IdCat` int(11) NOT NULL,
  `NomCat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCat`, `NomCat`) VALUES
(1, 'Neumaticos'),
(2, 'Accesorios Nuevos'),
(3, 'Gonzalo Benitez Loayza'),
(4, 'Automotriz'),
(6, 'Electronica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `IdCli` int(11) NOT NULL,
  `NomCli` varchar(50) DEFAULT NULL,
  `Telefono` char(9) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Ruc` char(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IdCli`, `NomCli`, `Telefono`, `Correo`, `Ruc`, `fecha`) VALUES
(1, 'Pamela Cardozo Moreno', '939483821', 'PamelaCM@hotmail.com', '10374384832', '2022-10-28 00:57:10'),
(2, 'Raul Gonzales Rivera', '946538485', 'RaulRivera@gmail.com', '10849257391', '2022-10-28 00:57:10'),
(3, 'Gonzalo Benitez Loayza', '990740382', 'GonBen34M@hotmail.com', '10749284835', '2022-10-28 00:57:10'),
(5, 'Manuel Ganoza Vela', '983928948', 'ManGanoza@gmail.com', '10837249281', '2022-10-28 00:57:10'),
(8, 'Brayan Maruri', '954744522', 'brayanMaruri@gmail.com', '70451258', '2022-10-28 00:57:10'),
(9, 'Lucia Fernandez', '965874522', 'LuciaFernandez21@gmail.com', '85478541', '2022-10-28 00:57:10'),
(10, 'Alberto Torres Sanchez', '987458211', 'AlbertoTorresSanchez@gmail.com', '85748547', '2022-10-28 00:57:10'),
(11, 'Alejandro Saenz', '947854122', 'PedroSuarezVertiz2@gmail.com', '74569852', '2022-10-28 00:57:10'),
(13, 'Fernando Torres Guien', '974856322', 'FernandoTorresGuien@gmail.com', '87452163', '2022-10-28 00:57:10'),
(19, 'Fernando Alvarado', '965874412', 'FernandoAlvarado@gmail.com', '60987452', '2022-10-28 00:57:10'),
(24, 'Menacho Clavijo', '965478544', 'MenachoClavijo45@gmail.com', '65847821', '2022-10-28 00:57:10'),
(25, 'Menacho Clavijo', '965478544', 'MenachoClavijo45@gmail.com', '65847821', '2022-10-28 00:57:10'),
(26, 'Menacho Clavijo', '965478544', 'brayanMaruri@gmail.com', '85748547', '2022-10-28 00:57:10'),
(27, 'Menacho Clavijo', '954744522', 'brayanMaruri@gmail.com', '65847821', '2022-10-28 00:57:10'),
(28, 'Brayan Maruri', '965874522', 'MenachoClavijo45@gmail.com', '85748547', '2022-10-28 00:57:10'),
(31, 'Brayan Maruri', '965874522', 'MenachoClavijo45@gmail.com', '65847821', '2022-10-28 00:57:10'),
(33, 'Menacho Clavijo', '965874522', 'brayanMaruri@gmail.com', '85748547', '2022-10-28 00:57:10'),
(34, 'Carlos Nicho Beltran', '965478544', 'MenachoClavijo45@gmail.com', '65847821', '2022-10-28 00:57:10'),
(35, 'Menacho Clavijo', '965478544', 'brayanMaruri@gmail.com', '85748547', '2022-10-28 00:57:10'),
(39, 'Carlos Nicho Beltran', '981110622', 'AlbertoTorresSanchez@gmail.com', '65847821', '2022-10-28 00:57:10'),
(40, 'Menacho Clavijo', '954744522', 'carlos.g.nicho@gmail.com', '85748547', '2022-10-28 00:57:10'),
(41, 'Brayan Levantate', '981110622', 'carlos.g.nicho@gmail.com', '60978392', '2022-10-28 00:57:10'),
(42, 'Menacho Clavijo', '965874522', 'brayanMaruri@gmail.com', '65847821', '2022-10-28 00:57:10'),
(43, 'Sandra Rosa', '981110622', 'carlos.g.nicho@gmail.com', '60978392', '2022-10-28 00:57:10'),
(44, 'Carlos Gusta vo Nicho Beltran', '981110622', 'carlos.g.nicho@gmail.com', '60978392', '2022-10-28 00:57:10'),
(45, 'Ana ', '946538485', 'Ana.sofia@gmai.com', '1060978394', '2022-10-28 00:57:10'),
(46, 'Carlos Nicho Beltran', '965874522', 'LuciaFernandez21@gmail.com', '85478541', '2022-10-28 00:57:10'),
(49, 'Carlos Nicho Beltran', '965874522', 'carlos.g.nicho@gmail.com', '65847821', '2022-10-28 00:57:10'),
(50, 'Carlos Nicho Beltran', '965874522', 'carlos.g.nicho@gmail.com', '65847821', '2022-10-28 00:57:10'),
(52, 'Carlos Gustavo Nicho Beltran', '981110622', 'carlos.g.nicho@gmail.com', '60978392', '2022-10-28 00:57:10'),
(53, 'Carlos Gusta vo Nicho Beltran', '981110622', 'carlos.g.nicho@gmail.com', '1111111', '0000-00-00 00:00:00'),
(54, 'Prueba', '999999', 'PRUEBA.g.nicho@gmail.com ', 'PRUEBA', '2022-10-28 01:13:29'),
(55, 'PRUEBA666', '666', 'carlos.g.nicho@gmail.com', '66666666', '2022-10-28 01:15:17'),
(56, 'Carlos Gustavo Nicho Beltran', '981110622', 'carlos.g.nicho@gmail.com', '60978392', '2022-10-31 20:07:50'),
(70, 'Carlos Nicho Beltran', '981110622', 'carlos.g.nicho@gmail.com', '65847821', '2022-11-02 17:02:02'),
(73, 'Carlos Nicho Beltran', '965874522', 'carlos.g.nicho@gmail.com', '65847821', '2022-11-02 19:08:29'),
(74, 'Carlos Nicho Beltran', '965874522', 'carlos.g.nicho@gmail.com', '65847821', '2022-11-02 20:25:47'),
(75, 'Carlos Nicho Beltran', '965874522', 'carlos.g.nicho@gmail.com', '65847821', '2022-11-02 20:34:15'),
(76, 'Carlos Nicho Beltran', '965874522', 'carlos.g.nicho@gmail.com', '65847824', '2022-11-02 20:48:46'),
(77, 'Brayan Maruri', '981110622', 'carlos.g.nicho@gmail.com', '85748547', '2022-11-02 21:14:47'),
(78, 'Brayan Maruri', '981110622', 'carlos.g.nicho@gmail.com', '85748547', '2022-11-02 21:23:20'),
(79, 'Carlos Nicho Beltran', '965478544', 'brayanMaruri@gmail.com', '85748547', '2022-11-02 21:23:53'),
(80, 'Menacho Clavijo', '981110622', 'carlos.g.nicho@gmail.com', '65847821', '2022-11-02 21:28:57'),
(81, 'Carlos Nicho Beltran', '981111062', 'carlos.g.nicho@gmail.com', '60978392', '2022-11-03 14:54:19'),
(82, 'Carlos Nicho Beltran', '981111062', 'carlos.g.nicho@gmail.com', '60978392', '2022-11-03 15:43:25'),
(83, 'Carlos Gustavo Nicho Beltran', '981111062', 'carlos.g.nicho@gmail.com', '60978392', '2022-11-03 16:08:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `Dni` char(8) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` char(9) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Mensaje` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`Dni`, `Nombre`, `Telefono`, `Correo`, `Mensaje`) VALUES
('', '', '', '', ''),
('23213123', 'accasdasd', '123213213', 'carlos.g.nicho@gmail.com', 'asdasdasdasdsadasd'),
('60857485', 'Brayan Maruri', '965558477', 'Brayan.Maruri.45@gmail.com', 'Precio de juego de llantas, espejos retrovisores y timón hidráulico'),
('60978294', 'Caceres Malqui', '981110322', 'cacres.malqui21@gmail.com', 'Solicito repuesto de llantas y espejos de auto yaris 2007.'),
('60978392', 'Carlos', '981110622', 'carlos.g.nicho@gmail.com', 'Solicito faros delanteros, llantas nuevas y parachoques'),
('68954785', 'Brayan Maruri', '965558477', 'Brayan.Maruri.45@gmail.com', 'Precio de juego de llantas, espejos retrovisores y timón hidráulico'),
('70415263', 'Brayan Maruri', '965558477', 'Brayan.Maruri.45@gmail.com', 'Precio de juego de llantas, espejos retrovisores y timón hidráulico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `NumVenta` int(11) NOT NULL,
  `IdProd` int(11) NOT NULL,
  `IdCli` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Subtotal` decimal(8,2) DEFAULT NULL,
  `IGV` decimal(8,2) DEFAULT NULL,
  `MontoTotal` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `IdMar` int(4) NOT NULL,
  `NomMar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`IdMar`, `NomMar`) VALUES
(1, 'Honda'),
(2, 'Boston'),
(3, 'RedLion'),
(4, 'Diamond'),
(5, 'Festo'),
(6, 'BMW'),
(8, 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productotrue`
--

CREATE TABLE `productotrue` (
  `idproducto` int(11) NOT NULL,
  `Idmar` int(4) DEFAULT NULL,
  `Idcat` int(11) DEFAULT NULL,
  `NomProducto` varchar(50) DEFAULT NULL,
  `Precio2` decimal(10,0) DEFAULT NULL,
  `Stock2` int(11) DEFAULT NULL,
  `existentes` int(11) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productotrue`
--

INSERT INTO `productotrue` (`idproducto`, `Idmar`, `Idcat`, `NomProducto`, `Precio2`, `Stock2`, `existentes`, `imagen`) VALUES
(41, 2, 4, 'Parabrisas', '200', 20, 20, 'imagen/Prueba4.png'),
(47, 1, 1, 'Prueba', '111', 111, 555, 'imagen/Prueba4.png'),
(48, 1, 1, 'Llantas', '500', 60, 65, 'imagen/Prueba4.png'),
(49, 6, 4, 'Motor', '3000', 5, 6, 'imagen/sedapal.jpeg'),
(50, 4, 4, 'Faros', '250', 30, 50, 'imagen/fors.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `CodUsuario` int(11) NOT NULL,
  `Login` varchar(30) DEFAULT NULL,
  `Clave` varchar(30) DEFAULT NULL,
  `Tipo` varchar(30) DEFAULT NULL,
  `IdCli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CodUsuario`, `Login`, `Clave`, `Tipo`, `IdCli`) VALUES
(0, 'admin', 'admin', NULL, NULL),
(1, 'Pamela', '123', NULL, 1),
(2, 'Manuel', '456', NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idventa` int(11) NOT NULL,
  `NomProd` varchar(50) NOT NULL,
  `Precio2` varchar(50) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `Subtotal` decimal(8,2) DEFAULT NULL,
  `IGV` decimal(8,2) DEFAULT NULL,
  `MontoTotal` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventa`, `NomProd`, `Precio2`, `cantidad`, `Subtotal`, `IGV`, `MontoTotal`) VALUES
(1, 'Motor', '3000', 1, '3000.00', '540.00', '3540.00'),
(2, 'Motor', '3000', 1, '3000.00', '540.00', '3540.00'),
(3, 'Motor', '3000', 1, '3000.00', '540.00', '3540.00'),
(4, 'Motor', '3000', 1, '3000.00', '540.00', '3540.00'),
(5, 'Motor', '3000', 1, '3000.00', '540.00', '3540.00'),
(6, 'Llantas', '500', 1, '500.00', '90.00', '590.00'),
(7, 'Llantas', '500', 1, '500.00', '90.00', '590.00'),
(8, 'Llantas', '500', 1, '500.00', '90.00', '590.00'),
(9, 'Llantas', '500', 1, '500.00', '90.00', '590.00'),
(10, 'Parabrisas', '200', 2, '400.00', '72.00', '472.00'),
(11, 'Llantas', '500', 1, '500.00', '90.00', '590.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCat`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IdCli`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`Dni`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`NumVenta`),
  ADD KEY `IdProd` (`IdProd`),
  ADD KEY `IdCli` (`IdCli`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`IdMar`);

--
-- Indices de la tabla `productotrue`
--
ALTER TABLE `productotrue`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `Idmar` (`Idmar`),
  ADD KEY `Idcat` (`Idcat`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CodUsuario`),
  ADD UNIQUE KEY `Login` (`Login`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IdCli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `IdMar` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productotrue`
--
ALTER TABLE `productotrue`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`IdProd`) REFERENCES `productotrue` (`idproducto`),
  ADD CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`IdCli`) REFERENCES `cliente` (`IdCli`);

--
-- Filtros para la tabla `productotrue`
--
ALTER TABLE `productotrue`
  ADD CONSTRAINT `productotrue_ibfk_1` FOREIGN KEY (`Idmar`) REFERENCES `marca` (`IdMar`),
  ADD CONSTRAINT `productotrue_ibfk_2` FOREIGN KEY (`Idcat`) REFERENCES `categoria` (`IdCat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
