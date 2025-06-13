<x-layouts.auth>
    <x-slot:title>
        {{ __('Вход в аккаунт') }}

        @auth
            <div class="py-4 text-center">
                {{ Auth::user()?->email }}
            </div>
        @endauth

    </x-slot:title>



    <x-slot:slot>
        <x-card.index>
            <x-card.body>
                <x-form action="{{ route('login.store') }}" method="POST">

                    <x-form.item>
                        <x-form.label for="email">
                            {{ __('Ваш email') }}
                        </x-form.label>
                        <x-form.text type="email" name="email" value="{{ old('email') }} placeholder="mail@email.com" autocomplete="email"
                            required />
                    </x-form.item>
                    <x-form.item>
                        <x-form.label for="password">
                            {{ __('Ваш пароль') }}
                        </x-form.label>
                        <x-form.text type="password" name="password" autocomplete="password" required />
                    </x-form.item>

                    <x-form.item>
                        <x-form.check name="remember">
                            {{ __('Запомнить меня') }}
                        </x-form.check>
                    </x-form.item>
                    <x-form.item>
                        <x-button type="submit">
                            {{ __('Войти') }}
                        </x-button>
                    </x-form.item>
                </x-form>
            </x-card.body>
        </x-card.index>

    </x-slot:slot>

    <x-slot:crossLink>
        {{ __('Нет аккаунта?') }}
        <x-link href="{{ route('registration') }}">{{ __('Зарегистрироваться') }}</x-link>
    </x-slot:crossLink>

</x-layouts.auth>
