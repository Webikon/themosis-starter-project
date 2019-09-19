@php
/**
 * Basic hero.
 *
 * string $data['title']
 * string $data['text']
 *
 * @author: Webikon
 */
@endphp

<div class="hero">
    <h2 class="hero__title">
        {!! $data['title'] !!}
    </h2>

    @isset ($data['text'])
        <div class="hero__text">
            {!! $data['text'] !!}
        </div>
    @endisset
</div>
