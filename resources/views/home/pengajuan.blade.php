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
    <div class="container">
        <a href="{{route('home')}}" class="btn btn-outline-primary mb-3">&larr; Back</a>
        <div class="card">
            <h2 class="text-center">Submission Form</h2>
            <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category" class="form-select" required>
                        <option value="Dinas">Dinas</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Izin">Izin</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="reason" class="form-label">Reason</label>
                    <textarea id="reason" placeholder="Enter your reason" name="reason" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="proof" class="form-label">Proof (Optional)</label>
                    <input type="file" id="proof" name="proof" class="form-control">
                </div>
                <button type="submit" class="btn btn-custom w-100">Submit</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="table-responsive mt-4">
            <h2 class="text-center">Submission Active</h2>
            @if ($pengajuan->isEmpty())
                <p class="text-center">No active submissions.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Reason</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuan as $pengajuans)
                            <tr>
                                <td>{{ ucfirst($pengajuans->category) }}</td>
                                <td>{{ $pengajuans->start_date }}</td>
                                <td>{{ $pengajuans->end_date }}</td>
                                <td>{{ $pengajuans->reason }}</td>
                                <td>
                                    <span class="badge bg-{{ $pengajuans->status == 'approved' ? 'success' : ($pengajuans->status == 'pending' ? 'warning' : 'danger') }}">
                                        {{ ucfirst($pengajuans->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <div class="text-center">
                <a class="btn btn-custom" href="{{ url('history_pengajuan') }}">View History</a>
            </div>
        </div>
    </div>

    @include('home.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
