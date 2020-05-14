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
//

mix.webpackConfig({
    resolve: {
        alias: {
            'morris.js': 'morris.js/morris.js',
            'jquery-ui': 'jquery-ui',
        },
    }
})

// mix.styles('ressources/css/content-tools.min.css', 'public/css');

mix.js('resources/js/app.js', 'public/js');
mix.sass('resources/sass/app.scss', 'public/css');

mix.config.fileLoaderDirs.fonts = 'public/images';
mix.copyDirectory('resources/assets/fonts', 'public/images');



//Si utilisation de fonts hors google
//Pour Images et tous les fichiers
// mix.config.fileLoaderDirs.fonts = 'assets/fonts';
// mix.copyDirectory('resources/assets', 'public/assets');
