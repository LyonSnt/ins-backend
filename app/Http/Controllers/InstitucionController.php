<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use App\Http\Requests\StoreInstitucionRequest;
use App\Http\Requests\UpdateInstitucionRequest;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listar = Institucion::get();
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
     * @param  \App\Http\Requests\StoreInstitucionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstitucionRequest $request)
    {
        $crear = Institucion::create($request->all());
        return response()->json($crear, status: 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function show(Institucion $institucion, $id)
    {
        $buscar = Institucion::find($id);
        return response()->json($buscar, status: 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function edit(Institucion $institucion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstitucionRequest  $request
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstitucionRequest $request, Institucion $institucion, $id)
    {
        $actualizar = Institucion::find($id);
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
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institucion $institucion, $id)
    {
        $eliminar = Institucion::find($id);
        $eliminar->delete();
       // return response()->json(null, status: 204);
       return response()->json(['message' => "Eliminado Correctamente",'success' => true,$eliminar], status: 204);

    }
}
