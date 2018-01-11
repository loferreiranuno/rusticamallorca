<div class="row white" style="width:100%">
    <div class="col-md-3 col-sm-3 prp-img">
        <div class="exp-img-2" style="background:url({{RMHelper::getProductImage($product, false)}}) center;background-size: cover;">
            <span class="filter"></span>
            <span class="ffs-bs"><label  data-images="{{RMHelper::getProductImages($product, true) }}"  for="op" class="btn btn-small btn-primary">{{__('include.seePhoto')}}</label></span>
            <div class="overlay">
                <div class="img-counter">{{ __('include.nPhotos',['total'=>$product->images()->count()])}} </div>
            </div>
        </div>
    </div>
    <div class="item-info col-lg-7 col-md-6 col-sm-6">
        <h4><a href="{{route('property.show',['id'=>$product->id])}}">{{$product->title}}</a></h4>
        <p class="team-color">{{RMHelper::getProductAddress($product)}}</p>
        <div class="block">
            <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                <img src="{{asset('assets/img/bedroom.png')}}" alt="">
                <p class="info-line">{{$product->rooms}} {{__('kinds.room')}}</p>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                <img src="{{asset('assets/img/bathroom.png')}}" alt="">
                <p class="info-line">{{$product->bathrooms}} {{__('kinds.bathroom')}}</p>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                <img src="{{asset('assets/img/square.png')}}" alt="">
                <p class="info-line">{{$product->area}} m<span class="rank">2</span></p>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                @if($product->hasGarage)
                        <img src="{{asset('assets/img/garage.png')}}" alt="">
                        <p class="info-line">{{$product->garage_area}} {{__('kinds.garage')}}</p>
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
                <p class="team-color">{{__('include.forSale')}}</p>
            @endif

            @if($product->rentPrice != 0)
                <p>{{$product->rentPrice}} &euro;</p>
                <p class="team-color">{{__('include.forRent')}}</p>
            @endif
        </div>
        <span class="ffs-bs col-xs-12 btn-half-wth"><a href="{{route('property.show',['id'=>$product->id])}}" class="btn btn-default btn-small">{{__('include.seeMore')}} <i class="fa fa-caret-right"></i></a></span>
        @if(Config::get('app.bookmarkEnabled'))
            <div class="sum favorite col-sm-12 col-xs-6">
                <div class="bookmark col-xs-3" data-bookmark-state="empty">
                    <span class="title-add">{{__('include.addToBookmark')}}</span>
                </div>
                <p class="col-xs-3">Fav</p>
                <div class="compare col-xs-3" data-compare-state="empty">
                    <span class="plus-add">{{__('include.addToCompare')}}</span>
                </div>
                <p class="col-xs-3">Comp</p>
            </div>
        @endif
    </div>
</div>