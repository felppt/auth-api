@props([
    'name' => '',
    'type' => 'text',
])

<input type="{{ $type }}" {{ $attributes }} name="{{ $name }}" value="{{ old($name)}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300" >

<x-form.error name="{{ $name }}" />
