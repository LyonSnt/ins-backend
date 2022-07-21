<?php

namespace App\Http\Resources;

use App\Models\Estudiante;
use App\Models\Profesordato;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class UserResource extends JsonResource
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
            /*  'nombre' => Str::of($this->name)->upper(), */

            'name' => Str::upper($this->name),
            'email' => $this->email,
            'password' => $this->password,
            'id_rol' => $this->id_rol,
            'est_id' => Estudiante::find($this->est_id),
            'pro_id' => Profesordato::find($this->pro_id)


        /*     'created_at' => $this->created_at->format('d-m-Y H:m:s'),
            'updated_at' => $this->updated_at->format('d-m-Y H:m:s'), */

        ];
    }

    public function with($request)
    {
        return [
            'res' => true
        ];
    }
}
