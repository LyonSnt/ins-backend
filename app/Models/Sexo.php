<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;
   /*  public $timestamps = false; */
    protected $table = 'tblsexo';

    public $fillable = [
        'sex_descripcion',
        'sex_abreviatura'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sex_descripcion' => 'string',
        'sex_abreviatura' => 'string',

    ];
}
