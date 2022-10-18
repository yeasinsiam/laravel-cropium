@extends('layouts.admin')
@section('title', 'All Posts')



@section('contents')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">All Posts</h3>
                            </div>
                            <div class="col">
                                <form class="ml-auto search-form d-none d-md-block" action="{{ route('admin.posts.index') }}"
                                    method="GET">
                                    <input type="search" class="form-control" name="search" placeholder="Search"
                                        value="{{ $search }}">
                                </form>
                            </div>
                        </div>
                        @if (session()->has('success-message'))
                            <div class="alert alert-success">
                                {{ session('success-message') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> Post ID </th>
                                        <th> Thumbnail </th>
                                        <th> Title</th>
                                        <th> Categories </th>
                                        <th> Author </th>
                                        <th> Total Views </th>
                                        <th> Created At </th>
                                        <th> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($posts->count() > 0)
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td><a
                                                        href="{{ route('admin.posts.edit', $post) }}">#{{ $post->id }}</a>
                                                </td>
                                                <td class="py-1">
                                                    <img class="thumb-image"
                                                        src="{{ filter_var($post->thumbnail, FILTER_VALIDATE_URL)
                                                            ? $post->thumbnail
                                                            : asset('/storage/post-images/') . '/' . $post->thumbnail }}"
                                                        alt="Thumbnail" />
                                                </td>
                                                <td> <a
                                                        href="{{ route('admin.posts.edit', $post) }}">{{ $post->title }}</a>
                                                </td>
                                                <td>
                                                    {{-- {{ $post->postCategory->name }} --}}

                                                    @foreach ($post->categories as $category)
                                                        <button
                                                            onclick="window.location.href='{{ route('admin.categories.edit', $category) }}'"
                                                            type="button" class="btn btn-outline-info d-block"
                                                            style="font-size: .8rem; margin-bottom: 3px">{{ $category->name }}</button>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{ $post->user->name }}
                                                </td>
                                                <td> {{ $post->views }} </td>
                                                <td> {{ date('M d, Y', strtotime($post->updated_at)) }} </td>
                                                <td>

                                                    @can('update', $post)
                                                        <a href="{{ route('admin.posts.edit', $post) }}">
                                                            <i class="fa fa-edit" style="font-size:1.4em"></i>
                                                        </a>
                                                    @endcan


                                                    @can('update', $post)
                                                        <form action="{{ route('admin.posts.destroy', $post) }}"
                                                            onclick="return confirm('Sure delete this post?')"
                                                            class="d-inline m-0 ml-2" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="bg-transparent border-0 outline-0 m-0 text-danger"><i
                                                                    class="fa fa-trash" style="font-size:1.4em"></i></button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td><span> {{ $search ? 'No search result found' : 'No Post found' }} </span>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{ $posts->links('components.admin.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
