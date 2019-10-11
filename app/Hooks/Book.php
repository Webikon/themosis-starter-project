<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\PostType\Contracts\PostTypeInterface;
use Themosis\Support\Facades\PostType;

class Book extends Hookable
{
    /**
     * Register new custom post type.
     * We can also do other operations here.
     */
    public function register()
    {
        $this->registerPostType();
    }

    /**
     * Register a custom post type in order to handle
     * a collection of books within the WordPress administration.
     *
     * @return PostTypeInterface
     */
    protected function registerPostType(): PostTypeInterface
    {
        return PostType::make('book', __('Books', APP_TD), __('Book', APP_TD))
            ->setArguments([
                'public' => true,
                'rewrite' => [
                    'slug' => __('books', APP_TD)
                ],
                'has_archive' => true,
                'supports' => [
                    'title',
                    'editor',
                    'excerpt',
                    'thumbnail'
                ],
                'menu_icon' => 'dashicons-book'
            ])
            ->setLabels([
                'menu_name' => __('Books Manager', APP_TD)
            ])
            ->set();
    }
}
