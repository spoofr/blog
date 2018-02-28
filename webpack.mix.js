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

mix.js('resources/assets/js/app.js', 'public/js') // App
   .js('resources/assets/js/admin.js', 'public/js') // Admin
   .sass('resources/assets/sass/app/app.scss', 'public/css') // App
   .sass('resources/assets/sass/admin/admin.scss', 'public/css'); // Admin