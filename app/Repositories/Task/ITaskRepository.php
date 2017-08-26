<?php

namespace App\Repositories\Task;

interface ITaskRepository{

    public function get($id);  
    
    public function create(array $data); 

    public function update($id, array $data);

    public function delete($id); 

    public function search($id, $start_date, $end_date, $otherOnly);

    public function searchByUser($id, $start_date, $end_date, $otherOnly);

    public function groupByDay($tasks); 
}