<?php

namespace App\Http\Controllers;

use App\Models\Anioacademico;
use App\Http\Requests\StoreAnioacademicoRequest;
use App\Http\Requests\UpdateAnioacademicoRequest;

class AnioacademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listar = Anioacademico::get();
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
     * @param  \App\Http\Requests\StoreAnioacademicoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnioacademicoRequest $request)
    {
        $crear = Anioacademico::create($request->all());
        return response()->json($crear, status: 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anioacademico  $anioacademico
     * @return \Illuminate\Http\Response
     */
    public function show(Anioacademico $anioacademico, $id)
    {
        $buscar = Anioacademico::find($id);
        return response()->json($buscar, status: 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anioacademico  $anioacademico
     * @return \Illuminate\Http\Response
     */
    public function edit(Anioacademico $anioacademico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnioacademicoRequest  $request
     * @param  \App\Models\Anioacademico  $anioacademico
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnioacademicoRequest $request, Anioacademico $anioacademico, $id)
    {
        $actualizar = Anioacademico::find($id);
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
     * @param  \App\Models\Anioacademico  $anioacademico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anioacademico $anioacademico, $id)
    {
        $eliminar = Anioacademico::find($id);
        $eliminar->delete();
       // return response()->json(null, status: 204);
        return response()->json(['message' => "Eliminado Correctamente",'success' => true,$eliminar], status: 204);

    }
}
