@extends('master')
@section('title', 'Tambah Berita')

@section('body')
<div class="card" style="margin-top: 1.5rem; padding: 1.5rem; max-width: 800px; margin-left: auto; margin-right: auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h2 class="section-title" style="margin-bottom: 0;">Tambah Berita Baru</h2>
        <a href="{{ route('admin.posts.index') }}" style="color: var(--muted); text-decoration: none; font-weight: 600;">&larr; Kembali</a>
    </div>

    @if ($errors->any())
        <div style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border: 1px solid #fecaca;">
            <ul style="margin: 0; padding-left: 1.5rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 1.5rem;">
            <label for="title" style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Judul Berita</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 6px; font-family: inherit;">
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label for="content" style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Isi Berita</label>
            <textarea id="content" name="content" rows="10" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 6px; font-family: inherit; resize: vertical;">{{ old('content') }}</textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div>
                <label for="publisher" style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Kategori (Fokus Utama, dsb.)</label>
                <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 6px; font-family: inherit;">
            </div>
            <div>
                <label for="event_date" style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Tanggal Kejadian</label>
                <input type="date" id="event_date" name="event_date" value="{{ old('event_date') }}" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 6px; font-family: inherit;">
            </div>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label for="image_url" style="display: block; font-weight: 600; margin-bottom: 0.5rem;">URL Gambar (Opsional)</label>
            <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}" placeholder="https://..." style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 6px; font-family: inherit;">
            <small style="color: var(--muted); display: block; margin-top: 0.25rem;">Sementara menggunakan URL gambar eksternal untuk mempercepat.</small>
        </div>

        <div style="margin-bottom: 2rem;">
            <label for="published" style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Status Publikasi</label>
            <select id="published" name="published" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 6px; font-family: inherit; background: #fff;">
                <option value="yes" {{ old('published') == 'yes' ? 'selected' : '' }}>Tayang (Publik)</option>
                <option value="no" {{ old('published') == 'no' ? 'selected' : '' }}>Draft (Disembunyikan)</option>
            </select>
        </div>

        <div style="text-align: right;">
            <button type="submit" class="nav-button" style="border: none; cursor: pointer; font-size: 1rem; padding: 0.75rem 2rem;">Simpan Berita</button>
        </div>
    </form>
</div>
@endsection
