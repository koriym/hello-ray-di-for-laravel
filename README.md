# Ray.Di for Laravel demo
See [Ray.Di for Laravel](https://github.com/ray-di/Ray.RayDiForLaravel).

## Installation
```
git clone https://github.com/koriym/hello-ray-di-for-laravel
cd hello-ray-di-for-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

and access http://localhost:8000 or run `php artisan hello`.

## Example classes
* [HelloController](./app/Http/Controllers/HelloController.php)
  * Constructor Injection
  * Setter Injection
  * Provider Injection
  * PostConstruct
  * AOP
* [HiMiddleware](./app/Http/Middleware/HiMiddleware.php)
  * Constructor Injection
  * Using a dependency resolved by the existing Laravel service container
* [HelloCommand](./app/Console/Commands/HelloCommand.php)
  * Constructor Injection

Bindings are defined in [Module](./app/Ray/Module.php)
