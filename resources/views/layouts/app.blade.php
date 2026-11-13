

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>@yield('title', "Otto's Grotto")</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        :root {
            --forest: #123d2b;
            --green: #21804e;
            --mint: #a7e5b7;
            --cream: #f2f8f2;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--cream);
            color: var(--forest);
        }

        .navbar {
            background-color: var(--forest);
            padding: 20px 0;
        }

        .navbar-brand {
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: -0.7px;
        }

        .navbar-brand span {
            color: var(--mint);
        }

        .navbar .nav-link {
            color: #c4d9cc;
            margin-left: 20px;
            font-weight: 500;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: white;
        }

        .btn-grotto {
            background-color: var(--green);
            color: white;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            transition: 0.2s;
        }

        .btn-grotto:hover {
            background-color: #166238;
            color: white;
            transform: translateY(-2px);
        }

        .site-footer {
            background-color: var(--forest);
            color: #c4d9cc;
            padding: 25px 0;
        }
    </style>

    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">

            <a class="navbar-brand" href="/">
                🌿 Otto's <span>Grotto</span>
            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNav"
                    aria-controls="mainNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse"
                 id="mainNav">

                <div class="navbar-nav ms-auto">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                       href="/">Home</a>

                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                       href="/about">About</a>

                    <a class="nav-link" href="{{ route('ads.create') }}">
                        Post an Ad
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="site-footer text-center">
        <div class="container">
            &copy; {{ date('Y') }}
            Otto's Grotto.
            Made with Laravel.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
