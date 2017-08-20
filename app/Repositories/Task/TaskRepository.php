<?php 


namespace App\Repositories\Task;

use App\Repositories\Task\ITaskRepository;
use App\Task;
use Auth;

class TaskRepository implements ITaskRepository{


    private $model;
 
    public function __construct(Task $model){
        $this->model = $model; 
    }

    public function get($id){
        return $this->model->findOrFail($id);
    } 
 
    public function create(array $data){

        $task = $this->model->create($data);
        $task->done = false;
        $task->creator_id = Auth::id();
  
        if(isset($data["product_id"])){
            $task->product_id = $data["product_id"];
        }

        if(isset($data["contact_id"])){
            $task->contact_id = $data["contact_id"];
        }

        $task->save();

        return $task; 
    }

    public function update($id, array $data){
        $task = $this->get($id);
        $task->update($data);
        return $task;
    }

    public function delete($id){
        $task = $this->get($id);
        $task->delete();
        return true;
    }

    public function search($id, $start_date, $end_date, $otherOnly){
        $task = $this->get($id);
        
        $filter = array(
            array('start_date', '>=', $start_date),
            array('end_date', '<=', $end_date),
            array('id', $otherOnly ?  '!=' : "=", $id));
        

        $result = $task->user->tasks();        
        return $result->where($filter)->get();
    }
}
