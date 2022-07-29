<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Http\Requests\StoreEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;
use App\Models\Contador;
use App\Models\Matricula;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function crearEstudiante(Request $request)
    {
        $crea2 = new Estudiante();

        if ($request->hasFile('est_imagen')) {

            $completeFilename = $request->file('est_imagen')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFilename, PATHINFO_FILENAME);
            $extenshion = $request->file('est_imagen')->getClientOriginalExtension();
            $compic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = $request->file('est_imagen')->storeAs('public/hoy10', $compic);
            $crea2->est_imagen = $compic;
            $crea2->est_cedula = $request->input('est_cedula');
            $crea2->est_apellido = $request->input('est_apellido');
            $crea2->est_nombre = $request->input('est_nombre');
            $crea2->sex_id = $request->input('sex_id');
            $crea2->esc_id = $request->input('esc_id');
            $crea2->est_fechanacimiento = $request->input('est_fechanacimiento');
            $crea2->est_fechabautismo = $request->input('est_fechabautismo');
            $crea2->est_celular = $request->input('est_celular');
            $crea2->est_direccion = $request->input('est_direccion');
            $crea2->igl_id = $request->input('igl_id');

            if ($crea2->save()) {
                $crearUsuario = new User();
                $crearUsuario->name = $request->input('est_nombre');
                $crearUsuario->email = $request->input('est_correo');
                $crearUsuario->id_rol = $request->input('est_rol');
                $crearUsuario->est_id = $request->input('usuario_id');
                $crearUsuario->password = bcrypt($request->input('est_contra'));
                $crearUsuario->save();

                Contador::where('id', 1)
                ->update([
                    'con_contador' => $request->input('usuario_id')
                ]);
                return ['status' => true, 'message' => 'Guardado correctamente'];
            } else {
                return ['status' => false, 'message' => 'Error al guardar'];
            }
        }
    }

    public function filtrarEstudiante(Request $request)
    {
        $listar = Estudiante::_filtrarEstudiante($request->buscar);
        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamente',
            'data' => $listar
        ], status: 200);
    }




    public function filtrarEstudianteParaMatricular(Request $request)
    {
        $listar = Estudiante::_filtrarEstudianteParaMatricular($request->buscar);
        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamente',
            'datol' => $listar
        ], status: 200);
    }






    public function buscarEstudiantePorId(Estudiante $estudiante, $id)
    {
        $buscarEstudiante = Estudiante::find($id);
        return response()->json($buscarEstudiante, status: 200);
    }

    public function actualizarEstudiante(UpdateEstudianteRequest $request, Estudiante $estudiante, $id)
    {
        $actualizar = Estudiante::find($id);
        if (is_null($actualizar)) {
            return response()->json(['message' => 'No se encuentra el registro'], status: 404);
        }
        $actualizar->update($request->all());
        return response()->json([
            'success' => true,
            'message' => "Actualizado Correctamente",
            $actualizar
        ], status: 200);
    }

    public function eliminarEstudiante(Estudiante $estudiante, $id)
    {
        $eliminar = Estudiante::find($id);
        $eliminar->delete();
        return response()->json([
            'message' => "Eliminado Correctamente",
            'success' => true,
            'datosl' => $eliminar
        ], 200);
    }

    /* HASTA AQUI LOS METOS ESTAN BIEN */





    public function index(Request $request)
    {
        /*   $listar = Estudiante::where('sex_id', 1)->get(); */
        $listar = Estudiante::all();
        return response($listar, status: 200); //ASI ES MEJOR PARA VISUALIZAR TODOS LOS DATOS EN ANGULAR

    }

    public function ultimoDatoEstudiante()
    {
        $data = Estudiante::latest('id')->first();
        if (is_null($data)) {
            return response()->json(['message' => 'No se encuentra el registro'], status: 404);
        }
        $ultimodato = $data->id + 1;
        return response($ultimodato, status: 200);
        /*  return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamnte',
            'datoDesdeLaravel' => $ultimodato
        ], 200); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstudianteRequest  $request
     * @return \Illuminate\Http\Response
     */



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */



    public function estudiante(Estudiante $estudiante, $id)
    {
        $prueba3 = Estudiante::find($id);
        return response()->json($prueba3, status: 200);
    }

    public function estudiante2(Estudiante $estudiante, $id)
    {
        $buscar = Estudiante::find($id);
        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamnte',
            'data' => $buscar
        ], 200);   //CON ESTO NO SE PUDO VISUALIZAR EN MATRICULA

    }

    public function estudianteH(Request $request)
    {
        /*  $busqueda = $request->buscar;
        $listar = Estudiante::where('est_nombre', 'ILIKE', '%' . $busqueda . '%')
            ->orWhere('est_apellido', 'ILIKE', '%' . $busqueda . '%')
            ->orWhere('est_cedula', 'ILIKE', '%' . $busqueda . '%')->get()->where('sex_id', 1);
        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamnte',
            'data' => $listar
        ], status: 200); */

        $listar = Estudiante::searchH($request->buscar);
        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamente',
            'data' => $listar
        ], status: 200);
    }

    public function estudianteM(Request $request)
    {
        $listar = Estudiante::searchM($request->buscar);
        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamente',
            'data' => $listar
        ], status: 200);
    }


    public function filtrarMatricularEstudiante(Request $request)
    {
        $listar = Estudiante::_filtrarMatricularEstudiante($request->buscar);
        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamente',
            'data' => $listar
        ], status: 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstudianteRequest  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
}
