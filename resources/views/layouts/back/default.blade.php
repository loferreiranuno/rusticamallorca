
<!DOCTYPE html>
<html>

<head>

    @include("include.back.head")

</head>

<body class="">

    <div id="wrapper">
        
        @if (!Auth::guest()) 
            @include("include.back.sidemenu")
        @endif

        <div id="page-wrapper" class="gray-bg">
            @if (!Auth::guest()) 
            <div class="row border-bottom">
                
                @if (!Auth::guest()) 
                    @include("include.back.navbar")
                @endif

            </div> 
            
            @yield('breadcrumb')
            
            @endif

            <div class="wrapper wrapper-content">
                @yield("content")
            </div>
            
            <div class="footer">
                <div class="pull-right">
                    Rustica  <strong>Mallorca</strong>.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2017
                </div>
            </div>

        </div>
        </div>

        @include("include.back.footer")

</body>

</html>
