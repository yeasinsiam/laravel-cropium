<!-- Blog Area Starts -->
<div class="blog-area padding-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach ($posts as $post)
                    <article class="cropium-blog-item">
                        <div class="blog-image">


                            <img src="{{ filter_var($post->thumbnail, FILTER_VALIDATE_URL)
                                ? $post->thumbnail
                                : asset('/storage/post-images/') . '/' . $post->thumbnail }}"
                                alt="{{ $post->title }}">


                            <div class="blog-date">
                                <h5 class="title">{{ $post->created_at->format('d') }}</h5>
                                <span>{{ $post->created_at->format('M') }}</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="{{ route('users.show', $post->user->slug) }}"><i
                                                class="fa fa-user-o"></i>{{ $post->user->name }}</a></li>
                                    <li>
                                        <i class="fa fa-bookmark-o"></i>
                                        @foreach ($post->categories as $category)
                                            @if ($loop->last)
                                                <a
                                                    href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
                                            @else
                                                <a
                                                    href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>,
                                                &nbsp;
                                            @endif
                                        @endforeach
                                        {{-- {{ $post->categories->implode('name', ', ') }} --}}
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->id }}.
                                    {{ $post->title }}</a>
                            </h3>
                            <p>{{ $post->excerpt }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
            <!-- Blog Sidebar Starts -->
            @include('components.blog.blog-sidebar');
        </div>

        <!-- Blog Pagination Starts -->
        {{ $posts->links('components.blog.blog-area-pagination') }}




    </div>
</div>
