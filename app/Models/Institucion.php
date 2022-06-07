<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;


    protected $table = 'tblinstitucion';

    public $fillable = [
        'ins_nombre',
        'ins_direccion',
        'ins_telefono',
        'ins_correo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ins_nombre' => 'string',
        'ins_direccion' => 'string',
        'ins_telefono' => 'string',
        'ins_correo' => 'string'

    ];
}
