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

Cria a chave
```sh
php artisan key:generate
```

Listar as rotas
```sh
php artisan route:list
```

Testar o Projeto (http://localhost:8000)
```sh
php artisan server
```

## Configuração do JWT

Instalação do jwt-auth
Insira a linha no composer.json
```sh
    ...
    "require": {
        "tymon/jwt-auth": "1.0.*"
    }
    ...
```

Instalar a dependencia
```sh
composer update
```

Em "config/app.php" insira o provider
```sh
'providers' => [
    ...
    Tymon\JWTAuth\Providers\LaravelServiceProvider::class,
]
```

Ainda em "config/app.php", insira os Aliases para o JWT

```sh
'JWTAuth' => Tymon\JWTAuth\Facades\JWTAuth::class,
'JWTFactory' => Tymon\JWTAuthFacades\JWTFactory::class
```

Limpa o cache para que o JWT apareça na lista de providers
```sh
php artisan config:cache
```

Publicar o config do JWT

```sh
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```
Se o arquivo "config/jwt.php" não for criado, rode apenas php artisan vendor:public para verificar a listagem das classes 
disponíveis para publicação e procure pela classe JWTAuthServiceProvider

Gerar a chave
```sh
php artisan jwt:generate
```

Vá no arquivo "config/jwt.php" e altere os providers
```sh
'providers' => [
    ...
    'jwt' => 'Tymon\JWTAuth\Providers\JWT\Namshi',
    'auth' => 'Tymon\JWTAuth\Providers\Auth\Illuminate',
    'storage' => 'Tymon\JWTAuth\Providers\Storage\Illuminate'
]
```

Caso a aplicação seja inteiramente API, será necessário alterar o ExceptionHandler para exibir os erros em formato JSON

Vá para o arquivo "app/Exception/Handler.php" e altere o Método "render()"

```sh
public function render($request, Exception $exception)
    {
        return response()->json(
            [
                'error' =>  $exception->getMessage(),
            ], 401
        );
    }
```