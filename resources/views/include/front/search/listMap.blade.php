<div id="tab1" class="tab" style="display: block;">
    <div class="sidebar col-sm-4 col-xs-12">
        <!-- Map -->
        <div id="map"></div>
        <!-- end Map -->
    </div><!-- sidebar -->
    <div class="content col-sm-8 col-xs-12">
        <!-- Range slider -->
        <div class="col-xs-12">
            <div class="row">
                <form method="post">
                    <div class="col-md-3 col-sm-4">
                        <div class="form-inline">
                            <label class="top-indent">Price Range:</label>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-8">
                        <div class="form-group">
                            <div class="price-range price-range-wrapper">
                                <input class="price-input" type="text" name="price" value="0;30"> 
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- row -->
        </div>	<!-- explore_grid -->
        <!-- End Range slider -->

        <div class="wide-2">

            <div class="col-xs-12">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4 col-sm-6 col-xs-6 prop"> 
                        @include("include.front.search.itemMapList", ['product'=> $product])
                    </div>
                    @endforeach
                </div><!-- end row -->
            </div><!-- end container -->

            <div class="col-xs-12 content_2 top-indent">
                @include("include.front.search.pagination",['data'=>$products])
            </div>
        </div>	<!-- end wide-2 -->
    </div>	<!-- content -->
</div>