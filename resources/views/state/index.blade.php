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
        <div class="d-flex justify-content-center">
            <div class="col-10">
                @foreach($states as $state)
                    <div class="row my-1">
                        <div class="col-9 h4">{{$state->nome}}</div>
                        <div class="col-3">
                            <div class="row">
                                <a href="{{route('states.edit', ['state' => $state->id])}}" class="btn btn-info btn-sm">Editar</a>
                                <a href="{{route('states.confirm', ['state' => $state->id])}}" class="btn btn-danger btn-sm ml-1">Excluir</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="d-flex justify-content-center">{{$states->links()}}</div>
            </div>
                
        </div>      
    @endif
@endsection
