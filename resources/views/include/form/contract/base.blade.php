<div class="wrapper wrapper-content animated fadeInRight">
    @include('include.form.errorMessage')
    {{csrf_field()}}
    
@if(isset($contract))
    {{ Form::model($contract, ['route' => ['product_contract.update', $interest->id], 'method' => 'patch']) }}
@else
    {!! Form::open(['route' => 'product_contract.store']) !!} 
@endif 
    @yield("contract-form")

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group  text-center">            
                {!! Form::submit('Save', ['class'=> 'btn btn-primary']) !!}                 
                {!! Form::hidden('product_id', $product->id) !!} 
                {!! Form::hidden('template_code', $templateType->code) !!}
            </div>
        </div>
    </div>

{!! Form::close() !!}

</div>