-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Abr-2023 às 00:48
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `barbearia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `nome_cliente` varchar(50) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `barbeiro` varchar(50) DEFAULT NULL,
  `datacorte` date DEFAULT NULL,
  `valorCorte` double(7,2) DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `barbeiro`
--

CREATE TABLE `barbeiro` (
  `id_barbeiro` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `senha` varchar(8) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `aniversario` date DEFAULT NULL,
  `datainicio` date DEFAULT NULL,
  `idCortes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cortes`
--

CREATE TABLE `cortes` (
  `id_corte` int(11) NOT NULL,
  `nomeCliente` varchar(50) DEFAULT NULL,
  `datacorte` date DEFAULT NULL,
  `barbeiro` varchar(50) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `valorCorte` double(7,2) NOT NULL,
  `produto` varchar(50) DEFAULT NULL,
  `valorProduto` double(7,2) DEFAULT NULL,
  `comprador` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome_adm` varchar(50) DEFAULT NULL,
  `senha` varchar(8) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `aniversario` date DEFAULT NULL,
  `datainicio` date DEFAULT NULL,
  `id_barbeiro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Índices para tabela `barbeiro`
--
ALTER TABLE `barbeiro`
  ADD PRIMARY KEY (`id_barbeiro`),
  ADD KEY `fk_cortesBarbeiro` (`idCortes`);

--
-- Índices para tabela `cortes`
--
ALTER TABLE `cortes`
  ADD PRIMARY KEY (`id_corte`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `fk_Barbeiros` (`id_barbeiro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `barbeiro`
--
ALTER TABLE `barbeiro`
  MODIFY `id_barbeiro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cortes`
--
ALTER TABLE `cortes`
  MODIFY `id_corte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `barbeiro`
--
ALTER TABLE `barbeiro`
  ADD CONSTRAINT `fk_cortesBarbeiro` FOREIGN KEY (`idCortes`) REFERENCES `cortes` (`id_corte`);

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_Barbeiros` FOREIGN KEY (`id_barbeiro`) REFERENCES `barbeiro` (`id_barbeiro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
