<h1 align="center">Basic Laravel Admin Panel</h1>
<h3 align="center">A basic and simple admin panel for Laravel projects.</h3>
<p align="center">
<a href="https://packagist.org/packages/balajidharma/basic-laravel-admin-panel"><img src="https://poser.pugx.org/balajidharma/basic-laravel-admin-panel/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/balajidharma/basic-laravel-admin-panel"><img src="https://poser.pugx.org/balajidharma/basic-laravel-admin-panel/v/stable" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/balajidharma/basic-laravel-admin-panel"><img src="https://poser.pugx.org/balajidharma/basic-laravel-admin-panel/license" alt="License"></a>
</p>

## Built with
- [Laravel 9](https://github.com/laravel/framework)
- [spatie/laravel-permission](https://github.com/spatie/laravel-permission)
- [Laravel Breeze](https://github.com/laravel/breeze)
- [Tailwind CSS](https://tailwindcss.com/)

## Installation
- To get started, you need to install [Docker Desktop](https://www.docker.com/products/docker-desktop).
- You may run the following command in your terminal
- Windows open WSL2 Linux terminal. [Docker Desktop WSL 2 backend](https://docs.docker.com/desktop/windows/wsl/)
- `docker run --rm -v "$(pwd)":/opt -w /opt laravelsail/php81-composer:latest bash -c "composer create-project balajidharma/basic-laravel-admin-panel admin-app && cd admin-app && php artisan sail:install --with=mysql,redis,meilisearch,mailhog,selenium"`
- `cd admin-app`
- `./vendor/bin/sail pull mysql redis meilisearch mailhog selenium`
- `./vendor/bin/sail build`
- `./vendor/bin/sail up`
- `./vendor/bin/sail npm install`
- `./vendor/bin/sail npm run dev`
- `./vendor/bin/sail artisan migrate --seed --seeder=BasicAdminPermissionSeeder`
- Now open http://localhost/

###### Super Admin Login
- Email - superadmin@example.com
- Password - password

#### Copy the package config to your local config with the publish command:

```shell
./vendor/bin/sail artisan vendor:publish --provider="BalajiDharma\LaravelAdminCore\AdminCoreServiceProvider"
```

To change the Admin Prefix, copy the file to your config folder and change it or add the `ADMIN_PREFIX` on env 

```php
'prefix' => env('ADMIN_PREFIX', 'admin'),
```

## Also Try
- [Build a Laravel admin panel from scratch](https://blog.devgenius.io/laravel-create-an-admin-panel-from-scratch-part-1-installation-8c11dae7e684)
- [Laravel Vue Admin Panel](https://github.com/balajidharma/laravel-vue-admin-panel)

## Screenshots
<p align="center">
	<img src="https://user-images.githubusercontent.com/6037466/179876455-1fbe6c89-9afc-4002-879b-fe3fc6506e34.png" >
	<br/><br/>
	<img src="https://user-images.githubusercontent.com/6037466/179876116-e775581c-6a5d-4af3-b12d-14b89cdcdaaf.png" >
	<br/><br/>
	<img src="https://user-images.githubusercontent.com/6037466/179875636-e805f212-1963-4c25-886f-66ca77e29e88.png" >
	<br/><br/>
	<img src="https://user-images.githubusercontent.com/6037466/179875820-46d2ddc4-a12c-41ec-a53c-cb8e86b7f3f7.png">
	<br/><br/>
	<img src="https://user-images.githubusercontent.com/6037466/179875943-116df32a-18dc-45e8-8ec5-e67d5c7cf434.png">
	<br/><br/>
	<img src="https://user-images.githubusercontent.com/6037466/179876040-0fe5f7e5-6bd5-475f-87cc-989848705829.png">
	<br/><br/>
	<img src="https://user-images.githubusercontent.com/6037466/179876212-be4f8a64-21a7-4e09-8c7d-5e0faf548052.png">
</p>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
