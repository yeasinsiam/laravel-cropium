<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryPageController extends Controller
{

    public function show(Category $category)
    {
        $posts = $category->posts()->orderByDesc('id')->paginate(10);
        return view('pages.category.show', compact('category', 'posts'));
    }
}