@php
/**
* Default single post content partial.
*
* @author: Webikon
*/
@endphp

<article @php post_class('post-article') @endphp>
    <header class="post-article__header">
        <h1 class="post-article__title">{!! get_the_title() !!}</h1>

        @include('_components/post-meta')
    </header>

    <div class="post-article__content">
        @php the_content() @endphp
    </div>

    <footer class="post-article__footer">
        {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav">
                <p>' . __('Pages:', 'sage'), 'after' => '</p>
            </nav>'])
        !!}
    </footer>
</article>
