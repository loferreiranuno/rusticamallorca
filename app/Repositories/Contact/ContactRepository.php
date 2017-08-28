<?php

namespace App\Repositories\Contact;

use Illuminate\Http\Request;
use App\Contact;

class ContactRepository implements IContactRepository {

    private $model;

    public function __construct(Contact $model){
        $this->model = $model;
    }

    public function search(Request $request, $pages){
        return $this->model->search($request->all())->paginate($pages);
    }

    public function getAll($pages){
        return $this->model->paginate($pages);
    }

}