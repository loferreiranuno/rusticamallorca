<!DOCTYPE html>
<html>

<head>   
    @include("include.back.head")
</head>

<body>
    @yield("content") 
    @include("include.back.footer")
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
         
        $(document).ready(function(){
            CKEDITOR.replace( 'summary-ckeditor' );
            CKEDITOR.on('instanceReady',
            function( evt )
                {
                var editor = evt.editor;
                editor.execCommand('maximize');                
            });
            $(".hidden").removeClass("hidden");
        });
    </script>
</body>

</html>
