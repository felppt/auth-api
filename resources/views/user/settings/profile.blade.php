<x-title size="sm">
    {{ __('Ваш профиль') }}
    <x-slot:description>
        {{ __('Посмотреть и изменить персональные данные') }}
    </x-slot:description>
</x-title>
<x-list>
    <x-list.item>
        <x-slot:name>
            {{ __('Ваше имя') }}
        </x-slot:name>
        <x-slot:value>
            {{ $user->getFullName() }}
        </x-slot:value>
        <x-slot:action>
            <x-link>{{ __('Изменить') }}</x-link>
        </x-slot:action>
    </x-list.item>
    <x-list.item>
        <x-slot:name>
            {{ __('Ваш пол') }}
        </x-slot:name>
        <x-slot:value>
            {{ $user->gender?->name() ?: 'Не указано' }}
        </x-slot:value>
        <x-slot:action>
            <x-link>{{ __('Изменить') }}</x-link>
        </x-slot:action>
    </x-list.item>
</x-list>
