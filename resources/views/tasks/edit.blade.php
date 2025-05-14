
<x-task.form :action="route('tasks.update', $task->id)" method="PUT" :task="$task" :statuses="$statuses" />

