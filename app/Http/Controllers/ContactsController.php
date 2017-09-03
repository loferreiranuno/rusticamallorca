<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use App\Contact;
use App\User;
use Auth;
use App\Product;
use App\ContactKind;
use App\ContactStep;
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

        $actionData = []; 
        if(!in_array($contact->step->name, ["won","lost"])){
            foreach(ContactStep::whereIn('name',['won','lost'])->get() as $step){
                    $actionData[] = [
                        "url"=> null,
                        "visible"=> true,
                        "title"=> $step->name,
                        "attributes"=>[
                            'class'=>'btn ' . ($step->name == "won" ? "btn-success" : "btn-danger"),
                            'data-step-id'=> $step->id,
                            'step-action-btn'=> "",
                            'data-href'=> route('contact.step',['id'=>$contact->id])
                        ]
                    ];
            }
        }else{
             $actionData[] = [
                        "url"=> null,
                        "visible"=> true,
                        "title"=> "reopen",
                        "attributes"=>[
                            'class'=>'btn btn-success',
                            'data-step-id'=> ContactStep::where('name','=','lead')->first()->id,
                            'step-action-btn'=> "",
                            'data-href'=> route('contact.step',['id'=>$contact->id])
                        ]
                    ];
        }
        $actionData = array_merge($actionData, [
                ["url"=> route('contact.edit',['contact'=> $contact??null]),"visible"=>isset($contact), "title"=> "Edit", "attributes"=> ['class'=>'btn btn-primary']],
                ["url"=> route('contact.index',['contact'=> $contact??null]),"visible"=>isset($contact), "title"=> "Contacts", "attributes"=> ['class'=>'btn btn-primary']],
                ["url"=> route('contact.create'),"visible"=>true, "title"=> "Add", "attributes"=> ['class'=>'btn btn-primary']]
        ]);
        return view('pages.back.contact', compact('contact', 'taskByDay', 'actionData'));
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
        return $this->show($contact->id);
    }

    public function stepUpdate(Request $request, $id){
        
        if($request->has('step_id')){
            $contact = Contact::find($id);
            $contact->step_id = $request->get("step_id");
            $contact->save();
        } 

        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200); 
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
