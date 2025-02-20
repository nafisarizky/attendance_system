<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        /* Tambahan CSS untuk tema terang dan lebih menarik */
        .div_design {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 60px;
    }
        body {
            background-color: #f0f8ff;
            color: #333;
        }
        .main-panel, .content-wrapper {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
        h1 {
            color: #007bff;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        .alert-success {
            position: fixed;
            top: 80px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1050;
            width: 50%;
            text-align: center;
            padding: 15px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
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
        .table {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            vertical-align: middle;
        }
        .table th {
            background-color: #007bff;
            color: rgb(255, 255, 255);
        }
        .table td {
            background-color: #ffffff;
            color: #333;
        }
        .table img {
            border-radius: 50%;
            border: 2px solid #ddd;
            display: block;
            margin: 0 auto;
        }
        .btn {
            padding: 6px 12px;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: scale(1.05);
        }
        .emoji {
            font-size: 1.2em;
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
            @if (session('success'))
                <div class="alert alert-success">
                    🎉 {{ session('success') }} 🎉
                </div>
            @endif
            <div class="container mt-4">
                <h1 class="text-center">📋 Employee Data</h1>
                <div class="search-box">
                    <form action="{{url('karyawan_search')}}" method="get" class="d-flex w-100">
                        @csrf
                        <input type="search" name="search" placeholder="🔍 Search Employee...">
                        <button type="submit" class="btn btn-info">Search</button>
                    </form>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="color: white;">No</th>
                            <th style="color: white;">📷 Photo</th>
                            <th style="color: white;">👤 Name</th>
                            <th style="color: white;">🏢 Department</th>
                            <th style="color: white;">📌 Position</th>
                            <th style="color: white;">⚙️ Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karyawan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$item->profile_photo) }}" width="50" height="50">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->department }}</td>
                                <td>{{ $item->position }}</td>
                                <td>
                                    <a href="{{ route('detail_karyawan', $item->id) }}" class="btn btn-info btn-sm">🔍 Detail</a>
                                    <form action="{{ route('hapus_karyawan', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="confirmation(event)">🗑 Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="div_design">
                {{ $karyawan->links() }}
            </div>
          </div>
          @include('admin.footer')
        </div>
      </div>
    </div>
    @include('admin.js')
  </body>
</html>
