<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
</head>
{{-- @include('home.header') --}}
<body>
    <div class="container mt-5">
        <!-- Header dengan Background Light -->
        <div class="bg-light p-3 rounded shadow-sm text-center">
            <h2 class="text-primary fw-bold">{{ $info->title }}</h2>
        </div>

        <!-- Gambar dengan Shadow -->
        <div class="text-center mt-4">
            <img src="{{ asset('images/'.$info->image) }}"
                 class="img-fluid rounded shadow-sm"
                 style="max-width: 600px; transition: transform 0.3s ease-in-out;"
                 onmouseover="this.style.transform='scale(1.05)'"
                 onmouseout="this.style.transform='scale(1)'"
                 alt="{{ $info->title }}">
        </div>

        <!-- Deskripsi -->
        <p class="mt-4 lead text-muted text-justify">{{ $info->description }}</p>

        <!-- Tombol Kembali -->
        <div class="text-center">
            <a href="{{ url('information') }}" class="btn btn-primary px-4 py-2 fw-bold">
                <i class="bi bi-arrow-left-circle"></i> Back
            </a>
        </div>
    </div>

    @include('home.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
