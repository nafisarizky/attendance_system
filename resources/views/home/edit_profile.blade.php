<!DOCTYPE html>
<html>
  <head>
    @include('home.css') <!-- pangiil folder css -->

    <style type="text/css">
    .div_design
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
    }

    input[type='text']
    {
        width: 400px;
        height: 50px;
    }
    </style>
  </head>
  <body>
    <div class="container mt-4">
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h3 style="color:rgb(4, 0, 0); text-align: center;">Update Profile</h3>
          <div class="div_design">

            <form action="{{ url('update_profile', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="profile_photo" class="form-label">Current Profile Photo</label>
                    <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('images/default-profile.png') }}"
                    alt="Profile Photo"
                    style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                </div>
                <div class="mb-3">
                    <label for="profile_photo" class="form-label">Update Profile Photo</label>
                    <input type="file" name="profile_photo" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $data->name) }}" required>
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">Date of birth</label>
                    <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $data->date_of_birth) }}" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $data->phone) }}" required>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" class="form-select" required>
                        <option value="Male" {{ old('gender', $data->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $data->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="4">{{ old('address', $data->address) }}</textarea>
                </div>
                {{-- <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" name="department" class="form-control" value="{{ old('department', $data->department) }}" required>
                </div>
                <div class="mb-3">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" name="position" class="form-control" value="{{ old('position', $data->position) }}" required>
                </div> --}}
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
          </div>
          </div>
      </div>
    </div>
</div>
    <!-- JavaScript files-->
    @include('home.js')
  </body>
</html>
