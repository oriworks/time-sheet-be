<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkdayResource extends JsonResource
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
            'day' => $this->day,
            'shifts' => ShiftResource::collection($this->shifts),
            'day_off' => $this->day_off,
            'validate' => $this->validated_at !== null,
        ];
    }
}
