@extends('layouts.tads')

@section('title')
    Lista de Tarefas
@endsection

@section("main")
    <h1>Tarefas</h1>

    <form method="post">
        @csrf
        @method('get')
        <input type="text" name="pesquisa" placeholder="Pesquisar" class="form-control-sm">
        <button type="submit" class="btn btn-sm btn-info">Pesquisar</button>
    </form>

    @isset($tasks)
        @foreach($tasks as $task)
            <h2>{{$task->description}}</h2>
        @endforeach

        <div class="d-flex justify-content-center">{{$tasks->links()}}</div>        
    @endif
@endsection
