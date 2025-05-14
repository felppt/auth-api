@extends('layouts.main')

@section('page.title', 'Tasks')

@section('main.content')
    <x-container>
        <div class="main-area">
            <x-tasks.header>
                <x-search-bar>
                    <input type="text" placeholder="Search...">
                </x-search-bar>

            </x-tasks.header>

            <x-tasks.main-container>

                <div style="display: flex; flex-direction: column;">
                    <select id="categories" style="font-size: 24px;position: sticky;top: 1px;">
                        <option value="">Все категории</option>
                        @if (isset($categories))
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>

                    <div id="tasks" style="overflow: auto"></div>

                    <x-task.button-add>
                        {{ __('Add task') }}
                    </x-task.button-add>
                </div>

                <x-task.detail>

                    <x-task.contents />

                </x-task.detail>
            </x-tasks.main-container>

        </div>
    </x-container>

@endsection
