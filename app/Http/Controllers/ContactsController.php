<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Contact;
use App\User;
use Auth;
use App\Product;
use App\ContactKind;

use App\Repositories\Task\ITaskRepository;
use App\Repositories\Contact\IContactRepository;


class ContactsController extends Controller
{
    private $TOTAL_PAGES = 3;
    private $taskRepository;
    private $contactRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ITaskRepository $taskRepository, IContactRepository $contactRepository)
    {
        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
        $this->contactRepository = $contactRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $responsibles = User::pluck('name', 'id');
        $contactKinds = ContactKind::pluck('name', 'id');

        if($request->has("search")){
            $contacts = $this->contactRepository->search($request, $this->TOTAL_PAGES);
        }else{
            $contacts = $this->contactRepository->getAll($this->TOTAL_PAGES);
        }

        return view('pages.back.contactList', compact('contacts', 'responsibles','contactKinds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         if($request->has('product')){
             $product = Product::find($request->get('product'));
             return View::make('pages.back.contactEdit')->with('product', $product);
         }
         return View::make('pages.back.contactEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    { 
        $contact = Contact::create($request->all()); 
        $contact->save();

        if($request->has("product_id")){
            $product = Product::find($request->get("product_id"));
            $product->owner_id = $contact->id;
            $product->save();
            return redirect()->route('product.show', ['id'=> $product->id]); 
        }

        return $this->show($contact->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
 
        $taskByDay = [];
        if($contact->tasks != null){
             $taskByDay = $this->taskRepository->groupByDay($contact->tasks);
        }

        return view('pages.back.contact', compact('contact', 'taskByDay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id); 
        return View::make('pages.back.contactEdit')->with('contact', $contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        $contact = Contact::find($id);
        $contact->update($request->all());
        return View::make('pages.back.contactEdit')->with('contact', $contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
