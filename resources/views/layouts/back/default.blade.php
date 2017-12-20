
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

<script>
$(document).ready(function(){
    $(document).ready(function(){
        $("[contact-row]").on("click", function(){
            window.location = $(this).attr("contact-url");
        })
        .on("mouseover", function(){
            $(this).addClass("active");
        })
        .on("mouseout", function(){
            $(this).removeClass("active");
        });
        
        $("[action-url]").on("click", function(){
            window.location = $(this).attr("action-url");
        });

        $("[data-action='delete']").on("click", function(e){
            
            var token = $(this).data("token");
            var url = $(this).data("href");
        
            if(!url){
                return false;
            } 
    
            if(confirm("Are you sure you want to delete this item?")){
     
                $.ajax({
                    data:{
                        _token: token,
                    },
                    url: url,
                    type: "DELETE",
                    success: function(){
                        window.location.reload();
                    },
                    error: function(){
                        alert("ERROR");
                    }
                })
            }
        });
        $("[wishlist-btn]").on("click", function(){
            var contact_id = $(this).data("contact");
            var product_id = $(this).data("product");
            var interested = $(this).data("interested");
            var url = $(this).data("href");
            var method = $(this).data("method");

            console.log("hello")
            $.ajax({
                url: url,
                method: method,
                data:{
                    contact_id: contact_id,
                    product_id: product_id,
                    interested: interested ? 1 : 0,
                    _token: "{{ csrf_token()}}"
                },
                success:function(data){
                    window.location.reload();
                }
            });
        });
    });
    
});
</script>

</body>

</html>
