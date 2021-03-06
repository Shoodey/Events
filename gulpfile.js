var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

elixir(function (mix) {

    /*
        Plugins:
        --------
            iCheck
            toastr
            dataTables
            fastClick
            slimScroll
     */

    mix.less('../plugins/iCheck/all.less', 'resources/assets/plugins/icheck.css');

    mix.styles([
        '../plugins/icheck.css',
        '../plugins/toastr/toastr.css',
        '../plugins/datatables/dataTables.bootstrap.css'
    ], 'resources/assets/css/plugins.css');

    mix.scripts([
        '../plugins/iCheck/icheck.js',
        '../plugins/fastClick/fastclick.js',
        '../plugins/slimScroll/jquery.slimscroll.js',
        '../plugins/toastr/toastr.js',
        '../plugins/datatables/jquery.dataTables.js',
        '../plugins/datatables/dataTables.bootstrap.js'
    ], 'resources/assets/js/plugins.js');

    /*
        Styles:
        -------
            AdminLTE
            Bootstrap
            fontAwesome
            ionicons
     */

    mix.less('AdminLTE.less', 'resources/assets/css/AdminLTE.css');

    mix.sass('bootstrap.scss', 'resources/assets/css/bootstrap.css');

    mix.styles([
        'bootstrap.css',
        'AdminLTE.css',
        'font-awesome.css',
        'ionicons.css',
        'plugins.css'
    ], 'public/css/app.min.css');

    /*
        Scripts:
        --------
            jQuery
            bootstrap
            AdminLTE
            Laravel
     */

    mix.scripts([
        'jQuery.js',
        'bootstrap.js',
        'AdminLTE.js',
        'laravel.js',
        'plugins.js'
    ], 'public/js/app.min.js');


    /*
        Misc:
        -----
            fonts
            images
     */

    mix.copy('resources/assets/fonts', 'public/fonts');

    mix.copy('resources/assets/img', 'public/img');
});
