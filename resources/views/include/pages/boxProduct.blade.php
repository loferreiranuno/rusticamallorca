<div class="feed-element">
    <a href="{{route('product.show',['id'=>$product->id])}}" class="pull-left">
        <img alt="image" class="img-circle" src="{{asset(App\Helpers\RusticaHelper::getProductImage($product, false))}}">
    </a>
    <div class="media-body">
        <small class="pull-right"></small>
        <strong>{{$product->kind->name}} in {{$product->street_name}},{{$product->city_name}}, {{$product->area}}m&sup2;</strong>
 
        <div>
        <span class="label label-success-light">{{$product->identifier}}</span>
        @if($product->selling_enabled && $product->selling_cost > 0)
            <span class="label label-warning-light">{{$product->selling_cost}}&euro;</span>
        @endif
        @if($product->renting_enabled && $product->renting_cost > 0)
            <span class="label label-warning-light">{{$product->renting_cost}}&euro;</span>
        @endif
        {{-- <small class="text-muted">
            {{\Carbon\Carbon::createFromTimeStamp(strtotime($product->updated_at))->diffForHumans()}}
        </small> --}}
        </div>
        {{-- <div class="well">
        {{$product->fullAddress}} 
        </div> --}}
        <div class="actions">
        @if($contact->kind->name === "owner")

        @else
            @if(isset($id))
                @if(!isset($interested) || $interested)
                    <a class="btn btn-xs btn-white" data-id="{{$id}}" data-method="PATCH" wishlist-btn data-href="{{route('wishlist.update',['id'=>$id])}}" data-product="{{$product->id}}" data-contact="{{$contact->id}}" data-interested="false"><i class="fa fa-thumbs-down"></i> Dislike </a>
                @endif

                @if(!isset($interested) || !$interested)
                    <a class="btn btn-xs btn-white" data-id="{{$id}}" data-method="PATCH" wishlist-btn data-href="{{route('wishlist.update',['id'=>$id])}}" data-product="{{$product->id}}" data-contact="{{$contact->id}}" data-interested="true"><i class="fa fa-thumbs-up"></i> Like </a>
                @endif

            @else
                @if(!isset($interested) || $interested)
                    <a class="btn btn-xs btn-white" data-id="" data-method="POST" wishlist-btn data-href="{{route('wishlist.store')}}" data-product="{{$product->id}}" data-contact="{{$contact->id}}" data-interested="false"><i class="fa fa-thumbs-down"></i> Dislike </a>
                @endif

                @if(!isset($interested) || !$interested)
                    <a class="btn btn-xs btn-white" data-id="" data-method="POST" wishlist-btn data-href="{{route('wishlist.store')}}" data-product="{{$product->id}}" data-contact="{{$contact->id}}" data-interested="true"><i class="fa fa-thumbs-up"></i> Like </a>
                @endif
            @endif
        @endif
        </div>
    </div>
</div>