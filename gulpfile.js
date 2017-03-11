const elixir = require('laravel-elixir');

require('laravel-elixir-vue');
require('laravel-elixir-browsersync-official');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js')
        .browserSync({
            'proxy' : 'vardvakanser.app',
            'port' : 5001
        });

    mix.version([
        'css/app.css',
        'js/app.js'
    ], 'public/build');
});