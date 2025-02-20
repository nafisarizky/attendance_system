  <head>
@include('admin.css')
  </head>

  <style type="text/css">
    .div_design {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
    }
    h1 {
        color: rgb(123, 170, 231);
        text-align: center;
    }
    label {
        display: inline-block;
        width: 250px;
        font-size: 18px !important;
        color: rgb(2, 29, 69) !important;
    }
    input[type='text'], textarea {
        width: 350px;
        height: 50px;
    }
    textarea {
        height: 80px;
    }
    .input_design {
        padding: 15px;
    }
  </style>
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
                <h1>Information Edit</h1>
                <div class="div_design">
                  <form action="{{ url('update_info', $info->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input_design">
                      <label>Information Title</label>
                      <input type="text" name="title" value="{{ $info->title }}" required>
                    </div>

                    <div class="input_design">
                      <label>Information Description</label>
                      <textarea name="description">{{ $info->description }}</textarea>
                    </div>

                    <div class="input_design">
                      <label>Current Image</label>
                      <img src="{{ asset('images/'.$info->image) }}" width="150px">
                    </div>

                    <div class="input_design">
                      <label>Change Image</label>
                      <input type="file" name="image">
                    </div>

                    <div class="input_design">
                      <input class="btn btn-primary" type="submit" value="Update Informasi">
                    </div>
                  </form>
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

