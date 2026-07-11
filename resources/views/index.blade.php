@extends('master')
@section('title', 'Beranda')
@section('body')
@php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
    $featured = $featured ?? null;
    $topStories = $topStories ?? collect();
    $latestNews = $latestNews ?? collect();
@endphp

<!-- Berita Terbaru Section (Top Grid) -->
<h2 class="section-title">Berita Terbaru</h2>
<div class="grid-two" style="margin-bottom: 3rem;">
    <!-- Headline -->
    @if($featured)
        <article class="card">
            <div class="card-image-container">
                @if(!empty($featured->image_url))
                    <img src="{{ $featured->image_url }}" alt="{{ $featured->title }}" class="card-image" style="aspect-ratio: 4/3; display: block;">
                @else
                    <img src="https://images.unsplash.com/photo-1579952363873-27f3bade9f55?auto=format&fit=crop&w=800&q=80" alt="Football Pitch" class="card-image" style="aspect-ratio: 4/3; display: block;">
                @endif
            </div>
            <div style="padding: 1.5rem;">
                <div class="badge" style="background: var(--primary-gradient);">Eksklusif</div>
                <h3 class="card-title" style="font-size: 1.8rem; margin: 0.75rem 0;"><a href="{{ route('posts.show', $featured) }}">{{ $featured->title }}</a></h3>
                <p class="card-subtitle" style="font-size: 1.05rem;">{{ Str::limit($featured->content, 220, '...') }}</p>
                <div class="meta" style="margin-top: 1rem;">
                    <span class="publisher">{{ $featured->publisher ?? 'Berita Bola' }}</span>
                    <span>&bull;</span>
                    <span>{{ $featured->event_date ? Carbon::parse($featured->event_date)->locale('id')->diffForHumans() : $featured->created_at->locale('id')->diffForHumans() }}</span>
                </div>
            </div>
        </article>
    @else
        <div class="card">
            <div class="card-header">
                <div class="badge">Informasi</div>
                <h3 class="card-title">Belum ada berita bola untuk ditampilkan.</h3>
            </div>
        </div>
    @endif

    <!-- Latest News List (Sidebar of Top Grid) -->
    <div class="stack" style="gap: 1rem;">
        @foreach($latestNews->skip($featured ? 1 : 0)->take(4) as $post)
            <article class="story-card" style="padding: 0.75rem; border: none; background: transparent; border-bottom: 1px solid var(--border); border-radius: 0;">
                <div class="story-image-container" style="border-radius: 6px;">
                    <img class="story-image" style="width: 140px; height: 90px; border-radius: 6px;" src="{{ $post->image_url ?: 'https://images.unsplash.com/photo-1522778119026-d647f0596c20?auto=format&fit=crop&w=300&q=80' }}" alt="{{ $post->title }}">
                </div>
                <div class="story-content" style="justify-content: flex-start;">
                    <h4 class="story-title" style="font-size: 1rem; margin-bottom: 0.25rem;"><a href="{{ route('posts.show', $post) }}">{{ Str::limit($post->title, 65) }}</a></h4>
                    <div class="story-meta meta" style="margin-top: auto; font-size: 0.75rem;">
                        <span style="color: var(--primary); font-weight: bold;">{{ $post->publisher ?? 'Berita Bola' }}</span>
                        <span>&bull;</span>
                        <span>{{ $post->created_at->locale('id')->diffForHumans() }}</span>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</div>

<!-- Koleksi Dari Arsip Section (3-Column Grid) -->
<div style="background: #e6f3ec; padding: 2.5rem 2rem; margin: 0 -2rem; border-radius: var(--radius); margin-bottom: 3rem;">
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 1.5rem;">
        <h2 class="section-title" style="margin: 0; border-color: var(--primary-strong);">Koleksi Dari Arsip</h2>
        <a href="{{ route('posts.index') }}" style="color: var(--primary-strong); font-weight: 600; font-size: 0.9rem;">Lihat semua &rarr;</a>
    </div>
    
    <div class="grid-three">
        @foreach($topStories->take(3) as $post)
            <article class="card">
                <div class="card-image-container">
                    <img class="card-image" src="{{ $post->image_url }}" alt="{{ $post->title }}">
                </div>
                <div class="card-header">
                    <div class="meta" style="margin-top: 0; margin-bottom: 0.5rem; font-size: 0.75rem;">
                        <span style="color: var(--primary); font-weight: bold;">{{ $post->publisher ?? 'Berita Bola' }}</span>
                    </div>
                    <h3 class="card-title" style="font-size: 1.1rem; line-height: 1.4;"><a href="{{ route('posts.show', $post) }}">{{ Str::limit($post->title, 70) }}</a></h3>
                </div>
            </article>
        @endforeach
    </div>
</div>

<!-- Berita Lainnya (Bottom Content) -->
<h2 class="section-title">Berita Lainnya dari Turnamen</h2>
<div class="grid-three">
    @foreach($latestNews->skip($featured ? 5 : 4)->take(3) as $post)
        <article class="card" style="border: none; box-shadow: none; background: transparent;">
            <div class="card-image-container" style="border-radius: var(--radius);">
                <img class="card-image" style="aspect-ratio: 16/10;" src="{{ $post->image_url }}" alt="{{ $post->title }}">
            </div>
            <div style="padding: 1rem 0;">
                <h3 class="card-title" style="font-size: 1.1rem;"><a href="{{ route('posts.show', $post) }}">{{ Str::limit($post->title, 60) }}</a></h3>
                <span style="font-size: 0.85rem; color: var(--muted);">{{ $post->created_at->locale('id')->format('d M Y') }}</span>
            </div>
        </article>
    @endforeach
</div>
@stop
