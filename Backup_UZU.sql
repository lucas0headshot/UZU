-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07-Nov-2022 às 22:17
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `uzu`
--
CREATE DATABASE IF NOT EXISTS `uzu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `uzu`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `amizades`
--

DROP TABLE IF EXISTS `amizades`;
CREATE TABLE IF NOT EXISTS `amizades` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Enviou` int NOT NULL,
  `Recebeu` int NOT NULL,
  `Status` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `amizades`
--

INSERT INTO `amizades` (`ID`, `Enviou`, `Recebeu`, `Status`) VALUES
(13, 8, 11, 1),
(12, 8, 10, 1),
(11, 8, 7, 1),
(10, 7, 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Usuario_ID` int NOT NULL,
  `Post` text  NOT NULL,
  `Data` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`ID`, `Usuario_ID`, `Post`, `Data`) VALUES
(30, 7, '<p>Hmmmmmmmmmmmmmm</p>', '2022-11-04 19:39:35'),
(29, 11, '<p>Hm</p>', '2022-11-04 19:39:28'),
(28, 10, '<p>Aoba</p>', '2022-11-04 19:39:15'),
(27, 8, '<p>A</p>', '2022-11-04 19:38:59'),
(31, 8, '<p>Teste</p>', '2022-11-07 17:29:02'),
(32, 8, '<p>A</p>', '2022-11-07 17:30:30'),
(33, 7, '<p>Hmmm</p>', '2022-11-07 17:49:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Senha` text  NOT NULL,
  `Ultimo_Post` datetime NOT NULL,
  `Img` text  NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nome`, `Email`, `Senha`, `Ultimo_Post`, `Img`) VALUES
(9, 'Guilherme', 'teste1@gmail.com', '$2a$08$MjAzOTkwOTg3NjYzNjFlYecBdxaoqM9fbrboCViW7uhQehEclqwSO', '0000-00-00 00:00:00', ''),
(8, 'Teste', 'teste@gmail.com', '$2a$08$MTc0MjA0OTg0MDYzNjk3MeCcpLZNCqulpeo9/JnWwtWPDU/Ez6vTe', '2022-11-07 17:30:30', '63696d6b0cdc0.png'),
(7, 'Lucas', 'lucas0headshot@gmail.com', '$2a$08$MTI4ODA5Mjc2NjYzNjA2ZOsq0MnxzFZXFht2luKnJQoOYti4xo3Uy', '2022-11-07 17:49:47', '6369703784796.jpg'),
(10, 'Marcos', 'teste3@gmail.com', '$2a$08$NDE5NzUwODI2NjM2MWVlYOBcKIhrOPYN36Buyz8HexAd2s4XcX6S6', '2022-11-04 19:39:15', ''),
(11, 'Pietro', 'pietro0headshot@gmail.com', '$2a$08$MjUzMDI0MTEzNjM2NTdhMeC7tFnijS5.C9ISXvLZu8Y2dzb6o6rGm', '2022-11-04 19:39:28', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
