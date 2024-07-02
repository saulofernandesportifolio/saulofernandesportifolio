-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 02/07/2024 às 13:40
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `inovebar_controle_financeiro`
--

DELIMITER $$
--
-- Procedimentos
--
DROP PROCEDURE IF EXISTS `tratarsaldo`$$
$$

DROP PROCEDURE IF EXISTS `tratarsaldo1`$$
$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `balancos`
--

DROP TABLE IF EXISTS `balancos`;
CREATE TABLE `balancos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `montante` double(10,2) NOT NULL DEFAULT '0.00',
  `empresa_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `balancos`
--

INSERT INTO `balancos` (`id`, `user_id`, `montante`, `empresa_id`) VALUES
(1, 1, 0.00, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cartoes`
--

DROP TABLE IF EXISTS `cartoes`;
CREATE TABLE `cartoes` (
  `id` int(11) NOT NULL,
  `tarifa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tarifa1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tarifa2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `cartoes`
--

INSERT INTO `cartoes` (`id`, `tarifa`, `tarifa1`, `tarifa2`) VALUES
(1, '1.90', '3.00', '4.30');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responsavel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipocli` int(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `responsavel`, `tipocli`) VALUES
(12, 'Vivian de Medeiros Lago', 'Vivian', 1),
(13, 'Carla Godinho de Oliveira', 'Carla', 1),
(14, 'Priscila Kruger da Silva', 'Priscila', 1),
(4, 'The Wedge Marketing Digital', 'Roberta', 1),
(5, 'Sociedade de Advogados', 'Cecilia', 1),
(6, 'Nilsinho', 'Nilsinho', 1),
(7, 'Loraine Dutra', 'Loraine', 1),
(8, 'Isabela Link da Silva Belló', 'Isabela', 1),
(10, 'Raquel Silva da Silva', 'Raquel', 1),
(15, 'Bianca Aparecida de Almeida', 'Bianca Aparecida', 1),
(16, 'Marilucia Rosa Nardi', 'Marilucia Rosa', 1),
(17, 'Martielle Goulart Sarmento', 'Martielle Goulart', 1),
(18, 'Jaqueline Alexandra Kaizer de Carvalho', 'Jaqueline Alexandra', 1),
(19, 'Sabrina Alves Antunes', 'Sabrina Alves', 1),
(20, 'Maria Madalena da Silva Gusen', 'Maria Madalena', 1),
(21, 'Marília Dos Santos Pinto Simões', 'Marília Simões', 1),
(22, 'Verônica Marques Lima', 'Verônica Marques', 1),
(23, 'Daiane Rodrigues', 'Daiane Rodrigues', 1),
(24, 'Ingrid Duarte Machado Tavares', 'Ingrid', 1),
(25, 'Vera Rosangela da Costa', 'Vera', 1),
(26, 'Juliana Maria da Silva Agliardi', 'Juliana Maria', 1),
(27, 'Daniel Geremia', 'Daniel', 1),
(28, 'Taís Cristina Conceição dos Santos', 'Taís', 1),
(29, 'Marcia Gonçalves Zefino', 'Marcia', 1),
(30, 'Marcia de Lima Kiscporski', 'Marcia', 1),
(31, 'Tassia Gabriele Vieira Dias', 'Tassia', 1),
(32, 'Juliana da Silva Nogueira', 'Juliana', 1),
(33, 'Juliano Raupp', 'Juliano', 1),
(34, 'Rosana Aguirre da Silveira', 'Rosana', 1),
(35, 'Gabriele da Silva Larre', 'Gabriele', 1),
(36, 'Jaqueline Silva Gomes', 'Jaqueline', 1),
(37, 'Anna Emília Kroth Lima Farias', 'Anna', 1),
(38, 'Grecelene Scola Fernandes', 'Grecelene', 1),
(39, 'Sueinne Salvador Cardoso', 'Sueinne', 1),
(40, 'Dayane Gonçalves Sete Dambros', 'Dayane', 1),
(41, 'Diogo Lovato Rocha', 'Diogo', 1),
(42, 'Daniele Gueratto Romeiro', 'Daniele', 1),
(142, 'Carina Martins Scheffer', NULL, 1),
(45, 'Gilmar da Silva Beck', 'Gilmar da Silva Beck', 1),
(46, 'Simone Weinert Holderbaum Machado', 'Simone', 1),
(47, 'Andrea Morais de Oliveira', 'Natália Selback', 1),
(48, 'Raquel Luciane Silva da Silva', 'Raquel', 1),
(49, 'Guilherme Carvalho Leme', 'Guilherme', 1),
(50, 'Soel Arpini Junior', 'Soel', 1),
(52, 'Brunna Assmann Dehnhardt', 'Brunna', 1),
(53, 'Cristiane Winques', 'Cristiane', 1),
(54, 'Elen Barbosa Soares', 'Elen', 1),
(55, 'Natália dos Santos Matias Gomes', 'Natália', 1),
(56, 'Espaço Tae Multieventos', 'Espaço Tae', 1),
(57, 'Janice Machado de Almeida', 'Janice', 1),
(58, 'Maria Julia Dietrich', 'Maria', 1),
(59, 'Cristiani Simoni Eismann Weishimer', 'Cristiani', 1),
(60, 'Tatiana da Silva Nunes', 'Tatiana', 1),
(61, 'Simone Marques da Silva', 'Simone', 1),
(62, 'Gustavo Montiel', 'Michelli', 1),
(63, 'Cristiane Gomes da Cruz', 'Cristiane', 1),
(64, 'Karine Chagas Camacho', 'Karine', 1),
(65, 'Andrea de Azevedo Capelão', 'Andrea', 1),
(66, 'Graziela Pellenz Pandolfo', 'Graziela', 1),
(67, 'Leonardo da Luz Penz', 'Leonardo', 1),
(68, 'Daiana Correa Meireles', 'Daiana', 1),
(69, 'Susiane Aparecida Schuetz Ramos', 'Susiane', 1),
(70, 'Rita de Cassia Lafalce dos Santos', 'Rita', 1),
(71, 'Giovani Oliveira dos Santos', 'Giovani', 1),
(72, 'Caroline Duarte Ferreira', 'Caroline', 1),
(73, 'CAIXA ENTRADA', NULL, 3),
(74, 'Lucas Braga', NULL, 3),
(75, 'Clóvis Junior', NULL, 3),
(76, 'Matheus da Rosa', NULL, 3),
(78, 'Maurício Borges', NULL, 3),
(79, 'Frank', NULL, 3),
(80, 'Marquinhos', NULL, 3),
(81, 'Felipe Cruz', NULL, 3),
(82, 'Pedro', NULL, 3),
(83, 'Hyago', NULL, 3),
(84, 'Angelo', NULL, 3),
(85, 'Dyoner', NULL, 3),
(86, 'Lucas Dandrea', NULL, 3),
(87, 'Dani Jr', NULL, 3),
(88, 'Bruna', NULL, 3),
(89, 'Carla', NULL, 3),
(90, 'Lucas Escobar', NULL, 3),
(91, 'Hyago', NULL, 3),
(92, 'Paloma', NULL, 3),
(93, 'William Veleda', NULL, 3),
(94, 'Laigner', NULL, 3),
(95, 'Francisco Luchsinger', NULL, 3),
(96, 'Lucas Costa', NULL, 3),
(97, 'Leonardo', NULL, 3),
(98, 'Cristian Dutra', NULL, 3),
(99, 'Lucas Ribeiro', NULL, 3),
(100, 'Rodrigo', NULL, 3),
(102, 'Giovane', NULL, 3),
(103, 'Daniel Barcelos', NULL, 3),
(104, 'Maicon Alexandre', NULL, 3),
(105, 'Douglas', NULL, 3),
(106, 'Letícia', NULL, 3),
(107, 'Jonny', NULL, 3),
(108, 'Gui Santos', NULL, 3),
(109, 'Lucas Mancio', NULL, 3),
(110, 'Rogério Ávila', NULL, 3),
(111, 'Daniel Poa Club', NULL, 3),
(112, 'Jonata', NULL, 3),
(138, 'Natália dos Santos Matias Gomes', NULL, 1),
(114, 'SAQUE CAIXA', NULL, 3),
(129, 'DOUGLAS SILVA DE SOUZA', NULL, 1),
(130, 'LUCAS MANCIO', NULL, 1),
(131, 'TFA79MSEQY', NULL, 1),
(132, 'Elisiane Kolling', NULL, 1),
(133, 'Rafaela Meireles de Oliveira', NULL, 1),
(134, 'Liliane Ferreira Franco', NULL, 1),
(135, 'Kimberly Piquelet Mocellin', NULL, 1),
(136, 'Gislaine Aguiar Medeiros', NULL, 1),
(139, 'Carina Martins Scheffer', NULL, 1),
(140, 'Carolina Souza da Costa', NULL, 1),
(141, 'TKRT6VVQVA', NULL, 1),
(143, 'Francini Araújo', NULL, 1),
(144, 'Inajara Rodrigues', NULL, 1),
(145, 'Izabel Cristina da Silva', NULL, 1),
(146, 'Viviane Graziela da Silva Goulart', NULL, 1),
(147, 'Janaina Morreto Garcia', NULL, 1),
(148, 'Caroline da Silva Pereira', NULL, 1),
(149, 'Liliane Girard dos santos cezar', NULL, 1),
(150, 'Simone Marques da Silva', NULL, 1),
(151, 'Graziela Pandolfo', NULL, 1),
(152, 'Bruna Martins Maciel', NULL, 1),
(153, 'Maria Gislene Machado', NULL, 1),
(154, 'Cristiane Gomes da Cruz', NULL, 1),
(155, 'Cristiane Fischer', NULL, 1),
(156, 'Débora Brogni Monticelli', NULL, 1),
(157, 'Thays Andrade Simas', NULL, 1),
(158, 'Gabriele Rosa Zweibrucker', NULL, 1),
(159, 'Maicon de Lima Hahn', NULL, 1),
(160, 'TCUMLFP2SQ', NULL, 1),
(161, 'Patrícia do Livramento Jose', NULL, 1),
(162, 'Roseli Conceição Colombo', NULL, 1),
(163, 'Otávio Capeletti Peres', NULL, 1),
(164, 'Vera Cristina Schimidt', NULL, 1),
(165, 'Simone Penteado Vargas', NULL, 1),
(167, 'Silvano Severo Lemes', NULL, 1),
(168, 'Taiane Ferreira Alexandre', NULL, 1),
(169, 'José Nestor Tavares', NULL, 1),
(170, 'Daniel Medina Guimarães', NULL, 1),
(171, 'Joelma Souza Muniz', NULL, 1),
(172, 'Gilmar Lima de Castro', NULL, 1),
(174, 'Karine Almeida da Silva', NULL, 1),
(175, 'TFA79MSEQY', NULL, 1),
(176, 'Cláudio Silva da Silveira', NULL, 1),
(177, 'Nathalia Luana de Souza lopes', NULL, 1),
(178, 'Roberto Barros costa', NULL, 1),
(179, 'Marisabel Santos de Souza', NULL, 1),
(180, 'TEVED4247N', NULL, 1),
(181, 'CLAUDIA MARIA SANTOS TEIXEIRA', NULL, 1),
(182, 'INGRYD SOUZA VIEIRA', NULL, 1),
(183, 'MARILENE FLORES DOS SANTOS', NULL, 1),
(184, 'DENIEL SOARES DA SILVA', NULL, 1),
(185, 'LUCIANE PINTO VARGAS', NULL, 1),
(186, 'CARLA SILVA E SILVA PENNA', NULL, 1),
(187, 'SANDRA HELENA BOHRER', NULL, 1),
(188, 'CAROLINA DEGUSTAÇÃO', NULL, 1),
(189, 'CLAUDIA MARIA SANTOS TEIXEIRA', NULL, 1),
(190, 'LISIANE MOIZINHO SCHQUEL', NULL, 1),
(191, 'PAULA VAZ BUGS', NULL, 1),
(192, 'TCPQMP99S2 - LISIANE MOIZINHO', NULL, 1),
(193, 'CINTIA RIOGRANDENSE', NULL, 1),
(194, 'SANAVA CUNHA DA ROSA', NULL, 1),
(195, 'LILIANE APARECIDA DUTRA MACHADO', NULL, 1),
(196, 'ELISANDRA RICARDI BENINI', NULL, 1),
(197, 'LUCIANE BISCHOFF', NULL, 1),
(198, 'VANESSA LEIDENS', NULL, 1),
(199, 'KARINA MARIA DE OLIVEIRA PIACIELLI', NULL, 1),
(200, 'LUANA CRISTINA BARBOSA ANTÔNIO', NULL, 1),
(201, 'TEREZA VIEIRA ALVEZ', NULL, 1),
(202, 'DAIANE DA SILVA SOARES', NULL, 1),
(203, 'MARIA HELENA ROCHA MARTINS', NULL, 1),
(204, 'CARULINE EUFRÁSIO PEREIRA', NULL, 1),
(205, 'RAFAELA LEMES SPERANSA DA SILVA', NULL, 1),
(206, 'MARIA SILVANA ROCHA MARTINS', NULL, 1),
(207, 'BRINA KLAIN MOURA', NULL, 1),
(208, 'MARCIA REGINA VEIGA', NULL, 1),
(209, 'DENOS SOUZA WIVES', NULL, 1),
(210, 'DENIS SOUZA WIVES', NULL, 1),
(211, 'ROSANA MARTINS PEREIRA', NULL, 1),
(212, 'ESTELA SAMPAIO', NULL, 1),
(213, 'KATIA TAVARES GOERL', NULL, 1),
(214, 'ARI DA ROSA', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responsavel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`, `responsavel`) VALUES
(1, 'Inove Bartenders', 'Tatiane');

-- --------------------------------------------------------

--
-- Estrutura para tabela `historicos`
--

DROP TABLE IF EXISTS `historicos`;
CREATE TABLE `historicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` enum('DEPOSITO','SAQUE','TRANSFERENCIA','PAGAMENTO','RECEBIDO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `montante` double(10,2) NOT NULL,
  `recebido` double(10,2) NOT NULL,
  `valor_referente` double(10,2) NOT NULL,
  `total_antes` double(10,2) NOT NULL,
  `total_depois` double(10,2) NOT NULL,
  `user_id_transaction` int(11) DEFAULT NULL,
  `data` date NOT NULL,
  `observacao` text COLLATE utf8mb4_unicode_ci,
  `tipo_compra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `historicos-bkp`
--

DROP TABLE IF EXISTS `historicos-bkp`;
CREATE TABLE `historicos-bkp` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` enum('DEPOSITO','SAQUE','TRANSFERENCIA','PAGAMENTO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `montante` double(10,2) NOT NULL,
  `valor_referente` double(10,2) DEFAULT NULL,
  `total_antes` double(10,2) NOT NULL,
  `total_depois` double(10,2) NOT NULL,
  `user_id_transaction` int(11) DEFAULT NULL,
  `data` date NOT NULL,
  `observacao` text COLLATE utf8mb4_unicode_ci,
  `tipo_compra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `historicos-bkp`
--

INSERT INTO `historicos-bkp` (`id`, `user_id`, `type`, `montante`, `valor_referente`, `total_antes`, `total_depois`, `user_id_transaction`, `data`, `observacao`, `tipo_compra`, `created_at`, `updated_at`) VALUES
(1, 1, 'DEPOSITO', 189.45, 1380.00, 0.00, 189.45, 131, '2019-07-13', '7x', 'No credito', '2019-11-26 16:46:31', '2019-11-26 16:46:31'),
(2, 1, 'DEPOSITO', 189.45, 1380.00, 189.45, 378.90, 131, '2019-08-13', '7x', 'No credito', '2019-11-26 16:46:31', '2019-11-26 16:46:31'),
(3, 1, 'DEPOSITO', 189.45, 1380.00, 378.90, 568.35, 131, '2019-09-13', '7x', 'No credito', '2019-11-26 16:46:31', '2019-11-26 16:46:31'),
(4, 1, 'DEPOSITO', 189.45, 1380.00, 568.35, 757.80, 131, '2019-10-13', '7x', 'No credito', '2019-11-26 16:46:31', '2019-11-26 16:46:31'),
(5, 1, 'DEPOSITO', 189.45, 1380.00, 757.80, 947.25, 131, '2019-11-13', '7x', 'No credito', '2019-11-26 16:46:31', '2019-11-26 16:46:31'),
(6, 1, 'DEPOSITO', 189.45, 1380.00, 947.25, 1136.70, 131, '2019-12-13', '7x', 'No credito', '2019-11-26 16:46:31', '2019-11-26 16:46:31'),
(7, 1, 'DEPOSITO', 189.45, 1380.00, 1136.70, 1326.15, 131, '2020-01-13', '7x', 'No credito', '2019-11-26 16:46:31', '2019-11-26 16:46:31'),
(8, 1, 'DEPOSITO', 247.94, 1290.00, 1326.15, 1574.09, 132, '2019-08-11', '5x', 'No credito', '2019-11-26 16:48:52', '2019-11-26 16:48:52'),
(9, 1, 'DEPOSITO', 247.94, 1290.00, 1574.09, 1822.03, 132, '2019-09-11', '5x', 'No credito', '2019-11-26 16:48:52', '2019-11-26 16:48:52'),
(10, 1, 'DEPOSITO', 247.94, 1290.00, 1822.03, 2069.97, 132, '2019-10-11', '5x', 'No credito', '2019-11-26 16:48:52', '2019-11-26 16:48:52'),
(11, 1, 'DEPOSITO', 247.94, 1290.00, 2069.97, 2317.91, 132, '2019-11-11', '5x', 'No credito', '2019-11-26 16:48:52', '2019-11-26 16:48:52'),
(12, 1, 'DEPOSITO', 247.94, 1290.00, 2317.91, 2565.85, 132, '2019-12-11', '5x', 'No credito', '2019-11-26 16:48:52', '2019-11-26 16:48:52'),
(13, 1, 'DEPOSITO', 235.25, 1224.00, 2565.85, 2801.10, 48, '2019-08-17', '5x', 'No credito', '2019-11-26 16:50:53', '2019-11-26 16:50:53'),
(14, 1, 'DEPOSITO', 235.25, 1224.00, 2801.10, 3036.35, 48, '2019-09-17', '5x', 'No credito', '2019-11-26 16:50:53', '2019-11-26 16:50:53'),
(15, 1, 'DEPOSITO', 235.25, 1224.00, 3036.35, 3271.60, 48, '2019-10-17', '5x', 'No credito', '2019-11-26 16:50:53', '2019-11-26 16:50:53'),
(16, 1, 'DEPOSITO', 235.25, 1224.00, 3271.60, 3506.85, 48, '2019-11-17', '5x', 'No credito', '2019-11-26 16:50:53', '2019-11-26 16:50:53'),
(17, 1, 'DEPOSITO', 235.25, 1224.00, 3506.85, 3742.10, 48, '2019-12-17', '5x', 'No credito', '2019-11-26 16:50:53', '2019-11-26 16:50:53'),
(18, 1, 'DEPOSITO', 493.57, 2568.00, 3742.10, 4235.67, 134, '2019-08-22', '5x', 'No credito', '2019-11-26 16:52:28', '2019-11-26 16:52:28'),
(19, 1, 'DEPOSITO', 493.57, 2568.00, 4235.67, 4729.24, 134, '2019-09-22', '5x', 'No credito', '2019-11-26 16:52:28', '2019-11-26 16:52:28'),
(20, 1, 'DEPOSITO', 493.57, 2568.00, 4729.24, 5222.81, 134, '2019-10-22', '5x', 'No credito', '2019-11-26 16:52:28', '2019-11-26 16:52:28'),
(21, 1, 'DEPOSITO', 493.57, 2568.00, 5222.81, 5716.38, 134, '2019-11-22', '5x', 'No credito', '2019-11-26 16:52:28', '2019-11-26 16:52:28'),
(22, 1, 'DEPOSITO', 493.57, 2568.00, 5716.38, 6209.95, 134, '2019-12-22', '5x', 'No credito', '2019-11-26 16:52:28', '2019-11-26 16:52:28'),
(23, 1, 'DEPOSITO', 273.88, 1425.00, 6209.95, 6483.84, 135, '2019-08-23', '5x', 'No credito', '2019-11-26 16:54:15', '2019-11-26 16:54:15'),
(24, 1, 'DEPOSITO', 273.88, 1425.00, 6483.84, 6757.73, 135, '2019-09-23', '5x', 'No credito', '2019-11-26 16:54:15', '2019-11-26 16:54:15'),
(25, 1, 'DEPOSITO', 273.88, 1425.00, 6757.73, 7031.61, 135, '2019-10-23', '5x', 'No credito', '2019-11-26 16:54:15', '2019-11-26 16:54:15'),
(26, 1, 'DEPOSITO', 273.88, 1425.00, 7031.61, 7305.49, 135, '2019-11-23', '5x', 'No credito', '2019-11-26 16:54:15', '2019-11-26 16:54:15'),
(27, 1, 'DEPOSITO', 273.88, 1425.00, 7305.49, 7579.38, 135, '2019-12-23', '5x', 'No credito', '2019-11-26 16:54:15', '2019-11-26 16:54:15'),
(28, 1, 'DEPOSITO', 192.20, 1000.00, 7579.38, 7771.58, 136, '2019-08-27', '07-5x', 'No credito', '2019-11-26 16:57:50', '2019-11-26 16:57:50'),
(29, 1, 'DEPOSITO', 192.20, 1000.00, 7771.58, 7963.78, 136, '2019-09-27', '07-5x', 'No credito', '2019-11-26 16:57:50', '2019-11-26 16:57:50'),
(30, 1, 'DEPOSITO', 192.20, 1000.00, 7963.78, 8155.98, 136, '2019-10-27', '07-5x', 'No credito', '2019-11-26 16:57:50', '2019-11-26 16:57:50'),
(31, 1, 'DEPOSITO', 192.20, 1000.00, 8155.98, 8348.18, 136, '2019-11-27', '07-5x', 'No credito', '2019-11-26 16:57:50', '2019-11-26 16:57:50'),
(32, 1, 'DEPOSITO', 192.20, 1000.00, 8348.18, 8540.38, 136, '2019-12-27', '07-5x', 'No credito', '2019-11-26 16:57:50', '2019-11-26 16:57:50'),
(147, 1, 'DEPOSITO', 219.11, 1140.00, 102564.80, 102783.91, 174, '2019-10-29', '07 - 5x', 'No credito', '2019-11-27 17:26:06', '2019-11-27 17:26:06'),
(128, 1, 'DEPOSITO', 276.77, 1152.00, 97031.34, 97308.11, 151, '2019-09-29', '08-4x', 'No credito', '2019-11-27 12:51:21', '2019-11-27 12:51:21'),
(146, 1, 'DEPOSITO', 219.11, 1140.00, 102345.69, 102564.80, 174, '2019-09-29', '07 - 5x', 'No credito', '2019-11-27 17:26:06', '2019-11-27 17:26:06'),
(145, 1, 'DEPOSITO', 219.11, 1140.00, 102126.58, 102345.69, 174, '2019-08-29', '07 - 5x', 'No credito', '2019-11-27 17:26:06', '2019-11-27 17:26:06'),
(38, 1, 'DEPOSITO', 182.59, 570.00, 12922.38, 13492.38, 173, '2019-12-26', '11 - 3 X', 'No credito', '2019-11-26 21:03:43', '2019-11-26 21:03:43'),
(39, 1, 'DEPOSITO', 182.59, 570.00, 13492.38, 14062.38, 173, '2020-01-26', '11 - 3 X', 'No credito', '2019-11-26 21:03:43', '2019-11-26 21:03:43'),
(40, 1, 'DEPOSITO', 182.59, 570.00, 14062.38, 14632.38, 173, '2020-02-26', '11 - 3 X', 'No credito', '2019-11-26 21:03:43', '2019-11-26 21:03:43'),
(41, 1, 'DEPOSITO', 193.80, 200.00, 14632.38, 14832.38, 172, '2019-12-23', '11 - 1x', 'No credito', '2019-11-26 21:11:39', '2019-11-26 21:11:39'),
(42, 1, 'DEPOSITO', 193.80, 200.00, 14832.38, 15032.38, 171, '2019-12-23', '11 -1x', 'No credito', '2019-11-26 21:22:37', '2019-11-26 21:22:37'),
(43, 1, 'DEPOSITO', 341.16, 1775.00, 15032.38, 16807.38, 170, '2019-12-22', '11 - 5x', 'No credito', '2019-11-26 21:23:51', '2019-11-26 21:23:51'),
(44, 1, 'DEPOSITO', 341.16, 1775.00, 16807.38, 18582.38, 170, '2020-01-22', '11 - 5x', 'No credito', '2019-11-26 21:23:51', '2019-11-26 21:23:51'),
(45, 1, 'DEPOSITO', 341.16, 1775.00, 18582.38, 20357.38, 170, '2020-02-22', '11 - 5x', 'No credito', '2019-11-26 21:23:51', '2019-11-26 21:23:51'),
(46, 1, 'DEPOSITO', 341.16, 1775.00, 20357.38, 22132.38, 170, '2020-03-22', '11 - 5x', 'No credito', '2019-11-26 21:23:51', '2019-11-26 21:23:51'),
(47, 1, 'DEPOSITO', 341.16, 1775.00, 22132.38, 23907.38, 170, '2020-04-22', '11 - 5x', 'No credito', '2019-11-26 21:23:51', '2019-11-26 21:23:51'),
(48, 1, 'DEPOSITO', 237.37, 741.00, 23907.38, 24648.38, 169, '2019-12-21', '11 - 3x', 'No credito', '2019-11-26 21:24:58', '2019-11-26 21:24:58'),
(49, 1, 'DEPOSITO', 237.37, 741.00, 24648.38, 25389.38, 169, '2020-01-21', '11 - 3x', 'No credito', '2019-11-26 21:24:58', '2019-11-26 21:24:58'),
(50, 1, 'DEPOSITO', 237.37, 741.00, 25389.38, 26130.38, 169, '2020-02-21', '11 - 3x', 'No credito', '2019-11-26 21:24:58', '2019-11-26 21:24:58'),
(51, 1, 'DEPOSITO', 90.53, 471.00, 26130.38, 26601.38, 168, '2019-12-11', '11 -5x', 'No credito', '2019-11-26 21:26:15', '2019-11-26 21:26:15'),
(52, 1, 'DEPOSITO', 90.53, 471.00, 26601.38, 27072.38, 168, '2020-01-11', '11 -5x', 'No credito', '2019-11-26 21:26:15', '2019-11-26 21:26:15'),
(53, 1, 'DEPOSITO', 90.53, 471.00, 27072.38, 27543.38, 168, '2020-02-11', '11 -5x', 'No credito', '2019-11-26 21:26:15', '2019-11-26 21:26:15'),
(54, 1, 'DEPOSITO', 90.53, 471.00, 27543.38, 28014.38, 168, '2020-03-11', '11 -5x', 'No credito', '2019-11-26 21:26:15', '2019-11-26 21:26:15'),
(55, 1, 'DEPOSITO', 90.53, 471.00, 28014.38, 28485.38, 168, '2020-04-11', '11 -5x', 'No credito', '2019-11-26 21:26:15', '2019-11-26 21:26:15'),
(56, 1, 'DEPOSITO', 138.58, 721.00, 28485.38, 29206.38, 168, '2019-12-11', '11 - 5x', 'No credito', '2019-11-26 21:27:11', '2019-11-26 21:27:11'),
(57, 1, 'DEPOSITO', 138.58, 721.00, 29206.38, 29927.38, 168, '2020-01-11', '11 - 5x', 'No credito', '2019-11-26 21:27:11', '2019-11-26 21:27:11'),
(58, 1, 'DEPOSITO', 138.58, 721.00, 29927.38, 30648.38, 168, '2020-02-11', '11 - 5x', 'No credito', '2019-11-26 21:27:11', '2019-11-26 21:27:11'),
(59, 1, 'DEPOSITO', 138.58, 721.00, 30648.38, 31369.38, 168, '2020-03-11', '11 - 5x', 'No credito', '2019-11-26 21:27:11', '2019-11-26 21:27:11'),
(60, 1, 'DEPOSITO', 138.58, 721.00, 31369.38, 32090.38, 168, '2020-04-11', '11 - 5x', 'No credito', '2019-11-26 21:27:11', '2019-11-26 21:27:11'),
(61, 1, 'DEPOSITO', 170.67, 888.00, 32090.38, 32978.38, 167, '2019-12-11', '11 - 5x', 'No credito', '2019-11-26 21:28:22', '2019-11-26 21:28:22'),
(62, 1, 'DEPOSITO', 170.67, 888.00, 32978.38, 33866.38, 167, '2020-01-11', '11 - 5x', 'No credito', '2019-11-26 21:28:22', '2019-11-26 21:28:22'),
(63, 1, 'DEPOSITO', 170.67, 888.00, 33866.38, 34754.38, 167, '2020-02-11', '11 - 5x', 'No credito', '2019-11-26 21:28:22', '2019-11-26 21:28:22'),
(64, 1, 'DEPOSITO', 170.67, 888.00, 34754.38, 35642.38, 167, '2020-03-11', '11 - 5x', 'No credito', '2019-11-26 21:28:22', '2019-11-26 21:28:22'),
(65, 1, 'DEPOSITO', 170.67, 888.00, 35642.38, 36530.38, 167, '2020-04-11', '11 - 5x', 'No credito', '2019-11-26 21:28:22', '2019-11-26 21:28:22'),
(66, 1, 'DEPOSITO', 409.63, 1705.00, 36530.38, 38235.38, 166, '2019-12-11', '11 - 4x', 'No credito', '2019-11-26 21:29:34', '2019-11-26 21:29:34'),
(67, 1, 'DEPOSITO', 409.63, 1705.00, 38235.38, 39940.38, 166, '2020-01-11', '11 - 4x', 'No credito', '2019-11-26 21:29:34', '2019-11-26 21:29:34'),
(68, 1, 'DEPOSITO', 409.63, 1705.00, 39940.38, 41645.38, 166, '2020-02-11', '11 - 4x', 'No credito', '2019-11-26 21:29:34', '2019-11-26 21:29:34'),
(69, 1, 'DEPOSITO', 409.63, 1705.00, 41645.38, 43350.38, 166, '2020-03-11', '11 - 4x', 'No credito', '2019-11-26 21:29:34', '2019-11-26 21:29:34'),
(70, 1, 'DEPOSITO', 406.98, 420.00, 43350.38, 43770.38, 165, '2019-12-06', '11 -1x', 'No credito', '2019-11-26 21:30:56', '2019-11-26 21:30:56'),
(71, 1, 'DEPOSITO', 320.97, 1336.00, 43770.38, 45106.38, 164, '2019-11-17', '10 - 4x', 'No credito', '2019-11-26 21:32:12', '2019-11-26 21:32:12'),
(72, 1, 'DEPOSITO', 320.97, 1336.00, 45106.38, 46442.38, 164, '2019-12-17', '10 - 4x', 'No credito', '2019-11-26 21:32:12', '2019-11-26 21:32:12'),
(73, 1, 'DEPOSITO', 320.97, 1336.00, 46442.38, 47778.38, 164, '2020-01-17', '10 - 4x', 'No credito', '2019-11-26 21:32:12', '2019-11-26 21:32:12'),
(74, 1, 'DEPOSITO', 320.97, 1336.00, 47778.38, 49114.38, 164, '2020-02-17', '10 - 4x', 'No credito', '2019-11-26 21:32:12', '2019-11-26 21:32:12'),
(75, 1, 'DEPOSITO', 317.13, 1980.00, 49114.38, 51094.38, 163, '2019-11-17', '10- 6x', 'No credito', '2019-11-26 21:33:32', '2019-11-26 21:33:32'),
(76, 1, 'DEPOSITO', 317.13, 1980.00, 51094.38, 53074.38, 163, '2019-12-17', '10- 6x', 'No credito', '2019-11-26 21:33:32', '2019-11-26 21:33:32'),
(77, 1, 'DEPOSITO', 317.13, 1980.00, 53074.38, 55054.38, 163, '2020-01-17', '10- 6x', 'No credito', '2019-11-26 21:33:32', '2019-11-26 21:33:32'),
(78, 1, 'DEPOSITO', 317.13, 1980.00, 55054.38, 57034.38, 163, '2020-02-17', '10- 6x', 'No credito', '2019-11-26 21:33:32', '2019-11-26 21:33:32'),
(79, 1, 'DEPOSITO', 317.13, 1980.00, 57034.38, 59014.38, 163, '2020-03-17', '10- 6x', 'No credito', '2019-11-26 21:33:32', '2019-11-26 21:33:32'),
(80, 1, 'DEPOSITO', 317.13, 1980.00, 59014.38, 60994.38, 163, '2020-04-17', '10- 6x', 'No credito', '2019-11-26 21:33:32', '2019-11-26 21:33:32'),
(81, 1, 'DEPOSITO', 276.77, 1440.00, 60994.38, 62434.38, 162, '2019-11-15', '10 - 5x', 'No credito', '2019-11-26 21:34:44', '2019-11-26 21:34:44'),
(82, 1, 'DEPOSITO', 276.77, 1440.00, 62434.38, 63874.38, 162, '2019-12-15', '10 - 5x', 'No credito', '2019-11-26 21:34:44', '2019-11-26 21:34:44'),
(83, 1, 'DEPOSITO', 276.77, 1440.00, 63874.38, 65314.38, 162, '2020-01-15', '10 - 5x', 'No credito', '2019-11-26 21:34:44', '2019-11-26 21:34:44'),
(84, 1, 'DEPOSITO', 276.77, 1440.00, 65314.38, 66754.38, 162, '2020-02-15', '10 - 5x', 'No credito', '2019-11-26 21:34:44', '2019-11-26 21:34:44'),
(85, 1, 'DEPOSITO', 276.77, 1440.00, 66754.38, 68194.38, 162, '2020-03-15', '10 - 5x', 'No credito', '2019-11-26 21:34:44', '2019-11-26 21:34:44'),
(86, 1, 'DEPOSITO', 216.80, 1128.00, 68194.38, 69322.38, 161, '2019-11-09', '10 - 5x', 'No credito', '2019-11-26 21:37:01', '2019-11-26 21:37:01'),
(87, 1, 'DEPOSITO', 216.80, 1128.00, 69322.38, 70450.38, 161, '2019-12-09', '10 - 5x', 'No credito', '2019-11-26 21:37:01', '2019-11-26 21:37:01'),
(88, 1, 'DEPOSITO', 216.80, 1128.00, 70450.38, 71578.38, 161, '2020-01-09', '10 - 5x', 'No credito', '2019-11-26 21:37:01', '2019-11-26 21:37:01'),
(89, 1, 'DEPOSITO', 216.80, 1128.00, 71578.38, 72706.38, 161, '2020-02-09', '10 - 5x', 'No credito', '2019-11-26 21:37:01', '2019-11-26 21:37:01'),
(90, 1, 'DEPOSITO', 216.80, 1128.00, 72706.38, 73834.38, 161, '2020-03-09', '10 - 5x', 'No credito', '2019-11-26 21:37:01', '2019-11-26 21:37:01'),
(91, 1, 'DEPOSITO', 199.89, 1248.00, 73834.38, 75082.38, 160, '2019-11-08', '10 -6x', 'No credito', '2019-11-26 21:38:18', '2019-11-26 21:38:18'),
(92, 1, 'DEPOSITO', 199.89, 1248.00, 75082.38, 76330.38, 160, '2019-12-08', '10 -6x', 'No credito', '2019-11-26 21:38:18', '2019-11-26 21:38:18'),
(93, 1, 'DEPOSITO', 199.89, 1248.00, 76330.38, 77578.38, 160, '2020-01-08', '10 -6x', 'No credito', '2019-11-26 21:38:18', '2019-11-26 21:38:18'),
(94, 1, 'DEPOSITO', 199.89, 1248.00, 77578.38, 78826.38, 160, '2020-02-08', '10 -6x', 'No credito', '2019-11-26 21:38:18', '2019-11-26 21:38:18'),
(95, 1, 'DEPOSITO', 199.89, 1248.00, 78826.38, 80074.38, 160, '2020-03-08', '10 -6x', 'No credito', '2019-11-26 21:38:18', '2019-11-26 21:38:18'),
(96, 1, 'DEPOSITO', 199.89, 1248.00, 80074.38, 81322.38, 160, '2020-04-08', '10 -6x', 'No credito', '2019-11-26 21:38:18', '2019-11-26 21:38:18'),
(97, 1, 'DEPOSITO', 355.19, 1848.00, 81322.38, 83170.38, 159, '2019-11-04', '10 - 5x', 'No credito', '2019-11-26 21:39:50', '2019-11-26 21:39:50'),
(98, 1, 'DEPOSITO', 355.19, 1848.00, 83170.38, 85018.38, 159, '2019-12-04', '10 - 5x', 'No credito', '2019-11-26 21:39:50', '2019-11-26 21:39:50'),
(99, 1, 'DEPOSITO', 355.19, 1848.00, 85018.38, 86866.38, 159, '2020-01-04', '10 - 5x', 'No credito', '2019-11-26 21:39:50', '2019-11-26 21:39:50'),
(100, 1, 'DEPOSITO', 355.19, 1848.00, 86866.38, 88714.38, 159, '2020-02-04', '10 - 5x', 'No credito', '2019-11-26 21:39:50', '2019-11-26 21:39:50'),
(101, 1, 'DEPOSITO', 355.19, 1848.00, 88714.38, 90562.38, 159, '2020-03-04', '10 - 5x', 'No credito', '2019-11-26 21:39:50', '2019-11-26 21:39:50'),
(102, 1, 'DEPOSITO', 40.36, 84.00, 90562.38, 90646.38, 158, '2019-11-01', '10 - 2x', 'No credito', '2019-11-26 21:41:20', '2019-11-26 21:41:20'),
(103, 1, 'DEPOSITO', 40.36, 84.00, 90646.38, 90730.38, 158, '2019-12-01', '10 - 2x', 'No credito', '2019-11-26 21:41:20', '2019-11-26 21:41:20'),
(104, 1, 'DEPOSITO', 48.05, 100.00, 90730.38, 90830.38, 158, '2019-11-01', '10 - 2x', 'No credito', '2019-11-26 21:43:11', '2019-11-26 21:43:11'),
(105, 1, 'DEPOSITO', 48.05, 100.00, 90830.38, 90930.38, 158, '2019-12-01', '10 - 2x', 'No credito', '2019-11-26 21:43:11', '2019-11-26 21:43:11'),
(106, 1, 'DEPOSITO', 240.25, 500.00, 90930.38, 91430.38, 158, '2019-11-01', '10 - 2x', 'No credito', '2019-11-26 21:44:31', '2019-11-26 21:44:31'),
(107, 1, 'DEPOSITO', 240.25, 500.00, 91430.38, 91930.38, 158, '2019-12-01', '10 - 2x', 'No credito', '2019-11-26 21:44:31', '2019-11-26 21:44:31'),
(108, 1, 'DEPOSITO', 195.56, 814.00, 91930.38, 92125.94, 157, '2019-10-27', '09-4x', 'No credito', '2019-11-27 12:24:48', '2019-11-27 12:24:48'),
(109, 1, 'DEPOSITO', 195.56, 814.00, 92125.94, 92321.50, 157, '2019-11-27', '09-4x', 'No credito', '2019-11-27 12:24:48', '2019-11-27 12:24:48'),
(110, 1, 'DEPOSITO', 195.56, 814.00, 92321.50, 92517.06, 157, '2019-12-27', '09-4x', 'No credito', '2019-11-27 12:24:48', '2019-11-27 12:24:48'),
(111, 1, 'DEPOSITO', 195.56, 814.00, 92517.06, 92712.62, 157, '2020-01-27', '09-4x', 'No credito', '2019-11-27 12:24:48', '2019-11-27 12:24:48'),
(112, 1, 'DEPOSITO', 325.78, 1356.00, 92712.62, 93038.40, 156, '2019-10-24', '09-4x', 'No credito', '2019-11-27 12:25:58', '2019-11-27 12:25:58'),
(113, 1, 'DEPOSITO', 325.78, 1356.00, 93038.40, 93364.18, 156, '2019-11-24', '09-4x', 'No credito', '2019-11-27 12:25:58', '2019-11-27 12:25:58'),
(114, 1, 'DEPOSITO', 325.78, 1356.00, 93364.18, 93689.96, 156, '2019-12-24', '09-4x', 'No credito', '2019-11-27 12:25:58', '2019-11-27 12:25:58'),
(115, 1, 'DEPOSITO', 325.78, 1356.00, 93689.96, 94015.74, 156, '2020-01-24', '09-4x', 'No credito', '2019-11-27 12:25:58', '2019-11-27 12:25:58'),
(116, 1, 'DEPOSITO', 234.48, 976.00, 94015.74, 94250.22, 63, '2019-10-03', '09 - 4x', 'No credito', '2019-11-27 12:27:49', '2019-11-27 12:27:49'),
(117, 1, 'DEPOSITO', 234.48, 976.00, 94250.22, 94484.70, 63, '2019-11-03', '09 - 4x', 'No credito', '2019-11-27 12:27:49', '2019-11-27 12:27:49'),
(118, 1, 'DEPOSITO', 234.48, 976.00, 94484.70, 94719.18, 63, '2019-12-03', '09 - 4x', 'No credito', '2019-11-27 12:27:49', '2019-11-27 12:27:49'),
(119, 1, 'DEPOSITO', 234.48, 976.00, 94719.18, 94953.66, 63, '2020-01-03', '09 - 4x', 'No credito', '2019-11-27 12:27:49', '2019-11-27 12:27:49'),
(120, 1, 'DEPOSITO', 336.83, 1402.00, 94953.66, 95290.49, 153, '2019-10-02', '09 -4x', 'No credito', '2019-11-27 12:30:56', '2019-11-27 12:30:56'),
(121, 1, 'DEPOSITO', 336.83, 1402.00, 95290.49, 95627.32, 153, '2019-11-02', '09 -4x', 'No credito', '2019-11-27 12:30:56', '2019-11-27 12:30:56'),
(122, 1, 'DEPOSITO', 336.83, 1402.00, 95627.32, 95964.15, 153, '2019-12-02', '09 -4x', 'No credito', '2019-11-27 12:30:56', '2019-11-27 12:30:56'),
(123, 1, 'DEPOSITO', 336.83, 1402.00, 95964.15, 96300.98, 153, '2020-01-02', '09 -4x', 'No credito', '2019-11-27 12:30:56', '2019-11-27 12:30:56'),
(124, 1, 'DEPOSITO', 182.59, 760.00, 96300.98, 96483.57, 152, '2019-10-02', '09 - 4x', 'No credito', '2019-11-27 12:42:03', '2019-11-27 12:42:03'),
(125, 1, 'DEPOSITO', 182.59, 760.00, 96483.57, 96666.16, 152, '2019-11-02', '09 - 4x', 'No credito', '2019-11-27 12:42:03', '2019-11-27 12:42:03'),
(126, 1, 'DEPOSITO', 182.59, 760.00, 96666.16, 96848.75, 152, '2019-12-02', '09 - 4x', 'No credito', '2019-11-27 12:42:03', '2019-11-27 12:42:03'),
(127, 1, 'DEPOSITO', 182.59, 760.00, 96848.75, 97031.34, 152, '2020-01-02', '09 - 4x', 'No credito', '2019-11-27 12:42:03', '2019-11-27 12:42:03'),
(129, 1, 'DEPOSITO', 276.77, 1152.00, 97308.11, 97584.88, 151, '2019-10-29', '08-4x', 'No credito', '2019-11-27 12:51:21', '2019-11-27 12:51:21'),
(130, 1, 'DEPOSITO', 276.77, 1152.00, 97584.88, 97861.65, 151, '2019-11-29', '08-4x', 'No credito', '2019-11-27 12:51:21', '2019-11-27 12:51:21'),
(131, 1, 'DEPOSITO', 276.77, 1152.00, 97861.65, 98138.42, 151, '2019-12-29', '08-4x', 'No credito', '2019-11-27 12:51:21', '2019-11-27 12:51:21'),
(132, 1, 'DEPOSITO', 394.01, 1640.00, 98138.42, 98532.43, 149, '2019-09-27', '08 - 4x', 'No credito', '2019-11-27 12:52:43', '2019-11-27 12:52:43'),
(133, 1, 'DEPOSITO', 394.01, 1640.00, 98532.43, 98926.44, 149, '2019-10-27', '08 - 4x', 'No credito', '2019-11-27 12:52:43', '2019-11-27 12:52:43'),
(134, 1, 'DEPOSITO', 394.01, 1640.00, 98926.44, 99320.45, 149, '2019-11-27', '08 - 4x', 'No credito', '2019-11-27 12:52:43', '2019-11-27 12:52:43'),
(135, 1, 'DEPOSITO', 394.01, 1640.00, 99320.45, 99714.46, 149, '2019-12-27', '08 - 4x', 'No credito', '2019-11-27 12:52:43', '2019-11-27 12:52:43'),
(136, 1, 'DEPOSITO', 264.28, 1100.00, 99714.46, 99978.74, 148, '2019-09-24', '08 - 4x', 'No credito', '2019-11-27 13:20:05', '2019-11-27 13:20:05'),
(137, 1, 'DEPOSITO', 264.28, 1100.00, 99978.74, 100243.02, 148, '2019-10-24', '08 - 4x', 'No credito', '2019-11-27 13:20:05', '2019-11-27 13:20:05'),
(138, 1, 'DEPOSITO', 264.28, 1100.00, 100243.02, 100507.30, 148, '2019-11-24', '08 - 4x', 'No credito', '2019-11-27 13:20:05', '2019-11-27 13:20:05'),
(139, 1, 'DEPOSITO', 264.28, 1100.00, 100507.30, 100771.58, 148, '2019-12-24', '08 - 4x', 'No credito', '2019-11-27 13:20:05', '2019-11-27 13:20:05'),
(140, 1, 'DEPOSITO', 271.00, 1410.00, 100771.58, 101042.58, 147, '2019-09-21', '08 - 5x', 'No credito', '2019-11-27 13:25:43', '2019-11-27 13:25:43'),
(141, 1, 'DEPOSITO', 271.00, 1410.00, 101042.58, 101313.58, 147, '2019-10-21', '08 - 5x', 'No credito', '2019-11-27 13:25:43', '2019-11-27 13:25:43'),
(142, 1, 'DEPOSITO', 271.00, 1410.00, 101313.58, 101584.58, 147, '2019-11-21', '08 - 5x', 'No credito', '2019-11-27 13:25:43', '2019-11-27 13:25:43'),
(143, 1, 'DEPOSITO', 271.00, 1410.00, 101584.58, 101855.58, 147, '2019-12-21', '08 - 5x', 'No credito', '2019-11-27 13:25:43', '2019-11-27 13:25:43'),
(144, 1, 'DEPOSITO', 271.00, 1410.00, 101855.58, 102126.58, 147, '2020-01-21', '08 - 5x', 'No credito', '2019-11-27 13:25:43', '2019-11-27 13:25:43'),
(148, 1, 'DEPOSITO', 219.11, 1140.00, 102783.91, 103003.02, 174, '2019-11-29', '07 - 5x', 'No credito', '2019-11-27 17:26:06', '2019-11-27 17:26:06'),
(149, 1, 'DEPOSITO', 219.11, 1140.00, 103003.02, 103222.13, 174, '2019-12-29', '07 - 5x', 'No credito', '2019-11-27 17:26:06', '2019-11-27 17:26:06'),
(150, 1, 'DEPOSITO', 277.54, 1444.00, 103222.13, 103499.67, 141, '2019-08-30', '07 - 5x', 'No credito', '2019-11-27 17:39:53', '2019-11-27 17:39:53'),
(151, 1, 'DEPOSITO', 277.54, 1444.00, 103499.67, 103777.21, 141, '2019-09-30', '07 - 5x', 'No credito', '2019-11-27 17:39:53', '2019-11-27 17:39:53'),
(152, 1, 'DEPOSITO', 277.54, 1444.00, 103777.21, 104054.75, 141, '2019-10-30', '07 - 5x', 'No credito', '2019-11-27 17:39:53', '2019-11-27 17:39:53'),
(153, 1, 'DEPOSITO', 277.54, 1444.00, 104054.75, 104332.29, 141, '2019-11-30', '07 - 5x', 'No credito', '2019-11-27 17:39:53', '2019-11-27 17:39:53'),
(154, 1, 'DEPOSITO', 277.54, 1444.00, 104332.29, 104609.83, 141, '2019-12-30', '07 - 5x', 'No credito', '2019-11-27 17:39:53', '2019-11-27 17:39:53'),
(155, 1, 'DEPOSITO', 238.65, 1241.65, 104609.83, 104848.48, 140, '2019-08-30', '07 - 5x', 'No credito', '2019-11-27 17:42:51', '2019-11-27 17:42:51'),
(156, 1, 'DEPOSITO', 238.65, 1241.65, 104848.48, 105087.13, 140, '2019-09-30', '07 - 5x', 'No credito', '2019-11-27 17:42:51', '2019-11-27 17:42:51'),
(157, 1, 'DEPOSITO', 238.65, 1241.65, 105087.13, 105325.78, 140, '2019-10-30', '07 - 5x', 'No credito', '2019-11-27 17:42:51', '2019-11-27 17:42:51'),
(158, 1, 'DEPOSITO', 238.65, 1241.65, 105325.78, 105564.43, 140, '2019-11-30', '07 - 5x', 'No credito', '2019-11-27 17:42:51', '2019-11-27 17:42:51'),
(159, 1, 'DEPOSITO', 238.65, 1241.65, 105564.43, 105803.08, 140, '2019-12-30', '07 - 5x', 'No credito', '2019-11-27 17:42:51', '2019-11-27 17:42:51'),
(160, 1, 'DEPOSITO', 238.33, 1240.00, 105803.08, 106041.41, 55, '2019-08-30', '07 - 5x', 'No credito', '2019-11-27 17:45:09', '2019-11-27 17:45:09'),
(161, 1, 'DEPOSITO', 238.33, 1240.00, 106041.41, 106279.74, 55, '2019-09-30', '07 - 5x', 'No credito', '2019-11-27 17:45:09', '2019-11-27 17:45:09'),
(162, 1, 'DEPOSITO', 238.33, 1240.00, 106279.74, 106518.07, 55, '2019-10-30', '07 - 5x', 'No credito', '2019-11-27 17:45:09', '2019-11-27 17:45:09'),
(163, 1, 'DEPOSITO', 238.33, 1240.00, 106518.07, 106756.40, 55, '2019-11-30', '07 - 5x', 'No credito', '2019-11-27 17:45:09', '2019-11-27 17:45:09'),
(164, 1, 'DEPOSITO', 238.33, 1240.00, 106756.40, 106994.73, 55, '2019-12-30', '07 - 5x', 'No credito', '2019-11-27 17:45:09', '2019-11-27 17:45:09'),
(165, 1, 'DEPOSITO', 191.24, 796.00, 106994.73, 107185.97, 139, '2019-09-05', '08- 4x', 'No credito', '2019-11-27 17:47:35', '2019-11-27 17:47:35'),
(166, 1, 'DEPOSITO', 191.24, 796.00, 107185.97, 107377.21, 139, '2019-10-05', '08- 4x', 'No credito', '2019-11-27 17:47:35', '2019-11-27 17:47:35'),
(167, 1, 'DEPOSITO', 191.24, 796.00, 107377.21, 107568.45, 139, '2019-11-05', '08- 4x', 'No credito', '2019-11-27 17:47:35', '2019-11-27 17:47:35'),
(168, 1, 'DEPOSITO', 191.24, 796.00, 107568.45, 107759.69, 139, '2019-12-05', '08- 4x', 'No credito', '2019-11-27 17:47:35', '2019-11-27 17:47:35');

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tiposclientes`
--

DROP TABLE IF EXISTS `tiposclientes`;
CREATE TABLE `tiposclientes` (
  `id` int(11) NOT NULL,
  `tipocli` int(255) DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tiposclientes`
--

INSERT INTO `tiposclientes` (`id`, `tipocli`, `descricao`) VALUES
(1, 1, 'CLIENTE'),
(3, 3, 'FUNCIONARIO/EMPRESA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `transferencias`
--

DROP TABLE IF EXISTS `transferencias`;
CREATE TABLE `transferencias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ativo` int(255) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `transferencias`
--

INSERT INTO `transferencias` (`id`, `nome`, `ativo`) VALUES
(1, 'Lucas Braga', 1),
(2, 'Clóvis Junior', 1),
(3, 'Matheus da Rosa', 1),
(4, 'Alex', 1),
(5, 'Maurício Borges', 1),
(6, 'Frank', 1),
(7, 'Marquinhos', 1),
(8, 'Felipe Cruz', 1),
(9, 'Pedro', 1),
(10, 'Hyago', 1),
(11, 'Angelo', 1),
(12, 'Dyoner', 1),
(13, 'Lucas Dandrea', 1),
(14, 'Dani Jr', 1),
(15, 'Bruna', 1),
(16, 'Carla', 1),
(20, 'Lucas Escobar', 1),
(21, 'Hyago', 1),
(22, 'Paloma', 1),
(23, 'William Veleda', 1),
(24, 'Laigner', 1),
(25, 'Francisco Luchsinger', 1),
(26, 'Lucas Costa', 1),
(27, 'Leonardo', 1),
(28, 'Cristian Dutra', 1),
(29, 'Lucas Ribeiro', 1),
(30, 'Rodrigo', 1),
(31, 'Afonso', 1),
(32, 'Giovane', 1),
(33, 'Daniel Barcelos', 1),
(34, 'Maicon Alexandre', 1),
(38, 'Douglas', 1),
(39, 'Letícia', 1),
(40, 'Jonny', 1),
(41, 'Gui Santos', 1),
(42, 'Lucas Mancio', 1),
(43, 'Rogério Ávila', 1),
(44, 'Daniel Poa Club', 1),
(45, 'Jonata', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `situacao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'ATIVO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `situacao`, `created_at`, `updated_at`) VALUES
(1, 'saulo fernandes', 'assisruas0495@gmail.com', NULL, '$2y$10$LV2B.K7f9p0SjhQUJJKaJenCz88jGp2U4YGcUmvb2nU83VY8E/Hti', NULL, 'Zu0UZH4rsWQhOuoPjHTWOhDuHVSs2PHUvkLVUCBr3fzdIX6PcFBx295c1sxV', 'ATIVO', '2019-11-09 17:50:17', '2020-08-07 14:41:35'),
(2, 'Tatiane', 'tati@inovebartenders.com.br', NULL, '$2y$10$hPx2hHlsxDF.zEVIXCH3Q.O1DzT9J675cFRtQIFZCgEjryomscrB.', NULL, 'vz7254mu99MgWi5MzOSJlDxPnrRq6Pthz2h6jYnIiFm42rQl2JkTcgDZF8om', 'ATIVO', '2019-11-12 18:03:56', '2022-09-01 01:44:16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `valores`
--

DROP TABLE IF EXISTS `valores`;
CREATE TABLE `valores` (
  `valor` double(255,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `valores`
--

INSERT INTO `valores` (`valor`) VALUES
(0.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `balancos`
--
ALTER TABLE `balancos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balancos_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `balancos_empresa_id_foreign` (`empresa_id`) USING BTREE;

--
-- Índices de tabela `cartoes`
--
ALTER TABLE `cartoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `historicos`
--
ALTER TABLE `historicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historicos_user_id_foreign` (`user_id`) USING BTREE;

--
-- Índices de tabela `historicos-bkp`
--
ALTER TABLE `historicos-bkp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historicos_user_id_foreign` (`user_id`) USING BTREE;

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `tiposclientes`
--
ALTER TABLE `tiposclientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `transferencias`
--
ALTER TABLE `transferencias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `balancos`
--
ALTER TABLE `balancos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cartoes`
--
ALTER TABLE `cartoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `historicos`
--
ALTER TABLE `historicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `historicos-bkp`
--
ALTER TABLE `historicos-bkp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tiposclientes`
--
ALTER TABLE `tiposclientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `transferencias`
--
ALTER TABLE `transferencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
