<?php

namespace App\Http\Controllers;

use App\Models\Sexo;
use App\Http\Requests\StoreSexoRequest;
use App\Http\Requests\UpdateSexoRequest;
use Illuminate\Http\Request;

class SexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listar = Sexo::get();
        return response()->json($listar, status: 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

    $crear = Sexo::create($request->all());
    return response()->json($crear, status: 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSexoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSexoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function show(Sexo $sexo, $id)
    {
        //
        $prueba3 = Sexo::find($id);
        return response()->json($prueba3, status: 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function edit(Sexo $sexo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSexoRequest  $request
     * @param  \App\Models\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSexoRequest $request, Sexo $sexo, $id)
    {
        //
        $sexo = Sexo::find($id);
        if(is_null($sexo)){
            return response()->json(['message' => 'Nose encuentra el registro'], status: 404);
        }
        $sexo->update($request->all());
      //  return response($sexo, status: 200);
        return response()->json(['message' => "Actualizado Correctamente",'success' => true,$sexo], status: 200);

    /*     $prueba3['sex_descripcion'] = $request['sex_descripcion'];
        Sexo::find($id)->update($prueba3);
        return response()->json([
            'message' => "Successfully updated",
            'success' => true
        ], 200); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sexo $sexo, $id)
    {
        //
        $eliminar = Sexo::find($id);
        $eliminar->delete();
        return response()->json(null, status: 204);
    }
}
