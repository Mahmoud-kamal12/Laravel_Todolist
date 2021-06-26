@extends('Todo.layout.app')

@section('title' , "Edit " .$todo->id)

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="card" style="width: 80%;">
                <div class="card-header  text-center">
                <h5 class="card-title">Edit Todo</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('todo.update', [$todo->id]) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                          <label for="title">Todo Tilte</label>
                          <input type="text" class="form-control" id="title" name="title" value="{{$todo->title}}">
                          @error('title')
                          <small id="descehelp" class="form-text text-danger ml-2">* {{$message}}</small>
                          @enderror

                        </div>
                        <div class="form-group">
                          <label for="desc">Description</label>
                          <textarea class="form-control" id="desc" name="desc" style="height: 150px">{{$todo->description}}</textarea>
                            @error('desc')
                            <small id="descehelp" class="form-text text-danger ml-2">* {{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Todo</button>
                      </form>
                </div>
            </div>
        </div>
    </div>

@endsection
