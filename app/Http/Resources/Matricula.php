<?php

namespace App\Http\Resources;

use App\Models\Asignatura;
use App\Models\Estudiante;
use App\Models\Mes;
use Illuminate\Http\Resources\Json\JsonResource;

class Matricula extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'est_id' => Estudiante::find($this->est_id),
            'asg_id' => Asignatura::find($this->asg_id),
            'mes_id' => Mes::find($this->mes_id),

            // 'pro_id' => Profesordato::find($this->pro_id)
            /*     'created_at' => $this->created_at->format('d-m-Y H:m:s'),
        'updated_at' => $this->updated_at->format('d-m-Y H:m:s'), */
        ];
    }
}
