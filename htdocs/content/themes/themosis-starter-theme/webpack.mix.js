let mix = require('laravel-mix');

// Get local user config if exists
var user_config = {};
try {
    user_config = require('./config.local.json');
} catch (ex) {
}

// All assets would be copied to this path
mix.setPublicPath('dist/');

// Setup Browsersync reloading
// Create config.local.json file and add lines below, don't forget to edit url
/**
{
    "devUrl": "http://your-local-url.local"
}
**/
if (user_config.devUrl) {
    mix.browserSync({
        proxy: user_config.devUrl,
    });
}

// Copy all images, preserve directory structure
mix.copyDirectory('assets/images', 'dist/images');

// Process JS and CSS, also create sourcemaps
mix.js('assets/scripts/main.js', 'js')
    .sourceMaps()
    .sass('assets/styles/main.scss', 'css/main.css')
    .sourceMaps()
    .options({
        processCssUrls: false, // don't convert images in CSS to base64 urls!
    });

// Version assets for production
if (mix.inProduction()) {
    mix.version();
}
