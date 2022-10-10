@extends('layouts.admin')
@section('title', 'Create User')


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
                                <h3 class="card-title">Create User</h3>
                            </div>

                        </div>
                        <hr>
                        <form class="forms-sample" method="POST" action="{{ route('admin.users.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="user-name">Name</label>
                                <input type="text" class="form-control" id="user-name" placeholder="Name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" class="file-upload-default" id="image" />
                                <div class="input-group col-xs-12">
                                    <input type="text" id="thumbnail-text" class="form-control file-upload-info"
                                        placeholder="Upload Photo" value="">
                                    <span class="input-group-append">
                                        <label class="file-upload-browse btn btn-info" for="image"
                                            style="padding: .5rem 1rem">Upload</label>
                                    </span>
                                </div>
                                @error('photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="user-email">Email</label>
                                <input type="text" class="form-control" id="user-email" placeholder="Email"
                                    name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="user-password">Password</label>
                                <input type="password" class="form-control" id="user-password" placeholder="Password"
                                    name="password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="user-password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="user-password_confirmation"
                                    placeholder="Confirm Password" name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success mr-2">Create</button>
                            <a href="{{ route('admin.users.create') }}" class="btn btn-light">Reset</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
