<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'identificador' => $this->id,
            'Nom' => $this->name,
            'Registre' => $this->regNumber,
            'Modalitats' => $this->modalities, // <-- !!!
            'Serveis' => $this->services, // <-- !!!
            'Comentaris' => $this->comments, // <-- !!!
            //TREURE LLISTAT DE LES IMATGES ASSOCIADES
            'Imatges' => $this->comments->flatMap(function ($comment) { //flatMap recor cada comment
                return $comment->images; // i torna les images associades a ell
            })->map(function ($image) {
                return [ //a cada imatge s'aplica un format per que només doni la seva id i url:
                    'id' => $image->id,
                    'url' => $image->url, // Asegúrate de tener el campo 'url'
                ];
            })->unique('id')->values(), // amb unique evitam que surtin imatges repetides.
            'Transcripcio_CAT' => $this->observation_CA,
            'Transcripcio_ESP'=> $this->observation_ES,
            'Transcripcio_EN'=> $this->observation_EN,
            'Correu' => $this->email,
            'Telefon' => $this->phone,
            'Web' => $this->website,
            'Acces' => $this->accessType,
            'Puntuacio' => $this->totalScore,
            'Contador' => $this->countScore,
            'Direccio' => $this->address_id, // <-- !!! MIRAR DE TREURE NOM
            'tipus' => $this->space_type_id, // <-- !!! MIRAR DE TREURE NOM
            'gestor' => $this->user_id, // <-- !!! MIRAR DE TREURE NOM
        ];
    }
}
