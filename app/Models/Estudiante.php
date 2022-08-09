<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    public $table = 'tblestudiante';

    public $fillable = [
        'est_cedula',
        'est_apellido',
        'est_nombre',
        'sex_id',
        'esc_id',
        'est_fechanacimiento',
        'est_fechabautismo',
        'est_celular',
        'est_direccion',
        'igl_id',
        'est_imagen',
        'est_nivel',
        'est_trimestre',
        'est_estado',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'est_cedula' => 'string',
        'est_apellido' => 'string',
        'est_nombre' => 'string',
        'sex_id' => 'integer',
        'esc_id' => 'integer',
        'est_fechanacimiento' => 'string',
        'est_fechabautismo' => 'string',
        'est_celular' => 'string',
        'est_direccion' => 'string',
        'igl_id' => 'integer',
        'est_imagen' => 'string',
        'est_nivel' => 'integer',
        'est_trimestre' => 'integer',
        'est_estado' => 'integer',
    ];


    public static function _filtrarEstudiante($query = '')
    {
        if (!$query) {
            return self::all();
            // return self::select('est_cedula', 'est_apellido')->get();
        } else {
            return self::where('est_nombre', 'ILIKE', '%' . $query . '%')
            ->orWhere('est_apellido', 'ILIKE', '%' . $query . '%')
            ->orWhere('est_cedula', 'ILIKE', '%' . $query . '%')->get();
        }
    }



    public static function _filtrarEstudianteParaMatricular($query = '')
    {
        if (!$query) {
           // return self::all();
            return self::orderByDesc('id')->get();
            // return self::select('est_cedula', 'est_apellido')->get();
        } else {
            return self::where('est_nombre', 'ILIKE', '%' . $query . '%')
                ->orWhere('est_apellido', 'ILIKE', '%' . $query . '%')
                ->orWhere('est_cedula', 'ILIKE', '%' . $query . '%')
                ->orderByDesc('id')
                ->get();
               // ->get();
        }
    }

    public static function _filtrarMatricularEstudiante($query = '')
    {
        if (!$query) {
            return self::orderByDesc('id')->get();
            // return self::select('est_cedula', 'est_apellido')->get();
        } else {
            return self::where('est_nombre', 'ILIKE', '%' . $query . '%')
            ->orWhere('est_apellido', 'ILIKE', '%' . $query . '%')
            ->orWhere('est_cedula', 'ILIKE', '%' . $query . '%')
            ->get()->orderByDesc('id');
        }
    }

    public static function searchHNOPORELMOMENTO($query = '')
    {
        if (!$query) {
            return self::all();
            // return self::select('est_cedula', 'est_apellido')->get();
        } else {
            return self::where('est_nombre', 'ILIKE', '%' . $query . '%')
            ->orWhere('est_apellido', 'ILIKE', '%' . $query . '%')
            ->orWhere('est_cedula', 'ILIKE', '%' . $query . '%')
            ->get();
        }
    }


    public static function searchMNOPORELMOEMNTO($query = '')
    {
        if (!$query) {
            return self::all();
        } else {
            return self::where('est_nombre', 'ILIKE', '%' . $query . '%')
                ->orWhere('est_apellido', 'ILIKE', '%' . $query . '%')
                ->orWhere('est_cedula', 'ILIKE', '%' . $query . '%')
                ->get();
        }
    }
   /*  public static function searchM($query = '')
    {
        if (!$query) {
            return self::where('sex_id', 2)->get();
        } else {
            return self::where('est_nombre', 'ILIKE', '%' . $query . '%')
                ->orWhere('est_apellido', 'ILIKE', '%' . $query . '%')
                ->orWhere('est_cedula', 'ILIKE', '%' . $query . '%')
                ->get()->where('sex_id', 2);
        }
    } */

    public function scopeWomen($query)
    {
        return $query->whereSex_abreviatura('H');
    }
}
