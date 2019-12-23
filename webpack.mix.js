const { mix } = require('laravel-mix');

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
   mix.copy('node_modules/semantic-ui-css/semantic.min.css', 'public/css/semantic.min.css');
   mix.copy('node_modules/semantic-ui-css/semantic.css', 'public/css/semantic.css');
   mix.copy('node_modules/semantic-ui-css/semantic.min.js', 'public/css/semantic.min.js');
   mix.copy('node_modules/semantic-ui-css/semantic.js', 'public/css/semantic.js');
   mix.copy('node_modules/semantic-ui-calendar/dist/calendar.min.js', 'public/js/calendar.min.js');
   mix.copy('node_modules/semantic-ui-calendar/dist/calendar.min.css', 'public/css/calendar.min.css');
   mix.copy('node_modules/fullcalendar/dist/fullcalendar.min.js', 'public/js/fullcalendar.min.js');
   mix.copy('node_modules/fullcalendar/dist/fullcalendar.min.css', 'public/css/fullcalendar.min.css');
   mix.copy('node_modules/moment/min/moment.min.js', 'public/js/moment.min.js');
   //datatables

   mix.copy('node_modules/datatables.net/js/jquery.dataTables.js', 'public/js/jquery.dataTables.js');
   mix.copy('node_modules/datatables.net-dt/css/jquery.dataTables.css', 'public/css/jquery.dataTables.css');
   mix.copy('node_modules/datatables.net-dt/images', 'public/images');
   mix.copy('node_modules/chart.js/dist/Chart.js', 'public/js/Chart.js');
