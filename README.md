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
- Now open http://localhost/admin

### Without Docker Desktop
- To get started, you need to install [PHP Composer](https://getcomposer.org/).
- `composer create-project balajidharma/basic-laravel-admin-panel admin-app`
- `cd admin-app`
- Create a new MYSQL database and update database details in `.env` file
- `php artisan vendor:publish --tag=admin-core`
- `php artisan migrate --seed --seeder=AdminCoreSeeder`
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
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/e3332546-fde5-43f2-b485-c480e2789aca" >
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/d61f99be-672c-490b-a953-e5f85124e588" >
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/5c5b8653-bc47-40ce-8ca1-a80e1c18e02c">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/1b57218c-6b59-4ce5-9258-53bcfaeadf0b">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/ce3d5549-7897-44bc-afd2-7b82d196e255">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/dc489947-9b6a-4eac-a425-9f5f86750afa">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/f29751ec-3401-451f-9ce1-bee54865d8f5">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/b3819023-12cc-481a-8c44-b5ea6dbb1987">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/64f1f333-9812-4b7e-b981-2fcddf33cc1e">
	<br/><br/>
	<img src="https://github.com/balajidharma/basic-laravel-admin-panel/assets/6037466/e7895ca3-cab1-4a00-9e4b-8c1d87288c10">
</p>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
