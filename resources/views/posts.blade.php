@extends('master')
@section('title', 'Semua Berita')
@section('body')
@php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
@endphp

<div class="card" style="margin-top: 1.5rem; padding: 2rem;">
    <h2 class="section-title">Indeks Berita</h2>
    <p class="card-subtitle" style="margin-bottom: 1.5rem;">Cari berita bola terbaru dan tren transfer. Gunakan form di bawah untuk menemukan artikel yang kamu butuhkan.</p>

    <form action="{{ route('posts.index') }}" method="get" class="search-form" style="display: flex; gap: 1rem;">
        <input type="search" name="q" value="{{ $query ?? '' }}" placeholder="Cari berita..." class="search-input" style="flex: 1; padding: 0.75rem 1rem; border: 1px solid var(--border); border-radius: var(--radius); outline: none;">
        <button type="submit" class="nav-button">Cari</button>
    </form>
</div>

<div class="stack" style="margin-top: 2rem;">
    @if($posts->isEmpty())
        <div class="card" style="padding: 2rem; text-align: center;">
            <h3 class="section-title" style="border: none; padding: 0;">Belum ada berita yang ditemukan.</h3>
            <p class="card-subtitle">Coba kata kunci lain atau kunjungi halaman beranda untuk melihat highlight berita terbaru.</p>
        </div>
    @endif

    <div class="stack">
        @foreach($posts as $post)
            <article class="story-card" style="align-items: flex-start; padding: 1.5rem;">
                <img class="story-image" style="width: 280px; height: 160px;" src="{{ $post->image_url ?: 'https://images.unsplash.com/photo-1521412644187-c49fa049e84d?auto=format&fit=crop&w=600&q=80' }}" alt="{{ $post->title }}">
                <div class="story-content" style="justify-content: flex-start;">
                    <div class="meta" style="margin-top: 0; margin-bottom: 0.5rem;">
                        <span class="publisher" style="font-size: 0.85rem;">{{ $post->publisher ?? 'Berita Bola' }}</span>
                        <span>&bull;</span>
                        <span style="font-size: 0.85rem;">{{ $post->event_date ? Carbon::parse($post->event_date)->locale('id')->diffForHumans() : $post->created_at->locale('id')->diffForHumans() }}</span>
                    </div>
                    <h3 class="listing-title" style="margin: 0 0 0.5rem; font-size: 1.25rem;"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                    <p class="listing-text" style="margin: 0; font-size: 0.95rem;">{{ Str::limit($post->content, 180, '...') }}</p>
                </div>
            </article>
        @endforeach
    </div>

    @if($posts->hasPages())
        <div class="listing-pagination" style="display: flex; justify-content: center; gap: 0.5rem; margin-top: 2rem;">
            @if($posts->previousPageUrl())
                <a href="{{ $posts->previousPageUrl() }}" class="nav-link" style="border: 1px solid var(--border); border-radius: var(--radius); padding: 0.5rem 1rem;">&larr; Sebelumnya</a>
            @endif
            <span style="padding: 0.5rem 1rem; color: var(--muted); font-size: 0.95rem;">Halaman {{ $posts->currentPage() }} dari {{ $posts->lastPage() }}</span>
            @if($posts->nextPageUrl())
                <a href="{{ $posts->nextPageUrl() }}" class="nav-link" style="border: 1px solid var(--border); border-radius: var(--radius); padding: 0.5rem 1rem;">Selanjutnya &rarr;</a>
            @endif
        </div>
    @endif
</div>
@stop
