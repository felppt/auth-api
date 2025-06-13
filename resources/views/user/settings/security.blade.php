<div class="security">
    <x-title size="sm">
        {{ __('Безопасность') }}
        <x-slot:description>
            {{ __('Настройки безопасности Вашего аккаунта') }}
        </x-slot:description>
    </x-title>
    <x-list>
        <x-list.item>
            <x-slot:name>
                {{ __('Пароль') }}
            </x-slot:name>
            <x-slot:value>
                @if ($user->password_changed_at)
                    {{ __('Пароль изменен') }} {{ $user->password_changed_at->diffForHumans() }}
                @else
                    {{ __('Пароль не изменялся') }}
                @endif
            </x-slot:value>
            <x-slot:action>
                <x-link href="{{ route('user.settings.password.edit') }}">{{ __('Изменить') }}</x-link>
            </x-slot:action>
        </x-list.item>

    </x-list>

</div>
