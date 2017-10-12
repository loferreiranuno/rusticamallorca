<div class="wht-cont">
    <div class="exp-img-2" style="background:url({{ RMHelper::getProductImage($product, false)}}) center;background-size: cover;">
        <span class="filter"></span>
        <span class="ffs-bs">
            <label for="op" class="btn btn-small btn-primary">@lang('include.seePhoto')</label>
        </span>
        <div class="overlay">
            <div class="img-counter">@lang('include.nPhotos',['total'=>$product->images->count()])</div>
        </div>
    </div>
    <div class="item-title">
        <h4><a href="{{route('property.show',['id'=>$product->id])}}">{{$product->title}}</a></h4>
        <p class="team-color">{{$product->publicAddress}}</p>
        <div class="col-md-7 col-sm-7 col-xs-7">
            <p>{{ RMHelper::getProductKindInfo($product) }}</p>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <p>{{$product->area}} m<span class="rank">2</span></p>
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
                <p class="team-color">@lang('front/home.sale')</p>
            @endif

            @if($product->rentPrice != 0)
                <p>{{$product->rentPrice}} &euro;</p>
                <p class="team-color">@lang('front/home.rent')</p>
            @endif
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 favorite">
                <div class="bookmark" data-bookmark-state="empty">
                    <span class="title-add">@lang('include.addToBookmark')</span>
                </div>
                <div class="compare" data-compare-state="empty">
                    <span class="plus-add">@lang('include.addToCompare')</span>
                </div>
            </div>
        </div>
    </div>
</div>