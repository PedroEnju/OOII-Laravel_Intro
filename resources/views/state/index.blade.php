@extends('layouts.tads')

@section('title')
    Lista de Estados
@endsection

@section("main")
    <h1>Estados</h1>
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <a href="{{route('states.create')}}" class="btn btn-success btn-sm">Novo</a>
    <hr>

    <form method="post">
        @csrf
        @method('get')
        <input type="text" name="pesquisa" placeholder="Pesquisar" class="form-control-sm">
        <button type="submit" class="btn btn-sm btn-info">Pesquisar</button>
    </form>

    @isset($states)
        @foreach($states as $state)
            <h2>{{$state->nome}}</h2>
        @endforeach

        <div class="d-flex justify-content-center">{{$states->links()}}</div>        
    @endif
@endsection
