<x-layouts.settings>
    <x-title size="sm">
        {{ __('Изменить пароль') }}
        <x-slot:description>
            {{ __('Введите текущий и новый пароли.') }}
        </x-slot:description>
    </x-title>
    <x-form action="{{ route('user.settings.password.update') }}" method="POST">
        <x-list>
            <x-list.item>
                <x-slot:name>
                    {{ __('Текущий пароль') }}
                </x-slot:name>
                <x-slot:value>
                    <div class="grid grid-cols-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-form.text type="password" name="current_password" autofocus/>
                        </div>
                    </div>
                </x-slot:value>

            </x-list.item>
            <x-list.item>
                <x-slot:name>
                    {{ __('Новый пароль') }}
                </x-slot:name>
                <x-slot:value>
                    <div class="grid grid-cols-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-form.text type="password" name="password"/>
                        </div>
                    </div>
                </x-slot:value>
            </x-list.item>

        </x-list>

        <x-form.footer>
            <x-slot:buttons>
                <x-button href="{{ route('user.settings') }}" color="white" >{{ __('Отменить') }}</x-button>
                <x-button type="submit">{{ __('Сохранить') }}</x-button>
            </x-slot:buttons>
        </x-form.footer>
    </x-form>

</x-layouts.settings>
