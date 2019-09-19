<?php
/**
 * Metaboxes for Book CPT.
 */

namespace App\Hooks\Metaboxes\CustomPostTypes;

use Themosis\Hook\Hookable;

class BookCPT extends Hookable
{
    /**
     * Register new metaboxes.
     */
    public function register()
    {
        add_filter('rwmb_meta_boxes', function ($meta_boxes) {
            $meta_boxes[] = array(
                'id'         => 'book_info',
                'title'      => __('Nastavenie knihy', APP_TD),
                'post_types' => 'book',
                'context'    => 'normal',
                'priority'   => 'high',

                'fields' => array(
                    array(
                        'id'         => 'book_release_date',
                        'name'       => __('Dátum vydania', APP_TD),
                        'type'       => 'text',
                        'columns'    => 6,
                    ),
                    array(
                        'id'         => 'book_pages_count',
                        'name'       => __('Počet strán', APP_TD),
                        'type'       => 'text',
                        'columns'    => 6,
                        // 'attributes' => array(
                        //     'style' => 'width: 100%;',
                        // ),
                    ),
                ),
            );

            return $meta_boxes;
        });
    }
}
