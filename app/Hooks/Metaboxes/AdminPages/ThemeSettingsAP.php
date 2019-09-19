<?php
/**
 * Metaboxes for Book CPT.
 */

namespace App\Hooks\Metaboxes\AdminPages;

use Themosis\Hook\Hookable;

class ThemeSettingsAP extends Hookable
{
    /**
     * Register new metaboxes.
     */
    public function register()
    {
        add_filter('rwmb_meta_boxes', function ($meta_boxes) {
            // As registered in AdminPages.php
            $page_id = 'theme-settings';

            // Global Tab
            $meta_boxes[] = array(
                'id'             => 'settings_global',
                'title'          => __('Globálne', APP_TD),
                'settings_pages' => $page_id,
                'tab'            => 'global',

                'fields' => array(
                    array(
                        'id'      => 'main_logo',
                        'name'    => __('Logo v hlavičke', APP_TD),
                        'type'    => 'single_image',
                        'columns' => 4,
                    ),
                    // array(
                    //     'id'      => 'contact_phone',
                    //     'name'    => __('Telefónne číslo', APP_TD),
                    //     'type'    => 'text',
                    //     'columns' => 12,
                    // ),
                    // array(
                    //     'id'      => 'contact_email',
                    //     'name'    => __('Email', APP_TD),
                    //     'type'    => 'email',
                    //     'columns' => 12,
                    // ),
                ),
            );

            // Social Tab
            $meta_boxes[] = array(
                'id'             => 'settings_social',
                'title'          => __('Sociálne siete', APP_TD),
                'settings_pages' => $page_id,
                'tab'            => 'social',

                'fields' => array(
                    array(
                        'id'         => 'facebook_url',
                        'name'       => __('Facebook URL', APP_TD),
                        'type'       => 'text',
                        'columns'    => 12,
                        'attributes' => array(
                            'style' => 'width: 100%;',
                        ),
                    ),
                    array(
                        'id'         => 'instagram_url',
                        'name'       => __('Instagram URL', APP_TD),
                        'type'       => 'text',
                        'columns'    => 12,
                        'attributes' => array(
                            'style' => 'width: 100%;',
                        ),
                    ),
                    // array(
                    //     'id'         => 'pinterest_url',
                    //     'name'       => __('Pinterest URL', APP_TD),
                    //     'type'       => 'text',
                    //     'columns'    => 12,
                    //     'attributes' => array(
                    //         'style' => 'width: 100%;',
                    //     ),
                    // ),
                    // array(
                    //     'id'         => 'youtube_url',
                    //     'name'       => __('YouTube URL', APP_TD),
                    //     'type'       => 'text',
                    //     'columns'    => 12,
                    //     'attributes' => array(
                    //         'style' => 'width: 100%;',
                    //     ),
                    // ),
                    array(
                        'id'         => 'facebook_app_id',
                        'name'       => __('Facebook App ID', APP_TD),
                        'type'       => 'text',
                        'desc'       => __('Ako získať Facebook ID a secret klúč. <a href="https://www.shoutmeloud.com/get-facebook-app-id-secret-key.html"
                        target="_blank" rel="noopener noreferrer">Zistíte v tomto článku</a>', APP_TD),
                        'columns'    => 6,
                        'attributes' => array(
                            'style' => 'width: 100%;',
                        ),
                    ),
                    array(
                        'id'         => 'facebook_app_secret',
                        'name'       => __('Facebook App SECRET KEY', APP_TD),
                        'type'       => 'text',
                        'columns'    => 6,
                        'attributes' => array(
                            'style' => 'width: 100%;',
                        ),
                    ),
                    array(
                        'type' => 'divider',
                    ),
                    array(
                        'id'      => 'gmaps_api_key',
                        'name'    => __('Google Maps API Key', APP_TD),
                        'type'       => 'text',
                        'desc'       => __('Ako získať Google MAPS API key zistíte napríklad tu ->
                            <a href="https://elfsight.com/blog/2018/06/how-to-get-google-maps-api-key-guide/" target="_blank" rel="noopener noreferrer">Ako získať google api key</a>', APP_TD),
                        'columns'    => 12,
                        'attributes' => array(
                            'style' => 'width: 100%;',
                        ),
                    ),

                ),
            );

            // Instagram feed
            $meta_boxes[] = array(
                'id' => 'settings_instagram',
                'title' => __('Instagram Feed', APP_TD),
                'settings_pages' => $page_id,
                'tab'            => 'social',

                'fields' => array(
                    array(
                        'id' => "enable_instagram_feed",
                        'name' => __('Zapnúť Instagram feed?', APP_TD),
                        'type' => 'switch',
                        'style'     => 'rounded',
                        'on_label'  => 'Yes',
                        'off_label' => 'No',
                        'columns' => 12,
                    ),
                    array(
                        'id' => "instagram_client_id",
                        'name' => __('Instagram Client ID', APP_TD),
                        'desc' => __('Ako získať ID? Pozrite tento návod:
                                <a href="https://codeofaninja.com/tools/find-instagram-user-id" target="_blank" rel="noopener noreferrer">Ako získať Instagram Client ID</a>', APP_TD),
                        'type' => 'text',
                        'columns' => 6,
                        'attributes' => array(
                            'style' => 'width: 100%;',
                        ),
                    ),
                    array(
                        'id' => "instagram_access_token",
                        'name' => __('Instagram Access Token', APP_TD),
                        'desc' => __('Ako získať Access Token? Pozrite tento návod:
                                <a href="https://elfsight.com/blog/2016/05/how-to-get-instagram-access-token/" target="_blank" rel="noopener noreferrer">Ako získať Access Token</a>', APP_TD),
                        'type' => 'text',
                        'columns' => 6,
                        'attributes' => array(
                            'style' => 'width: 100%;',
                        ),
                    ),
                ),
            );

            // 404 page
            $meta_boxes[] = array(
                'id'             => 'settings_404',
                'title'          => __('404 stránka', APP_TD),
                'settings_pages' => $page_id,
                'tab'            => 'error_404',

                'fields' => array(
                    array(
                        'id'      => '404_bg_img',
                        'name'    => __('Obrázok na pozadí', APP_TD),
                        'type'    => 'single_image',
                        'columns' => 12,
                    ),
                    array(
                        'id'      => '404_text',
                        'name'    => __('Text', APP_TD),
                        'type'       => 'textarea',
                        'rows'       => 4,
                        'columns'    => 12,
                        'attributes' => array(
                            'style' => 'width: 100%;',
                        ),
                    ),
                ),
            );

            // Blog
            $meta_boxes[] = array(
                'id'             => 'settings_blog',
                'title'          => __('Nastavenia blogu', APP_TD),
                'settings_pages' => $page_id,
                'tab'            => 'blog',

                'fields' => array(
                    array(
                        'id' => 'blog_main_title',
                        'name' => __('Nadpis sekcie', APP_TD),
                        'type' => 'text',
                        'desc' => __('Horný nadpis, ktorý sa zobrazuje na stránke blogu', APP_TD),
                        'columns' => 12,
                        'attributes' => array(
                            'style' => 'width: 100%;',
                        ),
                    ),
                    array(
                        'type' => 'divider',
                    ),
                    // array(
                    //     'id' => 'blog_products',
                    //     'name' => __('Produkty', APP_TD),
                    //     'type' => 'post',
                    //     'post_type' => 'product',
                    //     'field_type' => 'select_advanced',
                    //     'placeholder' => __('Vyberte si produkt zo zoznamu', APP_TD),
                    //     'columns' => 12,
                    //     'multiple' => true,
                    //     'query_args'  => array(
                    //         'post_status'    => 'publish',
                    //         'posts_per_page' => - 1,
                    //     ),
                    //     'js_options' => array(
                    //         'maximumSelectionLength' => 4,
                    //     ),
                    // ),
                ),
            );

            return $meta_boxes;
        });
    }
}
