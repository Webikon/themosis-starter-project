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
            <a class="site-logo__link" href="{{ $global_data['home_url'] }}">
                <img src="{{ $global_data['site_logo_url'] }}" alt="Logo">
            </a>
        </div>

        @include('_components.nav-primary', [
            'menu_items' => $global_data['primary_menu_items']
        ])
    </div>
</header>
