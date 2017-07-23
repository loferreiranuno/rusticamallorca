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
                <div class="form-group{{ $errors->has('agreement_type_id') ? ' has-error' : '' }}"><label>Agreement type</label> 
                {!!Form::select('agreement_type_id', App\AgreementType::pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])!!} 
                </div>
                </div>
                <div class="col-md-3 form-block">
                <div class="form-group{{ $errors->has('agreement_valid_until') ? ' has-error' : '' }}">
                <label>Agreement valid until</label> 
                <div class="input-group">
                    {!!Form::date('agreement_valid_until', null, ['class'=>'form-control' ])!!}
                </div>
                </div>
                </div>
                <div class="col-md-3 form-block">
                <div class="form-group{{ $errors->has('agreement_commission_percentage') ? ' has-error' : '' }}">
                    {{Form::label('agreement_commission_percentage', 'Commission percentage')}}
                    <div class="input-group">
                        {!!Form::number('agreement_commission_percentage', null, ['class'=>'form-control' ])!!}
                        <span class="input-group-addon">%</span>
                    </div> 
                </div>
                </div>
                <div class="col-md-3 form-block">
                <div class="form-group{{ $errors->has('agreement_commission_amount') ? ' has-error' : '' }}">
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