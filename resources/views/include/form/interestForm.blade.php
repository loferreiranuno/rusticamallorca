@if(isset($interest))
    {{ Form::model($contact, ['route' => ['interest.update', $interest->id], 'method' => 'patch']) }}
@else
    {!! Form::open(['route' => 'interest.store']) !!} 
@endif

            <h3>Interests</h3>
            
            <fieldset> 
                <div class="row">
                    <div class="col-lg-12"> 
                    <div class="form-group">                                        
                    {!! Form::label('product_kind_id', 'Product type') !!}                    
                    {!! Form::select('product_kind_id', App\ProductKindType::pluck('name', 'id'), isset($interest)?$interest->product_kind_id : null, ['class'=>'form-control']) !!}
                    </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">    
                            {!! Form::label("bedroom_min", "Bedroom min") !!}
                            {!! Form::selectRange('bedroom_min', 0, 10, old('bedroom_min'), ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">    
                            {!! Form::label("bedroom_max", "Bedroom max") !!}
                            {!! Form::selectRange('bedroom_max',  1, 10, old('bedroom_max'), ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">    
                            {!! Form::label("bathroom_min", "Bathroom min") !!}
                            {!! Form::selectRange('bathroom_min', 0, 10,  old('bathroom_min'), ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">    
                            {!! Form::label("bathroom_max", "Bathroom max") !!}
                            {!! Form::selectRange('bathroom_max', 1, 10,  old('bathroom_max'), ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    
                    <div class="col-sm-6">
                        <div class="form-group">    
                            {!! Form::label("area_min", "Area minn") !!}
                            <div class="input-group">
                            {!! Form::number('area_min',  old('area_min'), ['class'=>'form-control']) !!}
                            <span class="input-group-addon">m&sup2;</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">    
                            {!! Form::label("area_max", "Area max") !!}
                              <div class="input-group">
                            {!! Form::number('area_max',  old('area_max'), ['class'=>'form-control']) !!}
                            <span class="input-group-addon">m&sup2;</span>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <div class="form-group">                          
                            {!! Form::checkbox('sale_enabled', true, old('sale_enabled'), ['open-close'=>'#sale-container']) !!}
                            {!! Form::label("sale_enabled", "Selling") !!}                                  
                        </div>
                        <div class="panel hidden" id="sale-container">
                        <div class="col-sm-6">
                            <div class="form-group">    
                                {!! Form::label("sale_min", "Selling price min") !!}
                                  <div class="input-group">
                                {!! Form::number('sale_min',  old('sale_min'), ['placeholder'=>'From','class'=>'form-control']) !!}
                                 <span class="input-group-addon">&euro;</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">    
                                {!! Form::label("sale_max", "Selling price max") !!}
                                  <div class="input-group">
                                {!! Form::number('sale_max',  old('sale_max'), ['placeholder'=>'To','class'=>'form-control']) !!}
                                 <span class="input-group-addon">&euro;</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                   
                    
                    <div class="col-sm-12">
                        <div class="form-group">                     
                            {!! Form::checkbox('rent_enabled', true, old('sale_enabled'), ['open-close'=>'#rent-container']) !!}                            
                            {!! Form::label("rent_enabled", "Renting") !!}           
                        </div>
                        <div class="panel hidden" id="rent-container">
                        <div class="col-sm-6">
                            <div class="form-group">    
                                {!! Form::label("rent_min", "Rental price min") !!}
                                <div class="input-group">
                                {!! Form::number('rent_min',  old('rent_min'), ['placeholder'=>'From','class'=>'form-control']) !!}
                                 <span class="input-group-addon">&euro;</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">    
                                {!! Form::label("rent_max", "Rental price max") !!}
                                <div class="input-group">
                                {!! Form::number('rent_max',  old('rent_max'), ['placeholder'=>'To','class'=>'form-control']) !!}
                                 <span class="input-group-addon">&euro;</span>
                                </div>
                            </div>
                        </div>
                    </div> 
                    </div>
                    
                </div> 
                <div>
                    <div class="form-group">
                    @if(!isset($interest))
                        {!! Form::submit("Submit", ['class'=>'pull-right btn btn-primary']) !!}
                    @else
                        {!! Form::submit("Save", ['class'=>'pull-right btn btn-primary']) !!}
                    @endif
                    </div>
                </div>
            </fieldset>
             {!! Form::close() !!}

 
@section('scripts')  
@parent

<script>

$(function() {

    var toogle_open_close = function(obj){
        var containerId = $(obj).attr('open-close');
        if($(obj).prop("checked"))
            $(containerId).show();
        else
            $(containerId).hide();
    };

    $("[open-close]").on("change", function(){
        toogle_open_close(this);
    }); 

    $("[open-close]").each(function(e){
        toogle_open_close(this);
    });

    $(".ibox-content .hidden").removeClass("hidden");
        
});

</script>
@stop      