<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::orderByDesc('created_at')->get()
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'slug' => 'nullable',
            'image_url' => 'nullable',
            'published_at' => ['required', 'date']
        ]);

        Post::create($data);

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'slug' => 'nullable',
            'image_url' => 'nullable',
            'published_at' => ['required', 'date']
        ]);

        $post->update($data);

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
