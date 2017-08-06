    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
    <style>
        .ui-autocomplete{ max-height: 250px; overflow-y:scroll; }
    </style>
    <link href="{!! asset("css/bootstrap.min.css") !!}" rel="stylesheet">
    <link href="{!! asset("font-awesome/css/font-awesome.css") !!}" rel="stylesheet">
    <!-- Toastr style -->
    <link href="{!! asset("css/plugins/toastr/toastr.min.css") !!}" rel="stylesheet">
    <!-- Gritter -->
    <link href="{!! asset("css/animate.css") !!}" rel="stylesheet">
    <link href="{!! asset("css/style.css") !!}" rel="stylesheet">
    <link href="{!! asset("js/plugins/gritter/jquery.gritter.css") !!}" rel="stylesheet">
    <link href="{!! asset("css/plugins/iCheck/custom.css") !!}" rel="stylesheet">
    <link href={!! asset("css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css") !!} rel="stylesheet">
    <link href={!! asset("css/plugins/tokenfield-typeahead/tokenfield-typeahead.min.css") !!} rel="stylesheet">
    <link href={!! asset("css/plugins/tokenfield-typeahead/bootstrap-tokenfield.min.css") !!} rel="stylesheet">

    