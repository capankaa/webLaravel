<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function home()
    {
        $posts = Post::where('published', 'yes')
            ->orderBy('event_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('index', [
            'featured' => $posts->first(),
            'topStories' => $posts->skip(1)->take(4),
            'latestNews' => $posts,
        ]);
    }

    public function index(Request $request)
    {
        $query = $request->query('q');
        $posts = Post::where('published', 'yes');

        if ($query) {
            $posts->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%")
                    ->orWhere('publisher', 'like', "%{$query}%");
            });
        }

        $posts = $posts->orderBy('event_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(8)
            ->withQueryString();

        return view('posts', [
            'posts' => $posts,
            'query' => $query,
        ]);
    }

    public function show(Post $post)
    {
        if ($post->published !== 'yes') {
            abort(404);
        }

        $relatedPosts = Post::where('published', 'yes')
            ->where('id', '!=', $post->id)
            ->orderBy('event_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('post', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
        ]);
    }
}
