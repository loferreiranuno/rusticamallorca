<div class="row"> 
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has($id) ? ' has-error' : '' }}">
            @if(isset($required) && $required)
                {!! Form::label($id,$name."*") !!}             
                {!! Form::hidden('required[]', $id, ['disabled'=>'disabled']) !!}  
            @else
                {!!Form::label($id,$name)!!}    
            @endif      
            {!! Form::date($id, old($id), ['class'=>'form-control']) !!}
        </div>
    </div> 
</div> 