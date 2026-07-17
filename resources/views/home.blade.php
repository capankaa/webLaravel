@extends('master')
@section('title', 'Dashboard')
@section('body')
<div style="display: flex; justify-content: center; align-items: center; min-height: 60vh; padding: 2rem;">
    <div class="card" style="width: 100%; max-width: 480px; padding: 3rem 2rem; text-align: center; border-radius: 20px; box-shadow: var(--shadow-hover); background: #fff; border: 1px solid var(--border);">
        
        <div style="width: 80px; height: 80px; border-radius: 50%; background: var(--primary-soft); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 2.2rem; font-weight: 800; margin: 0 auto 1.5rem;">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        
        <h2 style="font-size: 1.7rem; font-weight: 800; margin: 0 0 0.5rem; color: var(--foreground);">Halo, {{ explode(' ', Auth::user()->name)[0] }}!</h2>
        <p style="color: var(--muted); font-size: 1rem; margin: 0 0 2.5rem;">{{ Auth::user()->email }}</p>

        <a href="{{ route('admin.posts.index') }}" style="display: block; width: 100%; padding: 0.85rem; border-radius: 8px; font-weight: 600; font-size: 1rem; color: #fff; background: var(--primary); text-decoration: none; margin-bottom: 1rem; transition: opacity 0.2s;">
            Kelola Berita
        </a>

        <form method="POST" action="{{ url('/logout') }}">
            @csrf
            <button type="submit" style="width: 100%; padding: 0.85rem; border-radius: 8px; font-weight: 600; font-size: 1rem; color: #dc2626; background: #fee2e2; border: 1px solid #fecaca; cursor: pointer; transition: background 0.2s;">
                Keluar Akun
            </button>
        </form>
    </div>
</div>
@stop