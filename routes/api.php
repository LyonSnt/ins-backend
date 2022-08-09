<?php

use App\Http\Controllers\AnioacademicoController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\EstadocivilController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\IglesiaController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\MesController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\NotaController;
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

/* RUTAS PARA LA API LOGIN */
Route::post('/login', [UserController::class, 'login']);
Route::post('registro', [UserController::class, 'registro']);

/* RUTAS PARA LA API INSTITUCION*/

Route::post('/crearInstitucion', [InstitucionController::class, 'crearInstitucion']);
Route::get('/listarInstitucion', [InstitucionController::class, 'listarInstitucion']);
Route::get('/buscarInstitucionPorId/{id}', [InstitucionController::class, 'buscarInstitucionPorId']);
Route::put('/editarInstitucion/{id}', [InstitucionController::class, 'editarInstitucion']);
Route::delete('/eliminarInstitucion/{id}', [InstitucionController::class, 'eliminarInstitucion']);

/* RUTAS PARA LA API CARGO*/
Route::post('/crearCargo', [CargoController::class, 'crearCargo']);
Route::get('/listarCargo', [CargoController::class, 'listarCargo']);
Route::get('/buscarCargoPorId/{id}', [CargoController::class, 'buscarCargoPorId']);
Route::put('/editarCargo/{id}', [CargoController::class, 'editarCargo']);
Route::delete('/eliminarCargo/{id}', [CargoController::class, 'eliminarCargo']);

/* RUTAS PARA LA API AÑO ACADEMICO*/
Route::post('/crearAnioacademico', [AnioacademicoController::class, 'crearAnioacademico']);
Route::get('/listarAnioacademico', [AnioacademicoController::class, 'listarAnioacademico']);
Route::get('/buscarAnioacademicoPorId/{id}', [AnioacademicoController::class, 'buscarAnioacademicoPorId']);
Route::put('/editarAnioacademico/{id}', [AnioacademicoController::class, 'editarAnioacademico']);
Route::delete('/eliminarAnioacademico/{id}', [AnioacademicoController::class, 'eliminarAnioacademico']);

/* RUTAS PARA LA API IGLESIA*/
Route::post('/crearIglesia', [IglesiaController::class, 'crearIglesia']);
Route::get('/listarIglesia', [IglesiaController::class, 'listarIglesia']);
Route::get('/buscarIglesiaPorId/{id}', [IglesiaController::class, 'buscarIglesiaPorId']);
Route::put('/editarIglesia/{id}', [IglesiaController::class, 'editarIglesia']);
Route::delete('/eliminarIglesia/{id}', [IglesiaController::class, 'eliminarIglesia']);


/* RUTAS PARA LA API ESTUDIANTE*/
Route::post('crearEstudiante', [EstudianteController::class, 'crearEstudiante']);
Route::post('/filtrarEstudiante', [EstudianteController::class, 'filtrarEstudiante']);
Route::get('/buscarEstudiantePorId/{id}', [EstudianteController::class, 'buscarEstudiantePorId']);
Route::put('/actualizarEstudiante/{id}', [EstudianteController::class, 'actualizarEstudiante']);
Route::delete('/eliminarEstudiante/{id}', [EstudianteController::class, 'eliminarEstudiante']);
Route::post('/filtrarMatricularEstudiante', [EstudianteController::class, 'filtrarMatricularEstudiante']);
Route::get('/estudiante', [EstudianteController::class, 'index']);
Route::get('/ultimoDatoEstudiante', [EstudianteController::class, 'ultimoDatoEstudiante']);
Route::get('/estudiante/{id}', [EstudianteController::class, 'estudiante']);
Route::get('/estudiante2/{id}', [EstudianteController::class, 'estudiante2']);
Route::get('estudianteId/{id}', [EstudianteController::class, 'estudianteId']);




/* RUTAS PARA LA API MATRICULA */
Route::get('/listarMatriculaLegalizar', [MatriculaController::class, 'listarMatriculaLegalizar']);
Route::put('/legalizarMatricula/{id}', [MatriculaController::class, 'legalizarMatricula']);
Route::get('/listarMatriculaLegalizado', [MatriculaController::class, 'listarMatriculaLegalizado']);
Route::post('/filtrarEstudianteParaMatricular', [EstudianteController::class, 'filtrarEstudianteParaMatricular']);
Route::put('/anularMatricula/{id}', [MatriculaController::class, 'anularMatricula']);
Route::post('/filtrarParaMatricular', [MatriculaController::class, 'filtrarParaMatricular']);
Route::get('/listarParaMatricular', [MatriculaController::class, 'listarParaMatricular']);
Route::put('/legalizarMatricula2/{id}', [MatriculaController::class, 'legalizarMatricula2']);
Route::get('/buscarMatriculaPorId/{id}', [MatriculaController::class, 'buscarMatriculaPorId']);//?
Route::get('/buscarMatriculaEstudiantePorId/{id}', [MatriculaController::class, 'buscarMatriculaEstudiantePorId']);
Route::get('/buscarMatriculaEstudiantePorId/{id}', [MatriculaController::class, 'buscarMatriculaEstudiantePorId']);
Route::get('/listarMatriculaLegalizadoId/{id}', [MatriculaController::class, 'listarMatriculaLegalizadoId']);
Route::get('/matricula', [MatriculaController::class, 'index']);






Route::get('/listarContadorEstudiante', [ContadorController::class, 'listarContadorEstudiante']);
Route::get('/listarContadorMatricula', [ContadorController::class, 'listarContadorMatricula']);
Route::get('/listarContadorProfesor', [ContadorController::class, 'listarContadorProfesor']);


Route::get('/matricula23/{id}', [MatriculaController::class, 'matricula23']);
Route::post('/buscarmatricula', [MatriculaController::class, 'buscarmatricula']);
Route::post('/crearMatricula', [MatriculaController::class, 'crearMatricula']);
Route::post('/buscarmatriculaH', [MatriculaController::class, 'buscarmatriculaH']);
Route::post('/buscarmatriculaM', [MatriculaController::class, 'buscarmatriculaM']);
Route::post('/buscarmatriculaHn', [MatriculaController::class, 'buscarmatriculaHn']);
Route::get('/imprimirmatricula', [MatriculaController::class, 'imprimirmatricula']);
Route::get('/matricula/{id}', [MatriculaController::class, 'show']);
Route::get('/ultimoDatoMatricula', [MatriculaController::class, 'ultimoDatoMatricula']);
Route::delete('/eliminarMatricula/{id}', [MatriculaController::class, 'eliminarMatricula']);



/* RUTAS PARA LA API NIVEL*/
Route::get('/listarNivel', [NivelController::class, 'listarNivel']);
Route::get('/nivel', [NivelController::class, 'index']);
Route::get('/nivel/{id}', [NivelController::class, 'show']);
Route::put('/nivel/{id}', [NivelController::class, 'update']);
Route::delete('/nivel/{id}', [NivelController::class, 'destroy']);













/* RUTAS PARA LA API NOTA*/
Route::get('/buscarNotaPorId/{id}', [NotaController::class, 'buscarNotaPorId']);
Route::get('/listarNota', [NotaController::class, 'listarNota']);
Route::get('/listarNota2/{id}/{id2}', [NotaController::class, 'listarNota2']);
Route::put('/actualizarNota/{id}', [NotaController::class, 'actualizarNota']);





/* RUTAS PARA LA API COMUNIDAD */
Route::post('/comunidad', [ComunidadController::class, 'create']);
Route::get('/comunidad', [ComunidadController::class, 'index']);
Route::put('/comunidad/{id}', [ComunidadController::class, 'update']);
Route::delete('/comunidad/{id}', [ComunidadController::class, 'destroy']);


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

/* RUTAS PARA LA API TRIMESTRE*/
Route::post('/trimestre', [TrimestreController::class, 'store']);
Route::get('/trimestreh', [TrimestreController::class, 'index']);
Route::get('/trimestrem', [TrimestreController::class, 'trimestrem']);
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


/* RUTAS PARA LA API PROFESOR */
Route::post('/crearProfesor', [ProfesordatoController::class, 'crearProfesor']);
Route::post('/filtrarProfesor', [ProfesordatoController::class, 'filtrarProfesor']);
Route::get('/profesor/{id}', [ProfesordatoController::class, 'show']);

Route::get('/matriculaEstudiateProfesor/{id}', [ProfesordatoController::class, 'matriculaEstudiateProfesor']);


/* RUTAS PARA LA API ASIGNATURA*/
Route::post('/asignatura', [AsignaturaController::class, 'store']);
Route::get('/asignatura', [AsignaturaController::class, 'index']);
//Route::get('/asignatura/{id}', [AsignaturaController::class, 'show']);
Route::put('/asignatura/{id}', [AsignaturaController::class, 'update']);
Route::delete('/asignatura/{id}', [AsignaturaController::class, 'destroy']);

Route::get('/show2/{id}', [AsignaturaController::class, 'show22']);

Route::get('/show23/{id}', [AsignaturaController::class, 'show23']);


Route::post('/materia', [AsignaturaController::class, 'materia']);

Route::post('/nivelasgh', [AsignaturaController::class, 'nivelasgh']);
Route::post('/nivelasgm', [AsignaturaController::class, 'nivelasgm']);
Route::post('/listarNivelAsignatura', [AsignaturaController::class, 'listarNivelAsignatura']);



/* Route::post('/show3', [AsignaturaController::class, 'show3']);
 */


/* RUTAS PARA LA API REPORTES*/
Route::get('/historialEstudiante', [EstudianteController::class, 'historialEstudiante']);
Route::get('/matriculados', [MatriculaController::class, 'matriculados']);
Route::get('/historialProfesores', [ProfesordatoController::class, 'historialProfesores']);
Route::get('/matriculasAnuladas', [MatriculaController::class, 'matriculasAnuladas']);


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
