<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesordato extends Model
{
    use HasFactory;

    public $table = 'tblprofesordato';

    public $fillable = [
        'pro_cedula',
        'pro_apellido',
        'pro_nombre',
        'sex_id',
        'esc_id',
        'pro_fechanacimiento',
        'pro_fechabautismo',
        'pro_celular',
        'pro_direccion',
        'igl_id',
        'pro_imagen'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pro_cedula' => 'string',
        'pro_apellido' => 'string',
        'pro_nombre' => 'string',
        'sex_id' => 'integer',
        'esc_id' => 'integer',
        'pro_fechanacimiento' => 'string',
        'pro_fechabautismo' => 'string',
        'pro_celular' => 'string',
        'pro_direccion' => 'string',
        'igl_id' => 'integer',
        'pro_imagen' => 'string'
    ];
}
