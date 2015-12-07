var elixir = require('laravel-elixir');

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
var paths={
    jquery:'./node_modules/jquery/',
    bootstrap:'./node_modules/bootstrap-sass/assets/',
    fontawesome:'./node_modules/font-awesome/',
    adminlte:'./node_modules/admin-lte/',
    select2:'./vendor/bower_components/select2/',
    highlightjs:'./public/highlight/'
};

elixir(function(mix) {
    mix.sass('app.scss','public/css/app-scss.css',{includePaths:[
        paths.bootstrap+'stylesheets/',
        paths.fontawesome+'scss/'
    ]})
    .less('app.less','public/css/app-less.css',{paths:[paths.adminlte+'build/less/']})
    .copy(paths.bootstrap+'fonts/bootstrap/**','public/fonts/bootstrap')
    .copy(paths.fontawesome+'fonts/**','public/fonts/fontawesome')
    .coffee('progress.coffee','public/js/progress.js')
    .scripts([
        paths.jquery+'dist/jquery.js',
        paths.bootstrap+'javascripts/bootstrap.js',
        paths.adminlte+'dist/js/app.js',
        paths.select2+'select2.min.js',
        paths.highlightjs+'highlight.pack.js',
        './public/js/progress.js'
    ],'public/js/app.js','./')
    .copy(paths.adminlte+'dist/img/**','public/images/adminlte')
    .copy(paths.adminlte+'dist/img/credit/**','public/images/adminlte/credit')
    .styles([
        './public/css/app-scss.css',
        './public/css/app-less.css',
        paths.select2+'select2.css',
        paths.select2+'select2-bootstrap.css',
        paths.highlightjs+'styles/github.css'
    ],'public/css/app.css')
    .copy(paths.select2+'*.png','public/build/css/')
    .copy(paths.select2+'*.gif','public/build/css/')
    /*.styles([
        './public/css/app-scss.css',
        paths.highlightjs+'styles/github.css'
    ],'public/css/front.css')
    .scripts([
        paths.jquery+'dist/jquery.js',
        paths.bootstrap+'javascripts/bootstrap.js',
        paths.highlightjs+'highlight.pack.js'
    ],'public/js/front.js','./')*/
    .version([
        'css/app.css',
        'js/app.js',
        /*'css/front.css',
        'js/front.js'*/
    ]);
});