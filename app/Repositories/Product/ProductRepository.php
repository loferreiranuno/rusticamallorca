<?php 

namespace App\Repositories\Product;

use App\Repositories\Product\IProductRepository;
use App\Product;
use App\Language; 
use App\Feature;
use App\ProductDescription;
use Auth;

use Illuminate\Http\Request;

class ProductRepository implements IProductRepository{
    
    private $model;
    private $languageModel;
    private $featureModel;

    public function __construct(Product $model, Language $languageModel, Feature $featureModel){
        $this->model = $model;
        $this->languageModel = $languageModel;
        $this->featureModel = $featureModel;
    }

    public function get($id ){
        return $this->model->findOrFail($id);
    }
    
    public function create(array $data){

        $data = $this->formatRequest($data);
        $product = $this->model->create($data);
        $product->creator_id = Auth::id();
        $this->updateDescriptions($product, $data);
        $this->updateFeatures($product, $data);
        $product->save();
 
        return $product;
    }
    
    private $checkBoxField =
    [
        "selling_enabled",
        "renting_enabled",
        "vacation_enabled",
        "selling_cost_visible",
        "keys",
        "simple_note_enabled",
        "mortage_enabled",
        
    ];

    private function formatRequest(array $data){
        foreach($this->checkBoxField  as $field){
             $data[$field] = isset($data[$field]);
        }
       
        return $data;
    }

    public function update($id, array $data){
        $product = $this->get($id);
        $data = $this->formatRequest($data);
        $product->update($data);
        
        $this->updateDescriptions($product, $data);
        $this->updateFeatures($product, $data);
        $product->save();
        return $product;
    }

    public function putFeatures($id, array $data){
        $product = $this->get($id);
        $this->updateFeatures($product, $data);
        $product->save();

        print_r($product->features->all());
        return $product;
    }
    

    public function delete($id){
        $product = $this->get($id);
        $product->delete();
        return true;
    }
    

    public function getAll($pages){
        return $this->model->paginate($pages);
    }

    public function search(Request $request, $pages){
        return $this->model->search($request)->paginate($pages);
    }
    
    private function updateDescriptions(Product $product, array $data){
        
        foreach($this->languageModel->all() as $lang){           

            $key = "descriptions".$lang->id;
            if(isset($data[$key])){
                $iDescription = $data[$key];
                $translation = $product->descriptions->where('language_id', $lang->id)->first();
                if($translation != null){
                    $translation->description = $iDescription;
                    $translation->save();
                }else{                
                    $pDescription = new ProductDescription([
                        'language_id'=> $lang->id,
                        'description'=> $iDescription 
                    ]);

                    $product->descriptions()->save( $pDescription);
                }         
            } 
        } 
    }


    private function updateFeatures(Product $product, array $data){

        $product->features()->delete();         
        foreach($this->featureModel->all() as $item){ 
            $key = "feature-".$item->id;
            if(isset($data[$key])){ 
                $value = $data[$key]; 
                $product->features()->save($item);
            }
        }    
    }

}