@extends('Todo.layout.app')
@section('customCss')
.fabutton {
    background: none;
    padding: 0px;
    border: none;
}
@endsection
@section('title' , "All Todos")

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="card" style="width: 80%;">
                <div class="card-header  text-center">
                <h5 class="card-title">All Todos</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse ($todos as $todo)
                        <li class="list-group-item">{{$todo->title}}
                            <span class="float-right">
                                <form action="{{ route('todo.destroy', [$todo->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="fabutton"><i class="far fa-trash-alt" style="color: red;"></i></button>
                                </form>
                            </span>
                            <span class="float-right">
                                <a href="{{ route('todo.edit', [$todo->id]) }}">
                                    <i class="fas fa-edit mr-2 ml-2" style="color: rgb(88, 235, 83)"></i>
                                </a>
                            </span>
                            <span class="float-right">
                                <a href="{{ route('todo.show', [$todo->id]) }}">
                                    <i class="fas fa-eye" style="color: rgb(43, 229, 236)"></i>
                                </a>
                            </span>
                            @if (!$todo->completed)
                            <span class="float-right">
                                <a href="{{ route('todo.complete', [$todo->id]) }}">
                                    <i class="far fa-check-circle mr-2" style="color: rgb(67, 192, 88)"></i>
                                </a>
                            </span>
                            @endif
                        </li>
                        @empty
                            <h1 class="text-center">No Todos </h1>
                        @endforelse
                    </ul>
                </div>

            </div>
        </div>
    </div>

@endsection

