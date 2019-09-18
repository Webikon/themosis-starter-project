@php
/**
 * Default page content partial.
 *
 * $page_data['title']
 * $page_data['content']
 *
 * @author: Webikon
 */
@endphp

<article class="page-article">
    @include('_components.page-header')

    <div class="page-article__content">
        {!! $page_data['content'] !!}
    </div>
</article>

