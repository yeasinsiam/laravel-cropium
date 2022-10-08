@extends('layouts.app')

@section('title', $search ?? 'Blog')

@section('content')

    <!-- Breadcrumb Area Starts -->
    @include('components.areas.breadcrumb', [
        'title' => $search ?? 'Blog',
        'links' => array_merge(
            [
                [
                    'title' => 'blog',
                    'url' => $search ? route('blog.index') : null,
                ],
            ],
            $search
                ? [
                    [
                        'title' => $search,
                        'url' => null,
                    ],
                ]
                : []
        ),
    ])

    <!-- Blog Area Starts -->
    @include('components.areas.blog-area', compact('posts'))

    <!-- Call To Action Area Starts -->
    @include('components.areas.call-to-action-area')


@endsection
