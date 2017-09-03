<div class="feed-element"> 
    <div class="media-body">
        <small class="pull-right"></small>
        <a href="{{route('contact.show',['id'=>$contact->id])}}" class="pull-left">

        <strong>{{$contact->name}} </strong> 
        
        </a>
        @if(isset($contact->interest))
         
            @if(isset($contact->interest->kind))
                is looking for a {{$contact->interest->kind->name}}
            @endif 
            @if($contact->interest->rent)
                , rent to {{$contact->interest->rent_max}} &euro;
            @endif

            @if($contact->interest->sale) 
                , sale to {{$contact->interest->sale_max}} &euro;
            @endif 

        @endif
        
        <div class="actions">
            <a href="{{ route('contact.show',['contact'=>$contact]) }}" class="btn btn-xs btn-default"><i class="fa fa-user"></i> Contact</a>
            
            @if(!isset($interested) || $interested)
                <a class="btn btn-xs btn-white" data-id="{{$id}}" data-method="PATCH" wishlist-btn data-href="{{route('wishlist.update',['id'=>$id])}}" data-product="{{$product->id}}" data-contact="{{$contact->id}}" data-interested="false"><i class="fa fa-thumbs-down"></i> Dislike </a>
            @endif

            @if(!isset($interested) || !$interested)
                <a class="btn btn-xs btn-white" data-id="{{$id}}" data-method="PATCH" wishlist-btn data-href="{{route('wishlist.update',['id'=>$id])}}" data-product="{{$product->id}}" data-contact="{{$contact->id}}" data-interested="true"><i class="fa fa-thumbs-up"></i> Like </a>
            @endif
        </div>
    </div>
</div> 