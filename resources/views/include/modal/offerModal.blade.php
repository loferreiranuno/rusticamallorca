
<div class="modal inmodal" id="{{$modalId}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            {{ Form::open(array('method'=>'post', 'id'=>'offer-form', 'name' => 'offer-form', 'url' => route("offer.store"))) }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> 
            </div>
            <div class="modal-body">
            
                                <h1>Offer form</h1>
                                <fieldset> 
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Property *</label>                                                
                                                {!! Form::text('title', $product->title, ['class'=> 'form-control', 'disabled'=>'disabled']) !!}                                                
                                                {!! Form::hidden('product_id', $product->id, []) !!}                                                    
                                                {!! Form::hidden('user_id', Auth::id()) !!}
                                                                                                                                            
                                            </div>
                                            <div class="form-group">
                                                <label>Contact *</label>
                                                {!!Form::select('contact_id',App\Contact::pluck('name', 'id'), null, ['class'=> 'form-control'])!!} 
                                            </div>
                                            <div class="form-group">
                                                <label>Operation</label>
                                                <select class="form-control" name="operation" id="operation">
                                                    <option value="sale">Sale</option>
                                                    <option value="rent">Rent</option>                                                    
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Value *</label>
                                                 <div class="input-group">
                                                    {!!Form::number('value', null, ['class'=>'form-control' ])!!}
                                                    <span class="input-group-addon">&euro;</span>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <div style="margin-top: 20px">
                                                    <i class="fa fa-handshake-o" style="font-size: 120px;color: #e5e5e5 "></i>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                </fieldset>
                                            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" submit-offer class="btn btn-primary">Submit offer</button>
            </div>
    
            {!! Form::close() !!}
    
        </div>
    </div>
</div> 

@section("scripts")
@parent
    <script>
        $(document).ready(function(){
            $("[submit-offer]").on("click", function(){                
                $.ajax({
                    type: 'POST',
                    data: $("#offer-form").serialize(),
                    url: $("#offer-form").attr("action"),
                    success: function(data){ 
                        window.location.reload();
                    },
                    error: function(error){ 
                    }
                })
            });
        });
    </script>
@stop