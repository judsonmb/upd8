# Instalação

## Pré-requisitos

- php 8
- composer
- npm

## Passos

- Rode `cp .env.example .env`;
- Crie um banco de dados localmente e altere as variáveis DB_DATABASE, DB_USERNAME, DB_PASSWORD de acordo com o que foi criado;
- Rode `php artisan migrate` para realizar a migração das tabelas do banco de dados;
- Rode `php artisan db:seed` para inserir dados no banco;
- Rode `composer install`;
- Rode `npm install`;
- Rode `npm run build`;
- Rode `php artisan serve`;
- Acesse em seu navegador `http://localhost:8000`.