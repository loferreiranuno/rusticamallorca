<div class="row white" style="width:100%">
    <div class="col-md-3 col-sm-3 prp-img">
        <div class="exp-img-2" style="background:url({{RMHelper::getProductImage($product, false)}}) center;background-size: cover;">
            <span class="filter"></span>
            <span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
            <div class="overlay">
                <div class="img-counter">{{$product->images()->count()}} Photo</div>
            </div>
        </div>
    </div>
    <div class="item-info col-lg-7 col-md-6 col-sm-6">
        <h4><a href="{{route('property.show',['id'=>$product->id])}}">{{$product->title}}</a></h4>
        <p class="team-color">{{RMHelper::getProductAddress($product)}}</p>
        <div class="block">
            <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                <img src="{{asset('assets/img/bedroom.png')}}" alt="">
                <p class="info-line">{{$product->rooms}} Bedrooms</p>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                <img src="{{asset('assets/img/bathroom.png')}}" alt="">
                <p class="info-line">{{$product->bathrooms}} Bathroom</p>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                <img src="{{asset('assets/img/square.png')}}" alt="">
                <p class="info-line">{{$product->area}} m<span class="rank">2</span></p>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                @if($product->hasGarage)
                        <img src="{{asset('assets/img/garage.png')}}" alt="">
                        <p class="info-line">{{$product->garage_area}} Garage</p>
                @else
                    <p class="info-line"></p>
                @endif
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3 line"></div>
        <div class="col-md-3 col-sm-3 col-xs-3 line"></div>
        <div class="col-md-3 col-sm-3 col-xs-3 line"></div>
        <div class="col-md-3 col-sm-3 col-xs-3 line"></div>
        <hr>
        <p>{{RMHelper::getProductDescription($product, App::getLocale())}}<br/></p>
     </div>
    <div class="item-price col-lg-2 col-md-3 col-sm-3 col-xs-12">
        <div class="sum col-sm-12 col-xs-6">
            @if($product->salePrice != 0)
                <p>{{$product->salePrice}} &euro;</p>
                <p class="team-color">FOR SALE</p>
            @endif

            @if($product->rentPrice != 0)
                <p>{{$product->rentPrice}} &euro;</p>
                <p class="team-color">FOR RENT</p>
            @endif
        </div>
        <span class="ffs-bs col-xs-12 btn-half-wth"><a href="{{route('property.show',['id'=>$product->id])}}" class="btn btn-default btn-small">learn more <i class="fa fa-caret-right"></i></a></span>
        <div class="sum favorite col-sm-12 col-xs-6">
            <div class="bookmark col-xs-3" data-bookmark-state="empty">
                <span class="title-add">Add to bookmark</span>
            </div>
            <p class="col-xs-3">Fav</p>
            <div class="compare col-xs-3" data-compare-state="empty">
                <span class="plus-add">Add to compare</span>
            </div>
            <p class="col-xs-3">Comp</p>
        </div>
    </div>
</div>