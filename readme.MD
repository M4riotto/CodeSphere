# 🌐 Codesphere Platform

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.4-38B2AC?style=for-the-badge&logo=tailwindcss&logoColor=white)
![Clean Architecture](https://img.shields.io/badge/Clean%20Architecture-Active-8A2BE2?style=for-the-badge)

> **Codesphere** é uma plataforma moderna e modular de **educação e performance profissional**, desenvolvida em PHP com Clean Architecture, utilizando **Tailwind CSS** e **MySQL**.  
> O sistema permite gerenciar cursos, módulos, aulas, ebooks, progresso do aluno e certificados — tudo com URLs limpas e código escalável.

---

## 🧭 Índice
- [🚀 Tecnologias](#-tecnologias)
- [📂 Estrutura do Projeto](#-estrutura-do-projeto)
- [⚙️ Instalação Local](#️-instalação-local)
- [🗃️ Banco de Dados](#️-banco-de-dados)
- [💡 Funcionalidades Principais](#-funcionalidades-principais)
- [🧱 Arquitetura Limpa](#-arquitetura-limpa)
- [📸 Pré-visualização](#-pré-visualização)
- [🧑‍💻 Contribuindo](#-contribuindo)
- [📄 Licença](#-licença)

---

## 🚀 Tecnologias
| Tecnologia | Descrição |
|-------------|------------|
| 🧩 **PHP 8.2+** | Backend leve e estruturado em Clean Architecture |
| 🎨 **Tailwind CSS** | Interface moderna e responsiva |
| 🧠 **JavaScript (ES6)** | Dinamismo no frontend |
| 🗄️ **MySQL 8+** | Banco de dados relacional |
| ⚙️ **Flowbite** | Componentes UI com integração direta ao Tailwind |
| 📜 **.htaccess (Apache)** | URLs limpas sem extensões `.php` |

---

## 📂 Estrutura do Projeto
\`\`\`
codesphere/
├── app/
│   ├── core/                # Entidades e Regras de Negócio
│   ├── infra/               # Conexão com banco e implementações
│   ├── repositories/        # Interfaces dos repositórios
│   ├── usecases/            # Casos de uso (lógica principal)
│   └── routes/              # Endpoints PHP (ex: getCourses.php)
│
├── public/
│   ├── assets/              # CSS, JS e imagens
│   ├── pages/               # Páginas PHP renderizadas (courses.php, ebooks.php etc.)
│   ├── uploads/             # Uploads e arquivos de mídia
│   ├── .htaccess            # URLs limpas e redirecionamentos
│   └── index.php            # Ponto de entrada
│
├── config/
│   ├── db.php               # Conexão PDO com MySQL
│   └── settings.php         # Variáveis globais
│
├── database/
│   └── schema.sql           # Estrutura completa do banco de dados
│
├── README.md
└── LICENSE
\`\`\`

---

## ⚙️ Instalação Local

### 1️⃣ Clonar o repositório
\`\`\`bash
git clone https://github.com/seuusuario/codesphere.git
cd codesphere
\`\`\`

### 2️⃣ Configurar ambiente no XAMPP
- Copie a pasta `codesphere` para `C:\xampp\htdocs\`
- Acesse no navegador:  
  👉 `http://localhost/codesphere/`

### 3️⃣ Criar o banco de dados
Abra o phpMyAdmin e rode o script localizado em:
\`\`\`
database/schema.sql
\`\`\`

### 4️⃣ Ajustar conexão
Edite o arquivo `config/db.php`:
\`\`\`php
$pdo = new PDO('mysql:host=localhost;dbname=codesphere;charset=utf8mb4', 'root', '');
\`\`\`

### 5️⃣ Verificar URLs limpas
O `.htaccess` já remove `.php` e busca páginas dentro de `public/pages/`.  
Exemplo:
\`\`\`
http://localhost/codesphere/courses  →  public/pages/courses.php
\`\`\`

---

## 🗃️ Banco de Dados
O sistema foi projetado para EAD e performance profissional:

- **users / user_profiles** – autenticação e perfis  
- **courses / lessons / modules** – estrutura modular dos cursos  
- **ebooks** – biblioteca digital  
- **enrollments / progress / certificates** – jornada e resultados do aluno  
- **orders** – base para integração de pagamentos futuros  

📘 SQL completo disponível em: `database/schema.sql`

---

## 💡 Funcionalidades Principais

| 💻 Módulo | Descrição |
|------------|------------|
| 🎓 **Cursos** | Criação e exibição de cursos com módulos e aulas |
| 📚 **E-books** | Biblioteca de downloads para estudo |
| 🧩 **Matrículas** | Controle de alunos, progresso e certificados |
| 🧾 **Certificados** | Geração automática após conclusão |
| ⚡ **Clean URLs** | Acesso sem extensão .php (via `.htaccess`) |
| 🎨 **Design Responsivo** | Interface moderna com Tailwind e Flowbite |
| 🔐 **Login Seguro** | Sistema com hash Bcrypt e sessões persistentes |

---

## 🧱 Arquitetura Limpa
O projeto segue a filosofia **Clean Architecture**, separando **domínio**, **dados** e **interfaces**.

\`\`\`mermaid
graph TD;
    A[Rotas (routes)] --> B[UseCases];
    B --> C[Repositorios (Interfaces)];
    C --> D[Infra/DB];
    D --> E[(MySQL)];
    B --> F[Entidades (Entities)];
\`\`\`

🔹 Cada camada tem uma responsabilidade única  
🔹 Fácil manutenção e testes  
🔹 Sem dependência de frameworks externos

---

## 📸 Pré-visualização
<div align="center">
  <img src="https://cdn.dribbble.com/users/1162077/screenshots/15642227/media/3f54c5d6a84e1d20aeb8e9df36a232cf.png" width="80%" alt="Dashboard Preview" />
  <br>
  <sub>Exemplo de interface moderna e minimalista baseada em Tailwind</sub>
</div>

---

## 🧑‍💻 Contribuindo
Contribuições são bem-vindas!  
Abra um **pull request** com melhorias, correções ou novas funcionalidades.

---

## 📄 Licença
Este projeto está sob a licença **MIT** — você pode usar e modificar livremente, desde que cite a autoria original.

---

<p align="center">
  Feito com ❤️ por <b>Vítor Mariotto</b> <br>
</p>
