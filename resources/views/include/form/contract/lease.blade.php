@include("include.form.input.select",['required'=> true, 'id'=>'template_id','name'=>'Agreement Model', 'values'=> $templates->pluck('name','id')->prepend('select', '') ])
@include("include.form.input.date",['required'=> true, 'id'=>'agreement_date', 'name'=>'Agreement Date'])
@include("include.form.input.select",['id'=>'lessor_id','name'=>'Lessor', 'values'=> $owners->pluck('name','id')->prepend('select', '') ])
@include("include.form.input.select",['id'=>'first_lessee','name'=>'First lessee', 'values'=> $contacts->pluck('name','id')->prepend('select', '') ])
@include("include.form.input.select",['id'=>'second_lessee','name'=>'Second lessee', 'values'=> $contacts->pluck('name','id')->prepend('select', '') ])
@include("include.form.input.select",['id'=>'third_lessee','name'=>'Third lessee', 'values'=> $contacts->pluck('name','id')->prepend('select', '') ])
@include("include.form.input.date",['required'=> true, 'id'=>'initial_renting_date', 'name'=>'Initial renting date'])
@include("include.form.input.number",['required'=> true, 'id'=>'max_years_extend_time', 'name'=> 'Years the contract can be extended for'])   
@include("include.form.input.number",['required'=> true, 'id'=>'max_days_warn_revoke', 'name'=> 'Maximum number of days to notify the revocation of the contract'])   
@include("include.form.input.number",['required'=> true, 'id'=>'rent_amount_year', 'name'=> 'Annual rent',  'icon'=>'&euro;'])
@include("include.form.input.number",['id'=>'rent_amount_year_spelled', 'name'=> 'Annual rent: word form',  'icon'=>'&euro;']) 
@include("include.form.input.number",['required'=> true, 'id'=>'rent_amount_month', 'name'=> 'Monthly rent',  'icon'=>'&euro;']) 
@include("include.form.input.number",['id'=>'rent_amount_month_spelled', 'name'=> 'Monthly rent: word form',  'icon'=>'&euro;']) 
@include("include.form.input.number",['required'=> true, 'id'=>'first_payment', 'name'=> 'Initial payment',  'icon'=>'&euro;']) 
@include("include.form.input.number",['id'=>'first_payment_spelled', 'name'=> 'Initial payment: word form',  'icon'=>'&euro;']) 
@include("include.form.input.number",['required'=> true, 'id'=>'first_payment_month', 'name'=> 'First monthly payment',  'icon'=>'&euro;']) 
@include("include.form.input.number",['required'=> true, 'id'=>'first_payment_year', 'name'=> 'First annual payment',  'icon'=>'&euro;'])
@include("include.form.input.date",['required'=> true, 'id'=>'next_payment_date', 'name'=>'Next payment date'])
@include("include.form.input.number",['required'=> true, 'id'=>'bond', 'name'=> 'Bond',  'icon'=>'&euro;'])
@include("include.form.input.number",['id'=>'bond_spelled', 'name'=> 'Bond: word form',  'icon'=>'&euro;'])
@include("include.form.input.number",['required'=> true, 'id'=>'deposit', 'name'=> 'Deposit',  'icon'=>'&euro;'])
@include("include.form.input.number",['id'=>'deposit_spelled', 'name'=> 'Deposit: word form',  'icon'=>'&euro;']) 
@include("include.form.input.number",['id'=>'current_water_meter', 'name'=> 'Current water meter',  'icon'=>'m&sup3;'])
@include("include.form.input.number",['id'=>'current_gas_meter', 'name'=> 'Current gas meter',  'icon'=>'m&sup3;'])
@include("include.form.input.number",['id'=>'current_electricity_meter', 'name'=> 'Current electricity meter',  'icon'=>'kWh'])