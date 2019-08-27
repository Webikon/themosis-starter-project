@php
/**
 * Post teaser used in loops.
 *
 * @author: Webikon
 */
@endphp

<article class="teaser-post">
    <header class="teaser-post__header">
        <h2 class="teaser-post__title">
            <a href="{{ get_permalink() }}" class="teaser-post__title-link">{!! get_the_title() !!}</a>
        </h2>

        @include('_components/post-meta')
    </header>

    <div class="teaser-post__content">
        @php the_excerpt() @endphp
    </div>
</article>
