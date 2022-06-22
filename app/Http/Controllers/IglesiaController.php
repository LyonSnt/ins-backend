<?php

namespace App\Http\Controllers;

use App\Models\Iglesia;
use App\Http\Requests\StoreIglesiaRequest;
use App\Http\Requests\UpdateIglesiaRequest;

class IglesiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listar = Iglesia::get();
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
     * @param  \App\Http\Requests\StoreIglesiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIglesiaRequest $request)
    {
        $crear = Iglesia::create($request->all());
        return response()->json($crear, status: 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Iglesia  $iglesia
     * @return \Illuminate\Http\Response
     */
    public function show(Iglesia $iglesia, $id)
    {
        $buscar = Iglesia::find($id);
        return response()->json($buscar, status: 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Iglesia  $iglesia
     * @return \Illuminate\Http\Response
     */
    public function edit(Iglesia $iglesia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIglesiaRequest  $request
     * @param  \App\Models\Iglesia  $iglesia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIglesiaRequest $request, Iglesia $iglesia, $id)
    {
        $actualizar = Iglesia::find($id);
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
     * @param  \App\Models\Iglesia  $iglesia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Iglesia $iglesia, $id)
    {
        $eliminar = Iglesia::find($id);
        $eliminar->delete();
       // return response()->json(null, status: 204);
       return response()->json(['message' => "Eliminado Correctamente",'success' => true,$eliminar], status: 204);

    }
}
