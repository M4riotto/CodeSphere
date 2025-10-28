-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/10/2025 às 20:24
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `codesphere`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `code` char(12) NOT NULL,
  `hours` decimal(5,1) NOT NULL DEFAULT 0.0,
  `issued_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(180) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `summary` text DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `thumbnail_url` varchar(255) DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `level` enum('beginner','intermediate','advanced') DEFAULT 'beginner',
  `language` varchar(20) DEFAULT 'pt-BR',
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `price_cents` int(10) UNSIGNED DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `courses`
--

INSERT INTO `courses` (`id`, `title`, `slug`, `summary`, `description`, `thumbnail_url`, `category_id`, `level`, `language`, `is_published`, `price_cents`, `created_at`, `updated_at`) VALUES
(24, 'PHP-OOP AVANÇADO', 'php-oop-avancado', 'ESSE CURSO VAI TE ENSINAR COMO PROGRAMAR COM PHP DO BÁSICO AO AVANÇADO EM 8HS', 'ESSE CURSO VAI TE ENSINAR COMO PROGRAMAR COM PHP DO BÁSICO AO AVANÇADO EM 8HS', NULL, 2, 'beginner', 'pt-BR', 1, 2310, '2025-10-28 14:39:10', NULL),
(25, 'PHP-OOP AVANÇADO', 'php-oop-avancado-2', 'ESSE CURSO VAI TE ENSINAR COMO PROGRAMAR COM PHP DO BÁSICO AO AVANÇADO EM 8HS', 'ESSE CURSO VAI TE ENSINAR COMO PROGRAMAR COM PHP DO BÁSICO AO AVANÇADO EM 8HS', NULL, 2, 'beginner', 'pt-BR', 1, 49790, '2025-10-28 14:39:18', '2025-10-28 15:55:52');

-- --------------------------------------------------------

--
-- Estrutura para tabela `course_categories`
--

CREATE TABLE `course_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `course_categories`
--

INSERT INTO `course_categories` (`id`, `name`, `slug`) VALUES
(1, 'Negócios', 'negocios'),
(2, 'Tecnologia', 'tecnologia'),
(3, 'Produtividade', 'produtividade');

-- --------------------------------------------------------

--
-- Estrutura para tabela `course_instructors`
--

CREATE TABLE `course_instructors` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `course_instructors`
--

INSERT INTO `course_instructors` (`course_id`, `user_id`) VALUES
(24, 2),
(25, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `course_modules`
--

CREATE TABLE `course_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(180) NOT NULL,
  `position` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `course_modules`
--

INSERT INTO `course_modules` (`id`, `course_id`, `title`, `position`, `created_at`, `updated_at`) VALUES
(28, 24, 'O que é OOP', 1, '2025-10-28 14:39:10', NULL),
(29, 24, 'Instalando XAMPP', 2, '2025-10-28 14:39:10', NULL),
(30, 25, 'O que é OOP', 1, '2025-10-28 14:39:18', NULL),
(31, 25, 'Instalando XAMPP', 2, '2025-10-28 14:39:18', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `course_reviews`
--

CREATE TABLE `course_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `course_tags`
--

CREATE TABLE `course_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `course_tags`
--

INSERT INTO `course_tags` (`id`, `tag`) VALUES
(1, 'alta performance'),
(2, 'networking'),
(3, 'vendas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `course_tag_map`
--

CREATE TABLE `course_tag_map` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ebooks`
--

CREATE TABLE `ebooks` (
  `cod_ebooks` bigint(20) UNSIGNED NOT NULL,
  `titulo_ebooks` varchar(200) NOT NULL,
  `descricao_ebooks` text DEFAULT NULL,
  `imagem_ebooks` varchar(255) DEFAULT NULL,
  `arquivo_ebooks` varchar(255) DEFAULT NULL,
  `status_ebooks` enum('Ativo','Inativo') NOT NULL DEFAULT 'Ativo',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ebooks`
--

INSERT INTO `ebooks` (`cod_ebooks`, `titulo_ebooks`, `descricao_ebooks`, `imagem_ebooks`, `arquivo_ebooks`, `status_ebooks`, `created_at`, `updated_at`) VALUES
(1, 'E-book: Rotina Vencedora', 'Guia prático de performance', 'rotina.jpg', 'rotina.pdf', 'Ativo', '2025-10-28 01:58:03', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('active','completed','canceled') NOT NULL DEFAULT 'active',
  `enrolled_at` datetime NOT NULL DEFAULT current_timestamp(),
  `completed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(220) NOT NULL,
  `content_html` mediumtext DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `duration_sec` int(10) UNSIGNED DEFAULT 0,
  `position` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `is_preview` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lessons`
--

INSERT INTO `lessons` (`id`, `module_id`, `title`, `slug`, `content_html`, `video_url`, `duration_sec`, `position`, `is_preview`, `created_at`, `updated_at`) VALUES
(50, 28, 'teste', 'teste', NULL, '', 0, 1, 0, '2025-10-28 14:39:10', NULL),
(51, 28, 'teste2', 'teste2', NULL, '', 0, 2, 0, '2025-10-28 14:39:10', NULL),
(52, 29, 'test22', 'test22', NULL, '', 0, 1, 0, '2025-10-28 14:39:10', NULL),
(53, 29, 'teste333', 'teste333', NULL, '', 0, 2, 0, '2025-10-28 14:39:10', NULL),
(54, 30, 'teste', 'teste', NULL, '', 0, 1, 0, '2025-10-28 14:39:18', NULL),
(55, 30, 'teste2', 'teste2', NULL, '', 0, 2, 0, '2025-10-28 14:39:18', NULL),
(56, 31, 'test22', 'test22', NULL, '', 0, 1, 0, '2025-10-28 14:39:18', NULL),
(57, 31, 'teste333', 'teste333', NULL, '', 0, 2, 0, '2025-10-28 14:39:18', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `lesson_assets`
--

CREATE TABLE `lesson_assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `kind` enum('file','link') NOT NULL DEFAULT 'file',
  `label` varchar(180) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `lesson_progress`
--

CREATE TABLE `lesson_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `watched_sec` int(10) UNSIGNED DEFAULT 0,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','paid','canceled','refunded') NOT NULL DEFAULT 'pending',
  `total_cents` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `gateway` varchar(50) DEFAULT NULL,
  `gateway_ref` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `item_type` enum('course','ebook') NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `title_snapshot` varchar(200) NOT NULL,
  `unit_cents` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `qty` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` char(64) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(190) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password_hash`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'admin@codesphere.local', '$2y$10$abcdefghijklmnopqrstuvABCDEFGHIJKLMNO1234567890abcd', 1, '2025-10-28 01:58:03', NULL),
(2, 'admin2@codesphere.local', '$2y$10$abcdefghijklmnopqrstuvABCDEFGHIJKLMNO1234567890abcd', 1, '2025-10-28 15:55:11', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_profiles`
--

CREATE TABLE `user_profiles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user_profiles`
--

INSERT INTO `user_profiles` (`user_id`, `full_name`, `avatar_url`, `bio`, `phone`, `city`, `state`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Admin Codesphere', NULL, 'CEO do codesphere', NULL, NULL, NULL, NULL, '2025-10-28 01:58:03', '2025-10-28 15:51:48'),
(2, 'Jóse da Silva Santos', NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-28 15:55:11', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_roles`
--

CREATE TABLE `user_roles` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `role_key` varchar(50) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_key`, `role_name`) VALUES
(1, 'admin', 'Administrador'),
(2, 'instructor', 'Instrutor'),
(3, 'student', 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_role_map`
--

CREATE TABLE `user_role_map` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user_role_map`
--

INSERT INTO `user_role_map` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `uk_cert_user_course` (`user_id`,`course_id`),
  ADD KEY `fk_cert_course` (`course_id`);

--
-- Índices de tabela `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_courses_category` (`category_id`),
  ADD KEY `idx_courses_published` (`is_published`);

--
-- Índices de tabela `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Índices de tabela `course_instructors`
--
ALTER TABLE `course_instructors`
  ADD PRIMARY KEY (`course_id`,`user_id`),
  ADD KEY `fk_ci_user` (`user_id`);

--
-- Índices de tabela `course_modules`
--
ALTER TABLE `course_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_modules_course_pos` (`course_id`,`position`);

--
-- Índices de tabela `course_reviews`
--
ALTER TABLE `course_reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_review` (`course_id`,`user_id`),
  ADD KEY `fk_rev_user` (`user_id`),
  ADD KEY `idx_rev_course` (`course_id`);

--
-- Índices de tabela `course_tags`
--
ALTER TABLE `course_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag` (`tag`);

--
-- Índices de tabela `course_tag_map`
--
ALTER TABLE `course_tag_map`
  ADD PRIMARY KEY (`course_id`,`tag_id`),
  ADD KEY `fk_ctm_tag` (`tag_id`);

--
-- Índices de tabela `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`cod_ebooks`),
  ADD KEY `idx_ebooks_status` (`status_ebooks`);

--
-- Índices de tabela `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_enrollment` (`user_id`,`course_id`),
  ADD KEY `fk_enr_course` (`course_id`),
  ADD KEY `idx_enr_status` (`status`);

--
-- Índices de tabela `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_lesson_module_slug` (`module_id`,`slug`),
  ADD KEY `idx_lessons_module_pos` (`module_id`,`position`);

--
-- Índices de tabela `lesson_assets`
--
ALTER TABLE `lesson_assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_assets_lesson` (`lesson_id`);

--
-- Índices de tabela `lesson_progress`
--
ALTER TABLE `lesson_progress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_progress` (`user_id`,`lesson_id`),
  ADD KEY `fk_lp_lesson` (`lesson_id`);

--
-- Índices de tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_orders_user` (`user_id`),
  ADD KEY `idx_orders_status` (`status`);

--
-- Índices de tabela `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_order_items_order` (`order_id`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_sessions_user_expires` (`user_id`,`expires_at`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`user_id`);

--
-- Índices de tabela `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_key` (`role_key`);

--
-- Índices de tabela `user_role_map`
--
ALTER TABLE `user_role_map`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `fk_role_map_role` (`role_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `course_modules`
--
ALTER TABLE `course_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `course_reviews`
--
ALTER TABLE `course_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `course_tags`
--
ALTER TABLE `course_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `cod_ebooks` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `lesson_assets`
--
ALTER TABLE `lesson_assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lesson_progress`
--
ALTER TABLE `lesson_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `fk_cert_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cert_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_courses_category` FOREIGN KEY (`category_id`) REFERENCES `course_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `course_instructors`
--
ALTER TABLE `course_instructors`
  ADD CONSTRAINT `fk_ci_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ci_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `course_modules`
--
ALTER TABLE `course_modules`
  ADD CONSTRAINT `fk_modules_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `course_reviews`
--
ALTER TABLE `course_reviews`
  ADD CONSTRAINT `fk_rev_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rev_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `course_tag_map`
--
ALTER TABLE `course_tag_map`
  ADD CONSTRAINT `fk_ctm_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ctm_tag` FOREIGN KEY (`tag_id`) REFERENCES `course_tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `fk_enr_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_enr_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `fk_lessons_module` FOREIGN KEY (`module_id`) REFERENCES `course_modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `lesson_assets`
--
ALTER TABLE `lesson_assets`
  ADD CONSTRAINT `fk_assets_lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `lesson_progress`
--
ALTER TABLE `lesson_progress`
  ADD CONSTRAINT `fk_lp_lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lp_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_items_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `fk_sessions_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `fk_user_profiles_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `user_role_map`
--
ALTER TABLE `user_role_map`
  ADD CONSTRAINT `fk_role_map_role` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_role_map_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
