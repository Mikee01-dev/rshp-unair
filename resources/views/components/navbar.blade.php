<nav>
    <ul>
        @php
            $menus = [
                ['name' => 'Home', 'url' => '/'],
                ['name' => 'Layanan', 'url' => '/layanan'],
                ['name' => 'Kontak', 'url' => '/kontak'],
                ['name' => 'Struktur', 'url' => '/struktur'],
                ['name' => 'Login', 'url' => '/login'],
            ];
        @endphp

        @foreach ($menus as $menu)
            <li>
                <a href="{{ $menu['url'] }}"
                   class="{{ request()->is(ltrim($menu['url'], '/')) ? 'active' : '' }}">
                    {{ $menu['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>
