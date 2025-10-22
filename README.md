# Sistema Laravel API - Quiz Escolar

Este projeto é uma API desenvolvida em **Laravel** para gerenciamento de alunos, professores, turmas, questões e administradores. A API pode ser estendida para incluir autenticação via **Laravel Sanctum**, mas atualmente possui endpoints públicos para testes.

---

## Tecnologias utilizadas

- Laravel 10
- PHP 8.x
- MySQL / MariaDB
- Composer
- Laravel Sanctum (opcional para autenticação futura)

---

## Funcionalidades

- CRUD completo para:
  - Administradores (`Admin`)
  - Alunos (`Aluno`)
  - Professores (`Professor`)
  - Turmas (`Turma`)
  - Questões (`Questoes`)
- Relacionamento entre professores e turmas (`ProfessorTurma`)
- Endpoint de status da API para verificação

---

## Endpoints da API

### Status da API

- `GET /status`  
  Retorna se a API está rodando corretamente.

**Exemplo de resposta:**

```json
{
  "success": true,
  "data": "Api is running"
}

Administradores (admin)

CRUD completo via apiResource:

    GET /admin → Listar todos os administradores

    POST /admin → Criar um administrador

    GET /admin/{id} → Visualizar administrador específico

    PUT /admin/{id} → Atualizar administrador

    DELETE /admin/{id} → Deletar administrador

Alunos (aluno)

CRUD completo via apiResource:

    GET /aluno → Listar todos os alunos

    POST /aluno → Criar um aluno

    GET /aluno/{id} → Visualizar aluno específico

    PUT /aluno/{id} → Atualizar aluno

    DELETE /aluno/{id} → Deletar aluno

Professores (professor)

CRUD completo via apiResource:

    GET /professor → Listar todos os professores

    POST /professor → Criar um professor

    GET /professor/{id} → Visualizar professor específico

    PUT /professor/{id} → Atualizar professor

    DELETE /professor/{id} → Deletar professor

Relacionamento Professor ↔ Turma (professor/turma)

Endpoints para gerenciar associações:

    GET /professor/turma → Listar todas as associações

    POST /professor/turma → Criar associação

    GET /professor/turma/{professor_id}/{turma_id} → Visualizar associação específica

    PUT /professor/turma/{professor_id}/{turma_id} → Atualizar associação

    DELETE /professor/turma/{professor_id}/{turma_id} → Remover associação

Turmas (turma)

CRUD completo via apiResource:

    GET /turma → Listar todas as turmas

    POST /turma → Criar turma

    GET /turma/{id} → Visualizar turma específica

    PUT /turma/{id} → Atualizar turma

    DELETE /turma/{id} → Deletar turma

Questões (questoes)

CRUD completo via apiResource:

    GET /questoes → Listar todas as questões

    POST /questoes → Criar questão

    GET /questoes/{id} → Visualizar questão específica

    PUT /questoes/{id} → Atualizar questão

    DELETE /questoes/{id} → Deletar questão

Estrutura do projeto

    app/Models → Models do sistema

    app/Http/Controllers → Controllers da API

    routes/api.php → Definição das rotas da API

    app/Services/ApiResponse.php → Classe para padronizar respostas JSON

Como rodar o projeto

    Clone o repositório:

git clone https://github.com/usuario/seu-projeto.git
cd seu-projeto

    Instale dependências:

composer install

    Configure o arquivo .env:

cp .env.example .env
php artisan key:generate

    Configure o banco de dados no .env.

    Rode as migrations:

php artisan migrate

    Rode o servidor local:

php artisan serve

