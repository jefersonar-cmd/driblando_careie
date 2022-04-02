-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 31/03/2022 às 22:37
-- Versão do servidor: 10.4.24-MariaDB
-- Versão do PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dentista`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acesso`
--

CREATE TABLE `acesso` (
  `id_acess` int(11) NOT NULL,
  `nome_acesso` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `acesso`
--

INSERT INTO `acesso` (`id_acess`, `nome_acesso`) VALUES
(1, 'Administrador'),
(2, 'Médico'),
(3, 'Assistente'),
(4, 'Funcionário'),
(5, 'Paciente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `consultas`
--

CREATE TABLE `consultas` (
  `id_consu` int(11) NOT NULL,
  `data_consu` varchar(25) DEFAULT NULL,
  `hora` varchar(25) DEFAULT NULL,
  `fk_medico` int(11) NOT NULL,
  `fk_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dados`
--

CREATE TABLE `dados` (
  `id_dados` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` int(11) NOT NULL,
  `rg` int(9) NOT NULL,
  `telefone` int(11) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `numero` int(5) DEFAULT NULL,
  `complemento` varchar(80) DEFAULT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(35) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `login` varchar(18) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `fk_acess` int(11) NOT NULL,
  `fk_dados` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id_users`, `login`, `pass`, `email`, `fk_acess`, `fk_dados`) VALUES
(3, 'jefersonar-cmd', '7a987f284f885c800ed0bb5d8bb6b9a327588b94d05579ae7de574a34ab5b595', NULL, 1, NULL),
(4, 'Joel', '86f65e28a754e1a71b2df9403615a6c436c32c42a75a10d02813961b86f1e428', NULL, 1, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`id_acess`);

--
-- Índices de tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consu`),
  ADD KEY `fk_id_medido` (`fk_medico`),
  ADD KEY `fk_id_paciente` (`fk_paciente`);

--
-- Índices de tabela `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id_dados`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `rg` (`rg`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `fk_id_acess` (`fk_acess`),
  ADD KEY `fk_id_dados` (`fk_dados`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acesso`
--
ALTER TABLE `acesso`
  MODIFY `id_acess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `dados`
--
ALTER TABLE `dados`
  MODIFY `id_dados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `fk_id_medido` FOREIGN KEY (`fk_medico`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `fk_id_paciente` FOREIGN KEY (`fk_paciente`) REFERENCES `users` (`id_users`);

--
-- Restrições para tabelas `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_id_acess` FOREIGN KEY (`fk_acess`) REFERENCES `acesso` (`id_acess`),
  ADD CONSTRAINT `fk_id_dados` FOREIGN KEY (`fk_dados`) REFERENCES `dados` (`id_dados`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
