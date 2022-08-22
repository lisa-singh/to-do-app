<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use App\Models\Step;
use App\Models\User;
// use Illuminate\Http\Request;

// we are doing this because it is already a part of request
use App\Http\Requests\TodoCreateRequest;

// use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    //

    // another way of applying middle ware
    // public function __construct(){
    //     $this->middleware('auth');
    // $this->middleware('auth')->except('index');
    // }

    public function index(){

        // $todos=auth()->user()->todo()->orderBy('completed')->get();
        $todos=auth()->user()->todo->sortBy('completed');

        // $todos=Todo::orderBy('completed')->get();

        // return view('todos.index')->with(['todos'=>$todos]);
        return view('todo.index', compact('todos'));
    }

    public function create(){
        return view('todo.create');
    }

    public function edit(Todo $todo){
        // $todo=Todo::find($id);

        // dd($todo->title);
        return view('todo.edit',compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo){

        $todo->update(['title'=> $request->title]);
        if($request->step){
            foreach($request->stepName as $key=> $value){
                $id=$request->stepId['$key'];
                if(!$id){
                    $todo-steps()->create(['name'=> $value]);
                }else{
                    $step=Step::find($id);
                    $step->update(['name'=>$key]);
                }

            }
        }
        return redirect(route('todo.index'))->with('message', 'Updated to do');
    }

    public function complete(Todo $todo){
        $todo->update(['completed'=> true]);
        return redirect(route('todo.index'))->with('message', 'Task Completed');
    }

    public function incomplete(Todo $todo){
        $todo->update(['completed'=> false]);
        return redirect(route('todo.index'))->with('message', 'Task in-Completed');
    }

    public function destroy(Todo $todo){
        // destroying relaitonship first
        $todo->steps->each->delete();

        $todo->delete();
        return redirect(route('todo.index'))->with('message', 'Task Deleted');
    }

    public function show(Todo $todo){
        return view('todo.show', compact('todo'));
    }
    public function store(TodoCreateRequest $request){

        // validating and displaying default error message by laravel
        // $request->validate([
        //     'title'=> 'required | max:255',
        // ]);

        // validating and customizing error message without creating a request file
        // $rules=[
        //     'title'=> 'required | max:255',
        // ];
        // $messages=[
        //     'title.max'=> 'Todo should not be more then 255 charater',
        // ];
        // $validator=Validator::make($request->all(), $rules, $messages);
        // if ($validator->fails()) {
        //     return redirect()->back()
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }


        //gives has many relation
        // dd(auth()->user()->todo());

        //gives collection of todo
        //dd(auth()->user()->todo);

        $todo=auth()->user()->todo()->create($request->all());
        if($request->step){
            foreach($request->step as $step){
                $todo->steps()->create(['name'=>$step]);
            }
        }
        // Todo::create($request->all());
        return redirect(route('todo.index'))->with('message','Todo created successfully');
    }
}
