<table class=" table table-stripped toggle-arrow-tiny default breakpoint footable-loaded"  > 
    <thead>
         @include("include.back.contract.tr", ["action"=>true, "td"=>"th", "columns" => $templateType->availableColumns])
    </thead>
    <tbody>
         @if($templateType->hasTemplates)
         
            @foreach($product->ContractsByType($templateType) as $contract)
                <tr>
                    @foreach($contract->ColumnValues as $key => $value)
                        <td>{{$value}}</td>
                    @endforeach
                    <td style="width:130px">
                        <div class="form-group">
                            <div class="input-group">
                                <a class="btn btn-success btn-sm" target="_blank" href="{{route('product_contract.show', ['id'=>$contract->id])}}" ><i class="fa fa-print" title="Print version"></i></a>&nbsp;
                                <a class="btn btn-primary btn-sm" href="{{route('product_contract.edit', ['id'=>$contract->id])}}" ><i class="fa fa-edit" title="Edit"></i></a>&nbsp;
                                <a class="btn btn-danger btn-sm" data-href="{{route('product_contract.destroy', ['id'=>$contract->id])}}" data-token="{{csrf_token()}}" data-action="delete"><i class="fa fa-trash" title="Delete"></i></a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
         <tr>
            <td class="text-center" colspan="{{ count($templateType->availableColumns) + 1 }}" >
                <a class="btn btn-primary" href="{{ route('product_contract.create',['product'=>$product, 'type'=>$templateType]) }}">Add new {{ $templateType->text }} contract</a>
            </td>
         </tr>
         @else
            <tr>
                <td colspan="{{ count($templateType->availableColumns) + 1 }}">
                    <span class="p">No available models for {{ $templateType->text }}, <a class="link" href="{{route('contracttemplate.create', ['model_type_id'=>$templateType->id]) }}" >click here</a> to manage contract templates.</span>
                </td>
            </tr>
         @endif
    </tbody>
</table>
