@props([
    'name' => '',
    'type' => 'text',
    'value' => '',
])

<input type="{{ $type }}" {{ $attributes }} name="{{ $name }}" value="{{ old($name, $value) }}" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300" >

<x-form.error name="{{ $name }}" />
