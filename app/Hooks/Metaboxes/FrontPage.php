<?php
/**
 * Metaboxes for Front page.
 */

namespace App\Hooks\Metaboxes;

use Themosis\Hook\Hookable;

class FrontPage extends Hookable
{
    /**
     * Register new metaboxes.
     */
    public function register()
    {
        add_filter('rwmb_meta_boxes', function ($meta_boxes) {
            $page_id = get_option('page_on_front');

            $meta_boxes[] = array(
                'id'         => 'hero',
                'title'      => __('Hero sekcia', APP_TD),
                'post_types' => 'page',
                'context'    => 'normal',
                'priority'   => 'high',
                'include'    => array(
                    'ID' => $page_id,
                ),

                'fields' => array(
                    array(
                        'id'         => 'hero_title',
                        'name'       => __('Nadpis', APP_TD),
                        'type'       => 'text',
                    ),
                    array(
                        'id'         => 'hero_text',
                        'name'       => __('Text', APP_TD),
                        'type'       => 'textarea',
                    ),
                ),
            );

            return $meta_boxes;
        });
    }
}
