@extends('layouts.app')

@section('title', $user->name)

@section('content')

    <!-- Breadcrumb Area Starts -->
    @include('components.areas.breadcrumb', [
        'title' => $user->name,
        'links' => [
            [
                'title' => 'Users',
                'url' => null,
            ],
            [
                'title' => $user->name,
                'url' => null,
            ],
        ],
    ])

    <!-- Blog Area Starts -->
    @include('components.areas.blog-area', compact('posts'))

    <!-- Call To Action Area Starts -->
    @include('components.areas.call-to-action-area')


@endsection
