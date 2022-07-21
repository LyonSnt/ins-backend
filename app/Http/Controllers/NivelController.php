<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use App\Http\Requests\StoreNivelRequest;
use App\Http\Requests\UpdateNivelRequest;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listar = Nivel::get();
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
     * @param  \App\Http\Requests\StoreNivelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNivelRequest $request)
    {
        $crear = Nivel::create($request->all());
        return response()->json($crear, status: 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function show(Nivel $nivel, $id)
    {
        $buscar = Nivel::find($id);
        return response()->json($buscar, status: 200);

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function edit(Nivel $nivel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNivelRequest  $request
     * @param  \App\Models\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNivelRequest $request, Nivel $nivel, $id)
    {
        $actualizar = Nivel::find($id);
        if (is_null($actualizar)) {
            return response()->json(['message' => 'No se encuentra el registro'], status: 404);
        }
        $actualizar->update($request->all());
        //  return response($sexo, status: 200);
        return response()->json(['message' => "Actualizado Correctamente", 'success' => true, $actualizar], status: 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nivel $nivel, $id)
    {
        $eliminar = Nivel::find($id);
        $eliminar->delete();
       // return response()->json(null, status: 204);
        return response()->json(['message' => "Eliminado Correctamente",'success' => true,$eliminar], status: 204);

    }
}
