<?php

namespace App\Models;

use HasFactory;
use App\Models\Address;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    public function addresses(){
        return $this->hasMany(Address::class);
    }
}
