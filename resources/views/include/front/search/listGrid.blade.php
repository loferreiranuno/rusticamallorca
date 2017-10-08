<div id="tab2" class="tab">
    <div class="col-xs-12 content_2">
        <div class="col-md-10 col-md-offset-1">
            <!-- Range slider -->
            <div class="explore_grid">                 
                @include("include.front.search.rangeSlider")
            </div>
            <!-- End Range slider -->
            <div class="wide-2">
            @foreach($products->chunk(4) as $items)
                <div class="row">
                @foreach($items as $product)
                    <div class="col-md-3 col-sm-3 col-xs-6 prop">
                        @include('include.front.search.itemGridList', ['product'=> $product])
                    </div>
                @endforeach
                </div> 
            @endforeach
            </div>
            <!-- content_2 -->
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
            @include("include.front.search.pagination",['data'=>$products])
        </div>
    </div>
</div>
