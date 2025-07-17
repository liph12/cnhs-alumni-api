<?php

namespace App\Http\Resources\MemberAPI;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "batch_year" => $this->batch_year,
            "first_name" => $this->first_name,
            "middle_name" => $this->middle_name,
            "last_name" => $this->last_name,
            "birth_date" => $this->birth_date,
            "gender" => $this->gender,
            "email" => $this->email,
            "mobile_number" => $this->mobile_number,
            "occupation" => $this->occupation,
            "experience_after" => $this->experience_after,
            "memories" => $this->memories,
            "status" => $this->status,
            "address" => $this->address
        ];
    }
}
