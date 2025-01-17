<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Narasi Hukum</title>
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Style existing code */
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    
        main {
            flex: 1;
        }
    
        .navbar {
            background-color: #D71314;
        }
    
        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: bold;
            transition: color 0.3s, background-color 0.3s; /* Smooth transition for hover effect */
        }
    
        .navbar-brand {
            font-weight: bold;
        }
    
        footer {
            background-color: #D71314;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: relative;
            width: 100%;
            bottom: 0;
        }
    
        .nav-item {
            margin: 3px 10px; /* Jarak antar item navbar */
        }
    
        /* Hover effect for nav-link */
        .nav-link:hover {
            color: #D71314 !important; /* Change text color to the same red as navbar background */
            background-color: #fff !important; /* Set background color to white */
            border-radius: 5px; /* Rounded edges for smoother look */
            padding: 5px 10px; /* Add padding to create a button-like appearance */
        }
    </style>    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
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
                        <!-- Menampilkan nama lengkap user -->
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
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>Copyright Narasi Hukum</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>