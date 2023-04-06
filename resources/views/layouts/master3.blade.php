<!DOCTYPE html>
<head>
    <title>{{ $title }}</title>
</head>
<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #94ec8c;">
        <div class="container-fluid">
          <a class="navbar-brand" href="/Barang">Pasar Modernland</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/dashboard">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/barang">Barang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/penjualan">Penjualan</a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/home">Home</a></li>
                      <li><a class="dropdown-item" href="/dashboard/profile">Profile</a></li>
                      <li><a class="dropdown-item" href="/logout">Logout</a></li>
                  </ul>
              </li>
          </ul>
          </div>
        </div>
      </nav>
    <div class="container-fluid">
        @yield('content')
    </div>
    <footer class="bg-info text-center text-lg-start fixed-bottom">
      <div class="text-center p-3" style="background-color: #94ec8c;">
        © 2022 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/">Pasar Modernland</a>
      </div>
    </footer>

    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
      <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          @if (session()->has('notify'))
              <p class="btn btn-info me-auto">Notifikasi</p>
          @elseif($errors->any())
              <p class="btn btn-danger me-auto">Error</p>
          @endif
          <small>now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          <p class="text-info">{{ session()->get('notify') }}</p>
          @foreach ($errors->all() as $message)
              <p class="text-danger">{{ $loop->index + 1 . ' ' . $message }}</p>
          @endforeach
        </div>
      </div>
    </div>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    @if (session()->has('notify') || $errors->any())
            <script>
                const bsAlert = new bootstrap.Toast('#liveToast');
                bsAlert.show();
            </script>
        @endif
</body>
</html>