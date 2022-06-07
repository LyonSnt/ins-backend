<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    //

    public function index()
    {
        /* $prueba2 = Prueba::all();
        return $prueba2; */
        $prueba3 = User::get();
        return response()->json($prueba3, status: 200);

    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!JWTAuth::attempt($credentials)) {
                $response['status'] = 0;
                $response['code'] = 500;
                $response['data'] = null;
                $response['message'] = 'Email o contraseña incorrecto';
                return response()->json($response);
            }
        } catch (JWTException $e) {
            $response['data'] = null;
            $response['code'] = 500;
            $response['message'] = 'No puede crear el token';
            return response()->json($response);
        }
        $user = auth()->user();
        $data['token'] = auth()->claims([
            'name' => $user->name, //ESTA PARTE ES PARA QUE SE VICUALISE EN ANGULAR LOS DATOS DE LA TABLA
            'email' => $user->email,
            'id' => $user->id,
            'password' => $user->password,
            'rol' => $user->rol,
        ])->attempt($credentials);
        $response['data'] = $data;
        $response['status'] = 1;
        $response['code'] = 200;
        $response['rol'] = 3;

        $response['message'] = 'Login correcto';
        return response()->json($response);
    }
}
