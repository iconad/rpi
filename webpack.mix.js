const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
   .js('resources/js/manage/app.js', 'public/js/manage');

const tailwindcss = require("tailwindcss");

mix.sass("resources/sass/app.scss", "public/css")
   .sass("resources/sass/manage/app.scss", "public/css/manage").options({
    processCssUrls: false,
    postCss: [tailwindcss("tailwind.config.js")]
});

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.(graphql|gql)$/,
                exclude: /node_modules/,
                loader: 'graphql-tag/loader'
            }
        ]
    }
});
