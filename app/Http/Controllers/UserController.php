<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests\UserCreateRequest;
use App\Repositories\Task\ITaskRepository;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{

    private $taskRepository;
    public function __construct(ITaskRepository $taskRepository)
    {
        $this->middleware('auth');    
        $this->taskRepository = $taskRepository;
    }
     /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */ 

    private $TOTAL_PAGES = 25;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = User::search($request->all())->paginate($this->TOTAL_PAGES);
        $actionData = [];
        $actionData[] = [
                        "url"=> route('user.create'),
                        "visible"=> true,
                        "title"=> "Add",
                        "attributes"=>['class'=>'btn btn-primary']
                    ];
        return view('pages.back.userList', compact('users', 'actionData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actionData = [];
        $actionData[] = [
                        "url"=> route('user.create'),
                        "visible"=> true,
                        "title"=> "Add",
                        "attributes"=>['class'=>'btn btn-primary']
                    ];
        return view('pages.back.userEdit', compact('actionData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $data = $request->all();
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        return view('pages.back.user', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $user = User::find($id);
        
        $actionData = [];
        $actionData[] = [
                        "url"=> route('user.create'),
                        "visible"=> true,
                        "title"=> "Add",
                        "attributes"=>['class'=>'btn btn-primary']
                    ];
        $actionData[] = [
                        "url"=> route('user.index'),
                        "visible"=> true,
                        "title"=> "List",
                        "attributes"=>['class'=>'btn btn-primary']
                    ];
        $taskByDay = [];
        if($user->tasks != null){
             $taskByDay = $this->taskRepository->groupByDay($user->tasks);
        }
         return view('pages.back.user', compact('user','actionData','taskByDay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $actionData = [];
        $actionData[] = [
                        "url"=> route('user.create'),
                        "visible"=> true,
                        "title"=> "Add",
                        "attributes"=>['class'=>'btn btn-primary']
                    ];
        $actionData[] = [
                        "url"=> route('user.index'),
                        "visible"=> true,
                        "title"=> "List",
                        "attributes"=>['class'=>'btn btn-primary']
                    ];

        return view('pages.back.userEdit', compact('user', 'actionData'));
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
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('user.show',['user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index'); 

    }
}
