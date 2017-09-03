<div class="ibox float-e-margins">
<div class="ibox-title">
    <i class="{{$css_icon}} pull-right"></i>
    <h5>{{$label}} contacts</h5> 
</div>

    <div class="feed-activity-list">
    @if(!isset($wishList) || $wishList->count() == 0)
       No {{$label}} for this property
    @else  
    @foreach($wishList as $wish)
        @include('include.pages.boxContactLateral', ['id'=> $wish->id,'product'=>$wish->product,'interested'=>$wish->interested == 1,'contact'=>$wish->contact])  
    @endforeach                
    @endif
</div>
