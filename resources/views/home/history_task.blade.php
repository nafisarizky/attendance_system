<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task History</title>
    @include('home.css')
</head>
<body>
    <div class="container mt-4">
        <a href="{{ route('home.tugas') }}" class="btn btn-outline-primary mb-3">&larr; Back</a>
        <h1 class="mb-4 text-primary">📋 Task History</h1>

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                ✅ Your Completed Tasks
            </div>
            <div class="card-body">
                @if ($history->isEmpty())
                    <p class="text-muted text-center">⚠️ There is no completed task history.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover border">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Task Name</th>
                                    <th>Deadline</th>
                                    <th>Description</th>
                                    <th>Completed At</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history as $task)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-bold">{{ $task->title }}</td>
                                        <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</td>
                                        <td>{{ $task->description ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($task->completed_at)->format('d M Y, H:i') }}</td>
                                        <td>
                                            <span class="badge bg-success">Completed</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('home.js')
</body>
</html>
