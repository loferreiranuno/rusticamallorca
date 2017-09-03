@extends('layouts.back.default')
 

@section('breadcrumb')

        @include("include.back.breadcrumb", 
        [
            'title' => $product->title  ,
            'rootTitle' => "Properties",
            'root' => route("product.index"),
            'currentTitle' => "Ref.".$product->identifier. " " . $product->kind->name, 
            'actionHtml' => '
                <button class="btn btn-primary pull-right margin-left" action-url="' . route('product.create') . '">Add</button>
                <button class="btn btn-primary pull-right margin-left" action-url="' . route('product.edit', ['product'=> $product->id]) . '">Edit</button>
                <button class="btn btn-info pull-right margin-left" action-url="'. route('photo.show', ['product'=> $product->id]) .'">Add images</button>
                <button class="btn btn-primary pull-right margin-left" action-url="'. route('photo.properties', ['product'=> $product->id]).'">Edit Images</button>'
        ])    
@stop  

@section('content')
    
    <div class="row">
        <div class="col-lg-4">
            @include("include.pages.boxContact", ['contact'=> $product->owner, 'label'=> 'Owner'])
        </div>
        <div class="col-lg-4 {{ !isset($product->seller) ? 'hidden' : null }}">
            @include("include.pages.boxUser", ['user'=> $product->seller, 'label'=> 'Seller'])
        </div>
        <div class="col-lg-4  {{ !isset($product->creator) ? 'hidden':null }}">
            @include("include.pages.boxUser", ['user'=> $product->creator, 'label'=> 'Creator'])
        </div>
        <div class="col-lg-4  {{ !isset($product->partner) ? 'hidden':null }}">
            @include("include.pages.boxContact", ['contact'=> $product->partner, 'label'=> 'Partner'])
        </div>
    </div>
    @include("include.pages.statusRow",['product'=>$product])
      <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">
                        <div class="row">    
                            <div class="col-lg-3"> 
                            
                            @include('include.pages.boxProductOffer',['product'=>$product])


                            @include("include.modal.taskModal", ['modalId'=> 'taskModal'])   

                                <h3>
                                    <button type="button"  class="btn btn-primary m-r-sm" data-toggle="modal"  data-target="#taskModal">
                                                <i class="fa fa-plus-square-o"></i>
                                    </button> Add Task
                                </h3>
                                @include("include.pages.timelineBox", ['tasks'=> $taskByDay, 'url'=> route("product.show", ['id'=>$product->id])])

                            </div>
                            
                            <div class="col-lg-6 well">
                               
                                <div class="row"> 
                                    <div class="col-md-12"> 
                                        <p class="text-center">
                                            
                                            <span><i class="fa fa-bath"></i> {{$product->bathrooms}}</span>
                                            |<span><i class="fa fa-bed"></i>   {{$product->rooms}}</span>                                       
                                            | <span>{{$product->area}} m&sup2;</span> 
                                            |<span><i class="fa fa-key"></i> {{ $product->keys ? "Yes" : "No" }}
                                        </p> 

                                        <hr>
                                            <h1 class="product-main-price">
                                            &euro; {{ $product->selling_cost }} <small class="text-muted">Sale Price</small>
                                            @if($product->renting_enabled)
                                                &euro; {{ $product->renting_cost }} <small class="text-muted">Rental Price ({!! $product->rentingPeriod->name !!})</small>
                                            @endif 
                                            </h1>
                                        <hr>

                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">  
                                        <div class="product-images" style="visibility:hidden">
                                            @foreach($product->images as $image)
                                            <div>
                                                <div class="image-imitation" style="background:url('{{asset('img/product/' . $product->id . '/full_'. $image->file_name)}}') no-repeat center"> 
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        </div>
                                </div>
                            
                                <div class="row" style="margin-top:30px">
                                    <div class="col-md-12">  
                                        <hr/>    
                                        <h2>General data</h2>
                                        <div class="row product-details">
                                            <div class="col-sm-6">
                                            <dl class="dl-horizontal">
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
                                            <dl class="dl-horizontal">
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
                                        
                                    </div>
                                </div>     
                                
                                <div class="row">
                                    <div class="col-md-12">  
                                            <hr/>
                                         <h2>Internal data</h2>
                                         <div class="row product-details">
                                            <div class="col-sm-6">
                                            <dl class="dl-horizontal">
                                            <dt><span>Register number:</span> {!! $product->register_number !!}</dt>
                                            <dt><span>Register date:</span>  {!! $product->simple_note_date !!}</dt>
                                      
                                            </dl>
                                            </div>
                                            <div class="col-sm-6">
                                            <dl class="dl-horizontal">
                                            <dt><span>Agreement type:</span> {{!isset($product->agreementType) ? "" : $product->agreementType->name}}</dt>
                                            <dt><span>Valid until:</span> {{$product->agreement_valid_until}}</dt>
                                            <dt><span>Commission:</span> {{$product->agreement_commission_percentage}} %</dt>
                                            <dt><span>Commission:</span> {{$product->agreement_commission_amount}}&euro; </dt>
                                       
                                            </dl> 
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">   
                                    <div class="col-md-12"> 
                                    <hr/>
                                    <h2>Private notes</h2>
                                    <span>{{$product->internal_notes}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                      <hr/>
                                      <h2>Documents</h2>
                                        <div class="col-md-12">
                                            <div id="myDropzone" class="dropzone dz-clickable"></div> 
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table table-striped">
                                                <tbody>
                                                @foreach($product->documents as $document)
                                                    <tr>
                                                        <td><span>{{$document->original_name}}</span></td>
                                                        <td>
                                                            <a target="_blank" href="{{ route('document.show', ['id' => $document->id]) }}" class="btn btn-info">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                        
                                                        {!! Form::open(array('route' => array('document.destroy', $document->id), 'method'=>'DELETE')) !!} 
                                                        
                                                           <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                            </button>
                                                        {!! Form::token() !!}
                                                        {!! Form::close() !!}
                                                        

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-12 text-right" upload-listener>
                                            <a href="{{route('product.show', ['id'=>$product->id])}}" class="btn btn-primary">Reload</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                            <div class="clearfix">
                            @include('include.pages.boxSuggestedContact',[
                                'product'=>$product,
                                'wishList'=>$product->favouriteList,
                                'label'=> 'Interested',
                                'css_icon'=>'fa fa-thumbs-o-up'
                            ])  
                            </div>


                            <div class="clearfix">
                            @include('include.pages.boxSuggestedContact',[
                                'product'=>$product,
                                'wishList'=>$product->discardedList,
                                'label'=> 'Discarded',
                                'css_icon'=>'fa fa-thumbs-o-down'
                            ]) 
                            </div>
                            </div>
                            
                        </div>        
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
        .image-imitation{ height:150px!important; }
        [action-url] { margin-left: 2px; }

    </style>

    <link href="{!! asset("css/plugins/dropzone/basic.css") !!}" rel="stylesheet">
    <link href="{!! asset("css/plugins/dropzone/dropzone.css") !!}" rel="stylesheet">  

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


        $("[upload-listener]").addClass("hidden");

    });
</script>

<script src="{!! asset("js/plugins/dropzone/dropzone.js") !!}" crossorigin="anonymous"></script>
<script>
 
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone(
        "div#myDropzone",
        { 
            url: "{!! route('document.store') !!}",
            paramName: "file", 
            maxFilesize: 5, // MB
            parallelUploads: 1,
            maxFiles: 50,
            acceptedFiles: ".pdf,.doc,.xlsx,.docx,.txt,.xml,.csv,.png,.jpeg,.jpg,.mp4,.wmv,.zip,.rar",
            dictDefaultMessage: "Click here, or drag your photos from a folder",
            sending: function(file, xhr, formData) {
                formData.append("_token", "{{ csrf_token() }}" );
                formData.append("product_id", {!! $product->id !!});
            },
            accept: function(file, done) {
                if (file.size == 0) {
                    done("Cannot upload empty documents.");
                }
                else { done(); }
            },
            init:function() {
                this.on("complete", function(file) {
                    $("[upload-listener]").removeClass("hidden");                    
                });
            }  
        });  
 
</script>

@stop
 