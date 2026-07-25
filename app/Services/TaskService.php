<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    public function getAllTasks(): Collection
    {
        return Task::all();
    }

    public function createTask(Task $task): Task
    {
        $task->title = trim($task->title);

        $task->save();

        return $task;
    }

    public function toggleTask(int $id): Task
    {
        $task = Task::findOrFail($id);

        $task->is_completed = !$task->is_completed;

        $task->save();

        return $task;
    }

    public function deleteTask(int $id): void
    {
        $task = Task::findOrFail($id);

        $task->delete();
    }
}
