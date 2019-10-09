@extends('layouts.tads')

@section('title')
    Confirmar Exclusão
@endsection

@section("main")
    <h1>Excluir Estado</h1>
    
    <h2>Deseja realmente excluir estado {{$state->nome}}?</h2>
    <form action="{{route('states.destroy', ['state' => $state->id])}}" method="post" class="mx-1">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Sim</button>
    </form>
@endsection
