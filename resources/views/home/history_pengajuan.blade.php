<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
</head>
<body>
    <div class="container mt-4">
        <a href="{{ route('home.pengajuan') }}" class="btn btn-outline-primary mb-3">&larr; Back</a>
        <h1 class="mb-4 text-primary">📜 Submission History</h1>

        @if (session('success'))
            <div class="alert alert-success">
                🎉 {{ session('success') }}
            </div>
        @endif

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                📌 Your Submission History
            </div>
            <div class="card-body">
                @if ($pengajuan->isEmpty())
                    <p class="text-muted text-center">⚠️ There is no history of submissions.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover border">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Category</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuan as $item)
                                    @php
                                        $statusColor = match($item->status) {
                                            'Approved' => 'success',
                                            'Rejected' => 'danger',
                                            default => 'warning',
                                        };
                                    @endphp
                                    <tr>
                                        <td class="fw-bold">{{ $item->category }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->end_date)->format('d M Y') }}</td>
                                        <td>{{ $item->reason ?? '-' }}</td>
                                        <td>
                                            <span class="badge bg-{{ $statusColor }}">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y, H:i') }}</td>
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
