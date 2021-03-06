 
<div class="col-md-6">
    <div class="form-group col-sm-8{{ $errors->has('city_name') ? ' has-error' : '' }}">
        <div class="input-group m-b">
            <span class="input-group-addon">Town</span>
            {{Form::text('city_name', old('city_name'), ['id'=>'city_name', 'class'=> 'form-control google-address'])}}
        </div>
    </div>
    <div class="form-group col-sm-4{{ $errors->has('zip_code') ? ' has-error' : '' }}">
        <div class="input-group m-b">
            <span class="input-group-addon">C.P.</span>
            {{Form::text('zip_code', old('zip_code'), ['id'=>'zip_code', 'class'=> 'form-control  google-address'])}}
        </div>
    </div>
    <div class="form-group col-sm-8{{ $errors->has('street_name') ? ' has-error' : '' }}">
        <div class="input-group m-b">
            <span class="input-group-addon">Street</span>
            {{Form::text('street_name', old('street_name'), ['id'=>'street_name', 'class'=> 'form-control  google-address'])}}
        </div>
    </div>
    <div class="form-group col-sm-4{{ $errors->has('street_number') ? ' has-error' : '' }}">
        <div class="input-group m-b">
            <span class="input-group-addon">Nº</span>
            {{Form::text('street_number', old('street_number'), ['id'=>'street_number', 'class'=> 'form-control google-address'])}}
        </div>
    </div>

    <div class="form-group col-sm-6{{ $errors->has('country_name') ? ' has-error' : '' }}">
        <div class="input-group m-b">
            <span class="input-group-addon">Country</span>
            {{Form::text('country_name', old('country_name'), ['id'=>'country_name', 'class'=> 'form-control google-address'])}}
        </div>
    </div>

    <div class="form-group col-sm-6{{ $errors->has('province_name') ? ' has-error' : '' }}">
        <div class="input-group m-b">
            <span class="input-group-addon">Province</span>
            {{Form::text('province_name', old('province_name'), ['id'=>'province_name', 'class'=> 'form-control google-address'])}}
        </div>
    </div>

    <div class="form-group col-sm-12 text-center">
        <span class="btn btn-small btn-danger" id="fill-location" onclick="fillAddress();">Fill address from Map</span>
        <span class="btn btn-small btn-info" id="search-location" onclick="searchAddress();">Update Map</span>
    </div> 
</div>
<div class="col-md-6">
    <div class="google-map" > 
         <div id="map" class="google-map"></div>
    </div>
</div> 

    {!! Form::hidden('longitude', old('longitude'), ['id'=> 'longitude']) !!}                                        
    {!! Form::hidden('latitude', old('latitude'), ['id'=> 'latitude']) !!}  
    {!! Form::hidden('longitude_old', old('longitude'), ['id'=> 'longitude_old']) !!}                                        
    {!! Form::hidden('latitude_old', old('latitude'), ['id'=> 'latitude_old']) !!}                                        
    {!! Form::hidden('google_address', old('google_address'), ['id'=> 'google_address']) !!}
    {!! Form::hidden('map_show_default_values',  isset($product) ? "true": "false", ['id'=> 'map_show_default_values']) !!}    
    {!! Form::hidden('map_zoom', config('app.mapsZoom', '8') , ['id' => 'map_zoom']) !!}
    
@section('scripts')

    @parent  
    <script src="{!! asset("js/rustica/back/product.map.js") !!}" ></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.mapsKey') }}&callback=initMap" async defer></script>
@stop
 