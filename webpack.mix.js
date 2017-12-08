let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.autoload({
    jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"]
})
.js([
    'resources/assets/js/jquery-3.2.1.min.js',
    'resources/assets/js/material.min.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/bootstrap-notify.js',
    'resources/assets/js/chartist.min.js',
    'resources/assets/js/arrive.min.js',
    'resources/assets/js/perfect-scrollbar.jquery.min.js',
    'resources/assets/js/select2/js/select2.min.js',
    'resources/assets/js/app.js',
    'resources/assets/js/modules.js',
    'resources/assets/js/modules/users.module.js',
    'resources/assets/js/modules/user-groups.module.js',
], 'public/js/app.js')
.sass('resources/assets/sass/app.scss', 'public/css/app.css');
