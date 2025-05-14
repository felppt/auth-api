@props(['route' => null])

<a {{ $attributes->class([
    'nav-link',
    isActiveLink($route) ? "active" : "",
    ])->merge([
    'href' =>   $route ?? '#',
]) }}>
    {{ $slot }}
</a>
