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

mix.js('resources/assets/js/app.js', 'public/js')
    .babel([
        './node_modules/select2/dist/js/select2.full.min.js'
    ], 'public/js/select2.full.min.js')
    .copyDirectory('resources/assets/vendor', 'public/vendor')
    .copyDirectory('resources/assets/dropzone/dist/min', 'public/dropzone')
    .sass('resources/assets/sass/app.scss', 'public/css');
