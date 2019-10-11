<?php
/*
Plugin Name: Custom Branding
Plugin URI: https://webikon.sk
Description: Custom branding for WP websites created by Webikon.
Version: 1.0
Author: Webikon
License: MIT
*/

namespace Webikon\Branding;

// Define constants
define('WEBIKON_BRANDING_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WEBIKON_BRANDING_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Load plugin textdomain.
 */
add_action('plugins_loaded', function () {
    load_muplugin_textdomain('webikon-custom-branding', 'languages/');
});

/**
 * Add hooks.
 */
add_action('login_enqueue_scripts', __NAMESPACE__.'\\login_logo');
add_filter('admin_footer_text', __NAMESPACE__.'\\admin_footer', 11);
add_action('admin_bar_menu', __NAMESPACE__.'\\remove_wp_logo', 999);
add_action('admin_bar_menu', __NAMESPACE__.'\\create_menu', 1);
add_action('wp_before_admin_bar_render', __NAMESPACE__.'\\menu_custom_logo');
add_filter('login_headerurl', __NAMESPACE__.'\\login_logo_url');
add_action('login_footer', __NAMESPACE__.'\\login_message');
// add_filter('login_headertext', __NAMESPACE__ . '\\login_logo_headertext');

/**
* Remove WordPress admin bar menu
*
* @param mixed $wp_admin_bar
*/
function remove_wp_logo($wp_admin_bar)
{
    $wp_admin_bar->remove_node('wp-logo');
}

/**
* Replace login screen logo
*/
function login_logo()
{
    ?>
    <style type="text/css">
        body.login {
            background-color: #015d84;
        }
        body.login div#login h1 a {
            background-image: url( <?=(WEBIKON_BRANDING_PLUGIN_URL.'assets/images/logo.svg'); ?> );
            background-repeat: no-repeat;
            background-size: contain;
            width: 300px;
        }
        body.login .webikon-info {
            margin-top: 40px;
            text-align: center;
            color: #d0cfcf;
        }
        body.login .webikon-info a {
            color: #fff;
            text-decoration: none;
        }
        body.login .webikon-info a:hover {
            color: #00a0d2;
        }
        body.login #nav a, 
        body.login #backtoblog a {
            color: #fff;
        }
    </style>
    <?php
}

function login_message()
{
    echo '<p class="webikon-info">
        Website powered by <a href="https://wordpress.org" target="_blank" rel="noopener noreferrer">WordPress</a>
        and created by <a href="https://webikon.sk" target="_blank" rel="noopener noreferrer">Webikon</a>.
    </p>';
}

/**
 * Replace login screen logo link
 *
 * @param mixed $url
 */
function login_logo_url($url)
{
    return home_url();
}



// Replace login logo title
function login_logo_headertext()
{
    return 'Powered by Webikon';
}


// Create custom admin bar m enu
function create_menu()
{
    global $wp_admin_bar;
    $menu_id = 'my-logo';
    $wp_admin_bar->add_node([
        'id' => $menu_id,
        'title' =>
        '<span class="ab-icon">'.file_get_contents(WEBIKON_BRANDING_PLUGIN_DIR."assets/images/logo.svg").'</span>',
        'href' => '/'
        ]);
}


/**
* Replace login screen logo
*/
function menu_custom_logo()
{
    ?>
    <style type="text/css">
        #wpadminbar #wp-admin-bar-my-logo > .ab-item .ab-icon {
            margin-right: 0 !important;
            padding-top: 7px !important;
        }
        #wpadminbar #wp-admin-bar-my-logo > .ab-item .ab-icon svg {
            width: 75px;
            height: 20px;
        }
    </style>
    <?php
}

/**
* Add "designed and developed..." to admin footer.
*
* @param mixed $content
*/
function admin_footer($content)
{
    return 'Website powered by <a href="https://wordpress.org" target="_blank" rel="noopener noreferrer">WordPress</a>
        and created by <a href="https://webikon.sk" target="_blank" rel="noopener noreferrer">Webikon</a>';
}
