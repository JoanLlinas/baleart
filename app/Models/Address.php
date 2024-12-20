<?php

namespace App\Models;

use HasFactory;
use App\Models\Zone;
use App\Models\Space;
use App\Models\Municipality;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function municipality(){
        return $this->belongsTo(Municipality::class);
    }

    public function zone(){
        return $this->belongsTo(Zone::class);
    }

    public function spaces(){
        return $this->hasOne(Space::class);
    }
}
