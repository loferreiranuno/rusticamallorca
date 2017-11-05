<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Response;
use App\Task; 

use App\User;
use App\Product;
use App\Contact;

use Auth;
use RMHelper;

use App\Repositories\Task\ITaskRepository;

class TaskController extends Controller
{
 
    private $taskRepository;

    public function __construct(ITaskRepository $taskRepository){
        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent = Auth::user();   
        $events = json_encode($this->toFullCalendar($agent->tasks));

        return view('pages.back.taskEdit', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $task = $this->taskRepository->create($request->all());
        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function userTasks($id){
        $user = User::find($id);        
        $events = json_encode($this->toFullCalendar($user->tasks));
        return view('pages.back.taskEdit', compact('events', "user"));
    }

    public function contactTasks($id){        
        $contact = Contact::find($id);        
        $events = json_encode($this->toFullCalendar($contact->tasks));
        return view('pages.back.taskEdit', compact('events', 'contact'));
    }

    public function productTasks($id){
        $product = Product::find($id);        
        $events = json_encode($this->toFullCalendar($product->tasks));
        return view('pages.back.taskEdit', compact('events', 'product'));        
    }

    public function search(Request $request){
           
        $results = [];
        $start_date = $request->get('start');
        $end_date = $request->get('end');
        
        if($request->has('user')){
            $results = $this->taskRepository->searchByUser($request->get('user'), $start_date, $end_date);
        }else if($request->has('contact')){
            $results = $this->taskRepository->searchByContact($request->get('contact'), $start_date, $end_date);
        }else if($request->has('product')){
            $results = $this->taskRepository->searchByProduct($request->get('product'), $start_date, $end_date);
        }else{
            $results = $this->taskRepository->searchByUser(Auth::id(), $start_date, $end_date);
        }

        return Response::json($this->toFullCalendar($results), 200); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = $this->taskRepository->get($id);
          
        return view('pages.back.task', compact('task'));
    }

    private function toFullCalendar($tasks){
        $events = array();
        if(isset($tasks)){
            foreach($tasks as $event){
                $parsedEvent = array(
                    "id"=>$event->id, 
                    "start"=> $event->start_date, 
                    "title"=> $event->description,
                    "class"=> RMHelper::getTaskCss($event),
                    "icon"=> $event->kind->css_icon,
                    "url"=> route('task.edit',['id'=>$event->id]),
                    "end"=>$event->end_date);

                if(isset($event->contact)){
                   $parsedEvent["contact"] = [
                       "name" => $event->contact->name,
                       "label" => __("include.contact"),
                       "url" => route("contact.show", ['id'=> $event->contact->id])
                   ];
                }

                if(isset($event->product)){
                   $parsedEvent["product"] = [
                       "name" => $event->product->title . ", ". $event->product->fullAddress,
                       "label" => __("include.property"),
                       "url" => route("product.show", ['id'=> $event->product->id])
                   ];
                }

                if(isset($event->creator)){
                   $parsedEvent["creator"] = [
                       "name" => $event->creator->name,
                       "label" => __("include.creator"),
                       "url" => route("contact.show", ['id'=> $event->creator->id])
                   ];
                }

                $events[] = $parsedEvent;
            }
        }
        return $events;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->taskRepository->update($id, $request->all());
        
        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200); 
    }

    public function updateCalendar(Request $request){
        $events = $request->get("events");
        
        foreach($events as $event){             
            $this->taskRepository->update($event["task"], [
                'start_date' => $event["start_date"],
                'end_date' => $event["end_date"]
            ]);
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
        $this->taskRepository->delete($id);
        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200); 
    }

    public function done(Request $request){

        if($request->has("id") && $request->has("done")){
            $done = $request->get("done") == "true";
            $task = $this->taskRepository->get($request->get("id"));
            
            if($task!=null){
                $task->done = $done;
                $task->save();
                return Response::json([
                    'error' => false,
                    'code'  => 200
                ], 200); 
            }           
        }

        return Response::json([
            'error' => true,
            'code'  => 400
        ], 400); 
    }
}
