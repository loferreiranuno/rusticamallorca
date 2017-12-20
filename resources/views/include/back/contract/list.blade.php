<table class=" table table-stripped toggle-arrow-tiny default breakpoint footable-loaded"  > 
    <thead>
         @include("include.back.contract.tr", ["td"=>"th", "columns" => $templateType->availableColumns])
    </thead>
    <tbody>
         @if($templateType->hasTemplates)
         <tr>
            <td class="text-center" colspan="{{ count($templateType->availableColumns) }}" >
                <a class="btn btn-primary" href="{{ route('product_contract.create',['product'=>$product, 'type'=>$templateType]) }}">Add new {{ $templateType->text }} contract</a>
            </td>
         </tr>
            @foreach($product->contracts->where('id', '=', $templateType->id) as $contract)
            <tr>

            </tr>
            @endforeach
         @else
            <tr>
                <td colspan="{{ count($templateType->availableColumns) }}">
                    <span class="p">No available models for {{ $templateType->text }}, <a class="link" href="{{route('contracttemplate.create') }}" >click here</a> to manage contract templates.</span>
                </td>
            </tr>
         @endif
    </tbody>
</table>
