<!doctype html>
<html {!! get_language_attributes() !!}>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @php wp_head() @endphp
    </head>

    <body @php body_class() @endphp>
        @php
        if (function_exists('gtm4wp_the_gtm_tag')) {
            gtm4wp_the_gtm_tag();
        }
        @endphp

        @php do_action('get_header') @endphp

        @include('_sections.header')

        <div class="container" role="document">
            @yield('content')
        </div>

        @php do_action('get_footer') @endphp

        @include('_sections.footer')

        @php wp_footer() @endphp
    </body>
</html>
