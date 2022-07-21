<?php

namespace App\Http\Controllers;

use App\Models\Comunidad;
use App\Http\Requests\StoreComunidadRequest;
use App\Http\Requests\UpdateComunidadRequest;
use Illuminate\Http\Request;

class ComunidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunidad = Comunidad::get();
        return response()->json($comunidad, status: 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreComunidadRequest $request)
    {
        //

    $crear = Comunidad::create($request->all());
        return response()->json($crear, status: 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreComunidadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComunidadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function show(Comunidad $comunidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Comunidad $comunidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComunidadRequest  $request
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComunidadRequest $request, Comunidad $comunidad,$id)
    {
        //

        $comunidad = Comunidad::find($id);
        if (is_null($comunidad)) {
            return response()->json(['message' => 'Nose encuentra el registro'], status: 404);
        }
        $comunidad->update($request->all());
        //  return response($sexo, status: 200);
        return response()->json(['message' => "Actualizado Correctamente", 'success' => true, $comunidad], status: 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunidad $comunidad, $id)
    {
        //
        $note = Comunidad::find($id);
        $note->delete();
        return response()->json($note, status: 200);
    }
}
