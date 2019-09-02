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
                // Hero section
                // 'hero_title' => get_post_meta(get_the_ID(), 'hero_title', true),

                // Benefits section
                // 'benefits_title' => get_post_meta(get_the_ID(), 'benefits_title', true),
                // 'benefits_desc' => get_post_meta(get_the_ID(), 'benefits_desc', true),
                // 'benefits_items' => get_post_meta(get_the_ID(), 'benefits_items', true),

                'newest_books_query' => self::getNewestBooksQuery(), // Use helper method when getting more complex data
            ]
        ]);
    }

    /**
     * Handle generic pages.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function page()
    {
        return view('pages.page');
    }


    /**
     * Handle custom template page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return view('pages.template-contact', [
            'page_data' => [

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
        ];

        $query = new WP_Query($args);

        return $query;
    }
}
