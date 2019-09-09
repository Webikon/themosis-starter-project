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
mix.copyDirectory('assets/fonts', 'dist/fonts');

// Process JS and CSS, also create sourcemaps
mix.js('assets/scripts/main.js', 'js')
    .sourceMaps()
    .sass('assets/styles/main.scss', 'css/main.css')
    .sourceMaps()
    .sass('assets/styles/blocks.scss', 'css/blocks.css')
    .options({
        processCssUrls: false, // don't convert images in CSS to base64 urls!
    });

// Load jquery globally
mix.autoload({'jquery': [
    '$',
    'window.jQuery',
    'jQuery',
    'window.$',
    'jquery',
    'window.jquery'
]});

// Version assets for production
if (mix.inProduction()) {
    mix.version();
}
