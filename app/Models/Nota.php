<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;



    public $table = 'tblnota';

    public $fillable = [
        'est_id',
        'mtr_id',
        'asg_id',
        'prfni_id',
        'ani_id',
        'nivel',
        'aula',
        'trimestre',
        'nota1',
        'nota2',
        'nota3',
        'nota4',
        'nota5',
        'resul1',
        'resul2',
        'resul3',
        'final1',
        'final2',
        'final3',
        'notafinal',
        'aprobo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'est_id' => 'integer',
        'mtr_id' => 'integer',
        'asg_id' => 'integer',
        'prfni_id' => 'integer',
        'ani_id' => 'integer',
        'nivel' => 'string',
        'aula' => 'string',
        'trimestre' => 'string',
        'nota1' => 'integer',
        'nota2' => 'integer',
        'nota3' => 'integer',
        'nota4' => 'integer',
        'nota5' => 'integer',
        'resul1' => 'integer',
        'resul2' => 'integer',
        'resul3' => 'integer',
        'final1' => 'integer',
        'final2' => 'integer',
        'final3' => 'integer',
        'notafinal' => 'integer',
        'aprobo' => 'string',
    ];
}
