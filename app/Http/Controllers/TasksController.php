<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;
use App\Enums\TaskStatus;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all('id', 'name');

        return view('tasks.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = TaskStatus::cases();

        return view('tasks.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = validate(
            $request->all(),
            [
                'name' => 'required|string|max:128',
                'description' => 'nullable|string|max:1056',
                'status' => [Rule::enum(TaskStatus::class)],
                'date' => 'nullable|date',
                'is_urgent' => 'nullable|bool',
                'category' => 'required|string|max:128',
            ]
        );
        $category = Category::firstOrCreate([
            'name' => Str::lower($validated['category']),
        ]);
        $task = Task::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
            'status' => $validated['status'],
            'is_urgent' => $validated['is_urgent'] ?? false,
            'date' => $validated['date'] ?? new Carbon('now'),
            'category_id' => $category->id,
        ]);

        return redirect()->route('tasks');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.task-details', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::with('category')
            ->findOrFail($id);
        $statuses = TaskStatus::cases();

        return view('tasks.edit', compact('task', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = validate(
            $request->all(),
            [
                'name' => 'required|string|max:128',
                'description' => 'nullable|string|max:1056',
                'status' => [Rule::enum(TaskStatus::class)],
                'date' => 'nullable|date',
                'is_urgent' => 'nullable|bool',
                'category' => 'required|string|max:128',
            ]
        );
        $category = Category::firstOrCreate([
            'name' => Str::lower($validated['category']),
        ]);
        $task = Task::find($id);
        if (!$task) {
            return redirect()->back(404);
        }
        $task->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
            'status' => $validated['status'],
            'is_urgent' => $validated['is_urgent'] ?? false,
            'date' => $validated['date'] ?? new Carbon('now'),
            'category_id' => $category->id,
        ]);

        return redirect()->route('tasks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        if (Task::destroy($id)) {
            return response('OK', 200)
                ->header('Content-Type', 'text/plain');
        }

        return response('FAIL', 500)
            ->header('Content-Type', 'text/plain');
    }

    public function getCategoryTasks(Request $request)
    {
        $categoryId = $request->input('category_id');

        $tasksQuery = Task::with('category');

        if ($categoryId) {
            $tasksQuery->where('category_id', $categoryId);
        }

        $tasks = $tasksQuery->paginate(8)->onEachSide(2);

        return view('tasks.list', compact("tasks"));
    }

    public function setComplete(Request $request)
    {
        $validated = validate(
            $request->all(),
            [
                'id' => 'required|int',
                'value' => 'required|bool',
            ]
        );

        $task = Task::findOrFail($validated['id']);
        $task->status = $validated['value'] ? 'completed' : 'in_progress';
        $task->save();

        return response()->json([
            'id' => $task->id,
            'value' => $validated['value'],
            'status' => $task->status,
        ]);
    }
}
