<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use App\ProductImage;
use App\Product;
use App\ProductImageType;

class PhotoController extends Controller
{

    protected $image;

    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index($product){
 
        $product = Product::find($product);   
        if($product == null){
            echo "Error: Product not found." ;
        }

        return view('pages.back.productImage', compact('product'));
    } 

    public function properties($product){
        
        $product = Product::find($product);  
        $imageTypes = ProductImageType::pluck('name', 'id');

        if($product == null){
            echo "Error: Product not found." ;
        }

        return view('pages.back.productImageProperties', compact('product', 'imageTypes'));
    }

    public function get($product){
        $product = Product::find($product);
        
        if($product == null){
            return response()->json(['error' => true, 'code'=> 400,  'message'=> 'Product with id ' . $product  . ' not found']);
        }

        $imageAnswer = [];

        $images = $product->images()->get();

        if($images != null){
            $path = $this->getPath($product) . Config::get('images.full_size', 'full_');
            
            foreach ($images as $image) {
                $imageAnswer[] = [
                    'original' => $image->original_name,
                    'server' => $image->file_name,
                    'size' => File::size($path . $image->file_name)
                ];
            }
        }
        
        return response()->json([
            'images' => $imageAnswer
        ]); 
    }

    public function update(Request $request){
        $form_data = $request->all();

        $id = $form_data["id"];
        $type = $form_data["type"];

        $image = ProductImage::find($id);

        $image->image_type_id = $type;
        $image->save();
        
        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200); 

    }
    
    public function delete(Request $request){
        $form_data = $request->all();
        $id = $form_data["id"];
        $product_id =$form_data["product_id"];

        $image = ProductImage::find($id);
        $image->delete();

        return $this->delete_file($image->file_name, $product_id);

        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200); 

    }

    public function upload(Request $request)
    {
        $form_data = $request->all();

        $product_id = $form_data['product_id'];
        $product = Product::find($product_id);
        if($product == null){
            return Response::json(['error' => true, 'code'=> 400,  'message'=> 'Product with id ' . $product_id  . ' not found']);
        }

        $validator = Validator::make($form_data, ProductImage::$rules, ProductImage::$messages);

        if ($validator->fails()) {

            return Response::json([
                'error' => true,
                'message' => $validator->messages()->first(),
                'code' => 400
            ], 400);

        }

        $photo = $form_data['file'];

        $originalName = $photo->getClientOriginalName();
        $extension = $photo->getClientOriginalExtension();
        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - strlen($extension) - 1);

        $filename = $this->sanitize($originalNameWithoutExt);
        $allowed_filename = $this->createUniqueFilename( $filename, $extension );

        $uploadSuccess1 = $this->original( $photo, $allowed_filename, $product_id );

        $uploadSuccess2 = $this->icon( $photo, $allowed_filename, $product_id );

        if( !$uploadSuccess1 || !$uploadSuccess2 ) {

            return Response::json([
                'error' => true,
                'message' => 'Server error while uploading',
                'code' => 500
            ], 500);
        }

        $sessionImage = new ProductImage;
        $sessionImage->file_name     = $allowed_filename; 
        $sessionImage->product_id    = $form_data['product_id'];
        $sessionImage->image_type_id = ProductImageType::first()->id;
        $sessionImage->original_name = $originalName;
        $sessionImage->save();

        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200); 

    }
 


    function createUniqueFilename( $filename, $extension )
    {
        $full_size_dir = Config::get('images.full_size', 'full_');
        $full_image_path = $full_size_dir . $filename . '.' . $extension;

        if ( File::exists( $full_image_path ) )
        {
            // Generate token for image
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $imageToken . '.' . $extension;
        }

        return $filename . '.' . $extension;
    }

    /**
     * Optimize Original Image
     */
    function original( $photo, $filename, $product_id )
    {
        $manager = new ImageManager();
        $image = $manager->make( $photo )->save($this->getPath($product_id) . Config::get('images.full_size', 'full_') . $filename );

        return $image;
    }

    function getPath($product_id){
        $path = public_path().'/img/product/'.$product_id.'/';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        return $path;
    }
    /**
     * Create Icon From Original
     */
    function icon( $photo, $filename, $product_id )
    {
        $manager = new ImageManager();
        $image = $manager->make( $photo )->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
            })
            ->save( $this->getPath($product_id) . Config::get('images.icon_size', 'icon_')  . $filename );

        return $image;
    }

    // /**
    //  * Delete Image From Session folder, based on original filename
    //  */
    function delete_file( $filename, $product_id)
    {

        $full_size_dir = $this->getPath($product_id). Config::get('images.full_size', 'full_');
        $icon_size_dir = $this->getPath($product_id). Config::get('images.icon_size', 'icon_');
 
        $full_path1 = $full_size_dir . $filename;
        $full_path2 = $icon_size_dir . $filename;

        if ( File::exists( $full_path1 ) )
        {
            File::delete( $full_path1 );
        }

        if ( File::exists( $full_path2 ) )
        {
            File::delete( $full_path2 );
        }

        if( !empty($sessionImage))
        {
            $sessionImage->delete();
        }

        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200);
    }

    function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }

}
