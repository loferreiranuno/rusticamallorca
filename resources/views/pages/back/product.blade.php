@extends('layouts.back.default')
 

@section('breadcrumb')

        @include("include.back.breadcrumb", 
        [
            'title' => $product->title  ,
            'rootTitle' => "Properties",
            'root' => route("product.index"),
            'currentTitle' => $product->id, 
            'actionHtml' => ''
        ])    
@stop  

@section('content')
    @include("include.modal.offerModal", ['modalId'=> 'offerModal'])
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
                            <a data-toggle="modal" href="remote.html" data-target="#offerModal">Click me</a>
                            
                            </div>
                            
                            <div class="col-lg-6">
                            <div class="row">

                                <div class="col-md-5">

                                    <div>
                                    
                                    </div>

                                    <div class="product-images" style="visibility:hidden">
                                        @foreach($product->images as $image)
                                        <div>
                                            <div class="image-imitation" style="background:url('{{asset('img/product/' . $product->id . '/full_'. $image->file_name)}}') no-repeat center"> 
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="col-md-7">

                                    <h2 class="font-bold m-b-xs">
                                        {{$product->title}}
                                    </h2>
                                    <small>{{$product->street_name }} {{$product->street_number }} , {{$product->city_name }}.</small>
                                    <hr>
                                    <div> 
                                        <button class="btn btn-info pull-right margin-left" action-url="{{ route('product.edit', ['product'=> $product->id]) }}">Edit</button>
                                        <button class="btn btn-primary pull-right margin-left" action-url="{{ route('photo.properties', ['product'=> $product->id]) }}">Edit Images</button>
                                        <button class="btn btn-primary pull-right margin-left" action-url="{{ route('photo.show', ['product'=> $product->id]) }}">Add Images</button>
                                        
                                        <h1 class="product-main-price">
                                        &euro; {{ $product->renting_cost }} <small class="text-muted">Sale Price</small>
                                        @if($product->rent_enabled)
                                            &euro; {{ $product->selling_cost }} <small class="text-muted">Rental Price</small>
                                        @endif
                                         </h1>
                                    </div>
                                    <hr>
                                    
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
    });

</script>

@stop