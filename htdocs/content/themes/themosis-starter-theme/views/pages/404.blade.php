@php
/**
 * Default 404 template.
 *
 * @author: Webikon
 */
@endphp

@extends('_layouts.app')

@section('content')
    @include('_components.page-header')

    @if (!have_posts())
        <div class="alert alert-warning">
            {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
        </div>
    @endif
@endsection
