@extends('layouts.admin')
@section('title', 'Categories')


@section('contents')
    <div class="content-wrapper">
        <div class="row">
            @can('Create And Modify Categories')
                <div class="col-md-5 col-sm-12   grid-margin stretch-card">
                    <div class="card">
                        @if (session()->has('success-message'))
                            <div class="alert alert-success">{{ session('success-message') }}</div>
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h3 class="card-title">
                                        @if (isset($is_edit_page))
                                            Edit Category
                                        @else
                                            Create Category
                                        @endif
                                    </h3>
                                </div>
                                {{-- <div class="col text-right">Permalink: <a href="{{ route( 'blog-details',  $post->slug ) }}" target="_blank">{{ route( 'blog-details',  $post->slug ) }}</a></div> --}}
                            </div>
                            <hr>
                            @if (isset($is_edit_page))
                                <form class="forms-sample" method="POST"
                                    action="{{ route('admin.categories.update', $category) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="post-title">Name</label>
                                        <input type="text" class="form-control" id="post-title" placeholder="Category Name"
                                            name="name" value="{{ $category->name }}">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success mr-2">Update</button>
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-light">Reset</a>
                                </form>
                            @else
                                <form class="forms-sample" method="POST" action="{{ route('admin.categories.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="post-title">Name</label>
                                        <input type="text" class="form-control" id="post-title" placeholder="Category Name"
                                            name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success mr-2">Create</button>
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-light">Reset</a>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endcan

            <div class="@can('View Categories') col-lg-7  @else col-lg-12 @endcan grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">All Categories</h3>
                            </div>
                            <div class="col">
                                <form class="ml-auto search-form d-none d-md-block"
                                    action="{{ route('admin.categories.index') }}" method="GET">
                                    <input type="search" class="form-control" name="search" placeholder="Search"
                                        value="{{ $search }}">
                                </form>
                            </div>
                        </div>
                        @if (session()->has('success-message2'))
                            <div class="alert alert-success">
                                {{ session('success-message2') }}
                            </div>
                        @endif
                        {{-- <div class="table-responsive"> --}}
                        <table class="table table-striped table-sm admin-table">
                            <thead>
                                <tr>
                                    <th> Category ID </th>
                                    <th> Name </th>
                                    <th> Slug</th>
                                    <th> Updated At </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categories->count() > 0)
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td><a
                                                    href="{{ route('admin.categories.edit', $category) }}">#{{ $category->id }}</a>
                                            </td>
                                            <td> <a
                                                    href="{{ route('admin.categories.edit', $category) }}">{{ $category->name }}</a>
                                            </td>
                                            <td> {{ $category->slug }} </td>
                                            <td> {{ date('M d, Y', strtotime($category->updated_at)) }} </td>
                                            <td>
                                                @can('update', $category)
                                                    <a href="{{ route('admin.categories.edit', $category) }}">
                                                        <i class="fa fa-edit" style="font-size:1.4em"></i>
                                                    </a>
                                                @endcan
                                                @can('delete', $category)
                                                    <form action="{{ route('admin.categories.destroy', $category) }}"
                                                        onclick="return confirm('Sure delete this category?')"
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
                                        <td><span> {{ $search ? 'No search result found' : 'No Post found' }} </span> </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <style>
                            .admin-table {
                                table-layout: fixed;
                            }

                            .admin-table td {
                                overflow: hidden;
                                text-overflow: ellipsis;
                            }
                        </style>
                        {{-- </div> --}}
                        {{ $categories->links('components.admin.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
