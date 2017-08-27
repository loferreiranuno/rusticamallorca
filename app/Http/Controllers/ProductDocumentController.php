<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use App\ProductDocument;
use App\Product;
use Auth;
class ProductDocumentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function store(Request $request)
    {
        if($request->has("product_id"))
        {
            
            $validator = Validator::make($request->all(), ProductDocument::$rules, ProductDocument::$messages);
            if ($validator->fails()) {
                return Response::json([
                    'error' => true,
                    'message' => $validator->messages()->first(),
                    'code' => 400
                ], 400);
            }

            $productId = $request->get("product_id");
            $product = Product::find($productId);
            
            if($product != null){

                $file = $request->file('file');
                $originalFileName = $file->getClientOriginalName();
                $fileName = time().$originalFileName;
                
                $file->move($this->getPath($product->id),$fileName);

                $document = new ProductDocument();
                $document->product_id = $productId;
                $document->original_name = $originalFileName;
                $document->file_name = $fileName;
                $document->save();

                return Response::json([
                    'error' => false,
                    'data' => $product->documents,
                    'code' => 200
                ], 200);
                
            }   
        } 
    }

    function getPath($product_id){
        $path = storage_path().'/product/documents/'.$product_id.'/';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        return $path;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = ProductDocument::find($id);
        $product = $document->product;
        $file_path = storage_path('/product/documents/'.$product->id.'/'.$document->file_name);

        return Response::download($file_path, $document->file_name, [
            'Content-Length: '. filesize($file_path)
        ]); 
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
        $document = ProductDocument::find($id);
        $product  = $document->product;

        if(unlink(storage_path('/product/documents/'.$product->id.'/'.$document->file_name))){
            $document->delete();
        }
        
        return redirect()->route('product.show', ['id' => $product->id]); 
    }
}
