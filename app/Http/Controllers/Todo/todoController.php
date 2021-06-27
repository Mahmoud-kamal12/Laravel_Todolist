<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\addValidation;
use App\Http\Requests\Todo\updateValidation;
use App\Todo\Todo;
use Error;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\QueryException;
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

        return view("{$this->name}.index" , ['todos' => $this->todo->orderBy('id', 'desc')->get()]);

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
        return redirect(route("todo.index"));
    }

    public function edit($id)
    {
        return view("{$this->name}.edit")->with('todo' , $this->todo->find($id));
    }

    public function update(updateValidation $request , $id)
    {
        $this->todo = $this->todo->find($id);
        $id = $this->todo->id;
        $data["description"] = $request->input('desc');
        if($this->todo->title != $request->input('title')){
            $data['title'] =  $request->input('title');
            try{
                Todo::where('id', $id)->update($data);
                session()->flash('msg' , 'update secces');
                return redirect(route("todo.index"));
            }catch(QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == '1062')
                    return redirect()->back()->withErrors(['title' => 'The title has already been taken.']);
            }
        }
        else{
            Todo::where('id', $id)->update($data);
            session()->flash('msg' , 'update secces');
            return redirect(route("todo.index"));
        }
    }

    public function destroy($id)
    {
        $this->todo->find($id)->delete();
        session()->flash('msg' , "delete done");
        return redirect(route("todo.index"));
    }

    public function complete($id){
        $this->todo = $this->todo->find($id);
        $this->todo->completed = true;
        $this->todo->save();
        session()->flash('msg' , "Todo  completed");
        return redirect(route("todo.index"));
    }

}
