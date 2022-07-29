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

    public function crearIglesia(StoreIglesiaRequest $request)
    {
        $crearNota = new Iglesia();
        $crearNota->igl_nombre = $request->input('igl_nombrev');
        $crearNota->igl_direccion = $request->input('igl_direccionv');
        $crearNota->igl_telefono = $request->input('igl_telefonov');
        $crearNota->igl_correo = $request->input('igl_correov');
        if ($crearNota->save()) {
            return response()->json(['res' => true, 'msg' => 'Creado con éxito'], 201);
        } else {
            return response()->json(['res' => true, 'msg' => 'Error al crear'], 500);
        }
    }

    public function listarIglesia()
    {
        $listar = Iglesia::get();
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
     * @param  \App\Http\Requests\StoreIglesiaRequest  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Iglesia  $iglesia
     * @return \Illuminate\Http\Response
     */
    public function buscarIglesiaPorId(Iglesia $iglesia, $id)
    {
        $buscar = Iglesia::find($id);
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
     * @param  \App\Models\Iglesia  $iglesia
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIglesiaRequest  $request
     * @param  \App\Models\Iglesia  $iglesia
     * @return \Illuminate\Http\Response
     */
    public function editarIglesia(UpdateIglesiaRequest $request, Iglesia $iglesia, $id)
    {
        $editar = Iglesia::find($id);
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
     * @param  \App\Models\Iglesia  $iglesia
     * @return \Illuminate\Http\Response
     */
    public function eliminarIglesia(Iglesia $iglesia, $id)
    {
        $eliminar = Iglesia::find($id);
        $eliminar->delete();
        // return response()->json(null, status: 204);
        return response()->json([
            'msg' => "Eliminado correctamente",
            'success' => true,
            'datol' => $eliminar
        ], 200);
    }
}
