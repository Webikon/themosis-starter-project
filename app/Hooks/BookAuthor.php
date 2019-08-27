<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Taxonomy;

class BookAuthor extends Hookable
{
    /**
     * Register new custom post type.
     * We can also do other operations here.
     */
    public function register()
    {
        $this->registerTaxonomy();
    }

    /**
     * Handle registration.
     */
    protected function registerTaxonomy()
    {
        return Taxonomy::make('author', 'book', __('Authors', APP_TD), __('Author', APP_TD))
            ->setArguments([
                'public' => true,
                'hierarchical' => true,
                'show_tagcloud' => false,
            ])
            ->set();
    }
}
