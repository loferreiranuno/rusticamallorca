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
                    
                    <div class="form-group{{ $errors->has('register_number') ? ' has-error' : '' }}"><label>Register Number</label> 
                        {!!Form::text('register_number', null, ['class'=>'form-control'])!!}
                    </div>
                    
                    <div class="form-group{{ $errors->has('owner_id') ? ' has-error' : '' }}"><label>Owner</label> 
                    {!!Form::select('owner_id', App\ContactKind::where('name', 'owner')->first()->contacts()->pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])!!} 
                    </div>

                    <div class="form-group{{ $errors->has('partner_id') ? ' has-error' : '' }}"><label>Partner</label> 
                    {!!Form::select('partner_id', App\ContactKind::where('name', 'partner')->first()->contacts()->pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])!!} 
                    </div>

                    <div class="form-group{{ $errors->has('simple_note_enabled') ? ' has-error' : '' }}">
                        {!!Form::checkbox('keys', '1', false, ['class'=> ''])!!}
                        <label for="simple_note_enabled">Simple land note</label>
                    </div>
                    
                    <div class="form-group{{ $errors->has('simple_note_date') ? ' has-error' : '' }}"><label>Simple land note date</label> 
                    {!!Form::date('simple_note_date', null, ['class'=> 'form-control'])!!} 
                    </div>

                    <div class="form-group{{ $errors->has('mortage_enabled') ? ' has-error' : '' }}">
                        {!!Form::checkbox('mortage_enabled', '1', false, ['class'=> ''])!!}
                        <label for="mortage_enabled">Mortgage</label>
                    </div>

                <div id="mortage_container">
                
                    <div class="form-group{{ $errors->has('mortage_cost') ? ' has-error' : '' }}"><label>Mortgage cost</label>  
                        <div class="input-group">
                            {!!Form::number('mortage_cost', null, ['class'=>'form-control' ])!!}
                        <span class="input-group-addon">&euro;</span>
                        </div>
                    </div>

                </div>    


                    <div class="form-group{{ $errors->has('land_value_tax') ? ' has-error' : '' }}"><label>Land value tax</label>  <div class="input-group">
                    {!!Form::number('land_value_tax', null, ['class'=>'form-control' ])!!}
                        <span class="input-group-addon">&euro;</span>
                    </div>
                    </div>

                </div>
                <div class="col-sm-6 b-r"> 
                    <div class="form-group{{ $errors->has('manager_id') ? ' has-error' : '' }}"><label>Sale Manager</label> 
                    {!!Form::select('manager_id', App\User::pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])!!} 
                    </div>
                    <div class="form-group{{ $errors->has('recruiter_id') ? ' has-error' : '' }}"><label>Recruiter</label> 
                    {!!Form::select('recruiter_id', App\User::pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])!!} 
                    </div>
                    <div class="form-group{{ $errors->has('keys') ? ' has-error' : '' }}">
                        {!!Form::checkbox('keys', '1', false, ['class'=> ''])!!}
                        <label for="keys">Keys</label>
                    </div>
                    <div class="form-group{{ $errors->has('internal_notes') ? ' has-error' : '' }}"><label>Internal notes</label>
                    {!!Form::textarea('internal_notes', null, ['class'=>'form-control', 'placeholder'=>''])!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>