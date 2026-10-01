-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/08/2025 às 03:23
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `save_date`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_convidado`
--

CREATE TABLE `tab_convidado` (
  `id` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `celular` varchar(12) NOT NULL,
  `data_cadastro` varchar(10) NOT NULL,
  `chave` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tab_convidado`
--

INSERT INTO `tab_convidado` (`id`, `nome`, `celular`, `data_cadastro`, `chave`) VALUES
(1, 'ALEXANDRE VASCONCELOS', '85-988965156', '20/08/2025', '1223'),
(2, 'TIAGO FREITAS VASCONCELOS', '85-999541718', '20/08/2025', '5440'),
(4, 'LEILA', '85-988986666', '21/08/2025', '1223'),
(5, 'DANILO', '85-989744544', '21/08/2025', '1223'),
(6, 'FOFA FREITAS', '85-988965100', '21/08/2025', '1223'),
(7, 'ANDRE MORAIS', '85-988965111', '21/08/2025', '1223'),
(8, 'ANDRE MORAIS', '85-988965111', '21/08/2025', '5440'),
(10, 'JOãO INáCIO', '85-999885152', '25/08/2025', '1223'),
(11, 'ALEXANDRE SILVA', '85-988965151', '29/08/2025', '1223'),
(12, 'PAULO OLIVEIRA', '85-999887744', '29/08/2025', '5440');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_evento`
--

CREATE TABLE `tab_evento` (
  `id` int(5) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `chave` varchar(5) NOT NULL,
  `celebrante` varchar(50) NOT NULL,
  `data` varchar(10) NOT NULL,
  `comemoracao` varchar(50) NOT NULL,
  `local` varchar(50) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `mapa` text NOT NULL,
  `anexo` varchar(50) NOT NULL,
  `url_instagram` varchar(50) NOT NULL,
  `url_facebook` varchar(50) NOT NULL,
  `url_tiktok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tab_evento`
--

INSERT INTO `tab_evento` (`id`, `id_usuario`, `chave`, `celebrante`, `data`, `comemoracao`, `local`, `endereco`, `mapa`, `anexo`, `url_instagram`, `url_facebook`, `url_tiktok`) VALUES
(1, 2, '1223', 'Mariana Galdino', '15/10/2025', '15 Anos', 'Brincadeiro Buffet', 'Rua General Piragibe, 797 - Parquelândia, Fortaleza - CE', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7962.629743565753!2d-38.56640660642092!3d-3.7414141000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7c74982ffe85ea1%3A0x689be6da447ad3fb!2sBrincadeiro%20Buffet!5e0!3m2!1spt-PT!2sbr!4v1756240202513!5m2!1spt-PT!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '927075523-capa-duda15.jpg', 'https://www.instagram.com/via85radio/', 'https://www.facebook.com/via85radioweb', 'https://www.tiktok.com/@quiz_do_chris'),
(2, 3, '5440', 'Clara e Marcos', '22/11/2025', 'Casamento', 'Arrudas Buffet', 'Rua General Piragibe, 838 - Parquelândia, Fortaleza - CE', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7962.629743565753!2d-38.56640660642092!3d-3.7414141000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7c749b08ef80de9%3A0xe3db946b9d61cc1b!2sArrudas%20Buffet!5e0!3m2!1spt-PT!2sbr!4v1756240375861!5m2!1spt-PT!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '699048161-clara-e-marcos.jpg', 'https://www.instagram.com/via85radio', 'https://www.facebook.com/via85radioweb', 'https://www.tiktok.com/@quiz_do_chris'),
(3, 4, '5512', 'Tiago Freitas Vasconcelos', '10/10/2025', 'Aniversario de 40 anos', 'Spazio Buffet', 'Rua teste', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_pagamento`
--

CREATE TABLE `tab_pagamento` (
  `id` int(5) NOT NULL,
  `preco` varchar(10) NOT NULL,
  `periodo_mes` varchar(2) NOT NULL,
  `status` int(1) NOT NULL,
  `data` varchar(10) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `id_evento` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tab_pagamento`
--

INSERT INTO `tab_pagamento` (`id`, `preco`, `periodo_mes`, `status`, `data`, `id_usuario`, `id_evento`) VALUES
(1, '360.00', '3', 1, '29/08/2025', 2, 1),
(2, '99.00', '1', 1, '30/08/2025', 3, 2),
(3, '240.00', '2', 1, '30/08/2025', 4, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_usuario`
--

CREATE TABLE `tab_usuario` (
  `id` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(70) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `data_cadastro` varchar(20) NOT NULL,
  `tipo` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tab_usuario`
--

INSERT INTO `tab_usuario` (`id`, `nome`, `cpf`, `email`, `senha`, `telefone`, `data_cadastro`, `tipo`, `status`) VALUES
(1, 'Galeria Design e Web', '55517366368', 'galeriaeg@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '85-988965156', '23/03/2025', 1, 1),
(2, 'Mariana Galdino', '44166447017', 'marianag@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '85-998558574', '05/05/2025', 2, 1),
(3, 'Clara Santos', '22990562036', 'clarasantos@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '85-986860781', '10/03/2025', 2, 1),
(4, 'Tiago de Freitas', '22254477414', 'tiago@terra.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '85-988960011', '21/05/2025', 2, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tab_convidado`
--
ALTER TABLE `tab_convidado`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tab_evento`
--
ALTER TABLE `tab_evento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tab_pagamento`
--
ALTER TABLE `tab_pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_convidado`
--
ALTER TABLE `tab_convidado`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tab_evento`
--
ALTER TABLE `tab_evento`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tab_pagamento`
--
ALTER TABLE `tab_pagamento`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
