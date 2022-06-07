<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iglesia extends Model
{
    use HasFactory;

    protected $table = 'tbliglesia';

    public $fillable = [
        'igl_nombre',
        'igl_direccion',
        'igl_telefono',
        'igl_correo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'igl_nombre' => 'string',
        'igl_direccion' => 'string',
        'igl_telefono' => 'string',
        'igl_correo' => 'string'

    ];
}
