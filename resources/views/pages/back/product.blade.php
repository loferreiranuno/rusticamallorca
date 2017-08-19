@extends('layouts.back.default')
 

@section('breadcrumb')

        @include("include.back.breadcrumb", 
        [
            'title' => $product->title  ,
            'rootTitle' => "Properties",
            'root' => route("product.index"),
            'currentTitle' => $product->id, 
            'actionHtml' => '<button class="btn btn-primary pull-right margin-left" action-url="' . route('product.edit', ['product'=> $product->id]) . '">Edit</button>'
        ])    
@stop  

@section('content')
    <div class="row">
        <div class="col-lg-2">
             @include("include.pages.boxContact", ['contact'=> $product->owner, 'label'=> 'Owner'])
        </div>
        <div class="col-lg-2">
             <div></div>
        </div>
        <div class="col-lg-2">
            <div>Recruiter</div>
        </div>
    </div>
      <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">
                        <div class="row">    
                            <div class="col-lg-3"> 
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
                                                @if(!$offer->rejected && !$offer->sold) 
                                                    <button method="POST" offer-id="{{$offer->id}}" offer-action="{{ route('offer.rejected', ['offer'=>$offer->id]) }}" class="btn btn-xs btn-dangert pull-left"><i class="fa fa-thumbs-down"></i> Reject!</button>
                                                    @if($offer->operation == "sell")
                                                    <button method="POST" offer-id="{{$offer->id}}" offer-action="{{ route('offer.sold', ['offer'=>$offer->id]) }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-thumbs-up"></i> Sold!</button>
                                                    @else
                                                    <button method="POST" offer-id="{{$offer->id}}" offer-action="{{ route('offer.rented', ['offer'=>$offer->id]) }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-thumbs-up"></i> Rented!</button>
                                                    @endif
                                                @else
                                                    <button method="DELETE" offer-id="{{$offer->id}}" offer-action="{{ route('offer.destroy', ['offer'=>$offer->id]) }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-minus-square-o"></i> Remove!</button>
                                                @endif
                                                </div>
                                            </div>
                                        </div>                                 
                                    @endforeach
                                </div>                     
                            @endif
                            
                                  
                            @include("include.modal.offerModal", ['modalId'=> 'offerModal'])  
                            @include("include.modal.taskModal", ['modalId'=> 'taskModal'])   

                                <h3>
                                <button type="button"  class="btn btn-primary m-r-sm" data-toggle="modal"  data-target="#taskModal">
                                            <i class="fa fa-plus-square-o"></i>
                                            </button>
                                            Add Task
                                </h3> 
                                @if(isset($product->tasks))
                                <div id="vertical-timeline" class="vertical-container dark-timeline">
                                    @foreach($product->tasks as $task)
                                        <div class="vertical-timeline-block">
                                            <div class="vertical-timeline-icon gray-bg">
                                                <i class="fa fa-coffee"></i>
                                            </div>
                                            <div class="vertical-timeline-content">
                                                <p>{{$task->description}}.
                                                </p>
                                                <span class="vertical-date small text-muted"> {{$task->start_date}} - {{$task->end_date}} </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @endif 

                            </div>
                            
                            <div class="col-lg-6">
                            <div class="row"> 
                                <div class="col-md-12">

                                    <h2 class="font-bold m-b-xs">
                                        {{$product->title}}
                                    </h2>
                                    <small>{{$product->street_name }} {{$product->street_number }} , {{$product->city_name }}.</small>
                                    <hr>
                                        <h1 class="product-main-price">
                                        &euro; {{ $product->selling_cost }} <small class="text-muted">Sale Price</small>
                                        @if($product->renting_enabled)
                                            &euro; {{ $product->renting_cost }} <small class="text-muted">Rental Price</small>
                                        @endif 
                                        </h1>
                                    <hr>
                                    <div class="product-images" style="visibility:hidden">
                                        @foreach($product->images as $image)
                                        <div>
                                            <div class="image-imitation" style="background:url('{{asset('img/product/' . $product->id . '/full_'. $image->file_name)}}') no-repeat center"> 
                                            </div>
                                        </div>
                                        @endforeach
                                    </div> 

                                </div>
                                <div class="col-md-12">  
                                    <div class="row"> 
                                        <button class="btn btn-info pull-right margin-left" action-url="{{ route('photo.show', ['product'=> $product->id]) }}">Add images</button>
                                        <button class="btn btn-primary pull-right margin-left" action-url="{{ route('photo.properties', ['product'=> $product->id]) }}">Edit Images</button>                                        
                                    </div>
                                    <hr/>
                                    
                                    <div class="row product-details">
                                        <div class="col-sm-6">
                                        <dl class="dl-horizontal m-t-md">
                                        <dt><span>Address:</span> {!! $product->street_name !!}</dt>
                                        <dt><span>Door:</span>  {{$product->door}}<span>Doorway:</span> {{$product->doorway}} <span>Block:</span> {{$product->block}}</dt>
                                        <dt><span>Urbanization:</span> {{$product->urbanization}} </dt>
                                        <dt><span>District:</span> {{$product->district}} </dt>
                                        <dt><span>Zone:</span> {{$product->zone}} </dt>
                                        <dt><span>Public Address:</span> {{ isset($product->address_access) ? $product->address_access->name : null}} </dt>
                                        <dt><span>Floor:</span> {{$product->floor}} </dt>
                                        </dl>
                                        </div>
                                        <div class="col-sm-6">
                                        <dl class="dl-horizontal m-t-md">
                                        <dt><span>Area:</span> {{$product->area}} m&sup2; </dt>
                                        <dt><span>Area util:</span> {{$product->area_util}} m&sup2; </dt>
                                        <dt><span>Area in registry:</span> {{$product->area_in_registry}} m&sup2;</dt>
                                        <dt><span>Garage area:</span> {{$product->garage_area}} </dt>
                                        <dt><span>Bedrooms:</span> {{$product->rooms}} </dt>
                                        <dt><span>Bathrooms:</span> {{$product->bathrooms}} </dt>
                                        <dt><span>Year built:</span> {{$product->year}} </dt>
                                        <dt><span>Energy Cert.:</span> {{isset($product->building_expenses) ? $product->building_expenses->name : null}} </dt>
                                        <dt><span>Building expenses:</span> {{$product->building_expenses }} &euro;</dt>
                                        </dl> 
                                        </div> 
                                    </div>
                                    <h4>Product description</h4>

                                    <div class="small text-muted">
                                        {!! $product->getDescription(1) !!}
                                    </div>
                                    <div class="text-right">
                                        <div class="btn-group">
                                            <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to wishlist </button>
                                            <button class="btn btn-white btn-sm"><i class="fa fa-envelope"></i> Contact with author </button>
                                        </div>
                                    </div>


                                </div>
                            </div>                            
                            </div>
                            <div class="col-lg-3"></div>
                            
                        </div>        
                        </div>
                        <div class="ibox-footer">
                            <span class="pull-right">
                                Full stock - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
                            </span>
                            The generated Lorem Ipsum is therefore always free
                        </div>
                    </div>

                </div>
            </div>


@stop

@section("styles")
    <link href="{{ asset('css/plugins/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/slick/slick-theme.css') }}" rel="stylesheet">
    <style>
        .slick-initialized { visibility: visible!important; }
        .product-details dt { font-weight:normal ; text-align:left; }
        .product-details dt span { font-weight: bold; }
        [action-url] { margin-left: 2px; }

    </style>
@stop

@section("scripts")
<script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('js/plugins/slick/slick.min.js') }}"></script>

<script>
    $(document).ready(function(){

        $('.product-images').slick({
            dots: true
        });  

        $("[action-url]").on("click", function(){
            window.location = $(this).attr("action-url");
        });

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
        })
    });

</script>

@stop