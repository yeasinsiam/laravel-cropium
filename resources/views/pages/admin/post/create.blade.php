@extends('layouts.admin')
@section('title', 'Create Posts')


@section('contents')
    <div class="content-wrapper">
        <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    @if (session()->has('success-message'))
                        <div class="alert alert-success">{{ session('success-message') }}</div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">Create Post</h3>
                            </div>
                        </div>
                        <hr>
                        <form class="forms-sample" method="POST" action="{{ route('admin.posts.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="post-title">Title</label>
                                <input type="text" class="form-control" id="post-title" placeholder="Post Title"
                                    name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input type="file" name="thumbnail" class="file-upload-default" id="image" />
                                <div class="input-group col-xs-12">
                                    <input type="text" id="thumbnail-text" class="form-control file-upload-info"
                                        placeholder="Upload Image" value="" readonly>
                                    <span class="input-group-append">
                                        <label class="file-upload-browse btn btn-info" for="image"
                                            style="padding: .5rem 1rem">Upload</label>
                                    </span>
                                </div>
                                @error('thumbnail')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="post-excerpt">Excerpt</label>
                                <textarea class="form-control" name="excerpt" id="post-excerpt" rows="2" placeholder="Post Excerpt">{{ old('excerpt') }}</textarea>
                                @error('excerpt')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="post-content">Content</label>
                                <textarea class="form-control" name="content" id="post-content" cols="30" rows="10"
                                    placeholder="Post Content">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="post-category">Category</label>
                                <select class="form-control" id="post-category" name="post_category_ids[]" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(in_array($category->id, old('post_category_ids', [])))>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('post_category_ids')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Create</button>
                            <a href="{{ route('admin.posts.create') }}" class="btn btn-light">Reset</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
