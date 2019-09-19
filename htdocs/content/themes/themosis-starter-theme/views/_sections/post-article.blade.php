@php
/**
 * Default single post content partial.
 *
 * string $page_data['title']
 * string $page_data['content']
 *
 * @author: Webikon
 */

@endphp

<article @php post_class('post-article') @endphp>
    <header class="post-article__header">
        <h1 class="post-article__title">{!! $page_data['title'] !!}</h1>

        @include('_components/post-meta', [
            'data' => $page_data,
        ])
    </header>

    <div class="post-article__content">
        {!! $page_data['content'] !!}
    </div>
</article>
