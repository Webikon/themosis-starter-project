@php
/**
 * Post meta partial.
 *
 * @author: Webikon
 */
@endphp

<div class="post-meta">
    <time class="post-meta__time" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>

    <p class="post-meta__byline">
        {{ __('By', 'sage') }}
        <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="post-meta__author">
            {{ get_the_author() }}
        </a>
    </p>
</div>
