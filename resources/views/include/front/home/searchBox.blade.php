<form id="form-submit" class="form-submit" action="{{route('front.search')}}">
    <div class="search">
        <div class="selector col-md-3 col-sm-3">
            <select class="selection" id="rent-sale">
                <option value="sale">Venta</option> 
                <option value="rent">Alquiler</option>
            </select> 
        </div>
        <div id="email-label" class="col-md-7 col-sm-7">
            <i class="fa fa-location-arrow"></i>

            {!! Form::text('search_field', old('search_field'), ['id'=>'search_field', 'class'=>'form-control', 'placeholder'=>'Dónde quieres vivir?']) !!}
            
        </div>
        <span class="ffs-bs col-md-2 col-sm-2">
            {!! Form::submit("Buscar", ['id'=>'btn-search', 'disabled'=>'', 'class'=>'btn btn-small btn-primary']) !!}
            
        </span>
    </div>
    {{csrf_field()}} 
    
    {!! Form::hidden('city_name', old("city_name"),['id'=>'city_name']) !!}
    
</form>

@section("styles")
@parent
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@stop

@section("scripts")
@parent

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
 
$("#search_field").on("change, keyup, keydown", function(){
    if($("#city_name").val() != $("#search_field").val()){
        $("#btn-search").attr("disabled", "disabled");
    }
});

$(document).ready(function(){
    $( "#search_field" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          method: "POST",
          url: "{{route('front.api.cities')}}",
          dataType: "json",
          data: {
            name: request.term,
            _token: $('input[name="_token"]').val()
          },
          success: function( data ) {
            response($.map(data.data, function (item) { 
                return item;
            }));
          }
        } );
      },
      minLength: 2,
      select: function( event, ui ) {               
        $("#btn-search").removeAttr("disabled");
        $("#city_name").val(ui.item.value);
      }
    });
});
</script>

@stop