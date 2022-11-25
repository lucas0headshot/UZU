-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Nov-2022 às 15:14
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.34

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
CREATE TABLE `amizades` (
  `ID` int(11) NOT NULL,
  `Enviou` int(11) NOT NULL,
  `Recebeu` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `amizades`
--

INSERT INTO `amizades` (`ID`, `Enviou`, `Recebeu`, `Status`) VALUES
(13, 8, 11, 1),
(12, 8, 10, 1),
(11, 8, 7, 1),
(10, 7, 10, 1),
(14, 13, 9, 0),
(15, 13, 10, 0),
(16, 13, 11, 0),
(17, 13, 8, 0),
(18, 13, 7, 0),
(19, 13, 12, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `Usuario_ID` int(11) NOT NULL,
  `Post` text NOT NULL,
  `Data` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
(33, 7, '<p>Hmmm</p>', '2022-11-07 17:49:47'),
(34, 8, '<p>Sexo 3</p>', '2022-11-25 10:51:09'),
(35, 13, '<p>alo :)</p>', '2022-11-25 10:53:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Uzer` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Senha` text NOT NULL,
  `Ultimo_Post` datetime NOT NULL,
  `Img` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nome`, `Uzer`, `Email`, `Senha`, `Ultimo_Post`, `Img`) VALUES
(9, 'Guilherme', NULL, 'teste1@gmail.com', '$2a$08$MjAzOTkwOTg3NjYzNjFlYecBdxaoqM9fbrboCViW7uhQehEclqwSO', '0000-00-00 00:00:00', ''),
(8, 'Teste', NULL, 'teste@gmail.com', '$2a$08$MTc0MjA0OTg0MDYzNjk3MeCcpLZNCqulpeo9/JnWwtWPDU/Ez6vTe', '2022-11-25 10:51:09', '63696d6b0cdc0.png'),
(7, 'Lucas', NULL, 'lucas0headshot@gmail.com', '$2a$08$MTI4ODA5Mjc2NjYzNjA2ZOsq0MnxzFZXFht2luKnJQoOYti4xo3Uy', '2022-11-07 17:49:47', '6369703784796.jpg'),
(10, 'Marcos', NULL, 'teste3@gmail.com', '$2a$08$NDE5NzUwODI2NjM2MWVlYOBcKIhrOPYN36Buyz8HexAd2s4XcX6S6', '2022-11-04 19:39:15', ''),
(11, 'Pietro', NULL, 'pietro0headshot@gmail.com', '$2a$08$MjUzMDI0MTEzNjM2NTdhMeC7tFnijS5.C9ISXvLZu8Y2dzb6o6rGm', '2022-11-04 19:39:28', ''),
(12, 'Lusca', 'LuscaBR', 'lusca@gmail.com', '$2a$08$MTIzMDE1NjM4MzYzODBiO.6QFd1EZ/8EWgnqxvgSbAN6Nxe8SSPeu', '0000-00-00 00:00:00', ''),
(13, 'Julio', 'Pincelado', 'joaokleber2022@gmail.com', '$2a$08$ODkzNDY3MDQwNjM4MGJhOO/RrKYAu2LavcW/QxUNDmQIk09auLXgW', '2022-11-25 10:53:30', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `amizades`
--
ALTER TABLE `amizades`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amizades`
--
ALTER TABLE `amizades`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
