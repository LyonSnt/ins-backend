<?php

namespace App\Http\Controllers;

use App\Models\Estadocivil;
use App\Http\Requests\StoreEstadocivilRequest;
use App\Http\Requests\UpdateEstadocivilRequest;

class EstadocivilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listar = Estadocivil::get();
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
     * @param  \App\Http\Requests\StoreEstadocivilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstadocivilRequest $request)
    {
        //
        $crear = Estadocivil::create($request->all());
        return response()->json($crear, status: 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estadocivil  $estadocivil
     * @return \Illuminate\Http\Response
     */
    public function show(Estadocivil $estadocivil, $id)
    {
        //

        $buscar = Estadocivil::find($id);
        return response()->json($buscar, status: 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estadocivil  $estadocivil
     * @return \Illuminate\Http\Response
     */
    public function edit(Estadocivil $estadocivil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstadocivilRequest  $request
     * @param  \App\Models\Estadocivil  $estadocivil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstadocivilRequest $request, Estadocivil $estadocivil, $id)
    {
        $cargo = Estadocivil::find($id);
        if (is_null($cargo)) {
            return response()->json(['message' => 'No se encuentra el registro'], status: 404);
        }
        $cargo->update($request->all());
        //  return response($sexo, status: 200);
        return response()->json(['message' => "Actualizado Correctamente", 'success' => true, $cargo], status: 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estadocivil  $estadocivil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estadocivil $estadocivil, $id)
    {
        $eliminar = Estadocivil::find($id);
        $eliminar->delete();
       // return response()->json(null, status: 204);
        return response()->json(['message' => "Eliminado Correctamente",'success' => true,$eliminar], status: 204);

    }
}
