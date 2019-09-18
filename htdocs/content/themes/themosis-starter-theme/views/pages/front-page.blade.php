@php
/**
 * Front page/homepage template.
 *
 * $page_data
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
        @include('_components.hero', [
            'data' => $page_data['hero_data'],
        ])
    @endwhile
@endsection
