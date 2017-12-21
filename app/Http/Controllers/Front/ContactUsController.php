<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;
use App\Contact;
use App\ContactWishList;

class ContactUsController extends Controller
{
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $product = null;
        $subject = null;
        if($request->has('product')){
            $product = Product::findOrFail($request->get('product'));
            $subject = $product->title;
        }
        return view('pages.front.contactus', compact('product','subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = null;
        if($request->has("email")){
            $email = $request->get("email");
            $name = $request->get("name");

            $contact = Contact::where('email', $email)->first();
            if($contact == null)
            {
                $contact = Contact::create([
                    'creator_id' => 1, //system id
                    'responsable_id' => 1, //system id
                    'kind_id' => 2,
                    'name' => $name,
                    'email' => $email,
                    'source_id' => 2,
                    'step_id' => 1
                ]);
            }
        }

        if($request->has("product")){
            $product = Product::findOrFail($request->get("product"));

            $filter = [
                ['product_id','=',$request->get('product_id')],
                ['contact_id','=', $request->get('contact_id')]
            ];
            
            $items = ContactWishList::where($filter);
            if($items->count() == 0){
                $item = ContactWishList::create([
                    'product_id'=> $product->id,
                    'contact_id'=> $contact->id,
                    'interested'=> true
                ]);
            }else{
                foreach($items as $item){
                    $item->update([
                        'interested' => true]);
                }
            }
        }

        return view('pages.front.thankyoupage',['url'=> route('property.show',['property'=>$product])]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
