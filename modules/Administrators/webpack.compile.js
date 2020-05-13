const mix = require('laravel-mix');
const tailwindcss = require("tailwindcss");
const cwd = "./modules/Administrators/App";

mix
    .setPublicPath("./")
    .js(`${cwd}/src/js/app.js`, `${cwd}/dist/js`)
    .sass(`${cwd}/src/sass/app.scss`, `${cwd}/dist/css`)
    .options({
        processCssUrls: false,
        postCss: [tailwindcss("./tailwind.config.js")]
    });
