<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <style>
        /* Menyamakan ukuran kartu */
        .card {
            min-height: 100%;
            display: flex;
            flex-direction: column;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }

        /* Gambar seragam */
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Menyamakan tinggi card-body */
        .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Batas teks biar nggak kepanjangan */
        .text-truncate {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <a href="{{route('home')}}" class="btn btn-outline-primary mb-3">&larr; Back</a>
        <h2 class="text-center mb-4 text-primary fw-bold">All Information</h2>
        <div class="row">
            @foreach ($informasi as $info)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/'.$info->image) }}" class="card-img-top" alt="{{ $info->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $info->title }}</h5>
                            <p class="card-text text-truncate">{{ Str::limit($info->description, 30) }}</p>
                            <a href="{{ url('information/'.$info->id) }}" class="btn btn-primary w-100">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
@include('home.js')
</html>
