<?php

namespace App\Http\Controllers;

use App\Models\Trimestre;
use App\Http\Requests\StoreTrimestreRequest;
use App\Http\Requests\UpdateTrimestreRequest;

class TrimestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listar = Trimestre::get();
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
     * @param  \App\Http\Requests\StoreTrimestreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrimestreRequest $request)
    {
        $crear = Trimestre::create($request->all());
        return response()->json($crear, status: 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trimestre  $trimestre
     * @return \Illuminate\Http\Response
     */
    public function show(Trimestre $trimestre, $id)
    {
        $buscar = Trimestre::find($id);
        return response()->json($buscar, status: 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trimestre  $trimestre
     * @return \Illuminate\Http\Response
     */
    public function edit(Trimestre $trimestre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrimestreRequest  $request
     * @param  \App\Models\Trimestre  $trimestre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrimestreRequest $request, Trimestre $trimestre, $id)
    {
        $actualizar = Trimestre::find($id);
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
     * @param  \App\Models\Trimestre  $trimestre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trimestre $trimestre, $id)
    {
        $eliminar = Trimestre::find($id);
        $eliminar->delete();
       // return response()->json(null, status: 204);
        return response()->json(['message' => "Eliminado Correctamente",'success' => true,$eliminar], status: 204);

    }
}
