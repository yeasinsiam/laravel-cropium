@extends('layouts.admin')
@section('title', 'All Users')


@section('contents')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">All Users</h3>
                            </div>
                            <div class="col">
                                <form class="ml-auto search-form d-none d-md-block" action="{{ route('admin.users.index') }}"
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
                                        <th> User ID </th>
                                        <th> Photo </th>
                                        <th> Name</th>
                                        <th> Email </th>
                                        <th> Created At </th>
                                        <th> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users->count() > 0)
                                        @foreach ($users as $user)
                                            <tr>
                                                <td><a
                                                        href="{{ route('admin.users.edit', $user) }}">#{{ $user->id }}</a>
                                                </td>
                                                <td class="py-1">
                                                    <img class="thumb-image"
                                                        src="{{ filter_var($user->photo, FILTER_VALIDATE_URL)
                                                            ? $user->photo
                                                            : asset('/storage/user-photos/') . '/' . $user->photo }}"
                                                        alt="photo" />
                                                </td>


                                                <td>
                                                    <a href="{{ route('admin.users.edit', $user) }}">{{ $user->name }}</a>

                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td> {{ $user->created_at->format('M d, Y') }} </td>
                                                <td>
                                                    @can('update', $user)
                                                        <a href="{{ route('admin.users.edit', $user) }}">
                                                            <i class="fa fa-edit" style="font-size:1.4em"></i>
                                                        </a>
                                                    @endcan
                                                    @can('delete', $user)
                                                        <form action="{{ route('admin.users.destroy', $user) }}"
                                                            onclick="return confirm('Sure delete this user?')"
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
                                            <td><span> {{ $search ? 'No search result found' : 'No user found' }} </span>
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
                        {{ $users->links('components.admin.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
