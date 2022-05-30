<?php

namespace App\Http\Controllers;

use App\Models\Prueba;
use App\Http\Requests\StorePruebaRequest;
use App\Http\Requests\UpdatePruebaRequest;
use App\Models\Comunidad;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $prueba2 = Prueba::all();
        return $prueba2; */
        $prueba3 = Prueba::get();
        return response()->json($prueba3, status: 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePruebaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePruebaRequest $request)
    {

        $crear = Prueba::create($request->all());
        return response()->json($crear, status: 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function show(Prueba $prueba, $id)
    {

        $prueba3 = Prueba::find($id);
        return response()->json($prueba3, status: 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function edit(Prueba $prueba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePruebaRequest  $request
     * @param  \App\Models\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePruebaRequest $request, Prueba $prueba, $id)
    {

        $prueba3['nombre'] = $request['nombre'];
        $prueba3['apellido'] = $request['apellido'];
        $prueba3['edad'] = $request['edad'];
        Prueba::find($id)->update($prueba3);
        return response()->json([
            'message' => "Successfully updated",
            'success' => true
        ], 200);
    }

    public function actualizarPrueba(UpdatePruebaRequest $request, $id)
    {
        $prueba4 = Prueba::find($id);
        if(is_null($prueba4)){
            return response()->json(['message' => 'Producto no seee'], status: 404);
        }
        $prueba4->update($request->all());
        return response($prueba4, status: 200);
    }

  /*   public function update(Request $request,$id){
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['phone'] = $request['phone'];
        Person::find($id)->update($data);
        return response()->json([
            'message' => "Successfully updated",
            'success' => true
        ], 200);
      } */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prueba $prueba,$id)
    {
        $note = Prueba::find($id);
        $note->delete();
        return response()->json($note, status: 200);

    }
}
