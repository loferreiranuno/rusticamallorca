<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelTemplateType;
use App\ModelTemplate;

use App\Http\Requests\ModelTemplateRequest; 
use Illuminate\Support\Facades\Response;

class ContractTemplateController extends Controller
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
        $templateTypes = ModelTemplateType::all();
        $templates = ModelTemplate::all();
        return view("pages.back.contractTemplateList", compact('templates', 'templateTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $template = null;
        $templateTypes = ModelTemplateType::pluck('name', 'id')->prepend('Select Type', '');
        return view("pages.back.contractTemplateEdit", compact('template', 'templateTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelTemplateRequest $request)
    { 
        $contract = ModelTemplate::create($request->all());
        $contract->save();
        return redirect()->route('contracttemplate.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $template = ModelTemplate::findOrFail($id);
        $templateTypes = ModelTemplateType::pluck('name', 'id')->prepend('Select Type', '');
        return view("pages.back.contractTemplateEdit", compact('templateTypes', 'template'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {         
        $template = ModelTemplate::findOrFail($id);
        $templateTypes = ModelTemplateType::pluck('name', 'id')->prepend('Select Type', '');
        return view("pages.back.contractTemplateEdit", compact('templateTypes', 'template'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModelTemplateRequest $request, $id)
    { 
        $templateTypes = ModelTemplateType::pluck('name', 'id')->prepend('Select Type', '');        
        $template = ModelTemplate::findOrFail($id);
        $template->update($request->all());
        $template->save();
        return view("pages.back.contractTemplateEdit", compact('templateTypes', 'template'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $template = ModelTemplate::findOrFail($id);
        $template->delete();
        return redirect()->route('contracttemplate.index'); 
    }
}
