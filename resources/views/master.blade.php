<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Berita Bola') }} - @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
/* Custom portal styles for Berita Bola */
:root {
    --radius: 8px;
    --background: #f4f6f9;
    --foreground: #1a1a1a;
    --card: #ffffff;
    --border: #e0e0e0;
    --primary: #008751;
    --primary-gradient: linear-gradient(135deg, #008751 0%, #00b96b 100%);
    --primary-soft: #e6f3ec;
    --primary-strong: #00663d;
    --muted: #6b7280;
    --shadow: 0 4px 12px rgba(0, 0, 0, 0.08), 0 1px 3px rgba(0, 0, 0, 0.05);
    --shadow-hover: 0 10px 24px rgba(0, 0, 0, 0.12), 0 4px 8px rgba(0, 0, 0, 0.06);
    --font-sans: 'Inter', ui-sans-serif, system-ui, -apple-system, sans-serif;
}

* {
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    margin: 0;
    min-height: 100vh;
    font-family: var(--font-sans);
    color: var(--foreground);
    background: var(--background);
}

a {
    color: inherit;
    text-decoration: none;
    transition: color 0.2s;
}
a:hover {
    color: var(--primary);
}

button,
input,
textarea {
    font: inherit;
}

.page {
    width: min(1140px, calc(100% - 2rem));
    margin: 0 auto;
    padding: 0 0 4rem;
}

.header {
    background: var(--card);
    padding: 1rem 0;
    border-bottom: 1px solid var(--border);
    margin-bottom: 2rem;
    position: sticky;
    top: 0;
    z-index: 50;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.header-container {
    width: min(1140px, calc(100% - 2rem));
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.brand {
    margin: 0;
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--primary);
    letter-spacing: -0.5px;
}

.brand-tagline {
    display: none; /* Hide tagline in header for cleaner look */
}

.nav {
    display: flex;
    gap: 1.5rem;
    align-items: center;
}

.nav-link {
    font-size: 0.95rem;
    font-weight: 600;
    color: #4a4a4a;
}
.nav-link:hover {
    color: var(--primary);
}

.nav-button {
    padding: 0.5rem 1.2rem;
    border-radius: var(--radius);
    background: var(--primary-gradient);
    color: #fff;
    font-weight: 600;
    font-size: 0.9rem;
    box-shadow: 0 2px 4px rgba(0, 135, 81, 0.2);
    transition: transform 0.2s, box-shadow 0.2s;
}
.nav-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 135, 81, 0.3);
    color: #fff;
}

.section-title {
    margin: 0 0 1rem;
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--foreground);
    border-left: 4px solid var(--primary);
    padding-left: 0.75rem;
    text-transform: uppercase;
}

/* Grids */
.grid-two {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 2rem;
}

.stack {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

/* Cards */
.card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-hover);
}

.card-header {
    padding: 1.25rem;
}

.card-image-container {
    overflow: hidden;
}

.card-image {
    width: 100%;
    aspect-ratio: 16 / 9;
    object-fit: cover;
    background: #e0e0e0;
    transition: transform 0.5s ease;
}
.card:hover .card-image {
    transform: scale(1.05);
}

.card-title {
    margin: 0.5rem 0;
    font-size: 1.5rem;
    line-height: 1.4;
    font-weight: 700;
}

.card-subtitle {
    margin: 0;
    color: #4a4a4a;
    font-size: 1rem;
    line-height: 1.6;
}

/* Meta Data */
.meta {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.85rem;
    color: var(--muted);
    margin-top: 0.75rem;
}

.meta .publisher {
    font-weight: 700;
    color: var(--primary);
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

/* Verified checkmark for publisher */
.meta .publisher::after {
    content: "✓";
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 14px;
    height: 14px;
    background: #1da1f2;
    color: white;
    border-radius: 50%;
    font-size: 9px;
}

/* Badges */
.badge {
    display: inline-block;
    padding: 0.25rem 0.5rem;
    background: var(--primary-soft);
    color: var(--primary);
    font-size: 0.75rem;
    font-weight: 700;
    border-radius: 4px;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
}

/* Story Cards (List view) */
.story-card {
    display: flex;
    gap: 1.25rem;
    background: var(--card);
    border-radius: var(--radius);
    padding: 1rem;
    border: 1px solid var(--border);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.story-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow);
}
.story-card:last-child {
    border-bottom: 1px solid var(--border);
}

.story-image-container {
    overflow: hidden;
    border-radius: var(--radius);
}

.story-image {
    width: 220px;
    height: 140px;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.story-card:hover .story-image {
    transform: scale(1.05);
}

.story-content {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.story-title {
    margin: 0 0 0.5rem;
    font-size: 1.15rem;
    line-height: 1.4;
    font-weight: 700;
}

.story-meta {
    margin-top: auto;
    font-size: 0.85rem;
    color: var(--muted);
}

/* Aside */
.aside-panel {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.aside-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 1.25rem;
}

/* Footer */
.footer {
    background: #0f172a;
    padding: 4rem 0 2rem;
    color: #cbd5e1;
    font-size: 0.9rem;
    margin-top: 4rem;
}

.footer-content {
    width: min(1140px, calc(100% - 2rem));
    margin: 0 auto;
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 3rem;
    margin-bottom: 3rem;
}

.footer h3 {
    color: #fff;
    font-size: 1.2rem;
    margin: 0 0 1.25rem;
    font-weight: 700;
}

.footer p {
    line-height: 1.7;
    margin: 0 0 1rem;
}

.footer ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.footer a {
    color: #cbd5e1;
}

.footer a:hover {
    color: #fff;
}

.footer-bottom {
    text-align: center;
    padding-top: 2rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    font-size: 0.85rem;
}

/* News Ticker */
.ticker-wrap {
    width: 100%;
    overflow: hidden;
    background-color: var(--primary-strong);
    padding: 0.5rem 0;
    color: white;
    box-sizing: border-box;
    display: flex;
    align-items: center;
}

.ticker-heading {
    background: var(--primary);
    padding: 0.25rem 1rem;
    font-weight: bold;
    font-size: 0.8rem;
    text-transform: uppercase;
    z-index: 10;
    box-shadow: 2px 0 4px rgba(0,0,0,0.2);
    margin-right: 1rem;
    border-radius: 4px;
}

.ticker-content {
    display: flex;
    flex: 1;
    overflow: hidden;
}

.ticker-items {
    display: flex;
    white-space: nowrap;
    animation: ticker 35s linear infinite;
}
.ticker-items:hover {
    animation-play-state: paused;
}

.ticker-item {
    margin-right: 3rem;
    font-size: 0.9rem;
}
.ticker-item a {
    color: #e2e8f0;
}
.ticker-item a:hover {
    color: #fff;
    text-decoration: underline;
}

@keyframes ticker {
    0% {
        transform: translate3d(0, 0, 0);
    }
    100% {
        transform: translate3d(-50%, 0, 0);
    }
}

/* 3-column Grid for Archives */
.grid-three {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
}

@media (max-width: 900px) {
    .grid-two {
        grid-template-columns: 1fr;
    }
    .grid-three {
        grid-template-columns: repeat(2, 1fr);
    }
    .footer-content {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 640px) {
    .story-card {
        flex-direction: column;
    }
    .story-image {
        width: 100%;
        height: 200px;
    }
    .grid-three {
        grid-template-columns: 1fr;
    }
}
    </style>
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
