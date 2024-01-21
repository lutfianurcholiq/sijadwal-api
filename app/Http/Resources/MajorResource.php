<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\FacultyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MajorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'faculty' => FacultyResource::make($this->faculty),
            'id' => $this->id,
            'major_code' => $this->major_code,
            'major_name' => $this->major_name,
            'created_at' => $this->created_at->format('d/m/Y'),
        ];
    }
}
