<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Http\Requests\StoreMatriculaRequest;
use App\Http\Requests\UpdateContadorRequest;
use App\Http\Requests\UpdateMatriculaRequest;
use App\Models\Contador;
use App\Models\Estudiante;
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

    public function listarMatriculaLegalizar()
    {
        $listar = DB::select("SELECT m.id, e.id as idest, m.asg_id, e.est_cedula, e.est_nombre as nombre, e.est_apellido as ape,
        a.asg_nombre, m.mes_id, me.mes_nombre, m.ani_id, ani.ani_anio, m.mtr_estado
        FROM tblmatricula m
        left join tblestudiante e
        on m.est_id = e.id
        left join tblasignatura a
        on m.asg_id = a.id
        left join tblmes me
        on m.mes_id = me.id
        left join tblanioacademico ani
        on m.ani_id = ani.id
        where mtr_estado = 0");
        //  return response($listar, status: 200);
        return response()->json($listar, status: 200);
    }
    public function listarMatriculaLegalizado()
    {
        $listar = DB::select("SELECT m.id, e.id as idest, m.asg_id, e.est_cedula, e.est_nombre as nombre, e.est_apellido as ape,
        a.asg_nombre, m.mes_id, me.mes_nombre, m.ani_id, ani.ani_anio, m.mtr_estado, n.id as nivid
        FROM tblmatricula m
        left join tblestudiante e
        on m.est_id = e.id
        left join tblasignatura a
        on m.asg_id = a.id
        left join tblmes me
        on m.mes_id = me.id
        left join tblanioacademico ani
        on m.ani_id = ani.id
        left join tblnivel n
		on a.niv_id = n.id
        where mtr_estado = 1");
        //  return response($listar, status: 200);
        return response()->json($listar, status: 200);
    }

    public function filtrarParaMatricular(Request $request)
    {
        $listar = Matricula::filtrarParaMatricularPro($request->buscar);
        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamente',
            'data' => $listar
        ], status: 200);
    }









    public function buscarmatricula2(Request $request)
    {
        $listar = Matricula::buscarmatricula($request->buscar);
        return response()->json([
            'data' => $listar
        ], status: 200);
    }

    public function listarParaMatricular()
    {
        $listar = DB::select("SELECT m.id, e.id as idest, m.asg_id, e.est_cedula, e.est_nombre as nombre, e.est_apellido as ape,
        a.asg_nombre, m.mes_id, me.mes_nombre, m.ani_id, ani.ani_anio, m.mtr_estado, n.id as nivid
        FROM tblmatricula m
        left join tblestudiante e
        on m.est_id = e.id
        left join tblasignatura a
        on m.asg_id = a.id
        left join tblmes me
        on m.mes_id = me.id
        left join tblanioacademico ani
        on m.ani_id = ani.id
        left join tblnivel n
		on a.niv_id = n.id");
        //  return response($listar, status: 200);
        return response()->json($listar, status: 200);
    }

    public function buscarMatriculaEstudiantePorId(Matricula $matricula, $id)
    {
        $buscarMatricula = DB::select("SELECT m.id, e.id as idest, m.asg_id, e.est_cedula, e.est_nombre as nombre, e.est_apellido as ape,
        a.asg_nombre, m.mes_id, me.mes_nombre, m.ani_id, ani.ani_anio, m.mtr_estado,n.id as nivid
        FROM tblmatricula m
        left join tblestudiante e
        on m.est_id = e.id
        left join tblasignatura a
        on m.asg_id = a.id
        left join tblmes me
        on m.mes_id = me.id
        left join tblanioacademico ani
        on m.ani_id = ani.id
        left join tblnivel n
		on a.niv_id = n.id
        where m.id= $id");
        return response()->json($buscarMatricula, status: 200);
    }

    public function legalizarMatricula(UpdateMatriculaRequest $request, Matricula $matricula, $id)
    {
        /*    $editar = Matricula::where('est_id', $id);
        if (is_null($editar)) {
            return response()->json(['msg' => 'No se encuentra el registro'], status: 404);
        }
        $editar->update($request->all());
        //  return response($sexo, status: 200);
        return response()->json([
            'msg' => "Actualizado correctamente",
            'success' => true,
            'datol' => $editar
        ], 200); */
    }
    public function legalizarMatricula2(UpdateMatriculaRequest $request, Matricula $matricula, $id)
    {
        $editar = Matricula::find($id);
        if (is_null($editar)) {
            return response()->json(['msg' => 'No se encuentra el registro'], status: 404);
        }
        $editar->asg_id = $request->input('asg_idv');
        $editar->mes_id = $request->input('mes_idv');
        $editar->ani_id = $request->input('ani_idv');
        $editar->mtr_estado = $request->input('mtr_estadov');
        if ($editar->save()) {
            $crearNota = new Nota();
            $crearNota->est_id = $request->input('idv');
            $crearNota->mtr_id = $request->input('mtr_id');
            $crearNota->asg_id = $request->input('asg_idv');
            $crearNota->ani_id = $request->input('ani_idv');
            $crearNota->save();
            return response()->json(['res' => true, 'msg' => 'Creado con éxito'], 201);
        } else {
            return response()->json(['res' => true, 'msg' => 'Error al crear'], 500);
        }
    }
    public function legalizarMatricula2RESPALDO(UpdateMatriculaRequest $request, Matricula $matricula, $id)
    {
        $editar = Matricula::find($id);
        if (is_null($editar)) {
            return response()->json(['msg' => 'No se encuentra el registro'], status: 404);
        }
        $editar->asg_id = $request->input('asg_idv');
        $editar->mes_id = $request->input('mes_idv');
        $editar->ani_id = $request->input('ani_idv');
        $editar->mtr_estado = $request->input('mtr_estadov');
        $editar->save();
        return response()->json([
            'msg' => "Actualizado correctamente",
            'success' => true,
            'datol' => $editar
        ], 200);
    }

    public function buscarMatriculaEstudiantePorId2(Matricula $matricula, $id)
    {
        $buscarMatricula = Matricula::find($id);
        return response()->json($buscarMatricula, status: 200);
    }



    public function index()
    {
        $listar = Matricula::all();
        return response($listar, status: 200); //ASI ES MEJOR PARA VISUALIZAR TODOS LOS DATOS EN ANGULAR

    }

    public function buscarMatriculaEstudiantePorId3323(Request $request, $id)
    {
        // $busqueda = $request->buscar;
        /*    $actualizar = Matricula::find($id);
        if (is_null($actualizar)){
            return response()->json(['message' => 'No se encuentra el registro'], status: 404);
        } */
        $buscarEstudiante = DB::select("SELECT m.id, e.id as esid, e.est_cedula, e.est_nombre as nombre,
        e.est_apellido, m.mtr_estado, e.est_imagen
                FROM tblmatricula m
                inner join tblestudiante e
                on m.est_id = e.id
                where e.id = $id");
        //return response($buscarEstudiante, status: 200);
        return response()->json($buscarEstudiante, status: 200);
        // return response()->json(['datol' => $listar], status: 200);
        // return response()->json(['data' => $listar], status: 200);
    }























    public function buscarEstudiantePorId4(Estudiante $estudiante, $id)
    {
        $buscarEstudiante = Estudiante::find($id);
        return response()->json($buscarEstudiante, status: 200);
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
        ani.ani_anio, m.mtr_estado, n.niv_descripcion, t.tri_descripcion
        FROM tblmatricula m
        inner join tblestudiante e
        on m.est_id = e.id
        inner join tblasignatura a
        on m.asg_id = a.id
        inner join tblmes me
        on m.mes_id = me.id
        inner join tblanioacademico ani
        on m.ani_id = ani.id
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
    public function crearMatricula2(StoreMatriculaRequest $request)
    {
        $crear = Matricula::create($request->all());
        if ($crear) {
            // $crearNota = Nota::create($request->all());
            $crearNota = new Nota();
            $crearNota->est_id = $request->input('est_id');
            $crearNota->mtr_id = $request->input('mtr_id');
            $crearNota->asg_id = $request->input('asg_id');
            $crearNota->ani_id = $request->input('ani_id');
            $crearNota->save();
            return response()->json(['res' => true, 'msg' => 'Creado con éxito'], 201);
        } else {
            return response()->json(['res' => true, 'msg' => 'Error al crear'], 500);
        }
    }

    public function crearMatricula(StoreMatriculaRequest $request)
    {
        $crear = new Matricula();
        $crear->est_id = $request->input('idv');
        $crear->asg_id = $request->input('asg_idv');
        $crear->mes_id = $request->input('mes_idv');
        $crear->ani_id = $request->input('ani_idv');

        if ($crear->save()) {

            $crearNota = new Nota();
            $crearNota->est_id = $request->input('idv');
            $crearNota->mtr_id = $request->input('mtr_id');
            $crearNota->asg_id = $request->input('asg_idv');
            $crearNota->ani_id = $request->input('ani_idv');
            $crearNota->save();

            Contador::where('id', 2)
                ->update([
                    'con_contador' => $request->input('mtr_id')
                ]);

            return response()->json(['res' => true, 'msg' => 'Creado con éxito'], 201);
        } else {
            return response()->json(['res' => true, 'msg' => 'Error al crear'], 500);
        }
    }

    public function crearMatricula46(UpdateMatriculaRequest $request, Matricula $matricula, $id)
    {
        $editar = Matricula::find($id);
        if (is_null($editar)) {
            return response()->json(['msg' => 'No se encuentra el registro'], status: 404);
        }
        $editar->asg_id = $request->input('asg_idv');
        $editar->mes_id = $request->input('mes_idv');
        $editar->ani_id = $request->input('ani_idv');
        $editar->mtr_estado = $request->input('mtr_estadov');
        if ($editar->save()) {
            $crearNota = new Nota();
            $crearNota->est_id = $request->input('idv');
            $crearNota->mtr_id = $request->input('mtr_id');
            $crearNota->asg_id = $request->input('asg_idv');
            $crearNota->ani_id = $request->input('ani_idv');
            $crearNota->save();


            return response()->json(['res' => true, 'msg' => 'Creado con éxito'], 201);
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
    public function eliminarMatricula(Matricula $matricula, $id)
    {
        $eliminar = Matricula::find($id);
        $eliminar->delete();
        return response()->json([
            'message' => "Eliminado Correctamente",
            'success' => true,
            'datosl' => $eliminar
        ], 200);
    }
}
