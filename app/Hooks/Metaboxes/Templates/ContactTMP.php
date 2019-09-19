<?php
/**
 * Metaboxes for Contact Template.
 */

namespace App\Hooks\Metaboxes\Templates;

use Themosis\Hook\Hookable;

class ContactTMP extends Hookable
{
    /**
     * Register new metaboxes.
     */
    public function register()
    {
        add_filter('rwmb_meta_boxes', function ($meta_boxes) {
            $template = 'template-contact';

            $meta_boxes[] = array(
                'id'         => 'contact_info',
                'title'      => __('Kontaktné údaje', APP_TD),
                'post_types' => 'page',
                'context'    => 'normal',
                'priority'   => 'high',
                'include'    => array(
                    'template' => array($template),
                ),

                'fields' => array(
                    array(
                        'id'         => 'contact_address',
                        'name'       => __('Adresa', APP_TD),
                        'type'       => 'textarea',
                        'columns'    => 6,
                    ),
                ),
            );

            return $meta_boxes;
        });
    }
}
