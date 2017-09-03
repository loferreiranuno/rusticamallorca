<div class="ibox float-e-margins">
<div class="ibox-title">
    <i class="{{$css_icon}} pull-right"></i>
    <h5>{{$label}} properties</h5> 
</div>
<div class="ibox-content">

    <div>
        <div class="feed-activity-list">

  @if(!isset($wishList) || $wishList->count() == 0)
       No {{$label}} for this contact
  @else                    
    @foreach($wishList as $wish)
        @include('include.pages.boxProduct',[
            'contact'=>$wish->contact, 
            'product'=>$wish->product,
            'interested'=>$wish->interested,
            'id'=>$wish->id])    
        @endforeach    
    @endif
</div> 
</div>
</div>
</div>
<!-- .suggestions --> 