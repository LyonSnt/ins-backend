<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Http\Requests\StoreMatriculaRequest;
use App\Http\Requests\UpdateMatriculaRequest;
use Illuminate\Http\Request;
use App\Models\Nota;
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

    public function matricula23(Request $request, $id)
    {
        // $busqueda = $request->buscar;
        /*    $actualizar = Matricula::find($id);
        if (is_null($actualizar)){
            return response()->json(['message' => 'No se encuentra el registro'], status: 404);
        } */
        $listar = DB::select("SELECT m.id, e.est_nombre as nombre, e.est_apellido as ape, a.asg_nombre, me.mes_nombre,
        ani.ani_anio, au.aul_nombre, m.mtr_estado, n.niv_descripcion, t.tri_descripcion,
        p.pro_nombre, p.pro_apellido, p.pro_imagen, p.pro_celular
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
        where e.id = $id");
        return response($listar, status: 200);
        // return response()->json(['data' => $listar], status: 200);
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

    public function buscarmatriculaHn(Request $request)
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
        and m.ani_id = 1
        where e.est_nombre ILIKE '%$busqueda%'
        or e.est_apellido ILIKE '%$busqueda%'
        order by m.id");
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMatriculaRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function ultimoDatoMatricula()
    {
        $data = Matricula::latest('id')->first();
        $ultimodato = $data->id + 1;
        /*  return response($ultimodato, status: 200); */
        // return ['status' => true, 'msg' => 'Ok', 'datol' => $ultimodato];

        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamnte',
            'datoDesdeLaravel' => $ultimodato
        ], 200);

        /*  return response()->json(['ultimodato' => $ultimodato], status: 200); */

        /*    $lastRecordDate = Matricula::all()->sortByDesc('created_at')->take(1)->toArray();
        return ['status' => true, 'message' => 'Guardado correctamente', 'dato' => $lastRecordDate]; */
    }
    public function crearMatricula(StoreMatriculaRequest $request)
    {
        $crear = Matricula::create($request->all());
        $lastInsertedId = $crear->id;
        if ($crear) {
           // $crearNota = Nota::create($request->all());
            $crearNota = new Nota();
            $crearNota->est_id = $request->input('est_id');
            $crearNota->mtr_id = $request->input('mtr_id');
            $crearNota->asg_id = $request->input('asg_id');
            $crearNota->ani_id = $request->input('ani_id');
           // $crearNota->password = bcrypt($request->input('est_contra'));
            $crearNota->save();
            return response()->json(['res' => true, 'msg' => 'Creado con éxito', 'datol' => $lastInsertedId], 201);
        } else {
            return response()->json(['res' => true, 'msg' => 'Error al crear'], 500);
        }
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
