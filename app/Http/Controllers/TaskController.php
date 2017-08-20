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
        $this->taskRepository = $taskRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
 
        $task_id = $request->get("task");
        $start_date = $request->get("start");
        $end_date = $request->get("end");
        $otherOnly = $request->get("otherOnly");
        
        $results =  $this->taskRepository->search($task_id, $start_date, $end_date, $otherOnly == "true");
         
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
}
