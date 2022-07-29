<?php

namespace App\Http\Controllers;

use App\Models\Contador;
use App\Http\Requests\StoreContadorRequest;
use App\Http\Requests\UpdateContadorRequest;

class ContadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarContadorEstudiante()
    {
        $listar = Contador::where('id', 1)->get();
        return response()->json($listar, status: 200);
    }
    public function listarContadorMatricula()
    {
        $listar = Contador::where('id', 2)->get();
        return response()->json($listar, status: 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContadorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContadorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contador  $contador
     * @return \Illuminate\Http\Response
     */
    public function show(Contador $contador)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contador  $contador
     * @return \Illuminate\Http\Response
     */
    public function edit(Contador $contador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContadorRequest  $request
     * @param  \App\Models\Contador  $contador
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContadorRequest $request, Contador $contador, $id)
    {
        //
/*
        $crearContador = Contador::find($id);
        $crearContador->con_con = $request->input('con_contadorv');
        $crearContador->save(); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contador  $contador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contador $contador)
    {
        //
    }
}
