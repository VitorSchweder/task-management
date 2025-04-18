## Passo a passo de como executar o projeto

### Instalação
1. Após clonar o repositório
2. Entre no diretório do projeto:
   ```bash
   cd task-management
   ```
3. Suba os containers Docker:
   ```bash
    docker compose up -d --build
   ```
4. Instale as dependências:
   ```bash
    docker compose exec app composer install
   ```
5. Configure o ambiente:
   ```bash
    cp .env.example .env
    docker compose exec app php artisan key:generate
   ```
6. Rode as migrations e seeders:
   ```bash
    docker compose exec app php artisan migrate --seed
   ```
7. Rotas da API: 
```
   GET
   http://localhost:8080/api/tasks?status=open&assigned_user_id=10&building_id=5&from=2025-04-01&to=2025-04-30

   GET
   http://localhost:8080/api/buildings/2/tasks

   GET
   http://localhost:8080/api/tasks/7

   POST
   http://localhost:8080/api/tasks/

   {
        "title": "Check energy problem",
        "description": "Energy has problem",
        "status": "open",
        "assigned_user_id": 10,
        "building_id": 4
   }

   POST
   http://localhost:8080/api/comments/

   {
        "task_id": 24,
        "user_id": 8,
        "comment": "Started this morning to fix this problem."
   }
```
8. Rode os testes:
   ```bash
    docker compose exec app php artisan test
   ```
