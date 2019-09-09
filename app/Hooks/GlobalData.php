<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;

class GlobalData extends Hookable
{
    // We need to use 'wp' so WC functions and all queries are already loaded
    public $hook = 'wp';


    /**
     * Add global data shared across all views.
     * You can use it as $global_data variable.
     */
    public function register()
    {
        if (is_admin()) {
            return;
        }

        \View::share([
            'global_data' => [
                'site_name' => get_bloginfo('name'),
                'site_description' => get_bloginfo('description'),
                'site_logo_url' => get_stylesheet_directory_uri().'/assets/images/logo.svg',
                'home_url' => get_home_url(),
                'image_path' => get_stylesheet_directory_uri().'/assets/images/', // used in Jigsaw
            ],
        ]);
    }
}
