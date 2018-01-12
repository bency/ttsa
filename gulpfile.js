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
       .webpack('traffic.js')
       .webpack('fight-club.js')
       .webpack('predict.js')
       .webpack('report-show.js')
       .webpack('timeline-show.js')
       .webpack('dragnupload.js')
       .webpack('diagram.js')
       .webpack('fetch.js');
    mix.copy('resources/assets/js/taglist/tagList.js', 'public/js/tagList.js');
    mix.copy('resources/assets/js/Event.js', 'public/js/Event.js');
    mix.copy('resources/assets/js/Magnifier.js', 'public/js/Magnifier.js');
    mix.copy('resources/assets/css/tagList.css', 'public/css/tagList.css');
    mix.copy('resources/assets/css/magnifier.css', 'public/css/magnifier.css');
    mix.copy('node_modules/d3/d3.min.js', 'public/js/d3.min.js');
    mix.copy('node_modules/c3/c3.min.js', 'public/js/c3.min.js');
    mix.copy('node_modules/c3/c3.min.css', 'public/css/c3.min.css');
    mix.copy('node_modules/bootstrap-sass/assets/fonts', 'public/fonts');
    mix.phpUnit('tests/**/*.php', 'phpunit');
});
