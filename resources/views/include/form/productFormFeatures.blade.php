 <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Listing features <small></small></h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a> 
            </div>
        </div>
        <div class="ibox-content">
        <div class="row">
                <div class="col-sm-6 b-r"> 
                          

                <div class="form-group col-sm-6{{ $errors->has('identifier') ? ' has-error' : '' }}">
                    {{Form::label('identifier','Identifier*')}}
                    {{Form::text('identifier', null, ['class'=> 'form-control', 'placeholder'=>'MGF-'])}}
                </div>
                      
                <div class="form-group col-sm-6{{ $errors->has('product_status_id') ? ' has-error' : '' }}">
                    {{Form::label('product_status_id','Status*')}}
                    {!!Form::select('product_status_id', App\ProductStatus::pluck('name', 'id'), null, ['class'=> 'form-control'])!!} 
                </div> 

                <div class="form-group col-sm-4{{ $errors->has('product_kind_id') ? ' has-error' : '' }}">
                    {{Form::label('product_kind_id','Kind*')}}
                    {!!Form::select('product_kind_id', App\ProductKindType::pluck('name', 'id') , null, ['class'=> 'form-control'])!!} 
                </div>
                
                <div class="form-group col-sm-4{{ $errors->has('rooms') ? ' has-error' : '' }}">
                    {{Form::label('rooms','Bedrooms')}}
                    {!! Form::selectRange('rooms', 0, 10, old('rooms'), ['class'=>'form-control'])  !!}
                </div>
                
                <div class="form-group col-sm-4{{ $errors->has('bathrooms') ? ' has-error' : '' }}">
                    {{Form::label('bathrooms','Bathrooms')}}
                    
                    {!! Form::selectRange('bathrooms', 0, 10, old('bathrooms'), ['class'=>'form-control'])  !!}
                    
                </div>
                
                <div class="form-group col-sm-4{{ $errors->has('floors') ? ' has-error' : '' }}">
                    {{Form::label('floors','Floor')}} 
                    {!! Form::selectRange('floors', -3, 10, old('building_floors'), ['class'=>'form-control'])  !!}
                </div>

                <div class="form-group col-sm-4{{ $errors->has('building_floors') ? ' has-error' : '' }}">
                    {{Form::label('building_floors','Building floors')}}
                    {!! Form::selectRange('building_floors', 0, 14, old('building_floors'), ['class'=>'form-control'])  !!}
                </div>

                <div class="form-group col-sm-4{{ $errors->has('building_floors_expand') ? ' has-error' : '' }}">
                    {{Form::label('building_floors_expand','Floors to expand')}}
                    {!! Form::selectRange('building_floors_expand', 0, 10, old('building_floors_expand'), ['class'=>'form-control'])  !!}
                </div>
                
                <div class=" form-block col-md-4{{ $errors->has('area') ? ' has-error' : '' }}">
                    <div class="form-group">
                        {{Form::label('area', 'Area*')}}
                        <div class="input-group">
                            {!!Form::number('area', null, ['class'=>'form-control' ])!!}
                            <span class="input-group-addon">m&sup2;</span>
                        </div> 
                    </div>
                </div>
                
                <div class="col-md-4 form-block{{ $errors->has('area_util') ? ' has-error' : '' }}">
                    <div class="form-group">
                        {{Form::label('area_util', 'Area util*')}}
                        <div class="input-group">
                            {!!Form::number('area_util', null, ['class'=>'form-control' ])!!}
                            <span class="input-group-addon">m&sup2;</span>
                        </div> 
                    </div>
                </div> 
                
                <div class="col-md-4 form-block{{ $errors->has('plot_area') ? ' has-error' : '' }}">
                    <div class="form-group">
                        {{Form::label('plot_area', 'Plot area')}}
                        <div class="input-group">
                            {!!Form::number('plot_area', null, ['class'=>'form-control' ])!!}
                            <span class="input-group-addon">m&sup2;</span>
                        </div> 
                    </div>
                </div>
                
                <div class="col-md-4 form-block{{ $errors->has('building_front') ? ' has-error' : '' }}">
                    <div class="form-group">
                        {{Form::label('building_front', 'Front')}}
                        <div class="input-group">
                            {!!Form::number('building_front', null, ['class'=>'form-control' ])!!}
                            <span class="input-group-addon">m&sup2;</span>
                        </div> 
                    </div>
                </div>
                
                <div class="col-md-4 form-block{{ $errors->has('building_depth') ? ' has-error' : '' }}">
                    <div class="form-group">
                        {{Form::label('building_depth', 'Depth')}}
                        <div class="input-group">
                            {!!Form::number('building_depth', null, ['class'=>'form-control' ])!!}
                            <span class="input-group-addon">m&sup2;</span>
                        </div> 
                    </div>
                </div>


                <div class="col-md-4 form-block{{ $errors->has('area_first_floor') ? ' has-error' : '' }}">
                    <div class="form-group">
                        {{Form::label('area_first_floor', 'Area first floor')}}
                        <div class="input-group">
                            {!!Form::number('area_first_floor', null, ['class'=>'form-control' ])!!}
                            <span class="input-group-addon">m&sup2;</span>
                        </div> 
                    </div>
                </div>


                <div class="col-md-4 form-block{{ $errors->has('area_underground') ? ' has-error' : '' }}">
                    <div class="form-group">
                        {{Form::label('area_underground', 'Area underground')}}
                        <div class="input-group">
                            {!!Form::number('area_underground', null, ['class'=>'form-control' ])!!}
                            <span class="input-group-addon">m&sup2;</span>
                        </div> 
                    </div>
                </div>


                <div class="col-md-4 form-block{{ $errors->has('window_area') ? ' has-error' : '' }}">
                    <div class="form-group">
                        {{Form::label('window_area', 'Window area')}}
                        <div class="input-group">
                            {!!Form::number('window_area', null, ['class'=>'form-control' ])!!}
                            <span class="input-group-addon">m&sup2;</span>
                        </div> 
                    </div>
                </div>


                <div class="col-md-4 form-block{{ $errors->has('ceiling_height') ? ' has-error' : '' }}">
                    <div class="form-group">
                        {{Form::label('ceiling_height', 'Ceiling height')}}
                        <div class="input-group">
                            {!!Form::number('ceiling_height', null, ['class'=>'form-control' ])!!}
                            <span class="input-group-addon">m&sup2;</span>
                        </div> 
                    </div>
                </div>

                <div class="form-group col-sm-4{{ $errors->has('year') ? ' has-error' : '' }}">
                    {{Form::label('year','Year built')}}
                    {{Form::number('year', null, ['class'=> 'form-control'])}}
                </div>


                <div class="col-md-4 form-block{{ $errors->has('building_expenses') ? ' has-error' : '' }}">
                    <div class="form-group">
                        {{Form::label('building_expenses', 'Building expenses')}}
                        <div class="input-group">
                            {!!Form::number('building_expenses', null, ['class'=>'form-control' ])!!}
                            <span class="input-group-addon">&euro;</span>
                        </div> 
                    </div>
                </div>
                
                <div class="form-group col-md-12{{ $errors->has('renting_enabled') ? ' has-error' : '' }}">
                    {!!Form::checkbox('renting_enabled', '1', isset($product)?$product->renting_enabled:false, ['open-close'=>'#container-renting'])!!}
                    {{Form::label('renting_enabled', 'Renting')}}
                </div>
                <div class="panel" id="container-renting">
                    <div class="form-group col-md-3{{ $errors->has('renting_period_id') ? ' has-error' : '' }}">
                        {{Form::label('renting_period_id','Charge periodicity')}}
                        {!!Form::select('renting_period_id',App\RentingPeriod::pluck('name', 'id'), null, ['class'=> 'form-control'])!!} 
                    </div>

                    <div class="col-md-3 form-block{{ $errors->has('renting_cost') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {{Form::label('renting_cost', 'Renting cost')}}
                            <div class="input-group">
                                {!!Form::number('renting_cost', null, ['class'=>'form-control' ])!!}
                                <span class="input-group-addon">&euro;</span>
                            </div> 
                        </div>
                    </div>

                    <div class="col-md-3 form-block{{ $errors->has('renting_agency_fee') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {{Form::label('renting_agency_fee', 'Agency fee')}}
                            <div class="input-group">
                                {!!Form::number('renting_agency_fee', null, ['class'=>'form-control' ])!!}
                                <span class="input-group-addon">&euro;</span>
                            </div> 
                        </div>
                    </div>
                
                    <div class="col-md-3 form-block{{ $errors->has('renting_bond') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {{Form::label('renting_bond', 'Bond')}}
                            <div class="input-group">
                                {!!Form::number('renting_bond', null, ['class'=>'form-control' ])!!}
                                <span class="input-group-addon">&euro;</span>
                            </div> 
                        </div>
                    </div>
                
                    <div class="col-md-3 form-block{{ $errors->has('renting_deposit') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {{Form::label('renting_deposit', 'Deposit')}}
                            <div class="input-group">
                                {!!Form::number('renting_deposit', null, ['class'=>'form-control' ])!!}
                                <span class="input-group-addon">&euro;</span>
                            </div> 
                        </div>
                    </div>


                    <div class="form-group col-md-12{{ $errors->has('vacation_enabled') ? ' has-error' : '' }}">
                        {!!Form::checkbox('vacation_enabled', '1',  isset($product)?$product->vacation_enabled:false, ['open-close'=>'#container-vacation-rent'])!!}
                        {{Form::label('vacation_enabled', 'Vacation rent')}}
                    </div>

                    <div id="container-vacation-rent" class="form-group col-md-6{{ $errors->has('vacation_register_number') ? ' has-error' : '' }}">
                        {{Form::label('vacation_register_number', 'Vacation register number')}}
                        {!!Form::text('vacation_register_number', null, ['class'=> 'form-control'])!!}                               
                    </div>
                    
                </div>

                <div class="form-group col-md-12{{ $errors->has('selling_enabled') ? ' has-error' : '' }}">
                    {!!Form::checkbox('selling_enabled', '1', isset($product)?$product->selling_enabled:true, ['open-close'=>'#container-selling'])!!}
                    {{Form::label('selling_enabled', 'Selling')}}
                </div>
                
                <div id="container-selling" class="col-md-4 form-block{{ $errors->has('selling_cost') ? ' has-error' : '' }}">
                    <div class="form-group">
                        {{Form::label('selling_cost', 'Selling cost')}}
                        <div class="input-group">
                            {!!Form::number('selling_cost', null, ['class'=>'form-control' ])!!}
                            <span class="input-group-addon">&euro;</span>
                        </div> 
                    </div>
                </div>

                <div class="form-group col-md-12{{ $errors->has('selling_cost_visible') ? ' has-error' : '' }}">
                    {!!Form::checkbox('selling_cost_visible', '1', false, ['class'=> ''])!!}
                    {{Form::label('selling_cost_visible', 'Show cost')}}    
                    <small>Choose whether to show or hide the cost on your web</small>
                </div>

                </div>

                <div class="col-sm-6 b-r"> 

                <div class="col-sm-12{{ $errors->has('features') ? ' has-error' : '' }}">                     
                    <div class="form-group">                        
                            {{Form::label('fatures','Tags')}}
                            <input type="text" name="features" id="features" clas="form-control col-sm-12" />                         
                    </div> 

                </div> 
                @section('scripts')  
                    @parent
                    <script type="text/javascript" src="{!! asset('js/plugins/tokenfield-typeahead/scrollspy.js') !!}" charset="UTF-8"></script>
                    <script type="text/javascript" src="{!! asset('js/plugins/tokenfield-typeahead/affix.js') !!}" charset="UTF-8"></script>
                    <script type="text/javascript" src="{!! asset('js/plugins/tokenfield-typeahead/typeahead.bundle.min.js') !!}" charset="UTF-8"></script>
                    <script type="text/javascript" src="{!! asset('js/plugins/tokenfield-typeahead/docs.min.js') !!}" charset="UTF-8"></script>
                    <script>
                    var allFeatures = {!! App\Feature::all() !!};
                    var productFeatures = {!! isset($product->features)?$product->features:'[]' !!};
                    $(function() {

                        var engine = new Bloodhound({
                            local: allFeatures.map(function(o){ return {'label': o.name , 'value': o.id}; }),
                            datumTokenizer: function(d) {
                                return Bloodhound.tokenizers.whitespace(d.label);
                            },
                            queryTokenizer: Bloodhound.tokenizers.whitespace,
                            dupDetector: function(remoteMatch, localMatch) {
                                return remoteMatch.id === localMatch.id;
                            }
                        });

                        engine.initialize();
                            
                        $('#features').tokenfield({
                            typeahead: [null, { source: engine.ttAdapter(), display: 'label', minLength: 0 }]
                        })
                        .on('tokenfield:initialize', function(e){
                            
                        }).on('tokenfield:createtoken', function (event) {
                            var existingTokens = $(this).tokenfield('getTokens');
                            $.each(existingTokens, function(index, token) {
                                if (token.value === event.attrs.value){
                                    event.preventDefault();   
                                }                                    
                            });                             
                        }) 
                        
                        $('#features').tokenfield('setTokens', productFeatures.map(function(o){ return {'label': o.name , 'value': o.id}; }));
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
 
                    });

                    </script>
                @stop

                <div class="form-group col-sm-12">
                    {{Form::label('descriptions','Description')}}
                    <div class="tabs-container ">

                            <div class="tabs-left">
                                <ul class="nav nav-tabs">
                                    @foreach(App\Language::all() as $key => $lang)
                                        <li class="{!! $key == 0 ? 'active' : '' !!}"><a data-toggle="tab" href="#tab-lang{!! $lang->id !!}"> {!! $lang->name !!}</a></li>
                                    @endforeach
                                </ul>
                                <div class="tab-content ">
                                    @foreach(App\Language::all() as $key => $lang)
                                        <div id="tab-lang{!!$lang->id!!}" class="tab-pane {!! $key == 0 ? 'active' : '' !!}">
                                            <div class="panel-body">
                                            @if(isset($product))
                                                {{Form::textarea('descriptions'.$lang->id, $product->getDescription($lang->id) , ['class'=> 'form-control'])}}
                                            @else
                                                {{Form::textarea('descriptions'.$lang->id, old('descriptions'.$lang->id), ['class'=> 'form-control'])}}
                                            @endif                                               
                                            </div>
                                        </div> 
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </div>



                <div class="form-group col-sm-6{{ $errors->has('energy_certificate_id') ? ' has-error' : '' }}">
                    {{Form::label('energy_certificate_id','Energy Certificate')}}
                    {{Form::select('energy_certificate_id', App\EnergyCertificate::pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])}}
                </div>

                <div class="form-group col-sm-6{{ $errors->has('division_license_id') ? ' has-error' : '' }}">
                    {{Form::label('division_license_id','Horizontal division license')}}
                    {{Form::select('division_license_id', App\DivisionLicense::pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])}}
                </div>

                <div class="form-group col-sm-6{{ $errors->has('electric_power_system_id') ? ' has-error' : '' }}">
                    {{Form::label('electric_power_system_id','Electric power system')}}
                    {{Form::select('electric_power_system_id', App\ElectricPowerSystem::pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])}}
                </div>


                <div class="form-group col-sm-12{{ $errors->has('video_url') ? ' has-error' : '' }}">
                    {{Form::label('video_url','Video URL')}}
                    {{Form::text('video_url', null, ['class'=> 'form-control'])}}
                </div> 

                <div class="form-group col-sm-12{{ $errors->has('virtual_visit_url') ? ' has-error' : '' }}">
                    {{Form::label('virtual_visit_url','Virtual visit URL')}}
                    {{Form::text('virtual_visit_url', null, ['class'=> 'form-control'])}}
                </div> 

                <div class="form-group col-sm-12{{ $errors->has('external_url') ? ' has-error' : '' }}">
                    {{Form::label('external_url','External URL')}}
                    {{Form::text('external_url', null, ['class'=> 'form-control'])}}
                </div> 
                </div>
                </div>
        </div>
    </div>
</div>