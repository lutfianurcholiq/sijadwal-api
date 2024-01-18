<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FacultyResource extends JsonResource
{

    // Define Property
    public $status;
    public $message;
    public $resource;

    /**
     * @param $status
     * @param $message
     * @param $resource
     */
    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'response' => [
                'status' => $this->status,
                'message' => $this->message
            ],
            'data' => $this->resource
        ];
    }
}
