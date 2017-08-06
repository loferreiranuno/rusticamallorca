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
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}"><label>Property Title</label> 
                        {!!Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Property title'])!!}
                    </div>
                    <div class="form-group{{ $errors->has('magazine_description') ? ' has-error' : '' }}"><label>Magazine description</label> 
                        {!!Form::textarea('magazine_description', null, ['class'=>'form-control', 'placeholder'=>'Property title'])!!}
                    </div>
            </div>
            <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('area_in_registry') ? ' has-error' : '' }}"><label>Area in registry</label> 
                        <div class="input-group">
                            {!!Form::number('area_in_registry', null, ['class'=>'form-control' ])!!}
                        <span class="input-group-addon">m&sup2;</span>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('terrace_area') ? ' has-error' : '' }}"><label>Terrace area</label>  <div class="input-group">
                        {!!Form::number('terrace_area', null, ['class'=>'form-control' ])!!}
                        <span class="input-group-addon">m&sup2;</span></div>
                    </div>
                    <div class="form-group{{ $errors->has('garage_area') ? ' has-error' : '' }}"><label>Garage area</label>  
                        <div class="input-group">
                        {!!Form::number('garage_area', null, ['class'=>'form-control', 'pattern'=>'[0-9]+([\.,][0-9]+)?', 'step'=> 0.01])!!}
                        <span class="input-group-addon">m&sup2;</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>