<nav class="site-navigation paging-navigation navbar">

    @if($data->currentPage() > 1)
        <div class="nav-previous"><a href="{{$data->previousPageUrl()}}">PREV PAGE</a></div>
    @endif

    @if($data->lastPage() != 1)
    <ul class="pagination pagination-lg">  
        @for ($i = 1; $i <= ceil($data->total() / $data->perPage()); $i++)
            @if($data->currentPage() == $i)
                <li><span class="active">{{$i}}</span></li>
            @else
                <li><a href="{{$data->url($i)}}">{{$i}}</a></li>
            @endif
        @endfor 
    </ul>
    @endif
    @if($data->hasMorePages())
        <div class="nav-next"><a href="{{$data->nextPageUrl()}}">NEXT PAGE</a></div>  
    @endif

</nav>