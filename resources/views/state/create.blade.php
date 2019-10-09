@extends('layouts.tads')

@section('title')
    Cadastro de Estado
@endsection

@section("main")

    <a href="{{route('states.index')}}" class="btn btn-warning text-light btn-sm">Voltar</a>
    <hr>

    <form method="post"
        @isset($state)
            action="{{route('states.update', ['state' => $state->id])}}"
        @else
            action="{{route('states.store')}}"
        @endif
    >
        @csrf

        @isset($state)
            @method('put')
        @endif

        <label>Nome do Estado</label>
        <input type="text" name="nome" placeholder="Nome do Estado" class="form-control-sm"
            @isset($state)
                value="{{$state->nome}}"
            @endif
        >
        <label>UF</label>
        <input type="text" name="uf" placeholder="UF" class="form-control-sm"
            @isset($state)
                value="{{$state->uf}}"
            @endif
        >
        <button type="submit" class="btn btn-sm btn-success">Salvar</button>
    </form>

    @if($errors->any())
        @foreach($errors->all() as $er)
            <div class="alert alert-danger">{{$er}}</div>
        @endforeach
    @endif

@endsection
