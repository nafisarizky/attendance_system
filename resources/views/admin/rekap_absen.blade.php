<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        .div_design {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 60px;
    }
        body {
            background-color: #f4f7fc;
            color: #333;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h2 {
            color: #007bff;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-control {
            background-color: #fff;
            color: #333;
            border: 1px solid #ccc;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        label {
            font-weight: bold;
            color: #555;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
        .table td {
            background-color: #ffffff;
            color: #333;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        /* Perbaikan dropdown filter */
        select.form-control {
            background-color: #fff;
            color: #951c1c;
            border: 1px solid #007bff;
            padding: 8px;
            appearance: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }
        select.form-control:focus {
            box-shadow: 0 0 5px rgba(0, 86, 179, 0.5);
        }
        .search-box {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-box input[type="search"] {
            flex-grow: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #ffffff;
            color: #333;
        }
        /* Fix dropdown background agar tetap terang */
select.form-control,
select.form-control option {
    background-color: #fff !important;
    color: #333 !important;
}

    </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.nav')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container">
                        <h2>📢 Attendance Recap 📢</h2>
                        <form method="GET" action="{{ route('rekap') }}" class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="filter">Filter:</label>
                                    <select name="filter" id="filter" class="form-control">
                                        <option value="today">Today</option>
                                        <option value="date">Select Date</option>
                                        <option value="month">Select Month</option>
                                        <option value="all">All</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="date">Date:</label>
                                    <input type="date" name="date" id="date" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="month">Month:</label>
                                    <input type="month" name="month" id="month" class="form-control">
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                </div>
                            </div>
                        </form>
                        {{-- <div class="search-box">
                            <form action="{{url('rekap_search')}}" method="get" class="d-flex w-100">
                                @csrf
                                <input type="search" name="search" placeholder="🔍 Search Employee...">
                                <button type="submit" class="btn btn-info">Search</button>
                            </form>
                        </div> --}}
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="color: white;">No</th>
                                        <th style="color: white;">Name</th>
                                        <th style="color: white;">Check In</th>
                                        <th style="color: white;">Check Out</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rekap as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $data['name'] }}</td>
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
                @include('admin.footer')
            </div>
        </div>
    </div>
    @include('admin.js')
</body>
</html>
