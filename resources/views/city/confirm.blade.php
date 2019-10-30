@extends('layouts.tads')

@section('title')
    Confirmar Exclusão
@endsection

@section("main")
    <h1>Excluir Cidade</h1>
    
    <h2>Deseja realmente excluir {{$city->nome}}?</h2>
    <form action="{{route('cities.destroy', ['city' => $city->id])}}" method="post" class="mx-1">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Sim</button>
    </form>
@endsection
