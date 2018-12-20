## Instalação

Instalação das dependencias
```sh
composer install
```

Criação e população dos dados no banco
```sh
php artisan migrate
php artisan make:seeder UsersTableSeeder
```

Listar as rotas
```sh
php artisan route:list
```
Testar o Projeto (http://localhost:8000)
```sh
php artisan server
```