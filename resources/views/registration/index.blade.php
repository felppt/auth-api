<x-layouts.auth>
    <x-slot:title>
        {{ __('Регистрация аккаунта') }}
    </x-slot:title>

    <x-slot:slot>
        <x-card.index>
            <x-card.body>
                <x-form action="{{ route('registration.store') }}" method="POST">
                    <x-form.item>
                        <x-form.label for="first_name">
                            Ваше Имя
                        </x-form.label>
                        <x-form.text type="text" name="first_name" placeholder="Катенак Мишуля" autofocus required />

                    </x-form.item>
                    <x-form.item>
                        <x-form.label for="email">
                            Ваш email
                        </x-form.label>
                        <x-form.text type="email" name="email" placeholder="mail@email.com" autocomplete="email" required />
                    </x-form.item>
                    <x-form.item>
                        <x-form.label for="password">
                            Ваш password
                        </x-form.label>
                        <x-form.text type="password" name="password" autocomplete="password" required />
                    </x-form.item>
                    <x-form.item>
                        <x-form.label for="password_confirmation">
                            {{ __('Повторите Ваш пароль') }}
                        </x-form.label>
                        <x-form.text type="password" name="password_confirmation" autocomplete="password" required />
                    </x-form.item>
                    <x-form.item>
                        <x-form.check name="agreement">
                            {{ __('Ознакомился и согласен') }}
                        </x-form.check>
                    </x-form.item>
                    <x-form.item>
                        <x-button type="submit">
                            {{ __('Зарегистрироваться') }}
                        </x-button>
                    </x-form.item>

                    {{-- <div class="mt-10 text-center text-sm text-gray-500">
                        {{ __('Уже зарегистрированы?') }}
                        <a href="{{ route('login') }}"
                            class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">{{ __('Войти в аккаунт') }}</a>
                    </div> --}}
                </x-form>
            </x-card.body>
        </x-card.index>

    </x-slot:slot>

    <x-slot:crossLink>
        {{ __('Уже зарегистрированы?') }}
        <x-link to="{{ route('login')}}">{{ __('Войти в аккаунт') }}</x-link>
    </x-slot:crossLink>
    
</x-layouts.auth>
