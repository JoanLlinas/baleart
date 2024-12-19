<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Identificador' => $this->id,
            'Comentari' => $this->comment,
            'Puntuacio' => $this->score,
            'Validat' => $this->status,
            'Usuari' => $this->user_id,
        ]
    }
}

$table->string('comment', 5000);
            $table->float('score');
            $table->string('status', 1);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('space_id')->constrained();