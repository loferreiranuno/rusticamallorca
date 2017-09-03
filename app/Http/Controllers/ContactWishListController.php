<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactWishListRequest;
use App\ContactWishList;
use Illuminate\Support\Facades\Response;

class ContactWishListController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactWishListRequest $request)
    {
        $filter = [
            ['product_id','=',$request->get('product_id')],
            ['contact_id','=', $request->get('contact_id')]
        ];

        $items = ContactWishList::where($filter);
        if($items->count() == 0){
            $item = ContactWishList::create($request->all());
        }else{
            foreach($items as $item){
                $item->update($request->all());
            }
        }

        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200);         

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
        $item = ContactWishList::find($id);
        $item->update($request->all());

        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200);
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
