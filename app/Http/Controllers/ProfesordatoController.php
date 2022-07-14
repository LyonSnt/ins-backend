<?php

namespace App\Http\Controllers;

use App\Models\Profesordato;
use App\Http\Requests\StoreProfesordatoRequest;
use App\Http\Requests\UpdateProfesordatoRequest;

class ProfesordatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $listar = Profesordato::get();
        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamnte',
            'data' => $listar
        ], status: 200); */

        $buscar = Profesordato::where('sex_id', 1)
            ->orderBy('pro_apellido')->get();
        return response()->json($buscar, status: 200);
    }

    public function profesorm()
    {
        $buscar = Profesordato::where('sex_id', 2)
            ->orderBy('pro_apellido')->get();
        return response()->json($buscar, status: 200);
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
     * @param  \App\Http\Requests\StoreProfesordatoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfesordatoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesordato  $profesordato
     * @return \Illuminate\Http\Response
     */
    public function show(Profesordato $profesordato, $id)
    {
        $buscarPorId = Profesordato::find($id);
        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamnte',
            'datoDesdeLaravel' => $buscarPorId
        ], 200);
    }

    public function show2(Profesordato $profesordato, $id)
    {
        $buscar = Profesordato::find($id);
        return response()->json($buscar, status: 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesordato  $profesordato
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesordato $profesordato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfesordatoRequest  $request
     * @param  \App\Models\Profesordato  $profesordato
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfesordatoRequest $request, Profesordato $profesordato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesordato  $profesordato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesordato $profesordato)
    {
        //
    }
}
