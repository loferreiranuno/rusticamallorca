
{!! Form::text('search_field', old('search_field'), ['id'=>'search_field', 'class'=>'form-control', 'placeholder'=>__('front/home.whereYouWannaLive')]) !!}
{{csrf_field()}} 



@section("scripts")
@parent


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