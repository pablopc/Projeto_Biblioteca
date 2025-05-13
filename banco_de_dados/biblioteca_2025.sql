
-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS biblioteca_2025;
USE biblioteca_2025;

-- Tabela: atendente
CREATE TABLE `atendente` (
  `id_atendente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_atendente` varchar(45) DEFAULT NULL,
  `cpf_atendente` varchar(14) DEFAULT NULL,
  `email_atendente` varchar(45) DEFAULT NULL,
  `fone_atendente` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_atendente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabela: categoria
CREATE TABLE `categoria` (
  `id_categoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabela: usuario
CREATE TABLE `usuario` (
  `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(45) DEFAULT NULL,
  `email_usuario` varchar(45) DEFAULT NULL,
  `fone_usuario` varchar(45) DEFAULT NULL,
  `cpf_usuario` varchar(14) DEFAULT NULL,
  `dt_nasc_usuario` date DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabela: livro
CREATE TABLE `livro` (
  `id_livro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoria_id_categoria` int(10) UNSIGNED NOT NULL,
  `titulo_livro` varchar(45) DEFAULT NULL,
  `autor_livro` varchar(45) DEFAULT NULL,
  `editora_livro` varchar(45) DEFAULT NULL,
  `edicao_livro` char(3) DEFAULT NULL,
  `localidade_livro` varchar(45) DEFAULT NULL,
  `ano_livro` year(4) DEFAULT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `livro_FKIndex1` (`categoria_id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabela: emprestimo
CREATE TABLE `emprestimo` (
  `livro_id_livro` int(10) UNSIGNED NOT NULL,
  `usuario_id_usuario` int(10) UNSIGNED NOT NULL,
  `atendente_id_atendente` int(10) UNSIGNED NOT NULL,
  `data_emprestimo` date DEFAULT NULL,
  `data_devolucao` date DEFAULT NULL,
  PRIMARY KEY (`livro_id_livro`, `usuario_id_usuario`),
  KEY `livro_has_usuario_FKIndex1` (`livro_id_livro`),
  KEY `livro_has_usuario_FKIndex2` (`usuario_id_usuario`),
  KEY `emprestimo_FKIndex3` (`atendente_id_atendente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabela: usuarios (login do sistema)
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
