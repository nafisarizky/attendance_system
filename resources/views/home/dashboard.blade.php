<!DOCTYPE html>
<html>
    <head>
        @include('home.css')


    </head>
<body>
  <div class="hero_area">
    <!-- header section strats -->
@include('home.header')
    <!-- end header section -->
    <!-- slider section -->
    @include('home.slider')
    <!-- end slider section -->
  </div>
  <div class="container mt-4">
    <div class="card p-3 shadow-sm">
        <h5 class="text-center">Attendance Status</h5>
        <div class="d-flex justify-content-between">
            <p class="fw-bold">Check-in Status: <span class="text-{{ $checkIn ? 'success' : 'danger' }}">{{ $checkIn ? 'Already checked in.' : 'Not checked in yet.' }}</span></p>
            <p class="fw-bold">Check-out Status: <span class="text-{{ $checkOut ? 'success' : 'danger' }}">{{ $checkOut ? 'Already checked out.' : 'Not checked out yet.' }}</span></p>
        </div>
    </div>

    <div class="text-center mt-3">
        @if (!$checkIn)
            <form action="{{ route('check-in') }}" method="POST">
                @csrf
                <button id="checkInButton" class="btn btn-success">Check In</button>
            </form>
        @endif

        @if ($checkIn && !$checkOut && now('Asia/Jakarta')->format('H:i') >= '09:00')
            <form action="{{ route('check-out') }}" method="POST" class="mt-2">
                @csrf
                <button type="checkOutButton" class="btn btn-danger">Check Out</button>
            </form>
        @endif
    </div>

    {{-- <!-- Modal Check In -->
<div class="modal fade" id="checkInModal" tabindex="-1" aria-labelledby="checkInModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkInModalLabel">Check-in Berhasil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Tanggal:</strong> <span id="checkInDate"></span></p>
                <p><strong>Waktu Check-in:</strong> <span id="checkInTime"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="location.reload();">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Check-out -->
<div class="modal fade" id="checkOutModal" tabindex="-1" aria-labelledby="checkOutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkOutModalLabel">Check-out Berhasil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Tanggal:</strong> <span id="checkOutDate"></span></p>
                <p><strong>Waktu Check-out:</strong> <span id="checkOutTime"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="location.reload();">OK</button>
            </div>
        </div>
    </div>
</div>

</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const checkInBtn = document.getElementById("checkInButton");

        if (checkInBtn) {
            checkInBtn.addEventListener("click", function(event) {
                event.preventDefault(); // Hindari submit langsung

                // Ambil waktu sekarang
                let now = new Date();
                let date = now.toLocaleDateString();
                let time = now.toLocaleTimeString();

                // Masukkan data ke modal
                document.getElementById("checkInDate").innerText = date;
                document.getElementById("checkInTime").innerText = time;

                // Tampilkan modal Bootstrap
                var checkInModal = new bootstrap.Modal(document.getElementById('checkInModal'));
                checkInModal.show();

                // Tunggu 1 detik lalu submit form untuk check-in
                setTimeout(() => {
                    let form = document.createElement("form");
                    form.method = "POST";
                    form.action = "{{ route('check-in') }}";

                    let csrfInput = document.createElement("input");
                    csrfInput.type = "hidden";
                    csrfInput.name = "_token";
                    csrfInput.value = "{{ csrf_token() }}";

                    form.appendChild(csrfInput);
                    document.body.appendChild(form);
                    form.submit();
                }, 1000);
            });
        }
    });

     // Check-out Button
     const checkOutBtn = document.getElementById("checkOutButton");
        if (checkOutBtn) {
            checkOutBtn.addEventListener("click", function(event) {
                event.preventDefault();

                let now = new Date();
                let date = now.toLocaleDateString();
                let time = now.toLocaleTimeString();

                document.getElementById("checkOutDate").innerText = date;
                document.getElementById("checkOutTime").innerText = time;

                var checkOutModal = new bootstrap.Modal(document.getElementById('checkOutModal'));
                checkOutModal.show();

                setTimeout(() => {
                    let form = document.createElement("form");
                    form.method = "POST";
                    form.action = "{{ route('check-out') }}";

                    let csrfInput = document.createElement("input");
                    csrfInput.type = "hidden";
                    csrfInput.name = "_token";
                    csrfInput.value = "{{ csrf_token() }}";

                    form.appendChild(csrfInput);
                    document.body.appendChild(form);
                    form.submit();
                }, 1000);
            });
        }
</script> --}}


  <!-- service section -->
  <section class="service_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Menu
        </h2>
      </div>

      <div class="service_container">
        <div class="box">
          <div class="img-box">
            <img src="/images/permission.jpg" class="img1" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Submission
            </h5>
            <p>
              Submit your leave, sick, or duty requests here!
            </p>
            <div class="btn-box">
                <a href="{{ url('pengajuan') }}">
                  See More
                </a>
              </div>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="/images/task.jpg" class="img1" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Task
            </h5>
            <p>
              View, update, and complete your tasks efficiently.
            </p>
            <div class="btn-box">
                <a href="{{ url('tugas') }}">
                  See More
                </a>
              </div>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="/images/info.jpg" class="img1" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Information
            </h5>
            <p>
              Find important announcements and updates here!
            </p>
            <div class="btn-box">
                <a href="{{ route('information') }}">
                  See More
                </a>
              </div>
          </div>
        </div>
      </div>
      {{-- <div class="btn-box">
        <a href="">
          Read More
        </a>
      </div> --}}
    </div>
  </section>
  <!-- end service section -->

  <!-- about section -->
  {{-- <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
              <img src="images/plug.png" alt="">
            </div>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
              enim ad minim veniam, quis nostrud exercitation ullamco laboris
              nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate velit
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img_container">
            <div class="img-box b1">
              <img src="images/about-img1.jpg" alt="" />
            </div>
            <div class="img-box b2">
              <img src="images/about-img2.jpg" alt="" />
            </div>
          </div>

        </div>

      </div>
    </div>
  </section> --}}

  <!-- end about section -->




  <!-- blog section -->
{{--
  <section class="blog_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Blog
        </h2>
        <img src="images/plug.png" alt="">
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="images/blog1.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Blog Title Goes Here
              </h5>
              <p>
                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="images/blog2.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Blog Title Goes Here
              </h5>
              <p>
                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end blog section -->



  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container ">
      <div class="heading_container">
        <h2>
          Contact Us
        </h2>
        <img src="images/plug.png" alt="">
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form action="">
            <div>
              <input type="text" placeholder="Name" />
            </div>
            <div>
              <input type="email" placeholder="Email" />
            </div>
            <div>
              <input type="text" placeholder="Phone Number" />
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" />
            </div>
            <div class="d-flex ">
              <button>
                SEND
              </button>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->


  <!-- info section -->

  <section class="info_section layout_padding">
    <div class="container">
      <div class="info_contact">
        <div class="row">
          <div class="col-md-4">
            <a href="">
              <img src="images/location-white.png" alt="">
              <span>
                Passages of Lorem Ipsum available
              </span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/telephone-white.png" alt="">
              <span>
                Call : +012334567890
              </span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/envelope-white.png" alt="">
              <span>
                demo@gmail.com
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-9">
          <div class="info_form">
            <form action="">
              <input type="text" placeholder="Enter your email">
              <button>
                subscribe
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="info_social">
            <div>
              <a href="">
                <img src="images/fb.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/twitter.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section> --}}

  <!-- end info section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-9 mx-auto">
            <p>
                2025 All Right Reserved
            </p>
          {{-- <p>
            &copy; 2019 All Rights Reserved By
            <a href="https://html.design/">Free Html Templates</a>
          </p> --}}
        </div>
      </div>
    </div>
  </footer>
  <!-- footer section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>

</body>

</html>
