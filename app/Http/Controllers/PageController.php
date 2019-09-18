<?php

namespace App\Http\Controllers;

use App\Book;
use App\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PageController extends Controller
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
                'content' => apply_filters('the_content', $post->post_content),

                // Hero section
                'hero_data' => [
                    'title' => get_post_meta(get_the_ID(), 'hero_title', true),
                    'text' => get_post_meta(get_the_ID(), 'hero_text', true),
                ],

                // Benefits section
                'benefits_data' => [
                    // 'title' => get_post_meta(get_the_ID(), 'benefits_title', true),
                    // 'desc' => get_post_meta(get_the_ID(), 'benefits_desc', true),
                    // 'items' => get_post_meta(get_the_ID(), 'benefits_items', true),
                ],

                // 'newest_books_query' => self::getNewestBooksQuery(), // Use helper method when getting more complex data
            ]
        ]);
    }

    /**
     * Handle generic pages.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function page(\WP_Post $post)
    {
        return view('pages.page', [
            'page_data' => [
                'title' => get_the_title($post->ID),
                'content' => apply_filters('the_content', $post->post_content),
            ],
        ]);
    }


    /**
     * Handle custom template page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function contact(\WP_Post $post)
    {
        return view('pages.template-contact', [
            'page_data' => [
                'title' => get_the_title($post->ID),
                'content' => apply_filters('the_content', $post->post_content),

                'hero_data' => [
                    'title' => 'Custom hero title',
                    'text' => 'Custom hero text',
                ],
            ],
        ]);
    }

    /**
     * Handle 404 page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function error404()
    {
        return view('pages.404');
    }


    /**
     * Get 3 latest books.
     *
     * @return array WP_Query
     */
    public static function getNewestBooksQuery()
    {
        $args = [
            'post_type' => 'book',
            'posts_per_page' => 3,
            'fields' => 'ids',
        ];

        $query = new \WP_Query($args);

        return $query;
    }
}
