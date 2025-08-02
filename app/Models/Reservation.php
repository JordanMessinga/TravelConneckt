<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    public function trajet(){
        return $this->belongsTo(Trajet::class, 'id_trajet', 'id');
    }
}
