<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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


        $activeMenu = ['post', 'all-post'];

        return view('pages.admin.post.posts', compact('posts', 'search', 'activeMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        $categories = Category::all();
        $activeMenu = ['post', 'create-post'];
        return view('pages.admin.post.create', compact('categories', 'activeMenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {



        // dd($request->all());

        //image file upload
        $thumbnail_file = $this->storeThumbnailFile();

        $post =  Auth::user()->posts()->create(array_merge($request->all(), [
            'thumbnail' => $thumbnail_file->hashName(),
        ]));

        $post->categories()->sync($request->post_category_ids);

        // return back()->with('success-message', 'Post Created Successfully !');
        return redirect()->route('admin.posts.edit', $post)->with('success-message', 'Post Created Successfully !');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $categories = Category::all();

        $postCategoryIds = $post->categories->map(function ($category) {
            return $category->id;
        })->toArray();



        $activeMenu = ['post', 'all-post'];


        return view('pages.admin.post.edit-post', compact('post', 'categories', 'postCategoryIds', 'activeMenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {




        $merge_request_vars = [
            'user_id' => auth()->user()->id
        ];



        if ($request->hasFile('thumbnail')) {
            // Delete  old thumbnail
            $this->deleteThumbnailFile($post);

            // Add new image
            $thumbnail_file = $this->storeThumbnailFile();

            $merge_request_vars['thumbnail'] = $thumbnail_file->hashName();
        }


        // sync new category
        $post->categories()->sync($request->post_category_ids);


        $post->update(array_merge($request->all(), $merge_request_vars));

        return back()->with('success-message', 'Post Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {


        $post->categories()->sync([]);
        $this->deleteThumbnailFile($post);
        $post->delete();
        return back()->with('success-message', 'Post removed successfully!');
    }



    /**
     * Store thumbnail file from file object
     *
     * @return Illuminate\Http\UploadedFile
     */
    public function storeThumbnailFile()
    {
        $image = request()->file('thumbnail');
        $image->storeAs('/public/post-images/', $image->hashName());
        return $image;
    }


    /**
     * Delete thumbnail file from storage
     *
     * @param  \App\Models\Post  $post
     * @return Void
     */
    public function deleteThumbnailFile($post)
    {
        Storage::delete('/public/post-images/' . $post->thumbnail);
    }
}