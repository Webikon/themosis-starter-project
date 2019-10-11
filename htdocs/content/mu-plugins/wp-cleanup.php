<?php
/*
Plugin Name: WP cleanup.
Plugin URI: https://webikon.sk
Description: Get rid of unnecessary WP ballast!
Version: 1.0
Author: Webikon
Author URI: https://webikon.sk
License: GPLv2
Domain Path: /languages/
Text Domain: wbkn-wp-cleanup
*/

namespace Webikon;

/**
 * Load plugin textdomain.
 */
add_action('plugins_loaded', function () {
    load_muplugin_textdomain('wbkn-wp-cleanup', 'languages/');
});


/**
 * Remove "text/javascript" string from script tags.
 *
 * Source: https://codeless.co/remove-type-attribute-from-wordpress/
 */
function remove_type_attr($tag, $handle)
{
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}
add_filter('style_loader_tag', __NAMESPACE__ . '\\remove_type_attr', 10, 2);
add_filter('script_loader_tag', __NAMESPACE__ . '\\remove_type_attr', 10, 2);

/**
 * Hide WYSIWYG editor on specific pages.
 */
add_action('admin_init', function () {
    // Get the Post ID.
    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
    } elseif (isset($_POST['post'])) {
        $post_id = $_POST['post'];
    }

    if (!isset($post_id)) {
        return;
    }

    // Hide the editor on front page
    if ($post_id == get_option('page_on_front')) {
        remove_post_type_support('page', 'editor');
    }
});

/**
 * Get rid of unnecessary WP ballast!
 */

add_action('after_setup_theme', function () {
    // Launch head cleanup
    add_action('init', __NAMESPACE__ . '\\head_cleanup');

    // Remove WP version from RSS
    add_filter('the_generator', __NAMESPACE__ . '\\rss_version');

    // If comments are not used, remove related styles
    // Remove pesky injected css for recent comments widget
    add_filter('wp_head', __NAMESPACE__ . '\\remove_wp_widget_recent_comments_style', 1);
    // Clean up comment styles in the head
    add_action('wp_head', __NAMESPACE__ . '\\remove_recent_comments_style', 1);

    // Clean up gallery output in wp
    add_filter('gallery_style', __NAMESPACE__ . '\\gallery_style');


    // Remove Emojis
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
});

/**
 * Clean WP_HEAD
 *
 * Courtesy of http://cubiq.org/clean-up-and-optimize-wordpress-for-your-next-theme
 */
function head_cleanup()
{
    // If RSS feeds are not used, use this hooks to remove feed links
    // Category feeds
    // remove_action( 'wp_head', 'feed_links_extra', 3 );
    // Post and comment feeds
    // remove_action( 'wp_head', 'feed_links', 2 );

    // EditURI link
    remove_action('wp_head', 'rsd_link');
    // Windows live writer
    remove_action('wp_head', 'wlwmanifest_link');
    // Index link
    remove_action('wp_head', 'index_rel_link');
    // Previous link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    // Start link
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    // Links for adjacent posts
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    // WP version
    remove_action('wp_head', 'wp_generator');

    // Remove WP version from css
    add_filter('style_loader_src', __NAMESPACE__ . '\\remove_wp_assets_version', 0);
    // Remove WP version from scripts
    add_filter('script_loader_src', __NAMESPACE__ . '\\remove_wp_assets_version', 0);
}

/**
 * Remove WP version from RSS
 */
function rss_version()
{
    return '';
}

/**
 * Remove WP version from assets
 */
function remove_wp_assets_version($src)
{
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }

    return $src;
}


/**
 * Remove injected CSS for recent comments widget
 */
function remove_wp_widget_recent_comments_style()
{
    if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
        remove_filter('wp_head', 'wp_widget_recent_comments_style');
    }
}

/**
 * Remove injected CSS from recent comments widget
 */
function remove_recent_comments_style()
{
    global $wp_widget_factory;

    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
        remove_action(
            'wp_head',
            array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style')
        );
    }
}
