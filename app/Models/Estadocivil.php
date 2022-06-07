<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadocivil extends Model
{
    use HasFactory;

    protected $table = 'tblestadocivl';

    public $fillable = [
        'esc_decripcion',
        'esc_abreviatura'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'esc_decripcion' => 'string',
        'esc_abreviatura' => 'string',

    ];
}
