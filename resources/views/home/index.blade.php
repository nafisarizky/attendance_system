<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | Attendance System</title>
    @include('home.css')

    <style>
        /* Warna Latar Belakang */
        body {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            color: white;
            font-family: 'Poppins', sans-serif;
            text-align: center;
        }

        /* Hero Section */
        .welcome-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .welcome-text h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .welcome-text p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        /* Tombol */
        .btn-custom {
            background: white;
            color: #007bff;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background: #007bff;
            color: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Animasi Gambar */
        .welcome-image img {
            max-width: 100%;
            height: auto;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body>
    <div class="container welcome-container">
        <div class="row align-items-center">
            <!-- Kolom Teks -->
            <div class="col-md-6 text-center text-md-start">
                <h1>Welcome to Attendance System!</h1>
                <p>Efficiently track attendance with ease.</p>
                <a href="{{ route('login') }}" class="btn btn-custom">Log In</a>
            </div>
            <!-- Kolom Gambar -->
            <div class="col-md-6 text-center">
                <img src="/images/welcome.png" alt="Welcome" class="img-fluid">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
