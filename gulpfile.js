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

elixir.config.publicPath = 'public_html';

elixir(function (mix) {

    mix.copy('bower_components/font-awesome/fonts', 'public_html/fonts');
    mix.copy('bower_components/bootstrap/dist/fonts', 'public_html/fonts');

    // landing page
    mix.copy('bower_components/rdok/startbootstrap-stylish-portfolio/font-awesome/fonts', 'public_html/fonts');
    mix.copy('bower_components/rdok-startbootstrap-stylish-portfolio/img', 'public_html/img/landing-page');

    // mix.less('bower_components/bootstrap-timepicker/css/timepicker.less',
    //     'bower_components/bootstrap-timepicker/css/timepicker.css', {paths: ['.'], filename: 'timepicker.css'});

    mix
        .styles([
            'bower_components/bootstrap/dist/css/bootstrap.min.css',
            'resources/assets/css/App.css',
            'resources/assets/css/custom.css'
        ], 'build/css/above-the-fold-content.min.css', '.')
        // Landing page.
        .styles([
            'bower_components/rdok/startbootstrap-stylish-portfolio/css/bootstrap.min.css',
            'bower_components/rdok/startbootstrap-stylish-portfolio/css/stylish-portfolio.css',
            'bower_components/rdok/startbootstrap-stylish-portfolio/font-awesome/css/font-awesome.min.css',
            'bower_components/pnotify/dist/pnotify.css',
        ], 'build/css/landing-page/above-the-fold-content.min.css', '.')
        .styles([
            'bower_components/font-awesome/css/font-awesome.min.css',
            'bower_components/jquery-ui/themes/smoothness/jquery-ui.min.css',
            'bower_components/iCheck/skins/minimal/blue.css',
            'bower_components/iCheck/skins/square/green.css',
            'bower_components/iCheck/skins/square/red.css',
            'bower_components/select2/dist/css/select2.min.css',
            'bower_components/jquery-simplecolorpicker/jquery.simplecolorpicker.css',
            'bower_components/fullcalendar/dist/fullcalendar.min.css',
            'bower_components/pnotify/dist/pnotify.css',
            'bower_components/bootstrap-toggle/css/bootstrap-toggle.min.css',
            'bower_components/parsleyjs/src/parsley.css',
            // 'bower_components/bootstrap-timepicker/css/timepicker.css',
            'bower_components/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
            'bower_components/font-awesome-animation/dist/font-awesome-animation.min.css',
        ], 'build/css/master.min.css', '.');

    mix.scripts([
            'resources/assets/js/loadStyleSheets.js',
            'bower_components/jquery/dist/jquery.min.js',
            'bower_components/bootstrap/dist/js/bootstrap.min.js',
            'bower_components/jquery-ui/jquery-ui.min.js',
            'bower_components/pnotify/dist/pnotify.js',
            'bower_components/pnotify/dist/pnotify.confirm.js',
            'resources/assets/js/flash.js',
        ], 'build/js/master.min.js', '.')
        // Landing page.
        .scripts([
            'bower_components/rdok/startbootstrap-stylish-portfolio/js/jquery.js',
            'bower_components/rdok/startbootstrap-stylish-portfolio/js/bootstrap.min.js',
            'bower_components/pnotify/dist/pnotify.js',
            'bower_components/pnotify/dist/pnotify.confirm.js',
            'resources/assets/js/loadStyleSheets.js',
            'resources/assets/js/flash.js',
        ], 'build/js/landing-page/master.min.js', '.');

    mix.version([
        './build/css/above-the-fold-content.min.css',
        './build/css/landing-page/above-the-fold-content.min.css',
        './build/css/master.min.css',
        './build/js/master.min.js',
        './build/js/landing-page/master.min.js'
    ]);
});
