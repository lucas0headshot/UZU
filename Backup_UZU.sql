-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Nov-2022 às 10:23
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `amizades`
--

INSERT INTO `amizades` (`ID`, `Enviou`, `Recebeu`, `Status`) VALUES
(10, 7, 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Usuario_ID` int NOT NULL,
  `Post` text NOT NULL,
  `Data` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`ID`, `Usuario_ID`, `Post`, `Data`) VALUES
(10, 8, '<p>Teste</p>', '2022-11-02 18:58:32'),
(11, 8, '<p>Teste </p><img scr=\"https://cdn.eso.org/images/screen/millour-01-cc.jpg\" />', '2022-11-02 18:58:57'),
(12, 8, '<p>Teste </p><img scr=\"https://cdn.eso.org/images/screen/millour-01-cc.jpg\" />', '2022-11-02 19:07:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Senha` text NOT NULL,
  `Ultimo_Post` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nome`, `Email`, `Senha`, `Ultimo_Post`) VALUES
(9, 'Guilherme', 'teste1@gmail.com', '$2a$08$MjAzOTkwOTg3NjYzNjFlYecBdxaoqM9fbrboCViW7uhQehEclqwSO', '0000-00-00 00:00:00'),
(8, 'Teste', 'teste@gmail.com', '$2a$08$MTI5MTg4NzUyODYzNjA2ZOOI5oCutt87buHODCR7toiOYNLVuTHSS', '2022-11-02 19:07:19'),
(7, 'Lucas', 'lucas0headshot@gmail.com', '$2a$08$MTI4ODA5Mjc2NjYzNjA2ZOsq0MnxzFZXFht2luKnJQoOYti4xo3Uy', '0000-00-00 00:00:00'),
(10, 'Marcos', 'teste3@gmail.com', '$2a$08$NDE5NzUwODI2NjM2MWVlYOBcKIhrOPYN36Buyz8HexAd2s4XcX6S6', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
