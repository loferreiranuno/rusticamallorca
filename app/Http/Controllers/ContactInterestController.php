<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactInterest;
use Illuminate\Support\Facades\Validator; 
use Auth;
use Response;

class ContactInterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $interest = ContactInterest::create($request->all());
        $interest->user_id = Auth::id();

        $interest->product_kind_id = $request->get("product_kind_id"); 
        $interest->save();
        return redirect()->route('contact.show', ['id'=> $interest->contact_id]); 
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
        $interest = ContactInterest::find($id); 
        $interest->update($request->all());
        $interest->product_kind_id = $request->get("product_kind_id");
        $interest->save();
        // $interest->save();
        // $interest->sale_enabled =$request->has('sale_enabled');
        // $interest->rent_enabled =$request->has('rent_enabled');
        // $interest->save();
        return redirect()->route('contact.show', ['id'=> $interest->contact_id]); 
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
