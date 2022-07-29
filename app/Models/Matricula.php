<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Matricula extends Model
{
    use HasFactory;


    public $table = 'tblmatricula';

    public $fillable = [
        'est_id',
        'asg_id',
        'mes_id',
        'ani_id',
        'aul_id',
        'mtr_estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'est_id' => 'integer',
        'asg_id' => 'integer',
        'mes_id' => 'integer',
        'ani_id' => 'integer',
        'aul_id' => 'integer',
        'mtr_estado' => 'integer',
    ];


    public static function buscarmatricula($query = '')
    {
        if (!$query) {
            return self::all();
            // return self::select('est_cedula', 'est_apellido')->get();
        } else {
            return self::where('est_id', 'ILIKE', '%' . $query . '%')
                ->orWhere('asg_id', 'ILIKE', '%' . $query . '%')
                ->get();
        }
    }

  



    public static function filtrarParaMatricularPro($query = '')
    {
        if (!$query) {
            //return self::all();
            return DB::select("SELECT m.id, e.id as idest, m.asg_id, e.est_cedula, e.est_nombre as nombre, e.est_apellido as ape,
            a.asg_nombre, m.mes_id, me.mes_nombre, m.ani_id, ani.ani_anio, m.mtr_estado, n.id as nivid
            FROM tblmatricula m
            left join tblestudiante e
            on m.est_id = e.id
            left join tblasignatura a
            on m.asg_id = a.id
            left join tblmes me
            on m.mes_id = me.id
            left join tblanioacademico ani
            on m.ani_id = ani.id
            left join tblnivel n
            on a.niv_id = n.id");
        } else {

            return DB::select("SELECT m.id, e.id as idest, m.asg_id, e.est_cedula, e.est_nombre as nombre, e.est_apellido as ape,
            a.asg_nombre, m.mes_id, me.mes_nombre, m.ani_id, ani.ani_anio, m.mtr_estado, n.id as nivid
            FROM tblmatricula m
            left join tblestudiante e
            on m.est_id = e.id
            left join tblasignatura a
            on m.asg_id = a.id
            left join tblmes me
            on m.mes_id = me.id
            left join tblanioacademico ani
            on m.ani_id = ani.id
            left join tblnivel n
            on a.niv_id = n.id
            where e.est_nombre ILIKE '%$query%'
            or e.est_apellido ILIKE '%$query%'
            or e.est_cedula ILIKE '%$query%'");

            /* return self::where('asg_id', 'ILIKE', '%' . $query . '%')
                ->orWhere('ape', 'ILIKE', '%' . $query . '%')
                ->orWhere('nombre', 'ILIKE', '%' . $query . '%')
                ->get(); */
        }
    }






    public function estudianteR()
    {
        return $this->belongsToMany(\App\Models\Estudiante::class, 'est_id', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_asignados');
    }
}
