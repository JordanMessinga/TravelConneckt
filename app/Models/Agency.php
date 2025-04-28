<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    //
    public function city(){
        return $this->belongsTo(City::class,"id_city","id");
    }
}
