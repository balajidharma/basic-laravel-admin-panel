const mix = require('laravel-mix');


mix.js(['resources/js/app.js'], 'public/js')
    .js(['resources/js/admin.js'], 'public/js')
    .js(['resources/js/products.js'], 'public/js')
    .vue()
    .css('resources/css/app.css', 'public/css')
    ;


