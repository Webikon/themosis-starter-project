@php
/**
 * Partial for page header displayed on almost every page.
 *
 * $data['title']
 * $data['text']
 *
 * @author: Webikon
 */
@endphp

<div class="hero">
    <h2 class="hero__title">
        {!! $data['title'] !!}
    </h2>

    @isset ($data['title'])
        <div class="hero__text">
            {!! $data['text'] !!}
        </div>
    @endisset
</div>
