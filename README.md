Aqui está um exemplo de **README.md** para o seu sistema Laravel usando **autenticação via Sanctum**, baseado nas rotas que você mostrou:

````markdown
# Sistema Laravel com API e Autenticação via Sanctum

Este projeto é uma API desenvolvida em **Laravel** que utiliza **Laravel Sanctum** para autenticação de usuários. O sistema inclui gerenciamento de clientes e endpoints protegidos que requerem autenticação via token.

---

## Tecnologias utilizadas

- Laravel 10
- PHP 8.x
- MySQL ou MariaDB
- Laravel Sanctum para autenticação via token
- Composer

---

## Funcionalidades

- Autenticação de usuários via **Sanctum**
- Rotas protegidas que exigem token válido
- CRUD completo para clientes (`ClientController`)
- Endpoint de status da API para verificação de funcionamento
- Estrutura pronta para adicionar novos recursos e controllers

---

## Rotas da API

### Autenticação

- `POST /login`  
  Faz login do usuário e retorna um token de acesso.  
  **Exemplo de requisição:**

  ```json
  POST /login
  {
      "email": "usuario@exemplo.com",
      "senha": "senha123"
  }
````

**Exemplo de resposta:**

```json
{
    "success": true,
    "data": {
        "token": "SEU_TOKEN_AQUI"
    }
}
```

### Endpoints protegidos (necessário token)

* `GET /status`
  Retorna o status da API.
  Requer o token do usuário no header `Authorization: Bearer <token>`.

* `apiResource /clients`
  Endpoints CRUD para gerenciamento de clientes:

  * `GET /clients` → Listar todos os clientes
  * `POST /clients` → Criar cliente
  * `GET /clients/{id}` → Visualizar cliente específico
  * `PUT /clients/{id}` → Atualizar cliente
  * `DELETE /clients/{id}` → Deletar cliente

  Todos os endpoints acima exigem token de autenticação no header.

---

## Como rodar o projeto

1. Clonar o repositório:

```bash
git clone https://github.com/usuario/seu-projeto.git
cd seu-projeto
```

2. Instalar dependências:

```bash
composer install
```

3. Configurar variáveis de ambiente:

```bash
cp .env.example .env
php artisan key:generate
```

* Configure o banco de dados no arquivo `.env`.

4. Rodar migrations:

```bash
php artisan migrate
```

5. Rodar servidor local:

```bash
php artisan serve
```

---

## Observações

* Para usar os endpoints protegidos, sempre inclua o token retornado pelo login no header:

```
Authorization: Bearer SEU_TOKEN
```

* Laravel Sanctum garante que cada token seja seguro e possa ser revogado facilmente.

---

## Estrutura do projeto

* `app/Models` → Models da aplicação
* `app/Http/Controllers` → Controllers da API
* `routes/api.php` → Definição das rotas da API
* `app/Services/ApiResponse.php` → Classe para padronizar respostas JSON

```

---

Se você quiser, posso criar **uma versão ainda mais completa do README**, incluindo **tabela de endpoints de todos os controllers que você criou (`Aluno`, `Turma`, `Professor`, `Questoes`, etc.)** para deixar a documentação pronta para qualquer desenvolvedor usar a API.  

Quer que eu faça isso?
```
