@props([
    'action' => '#',
    'method' => 'POST',
    'task' => null,
    'statuses' => [],
    'button' => 'Edit',
])

<form action="{{ $action }}" method="POST" {{ $attributes }}>
    @csrf

    @if ($method !== 'POST')
        @method($method)
    @endif

    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $task->name ?? '')" required
            autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <!-- Description -->
    <div>
        <x-input-label for="description" :value="__('Description')" />
        <x-textarea id="description" class="block mt-1 w-full" name="description">
            {{ old('description', $task->description ?? '') }}
        </x-textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
    <!-- Status -->
    <div>
        <x-input-label for="status" :value="__('Status')" />
        <select id="status" name="status"
            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @foreach ($statuses as $status)
                <option value="{{ $status->value }}" @selected(old('status', $task->status?->value ?? 'new') == $status->value)>
                    {{ $status->label() }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('status_id')" class="mt-2" />
    </div>

    <!--  Date  -->
    <div>
        <x-input-label for="date" :value="__('Date')" />
        <x-input type="date" id="date" class="block mt-1 w-full" name="date" :value="old('date', $task->date ?? '')"
            autocomplete="date" />
        <x-input-error :messages="$errors->get('date')" class="mt-2" />
    </div>

    <!--  Category  -->
    <div>
        <x-input-label for="category" :value="__('Category')" />
        <x-input type="text" id="category" class="block mt-1 w-full" name="category" :value="old('category', $task->category->name ?? '')" />
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>
    <div>
        <x-primary-button class="ms-6 mt-3">
            {{ __($button) }}
        </x-primary-button>

    </div>
</form>
