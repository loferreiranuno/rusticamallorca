<div id="tab3" class="tab">
    <div class="col-xs-12 content_2">
        <div class="col-lg-10 col-lg-offset-1 col-md-12">
            
            @include("include.front.search.rangeSlider")

            <div class="wide-2">

                @foreach($products as $product)
                    @include("include.front.search.itemListList", ['product'=>$product])
                @endforeach

            </div>	
            <!-- end wide-2 -->
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
            @include("include.front.search.pagination",['data'=>$products])
        </div>
    </div>
</div>