<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        return view('pages.front.property');
    }
}
