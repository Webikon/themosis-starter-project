@php
/**
 * Partial for global website header.
 *
 * @author: Webikon
 */
@endphp

<header class="header">
    <div class="container">
        <div class="site-logo">
            <a class="site-logo__link" href="{{ home_url('/') }}">
                {{ get_bloginfo('name', 'display') }}
            </a>
        </div>

        <nav class="nav-primary">
            @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
            @endif
        </nav>
    </div>
</header>
