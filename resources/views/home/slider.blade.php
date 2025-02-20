<style>
    .img-box1 img {
  width: 100%; /* Pastikan gambar memenuhi lebar container */
  height: 300px; /* Atur tinggi agar semua gambar konsisten */
  object-fit: cover; /* Pastikan gambar tetap proporsional dan tidak terdistorsi */
  border-radius: 10px; /* Opsional: buat sudutnya agak membulat */
}

</style>
<section class="slider_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ">
          <div class="detail_box">
            <h1>
              Hello! <br>
              Welcome & Have A <br>
              Good Day
            </h1>
            <p>
                {{ $user->name }}
            </p>
            {{-- <a href="" class="">
              Contact Us --}}
          </div>
        </div>


<div class="col-lg-5 col-md-6 offset-lg-1">
  <div class="img_content">
    <div class="img_container">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="img-box1">
              <img src="/images/office1.jpg" class="d-block w-100" alt="">
            </div>
          </div>
          <div class="carousel-item">
            <div class="img-box1">
              <img src="/images/office2.jpg" class="d-block w-100" alt="">
            </div>
          </div>
          <div class="carousel-item">
            <div class="img-box1">
              <img src="/images/office3.jpg" class="d-block w-100" alt="">
            </div>
          </div>
        </div>

        <!-- Tombol Navigasi -->
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>

<!-- Tambahkan Bootstrap JS dan jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
      </div>
    </div>
  </section>
