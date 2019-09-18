@php
/**
 * Post teaser used in loops.
 *
 * $data['title']
 * $data['link']
 * $data['excerpt']
 *
 * @author: Webikon
 */
@endphp

<article class="teaser-post">
    <header class="teaser-post__header">
        <h2 class="teaser-post__title">
            <a href="{{ $data['link'] }}" class="teaser-post__title-link">{!! $data['title'] !!}</a>
        </h2>

        @include('_components/post-meta')
    </header>

    <div class="teaser-post__content">
        {!! $data['excerpt'] !!}
    </div>
</article>
