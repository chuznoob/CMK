-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2015 at 07:32 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cm_db`
--
CREATE DATABASE IF NOT EXISTS `cm_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cm_db`;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_Categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categoria` varchar(45) NOT NULL,
  `desc_categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_Categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_Categoria`, `nom_categoria`, `desc_categoria`) VALUES
(9, 'Laptop''s', 'Equipos de computo portÃ¡tiles, de distintas gamas'),
(10, 'PC''s', 'Equipos de computo de escritorio, de distintas gamas'),
(11, 'Mouse / Raton optico', 'Ratones para equipos de computo, de tipo optimo.'),
(12, 'Teclados', 'Teclados para equipos de computo'),
(13, 'Monitores LCD', 'Pantallas LCD para equipos de computo de escritorio');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_Cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cliente` varchar(45) NOT NULL,
  `cor_cliente` varchar(45) NOT NULL,
  `tel_cliente` varchar(45) NOT NULL,
  `dir_cliente` varchar(45) NOT NULL,
  `pass_cliente` varchar(45) NOT NULL,
  `niv_cliente` varchar(45) NOT NULL,
  `estado_cliente` varchar(45) NOT NULL,
  PRIMARY KEY (`id_Cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_Cliente`, `nom_cliente`, `cor_cliente`, `tel_cliente`, `dir_cliente`, `pass_cliente`, `niv_cliente`, `estado_cliente`) VALUES
(1, 'Sin Registro', 'Sin Registro', 'Sin Registro', 'Sin Registro', 'Sin Registro', 'Sin Registro', 'Sin Registro'),
(2, 'Chucho', 'bimbo060@hotmail.com', '4171008019', 'Loma Bonita #45', '202cb962ac59075b964b07152d234b70', 'ad-master', 'activo'),
(3, 'Chili', 'gilbertogm04darck@gmail.com', '4171776993', 'La Rosa #7', '202cb962ac59075b964b07152d234b70', 'ad-master', 'activo'),
(4, 'Montse', 'montse_flaiis@hotmail.com', '4171795732', 'madero #1057', '202cb962ac59075b964b07152d234b70', 'administrador', 'activo');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id_Cliente` int(11) NOT NULL,
  `com_comentario` varchar(500) NOT NULL,
  `date_comentario` datetime NOT NULL,
  `aprob_comentario` varchar(50) NOT NULL DEFAULT 'oculto',
  PRIMARY KEY (`id_comentario`),
  KEY `fk_comentarios_cliente1_idx` (`cliente_id_Cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `id_Compras` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id_Cliente` int(11) NOT NULL,
  `fech_compra` date NOT NULL,
  `mf_compras` double NOT NULL,
  `desc_compra` double NOT NULL,
  PRIMARY KEY (`id_Compras`),
  KEY `fk_compras_cliente1_idx` (`cliente_id_Cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=142 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `id_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id_Cliente` int(11) NOT NULL,
  `asunto_contacto` varchar(45) NOT NULL,
  `date_contacto` datetime NOT NULL,
  `text_contacto` varchar(500) NOT NULL,
  `status_contacto` varchar(45) NOT NULL,
  PRIMARY KEY (`id_contacto`),
  KEY `fk_contacto_cliente1_idx` (`cliente_id_Cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `proveedores_id_proveedor` int(11) NOT NULL,
  `categoria_id_Categoria` int(11) NOT NULL,
  `nom_producto` varchar(50) NOT NULL,
  `pre_producto` double NOT NULL,
  `can_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_productos_proveedores1_idx` (`proveedores_id_proveedor`),
  KEY `fk_productos_categoria1_idx` (`categoria_id_Categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `proveedores_id_proveedor`, `categoria_id_Categoria`, `nom_producto`, `pre_producto`, `can_producto`) VALUES
(16, 8, 9, 'Macbook Pro 15', 15000, 20),
(17, 10, 13, 'SDG-0122051', 3500, 50),
(18, 9, 10, 'Asus ROG-SX200', 18000, 30);

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `em_proveedor` varchar(45) NOT NULL,
  `cont_proveedor` varchar(45) NOT NULL,
  `tel_proveedor` varchar(45) NOT NULL,
  `cor_proveedor` varchar(45) NOT NULL,
  `dir_proveedor` varchar(45) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `em_proveedor`, `cont_proveedor`, `tel_proveedor`, `cor_proveedor`, `dir_proveedor`) VALUES
(8, 'Apple', 'Tim Cook', '018666765682', 'Apple-Inc@Apple.com', 'Cupertino, CA, Estados Unidos'),
(9, 'Asus Company', 'Jerry Shen', '886277360456', 'Asus-Co@Asus.com', 'TaipÃ©i, RepÃºblica de China'),
(10, 'LG Electronics', 'Koo In-Hwoi', '018000910683', 'LGE@LG.com', 'SeÃºl, Corea del Sur');

-- --------------------------------------------------------

--
-- Table structure for table `provent_detalle`
--

CREATE TABLE IF NOT EXISTS `provent_detalle` (
  `id_proVent` int(11) NOT NULL AUTO_INCREMENT,
  `id_Producto` int(11) NOT NULL,
  `id_Compras` int(11) NOT NULL,
  `pvdet_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_proVent`),
  KEY `id_Compras_idx` (`id_Compras`),
  KEY `id_Producto` (`id_Producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Triggers `provent_detalle`
--
DROP TRIGGER IF EXISTS `tg_provent_detalle`;
DELIMITER //
CREATE TRIGGER `tg_provent_detalle` AFTER INSERT ON `provent_detalle`
 FOR EACH ROW begin

UPDATE Productos SET can_producto = (can_producto - NEW.pvdet_cantidad)
        WHERE id_producto = NEW.id_producto;


end
//
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_cliente1` FOREIGN KEY (`cliente_id_Cliente`) REFERENCES `cliente` (`id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_cliente1` FOREIGN KEY (`cliente_id_Cliente`) REFERENCES `cliente` (`id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_contacto_cliente1` FOREIGN KEY (`cliente_id_Cliente`) REFERENCES `cliente` (`id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categoria1` FOREIGN KEY (`categoria_id_Categoria`) REFERENCES `categoria` (`id_Categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_proveedores1` FOREIGN KEY (`proveedores_id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `provent_detalle`
--
ALTER TABLE `provent_detalle`
  ADD CONSTRAINT `id_Compras` FOREIGN KEY (`id_Compras`) REFERENCES `compras` (`id_Compras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_Producto` FOREIGN KEY (`id_Producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
