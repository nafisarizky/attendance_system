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
            max-width: 700px;
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
        .label {
            font-weight: bold;
            display: block;
            margin-top: 12px;
            color: #555;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 14px;
        }
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        .btn-submit {
            background-color: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s ease-in-out;
        }
        .btn-submit:hover {
            background-color: #218838;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
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
                        <h2>✨ Add Employee ✨</h2>
                        @if (session('success'))
                            <div class="alert-success">🎉 {{ session('success') }} 🎉</div>
                        @endif
                        <form action="{{ route('admin.karyawan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="label">Name:</label>
                                <input type="text" name="name" required>
                            </div>
                            <div class="form-group">
                                <label class="label">Email:</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label class="label">Phone Number:</label>
                                <input type="text" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label class="label">Date of Birth:</label>
                                <input type="date" name="date_of_birth" required>
                            </div>
                            <div class="form-group">
                                <label class="label">Gender:</label>
                                <select name="gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label">Address:</label>
                                <textarea name="address"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="label">Department:</label>
                                <input type="text" name="department" required>
                            </div>
                            <div class="form-group">
                                <label class="label">Position:</label>
                                <input type="text" name="position" required>
                            </div>
                            <div class="form-group">
                                <label class="label">Profile Photo:</label>
                                <input type="file" name="profile_photo">
                            </div>
                            <div class="form-group">
                                <label class="label">Password:</label>
                                <input type="password" name="password" required>
                            </div>
                            <button type="submit" class="btn-submit">🚀 Save</button>
                        </form>
                    </div>
                </div>
                @include('admin.footer')
            </div>
        </div>
    </div>
    @include('admin.js')
</body>
</html>
