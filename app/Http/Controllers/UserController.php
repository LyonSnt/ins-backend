<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccesoRequest;
use App\Http\Requests\RegistroRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class UserController extends Controller
{
    //

    public function index()
    {
        /*  $prueba3 = User::get();
        return response()->json($prueba3, status: 200); */
        return UserResource::collection(User::all());
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    /*   public function store(UserRequest $request)
    {
        return (new UserResource(User::create($request->all())))->additional([
            'msg' => 'Usuario registrado correctamente'])
            ->response()
            ->setStatusCode(2000);
    } */

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!JWTAuth::attempt($credentials)) {
                return response()->json([
                    'status' => 0,
                    'data' => null,
                    'msg' => 'Email o contraseña incorrecto',
                ], 500);
            }
        } catch (JWTException $e) {
            return response()->json([
                'data' => null,
                'msg' => 'No puede crear el token',
            ], 500);
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
        return response()->json([
            'data' => $data,
            'status' => 1,
            'id_rol' => $user->id_rol,
            'msg' => 'Sesion iniciado',
        ], 200);
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


    /*    public function acceso(AccesoRequest $request)
    {
        $user = User::where('email', "=", $request->email)->first();

        if (isset($user)) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken($request->email)->plainTextToken;
                return response()->json([
                    'msg' => 'Se inicio session',
                    'respuesta' => true,
                    'user' => $user,
                    'token' => $token
                ], 200);
            } else {
                return response()->json(['msg' => 'Conraseña incorrecta', 'error' => true], 200);
            }
        } else {
            return response()->json(['msg' => 'Usuario no existe', 'error' => true], 200);
        }
    } */

    public function acceso(AccesoRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => true,
                'msg' => 'Correo o contraseña incorrecto'
            ], 404);
        }
        $token = $user->createToken($request->email)->plainTextToken;
        return response()->json([
            'res' => true,
            'data' => $user,
            'token' => $token
        ], 200);
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
