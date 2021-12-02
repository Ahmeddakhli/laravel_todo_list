<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Support\Arr;
use Auth;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    protected $rules = [
        'name' 		    => 'required|max:60',
        'description'   => 'max:155',
        'start_date'    => 'required|date',
        'end_date'      => 'required|date|after:start_date',
        'completed'    	=> 'numeric',
        'image'         => 'required|image|max:2048',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $user = Auth::user();

        return view('tasks.index', [
            'tasks'           => Task::orderBy('created_at', 'asc')->where('user_id', $user->id)->get(),
     ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $user = Auth::user();
        $task = $request->all();
        $task['user_id'] = $user->id;

              //  after make validation 
             

              if($request->hasfile('image'))
              { 
                
                  //store img
          
                      $file=$request->file('image');
                      $name = time().rand(1,100).'.'.$file->extension();
                      $file->storeAs('public/images', $name); 
                      $task['image'] = $name;
                      
              }
         

            

        Task::create($task);

        return redirect('/tasks')->with('success', 'Task created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::query()->findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Task $task, Request $request, $id)
    {
        $this->validate($request, $this->rules);
        $task = $request->all();
        if($request->hasfile('image'))
        { 
          
            //store img
    
                $file=$request->file('image');
                $name = time().rand(1,100).'.'.$file->extension();
                $file->storeAs('public/images', $name); 
                $task['image'] = $name;
                
        }
   
        $task->update($task);
      

        return redirect('tasks')->with('success', 'Task Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect('/tasks')->with('success', 'Task Deleted');
    }
}
