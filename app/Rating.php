<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $guraded = [];

     //relationship with series
    public function series(){
        return $this->hasMany(Series::class);
    }
}
