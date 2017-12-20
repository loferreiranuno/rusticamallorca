<div class="row"> 
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has($fieldId) ? ' has-error' : '' }}">
            {!!Form::label($fieldId, $fieldName)!!}            
            {!!Form::number($fieldId, old($fieldId), ['class'=>'form-control']) !!}
        </div>
    </div> 
</div> 