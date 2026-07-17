<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'published' => 'required|in:yes,no',
            'image_url' => 'nullable|string',
            'publisher' => 'nullable|string|max:255',
            'event_date' => 'nullable|date',
        ]);

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(Post $post)
    {
        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'published' => 'required|in:yes,no',
            'image_url' => 'nullable|string',
            'publisher' => 'nullable|string|max:255',
            'event_date' => 'nullable|date',
        ]);

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil dihapus.');
    }
}
