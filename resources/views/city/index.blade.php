@extends('layouts.tads')

@section('title')
    Lista de Cidades
@endsection

@section("main")
    <h1>Cidades</h1>
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <a href="{{route('cities.create')}}" class="btn btn-success btn-sm">Novo</a>
    <hr>

    <form method="post">
        @csrf
        @method('get')
        <input type="text" name="pesquisa" placeholder="Pesquisar" class="form-control-sm">
        <button type="submit" class="btn btn-sm btn-info">Pesquisar</button>
    </form>

    @isset($cities)
        <div class="d-flex justify-content-center">
            <div class="col-10">
                @foreach($cities as $city)
                    <div class="row my-1">
                        <div class="col-9 h4">{{$city->nome}}</div>
                        <div class="col-3">
                            <div class="row">
                                <a href="{{route('cities.edit', ['city' => $city->id])}}" class="btn btn-info btn-sm">Editar</a>
                                <a href="{{route('cities.confirm', ['city' => $city->id])}}" class="btn btn-danger btn-sm ml-1">Excluir</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="d-flex justify-content-center">{{$cities->links()}}</div>
            </div>
                
        </div>      
    @endif
@endsection
