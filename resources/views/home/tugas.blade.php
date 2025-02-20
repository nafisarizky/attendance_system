<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            margin-top: 40px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background: white;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-custom {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
            text-decoration: none;
            display: inline-block;
        }

        .btn-custom:hover {
            background: #0056b3;
        }

        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background: white;
            padding: 20px;
        }

        .table th {
            background: #007bff;
            color: white;
            text-align: center;
        }

        .table td {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <a href="{{route('home')}}" class="btn btn-outline-primary mb-3">&larr; Back</a>
        <div class="card mb-4">
            <h2 class="text-center">Task Management</h2>
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Task Title</label>
                        <input type="text" placeholder="Task Title" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" name="due_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" placeholder="Description" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="table-responsive mt-4">
            <h2 class="text-center">Task List</h2>
            @if ($tasks->isEmpty())
                <p class="text-center">Nothing task.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Task Name</th>
                            <th>Due Date</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->due_date }}</td>
                                <td>{{ $task->description }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTaskModal-{{ $task->id }}">Edit</button>
                                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-sm">Mark Complete</button>
                                    </form>
                                    <form action="{{ route('hapus_tugas', $task->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Task Modal -->
                            <div class="modal fade" id="editTaskModal-{{ $task->id }}" tabindex="-1" aria-labelledby="editTaskLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editTaskLabel">Edit Task</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Task Title</label>
                                                    <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="due_date" class="form-label">Due Date</label>
                                                    <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea name="description" class="form-control" rows="4" required>{{ $task->description }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Task</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <div class="text-center">
                <a class="btn btn-custom" href="{{ url('history_task') }}">History</a>
            </div>
        </div>
    </div>

    @include('home.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
