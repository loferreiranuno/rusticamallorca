<form id="form-submit" class="form-submit" action="{{route('front.search')}}">
    <div class="search">
        <div class="selector col-md-3 col-sm-3">
            {!! Form::select("sell_type", RMHelper::getSaleType() , old('sell_type'), ['class'=> 'selection']) !!}
        </div>
        <div id="email-label" class="col-md-7 col-sm-7">
            <i class="fa fa-location-arrow"></i>
            @include("include.front.search.searchField")
        </div>
        <span class="ffs-bs col-md-2 col-sm-2">
            {!! Form::submit(__("front/home.search"), ['id'=>'btn-search', 'disabled'=>'', 'class'=>'btn btn-small btn-primary']) !!}
            
        </span>
    </div>
    {!! Form::hidden('city_name', old("city_name"),['id'=>'city_name']) !!}
    
</form>
@section("styles")
@parent
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@stop