<div class="wht-cont">
    <div class="exp-img-2" style="background:url({{RMHelper::getProductImage($product, false)}}) center;background-size: cover;">
        <span class="filter"></span>
        <span class="ffs-bs">
            <label data-images="{{RMHelper::getProductImages($product, true)}}" for="op" class="btn btn-small btn-primary">browse photos</label></span>
        <div class="overlay">
            <div class="img-counter">{{$product->images->count()}} Photo</div>
        </div>
    </div>
    <div class="item-title">
        <h4><a href="property_page.html">{{$product->title}}</a></h4>
        <p class="team-color">{{RMHelper::getProductAddress($product)}}</p>
        <div class="col-md-7 col-sm-7 col-xs-7">
            <p>{{$product->kind->name}}</p>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <p>{{$product->area}}  m<span class="rank">2</span></p>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-7 lft-brd"></div>
        <div class="col-md-5 col-sm-5 col-xs-5 lft-brd"></div>
    </div>
    <hr>
    <div class="item-title btm-part">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8">
                @if($product->salePrice != 0)
                    <p>{{$product->salePrice}} &euro;</p>
                    <p class="team-color">FOR SALE</p>
                @endif

                @if($product->rentPrice != 0)
                    <p>{{$product->rentPrice}} &euro;</p>
                    <p class="team-color">FOR RENT</p>
                @endif
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 favorite">
                <div class="bookmark" data-bookmark-state="empty">
                    <span class="title-add">Add to bookmark</span>
                </div>
                <div class="compare" data-compare-state="empty">
                    <span class="plus-add">Add to compare</span>
                </div>
            </div>
        </div>
    </div>
</div>