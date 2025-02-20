{{-- <nav class="navbar" style="background-color: #98dbf7;">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="/images/logo.png" alt="Bootstrap" width="100" height="50">
      </a>
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('history') }}">History</a>
        </li>
      </ul>
    <div class="dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('storage/images' . Auth::user()->profile_image) }}" alt="Profile">
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ url('profile') }}">Profile Details</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form method="POST" action="{{ url('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Log Out</button>
                </form>
            </li>
        </ul>
    </div>
</div>
  </nav> --}}

  {{-- <li class="nav-item">
    <a class="nav-link" href="{{ url('home/profile_details') }}">Profile</a>
  </li> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <header class="header_section">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          {{-- <img src="images/logo.png" alt=""> --}}
          <span style="color: #053692;">
            Attendance System
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="s-1"> </span>
          <span class="s-2"> </span>
          <span class="s-3"> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('home') }}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('history') }}">History</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(Auth::check() && Auth::user()->profile_photo)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile" class="rounded-circle" width="35" height="35">
                    @else
                        <img src="{{ asset('default-profile.png') }}" alt="Default Profile" class="rounded-circle" width="35" height="35">
                    @endif
                </a>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('home.profile') }}">
                            <i class="fas fa-user-circle"></i> Profile
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>

            </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
