<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.css')
<style>
    body {
        background-color: #f4f7fc;
        color: #333;
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 1200px;
        margin: auto;
    }
    .card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
    .card-header {
        background-color: #007bff;
        color: white;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
        padding: 10px;
        border-radius: 10px 10px 0 0;
    }
    .table {
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }
    .table th {
        background-color: #007bff;
        color: white;
        text-align: center;
    }
    .table td {
        color: black;
        text-align: center;
    }
    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }
    .table tbody tr:nth-child(odd) {
        background-color: white;
    }
    .badge-success {
        background-color: #28a745;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
    }
    .badge-danger {
        background-color: #dc3545;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
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
            <div class="container mt-4">
                <h1 class="mb-4 text-center" style="color: #007bff;">Submission History</h1>
                <div class="card">
                    <div class="card-header">
                        All Processed Submissions
                    </div>
                    <div class="card-body">
                        @if ($pengajuan->isEmpty())
                            <p class="text-muted text-center">No submission history available.</p>
                        @else
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="color: white;">Employee Name</th>
                                        <th style="color: white;">Category</th>
                                        <th style="color: white;">Start Date</th>
                                        <th style="color: white;">End Date</th>
                                        <th style="color: white;">Reason</th>
                                        <th style="color: white;">Status</th>
                                        <th style="color: white;">Updated Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuan as $item)
                                        <tr>
                                            <td>{!! Str::words($item->user->name, 1, '') !!}</td>
                                            <td>{{ $item->category }}</td>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->end_date }}</td>
                                            <td>{!! Str::limit($item->reason ?? '-', 15) !!}</td>
                                            <td>
                                                <span class="badge {{ $item->status == 'Approved' ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $item->status }}
                                                </span>
                                            </td>
                                            <td>{{ $item->updated_at->format('d M Y, H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
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
