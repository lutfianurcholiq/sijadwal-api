<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'faculty' => FacultyResource::make($this->faculty),
            'major' => MajorResource::make($this->major),
            'level' => LevelResource::make($this->level),
            'nim' => $this->nim,
            'name' => $this->name,
            'date in' => $this->date_in,
            'date out' => $this->date_out,
            'birth place' => $this->birth_place,
            'birth date' => $this->birth_date,
            'created at' => $this->created_at->format('d/m/Y'),
        ];
    }
}
