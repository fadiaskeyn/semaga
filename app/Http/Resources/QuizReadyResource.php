<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizReadyResource extends JsonResource
{
    /**
     * Transform resource menjadi array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'quiz' => QuizResource::make($this->quiz),
        ];
    }
}
