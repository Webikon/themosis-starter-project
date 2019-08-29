@php
/**
 * Demo block partial used in Gutenberg.
 *
 * Required passed variables:
 *  $title
 *  $img_url
 *  $content
 *
 * @author: Webikon
 */
@endphp
<div class="demo-block">
    <h1>{{ $title ?? 'Dummy title' }}</h1>

    @if ($img_url)
        <img src="{{ $img_url }}" alt="">
    @endif

    {!! $content ?? 'Dummy content' !!}
</div>
