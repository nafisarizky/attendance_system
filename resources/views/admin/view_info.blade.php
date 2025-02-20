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
    .container-custom {
      margin-top: 60px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .card {
      width: 300px;
      border: 1px solid rgb(11, 0, 4);
      border-radius: 10px;
      overflow: hidden;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      background-color: #f6f6f6;
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card-body {
      padding: 15px;
    }

    .card-title {
      font-size: 18px;
      font-weight: bold;
      color: #000000;
    }

    .card-text {
      font-size: 14px;
      color: #000000;
    }

    .btn-container {
      margin-top: 10px;
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .btn {
      padding: 8px 15px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      text-decoration: none;
      color: white;
    }

    .btn-danger {
      background-color: red;
    }

    .btn-primary {
      background-color: blue;
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
          <!-- Judul -->
          <h2>All Information</h2>

          <!-- Kontainer untuk kartu -->
          <div class="container-custom">
            @foreach ($info as $infos)
              <div class="card">
                <img src="{{asset('images/'.$infos->image)}}" alt="Image">
                <div class="card-body">
                  <h5 class="card-title">{!!Str::limit($infos->title,15)!!}</h5>
                  <p class="card-text">{!!Str::limit($infos->description,25)!!}</p>

                  <div class="btn-container">
                    <!-- Tombol Delete -->
                    <form action="{{ route('hapus_informasi', $infos->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are u sure want to delete?')">Delete</button>
                    </form>

                    {{-- <!-- Tombol Edit -->
                    <a class="btn btn-primary" href="{{url('edit_info/' . $infos->id)}}">Edit</a> --}}
                  </div>
                </div>
              </div>
            @endforeach
          </div>

        </div>

        @include('admin.footer')
      </div>
    </div>
  </div>

  @include('admin.js')
</body>
</html>
