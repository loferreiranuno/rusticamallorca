<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Response;
use App\Task; 
use Auth;

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

    public function search(Request $request){
         
        $data = $request->all();
        
        $task_id = isset($data["task"])? $data["task"] : null;

        $start_date = $data["start"];
        $end_date = $data["end"];

        $otherOnly = isset($data["otherOnly"]) ? $data["otherOnly"] == "true" : false;

        $results = [];
        if($task_id == null){
            if(!$otherOnly){
                $results =  $this->taskRepository->searchByUser(Auth::id(), $start_date, $end_date, $otherOnly);
            }
        }else{
            $results =  $this->taskRepository->search($task_id, $start_date, $end_date, $otherOnly);
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
        $events = json_encode($this->toFullCalendar($task->user->tasks));
        return view('pages.back.taskEdit', compact('task', 'events'));
    }

    private function toFullCalendar($tasks){
        $events = array();
        if(isset($tasks)){
            foreach($tasks as $event){
                $events[] = array(
                    "id"=>$event->id, 
                    "start"=> $event->start_date, 
                    "title"=> $event->kind->name . " - " . $event->description,
                    "icon"=> $event->kind->css_icon,
                    "end"=>$event->end_date);
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
