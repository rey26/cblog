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

mix.js('resources/assets/js/create.js', 'public/js')
    .js('resources/assets/js/register.js', 'public/js')
    .js('resources/assets/js/categories.js', 'public/js')
    .sass('resources/assets/sass/app.sass', 'public/css')
    .sass('resources/assets/sass/dropDown.sass', 'public/css')
    .browserSync({
        proxy:'cblog.rey'
    });