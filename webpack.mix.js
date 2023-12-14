const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .js("resources/js/app.js", "public/mix/js")
    .postCss("resources/css/app.css", "public/mix/css",
    [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),

    ]
);

// let plugins = [
// ];

// plugins.forEach((plugin) => {
//     mix.copy("./node_modules/" + plugin, "public/library/" + plugin);
// });
