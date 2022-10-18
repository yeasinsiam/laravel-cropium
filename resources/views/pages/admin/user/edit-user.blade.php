@extends('layouts.admin')
@section('title', $user->name)


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
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            {{-- <div class="col text-right">Permalink: <a href="{{ route('blog.show', $post->slug) }}"
                                    target="_blank">{{ route('blog.show', $post->slug) }}</a></div> --}}
                        </div>
                        <hr>
                        <form class="forms-sample" method="POST" action="{{ route('admin.users.update', $user) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="user-name">Name</label>
                                <input type="text" class="form-control" id="user-name" placeholder="Name" name="name"
                                    value="{{ old('name') ?? $user->name }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" class="file-upload-default" id="photo" />
                                <div class="input-group col-xs-12">
                                    <input type="text" id="photo-text" class="form-control file-upload-info"
                                        placeholder="Upload Photo" value="{{ $user->photo }}" readonly>
                                    <span class="input-group-append">
                                        <label class="file-upload-browse btn btn-info" for="photo"
                                            style="padding: .5rem 1rem">Upload</label>
                                    </span>
                                </div>
                                <div class="input-group col-xs-12">
                                    <img class="edit-image"
                                        src="{{ filter_var($user->photo, FILTER_VALIDATE_URL)
                                            ? $user->photo
                                            : asset('/storage/user-photos/') . '/' . $user->photo }}"
                                        alt="{{ $user->name }}">
                                </div>
                                @error('photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="user-email">Email</label>
                                <input type="text" class="form-control" id="user-email" placeholder="Email"
                                    name="email" value="{{ old('email') ?? $user->email }}">
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
                            <hr>

                            {{-- User Roles --}}
                            <div class="form-group">
                                <label for="user-role">Select User Role</label>
                                <select class="form-control form-control-lg" id="user-role" name="user_role">
                                    <option value="">No Role</option>
                                    @foreach ($roles as $role)
                                        <option @selected($user->roles()->find($role->id)) value={{ $role->name }}>{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            {{-- User Permissions --}}
                            <div class="form-group">
                                <label for="user-permissions">Select User Permissions</label>
                                @foreach ($permissions as $permission)
                                    <div class="form-check form-check-flat">
                                        <label class="form-check-label">
                                            <input name="user_permissions[]" type="checkbox" class="form-check-input"
                                                value="{{ $permission->name }}" @checked($user->permissions()->find($permission->id))>
                                            {{ $permission->name }} <i class="input-helper"></i></label>
                                    </div>
                                @endforeach


                            </div>




                            <button type="submit" class="btn btn-success mr-2">Update</button>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-light">Reset</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
