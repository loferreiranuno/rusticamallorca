<div class="wrapper wrapper-content animated fadeInRight">
   
    
@if(isset($contract))
    {{ Form::model($contract, ['route' => ['product_contract.update', $contract->id], 'method' => 'patch']) }}
@else
    {!! Form::open(['route' => 'product_contract.store']) !!} 
@endif 
    
    {!! Form::hidden('product_id', $product->id) !!} 
    {{csrf_field()}} 

    <div class="row">
        <div class="col-lg-7">
            @include("include.form.contract." . $templateType->code)
        </div>
        <div class="col-lg-5">
            <div class="row">
                <div class="col-lg-12">
                @if(!isset($contract))
                    <h1>Creating new {{ $templateType->text }} contract.</h1>
                @else
                    <h1>Editing {{ $contract->template->name }}, {{ $templateType->text }}</h1>
                @endif
                 @include('include.form.errorMessage')
                    <div class="form-group  text-center">            
                        {!! Form::submit('Save', ['class'=> 'btn btn-primary']) !!}     
                    </div>
                </div>
            </div>
        </div>
    </div> 

{!! Form::close() !!}

</div>