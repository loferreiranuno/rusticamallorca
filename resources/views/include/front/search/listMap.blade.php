<div id="tab1" class="tab" style="display: block;">
    <div class="sidebar col-sm-4 col-xs-12">
        <!-- Map -->
        <div id="map"></div>
        <!-- end Map -->
    </div><!-- sidebar -->
    <div class="content col-sm-8 col-xs-12">
        <!-- Range slider -->
        <div class="col-xs-12">
            @include("include.front.search.rangeSlider",['title'=>null,'id'=>'price-range', 'price'=> $price])
        </div>	<!-- explore_grid -->
        <!-- End Range slider -->

        <div class="wide-2">

            <div class="col-xs-12">
            @foreach($products->chunk(3) as $items)
                <div class="row">
                    @foreach($items as $product)
                    <div class="col-md-4 col-sm-6 col-xs-6 prop"> 
                        @include("include.front.search.itemMapList", ['product'=> $product])
                    </div>
                    @endforeach
                </div><!-- end row -->
            @endforeach
            </div><!-- end container -->

            <div class="col-xs-12 content_2 top-indent">
                @include("include.front.search.pagination",['data'=>$products])
            </div>
        </div>	<!-- end wide-2 -->
    </div>	<!-- content -->
</div>