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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInstitucionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function crearInstitucion(StoreInstitucionRequest $request)
    {
        $crear = new Institucion();
        $crear->ins_nombre = $request->input('ins_nombrev');
        $crear->ins_direccion = $request->input('ins_direccionv');
        $crear->ins_telefono = $request->input('ins_telefonov');
        $crear->ins_correo = $request->input('ins_correov');
        if ($crear->save()) {
            return response()->json(['res' => true, 'msg' => 'Creado con éxito'], 201);
        } else {
            return response()->json(['res' => true, 'msg' => 'Error al crear'], 500);
        }
    }

    public function listarInstitucion()
    {
        $listar = Institucion::get();
        return response()->json($listar, status: 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function buscarInstitucionPorId(Institucion $institucion, $id)
    {
        /*   $buscar = Institucion::findOrFail($id);
        return response()->json($buscar, status: 200); */

        $buscar = Institucion::find($id);
        return response()->json($buscar, status: 200);
      /*   if (is_null($buscar)) {
            return response()->json(['msg' => 'No se encuentra el registro', 'success' => false], 404);
        }
        return response()->json([
            'msg' => "Datos encontrados correctamente",
            'success' => true,
            'datol' => $buscar
        ], 200); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstitucionRequest  $request
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function editarInstitucion(UpdateInstitucionRequest $request, Institucion $institucion, $id)
    {
        $editar = Institucion::find($id);
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
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function eliminarInstitucion(Institucion $institucion, $id)
    {
        $eliminar = Institucion::find($id);
        $eliminar->delete();
        // return response()->json(null, status: 204);
        return response()->json([
            'msg' => "Eliminado correctamente",
            'success' => true,
            'datol' => $eliminar
        ], 200);
    }
}
