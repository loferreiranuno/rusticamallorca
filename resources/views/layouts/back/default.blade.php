
<!DOCTYPE html>
<html>

<head>

    @include("include.back.head")

</head>

<body class="">

    <div id="wrapper">
 
        @include("include.back.sidemenu")

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        
        @include("include.back.navbar")

        </div> 
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>This is main title</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">This is</a>
                        </li>
                        <li class="active">
                            <strong>Breadcrumb</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="" class="btn btn-primary">This is action area</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content">
                @yield("content")
            </div>
            
            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
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
