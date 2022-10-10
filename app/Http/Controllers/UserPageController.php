<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserPageController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->load('posts.user')->posts()->paginate(10);
        return view('pages.user.show', compact('user', 'posts'));
    }
}