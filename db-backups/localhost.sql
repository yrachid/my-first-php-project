-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Out 23, 2011 as 08:35 PM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `locadora`
--
-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `rg`, `telefone`, `email`, `endereco`, `login`, `senha`) VALUES
(18, 'Yasser Anuar Lima', '22144855200', '45678945', '34933528', 'yasser_lima_@pop.com.br', 'Avenida pardal', 'othman5', 'guardian');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE IF NOT EXISTS `filmes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `status_filme` varchar(255) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `ano_lancamento` varchar(255) DEFAULT NULL,
  `duracao` varchar(255) DEFAULT NULL,
  `nacionalidade` varchar(255) DEFAULT NULL,
  `direcao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `nome`, `valor`, `status_filme`, `genero`, `ano_lancamento`, `duracao`, `nacionalidade`, `direcao`) VALUES
(1, 'Pinguins do Papai', '3,50', 'Alugado', 'Comedia', '2011', '90 minutos', 'EUA', 'Mark Waters'),
(2, 'Gladiador ', '2,00', 'Reservado', 'Acao', '1999', '155 minutos', 'EUA', 'Ridley Scott'),
(3, 'Rango', '4,00', 'Reservado', 'Animacao', '2010', '130 minutos', 'EUA', 'Gore Verbinski'),
(10, 'O descurso do rei', '4,50', 'Alugado', 'Drama', '2010', '118 minutos', 'EUA', 'Tim Hooper'),
(11, 'A bolha', '2,00', 'Reservado', 'Trash/Clássico', '1958', '82 minutos', 'EUA', 'Irvin Yeaworth');
