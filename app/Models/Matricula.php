<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function estudianteR()
    {
        return $this->belongsToMany(\App\Models\Estudiante::class, 'est_id', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'roles_asignados');
    }

}
