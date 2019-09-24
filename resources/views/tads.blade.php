@extends('layouts.tads')

@section('title')
    Tads
@endsection

@section('custom-style')
    main {
        color: #FFF;
        background-color: blue;
    }
@endsection

@section("main")
    <h1>TADS - YEP</h1>

    @isset($msg)
        <h2>{{$msg}}</h2>
    @endisset

    <form method="post">
        @csrf
        <button type="submit" class="btn btn-light">Enviar</button>
    </form>
@endsection
