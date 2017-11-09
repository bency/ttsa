const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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
       .webpack('fight-club.js')
       .webpack('predict.js');
    mix.copy('node_modules/d3/d3.min.js', 'public/js/d3.min.js');
    mix.copy('node_modules/c3/c3.min.js', 'public/js/c3.min.js');
    mix.copy('node_modules/c3/c3.min.css', 'public/css/c3.min.css');
    mix.copy('node_modules/bootstrap-sass/assets/fonts', 'public/fonts');
    mix.phpUnit('tests/**/*.php', 'phpunit');
});
