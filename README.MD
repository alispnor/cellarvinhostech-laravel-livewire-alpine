
# 🍷 Sistema de Gestão de Chamados - Cellar Vinhos

Este é um projeto desenvolvido como teste técnico para a posição de Desenvolvedor(a) Sênior PHP/Laravel. Ele implementa um sistema simples de gestão de chamados com funcionalidades CRUD (Criar, Ler, Atualizar, Deletar) e filtragem, utilizando Laravel no backend e uma combinação de Livewire e Alpine.js para o frontend reativo. O design da interface é baseado no tema Ubold (Bootstrap), conforme solicitado.

---

## ✨ Funcionalidades

### ✅ Backend (Laravel)
#### Gestão de Categorias:
- Campos: `id`, `name`, `created_at`, `created_by`
- Regras: Categorias só podem ser deletadas se não houverem chamados associados.

#### Gestão de Chamados:
- Campos: `id`, `title`, `description`, `status` (`aberto`, `em progresso`, `resolvido`), `category_id`, `created_at`, `created_by`
- Regras:
  - Chamado deve obrigatoriamente ter uma categoria associada.
  - Status padrão ao criar deve ser `aberto`.

### ✅ Endpoints API (REST):
- `GET /api/categories`: Listar categorias
- `POST /api/categories`: Criar categoria
- `PUT /api/categories/{id}`: Atualizar categoria
- `DELETE /api/categories/{id}`: Deletar categoria
- `GET /api/tickets`: Listar chamados (com filtros)
- `POST /api/tickets`: Criar chamado
- `PUT /api/tickets/{id}`: Atualizar chamado
- `DELETE /api/tickets/{id}`: Deletar chamado

### ✅ Frontend (Livewire + Alpine.js com Ubold/Bootstrap)
- SPA para Categorias e Chamados
- Filtros por status, categoria e busca textual
- CRUD completo com formulários em modais
- Layout baseado no tema Ubold (Bootstrap)

---

## 🛠️ Tecnologias Utilizadas

- PHP 8.2+
- Laravel 12.x
- Livewire 3+
- Alpine.js 3+
- Vite
- Composer
- NPM
- MySQL
- Git
- Pest PHP (para testes)
- Tema Ubold

---

## 🚀 Instalação e Execução

### 1. Clone o repositório

```bash
git clone https://github.com/alispnor/cellarvinhostech-laravel-livewire-alpine.git
cd cellarvinhostech-laravel-livewire-alpine
```

### 2. Copie o `.env` e gere a chave

```bash
cp .env.example .env
php artisan key:generate
```

### 3. Configure o banco de dados no `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cellarvinhostech_db
DB_USERNAME=root
DB_PASSWORD=secret
```

### 4. Instale as dependências

```bash
composer install
npm install && npm run dev
```

### 5. Execute as migrations e seeders

```bash
php artisan migrate:fresh --seed
```

### 6. Inicie o servidor

```bash
php artisan serve
```

### 7. Acesse via navegador:

- http://localhost:8000/
- http://localhost:8000/categorias
- http://localhost:8000/chamados

---

## 🧪 Testes

O projeto inclui:

- ✅ 1 teste unitário (ex: criação de categoria)
- ✅ 1 teste de integração (API de categorias)

Execute com:

```bash
php artisan test
```

---

## 🧱 Arquitetura e Boas Práticas

- MVC + Repositórios + Services
- UUID como chave primária
- SPA com Livewire + Alpine.js
- Uso de eventos Livewire (`$dispatch`, `$listeners`)
- Uso de modais controlados com Alpine.js + Bootstrap
- Validações com FormRequest
- Design System Ubold aplicado
- Comunicação entre componentes Livewire

---

## 👨‍💻 Autor

**Ali Mohammed **  
[LinkedIn](https://www.linkedin.com/in/alialsalahi) 
