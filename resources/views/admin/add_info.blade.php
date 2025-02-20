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
                        <h2>📢 Add Information 📢</h2>
                        @if (session('success'))
                            <div class="alert-success">🎉 {{ session('success') }} 🎉</div>
                        @endif
                        <form action="{{ url('upload_informasi')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="label">Information Title:</label>
                                <input type="text" name="title" required>
                            </div>
                            <div class="form-group">
                                <label class="label">Information Description:</label>
                                <textarea name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="label">Image:</label>
                                <input type="file" name="image">
                            </div>
                            <button type="submit" class="btn-submit">🚀 Upload Information</button>
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
