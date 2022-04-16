const mix = require('laravel-mix');
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

// Assets
mix.copyDirectory('resources/images', 'public/images');

// Plugins
mix.js('resources/js/jquery.js', 'public/assets/jquery').sourceMaps();
mix.sass('resources/sass/icheck-bootstrap.scss', 'public/assets/icheck-bootstrap').sourceMaps();

// App
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
mix.js('resources/js/app-vue.js', 'public/js').vue();
