@extends('master')
@section('title', $post->title)
@section('body')
@php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
@endphp

<div class="grid-two" style="margin-top: 1.5rem;">
    <!-- Main Content -->
    <article class="card" style="padding: 1.5rem;">
        <div style="margin-bottom: 1.5rem;">
            <div class="meta" style="margin-bottom: 1rem;">
                <span class="publisher" style="font-size: 0.95rem;">{{ $post->publisher ?? 'Berita Bola' }}</span>
                <span>&bull;</span>
                <span style="font-size: 0.95rem;">{{ $post->event_date ? Carbon::parse($post->event_date)->locale('id')->isoFormat('dddd, D MMMM Y') : $post->created_at->locale('id')->isoFormat('dddd, D MMMM Y') }}</span>
            </div>
            <h1 class="post-title" style="margin-top: 0; font-size: clamp(2rem, 4vw, 2.8rem); line-height: 1.2;">{{ $post->title }}</h1>
        </div>

        @if($post->image_url)
            <figure style="margin: 0 0 2rem;">
                <img class="post-image" src="{{ $post->image_url }}" alt="{{ $post->title }}" style="width: 100%; height: auto; aspect-ratio: 16/9; object-fit: cover; border-radius: var(--radius); margin-bottom: 0.5rem; display: block;">
                <figcaption style="color: var(--muted); font-size: 0.85rem; text-align: center;">Ilustrasi: {{ $post->title }}</figcaption>
            </figure>
        @endif

        <div class="post-content" style="font-size: 1.1rem; color: #333; line-height: 1.8;">
            <p>{{ $post->content }}</p>
            <p><strong>Kategori:</strong> {{ $post->publisher ?? 'Umum' }}</p>
        </div>

        <div style="margin-top: 3rem; border-top: 1px solid var(--border); padding-top: 1.5rem;">
            <a class="nav-button" href="{{ route('posts.index') }}" style="display: inline-block;">&larr; Kembali ke Daftar Berita</a>
        </div>
    </article>

    <!-- Sidebar -->
    <aside class="aside-panel">
        <div class="aside-card">
            <h3 class="section-title">Berita Terkait</h3>
            <div class="stack" style="gap: 1rem;">
                @foreach($relatedPosts as $related)
                    <article style="display: flex; flex-direction: column; gap: 0.25rem;">
                        <h4 style="margin: 0; font-size: 0.95rem; line-height: 1.4;">
                            <a href="{{ route('posts.show', $related) }}">{{ $related->title }}</a>
                        </h4>
                        <span style="font-size: 0.8rem; color: var(--muted);">{{ $related->event_date ? Carbon::parse($related->event_date)->locale('id')->diffForHumans() : $related->created_at->locale('id')->diffForHumans() }}</span>
                    </article>
                @endforeach
            </div>
        </div>
        
        <div class="aside-card" style="background: var(--primary-soft);">
            <h3 class="section-title" style="border-color: var(--primary-strong);">Topik Populer</h3>
            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                <span class="badge" style="background: #fff; border: 1px solid var(--border);">Liga 1</span>
                <span class="badge" style="background: #fff; border: 1px solid var(--border);">Timnas</span>
                <span class="badge" style="background: #fff; border: 1px solid var(--border);">Transfer</span>
                <span class="badge" style="background: #fff; border: 1px solid var(--border);">Liga Inggris</span>
            </div>
        </div>
    </aside>
</div>
@stop
