<?php

namespace App\Http\Controllers;

use App\Models\Profesordato;
use App\Http\Requests\StoreProfesordatoRequest;
use App\Http\Requests\UpdateProfesordatoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

    public function matriculaEstudiateProfesor(Request $request, $id)
    {
        // $busqueda = $request->buscar;
        /*    $actualizar = Matricula::find($id);
        if (is_null($actualizar)){
            return response()->json(['message' => 'No se encuentra el registro'], status: 404);
        } */
        $listar = DB::select("SELECT m.id, e.est_cedula, e.est_nombre as nombre, e.est_apellido as ape, a.asg_nombre, me.mes_nombre,
        ani.ani_anio, au.aul_nombre, m.mtr_estado, n.niv_descripcion, t.tri_descripcion,t.id as triid,
        p.pro_nombre, p.pro_apellido, p.pro_imagen, p.pro_celular, a.pro_id
        FROM tblmatricula m
        inner join tblestudiante e
        on m.est_id = e.id
        inner join tblasignatura a
        on m.asg_id = a.id
        inner join tblmes me
        on m.mes_id = me.id
        inner join tblanioacademico ani
        on m.ani_id = ani.id
        inner join tblaula au
        on m.aul_id = au.id
        inner join tblnivel n
        on a.niv_id = n.id
        inner join tbltrimestre t
        on a.tri_id = t.id
        inner join tblprofesordato p
        on a.pro_id = p.id
        where a.pro_id = $id");
        return response($listar, status: 200);
        // return response()->json(['data' => $listar], status: 200);
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
