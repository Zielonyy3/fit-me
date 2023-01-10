const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/sb-admin-2.js', 'public/js')
    .copy('resources/css/sb-admin-2.min.css', 'public/css')
    .minify('public/css/app.css', 'public/css/app.min.css', true)
    .minify('public/js/app.js', 'public/js/app.min.js', true)
    .minify('public/js/sb-admin-2.js', 'public/js/sb-admin-2.min.js', true)

