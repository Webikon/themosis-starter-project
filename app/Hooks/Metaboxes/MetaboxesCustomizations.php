<?php
/**
 * Metaboxes customizations.
 */

namespace App\Hooks\Metaboxes;

use Themosis\Hook\Hookable;

class MetaboxesCustomizations extends Hookable
{
    /**
     * Register functionality.
     */
    public function register()
    {
        /**
         * Disable Metabox settings page.
         */
        add_filter('mb_aio_show_settings', '__return_false');

        /**
         * Manage Metabox AIO extensions.
         */
        add_filter('mb_aio_extensions', function ($extensions) {
            $extensions = [
                'mb-admin-columns',
                'mb-blocks',
                // 'mb-comment-meta',
                // 'mb-custom-post-type',
                // 'mb-custom-table',
                // 'mb-frontend-submission',
                // 'mb-relationships',
                // 'mb-rest-api',
                // 'mb-revision',
                'mb-settings-page',
                // 'mb-term-meta',
                // 'mb-user-meta',
                // 'mb-user-profile',
                // 'meta-box-builder',
                'meta-box-columns',
                'meta-box-conditional-logic',
                // 'meta-box-geolocation',
                'meta-box-group',
                'meta-box-include-exclude',
                // 'meta-box-show-hide',
                // 'meta-box-tabs',
                // 'meta-box-template',
                // 'meta-box-text-limiter',
                // 'meta-box-tooltip',
                // 'meta-box-updater',
            ];

            return $extensions;
        });
    }
}
