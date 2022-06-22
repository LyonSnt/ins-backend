<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadocivil extends Model
{
    use HasFactory;

    protected $table = 'tblestadocivil';

    public $fillable = [
        'esc_descripcion',
        'esc_abreviatura'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'esc_descripcion' => 'string',
        'esc_abreviatura' => 'string',

    ];
}
