<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::paginate(5);
        
        if(request('pesquisa') != null) {
            if(trim(request('pesquisa')) != "") {
                $states = State::where('nome', 'like', '%' . request('pesquisa') . '%')->paginate(2);
            }
        }

        return view('state.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('state.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'nome' => 'required', 
            'uf'   => 'required'
        ]);

        State::create($valid);

        return redirect('/states')->with(
            'success' => 'O estado foi cadastrado com sucesso!'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        return view("state.create", compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $valid = $request->validate([
            'nome' => 'required', 
            'uf'   => 'required'
        ]);

        $state->fill($valid);
        $state->save();

        return redirect('/states')->with([
            'success' => 'O estado foi atualizado com sucesso!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();

        return redirect('/states')->with([
            'success' => 'Removido com sucesso!'
        ]);
    }

    /**
     * View onde se confirma uma exclusão
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function confirm(State $state)
    {
        return view("state.confirm", compact('state'));
    }
}
