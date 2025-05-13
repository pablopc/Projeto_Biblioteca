
# 📚 Sistema de Biblioteca - PHP & MySQL

Este é um sistema de gerenciamento de biblioteca desenvolvido em PHP com banco de dados MySQL. O projeto permite cadastrar e gerenciar livros, usuários, atendentes, categorias e empréstimos. Ideal para fins acadêmicos e aprendizado de CRUD com PHP.

---

## 🧩 Funcionalidades

- ✅ Cadastro, edição e exclusão de:
  - Categorias
  - Livros
  - Usuários
  - Atendentes
  - Empréstimos
- 🔐 Login de acesso
- 📄 Interface simples com Bootstrap

---

## 🗂️ Estrutura do Projeto

```
Projeto_Biblioteca/
├── banco/
│   ├── biblioteca_2025.sql
├── css/
├── config.php
├── index.php
├── *.php (páginas do sistema)
└── README.md
```

---

## 🚀 Como executar o sistema localmente

### ✅ Requisitos

- PHP 8.x ou superior
- MySQL ou MariaDB
- Apache (XAMPP, WAMP ou similar)

### 🧪 Passo a passo

1. **Clone o repositório ou baixe como .zip:**

```bash
git clone https://github.com/seu-usuario/Projeto_Biblioteca.git
```

2. **Coloque a pasta do projeto em `htdocs` do XAMPP:**

```
C:/xampp/htdocs/Projeto_Biblioteca
```

3. **Crie o banco de dados:**

- Acesse o `phpMyAdmin`
- Crie um banco com o nome: `biblioteca_2025`
- Vá em **Importar** e envie:
  - `banco/biblioteca_2025_estrutura.sql`

4. **Acesse no navegador:**

```
http://localhost/Projeto_Biblioteca/login.php
```

---

## 🔐 Login de exemplo

- Email: `admin@email.com`
- Senha: *(senha criptografada, edite diretamente pelo banco se quiser testar o login)*

---

## 🧑‍💻 Tecnologias utilizadas

- PHP
- MySQL
- Bootstrap 5
- HTML/CSS

---

## 👨‍🎓 Desenvolvido por

**Leonardo Gomes Madureira**
**Pablo Pereira de Carvalho**  
Curso: Análise e Desenvolvimento de Sistemas

---
