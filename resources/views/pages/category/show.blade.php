@extends('layouts.app')

@section('title', $category->name)

@section('content')

    <!-- Breadcrumb Area Starts -->
    @include('components.areas.breadcrumb', [
        'title' => $category->name,
        'links' => [
            [
                'title' => 'Categories',
                'url' => null,
            ],
            [
                'title' => $category->name,
                'url' => null,
            ],
        ],
    ])

    <!-- Blog Area Starts -->
    @include('components.areas.blog-area', compact('posts'))

    <!-- Call To Action Area Starts -->
    @include('components.areas.call-to-action-area')


@endsection
