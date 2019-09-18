@php
/**
 * Post meta partial.
 *
 * $data['time']
 * $data['date']
 * $data['author_name']
 * $data['author_url']
 *
 * @author: Webikon
 */
@endphp

<div class="post-meta">
    <time class="post-meta__time" datetime="{{ $data['time'] }}">{{ $data['date'] }}</time>

    <p class="post-meta__byline">
        {{ __('By', 'sage') }}
        <a href="{{ $data['author_url'] }}" rel="author" class="post-meta__author">
            {{ $data['author_name'] }}
        </a>
    </p>
</div>
