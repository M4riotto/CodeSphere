-- Ajustes iniciais
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- =========================================================
-- AUTH / USUÁRIOS
-- =========================================================
CREATE TABLE users (
  id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email           VARCHAR(190) NOT NULL UNIQUE,
  password_hash   VARCHAR(255) NOT NULL,
  is_active       TINYINT(1) NOT NULL DEFAULT 1,
  created_at      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at      DATETIME NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE user_profiles (
  user_id         BIGINT UNSIGNED PRIMARY KEY,
  full_name       VARCHAR(150) NOT NULL,
  avatar_url      VARCHAR(255) NULL,
  bio             TEXT NULL,
  phone           VARCHAR(30) NULL,
  city            VARCHAR(100) NULL,
  state           VARCHAR(100) NULL,
  country         VARCHAR(100) NULL,
  created_at      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at      DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_user_profiles_user
    FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE user_roles (
  id              TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  role_key        VARCHAR(50) NOT NULL UNIQUE,  -- admin, instructor, student
  role_name       VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE user_role_map (
  user_id         BIGINT UNSIGNED NOT NULL,
  role_id         TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY (user_id, role_id),
  CONSTRAINT fk_role_map_user FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_role_map_role FOREIGN KEY (role_id) REFERENCES user_roles(id)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE sessions (
  id              CHAR(64) PRIMARY KEY,
  user_id         BIGINT UNSIGNED NOT NULL,
  ip_address      VARCHAR(45) NULL,
  user_agent      VARCHAR(255) NULL,
  created_at      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  expires_at      DATETIME NOT NULL,
  CONSTRAINT fk_sessions_user FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  INDEX idx_sessions_user_expires (user_id, expires_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================================
-- CATÁLOGO DE CURSOS
-- =========================================================
CREATE TABLE course_categories (
  id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name            VARCHAR(120) NOT NULL,
  slug            VARCHAR(150) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE courses (
  id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title           VARCHAR(180) NOT NULL,
  slug            VARCHAR(200) NOT NULL UNIQUE, -- p/ URL limpa: /courses/{slug}
  summary         TEXT NULL,
  description     MEDIUMTEXT NULL,
  thumbnail_url   VARCHAR(255) NULL,
  category_id     INT UNSIGNED NULL,
  level           ENUM('beginner','intermediate','advanced') DEFAULT 'beginner',
  language        VARCHAR(20) DEFAULT 'pt-BR',
  is_published    TINYINT(1) NOT NULL DEFAULT 0,
  price_cents     INT UNSIGNED DEFAULT 0,  -- 0 = gratuito
  created_at      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at      DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_courses_category FOREIGN KEY (category_id) REFERENCES course_categories(id)
    ON DELETE SET NULL ON UPDATE CASCADE,
  INDEX idx_courses_category (category_id),
  INDEX idx_courses_published (is_published)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE course_instructors (
  course_id       BIGINT UNSIGNED NOT NULL,
  user_id         BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (course_id, user_id),
  CONSTRAINT fk_ci_course FOREIGN KEY (course_id) REFERENCES courses(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_ci_user FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE course_modules (
  id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  course_id       BIGINT UNSIGNED NOT NULL,
  title           VARCHAR(180) NOT NULL,
  position        INT UNSIGNED NOT NULL DEFAULT 1,
  created_at      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at      DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_modules_course FOREIGN KEY (course_id) REFERENCES courses(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  INDEX idx_modules_course_pos (course_id, position)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE lessons (
  id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  module_id       BIGINT UNSIGNED NOT NULL,
  title           VARCHAR(200) NOT NULL,
  slug            VARCHAR(220) NOT NULL,
  content_html    MEDIUMTEXT NULL,
  video_url       VARCHAR(255) NULL,
  duration_sec    INT UNSIGNED DEFAULT 0,
  position        INT UNSIGNED NOT NULL DEFAULT 1,
  is_preview      TINYINT(1) NOT NULL DEFAULT 0,
  created_at      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at      DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_lessons_module FOREIGN KEY (module_id) REFERENCES course_modules(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  UNIQUE KEY uk_lesson_module_slug (module_id, slug),
  INDEX idx_lessons_module_pos (module_id, position)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE lesson_assets (
  id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  lesson_id       BIGINT UNSIGNED NOT NULL,
  kind            ENUM('file','link') NOT NULL DEFAULT 'file',
  label           VARCHAR(180) NOT NULL,
  url             VARCHAR(255) NOT NULL,
  created_at      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_assets_lesson FOREIGN KEY (lesson_id) REFERENCES lessons(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  INDEX idx_assets_lesson (lesson_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE course_tags (
  id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  tag             VARCHAR(60) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE course_tag_map (
  course_id       BIGINT UNSIGNED NOT NULL,
  tag_id          INT UNSIGNED NOT NULL,
  PRIMARY KEY (course_id, tag_id),
  CONSTRAINT fk_ctm_course FOREIGN KEY (course_id) REFERENCES courses(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_ctm_tag FOREIGN KEY (tag_id) REFERENCES course_tags(id)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================================
-- EXPERIÊNCIA DO ALUNO
-- =========================================================
CREATE TABLE enrollments (
  id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id         BIGINT UNSIGNED NOT NULL,
  course_id       BIGINT UNSIGNED NOT NULL,
  status          ENUM('active','completed','canceled') NOT NULL DEFAULT 'active',
  enrolled_at     DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  completed_at    DATETIME NULL,
  UNIQUE KEY uk_enrollment (user_id, course_id),
  CONSTRAINT fk_enr_user FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_enr_course FOREIGN KEY (course_id) REFERENCES courses(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  INDEX idx_enr_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE lesson_progress (
  id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id         BIGINT UNSIGNED NOT NULL,
  lesson_id       BIGINT UNSIGNED NOT NULL,
  watched_sec     INT UNSIGNED DEFAULT 0,
  is_completed    TINYINT(1) NOT NULL DEFAULT 0,
  updated_at      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY uk_progress (user_id, lesson_id),
  CONSTRAINT fk_lp_user FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_lp_lesson FOREIGN KEY (lesson_id) REFERENCES lessons(id)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE course_reviews (
  id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  course_id       BIGINT UNSIGNED NOT NULL,
  user_id         BIGINT UNSIGNED NOT NULL,
  rating          TINYINT UNSIGNED NOT NULL, -- 1..5
  comment         TEXT NULL,
  created_at      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uk_review (course_id, user_id),
  CONSTRAINT fk_rev_course FOREIGN KEY (course_id) REFERENCES courses(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_rev_user FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  INDEX idx_rev_course (course_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE certificates (
  id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id         BIGINT UNSIGNED NOT NULL,
  course_id       BIGINT UNSIGNED NOT NULL,
  code            CHAR(12) NOT NULL UNIQUE, -- ex: AB12-CD34-EF56
  hours           DECIMAL(5,1) NOT NULL DEFAULT 0.0,
  issued_at       DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_cert_user FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_cert_course FOREIGN KEY (course_id) REFERENCES courses(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  UNIQUE KEY uk_cert_user_course (user_id, course_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================================
-- BIBLIOTECA / EBOOKS
-- (compatível com seu fetch: status_ebooks, descricao_ebooks, cod_ebooks, imagem_ebooks)
-- =========================================================
CREATE TABLE ebooks (
  cod_ebooks          BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  titulo_ebooks       VARCHAR(200) NOT NULL,
  descricao_ebooks    TEXT NULL,
  imagem_ebooks       VARCHAR(255) NULL, -- capa
  arquivo_ebooks      VARCHAR(255) NULL, -- PDF/EPUB
  status_ebooks       ENUM('Ativo','Inativo') NOT NULL DEFAULT 'Ativo',
  created_at          DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at          DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_ebooks_status (status_ebooks)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================================
-- PAGAMENTOS (Opcional – para quando quiser cobrar)
-- =========================================================
CREATE TABLE orders (
  id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id         BIGINT UNSIGNED NOT NULL,
  status          ENUM('pending','paid','canceled','refunded') NOT NULL DEFAULT 'pending',
  total_cents     INT UNSIGNED NOT NULL DEFAULT 0,
  gateway         VARCHAR(50) NULL,           -- ex.: asaas, stripe, pix
  gateway_ref     VARCHAR(100) NULL,          -- id da cobrança no gateway
  created_at      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at      DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_orders_user FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  INDEX idx_orders_user (user_id),
  INDEX idx_orders_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE order_items (
  id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  order_id        BIGINT UNSIGNED NOT NULL,
  item_type       ENUM('course','ebook') NOT NULL,
  item_id         BIGINT UNSIGNED NOT NULL,
  title_snapshot  VARCHAR(200) NOT NULL,
  unit_cents      INT UNSIGNED NOT NULL DEFAULT 0,
  qty             INT UNSIGNED NOT NULL DEFAULT 1,
  CONSTRAINT fk_order_items_order FOREIGN KEY (order_id) REFERENCES orders(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  INDEX idx_order_items_order (order_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;

-- =========================================================
-- SEEDS BÁSICOS
-- =========================================================
INSERT INTO user_roles (role_key, role_name) VALUES
('admin','Administrador'),
('instructor','Instrutor'),
('student','Aluno');

INSERT INTO course_categories (name, slug) VALUES
('Negócios','negocios'),
('Tecnologia','tecnologia'),
('Produtividade','produtividade');

INSERT INTO course_tags (tag) VALUES ('alta performance'), ('networking'), ('vendas');

-- Usuário admin (substitua o hash depois)
INSERT INTO users (email, password_hash) VALUES
('admin@codesphere.local', '$2y$10$abcdefghijklmnopqrstuvABCDEFGHIJKLMNO1234567890abcd'); -- bcrypt fake

INSERT INTO user_profiles (user_id, full_name) VALUES (1, 'Admin Codesphere');

INSERT INTO user_role_map (user_id, role_id) VALUES (1, 1); -- admin

-- Curso demo
INSERT INTO courses (title, slug, summary, is_published, price_cents, category_id)
VALUES ('Curso de Alta Performance Profissional', 'alta-performance', 'Domine foco, energia e execução.', 1, 0, 1);

INSERT INTO course_instructors (course_id, user_id) VALUES (1, 1);

INSERT INTO course_modules (course_id, title, position) VALUES
(1, 'Fundamentos', 1),
(1, 'Execução', 2);

INSERT INTO lessons (module_id, title, slug, content_html, position, is_preview)
VALUES
(1, 'Boas-vindas', 'boas-vindas', '<p>Bem-vindo!</p>', 1, 1),
(1, 'Pilares da Alta Performance', 'pilares', '<p>8 pilares…</p>', 2, 0),
(2, 'Rotina Vencedora', 'rotina-vencedora', '<p>Hábito & ritmo…</p>', 1, 0);

INSERT INTO ebooks (titulo_ebooks, descricao_ebooks, imagem_ebooks, arquivo_ebooks, status_ebooks)
VALUES ('E-book: Rotina Vencedora', 'Guia prático de performance', 'rotina.jpg', 'rotina.pdf', 'Ativo');
