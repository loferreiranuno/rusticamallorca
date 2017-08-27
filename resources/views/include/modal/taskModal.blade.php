<div class="modal inmodal" id="{{$modalId}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> 
            </div>
            <div class="modal-body">
                @if(isset($product))
                    @include("include.form.taskForm", ["product"=>$product])
                @elseif(isset($contact))
                    @include("include.form.taskForm", ["contact"=>$contact])
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" submit-task class="btn btn-primary">Submit task</button>
            </div>
        </div>
    </div>
</div>

