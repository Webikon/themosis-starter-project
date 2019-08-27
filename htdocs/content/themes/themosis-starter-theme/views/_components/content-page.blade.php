@php
/**
 * Default page content partial.
 *
 * @author: Webikon
 */
@endphp

<article class="page-article">
    @include('_components.page-header')

    <div class="page-article__content">
        @php the_content() @endphp
    </div>

    <footer class="page-article__footer">
        {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
    </footer>
</article>

