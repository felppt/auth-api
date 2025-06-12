@props([
    'to' => '#',
])

<a href="{{ $to }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">{{ $slot }}</a>
