-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 18/06/2024 às 22:44
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
-- Banco de dados: `sistemareceitas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `receitas`
--

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `receitas`
--

INSERT INTO `receitas` (`id`, `titulo`, `descricao`, `usuario_id`) VALUES
(5, 'TENMEFM', 'FEMOMKF', 0),
(6, '45', '2e3r3', 0),
(7, 'Bolo', 'Um bolo simples fofinho e quentinho com uma xícara de café pode ser tudo o que você precisa numa tarde chuvosa. E essa aqui é a receita que pode dar isso para você. Essa receita é bem simples e não leva muitos ingredientes. A massa branca pode ser usada com recheios de diferentes sabores e irá combinar com todos, já que não tem nenhum sabor dominante mais forte. Há quem diga que a massa branca é \"sem graça\", mas se você quiser, pode incrementar o bolo com alguma cobertura de brigadeiro, beijinho, leite condensado para dar mais sabor e deixar o bolo ainda mais molhadinho. Com bastante cuidado e pré-aquecendo o forno antes de colocar ele para assar, você consegue evitar que o bolo sole. Confira como fazer essa receita de bolo simples, também conhecido como bolo de farinha de trigo. Ele cai muito bem com um café quentinho!', 0),
(8, 'Bolo laranja', 'Bata as claras em neve, misture as gemas e o açúcar e torne a bater.\r\n\r\n2\r\nDepois, misture a farinha e o suco de laranja.\r\n\r\n3\r\nPor último acrescente o fermento.\r\n\r\n4\r\nLeve ao forno para assar em forma untada e polvilhada por cerca de 40 minutos em 180°C (dependendo do forno).', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
