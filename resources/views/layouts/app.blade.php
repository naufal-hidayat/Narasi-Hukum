<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - Narasi Hukum</title>
  <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    main {
      flex: 1;
    }

    /* Navbar modern */
    .navbar {
      background: #D71314;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }

    .navbar-brand img {
      border-radius: 50%;
      transition: transform 0.3s ease;
    }

    .navbar-brand img:hover {
      transform: scale(1.1);
    }

    .nav-link {
      color: #fff !important;
      font-weight: 600;
      position: relative;
      transition: color 0.3s ease;
    }

    /* underline animation */
    .nav-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -4px;
      left: 0;
      background-color: #fff;
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    .nav-link:hover {
      color: #ffdede !important;
    }

    /* Footer modern */
    footer {
      background: #D71314;
      color: #fff;
      padding: 15px 0;
      text-align: center;
      font-size: 14px;
      letter-spacing: 0.5px;
    }

    footer p {
      margin: 0;
    }

    /* Button login & daftar */
    .navbar .btn-link {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      padding: 6px 12px;
      border-radius: 4px;
      transition: background 0.3s;
    }

    .navbar .btn-link:hover {
      background: rgba(255,255,255,0.2);
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" width="45" height="45" class="me-2">
        <span class="fw-bold">Narasi Hukum</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('consultation.form') }}">Konsultasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('news.index') }}">Berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('articles.index') }}">Artikel</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Daftar</a>
            </li>
          @else
            <li class="nav-item">
              <span class="nav-link">Hallo, {{ Auth::user()->name }}!</span>
            </li>
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-link nav-link" type="submit">Logout</button>
              </form>
            </li>
          @endguest
        </ul>                
      </div>
    </div>
  </nav>    

  <!-- Content -->
  <main class="container my-4">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer>
    <div class="container">
      <p>© {{ date('Y') }} Narasi Hukum. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
