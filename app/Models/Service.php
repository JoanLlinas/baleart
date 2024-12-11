<?php

namespace App\Models;

use HasFactory;
use App\Models\Space;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function spaces(){
        return $this->belongsToMany(Space::class);
    }
}
