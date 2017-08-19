@extends('layouts.back.default')

@section('styles') 
    <link href="{!! asset("css/plugins/dropzone/basic.css") !!}" rel="stylesheet">
    <link href="{!! asset("css/plugins/dropzone/dropzone.css") !!}" rel="stylesheet">    
@stop


@section('breadcrumb')
     @include("include.back.breadcrumb", 
        [
            'title' => "Upload property pictures" ,
            'rootTitle' => $product->title,
            'root' => route("product.show", ['product' => $product->id]),
            'currentTitle' => "Pictures", 
            'actionHtml' => '<a href="' . route('photo.properties', ['product' => $product->id]) . '" class="btn btn-primary">Done</a>'
        ])           
@stop 

@section('content')

<div class="row">
    <div class="col-md-12">
        <div id="myDropzone" class="dropzone dz-clickable"></div> 
    </div>
</div>
     
@stop


@section('scripts')
<script src="{!! asset("js/plugins/dropzone/dropzone.js") !!}" crossorigin="anonymous"></script>
<script>
 
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone(
        "div#myDropzone",
        { 
            url: "{!! route('photo.upload') !!}",
            paramName: "file", 
            maxFilesize: 5, // MB
            parallelUploads: 1,
            maxFiles: 50,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            dictDefaultMessage: "Click here, or drag your photos from a folder",
            sending: function(file, xhr, formData) {
                formData.append("_token", "{{ csrf_token() }}" );
                formData.append("product_id", {!! $product->id !!});
            },
            accept: function(file, done) {
                if (file.size == 0) {
                    done("Cannot upload empty photos.");
                }
                else { done(); }
            },
            init:function() {
                this.on("complete", function(file) { });
            }  
        });  
 
</script>
@stop

