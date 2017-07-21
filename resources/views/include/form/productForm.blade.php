
<div class="wrapper wrapper-content animated fadeInRight">
    
    @include('include.form.errorMessage')
    {{csrf_field()}}
    <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Location <small></small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a> 
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                             <div class="col-md-6">

                                    <div class="form-group col-sm-8{{ $errors->has('city_name') ? ' has-error' : '' }}">
                                        {{Form::label('city_name','Town')}}
                                        {{Form::text('city_name', old('city_name'), ['class'=> 'form-control'])}}
                                    </div>
                                    <div class="form-group col-sm-4{{ $errors->has('zip_code') ? ' has-error' : '' }}">
                                        {{Form::label('zip_code','C.P.')}}
                                        {{Form::text('zip_code', old('zip_code'), ['class'=> 'form-control'])}}
                                    </div>
                                    <div class="form-group col-sm-8{{ $errors->has('street_name') ? ' has-error' : '' }}">
                                        {{Form::label('street_name','Street Name')}}
                                        {{Form::text('street_name', old('street_name'), ['class'=> 'form-control'])}}
                                    </div>
                                    <div class="form-group col-sm-4{{ $errors->has('street_number') ? ' has-error' : '' }}">
                                        {{Form::label('street_number','Nº')}}
                                        {{Form::text('street_number', old('street_number'), ['class'=> 'form-control'])}}
                                    </div>
                   
                                    <div class="form-group col-sm-12{{ $errors->has('public_access_id') ? ' has-error' : '' }}">
                                        {{Form::label('public_access_id','Public Address*')}}
                                         {{Form::select('public_access_id', App\PublicAccess::pluck('name', 'id'), old('public_access_id'), ['class'=> 'form-control'])}}
                                    </div> 
                                    <div class="form-group col-sm-6{{ $errors->has('district') ? ' has-error' : '' }}">
                                        {{Form::label('district','District')}}
                                        {{Form::text('district', old('district'), ['class'=> 'form-control'])}}
                                    </div>
                                    <div class="form-group col-sm-6{{ $errors->has('zone') ? ' has-error' : '' }}">
                                        {{Form::label('zone','Zone')}}
                                        {{Form::text('zone', old('zone'), ['class'=> 'form-control'])}}
                                    </div>
                                    <div class="form-group col-sm-6{{ $errors->has('urbanization') ? ' has-error' : '' }}">
                                        {{Form::label('urbanization','Urbanization')}}
                                        {{Form::text('urbanization', old('urbanization'), ['class'=> 'form-control'])}}
                                    </div>
                                    <div class="form-group col-sm-2{{ $errors->has('block') ? ' has-error' : '' }}">
                                        {{Form::label('block','Block')}}
                                        {{Form::text('block', old('block'), ['class'=> 'form-control'])}}
                                    </div>
                                    <div class="form-group col-sm-2{{ $errors->has('doorway') ? ' has-error' : '' }}">
                                        {{Form::label('doorway','Doorway')}}
                                        {{Form::text('doorway', old('doorway'), ['class'=> 'form-control'])}}
                                    </div>
                                    <div class="form-group col-sm-2{{ $errors->has('door') ? ' has-error' : '' }}">
                                        {{Form::label('door','Door')}}
                                        {{Form::text('door', old('door'), ['class'=> 'form-control'])}}
                                    </div>

                             </div>
                             <div class="col-md-6">
                             
                             </div>
                             </div>
                        </div>
                    </div>
                </div>
                <div class=" col-md-12 text-center">
                    <div class="form-group">
                        {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
                    </div>
                </div>

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
                                                                
                                <div class="form-group col-sm-12">
                                    {{Form::label('product_status_id','Status*')}}
                                    {!!Form::select('product_status_id', App\ProductStatus::pluck('name', 'id'), null, ['class'=> 'form-control'])!!} 
                                </div> 

                                <div class="form-group col-sm-6{{ $errors->has('identifier') ? ' has-error' : '' }}">
                                    {{Form::label('identifier','Identifier')}}
                                    {{Form::text('identifier', null, ['class'=> 'form-control'])}}
                                </div>

                                <div class="form-group col-sm-4{{ $errors->has('product_kind_id') ? ' has-error' : '' }}">
                                    {{Form::label('product_kind_id','Kind*')}}
                                    {!!Form::select('product_kind_id', App\ProductKindType::pluck('name', 'id') , null, ['class'=> 'form-control'])!!} 
                                </div>
                                
                                <div class="form-group col-sm-4">
                                    {{Form::label('floors','Floor')}}
                                    {{Form::select('floors', [0,1,2,3,4,5,6,7,8,9,10], null, ['class'=> 'form-control'])}}
                                </div>

                                <div class="form-group col-sm-4">
                                    {{Form::label('building_floors','Building floors')}}
                                    {{Form::select('building_floors', [0,1,2,3,4,5,6,7,8,9,10], null, ['class'=> 'form-control'])}}
                                </div>

                                <div class="form-group col-sm-4">
                                    {{Form::label('building_floors_expand','Floors to expand')}}
                                    {{Form::select('building_floors_expand', [0,1,2,3,4,5,6,7,8,9,10], null, ['class'=> 'form-control'])}}
                                </div>
                                
                                <div class="form-group col-sm-4">
                                    {{Form::label('rooms','Bedrooms')}}
                                    {{Form::select('rooms', [0,1,2,3,4,5,6,7,8,9,10], null, ['class'=> 'form-control'])}}
                                </div>
                                
                                <div class="form-group col-sm-4">
                                    {{Form::label('bathrooms','Bathrooms')}}
                                    {{Form::select('bathrooms', [0,1,2,3,4,5,6,7,8,9,10], null, ['class'=> 'form-control'])}}
                                </div>
                                
                                <div class="col-md-4 form-block{{ $errors->has('area') ? ' has-error' : '' }}">
                                    <div class="form-group">
                                        {{Form::label('area', 'Area*')}}
                                        <div class="input-group">
                                            {!!Form::number('area', null, ['class'=>'form-control' ])!!}
                                            <span class="input-group-addon">m&sup2;</span>
                                        </div> 
                                    </div>
                                </div>
                                
                                <div class="col-md-4 form-block">
                                    <div class="form-group">
                                        {{Form::label('area_util', 'Area util*')}}
                                        <div class="input-group">
                                            {!!Form::number('area_util', null, ['class'=>'form-control' ])!!}
                                            <span class="input-group-addon">m&sup2;</span>
                                        </div> 
                                    </div>
                                </div> 
                                
                                <div class="col-md-4 form-block">
                                    <div class="form-group">
                                        {{Form::label('plot_area', 'Plot area')}}
                                        <div class="input-group">
                                            {!!Form::number('plot_area', null, ['class'=>'form-control' ])!!}
                                            <span class="input-group-addon">m&sup2;</span>
                                        </div> 
                                    </div>
                                </div>
                                
                                <div class="col-md-4 form-block">
                                    <div class="form-group">
                                        {{Form::label('building_front', 'Front')}}
                                        <div class="input-group">
                                            {!!Form::number('building_front', null, ['class'=>'form-control' ])!!}
                                            <span class="input-group-addon">m&sup2;</span>
                                        </div> 
                                    </div>
                                </div>
                                
                                <div class="col-md-4 form-block">
                                    <div class="form-group">
                                        {{Form::label('building_depth', 'Depth')}}
                                        <div class="input-group">
                                            {!!Form::number('building_depth', null, ['class'=>'form-control' ])!!}
                                            <span class="input-group-addon">m&sup2;</span>
                                        </div> 
                                    </div>
                                </div>


                                <div class="col-md-4 form-block">
                                    <div class="form-group">
                                        {{Form::label('area_first_floor', 'Area first floor')}}
                                        <div class="input-group">
                                            {!!Form::number('area_first_floor', null, ['class'=>'form-control' ])!!}
                                            <span class="input-group-addon">m&sup2;</span>
                                        </div> 
                                    </div>
                                </div>


                                <div class="col-md-4 form-block">
                                    <div class="form-group">
                                        {{Form::label('area_underground', 'Area underground')}}
                                        <div class="input-group">
                                            {!!Form::number('area_underground', null, ['class'=>'form-control' ])!!}
                                            <span class="input-group-addon">m&sup2;</span>
                                        </div> 
                                    </div>
                                </div>


                                <div class="col-md-4 form-block">
                                    <div class="form-group">
                                        {{Form::label('window_area', 'Window area')}}
                                        <div class="input-group">
                                            {!!Form::number('window_area', null, ['class'=>'form-control' ])!!}
                                            <span class="input-group-addon">m&sup2;</span>
                                        </div> 
                                    </div>
                                </div>


                                <div class="col-md-4 form-block">
                                    <div class="form-group">
                                        {{Form::label('ceiling_height', 'Ceiling height')}}
                                        <div class="input-group">
                                            {!!Form::number('ceiling_height', null, ['class'=>'form-control' ])!!}
                                            <span class="input-group-addon">m&sup2;</span>
                                        </div> 
                                    </div>
                                </div>

                                <div class="form-group col-sm-4">
                                    {{Form::label('year','Year built')}}
                                    {{Form::number('year', null, ['class'=> 'form-control'])}}
                                </div>


                                <div class="col-md-4 form-block">
                                    <div class="form-group">
                                        {{Form::label('building_expenses', 'Building expenses')}}
                                        <div class="input-group">
                                            {!!Form::number('building_expenses', null, ['class'=>'form-control' ])!!}
                                            <span class="input-group-addon">&euro;</span>
                                        </div> 
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    {!!Form::checkbox('renting_enabled', 'true', false, ['class'=> ''])!!}
                                    {{Form::label('renting_enabled', 'Renting')}}
                                </div>
 
                                    <div class="col-md-6 form-block">
                                        <div class="form-group">
                                            {{Form::label('renting_cost', 'Renting cost')}}
                                            <div class="input-group">
                                                {!!Form::number('renting_cost', null, ['class'=>'form-control' ])!!}
                                                <span class="input-group-addon">&euro;</span>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        {{Form::label('renting_period_id','Charge periodicity')}}
                                        {!!Form::select('renting_period_id',App\RentingPeriod::pluck('name', 'id'), null, ['class'=> 'form-control'])!!} 
                                    </div>
                                
                                    <div class="col-md-6 form-block">
                                        <div class="form-group">
                                            {{Form::label('renting_agency_fee', 'Agency fee')}}
                                            <div class="input-group">
                                                {!!Form::number('renting_agency_fee', null, ['class'=>'form-control' ])!!}
                                                <span class="input-group-addon">&euro;</span>
                                            </div> 
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6 form-block">
                                        <div class="form-group">
                                            {{Form::label('renting_bond', 'Bond')}}
                                            <div class="input-group">
                                                {!!Form::number('renting_bond', null, ['class'=>'form-control' ])!!}
                                                <span class="input-group-addon">&euro;</span>
                                            </div> 
                                        </div>
                                    </div>
                                
                                    <div class="col-md-4 form-block">
                                        <div class="form-group">
                                            {{Form::label('renting_deposit', 'Deposit')}}
                                            <div class="input-group">
                                                {!!Form::number('renting_deposit', null, ['class'=>'form-control' ])!!}
                                                <span class="input-group-addon">&euro;</span>
                                            </div> 
                                        </div>
                                    </div>
                                     
                                <div class="form-group col-md-12">
                                    {!!Form::checkbox('vacation_enabled', 'true', false, ['class'=> ''])!!}
                                    {{Form::label('vacation_enabled', 'Vacation rent')}}
                                </div>

                                <div class="form-group col-md-6">
                                    {{Form::label('vacation_register_number', 'Vacation register number')}}
                                    {!!Form::text('vacation_register_number', null, ['class'=> 'form-control'])!!}                                   
                                </div>

                                <div class="form-group col-md-12">
                                    {!!Form::checkbox('selling_enabled', 'true', false, ['class'=> ''])!!}
                                    {{Form::label('selling_enabled', 'Selling')}}
                                </div>
                                
                                <div class="col-md-4 form-block">
                                    <div class="form-group">
                                        {{Form::label('selling_cost', 'Selling cost')}}
                                        <div class="input-group">
                                            {!!Form::number('selling_cost', null, ['class'=>'form-control' ])!!}
                                            <span class="input-group-addon">&euro;</span>
                                        </div> 
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    {!!Form::checkbox('selling_cost_visible', 'true', false, ['class'=> ''])!!}
                                    {{Form::label('selling_cost_visible', 'Show cost')}}
                                </div>

                             </div>

                             <div class="col-sm-6 b-r"> 

                                <div class="form-group col-sm-12">
                                    {{Form::label('features','Tags')}}
                                    {{Form::text('features', null, ['class'=> 'form-control'])}}
                                </div> 

                                <div class="form-group col-sm-12">
                                    {{Form::label('descriptions','Description')}}
                                    {{Form::textarea('descriptions', null, ['class'=> 'form-control'])}}
                                </div> 


                                <div class="form-group col-sm-6">
                                    {{Form::label('energy_certificate_id','Energy Certificate')}}
                                    {{Form::select('energy_certificate_id', App\EnergyCertificate::pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])}}
                                </div>

                                <div class="form-group col-sm-6">
                                    {{Form::label('division_license_id','Horizontal division license')}}
                                    {{Form::select('division_license_id', App\DivisionLicense::pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])}}
                                </div>

                                <div class="form-group col-sm-6">
                                    {{Form::label('electric_power_system_id','Electric power system')}}
                                    {{Form::select('electric_power_system_id', App\ElectricPowerSystem::pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])}}
                                </div>


                                <div class="form-group col-sm-12">
                                    {{Form::label('video_url','Video URL')}}
                                    {{Form::text('video_url', null, ['class'=> 'form-control'])}}
                                </div> 

                                <div class="form-group col-sm-12">
                                    {{Form::label('virtual_visit_url','Virtual visit URL')}}
                                    {{Form::text('virtual_visit_url', null, ['class'=> 'form-control'])}}
                                </div> 

                                <div class="form-group col-sm-12">
                                    {{Form::label('external_url','External URL')}}
                                    {{Form::text('external_url', null, ['class'=> 'form-control'])}}
                                </div> 
                             </div>
                             </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Private data<small> (optional)</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a> 
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-6 b-r"> 
                                    
                                    <div class="form-group"><label>Register Number</label> 
                                       {!!Form::text('register_number', null, ['class'=>'form-control'])!!}
                                    </div>
                                    
                                    <div class="form-group"><label>Owner</label> 
                                    {!!Form::select('owner_id', App\ContactKind::where('name', 'owner')->first()->contacts()->pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])!!} 
                                    </div>

                                    <div class="form-group"><label>Partner</label> 
                                    {!!Form::select('partner_id', App\ContactKind::where('name', 'partner')->first()->contacts()->pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])!!} 
                                    </div>

                                    <div class="form-group">
                                        {!!Form::checkbox('keys', 'true', false, ['class'=> ''])!!}
                                        <label for="simple_note_enabled">Simple land note</label>
                                    </div>
                                    
                                    <div class="form-group"><label>Simple land note date</label> 
                                    {!!Form::date('simple_note_date', null, ['class'=> 'form-control'])!!} 
                                    </div>

                                    <div class="form-group">
                                        {!!Form::checkbox('mortage_enabled', 'true', false, ['class'=> ''])!!}
                                        <label for="mortage_enabled">Mortgage</label>
                                    </div>

                                <div id="mortage_container">
                                
                                    <div class="form-group"><label>Mortgage cost</label>  
                                        <div class="input-group">
                                            {!!Form::number('mortage_cost', null, ['class'=>'form-control' ])!!}
                                        <span class="input-group-addon">&euro;</span>
                                        </div>
                                    </div>

                                </div>    


                                    <div class="form-group"><label>Land value tax</label>  <div class="input-group">
                                    {!!Form::number('land_value_tax', null, ['class'=>'form-control' ])!!}
                                       <span class="input-group-addon">&euro;</span>
                                    </div>
                                    </div>

                                </div>
                                <div class="col-sm-6 b-r"> 
                                    <div class="form-group"><label>Sale Manager</label> 
                                    {!!Form::select('manager_id', App\User::pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])!!} 
                                    </div>
                                    <div class="form-group"><label>Recruiter</label> 
                                    {!!Form::select('recruiter_id', App\User::pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])!!} 
                                    </div>
                                    <div class="form-group">
                                        {!!Form::checkbox('keys', 'true', false, ['class'=> ''])!!}
                                        <label for="keys">Keys</label>
                                    </div>
                                    <div class="form-group"><label>Internal notes</label>
                                    {!!Form::textarea('internal_notes', null, ['class'=>'form-control', 'placeholder'=>''])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Agreement Type -->
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Agreement terms<small> (optional)</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a> 
                            </div>
                        </div>
                        <div class="ibox-content">
                             <div class="row">
                             <div class="col-md-3 form-block">
                                <div class="form-group"><label>Agreement type</label> 
                                {!!Form::select('agreement_type_id', App\AgreementType::pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])!!} 
                                </div>
                             </div>
                             <div class="col-md-3 form-block">
                                <div class="form-group">
                                <label>Agreement valid until</label> 
                                <div class="input-group">
                                    {!!Form::date('agreement_valid_until', null, ['class'=>'form-control' ])!!}
                                </div>
                                </div>
                             </div>
                             <div class="col-md-3 form-block">
                                <div class="form-group">
                                    {{Form::label('agreement_commission_percentage', 'Commission percentage')}}
                                    <div class="input-group">
                                        {!!Form::number('agreement_commission_percentage', null, ['class'=>'form-control' ])!!}
                                        <span class="input-group-addon">%</span>
                                    </div> 
                                </div>
                             </div>
                             <div class="col-md-3 form-block">
                                <div class="form-group">
                                <label>Commission amount</label> 
                                <div class="input-group">
                                    {!!Form::number('agreement_commission_amount', null, ['class'=>'form-control' ])!!}
                                    <span class="input-group-addon">&euro;</span>
                                </div>
                                </div>
                             </div>
                             </div>
                        </div>
                    </div>
                </div>

                <!-- Other -->
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Other<small> (optional)</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a> 
                            </div>
                        </div>
                        <div class="ibox-content">
                        <div class="row">
                           <div class="col-sm-6 b-r"> 
                                    <div class="form-group"><label>Property Title</label> 
                                       {!!Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Property title'])!!}
                                    </div>
                                    <div class="form-group"><label>Magazine description</label> 
                                       {!!Form::textarea('magazine_description', null, ['class'=>'form-control', 'placeholder'=>'Property title'])!!}
                                    </div>
                            </div>
                            <div class="col-sm-6">
                                    <div class="form-group"><label>Area in registry</label> 
                                        <div class="input-group">
                                            {!!Form::number('area_in_registry	', null, ['class'=>'form-control' ])!!}
                                       <span class="input-group-addon">m&sup2;</span>
                                       </div>
                                    </div>
                                    <div class="form-group"><label>Terrace area</label>  <div class="input-group">
                                       {!!Form::number('terrace_area', null, ['class'=>'form-control' ])!!}
                                       <span class="input-group-addon">m&sup2;</span></div>
                                    </div>
                                    <div class="form-group"><label>Garage area</label>  <div class="input-group">
                                       {!!Form::number('garage_area', null, ['class'=>'form-control', 'pattern'=>'[0-9]+([\.,][0-9]+)?', 'step'=> 0.01])!!}
                                       <span class="input-group-addon">m&sup2;</span></div>
                                    </div>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

@section('scripts')       
    <script src="{!! asset("js/plugins/iCheck/icheck.min.js") !!}"></script>
    <script>
    $(document).ready(function () {
         $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });

    });
    </script>
@stop