@php
/**
 * Primary menu.
 *
 * array $menu_items
 *
 * @author: Webikon
 */

@endphp

@isset ($menu_items)
    <nav class="nav-primary">
        @foreach ($menu_items as $menu_item)
            @php
                $target = isset($menu_item['target']) ? 'target="' . $menu_item['target'] . '"' : '';
            @endphp

            <div class="nav-primary__item">
                <a href="{{ $menu_item['url'] }}" class="nav-primary__link" {!! $target !!}>{{ $menu_item['title'] }}</a>
            </div>
        @endforeach
    </nav>
@endisset
