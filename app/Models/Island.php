<?php

namespace App\Models;

use HasFactory;
use App\Models\Municipality;
use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    public function municipalities(){
        return $this->hasMany(Municipality::class);
    }
}
