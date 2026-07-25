<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }


    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task = new Task();
        $task->title = $request->input('title');

        $createdTask = $this->taskService->createTask($task);
        return response()->json($createdTask, 201);
    }

    public function toggle(int $id)
    {
        $updatedTask = $this->taskService->toggleTask($id);

        return response()->json($updatedTask, 200);
    }

    public function destroy(int $id)
    {
        $this->taskService->deleteTask($id);
        return response()->json(['message' => 'Task deleted'], 200);
    }
}
