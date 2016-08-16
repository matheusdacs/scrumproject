var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.styles( ['../../../node_modules/bootstrap/dist/css/bootstrap.css', 'resources/assets/css/style.css'], 'public/css/styles.css');

    mix.scripts(['../../../node_modules/bootstrap/dist/js/bootstrap.min.js'], 'public/js/scripts.js');
});
