@extends('layouts.tads')

@section('title')
    Cadastro de Estado
@endsection

@section("main")

    <a href="{{route('states.index')}}" class="btn btn-warning text-light btn-sm">Voltar</a>
    <hr>

    <form action="{{route('states.store')}}" method="post">
        @csrf

        <label>Nome do Estado</label>
        <input type="text" name="nome" placeholder="Nome do Estado" class="form-control-sm">
        <label>UF</label>
        <input type="text" name="uf" placeholder="UF" class="form-control-sm">
        <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
    </form>

    @if($errors->any())
        @foreach($errors->all() as $er)
            <div class="alert alert-danger">{{$er}}</div>
        @endforeach
    @endif

@endsection
