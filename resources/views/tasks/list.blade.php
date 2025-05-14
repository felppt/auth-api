@if (isset($tasks))
    @foreach ($tasks as $index => $task)
        <div class="task" data-id="{{ $task->id }}">

            <div>
                <input type="checkbox" class="task-status form-check-input xl" data-id="{{ $task->id }}" @checked($task->status->value == 'completed') />
            </div>

            <div class="task-content">
                <div class="task-title">{{ $task->name }}</div>
                <div class="task-description">{{ Str::limit($task->description, 100) }}</div>
                <div class="task-date">
                    {{ (new DateTime($task->date))->format('d.m.Y H:i') }}
                </div>
            </div>
        </div>
    @endforeach

    {{ $tasks->onEachSide(0)->links('pagination.default') }}
@endif
