<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <style>
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .profile-header {
            margin-bottom: 20px;
        }
        .profile-header img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .profile-info p {
            font-size: 16px;
            margin: 5px 0;
        }
        .btn-edit {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <a href="{{route('home')}}" class="btn btn-outline-primary mb-3">&larr; Back</a>
    <div class="profile-container">
        <div class="profile-header">
            <h2>Personal Information</h2>
            @if(session('success'))
                <div style="color: green; margin-bottom: 10px;">
                    {{ session('success') }}
                </div>
            @endif
            @if(Auth::user()->profile_photo)
                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo">
            @else
                <img src="{{ asset('default-profile.png') }}" alt="Default Profile">
            @endif
        </div>
        <div class="profile-info">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Phone Number:</strong> {{ $user->phone }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Date Of Birth:</strong> {{ $user->date_of_birth }}</p>
            <p><strong>Gender:</strong> {{ $user->gender }}</p>
            <p><strong>Address:</strong> {{ $user->address }}</p>
            <p><strong>Department:</strong> {{ $user->department }}</p>
            <p><strong>Position:</strong> {{ $user->position }}</p>
        </div>
        <a class="btn btn-primary btn-edit" href="{{ url('edit_profile/' . $user->id) }}">Edit Profile</a>
    </div>
</div>
</body>
@include('home.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
