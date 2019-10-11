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
            // 'promo' => Book::find($promoBookId),
            // 'books' => Book::where('post_status', 'publish')
            //     ->whereNotIn('ID', [$promoBookId])
            //     ->inRandomOrder()
            //     ->take(3)
            //     ->get(),
            // 'news_url' => ('page' === get_option('show_on_front'))
            //     ? get_permalink(get_option('page_for_posts'))
            //     : get_home_url(),
            // 'latest_articles' => Post::where('post_status', 'publish')
            //     ->orderby('post_date', 'desc')
            //     ->take(2)
            //     ->get()
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
            // 'members' => Teammate::where('post_status', 'publish')
            //     ->get(),
            // 'latest_articles' => Post::where('post_status', 'publish')
            //     ->orderby('post_date', 'desc')
            //     ->take(2)
            //     ->get()
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
}
