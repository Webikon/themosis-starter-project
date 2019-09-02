<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Handle blog main page / blog archive.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('blog.blog');
    }

    /**
     * Handle single post.
     *
     * @param \WP_Post $post
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function single(\WP_Post $post)
    {
        return view('blog.single-post', [
            'page_data' => [

            ],
        ]);
    }

    /**
     * Handle search page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        return view('blog.search', [
            'searched_terms' => $request->get('s'),
        ]);
    }
}
