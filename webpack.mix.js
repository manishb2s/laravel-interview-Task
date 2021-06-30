const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js');

mix.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

if (
    process.env.npm_lifecycle_event !== 'hot' &&
    process.env.NODE_ENV !== 'development'
) {
    // noinspection JSUnresolvedFunction
    mix.version();
}

mix.disableSuccessNotifications();
