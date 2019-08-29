<?php
/**
 * Custom block for Gutenberg.
 */

namespace App\Hooks\Metaboxes\Blocks;

use Themosis\Hook\Hookable;

class DemoBlock extends Hookable
{
    /**
     * Register blocks.
     * See docs: https://docs.metabox.io/extensions/mb-blocks/
     */
    public function register()
    {
        add_filter('rwmb_meta_boxes', function ($meta_boxes) {
            $meta_boxes[] = [
                'title' => 'Demo Block',
                'id'    => 'demo-block',
                'type'  => 'block', // Important.
                'icon'  => 'awards', // Or you can set a custom SVG if you don't like Dashicons
                // 'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                //     <path fill="currentColor" d="M485.5 0L576 160H474.9L405.7 0h79.8zm-128 0l69.2 160H149.3L218.5 0h139zm-267 0h79.8l-69.2 160H0L90.5 0zM0 192h100.7l123 251.7c1.5 3.1-2.7 5.9-5 3.3L0 192zm148.2 0h279.6l-137 318.2c-1 2.4-4.5 2.4-5.5 0L148.2 192zm204.1 251.7l123-251.7H576L357.3 446.9c-2.3 2.7-6.5-.1-5-3.2z"></path>
                // </svg>',
                'category' => 'layout',
                // 'context' => 'side', // The block settings will be available on the right sidebar.
                'supports' => [
                    'align' => ['wide', 'full'],
                ],
                'render_callback' => [$this, 'blockCallback'], // We need to use callback to pass proper data and parse Blade
                'enqueue_style'   => get_stylesheet_directory_uri() . '/dist/css/main.css', // CSS file for the block. We have to load whole main.css.

                // Now register the block fields.
                'fields' => [
                    [
                        'type' => 'single_image',
                        'id'   => 'image',
                        'name' => 'Image',
                    ],
                    [
                        'type' => 'text',
                        'id'   => 'title',
                        'name' => 'Title',
                    ],
                    [
                        'type' => 'textarea',
                        'id'   => 'content',
                        'name' => 'Content',
                    ],
                ],
            ];

            return $meta_boxes;
        });
    }

    /**
     * Prepare data for block and render Blade template.
     *
     * $attributes variable contains all necessary data.
     * We don't need to use mb_the_block_field() function all the time.
     * This also means, that data output is NOT filtered through Metabox.io filter.
     * (e.g. raw image field output is ID, filtered image output returns image object)
     */
    public function blockCallback($attributes, $is_preview = false, $post_id = null)
    {
        // We need to get parsed view in string format, so use render() method.
        echo view('_components.demo-block', [
            'title' => $attributes['data']['title'],
            'img_url' => wp_get_attachment_image_url($attributes['data']['image']),
            'content' => nl2br($attributes['data']['content']),
        ])->render();
    }
}
