@php
    $taskStatus = $task->status;
@endphp

<div class="mail-contents-subject">
    <input type="checkbox" class="task-status form-check-input xl" data-id="{{ $task->id }}"  @checked($task->status->value == 'completed') />
    <div class="mail-contents-title">{{ $task->name }}</div>
</div>

<div class="mail-time">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-clock">
        <circle cx="12" cy="12" r="10"></circle>
        <path d="M12 6v6l4 2"></path>
    </svg>
    {{ (new DateTime($task->date))->format('d-m-Y H:i:s') }}
</div>

<div class="mail-inside">
    {{ $task->description }}
</div>


@if ($task->is_urgent)
    <div style="background: red; padding: 5p 0; color: white;">Срочная</div>
@endif

<div class="mail-checklist">
    {{-- <input type="checkbox" name="msg" id="mail30" class="mail-choice" @checked($taskStatus === 'completed') /> --}}
    <label for="mail30">{{ __('Status: ') }} <span id="task-status-name">{{ $taskStatus->label() }}</span></label>
    <div class="mail-checklist-date"></div>
</div>


<div class="mail-actions">~
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather delete-task" data-id="{{ $task->id }}">
        <path d="M3 6h18M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2M10 11v6M14 11v6">
        </path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-edit" data-task-url="{{ route('tasks.edit', $task->id) }}">
        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-heart" data-task-url="{{ route('tasks.edit', $task->id) }}">
        <path
            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
    </svg>

</div>
