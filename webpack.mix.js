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
   .sass('resources/assets/sass/app.scss', 'public/css');

/*
 |--------------------------------------------------------------------------
 | Admin
 |--------------------------------------------------------------------------
 |
 */

mix.scripts([
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'node_modules/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js',
    'node_modules/gentelella/vendors/switchery/dist/switchery.min.js',

    'node_modules/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js',
    'node_modules/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',
    'node_modules/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
    'node_modules/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
    'node_modules/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
    'node_modules/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js',
    'node_modules/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
    'node_modules/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',
    'node_modules/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js',

    'node_modules/gentelella/build/js/custom.js',
], 'public/assets/admin/js/admin.js').version();

mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'node_modules/gentelella/vendors/animate.css/animate.css',
    'node_modules/gentelella/build/css/custom.css',

    'node_modules/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css',
    'node_modules/gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
    'node_modules/gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css',
    'node_modules/gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css',
    'node_modules/gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css',

], 'public/assets/admin/css/admin.css').version();


mix.copy([
    'node_modules/gentelella/vendors/bootstrap/dist/fonts',
], 'public/assets/admin/fonts');


mix.scripts([
    'node_modules/select2/dist/js/select2.full.js',
    'resources/assets/admin/js/users/edit.js',
], 'public/assets/admin/js/users/edit.js').version();

mix.styles([
    'node_modules/select2/dist/css/select2.css',
], 'public/assets/admin/css/users/edit.css').version();

mix.scripts([
    'node_modules/gentelella/vendors/Flot/jquery.flot.js',
    'node_modules/gentelella/vendors/Flot/jquery.flot.time.js',
    'node_modules/gentelella/vendors/Flot/jquery.flot.pie.js',
    'node_modules/gentelella/vendors/Flot/jquery.flot.stack.js',
    'node_modules/gentelella/vendors/Flot/jquery.flot.resize.js',

    'node_modules/gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js',
    'node_modules/gentelella/vendors/DateJS/build/date.js',
    'node_modules/gentelella/vendors/flot.curvedlines/curvedLines.js',
    'node_modules/gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js',

    'node_modules/gentelella/production/js/moment/moment.min.js',
    'node_modules/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js',


    'node_modules/gentelella/vendors/Chart.js/dist/Chart.js',
    'node_modules/gentelella/vendors/pnotify/dist/pnotify.js',
    'node_modules/gentelella/vendors/pnotify/dist/pnotify.buttons.js',
    'node_modules/gentelella/vendors/pnotify/dist/pnotify.nonblock.js',
    'node_modules/jcarousel/dist/jquery.jcarousel.min.js',

    'resources/assets/admin/js/dashboard.js',
], 'public/assets/admin/js/dashboard.js').version();

mix.styles([
    'node_modules/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css',
    'node_modules/gentelella/vendors/switchery/dist/switchery.css',
    'node_modules/gentelella/vendors/pnotify/dist/pnotify.css',
    'node_modules/gentelella/vendors/pnotify/dist/pnotify.buttons.css',
    'node_modules/gentelella/vendors/pnotify/dist/pnotify.nonblock.css',
    'resources/assets/admin/css/dashboard.css',
], 'public/assets/admin/css/dashboard.css').version();