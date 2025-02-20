<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <title>Attendance History</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            padding: 20px;
            border-radius: 10px;
            background: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-hover tbody tr:hover {
            background-color: #eaf2ff;
        }

        /* Warna khusus untuk hari ini */
        .today-row {
            background-color: #ffeedb !important;
            font-weight: bold;
        }
    </style>
</head>
<body>
    @include('home.header')
    <div class="container mt-4">
        <div class="card">
            <h1 class="text-center text-primary mb-4">Attendance History</h1>

            <form method="GET" action="{{ route('history') }}">
                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label><b>Filter:</b></label>
                        <select name="filter" id="filterType" class="form-control">
                            <option value="today" {{ $filterType == 'today' ? 'selected' : '' }}>Today</option>
                            <option value="date" {{ $filterType == 'date' ? 'selected' : '' }}>Select Date</option>
                            <option value="month" {{ $filterType == 'month' ? 'selected' : '' }}>Month</option>
                            <option value="all" {{ $filterType == 'all' ? 'selected' : '' }}>All</option>
                        </select>
                    </div>
                    <div class="col-md-3" id="dateFilter" style="display: {{ $filterType == 'date' ? 'block' : 'none' }};">
                        <label><b>Select Date:</b></label>
                        <input type="date" name="date" value="{{ $selectedDate }}" class="form-control">
                    </div>
                    <div class="col-md-3" id="monthFilter" style="display: {{ $filterType == 'month' ? 'block' : 'none' }};">
                        <label><b>Select Month:</b></label>
                        <input type="month" name="month" value="{{ $selectedMonth }}" class="form-control">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Apply</button>
                    </div>
                </div>
            </form>
            <!-- Table Section -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-info text-white text-center">
                        <tr>
                            <th>Day</th>
                            <th>Date</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                        </tr>
                    </thead>
                    <tbody id="historyTable">
                        @forelse ($history as $data)
                            <tr class="{{ $data['date'] == date('Y-m-d') ? 'today-row' : '' }}">
                                <td>{{ $data['day'] }}</td>
                                <td>{{ $data['date'] }}</td>
                                <td>{{ $data['check_in_time'] }}</td>
                                <td>{{ $data['check_out_time'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No attendance data yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('home.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('filterType').addEventListener('change', function () {
            document.getElementById('dateFilter').style.display = this.value === 'date' ? 'block' : 'none';
            document.getElementById('monthFilter').style.display = this.value === 'month' ? 'block' : 'none';
        });

    </script>
</body>
</html>
