<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        body {
            background-color: #f4f7fc;
            color: #333;
            font-family: 'Arial', sans-serif;
        }

        .card-custom {
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
            background: white;
            padding: 25px;
        }

        /* Styling untuk tabel */
        .table-primary {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .table-primary thead th {
            background-color: #007bff !important;
            color: white !important;
            text-align: center;
            padding: 12px;
        }

        .table-primary tbody td {
            background-color: white !important;
            color: black !important;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f2f2f2 !important;
        }

        /* Badge styling */
        .badge-category {
            padding: 6px 12px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: bold;
        }

        .badge-dinas { background-color: #17a2b8; color: white; }
        .badge-izin { background-color: #ffc107; color: black; }
        .badge-sakit { background-color: #dc3545; color: white; }

        /* Tombol aksi */
        .btn-action {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .empty-data {
            font-size: 18px;
            font-weight: bold;
            color: #dc3545;
            text-align: center;
            margin-top: 20px;
        }
        h2 {
            color: #007bff;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
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
                        <div class="card card-custom">
                            <h2 class="mb-4">Manage Submissions</h2>

                            @if ($pengajuan && $pengajuan->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-primary">
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Category</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Reason</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengajuan as $pengajuans)
                                            <tr>
                                                <td>{{ $pengajuans->user->name }}</td>
                                                <td>
                                                    <span class="badge
                                                        @if($pengajuans->category == 'dinas') badge-dinas
                                                        @elseif($pengajuans->category == 'izin') badge-izin
                                                        @elseif($pengajuans->category == 'sakit') badge-sakit
                                                        @endif">
                                                        {{ ucfirst($pengajuans->category) }}
                                                    </span>
                                                </td>
                                                <td>{{ $pengajuans->start_date }}</td>
                                                <td>{{ $pengajuans->end_date }}</td>
                                                <td>{{ $pengajuans->reason }}</td>
                                                <td>
                                                    <div class="btn-action">
                                                        <form action="{{ route('admin.submissions.updateStatus', [$pengajuans->id, 'Approved']) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                <i class="fas fa-check"></i> Approve
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('admin.submissions.updateStatus', [$pengajuans->id, 'Rejected']) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-times"></i> Reject
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <p class="empty-data">🚨 No current submissions 🚨</p>
                            @endif
                        </div>
                    </div>
                </div>

                @include('admin.footer')
            </div>
        </div>
    </div>

    @include('admin.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</body>
</html>
