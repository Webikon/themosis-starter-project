@php
/**
 * Default page template.
 *
 * @author: Webikon
 */
@endphp

@extends('_layouts.app')

@section('content')
    @while(have_posts()) @php the_post() @endphp
        @include('_components.content-page')
    @endwhile
@endsection
