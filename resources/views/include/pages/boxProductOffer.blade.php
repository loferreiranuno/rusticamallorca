<h3>
<button type="button"  class="btn btn-primary m-r-sm" data-toggle="modal"  data-target="#offerModal">
        <i class="fa fa-plus-square-o"></i>
        </button>
        Add Offer
</h3> 

@if(isset($product->offers))
    <div class="feed-activity-list">
        @foreach($product->offers as $offer)
            <div class="feed-element">
                <div class="pull-left">                                               
                        
                </div>
                <div class="media-body ">      
                    <h2>{{$offer->value}} &euro;</h2>                                          
                    <strong>{{ $offer->contact->name }}</strong> made a {{$offer->operation}} offer!<br>
                    <small class="text-muted">{{ $offer->created_at }} seller {{$offer->seller->name}}</small>
                    <div class="actions">
                    @if($offer->status != "open")
                        <span class="label label-{{$offer->status == 'accepted' ? 'primary':'danger'}} pull-left">{{$offer->status}}</span>                    
                    @endif
                    @if(!$offer->rejected && !$offer->sold) 
                        <button method="POST" offer-id="{{$offer->id}}" offer-action="{{ route('offer.rejected', ['offer'=>$offer->id]) }}" class="btn btn-xs btn-danger pull-left"><i class="fa fa-thumbs-down"></i> Reject!</button>
                        @if($offer->operation == "sell")
                        <button method="POST" offer-id="{{$offer->id}}" offer-action="{{ route('offer.sold', ['offer'=>$offer->id]) }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-thumbs-up"></i> Sold!</button>
                        @else
                        <button method="POST" offer-id="{{$offer->id}}" offer-action="{{ route('offer.rented', ['offer'=>$offer->id]) }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-thumbs-up"></i> Rented!</button>
                        @endif
                    @else
                        <button method="DELETE" offer-id="{{$offer->id}}" offer-action="{{ route('offer.destroy', ['offer'=>$offer->id]) }}" class="btn btn-xs btn-default pull-right"><i class="fa fa-trash"></i> Remove!</button>
                    @endif
                    </div>
                </div>
            </div>                                 
        @endforeach
    </div>                     
@endif

        
@include("include.modal.offerModal", ['modalId'=> 'offerModal'])


@section("scripts")
@parent

<script>

$(document).ready(function(){

        $("[offer-action]").on("click", function(e){
            e.preventDefault();

            var method = $(this).attr("method") || "GET";
            var action = $(this).attr("offer-action");
            var offer_id = $(this).attr("offer-id");

            $.ajax({
                type: method,
                url: action,       
                data:{
                    offer: offer_id,
                    _token: "{{csrf_token()}}"
                },     
                success: function(data){ 
                    window.location.reload();
                },
                error: function(error){ 

                }
            });
        });

});</script>
@stop
