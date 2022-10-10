<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search');
        $categories = Category::where('name', 'like', '%' . $search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(4)
            ->withQueryString();


        $activeMenu = ['post', 'categories'];

        return view('pages.admin.category.categories', compact(
            'categories',
            'search',
            'activeMenu'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        if (auth()->user()->role !== 'admin')
            abort(404);

        Category::create($request->all());
        return back()->with('success-message', 'Category created successfully !');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        if (auth()->user()->role !== 'admin')
            abort(404);

        $search = request('search');
        $categories = Category::where('name', 'like', '%' . $search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(4)
            ->withQueryString();

        $is_edit_page = true;

        $activeMenu = ['post', 'categories'];


        return view('pages.admin.category.categories', compact(
            'search',
            'categories',
            'category',
            'is_edit_page',
            'activeMenu'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        if (auth()->user()->role !== 'admin')
            abort(404);

        $category->update($request->all());
        return back()->with('success-message', 'Category updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {


        if (auth()->user()->role !== 'admin')
            abort(404);

        $category->delete();
        return redirect()->back()->with('success-message2', 'Category deleted successfully');
    }
}