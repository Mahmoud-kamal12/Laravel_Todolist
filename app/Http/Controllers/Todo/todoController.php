<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\addValidation;
use App\Http\Requests\Todo\updateValidation;
use App\Todo\Todo;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class todoController extends Controller
{
    private $todo ;
    private $name;

    public function __construct()
    {
        $this->name = "Todo";
        $this->todo = new Todo();
    }

    public function index()
    {
        $todos = DB::table('todos')
        ->orderBy('id', 'desc')
        ->get();

        return view("{$this->name}.index" , ['todos' => $todos]);
        // return view('todos')->with('todos',$todos);
        // return view('todos' , compact('todos'));
    }

    public function show($id)
    {
        return view("{$this->name}.show" , ['todo' => $this->todo->find($id)]);
    }

    public function create()
    {
        return view("{$this->name}.create");
    }

    public function store(addValidation $request)
    {
        $this->todo->title = $request->input('title');
        $this->todo->description = $request->input('desc');
        $this->todo->save();
        session()->flash('msg' , "ceate done");
        return redirect('/todo');
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view("{$this->name}.edit")->with('todo' , $todo);
    }

    public function update(updateValidation $request , $id)
    {

        $todo = Todo::find($id);
        $this->todo = $todo;
        $this->todo->title = $request->input('title');
        $this->todo->description = $request->input('desc');
        $this->todo->save();
        session()->flash('msg' , "update succes");
        return redirect("/todo");;

    }

    public function destroy($id)
    {
        $todo = $this->todo->find($id);
        $todo->delete();
        session()->flash('msg' , "delete done");
        return redirect("/todo");
    }

    public function complete($id){
        $todo = $this->todo->find($id);
        $todo->completed = true;
        $todo->save();
        session()->flash('msg' , "Todo  completed");
        return redirect("/todo");
    }

}
