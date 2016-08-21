var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');



elixir(function(mix) {
    mix.styles( ['../../../node_modules/bootstrap/dist/css/bootstrap.css', '../../../node_modules/fancybox/dist/css/jquery.fancybox.css','resources/assets/css/style.css'], 'public/css/styles.css');

    //js do bootstrap
    mix.scripts(['../../../node_modules/bootstrap/dist/js/bootstrap.min.js'], 'public/js/bootstrap.min.js');

    //fancybox
    mix.scripts(['../../../node_modules/fancybox/dist/js/jquery.fancybox.pack.js'], 'public/js/jquery.fancybox.pack.js');

    //JQuery
    mix.scripts(['../../../node_modules/jquery/dist/jquery.min.js'], 'public/js/jquery.min.js');


    //main script
    mix.scripts(['resources/assets/js/main.js'], 'public/js/main.js');

    //list of projects using vue.js
    mix.browserify('listproject.js');



});
