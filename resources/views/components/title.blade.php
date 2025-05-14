<div>
    @isset($link)
        {{ $link }}
    @endisset

    <h1 class="h2 mb-5">
        {{ $slot }}
    </h1>
</div>
