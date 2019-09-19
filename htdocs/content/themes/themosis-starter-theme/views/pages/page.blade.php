@php
/**
 * Default page template.
 *
 * array $page_data
 *
 * @author: Webikon
 */
@endphp

@extends('_layouts.app')

@section('content')
    @while(have_posts()) @php the_post() @endphp
        @include('_sections.page-article')
    @endwhile
@endsection
