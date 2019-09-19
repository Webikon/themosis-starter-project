<?php
/**
 * Metaboxes for Post CPT.
 */

namespace App\Hooks\Metaboxes\CustomPostTypes;

use Themosis\Hook\Hookable;

class PostCPT extends Hookable
{
    /**
     * Register new metaboxes.
     */
    public function register()
    {
        add_filter('rwmb_meta_boxes', function ($meta_boxes) {
            $meta_boxes[] = array(
                'id'         => 'post_additional_info',
                'title'      => __('Ďalšie nastavenia článku', APP_TD),
                'post_types' => 'post',
                'context'    => 'normal',
                'priority'   => 'high',

                'fields' => array(
                    array(
                        'id'         => 'post_source',
                        'name'       => __('Zdroj článku', APP_TD),
                        'type'       => 'text',
                        'columns'    => 12,
                    ),
                ),
            );

            return $meta_boxes;
        });
    }
}
