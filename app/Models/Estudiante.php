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
        'est_imagen'
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
        'est_imagen' => 'string'
    ];

}
