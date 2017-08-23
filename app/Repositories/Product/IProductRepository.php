<?php 

namespace App\Repositories\Product;

interface IProductRepository{

    public function get($id);
    
    public function create(array $data);

    public function update($id, array $data);

    public function putFeatures($id, array $data);

    public function delete($id);

    public function getAll();

}