@php
/**
 * Custom template.
 *
 * Template Name: Contact
 *
 * @author: Webikon
 */
@endphp

@extends('_layouts.app')

@section('content')
    @while(have_posts()) @php the_post() @endphp
        @include('_components.hero', [
            'data' => $page_data['hero_data'],
        ])

        @include('_sections.page-article')
    @endwhile
@endsection
