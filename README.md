# Instalação

## Pré-requisitos

- php 8
- composer
- npm

## Passos

- Rode `cp .env.example .env`;
- Crie um banco de dados localmente e altere as variáveis DB_DATABASE, DB_USERNAME, DB_PASSWORD de acordo com o que foi criado;
- Rode `composer install`;
- Rode `npm install`;
- Rode `npm run build`;
- Rode `php artisan serve`;
- Acesse em seu navegador `http://localhost:8000`.