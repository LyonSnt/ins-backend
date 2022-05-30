<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComunidadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//use App\Models\Prueba;
Use App\Http\Controllers\PruebaController;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\UserController;
use App\Models\Prueba;
use Facade\FlareClient\Http\Response;

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
//Route::get('/login', [UserController::class, 'index']);
Route::post('/login', [UserController::class, 'login']);

//Route::post('/login', [AuthController::class, 'login']);


Route::post('/comunidad',[ ComunidadController::class, 'create']);
Route::get('/comunidad', [ComunidadController::class, 'index']);
Route::delete('comunidad/{id}', [ComunidadController::class, 'destroy']);


Route::post('/sexo',[ SexoController::class, 'create']);
Route::get('/sexo', [SexoController::class, 'index']);
Route::delete('sexo/{id}', [SexoController::class, 'destroy']);
Route::get('/sexo/{id}', [SexoController::class, 'show']);
Route::put('/sexo/{id}', [SexoController::class, 'update']);





Route::get('/prueba', [PruebaController::class, 'index']);
Route::delete('prueba/{id}', [PruebaController::class, 'destroy']);
Route::post('/prueba', [PruebaController::class, 'store']);
Route::get('/prueba/{id}', [PruebaController::class, 'show']);
Route::put('/prueba/{id}', [PruebaController::class, 'update']);

Route::put('/actualizarPrueba/{id}', [PruebaController::class, 'actualizarPrueba']);

/* Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);
 */
/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

