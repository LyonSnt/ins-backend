<?php

use App\Http\Controllers\AnioacademicoController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\EstadocivilController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\IglesiaController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\MesController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\ProfesordatoController;
use Illuminate\Support\Facades\Route;

//use App\Models\Prueba;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\TrimestreController;
use App\Http\Controllers\UserController;
use App\Models\Estudiante;
use App\Models\Profesordato;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    // Route::post('/login', [AuthController::class, 'login']);

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

/* RUTAS PARA LA API LOGIN */
/* Route::get('/login', [UserController::class, 'index']);
Route::get('/login/{user}', [UserController::class, 'show']); */


Route::post('/login', [UserController::class, 'login']);

Route::post('registro', [UserController::class, 'registro']);
Route::post('acceso', [UserController::class, 'acceso']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('cerrarsesion', [UserController::class, 'cerrarSesion']);
    Route::apiResource('user', UserController::class);

});
Route::get('estudianteId', [EstudianteController::class, 'estudianteId']);
/* Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('cerrarsesion', [UserController::class, 'cerrarSesion']);
    Route::apiResource('user', UserController::class);
}); */



//Route::post('/login', [AuthController::class, 'login']);

/* RUTAS PARA LA API COMUNIDAD */
Route::post('/comunidad', [ComunidadController::class, 'store']);
Route::get('/comunidad', [ComunidadController::class, 'index']);
Route::delete('/comunidad/{id}', [ComunidadController::class, 'destroy']);



/* RUTAS PARA LA API CARGO*/
Route::post('/cargo', [CargoController::class, 'store']);
Route::get('/cargo', [CargoController::class, 'index']);
Route::get('/cargo/{id}', [CargoController::class, 'show']);
Route::put('/cargo/{id}', [CargoController::class, 'update']);
Route::delete('/cargo/{id}', [CargoController::class, 'destroy']);

/* RUTAS PARA LA API SEXO */
Route::post('/sexo', [SexoController::class, 'store']);
Route::get('/sexo', [SexoController::class, 'index']);
Route::get('/sexo/{id}', [SexoController::class, 'show']);
Route::put('/sexo/{id}', [SexoController::class, 'update']);
Route::delete('/sexo/{id}', [SexoController::class, 'destroy']);

/* RUTAS PARA LA API ESTADO CIVIL*/
Route::post('/estadocivil', [EstadocivilController::class, 'store']);
Route::get('/estadocivil', [EstadocivilController::class, 'index']);
Route::get('/estadocivil/{id}', [EstadocivilController::class, 'show']);
Route::put('/estadocivil/{id}', [EstadocivilController::class, 'update']);
Route::delete('/estadocivil/{id}', [EstadocivilController::class, 'destroy']);

/* RUTAS PARA LA API NIVEL*/
Route::post('/nivel', [NivelController::class, 'store']);
Route::get('/nivel', [NivelController::class, 'index']);
Route::get('/nivel/{id}', [NivelController::class, 'show']);
Route::put('/nivel/{id}', [NivelController::class, 'update']);
Route::delete('/nivel/{id}', [NivelController::class, 'destroy']);

/* RUTAS PARA LA API AÑO ACADEMICO*/
Route::post('/anioacademico', [AnioacademicoController::class, 'store']);
Route::get('/anioacademico', [AnioacademicoController::class, 'index']);
Route::get('/anioacademico/{id}', [AnioacademicoController::class, 'show']);
Route::put('/anioacademico/{id}', [AnioacademicoController::class, 'update']);
Route::delete('/anioacademico/{id}', [AnioacademicoController::class, 'destroy']);

/* RUTAS PARA LA API TRIMESTRE*/
Route::post('/trimestre', [TrimestreController::class, 'store']);
Route::get('/trimestre', [TrimestreController::class, 'index']);
Route::get('/trimestre/{id}', [TrimestreController::class, 'show']);
Route::put('/trimestre/{id}', [TrimestreController::class, 'update']);
Route::delete('/trimestre/{id}', [TrimestreController::class, 'destroy']);

/* RUTAS PARA LA API AULA*/
Route::post('/aula', [AulaController::class, 'store']);
Route::get('/aula', [AulaController::class, 'index']);
Route::get('/aula/{id}', [AulaController::class, 'show']);
Route::put('/aula/{id}', [AulaController::class, 'update']);
Route::delete('/aula/{id}', [AulaController::class, 'destroy']);

/* RUTAS PARA LA API MES*/
Route::post('/mes', [MesController::class, 'store']);
Route::get('/mes', [MesController::class, 'index']);
Route::get('/mes/{id}', [MesController::class, 'show']);
Route::put('/mes/{id}', [MesController::class, 'update']);
Route::delete('/mes/{id}', [MesController::class, 'destroy']);

/* RUTAS PARA LA API IGLESIA*/
Route::post('/iglesia', [IglesiaController::class, 'store']);
Route::get('/iglesia', [IglesiaController::class, 'index']);
Route::get('/iglesia/{id}', [IglesiaController::class, 'show']);
Route::put('/iglesia/{id}', [IglesiaController::class, 'update']);
Route::delete('/iglesia/{id}', [IglesiaController::class, 'destroy']);

/* RUTAS PARA LA API INSTITUCION*/
Route::post('/institucion', [InstitucionController::class, 'store']);
Route::get('/institucion', [InstitucionController::class, 'index']);
Route::get('/institucion/{id}', [InstitucionController::class, 'show']);
Route::put('/institucion/{id}', [InstitucionController::class, 'update']);
Route::delete('/institucion/{id}', [InstitucionController::class, 'destroy']);

/* RUTAS PARA LA API ESTUDIANTE*/
Route::post('/estudiante', [EstudianteController::class, 'store']);

Route::post('file', [EstudianteController::class, 'file']);
Route::get('/estudiante', [EstudianteController::class, 'index']);
Route::get('/estudiante/{id}', [EstudianteController::class, 'show']);

/* RUTAS PARA LA API PROFESOR */
Route::get('/profesor', [ProfesordatoController::class, 'index']);
Route::get('/profesor/{id}', [ProfesordatoController::class, 'show']);


/* RUTAS PARA LA API */

/* RUTAS PARA LA API */

/* RUTAS PARA LA API */

/* RUTAS PARA LA API */

/* RUTAS PARA LA API */

/* RUTAS PARA LA API */

/* RUTAS PARA LA API */

/* RUTAS PARA LA API */

/* RUTAS PARA LA API */

/* RUTAS PARA LA API */

/* RUTAS PARA LA API */

/* RUTAS PARA LA API */



























/* RUTAS PARA LA API PRUEBA */
Route::get('/prueba', [PruebaController::class, 'index']);
Route::delete('prueba/{id}', [PruebaController::class, 'destroy']);
Route::post('/prueba', [PruebaController::class, 'store']);
Route::get('/prueba/{id}', [PruebaController::class, 'show']);
Route::put('/prueba/{id}', [PruebaController::class, 'update']);

Route::put('/actualizarPrueba/{id}', [PruebaController::class, 'actualizarPrueba']);


/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
