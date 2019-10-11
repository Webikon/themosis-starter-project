<?php

namespace App\Http\Controllers;

class HomepageController extends Controller
{
    /**
     * Handle front page/homepage.
     *
     * @param \WP_Post $post
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function front(\WP_Post $post)
    {
        return view('pages.front-page', [
            'page_data' => [
                'title' => get_the_title($post->ID),

                'hero_data' => [
                    'title' => get_post_meta($post->ID, 'hero_title', true),
                    'text' => get_post_meta($post->ID, 'hero_text', true),
                ],

                'featured_posts_ids' => self::getFeaturedPostsIds(),
            ]
        ]);
    }

    /**
     * Get 3 latest books.
     *
     * @return array ids
     */
    public static function getFeaturedPostsIds()
    {
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 3,
            'fields' => 'ids',
        ];

        $ids = get_posts($args);

        return $ids;
    }
}
