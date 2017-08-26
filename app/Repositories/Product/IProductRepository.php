<?php 

namespace App\Repositories\Product;

use Illuminate\Http\Request;

interface IProductRepository{

    public function get($id);
    
    public function create(array $data);

    public function update($id, array $data);

    public function putFeatures($id, array $data);

    public function delete($id);

    public function getAll($pages);

    public function search(Request $request, $pages);

}