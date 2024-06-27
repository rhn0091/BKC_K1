const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .styles('resources/css/custom.css', 'public/css/custom.css')
   .sourceMaps();
   mix.styles([
      'resources/css/home.css',
      // tambahkan file CSS lainnya di sini
  ], 'public/css/all.css');
  
