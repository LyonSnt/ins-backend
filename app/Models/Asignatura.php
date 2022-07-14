<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $table = 'tblasignatura';

    public $fillable = [
        'niv_id',
        'asg_nombre',
        'sex_id',
        'tri_id',
        'pro_id',
        'asg_estado',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'niv_id' => 'integer',
        'asg_nombre' => 'string',
        'sex_id' => 'integer',
        'tri_id' => 'integer',
        'pro_id' => 'integer',
        'asg_estado' => 'integer',

    ];

    public function scopeActive($query) {
        return $query->where('sex_id', 1);
    }

    public function nivel()
    {
        return $this->belongsTo(\App\Models\tblnivel::class, 'niv_id', 'id');
    }


}
