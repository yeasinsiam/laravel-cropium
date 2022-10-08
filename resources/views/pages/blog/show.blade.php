@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <!-- Breadcrumb Area Starts -->
    @include('components.areas.breadcrumb', [
        'title' => $post->title,
        'links' => [
            [
                'title' => 'blog',
                'url' => route('blog.index'),
            ],
            [
                'title' => $post->title,
                'url' => null,
            ],
        ],
    ])

    <!-- Blog Details Area Starts -->
    @include('components.areas.blog-details-area', compact('post'))

    <!-- Call To Action Area Starts -->
    @include('components.areas.call-to-action-area')
@endsection
