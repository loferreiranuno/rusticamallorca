<div class="wrapper wrapper-content animated fadeInRight">
    @include('include.form.errorMessage')
    {{csrf_field()}}
    <div class="row"> 
        <div class="col-lg-12">
            <div class="form-group   {{ $errors->has('type') ? ' has-error' : '' }}">
                {!!Form::label('name','Name')!!}
                {!!Form::text('name', old('name'), ['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group  {{ $errors->has('type') ? ' has-error' : '' }}">
                {!!Form::label('type','Type')!!}
                {!!Form::select('model_type_id', $templateTypes, old('model_type_id'), ['class'=> 'form-control'])!!} 
            </div>            
        </div>
    </div>
    <div class="row">  
        <div class="col-lg-12">      
            <div class="form-group   {{ $errors->has('type') ? ' has-error' : '' }}">
                {!!Form::label('text','Template')!!}
                {!! Form::textarea("text", old('text'), ['id'=>'summary-ckeditor', 'class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group  text-center">
            
            {!! Form::submit('Submit', ['class'=> 'btn btn-success']) !!}
            
            </div>
        </div>
    </div>
   
   
</div>

@section('scripts')
    @parent
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@stop