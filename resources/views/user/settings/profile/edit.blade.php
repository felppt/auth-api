<x-layouts.settings>
    <x-title size="sm">
        {{ __('Изменить профиль') }}
        <x-slot:description>
            {{ __('Введите новые персональные данные') }}
        </x-slot:description>
    </x-title>
    <x-form action="{{ route('user.settings.profile.update') }}" method="POST">
        <x-list>
            <x-list.item>
                <x-slot:name>
                    {{ __('Имя') }}
                </x-slot:name>
                <x-slot:value>
                    <div class="grid grid-cols-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-form.text name="first_name" :value="$user->first_name" />
                        </div>
                    </div>
                </x-slot:value>

            </x-list.item>
            <x-list.item>
                <x-slot:name>
                    {{ __('Фамилия') }}
                </x-slot:name>
                <x-slot:value>
                    <div class="grid grid-cols-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-form.text name="second_name" :value="$user->second_name" />
                        </div>
                    </div>
                </x-slot:value>

            </x-list.item>
            <x-list.item>
                <x-slot:name>
                    {{ __('Отчество') }}
                </x-slot:name>
                <x-slot:value>
                    <div class="grid grid-cols-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-form.text name="last_name" :value="$user->last_name" />
                        </div>
                    </div>
                </x-slot:value>

            </x-list.item>
            <x-list.item>
                <x-slot:name>
                    {{ __('Ваш пол') }}
                </x-slot:name>
                <x-slot:value>
                    <div class="grid grid-cols-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-form.select name="gender" :value="$user->gender?->value" :options="App\Enums\GenderEnum::select()" />
                        </div>
                    </div>
                </x-slot:value>
                <x-slot:action>

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
