<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Http\Requests\StoreCargoRequest;
use App\Http\Requests\UpdateCargoRequest;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function crearCargo(StoreCargoRequest $request)
    {
/*         $crear = Cargo::create($request->all());
        return response()->json($crear, status: 200); */
        $crear = new Cargo();
        $crear->car_descripcion = $request->input('descripcionv');  //ESTO ES CUANDO LA VARIABLE NO ES LO MISMO QUE LA DE BASE DE DATOS
        $crear->save();
    }

    public function listarCargo()
    {
        $listar = Cargo::get();
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
     * @param  \App\Http\Requests\StoreCargoRequest  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function buscarCargoPorId(Cargo $cargo, $id)
    {

        $buscar = Cargo::find($id);
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
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCargoRequest  $request
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function editarCargo(UpdateCargoRequest $request, Cargo $cargo, $id)
    {
        $editar = Cargo::find($id);
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
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function eliminarCargo(Cargo $cargo, $id)
    {
        $eliminar = Cargo::find($id);
        $eliminar->delete();
        // return response()->json(null, status: 204);
        return response()->json([
            'msg' => "Eliminado correctamente",
            'success' => true,
            'datol' => $eliminar
        ], 200);
    }
}
