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
        $fn = $this->first_name;
        $ln = $this->last_name;
        $slug = strtolower($fn) . "_" . strtolower($ln);

        return [
            "id" => $this->id,
            "batch_year" => $this->batch_year,
            "name" => "$fn $ln",
            "first_name" => $fn,
            "middle_name" => $this->middle_name,
            "last_name" => $ln,
            "birth_date" => $this->birth_date,
            "gender" => $this->gender,
            "email" => $this->email,
            "mobile_number" => $this->mobile_number,
            "occupation" => $this->occupation,
            "experience_after" => $this->experience_after,
            "memories" => $this->memories,
            "status" => $this->status,
            "address" => $this->address,
            "paid_amount" => $this->paid_amount,
            "sponsored_amount" => $this->sponsored_amount,
            "update_logs" => $this->update_logs,
            "captured_at" => isset($this->captured_at) ? date("M d, Y g:i A", strtotime($this->captured_at)) : null,
            "slug" => $slug
        ];
    }
}
