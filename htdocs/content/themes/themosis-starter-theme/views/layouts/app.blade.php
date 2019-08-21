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

    @include('partials.header')

    <div class="container" role="document">
      <div class="row">
        <main class="col-8">
          @yield('content')
        </main>

        @if (App\display_sidebar())
          <aside class="col-4">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    </div>

    @php do_action('get_footer') @endphp

    @include('partials.footer')

    @php wp_footer() @endphp
  </body>
</html>
