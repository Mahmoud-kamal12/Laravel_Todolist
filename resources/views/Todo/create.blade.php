@extends('Todo.layout.app')

@section('title' , "Create")

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="card" style="width: 80%;">
                <div class="card-header  text-center">
                <h5 class="card-title">Add Todo</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('todo.store', []) }}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="form-group">
                          <label for="title">Todo Tilte</label>
                          <input type="text" class="form-control" id="C" name="title">
                          @error('title')
                          <small id="descehelp" class="form-text text-danger ml-2">* {{$message}}</small>
                          @enderror

                        </div>
                        <div class="form-group">
                          <label for="desc">Description</label>
                          <textarea class="form-control" id="desc" name="desc" style="height: 150px"></textarea>
                            @error('desc')
                            <small id="descehelp" class="form-text text-danger ml-2">* {{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add Todo</button>
                      </form>
                </div>
            </div>
        </div>
    </div>

@endsection
