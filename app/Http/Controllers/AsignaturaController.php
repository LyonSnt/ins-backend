<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Http\Requests\StoreAsignaturaRequest;
use App\Http\Requests\UpdateAsignaturaRequest;
use App\Models\Nivel;
use App\Models\Trimestre;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listar = Asignatura::where('sex_id', 1)
            ->orderBy('niv_id')->get();
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

        $listar = Asignatura::all();
        return response()->json($listar, status: 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAsignaturaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAsignaturaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura, $id)
    {
        //
        $buscar = Asignatura::find($id);
        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamnte',
            'data' => $buscar
        ], 200);
    }

    public function show22(Asignatura $asignatura, $id)
    {
        $listar = Asignatura::where('niv_id', $id)
            ->get();
        return response()->json($listar, status: 200);
    }

    public function show23($id)
    {
        $listar = Asignatura::where('niv_id', $id)->get();
        return response()->json($listar, status: 200);
    }

    public function materia(Request $request)
    {
        $niv_id = $request->niv_id;
        //  dd($niv_id);
        $stateModel = Asignatura::where('niv_id', $niv_id)
            ->orderBy('niv_id')->get();
        return response()->json($stateModel);
    }

    public function nivelasgh(Request $request)
    {
        $niv_id = $request->niv_id;
        // $tri_id = $request->tri_id;

        // $sex_id = $request->sex_id;
        $stateModel = Asignatura::where('niv_id', $niv_id)
            // ->where('tri_id', $tri_id)
            ->where('sex_id', 1)->get();
        return response()->json($stateModel);
    }

    public function nivelasgm(Request $request)
    {
        $niv_id = $request->niv_id;
        // $tri_id = $request->tri_id;

        // $sex_id = $request->sex_id;
        $stateModel = Asignatura::where('niv_id', $niv_id)
            // ->where('tri_id', $tri_id)
            ->where('sex_id', 2)->get();
        return response()->json($stateModel);
    }

    public function trimes2(Request $request)
    {
        $tri_id = $request->tri_id;
        $stateModel = Asignatura::where('tri_id', $tri_id)
            ->where('sex_id', 1)->get();
        return response()->json($stateModel);
    }

    /*

 $users = User::select('*')
        ->where('is_active', '=', 1)
        ->where('is_delete', '=', 0)
        ->get();
    */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAsignaturaRequest  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAsignaturaRequest $request, Asignatura $asignatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        //
    }
}
