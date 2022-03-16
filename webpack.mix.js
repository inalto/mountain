const mix = require('laravel-mix');

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
.js('resources/js/app.js', 'public/js')
.js('resources/js/ckeditor.js', 'public/js')
.js('resources/jslibs/clockpicker/src/clockpicker.js','public/js')
.css('resources/css/app.css', 'public/css')
.options({
    postCss: [
        require('postcss-import'),
        require('postcss-nested'),
        require('tailwindcss'),
    ]
})
.copyDirectory("resources/js/translations", "public/js/translations")
.copyDirectory("resources/css/fonts", "public/fonts")
.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')
.browserSync({
    proxy: "inalto.ls",
    files: ["resources/**/*.*"],
});
