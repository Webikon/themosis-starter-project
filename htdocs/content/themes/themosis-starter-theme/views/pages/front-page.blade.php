@php
/**
 * Front page/homepage template.
 *
 * @author: Webikon
 */
@endphp

@extends('_layouts.app')

@section('content')
    @include('_components.page-header')

    @if (!have_posts())
        <div class="alert alert-warning">
            {{ __('Sorry, no results were found.', 'sage') }}
        </div>
    @endif

    @while (have_posts()) @php the_post() @endphp
        @include('_components.teaser-post')
    @endwhile

    {!! get_the_posts_navigation() !!}
@endsection
