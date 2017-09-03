<div class="ibox float-e-margins">
<div class="ibox-title">
    <i class="{{$css_icon}} pull-right"></i>
    <h5>{{$label}} properties</h5> 
</div>
<div class="ibox-content">

    <div>
        <div class="feed-activity-list">

  @if(!isset($products) || $products->count() == 0)
       No {{$label}} for this contact
  @else                    
    @foreach($products as $product)
        @include('include.pages.boxProduct',['product'=>$product, 'contact'=>$contact??null])      
    @endforeach    
    @endif
</div> 
</div>
</div>
</div>
<!-- .suggestions --> 