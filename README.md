<h1 align="center">Basic Laravel Admin Panel</h1>
<h3 align="center">A basic and simple admin panel for Laravel projects.</h3>
<p align="center">
<a href="https://packagist.org/packages/balajidharma/basic-laravel-admin-panel"><img src="https://poser.pugx.org/balajidharma/basic-laravel-admin-panel/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/balajidharma/basic-laravel-admin-panel"><img src="https://poser.pugx.org/balajidharma/basic-laravel-admin-panel/v/stable" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/balajidharma/basic-laravel-admin-panel"><img src="https://poser.pugx.org/balajidharma/basic-laravel-admin-panel/license" alt="License"></a>
</p>

## Built with
- [Laravel 11](https://github.com/laravel/framework)
- [spatie/laravel-permission](https://github.com/spatie/laravel-permission)
- [Laravel Breeze](https://github.com/laravel/breeze)
- [balajidharma/laravel-menu](https://github.com/balajidharma/laravel-menu)
- [balajidharma/laravel-form-builder](https://github.com/balajidharma/laravel-form-builder)
- [Tailwind CSS](https://tailwindcss.com/)
- [daisyUI](https://daisyui.com/)


## Installation

### With Docker Desktop
- To get started, you need to install [Docker Desktop](https://www.docker.com/products/docker-desktop).
- You may run the following command in your terminal
- Windows open WSL2 Linux terminal. [Docker Desktop WSL 2 backend](https://docs.docker.com/desktop/windows/wsl/)
- `docker run --rm -v "$(pwd)":/opt -w /opt laravelsail/php83-composer:latest bash -c "composer create-project balajidharma/basic-laravel-admin-panel admin-app && cd admin-app && php artisan sail:install --with=mysql,redis,meilisearch,mailpit,selenium"`
- `cd admin-app`
- `./vendor/bin/sail pull mysql redis meilisearch mailpit selenium`
- `./vendor/bin/sail build`
- `./vendor/bin/sail up`
- `./vendor/bin/sail npm install`
- `./vendor/bin/sail npm run dev`
- `./vendor/bin/sail artisan vendor:publish --tag=admin-core`
- `./vendor/bin/sail artisan migrate --seed --seeder=AdminCoreSeeder`
- `./vendor/bin/sail artisan storage:link`
- Now open http://localhost/admin

### Without Docker Desktop
- To get started, you need to install [PHP Composer](https://getcomposer.org/).
- `composer create-project balajidharma/basic-laravel-admin-panel admin-app`
- `cd admin-app`
- Create a new MYSQL database and update database details in `.env` file
- `php artisan vendor:publish --tag=admin-core`
- `php artisan migrate --seed --seeder=AdminCoreSeeder`
- `php artisan storage:link`
- `npm install`
- `npm run dev`
- `php artisan serve`
- Now open http://localhost:8000/admin

###### Super Admin Login
- Email - superadmin@example.com
- Password - password

#### Admin Configuration:

To change the Admin Prefix, change `prefix` on `config/admin.php` or add the `ADMIN_PREFIX` on env 

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
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/e6b99484-589c-4d44-8282-fb2a9936e712" >
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/1a01f5f1-5fc5-4551-bf01-db345b4378da" >
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/80084c6f-be9b-43c4-b070-9aa2ec38df60">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/f5c0489f-d62f-414b-950a-51a7db879a0e">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/d1d161b2-b6b1-4381-b608-7dbb6e1bf1d8">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/13d88e2f-98f0-4792-a3ee-3e251370f345">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/f7553d1a-c416-495a-8948-4bc6b1e2f3dc">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/0d060108-3a79-46aa-a8aa-466040c35cc1">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/0f9378fe-ceca-40b7-bf40-3c54c18fd487">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/d379c6ac-3b20-4451-8152-06bd28b7a94a">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/e7895ca3-cab1-4a00-9e4b-8c1d87288c10">
</p>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
