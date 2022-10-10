<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogPageController extends Controller
{

    public function index()
    {

        $search = request('search');

        $posts = Post::with([
            'user' => function ($user) {
                $user->select('id', 'name', 'slug');
            },
            'categories' => function ($category) {
                $category->select('name', 'slug');
            }
        ])
            ->where('title', 'like', '%' . $search . '%')
            ->orWhere('excerpt', 'like', '%' . $search . '%')
            ->orWhere('content', 'like', '%' . $search . '%')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('pages.blog.blog', compact('posts', 'search'));
    }


    public function show(Post $blog)
    {
        $post = Cache::remember("blog-post." . $blog->slug, now()->addSeconds(10), function () use ($blog) {
            return $blog;
        });
        return view('pages.blog.show', compact('post'));
    }
}