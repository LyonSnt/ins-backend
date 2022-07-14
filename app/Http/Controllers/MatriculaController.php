<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Http\Requests\StoreMatriculaRequest;
use App\Http\Requests\UpdateMatriculaRequest;
use Illuminate\Http\Request;

use App\Http\Resources\MatriculaResource;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listar = Matricula::all();
        return response($listar, status: 200); //ASI ES MEJOR PARA VISUALIZAR TODOS LOS DATOS EN ANGULAR

    }

    public function buscarmatricula(Request $request)
    {
        $listar = Matricula::buscarmatricula($request->buscar);
        return response()->json([
            'data' => $listar
        ], status: 200);
    }


    public function buscarmatriculaH(Request $request)
    {
        $busqueda = $request->buscar;
        $listar = DB::select("SELECT m.id, e.est_nombre as nombre, e.est_apellido as ape, a.asg_nombre, me.mes_nombre,
        ani.ani_anio, au.aul_nombre, m.mtr_estado
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
        and e.sex_id = 1
        where e.est_nombre ILIKE '%$busqueda%'
        or e.est_apellido ILIKE '%$busqueda%'
        order by m.id");
        //WHERE LastName LIKE '%ssa%'

        return response()->json(['data' => $listar], status: 200);
    }

    public function imprimirmatricula()
    {
        $listar = DB::select("SELECT m.id, e.est_nombre as nombre, e.est_apellido as ape, a.asg_nombre, me.mes_nombre,
        ani.ani_anio, au.aul_nombre, m.mtr_estado, n.niv_descripcion, t.tri_descripcion
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
        and e.sex_id = 1
        order by m.id desc LIMIT 1");
        //WHERE LastName LIKE '%ssa%'

        // return response()->json(['data' => $listar], status: 200);
        return response($listar, status: 200);
    }

    public function buscarmatriculaM(Request $request)
    {
        $busqueda = $request->buscar;
        $listar = DB::select("SELECT m.id, e.est_nombre as nombre, e.est_apellido as ape, a.asg_nombre, me.mes_nombre,
        ani.ani_anio, au.aul_nombre, m.mtr_estado
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
        and e.sex_id = 2
        where e.est_nombre ILIKE '%$busqueda%'
        or e.est_apellido ILIKE '%$busqueda%'
        order by m.id");
        //WHERE LastName LIKE '%ssa%'

        return response()->json(['data' => $listar], status: 200);
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
     * @param  \App\Http\Requests\StoreMatriculaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatriculaRequest $request)
    {


        $crear = Matricula::create($request->all());
        //return response()->json($crear, status: 200);
        if ($crear) {
            return response()->json(['res' => true, 'msg' => 'Creado con éxito'], 201);
        } else {
            return response()->json(['res' => true, 'msg' => 'Error al crear'], 500);
        }
        /*   $crea2 = new Matricula();
        $crea2->est_id = $request->input('est_id');
        $crea2->asg_id = $request->input('asg_id');
        $crea2->mes_id = $request->input('mes_id');
        $crea2->ani_id = $request->input('ani_id');
        $crea2->aul_id = $request->input('aul_id');

        if ($crea2->save()) {
            return ['status' => true, 'message' => 'Guardado correctamente'];
        } else {
            return ['status' => false, 'message' => 'Error al guardar'];
        } */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula, $id)
    {

        $prueba3 = Matricula::find($id);
        return response()->json($prueba3, status: 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatriculaRequest  $request
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatriculaRequest $request, Matricula $matricula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        //
    }
}
