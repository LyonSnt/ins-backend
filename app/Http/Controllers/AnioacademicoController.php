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

    public function crearAnioacademico(StoreAnioacademicoRequest $request)
    {
        /*         $crear = Anioacademico::create($request->all());
        return response()->json($crear, status: 200); */

        $crear = new Anioacademico();
        $crear->ani_anio = $request->input('aniov');  //ESTO ES CUANDO LA VARIABLE NO ES LO MISMO QUE LA DE BASE DE DATOS
        $crear->save();
    }

    public function listarAnioacademico()
    {
        $listar = Anioacademico::get();
        return response()->json($listar, status: 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnioacademicoRequest  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anioacademico  $anioacademico
     * @return \Illuminate\Http\Response
     */
    public function buscarAnioacademicoPorId(Anioacademico $anioacademico, $id)
    {
        $buscar = Anioacademico::find($id);
        if (is_null($buscar)) {
            return response()->json(['msg' => 'No se encuentra el registro', 'success' => false], 404);
        }
        return response()->json([
            'msg' => "Datos encontrados correctamente",
            'success' => true,
            'datol' => $buscar
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anioacademico  $anioacademico
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnioacademicoRequest  $request
     * @param  \App\Models\Anioacademico  $anioacademico
     * @return \Illuminate\Http\Response
     */
    public function editarAnioacademico(UpdateAnioacademicoRequest $request, Anioacademico $anioacademico, $id)
    {
        $editar = Anioacademico::find($id);
        if (is_null($editar)) {
            return response()->json(['msg' => 'No se encuentra el registro'], status: 404);
        }
        $editar->update($request->all());
        //  return response($sexo, status: 200);
        return response()->json([
            'msg' => "Actualizado correctamente",
            'success' => true,
            'datol' => $editar
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anioacademico  $anioacademico
     * @return \Illuminate\Http\Response
     */
    public function eliminarAnioacademico(Anioacademico $anioacademico, $id)
    {
        $eliminar = Anioacademico::find($id);
        $eliminar->delete();
        // return response()->json(null, status: 204);
        return response()->json([
            'msg' => "Eliminado correctamente",
            'success' => true,
            'datol' => $eliminar
        ], 200);
    }
}
