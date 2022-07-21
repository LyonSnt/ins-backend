<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Http\Requests\StoreNotaRequest;
use App\Http\Requests\UpdateNotaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function buscarNotaPorId(Request $request, $id)
    {
        $listar = DB::select("SELECT nt.id, m.id, e.est_nombre as nombre, e.est_apellido as ape, a.asg_nombre, me.mes_nombre,
        ani.ani_anio, au.aul_nombre, m.mtr_estado, n.id as nivid, n.niv_descripcion, t.tri_descripcion,
        p.pro_nombre, p.pro_apellido, p.pro_imagen, p.pro_celular,
        nt.nota1, nt.nota2, nt.nota3, nt.nota4,SUM(COALESCE(nt.nota1+nt.nota2+nt.nota3+nt.nota4)) as s1,
        SUM(COALESCE(nt.nota1+nt.nota2+nt.nota3+nt.nota4)/4) as promedio, nt.aprobo
        FROM tblnota nt
        inner join tblmatricula m
        on nt.mtr_id = m.id
        inner join tblestudiante e
        on nt.est_id = e.id
        inner join tblasignatura a
        on nt.asg_id = a.id
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
        where e.id = $id
        group by nt.id, m.id, nombre, ape, a.asg_nombre, me.mes_nombre,
ani.ani_anio, au.aul_nombre, m.mtr_estado, nivid, n.niv_descripcion, t.tri_descripcion,
p.pro_nombre, p.pro_apellido, p.pro_imagen, p.pro_celular");
        //WHERE LastName LIKE '%ssa%'
        return response($listar, status: 200);
        // return response()->json(['data' => $listar], status: 200);
    }

    public function listarNota(Request $request)
    {
        $listar = DB::select("SELECT nt.id as notidlav, m.id, e.est_nombre as nombre, e.est_apellido as ape, a.asg_nombre, me.mes_nombre,
        ani.ani_anio, au.aul_nombre, m.mtr_estado, n.id as nivid, n.niv_descripcion, t.tri_descripcion,
        p.pro_nombre, p.pro_apellido, p.pro_imagen, p.pro_celular,
        nt.nota1, nt.nota2, nt.nota3, nt.nota4,SUM(COALESCE(nt.nota1+nt.nota2+nt.nota3+nt.nota4)) as s1,
        SUM(COALESCE(nt.nota1+nt.nota2+nt.nota3+nt.nota4)/4) as promedio, nt.aprobo
        FROM tblnota nt
        inner join tblmatricula m
        on nt.mtr_id = m.id
        inner join tblestudiante e
        on nt.est_id = e.id
        inner join tblasignatura a
        on nt.asg_id = a.id
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
        group by nt.id, m.id, nombre, ape, a.asg_nombre, me.mes_nombre,
ani.ani_anio, au.aul_nombre, m.mtr_estado, nivid, n.niv_descripcion, t.tri_descripcion,
p.pro_nombre, p.pro_apellido, p.pro_imagen, p.pro_celular");
        //WHERE LastName LIKE '%ssa%'
        return response($listar, status: 200);
        // return response()->json(['data' => $listar], status: 200);
    }
    public function listarNota2(Request $request, $id, $id2)
    {
        $listar = DB::select("SELECT nt.id as notidlav, m.id, e.est_nombre as nombre, e.est_apellido as ape, a.asg_nombre, me.mes_nombre,
        ani.ani_anio, au.aul_nombre, m.mtr_estado, n.id as nivid, n.niv_descripcion, t.tri_descripcion, t.id as triid,
        p.pro_nombre, p.pro_apellido, p.pro_imagen, p.pro_celular,
        nt.nota1, nt.nota2, nt.nota3, nt.nota4,SUM(COALESCE(nt.nota1+nt.nota2+nt.nota3+nt.nota4)) as s1,
        SUM(COALESCE(nt.nota1+nt.nota2+nt.nota3+nt.nota4)/4) as promedio, nt.aprobo
        FROM tblnota nt
        inner join tblmatricula m
        on nt.mtr_id = m.id
        inner join tblestudiante e
        on nt.est_id = e.id
        inner join tblasignatura a
        on nt.asg_id = a.id
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
        where n.id = $id
        and t.id = $id2
        group by nt.id, m.id, t.id,nombre, ape, a.asg_nombre, me.mes_nombre,
ani.ani_anio, au.aul_nombre, m.mtr_estado, nivid, n.niv_descripcion, t.tri_descripcion,
p.pro_nombre, p.pro_apellido, p.pro_imagen, p.pro_celular");
        //WHERE LastName LIKE '%ssa%'
        return response($listar, status: 200);
        // return response()->json(['data' => $listar], status: 200);
    }


    /*  public function listarNota(Request $request)
    {
        $comunidad = Nota::get();
        return response()->json($comunidad, status: 200);
    } */

    public function actualizarNota(UpdateNotaRequest $request, Nota $nota, $id)
    {
        //

        $nota = Nota::find($id);
        if (is_null($nota)) {
            return response()->json(['message' => 'Nose encuentra el registro'], status: 404);
        }
        $nota->update($request->all());
        //  return response($sexo, status: 200);
        return response()->json(['message' => "Actualizado Correctamente", 'success' => true, $nota], status: 200);
    }

    public function actualizarNota2(UpdateNotaRequest $request, Nota $nota, $id)
    {
        $crearNota = new Nota();
        $crearNota->nota1 = $request->input('nota1');
        /*         $crearNota->mtr_id = $request->input('mtr_id');
        $crearNota->asg_id = $request->input('asg_id');
        $crearNota->ani_id = $request->input('ani_id'); */
        // $crearNota->password = bcrypt($request->input('est_contra'));
        $lo = $crearNota->save();

        if ($lo) {
            return response()->json(['res' => true, 'msg' => 'Creado con éxito'], 201);
        } else {
            return response()->json(['res' => true, 'msg' => 'Error al crear'], 500);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotaRequest  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotaRequest $request, Nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
    }
}
