<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!JWTAuth::attempt($credentials)) {
                $response['status'] = 0;
                $response['code'] = 401;
                $response['error'] = 'Error';
                $response['data'] = null;
                $response['msg'] = 'Email o contraseña incorrecto';
                return response()->json($response);
            }
        } catch (JWTException $e) {
            $response['data'] = null;
            $response['error'] = 'Error';
            $response['code'] = 500;
            $response['msg'] = 'No puede crear el token';
            return response()->json($response);
        }
        $user = auth()->user();
        $data['token'] = auth()->claims([
            'name' => $user->name, //ESTA PARTE ES PARA QUE SE VISUALISE EN ANGULAR LOS DATOS DE LA TABLA
            'email' => $user->email,
            'id' => $user->id,
            'password' => $user->password,
            'id_rol' => $user->id_rol,
            'pro_id' => $user->pro_id,
            'est_id' => $user->est_id,
        ])->attempt($credentials);
        $response['data'] = $data;
        $response['id_rol'] = $user->id_rol;
        $response['status'] = 1;
        $response['code'] = 200;
        $response['msg1'] = 'Bienvenid@';
        $response['msg2'] = 'Al Sistema';
        return response()->json($response);
    }



    public function registro(RegistroRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->id_rol = $request->id_rol;
        $user->est_id = $request->est_id;
        $user->pro_id = $request->pro_id;
        if ($user->save()) {
            return response()->json([
                'res' => true,
                'msg' => 'Usuario registrado correctamente'
            ], 200);
        } else {
            return response()->json([
                'res' => false,
                'msg' => 'Error al guardar'
            ], 404);
        }
    }

    public function cerrarSesion(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Token eliminado correctamente'
        ], 200);
    }
}
