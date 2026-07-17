@extends('master')
@section('title', 'Kelola Berita')

@section('body')
<div class="card" style="margin-top: 1.5rem; padding: 1.5rem;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h2 class="section-title" style="margin-bottom: 0;">Kelola Berita</h2>
        <a href="{{ route('admin.posts.create') }}" class="nav-button" style="text-decoration: none;">+ Tambah Berita Baru</a>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border: 1px solid #a7f3d0;">
            {{ session('success') }}
        </div>
    @endif

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
            <thead>
                <tr style="border-bottom: 2px solid var(--border); text-align: left;">
                    <th style="padding: 1rem 0.5rem; color: var(--muted);">Judul</th>
                    <th style="padding: 1rem 0.5rem; color: var(--muted);">Kategori</th>
                    <th style="padding: 1rem 0.5rem; color: var(--muted);">Status</th>
                    <th style="padding: 1rem 0.5rem; color: var(--muted);">Tanggal Dibuat</th>
                    <th style="padding: 1rem 0.5rem; color: var(--muted); text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr style="border-bottom: 1px solid var(--border);">
                        <td style="padding: 1rem 0.5rem; font-weight: 600;">{{ $post->title }}</td>
                        <td style="padding: 1rem 0.5rem; color: var(--muted);">{{ $post->publisher ?? '-' }}</td>
                        <td style="padding: 1rem 0.5rem;">
                            @if($post->published == 'yes')
                                <span style="background: #d1fae5; color: #065f46; padding: 0.25rem 0.75rem; border-radius: 999px; font-size: 0.85rem; font-weight: 600;">Tayang</span>
                            @else
                                <span style="background: #fee2e2; color: #991b1b; padding: 0.25rem 0.75rem; border-radius: 999px; font-size: 0.85rem; font-weight: 600;">Draft</span>
                            @endif
                        </td>
                        <td style="padding: 1rem 0.5rem; color: var(--muted);">{{ $post->created_at->format('d M Y') }}</td>
                        <td style="padding: 1rem 0.5rem; text-align: right;">
                            <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                                <a href="{{ route('admin.posts.edit', $post) }}" style="padding: 0.5rem 1rem; background: var(--primary-soft); color: var(--primary); border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 0.9rem;">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="padding: 0.5rem 1rem; background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; border-radius: 6px; font-weight: 600; font-size: 0.9rem; cursor: pointer;">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 2rem; text-align: center; color: var(--muted);">
                            Belum ada berita yang ditambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 2rem;">
        {{ $posts->links() }}
    </div>
</div>
@endsection
