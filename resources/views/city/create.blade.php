@extends('layouts.tads')

@section('title')
    Cadastro de Cidade
@endsection

@section("main")

    <a href="{{route('cities.index')}}" class="btn btn-warning text-light btn-sm">Voltar</a>
    <hr>

    <form method="post"
        @isset($city)
            action="{{route('cities.update', ['city' => $city->id])}}"
        @else
            action="{{route('cities.store')}}"
        @endif
    >
        @csrf

        @isset($city)
            @method('put')
        @endif
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="col-6">
                        <label>Estado</label>
                        <select name="state_id" class="form-control">
                            @isset($states)
                                @foreach($states as $state)
                                    <option
                                        @if(isset($city) && $city->state() && $state->id == $city->state->id)
                                            selected
                                        @endif 
                                        value="{{$state->id}}"
                                    >{{$state->nome}}</option>
                                @endforeach
                            @else
                                @isset($city)
                                    <option selected value="{{$city->state->id}}">{{$city->state->nome}}</option>
                                @endif
                            @endif
                        </select>
                    </div>
                    <div class="col-6">
                        <label>Nome da Cidade</label>
                        <input type="text" name="nome" placeholder="Nome da Cidade" class="form-control"
                            @isset($city)
                                value="{{$city->nome}}"
                            @endif
                        >
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-success my-3">Salvar</button>
    </form>

    @if($errors->any())
        @foreach($errors->all() as $er)
            <div class="alert alert-danger">{{$er}}</div>
        @endforeach
    @endif

@endsection
