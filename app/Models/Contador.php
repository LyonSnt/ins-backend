<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contador extends Model
{
    use HasFactory;


    protected $table = 'tblcontador';

    public $fillable = [
        'con_descripcion',
        'con_contador'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'con_descripcion' => 'string',
        'con_contador' => 'integer',

    ];
}
