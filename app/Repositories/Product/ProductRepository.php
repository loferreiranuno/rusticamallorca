<?php 

namespace App\Repositories\Product;

use App\Repositories\Product\IProductRepository;
use App\Product;
use App\Language;
use App\Feature;
use App\ProductDescription;

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
        $product = $this->model->create($data);
        $this->updateDescriptions($product, $data);
        $this->updateFeatures($product, $data);
        $product->save();
        return $product;
    }
    
    public function update($id, array $data){
        $product = $this->get($id);
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
    

    public function getAll(){
        return $this->model->all();
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
                 
        foreach($this->featureModel->all() as $item){ 
            $key = "feature-".$item->id;
            if(isset($data[$key])){ 
                $value = $data[$key]; 
                if($value){                   
                    if(!$product->features->contains('id', $item->id)){                        
                        $product->features()->save($item);
                    }                
                }else{
                    $product->features->pull($item->id);
                } 
            }else{
                $product->features->pull($item->id);
            }
        } 
    
        $product->save();
    }

}