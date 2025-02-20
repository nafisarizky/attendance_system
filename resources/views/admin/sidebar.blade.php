<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="#">
            <span style="font-size: 19px; font-weight: bold; color: #1b0477;">Attendance System</span>
        </a>
        <a class="sidebar-brand brand-logo-mini" href="#">
            <span style="font-size: 18px; font-weight: bold; color: #1b0477;">AS</span>
        </a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="/storage/images/owner.png" alt="">
              {{-- <span class="count bg-success"></span> --}}
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">Admin</h5>
              <span></span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            {{-- <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
              </div>
            </a> --}}
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <a class="dropdown-item preview-item" href="#" onclick="document.getElementById('logout-form').submit(); event.preventDefault();">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-logout text-danger"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <p class="preview-subject mb-1">Log out</p>
                    </div>
                </a>
            </form>
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('admin/dashboard')}}">
          <span class="menu-icon">
            <i class="mdi mdi-home"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#karyawan" aria-expanded="false" aria-controls="karyawan">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Employee</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="karyawan">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ route('karyawan') }}">Employee Data</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ route('admin.karyawan.create') }}">Add Employee</a></li>
            </ul>
          </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('rekap') }}">
          <span class="menu-icon">
            <i class="mdi mdi-calendar-clock"></i>
          </span>
          <span class="menu-title">Attendance Recap</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#pengajuan" aria-expanded="false" aria-controls="pengajuan">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Submission Data</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="pengajuan">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ route('pengajuan') }}">Submission Active</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ route('pengajuan_history') }}">Submission History</a></li>
            </ul>
          </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#informasi" aria-expanded="false" aria-controls="informasi">
          <span class="menu-icon">
            <i class="mdi mdi-information-outline"></i>
          </span>
          <span class="menu-title">Information</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="informasi">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ route('tambah_informasi') }}">Add Info</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ route('view_informasi') }}">View Info</a></li>
            </ul>
          </div>
      </li>
    </ul>
  </nav>
