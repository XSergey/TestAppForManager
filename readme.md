<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Test Application for Managers

This app is a web application builded on Laravel framework with expressive, elegant dsign.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Set up your environment
Copy this repository to your server's domain folder.

1. Run composer to install laravel vendor with dependencies from composer.json.

```
composer update
```

Run `php artisan migrate` and `php artisan db:seed`

2. Run node to install modules from package.json

```
npm i
```

3. Run webpack to compile all CSS and JS files for application.

```
npm run dev
```

4. Create or update your `.env` file to configure current config four your application.

```
APP_URL=https://localhost
...

DB_DATABASE=manager
DB_USERNAME=root
DB_PASSWORD=root


```

## Manager Panel
Manager panel has all required components to manage your bot. So to start make interesting things you need to login to panel with default superuser cretentials.

```
super-admin@manager.com
123456
```

Now you can see manager panel in work.

## Any questions?

Write me to my email : namsk.ufo@gmail.com


## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
