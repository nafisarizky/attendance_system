{{-- <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Document</title>
<style>
    .nav-link {
    position: relative;
    text-decoration: none;
    color: #06279e; /* Warna teks link */
    font-weight: 500;
    /* transition: color 0.3s ease-in-out; */
  }

  .nav-link::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -3px; /* Jarak underline dari teks */
    width: 0;
    height: 2px; /* Ketebalan underline */
    background-color: #06279e; /* Warna underline */
    /* transition: width 0.3s ease-in-out; */
  }

  .nav-link:hover {
    color: #06279e; /* Ubah warna teks saat hover */
  }

  .nav-link:hover::after {
    width: 100%; /* Underline muncul penuh saat hover */
  }

  .card-header {
    background-color: #98dbf7;
    color: #06279e;
  }

</style> --}}

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Attendance System LeMineral</title>

    

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/homedash/css/bootstrap.css') }}" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('/homedash/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('/homedash/css/responsive.css') }}" rel="stylesheet" />
  </head>
