<?php
/**
 * Additional Admin pages.
 */

namespace App\Hooks\Metaboxes\AdminPages;

use Themosis\Hook\Hookable;

class AdminPagesRegistration extends Hookable
{
    /**
     * Register new pages.
     */
    public function register()
    {
        add_filter('mb_settings_pages', function ($settings_pages) {
            $settings_pages[] = array(
                'id'          => 'theme-settings',
                'option_name' => '_theme_settings',
                'menu_title'  => __('Nastavenia Témy', APP_TD),
                'icon_url'    => 'dashicons-admin-generic',
                'columns'     => 1,
                'position'    => 68,
                'tabs'        => array(
                    'global'      => __('Globálne', APP_TD),
                    'social'      => __('Sociálne siete', APP_TD),
                    'blog'        => __('Blog', APP_TD),
                    'error_404'   => __('404', APP_TD),
                    // 'woocommerce' => 'WooCommerce',
                ),
            );

            return $settings_pages;
        });
    }
}
