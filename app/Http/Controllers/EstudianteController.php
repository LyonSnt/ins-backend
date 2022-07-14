<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Http\Requests\StoreEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listar = Estudiante::where('sex_id', 1)->get();
        return response($listar, status: 200); //ASI ES MEJOR PARA VISUALIZAR TODOS LOS DATOS EN ANGULAR


    }

    public function index2()
    {
        $listar = Estudiante::where('sex_id', 2)->get();
        return response($listar, status: 200); //ASI ES MEJOR PARA VISUALIZAR TODOS LOS DATOS EN ANGULAR
        /*     return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamnte',
            'data' => $listar
        ], 200); */
    }


    public function index3()
    {
        $listar = Estudiante::where('sex_id', 1)->get();
        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamnte',
            'data' => $listar
        ], status: 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreEstudianteRequest $request)
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstudianteRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function file(Request $request)
    {
        $crea2 = new Estudiante;
        if ($request->hasFile('est_imagen')) {
            $completeFilename = $request->file('est_imagen')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFilename, PATHINFO_FILENAME);
            $extenshion = $request->file('est_imagen')->getClientOriginalExtension();
            $compic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = $request->file('est_imagen')->storeAs('public/hoy10', $compic);
            $crea2->est_imagen = $compic;
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
                return ['status' => true, 'message' => 'Guardado correctamente'];
            } else {
                return ['status' => false, 'message' => 'Error al guardar'];
            }
        }
    }
    public function store(StoreEstudianteRequest $request)
    {
        /*     $crear = Estudiante::create($request->all());
        return response()->json($crear, status: 200); */

        $crea2 = new Estudiante();
        if ($request->hasFile('est_imagen')) {
            $completeFilename = $request->file('est_imagen')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFilename, PATHINFO_FILENAME);
            $extenshion = $request->file('est_imagen')->getClientOriginalExtension();
            $compic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = $request->file('est_imagen')->storeAs('public/hoy10', $compic);
            $crea2->est_imagen = $compic;

            $crea2->est_name;
        }
        if ($crea2->save()) {
            return ['status' => true, 'message' => 'Guardado correctamente'];
        } else {
            return ['status' => false, 'message' => 'Error al guardar'];
        }


        /*   $crear = $request->all();

        if ($imagen = $request->file('est_imagen')) {
          //  $rutaGuardarImagen = 'hoy10/';
            $imagenEstudiante = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            //$imagen->move($rutaGuardarImagen, $imagenEstudiante);
            $path = $request->file('est_imagen')->storeAs('public/hoy10', $imagenEstudiante);
            $crear['est_imagen'] = $imagenEstudiante;
        }
        $respues =  Estudiante::create($crear);
        if ($respues) {
            return response()->json(['message' => 'Creado con éxito'], 201);
        } else {
            return response()->json(['message' => 'Error al crear'], 500);
        } */

        /*   $post = new Estudiante();
        $url_image = $this->upload($request->file('est_imagen'));
        $post->est_imagen = $url_image;
        $post->est_cedula = $request->input('est_cedula');
        $post->est_apellido = $request->input('est_apellido');
        $post->est_nombre = $request->input('est_nombre');
        $post->sex_id = $request->input('sex_id');
        $post->esc_id = $request->input('esc_id');
        $post->est_fechanacimiento = $request->input('est_fechanacimiento');
        $post->est_fechabautismo = $request->input('est_fechabautismo');
        $post->est_celular = $request->input('est_celular');
        $post->est_direccion = $request->input('est_direccion');
        $post->igl_id = $request->input('igl_id');

        $res = $post->save();

        if ($res) {
            return response()->json(['message' => 'Creado correctamente'], 201);
        } else {
            return response()->json(['message' => 'ERROR AL CREAR IMAGEN Y DATOS'], 500);
        } */
    }

    private function upload($image)
    {
        $path_info = pathinfo($image->getClientOriginalName());
        $post_path = 'images/post';

        $rename = uniqid() . '.' . $path_info['extension'];
        $image->move(public_path() . "/$post_path", $rename);
        return "$post_path/$rename";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante, $id)
    {
        $prueba3 = Estudiante::find($id);
        return response()->json($prueba3, status: 200);
    }

    public function show2(Estudiante $estudiante, $id)
    {
        $buscar = Estudiante::find($id);
        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamnte',
            'data' => $buscar
        ], 200);   //CON ESTO NO SE PUDO VISUALIZAR EN MATRICULA

    }

    public function show3(Request $request)
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
            'msg' => 'Dato encontrado correctamnte',
            'data' => $listar
        ], status: 200);
    }

    public function show4(Request $request)
    {

        $listar = Estudiante::searchM($request->buscar);

        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamnte',
            'data' => $listar
        ], status: 200);
    }

    public function estudianteId(Estudiante $estudiante, $id)
    {
        $user = Estudiante::find($id);
        auth()->$user->est_id;
        return response()->json([
            'res' => true,
            'msg' => 'Dato encontrado correctamnte'
        ], 200);
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
    public function update(UpdateEstudianteRequest $request, Estudiante $estudiante, $id)
    {
        $actualizar = Estudiante::find($id);
        if (is_null($actualizar)) {
            return response()->json(['message' => 'No se encuentra el registro'], status: 404);
        }
        $actualizar->update($request->all());
        //  return response($sexo, status: 200);
        return response()->json([
            'success' => true,
            'message' => "Actualizado Correctamente",
            $actualizar
        ], status: 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante, $id)
    {
        $eliminar = Estudiante::find($id);
        $eliminar->delete();
        // return response()->json(null, status: 204);
        return response()->json(['message' => "Eliminado Correctamente", 'success' => true, $eliminar], status: 204);
    }
}
