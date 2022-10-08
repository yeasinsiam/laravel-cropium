@php
info($links);
@endphp
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="title">{{ $title }}</h2>
                <a href="{{ route('home.index') }}">home</a><span> /</span>
                @foreach ($links as $link)
                    @if ($link['url'])
                        <a href="{{ $link['url'] }}">{{ $link['title'] }}</a>
                    @else
                        <span> {{ $link['title'] }}</span>
                    @endif
                    @if (!$loop->last)
                        <span>/</span>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
