<?php

namespace App\Repositories\Contact;

use Illuminate\Http\Request;

interface IContactRepository{

    public function search(Request $request, $pages); 

    public function getAll($pages);   

}