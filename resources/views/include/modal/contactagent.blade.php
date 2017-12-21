<div id="modal-error" class="modal hidden" tabindex="-1">
		<div class="modal-dialog">
			{{Form::open()}}			
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2>Send message</h2> 
				</div>
				<div class="modal-body">
					<div class="form-group">					    
                        {!! Form::text('name', old('name'), ['placeholder'=>'Name']) !!}                        					
					</div>			
					<div class="form-group">					    
                        {!! Form::text('phone', old('phone'), ['placeholder'=>'Phone  number']) !!}                        					
					</div>		 		
					<div class="form-group">
                        {!! Form::email("email", old("email"), ['placeholder'=>'Email', 'required'=>'']) !!}
                   </div>
					<div class="form-group">						
                        {!! Form::label("text", "Message text:", []) !!}                        						
                        {!! Form::text("text", old('text'), []) !!}
					</div>				
				</div>
				<div class="modal-footer">	
					<div class="form-group">
                        {!! Form::submit("Send", ['class'=>'btn btn-block']) !!}                        
                        {!! Form::hidden("product", $product->id) !!}                        
                    </div>				
				</div>	
			{{Form::close()}}
		</div>
	</div>