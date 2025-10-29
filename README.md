
# 📝 Documentação do Projeto To-Do List

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Logo Laravel">
  </a>
</p>

---

## 🔹 Visão Geral

Aplicação **To-Do List** desenvolvida com **Laravel 10**, utilizando **TailwindCSS** para o frontend.
Funcionalidades principais:

* Autenticação de usuários (login, perfil)
* Gestão de tarefas (criar, atualizar, excluir, restaurar)
* Filtragem de tarefas por status
* API RESTful para usuários e tarefas
* Ambiente de desenvolvimento Dockerizado com PHP, Nginx, Node, Tailwind e MySQL

---

## 🛠 Tecnologias Utilizadas

* **Backend:** Laravel 10, PHP 8+
* **Frontend:** Blade Templates + TailwindCSS
* **Banco de dados:** MySQL 8
* **Containers:** Docker + Docker Compose
* **Node.js:** Compilação do TailwindCSS e Vite

---

## 📦 Arquitetura / Diagrama

* O **Nginx** recebe requisições HTTP.
* Arquivos PHP são processados pelo **PHP-FPM** e Laravel.
* Banco de dados **MySQL** armazena usuários e tarefas.
* **Node.js** compila CSS e JS (Tailwind + Vite) e grava em `public/` para ser servido pelo Nginx.

---

## 🚀 Como Rodar Localmente

1. Clonar o repositório:

```bash
git clone https://github.com/alisson-C-angular-php/to-do-list.git
cd to-do-list
```

2. Iniciar containers:

```bash
docker-compose up --build
```

3. Acessar:

* **Frontend:** [http://localhost:8000](http://localhost:8000)
* **phpMyAdmin:** [http://localhost:8080](http://localhost:8080)

> O TailwindCSS é compilado automaticamente dentro do container Node.

---

## 🧩 Rotas Web (Blade)

| Método | URI                     | Controlador                 | Middleware     | Descrição                               |
| ------ | ----------------------- | --------------------------- | -------------- | --------------------------------------- |
| GET    | `/`                     | Redireciona para login      | —              | Página inicial                          |
| GET    | `/dashboard`            | —                           | auth, verified | Dashboard do usuário                    |
| GET    | `/profile`              | `ProfileController@edit`    | auth           | Editar perfil                           |
| PATCH  | `/profile`              | `ProfileController@update`  | auth           | Atualizar perfil                        |
| DELETE | `/profile`              | `ProfileController@destroy` | auth           | Excluir perfil                          |
| GET    | `/tasks/{status?}`      | `TaskController@index`      | auth           | Listar tarefas, opcionalmente filtradas |
| GET    | `/tasks/create`         | `TaskController@create`     | auth           | Formulário de criação de tarefa         |
| POST   | `/tasks`                | `TaskController@store`      | auth           | Criar tarefa                            |
| GET    | `/tasks/{task}/edit`    | `TaskController@edit`       | auth           | Editar tarefa                           |
| PUT    | `/tasks/{task}`         | `TaskController@update`     | auth           | Atualizar tarefa                        |
| DELETE | `/tasks/{task}`         | `TaskController@destroy`    | auth           | Excluir tarefa                          |
| PATCH  | `/tasks/{task}/restore` | `TaskController@restore`    | auth           | Restaurar tarefa excluída               |

---

## 🧩 Rotas API

### Usuários

| Método | Endpoint          | Método Controlador         | Descrição             | Exemplo de Payload                                                    |
| ------ | ----------------- | -------------------------- | --------------------- | --------------------------------------------------------------------- |
| GET    | `/api/user`       | `UserController@lista`     | Listar todos usuários | —                                                                     |
| POST   | `/api/user/criar` | `UserController@store`     | Criar usuário         | `{ "name": "Alisson", "email": "a@email.com", "password": "123456" }` |
| PUT    | `/api/user/{id}`  | `UserController@atualizar` | Atualizar usuário     | `{ "name": "Novo Nome" }`                                             |
| DELETE | `/api/user/{id}`  | `UserController@delete`    | Excluir usuário       | —                                                                     |

### Autenticação

| Método | Endpoint          | Método Controlador      | Descrição                    | Exemplo de Payload                                 |
| ------ | ----------------- | ----------------------- | ---------------------------- | -------------------------------------------------- |
| POST   | `/api/auth/login` | `LoginController@login` | Login e retorno de token JWT | `{ "email": "a@email.com", "password": "123456" }` |

### Tarefas

| Método | Endpoint                       | Método Controlador                | Descrição                  | Exemplo de Payload                                                               |
| ------ | ------------------------------ | --------------------------------- | -------------------------- | -------------------------------------------------------------------------------- |
| GET    | `/api/tarefas`                 | `TaskController@lista`            | Listar todas as tarefas    | —                                                                                |
| GET    | `/api/tarefas/status/{status}` | `TaskController@filtrarPorStatus` | Filtrar tarefas por status | —                                                                                |
| POST   | `/api/tarefas`                 | `TaskController@criar`            | Criar nova tarefa          | `{ "titulo": "Comprar pão", "descricao": "Ir à padaria", "status": "pendente" }` |
| PUT    | `/api/tarefas/{id}`            | `TaskController@atualizar`        | Atualizar tarefa           | `{ "titulo": "Nova tarefa", "status": "concluída" }`                             |

---

## 💡 Funcionalidades

* **CRUD completo de tarefas**
* **Filtragem por status**
* **Autenticação de usuário**
* **TailwindCSS** integrado com Laravel
* **Dockerizado**, pronto para desenvolvimento e deploy
* API RESTful documentada

---

## 🔧 Observações

* O CSS gerado pelo Tailwind está em `public/css/app.css` e servido diretamente pelo Nginx.
* API endpoints são prefixados com `/api`.
* Utilize Postman ou Insomnia para testar os endpoints API.
* Todos os containers devem estar em execução para o sistema funcionar corretamente.

