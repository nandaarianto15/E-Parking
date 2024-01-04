<nav id="sidebar">
    <div class="p-4 pt-5">
      <img src="{{ asset('img/android-chrome-512x512.png') }}" alt="" class="img logo rounded-circle mb-5">
      {{-- <a href="/" class="img logo rounded-circle mb-5" style="background-image: url(img/android-chrome-512x512.png);"></a> --}}
      <ul class="list-unstyled components mb-5">
        <li class="@yield('dashboard_select')">
          <a href="{{ url('home') }}" da ta-toggle="collapse" aria-expanded="false"><i class='bx bxs-home'></i> Home</a>
        </li>
        <li class="{{ Request::is('profil')?'active':'' }}">
            <a href="{{ url('profil') }}" da ta-toggle="collapse" aria-expanded="false"><i class='bx bxs-user'></i> Profil</a>
        </li>
        <li class="{{ Request::is('pegawai')?'active':'' }}">
            <a href="{{ url('pegawai') }}" da ta-toggle="collapse" aria-expanded="false"><i class='bx bxs-group'></i> Pegawai</a>
        </li>
        <li class="{{ Request::is('price')?'active':'' }}">
            <a href="{{ url('price') }}" da ta-toggle="collapse" aria-expanded="false"><i class='bx bxs-badge-dollar'></i> Harga</a>
        </li>
        <li class="{{ Request::is('masuk')?'active':'' }} {{ Request::is('keluar')?'active':'' }}">
          <a href="#carSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class='bx bxs-car' ></i> Kendaraan</a>
          <ul class="collapse list-unstyled" id="carSubmenu">
            <li class="{{ Request::is('masuk')?'active':'' }}">
              <a href="{{ url('masuk') }}">Masuk</a>
            </li>
            <li class="{{ Request::is('keluar')?'active':'' }}">
              <a href="{{ url('keluar') }}">Keluar</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
              {{-- {{ __('Logout') }} --}}
              <i class='bx bx-log-out' ></i> Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </li>
      </ul>

      <div class="footer" style="padding-top: 80%">
        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> <i class="icon-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Nanda Arianto</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      </div>

    </div>
  </nav>

  <div id="content" class="p-4 p-md-5">
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto">

          </ul>
        </div>
      </div>
    </nav>