<?php

namespace App\Http\Controllers;

use App\Models\Mes;
use App\Http\Requests\StoreMesRequest;
use App\Http\Requests\UpdateMesRequest;

class MesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listar = Mes::get();
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
     * @param  \App\Http\Requests\StoreMesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMesRequest $request)
    {
        $crear = Mes::create($request->all());
        return response()->json($crear, status: 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mes  $mes
     * @return \Illuminate\Http\Response
     */
    public function show(Mes $mes, $id)
    {
        $buscar = Mes::find($id);
        return response()->json($buscar, status: 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mes  $mes
     * @return \Illuminate\Http\Response
     */
    public function edit(Mes $mes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMesRequest  $request
     * @param  \App\Models\Mes  $mes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMesRequest $request, Mes $mes, $id)
    {
        $actualizar = Mes::find($id);
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
     * @param  \App\Models\Mes  $mes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mes $mes, $id)
    {
        $eliminar = Mes::find($id);
        $eliminar->delete();
       // return response()->json(null, status: 204);
       return response()->json(['message' => "Eliminado Correctamente",'success' => true,$eliminar], status: 204);

    }
}
