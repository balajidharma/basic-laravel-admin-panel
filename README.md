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
- [balajidharma/laravel-menu](https://github.com/balajidharma/laravel-menu)
- [Tailwind CSS](https://tailwindcss.com/)
- [daisyUI](https://daisyui.com/)


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
- `./vendor/bin/sail artisan vendor:publish --provider="BalajiDharma\LaravelAdminCore\AdminCoreServiceProvider"`
- `./vendor/bin/sail artisan vendor:publish --provider="BalajiDharma\LaravelMenu\MenuServiceProvider"`
- `./vendor/bin/sail artisan migrate --seed --seeder=AdminCoreSeeder`
- Now open http://localhost/

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
	<img src="https://user-images.githubusercontent.com/6037466/212739682-9b78b9d0-0a98-47c1-8cfd-c59eda49c29d.png" >
	<br/><br/>
	<img src="https://user-images.githubusercontent.com/6037466/212739938-558b0510-aab8-4093-b5d6-046ad54e4719.png" >
	<br/><br/>
	<img src="https://user-images.githubusercontent.com/6037466/212740241-7991aa91-f31b-4545-ad75-6d8b7d5a0152.png">
	<br/><br/>
	<img src="https://user-images.githubusercontent.com/6037466/212740406-8289a684-2c9b-49fc-a14c-4c1ab34fe851.png">
	<br/><br/>
	<img src="https://user-images.githubusercontent.com/6037466/212740481-cca2a0e7-66c7-49c3-8cc6-d0d02e4e79d7.png">
	<br/><br/>
	<img src="https://user-images.githubusercontent.com/6037466/212740915-e358e0de-15f3-4de5-8fd0-3fa719fd653f.png">
	<br/><br/>
	<img src="https://user-images.githubusercontent.com/6037466/212739281-833ba20f-b9e7-4f5f-9f03-5a558a7bb8d3.png">
	<br/><br/>
	<img src="https://user-images.githubusercontent.com/6037466/212739204-5a5d8008-e48e-401f-aadf-305b57c7186d.png">
	<br/><br/>
	<img src="https://user-images.githubusercontent.com/6037466/212741829-1684b852-2cdd-4385-ae0b-2dd9dde56d55.png">
</p>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
