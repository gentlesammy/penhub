<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{

    protected $table ="Episodes";
    //rel with series
    public function series(){
        return $this->belongsTo(Series::class);
    }

    //relationship with comments
    public function comments(){
        return $this->hasMany(Comment::class);
    }


    //rel with comments
  /*  public function comments()
    {
        return $this->hasMany(Comment::class);
    }
*/

    protected $guarded = [];
}
