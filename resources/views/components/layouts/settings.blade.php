<x-layouts.user>
    <div class="md:items-center md:flex md:justify-between">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm-text-3xl sm-tracking-tight">
                {{ __('Настройки')}}</h2>
        </div>
    </div>
    {{ $slot }}
</x-layouts.user>
