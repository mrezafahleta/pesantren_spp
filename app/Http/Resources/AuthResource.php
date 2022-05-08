<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nik_murid' => $this->nik_murid,
            'email' => $this->email,
            'status' => $this->status,
            'role_id' => $this->role_id,
            'foto' =>  $this->student == null ? "Kosong" : "http://10.0.0.2:8000/storage/{$this->student->foto}",
            'nama' =>  $this->student == null ? "Tidak ada nama" : $this->student->nama

        ];
    }
}
