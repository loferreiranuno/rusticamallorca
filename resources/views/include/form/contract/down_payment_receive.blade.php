@include("include.form.input.date",['required'=> true, 'id'=>'agreement_date', 'name'=>'Agreement Date'])
@include("include.form.input.select",['required'=> true, 'id'=>'template_id','name'=>'Agreement Model', 'values'=> $templates->pluck('name','id')->prepend('select', '') ])
@include("include.form.input.select",['required'=> true, 'id'=>'first_buyer_id','name'=>'First Buyer', 'values'=> $contacts->pluck('name','id')->prepend('select', '') ])
@include("include.form.input.number",['required'=> true, 'icon'=>'&euro;', 'id'=>'down_payment_amount', 'name'=>'Down payment amount'])