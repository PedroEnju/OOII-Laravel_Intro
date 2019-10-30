<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::paginate(5);
        
        if(request('pesquisa') != null) {
            if(trim(request('pesquisa')) != "") {
                $cities = City::where('nome', 'like', '%' . request('pesquisa') . '%')->paginate(2);
            }
        }

        return view('city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = \App\State::all();

        return view('city.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = new City();

        $valid = $request->validate([
            'state_id' => 'required',
            'nome'     => 'required'
        ]);
        $city->fill($valid);

        $state = State::findOrFail($valid["state_id"]);
        $city->state()->associate($state);
        $city->save();

        return redirect('/cities')->with(
            'success', 'A cidade foi cadastrada com sucesso!'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $states = \App\State::all();

        return view('city.create', compact('states', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $valid = $request->validate([
            'state_id' => 'required',
            'nome'     => 'required'
        ]);
        $city->fill($valid);

        $state = State::findOrFail($valid["state_id"]);
        $city->state()->associate($state);
        $city->save();

        return redirect('/cities')->with(
            'success', 'A cidade foi atualizada com sucesso!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect('/cities')->with([
            'success' => 'Removido com sucesso!'
        ]);
    }

    /**
     * View onde se confirma uma exclusão
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function confirm(City $city)
    {
        return view("city.confirm", compact('city'));
    }
}
