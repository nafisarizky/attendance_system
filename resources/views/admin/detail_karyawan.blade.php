<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.nav')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="container mt-4">
                <h1>Detail Karyawan</h1>

                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('storage/'.$karyawan->profile_photo) }}" width="100" height="100" class="rounded-circle">
                        <h3>{{ $karyawan->name }}</h3>
                        <p><strong>Departemen:</strong> {{ $karyawan->department }}</p>
                        <p><strong>Posisi:</strong> {{ $karyawan->position }}</p>
                        <p><strong>Gender:</strong> {{ $karyawan->gender }}</p>
                        <p><strong>Alamat:</strong> {{ $karyawan->address }}</p>
                        <p><strong>Tanggal Lahir:</strong> {{ $karyawan->date_of_birth }}</p>
                        <a href="{{ route('karyawan') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.js')
  </body>
</html>
