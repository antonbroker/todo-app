<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">Task Manager</h1>

        <form id="task-form" class="mb-4">
            <div class="input-group">
                <input
                    type="text"
                    id="task-title"
                    class="form-control"
                    placeholder="Enter task title"
                >

                <button type="submit" class="btn btn-primary">
                    Add Task
                </button>
            </div>
        </form>

        <ul class="list-group" id="task-list">
            @foreach ($tasks as $task)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $task->title }}</strong>

                        <span class="badge bg-secondary">
                            {{ $task->is_completed ? 'Completed' : 'Pending' }}
                        </span>
                    </div>

                    <div>
                        <button class="btn btn-sm btn-warning">
                            Toggle
                        </button>

                        <button class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
