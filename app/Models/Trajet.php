<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    //
    public function agency(){
        return $this->hasOne(Agency::class,"id","id_agency");
    }
    public function category(){
        return $this->hasOne(Category::class,"id","id_category");
    }
}
