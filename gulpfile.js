var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

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
/*
If you need to change the build assets, first you need to run these commands:
npm install
npm install jquery
npm install admin-lte
npm install font-awesome
npm install toastr
bower install select2-bootstrap-css
bower install highlightjs
npm install vue
*/


var paths={
    jquery:'./node_modules/jquery/',
    bootstrap:'./node_modules/bootstrap-sass/assets/',
    fontawesome:'./node_modules/font-awesome/',
    adminlte:'./node_modules/admin-lte/',
    toastr:'./node_modules/toastr/',
    select2:'./vendor/bower_components/select2/',
    highlightjs:'./vendor/bower_components/highlightjs/',
    vue:'./node_modules/vue/'
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
        paths.toastr+'build/toastr.min.js',
        './public/js/progress.js'
    ],'public/js/app.js','./')
    .copy(paths.adminlte+'dist/img/**','public/images/adminlte')
    .copy(paths.adminlte+'dist/img/credit/**','public/images/adminlte/credit')
    .copy(paths.vue+'dist/vue.min.js','public/js/vue.min.js')
    .styles([
        './public/css/app-scss.css',
        './public/css/app-less.css',
        paths.select2+'select2.css',
        paths.select2+'select2-bootstrap.css',
        paths.toastr+'build/toastr.min.css'
    ],'public/css/app.css')
    .copy(paths.select2+'*.png','public/build/css/')
    .copy(paths.select2+'*.gif','public/build/css/')
    .styles([
        './public/css/app-scss.css',
        './public/css/app-less.css',
        paths.highlightjs+'styles/github.css'
    ],'public/css/front.css')
    .scripts([
        paths.jquery+'dist/jquery.js',
        paths.bootstrap+'javascripts/bootstrap.js',
        paths.highlightjs+'highlight.pack.js',
        './public/js/progress.js'
    ],'public/js/front.js','./')
    .version([
        'css/app.css',
        'js/app.js',
        'css/front.css',
        'js/front.js',
        'js/vue.min.js'
    ]);
});