@include("include.form.input.date",['required'=> true, 'id'=>'agreement_date', 'name'=>'Agreement Date'])
@include("include.form.input.select",['required'=> true, 'id'=>'template_id','name'=>'Agreement Model', 'values'=> $templates->pluck('name','id')->prepend('select', '') ])
@include("include.form.input.select",['required'=> true, 'id'=>'first_seller_id','name'=>'First Seller', 'values'=> $owners->pluck('name','id')->prepend('select', '') ])
@include("include.form.input.select",['id'=>'second_seller_id','name'=>'Second Seller', 'values'=> $owners->pluck('name','id')->prepend('select', '') ])
@include("include.form.input.number",['required'=> true, 'icon'=>'&euro;', 'id'=>'selling_commission_amount', 'name'=>'Selling commission amounts'])