<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anioacademico extends Model
{
    use HasFactory;

    protected $table = 'tblanioacademico';

    public $fillable = [
        'ani_anio'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ani_anio' => 'string'

    ];
}
