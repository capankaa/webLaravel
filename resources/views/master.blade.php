<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Berita Bola') }} - @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="header" style="margin-bottom: 0; border-bottom: none;">
        <div class="header-container">
            <div>
                <h1 class="brand" style="background: var(--primary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ config('app.name', 'Berita Bola') }}</h1>
            </div>
            <nav class="nav">
                <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                <a class="nav-link" href="{{ url('/posts') }}">Semua Berita</a>
                @auth
                    <a class="nav-button" href="{{ url('/home') }}">Dashboard</a>
                @else
                    <a class="nav-button" href="{{ route('login') }}">Masuk</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- News Ticker -->
    <div class="ticker-wrap" style="margin-bottom: 2rem;">
        <div class="header-container" style="display: flex; width: min(1140px, calc(100% - 2rem)); margin: 0 auto;">
            <div class="ticker-heading">BREAKING NEWS</div>
            <div class="ticker-content">
                @php
                    $tickerPosts = \App\Models\Post::where('published', 'yes')->orderBy('created_at', 'desc')->take(5)->get();
                @endphp
                <div class="ticker-items">
                    @foreach($tickerPosts as $tpost)
                        <div class="ticker-item">
                            <span style="color: #00d287; margin-right: 0.5rem;">&bull;</span>
                            <a href="{{ route('posts.show', $tpost) }}">{{ $tpost->title }}</a>
                        </div>
                    @endforeach
                    <!-- Duplicate for infinite scroll effect -->
                    @foreach($tickerPosts as $tpost)
                        <div class="ticker-item">
                            <span style="color: #00d287; margin-right: 0.5rem;">&bull;</span>
                            <a href="{{ route('posts.show', $tpost) }}">{{ $tpost->title }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="page">
        <main>
            @yield('body')
        </main>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div>
                <h3>{{ config('app.name', 'Berita Bola') }}</h3>
                <p>Portal berita sepak bola khusus reportase lapangan hijau, taktik, dan transfer. Menghadirkan informasi terakurat dan terpercaya seputar dunia sepak bola dari seluruh dunia.</p>
            </div>
            <div>
                <h3>Kanal Utama</h3>
                <ul>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/posts') }}">Indeks Berita</a></li>
                    <li><a href="{{ url('/posts?q=piala+dunia') }}">Piala Dunia</a></li>
                    <li><a href="{{ url('/posts?q=transfer') }}">Bursa Transfer</a></li>
                </ul>
            </div>
            <div>
                <h3>Kontak & Bantuan</h3>
                <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Redaksi</a></li>
                    <li><a href="#">Pedoman Media Siber</a></li>
                    <li><a href="#">Hubungi Kami</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; {{ date('Y') }} {{ config('app.name', 'Berita Bola') }}. Hak Cipta Dilindungi Undang-Undang.
        </div>
    </footer>
</body>
</html>
