@extends('layouts.back.default')

@section('styles') 
    <link href="{!! asset("css/plugins/dropzone/basic.css") !!}" rel="stylesheet">
    <link href="{!! asset("css/plugins/dropzone/dropzone.css") !!}" rel="stylesheet">
    <style>
        #sortable {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        #sortable li {
            text-align: center;
            float: left;
            width:155px;
            height:225px;
            margin-right:10px;
            margin-left:10px;
            margin-bottom:10px;
        }
        #sortable .confirm-dialog{
            
        }
        #image-box {
        }
        #button-row {
            margin:0;
        }
        #sortable-img {
            height:150px;
            max-width:150px;
            margin:auto;
        } 
    </style>
@stop


@section('breadcrumb')
     @include("include.back.breadcrumb", 
        [
            'title' => "Image Properties" ,
            'rootTitle' => $product->title,
            'root' => route("product.show", ['product' => $product->id]),
            'currentTitle' => "Pictures", 
            'actionHtml' => '<a href="' . route('photo.show', ['product' => $product->id]) . '" class="btn btn-primary">Add Images</a>&nbsp;<a href="' . route('product.show', ['product' => $product->id]) . '" class="btn btn-primary">Property dashboard</a>'
        ])           
@stop 

@section('content')
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 staff-box" style="padding:5px">
        <ul id="sortable">
            @foreach($product->images as $image) 
                <li id="img-{{ $image->id }}" class="ui-state-default">
                    <div id="image-box">
                        <div class="row text-right" id="button-row"> 
                            <span  class="btn btn-danger btn-sm confirm-dialog" image-id="{{ $image->id }}" delete-item product_id="{{ $product->id }}">
                                <i class="glyphicon glyphicon-remove" style="color:white"></i>
                            </span>
                        </div>
                        <div id="sortable-img" style="background:url({{ asset('img/product/' . $product->id . '/icon_' . $image->file_name) }}) no-repeat center center; background-size: contain;"></div>

                        <div class="row">
                            {!! Form::select('image_type_' . $image->id, $imageTypes, $image->type->id, ['type-change'=> '' , 'image-id'=>$image->id, 'id'=> 'image_type_' . $image->id]) !!}                                                   
                        </div>                         
                    </div>
                </li>                 
            @endforeach
        </ul>
        </div>
    </div>
@stop


@section('scripts')
<script src="{!! asset("js/plugins/dropzone/dropzone.js") !!}" crossorigin="anonymous"></script>
<script>
    var photo_counter = 0;
    var assetBaseUrl = "{{ asset('') }}";
    

    $(document).ready(function(){
        $('[type-change]').on('change', function(){
            var id = $(this).attr("image-id");
            var type = $(this).val();

            $.ajax({
                url: '{{ route("photo.update") }}',
                type: 'POST',
                data:{
                    id: id,
                    type: type,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(result) {
                    $(this).parent('[delete-container]').remove();
                }
            });
        });

        $('[delete-item]').on('click', function(e){
                
            var id = $(this).attr("image-id");
            var product_id = $(this).attr("product_id");

            $.ajax({
                url: '{{ route("photo.delete")}}',
                type: 'DELETE',
                data:{
                    id: id,
                    product_id: product_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(result) {
                    $("#img-" + id).remove();
                }
            });

        });            
    });
</script>
@stop

