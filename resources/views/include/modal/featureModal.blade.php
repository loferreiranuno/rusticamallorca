<div class="modal inmodal" id="{{$modalId}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            {{ Form::open(array('method'=>'post', 'id'=>'offer-form', 'name' => 'offer-form', 'url' => route("offer.store"))) }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> 
            </div>
            <div class="modal-body">
                @include("include.form.taskForm", ['product'=>isset($product)?$product:null])                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                @if(isset($product)){
                    <button type="button" submit-offer class="btn btn-primary">Submit offer</button>
                }
            </div>
    
            {!! Form::close() !!}
    
        </div>
    </div>
</div> 