<!DOCTYPE html>
<head>
    <title>{{ $title }}</title>
</head>
<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
<body style="background-color: #94ec8c;">
    <div class="container-fluid">
        @yield('content')
    </div>

    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            @if($errors->any())
                <p class="btn btn-danger me-auto">Error</p>
            @endif
            <small>now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            <p class="text-info">{{ session()->get('notify') }}</p>
            @foreach ($errors->all() as $message)
                <p class="text-danger">{{ $loop->index + 1 . '. ' . $message }}</p>
            @endforeach
          </div>
        </div>
      </div>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    @if ($errors->any())
        <script>
            const bsAlert = new bootstrap.Toast('#liveToast');
            bsAlert.show();
        </script>
    @endif  
</body>
</html>