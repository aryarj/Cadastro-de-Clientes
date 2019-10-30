-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Out-2019 às 23:17
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda_ary`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `nome` varchar(95) NOT NULL,
  `endereco` varchar(90) NOT NULL,
  `cidade` varchar(85) NOT NULL,
  `telefone1` varchar(12) NOT NULL,
  `telefone2` varchar(12) NOT NULL,
  `email` varchar(85) NOT NULL,
  `contato` varchar(65) NOT NULL,
  `ramo` varchar(65) NOT NULL,
  `usuario` varchar(35) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `tipo`, `nome`, `endereco`, `cidade`, `telefone1`, `telefone2`, `email`, `contato`, `ramo`, `usuario`, `data`) VALUES
(1, 'juridica', 'Dias Parado transportes', 'Rua da preguiÃ§a 111', 'MaringÃ¡', '4412345678', '44912345678', 'dias@parado.br', 'Carlos Dias Parado', 'Transporte de mercadorias', 'Eduardo Gomes', '2019-10-11 02:02:23'),
(2, 'fisica', 'Semsort lotÃ©ricas', 'rua do gato preto 13', 'MaringÃ¡', '4412345679', '<br /><b>Not', 'josemane@semsort.br', 'JosÃ© Manoel Pereira', 'Loteria', 'Eduardo Gomes', '2019-10-22 22:21:47'),
(5, 'juridica', 'Fracot Suplementos Alimentares', 'rua sem energia 001', 'Londrina', '4332165498', '43987654321', 'fracot@londrina.br', 'Roberto Carlos da Silva', 'Vitaminas', 'Ary', '2019-10-11 02:54:46'),
(6, 'fisica', 'Amora verde', 'rua das Frutas 2424', 'Pelotas', '5365498732', '<br /><b>Not', 'amora@fruta.br', 'Vanessa Estela Maravilhosa', 'Roupas', 'Ary', '2019-10-17 21:07:48'),
(13, 'fisica', 'Bill Clinton', 'USA', 'New York', '155598765432', '155532165498', 'clinton@bil.com', '', 'consultorias', 'Eduardo Gomes', '2019-10-18 08:56:28'),
(14, 'fisica', 'Kent chopperia', 'rua dos desabores', 'guarapuava', '4236589452', '<br /><b>Not', 'kentchopperia@gmail.com', 'Alexander Kent', 'bares', 'Eduardo Gomes', '2019-10-18 08:57:19'),
(15, 'fisica', 'Silmara Lacerda', 'rua Cerro Cora 123', 'SÃ£o Paulo', '1132165498', '<br /><b>Not', 'silmaral@gmail.com', 'Silmara ou Da. Edilaine', 'cosmÃ©ticos', 'Eduardo Gomes', '2019-10-18 08:58:19'),
(16, 'fisica', 'Brigit Bardot', 'Champs Eliseu', 'Paris', '123456789', '', 'bardot@brigit.fr', '', '', 'Eduardo Gomes', '2019-10-18 09:01:16'),
(17, 'juridica', 'Ana Julia Modas', 'rua fashion 1000', 'Franca', '1925896300', '1999954444', 'ana@modas.br', 'Sergio', 'Roupas', 'Eduardo Gomes', '2019-10-18 21:09:14'),
(18, 'juridica', 'Lojas Francesas', 'rua do bom gosto 1010', 'Campinas', '1935775356', '<br /><b>Not', 'eeee@ig.com', 'ComÃ©rcio', 'vendas no varejo', 'Eduardo Gomes', '2019-10-18 21:29:30'),
(19, 'fisica', 'Casa do Chop', 'rua dos bebados 1221', 'MaringÃ¡', '4456324178', '<br /><b>Not', 'cchop@casa.br', 'Ricardo Gaspar', 'comÃ©rcio varejista de bebidas', 'Eduardo Gomes', '2019-10-18 21:39:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clienteapagado`
--

CREATE TABLE `clienteapagado` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `nome` varchar(95) NOT NULL,
  `endereco` varchar(90) NOT NULL,
  `cidade` varchar(85) NOT NULL,
  `telefone1` varchar(12) NOT NULL,
  `telefone2` varchar(12) NOT NULL,
  `email` varchar(85) NOT NULL,
  `contato` varchar(65) NOT NULL,
  `ramo` varchar(65) NOT NULL,
  `usuario` varchar(35) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `cpf`, `nome`) VALUES
(1, '12345678901', 'Ary'),
(2, '11122233344', 'Aline'),
(3, '78945612312', 'Eduardo Gomes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `cpf`, `login`, `senha`) VALUES
(8, '78945612312', 'edu', 'MTIz'),
(9, '12345678901', 'aryteste', 'MTIz'),
(10, '11122233344', 'alineteste', 'MTIz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clienteapagado`
--
ALTER TABLE `clienteapagado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `clienteapagado`
--
ALTER TABLE `clienteapagado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
