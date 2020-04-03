<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{

    protected $table ="episodes";
    //rel with series
    public function series(){
        return $this->belongsTo(Series::class);
    }

    //relationship with comments
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function published(){
        if($this->published == 0){
            return "Not Published";
        }else{
            return "Published";
        }
    }

    //turn guraded off
    protected $guarded = [];
}
