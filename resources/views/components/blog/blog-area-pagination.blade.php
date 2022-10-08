@if ($paginator->hasPages())
    <div class="row order-md-1">
        <div class="col-lg-12">
            <div class="cropium-blog-pagination">
                <ul>
                    @if (!$paginator->onFirstPage())
                        <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li><span>{{ $element }}</span></li>
                        @endif
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active"><span>{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    @if ($paginator->hasMorePages())
                        <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif
