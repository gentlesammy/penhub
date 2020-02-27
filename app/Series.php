<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    //
    protected $table ="series";

    public static function getSeriesname($id){
        $serie = Series::findOrFail($id);
        return $serie->title;
    }

    //relationship with user
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relationship with user
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //relationship with user
    public function rating(){
        return $this->belongsTo(Rating::class);
    }
    //relationship with episode
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
    //accessor for date created for series

    public function followers(){
        return $this->hasMany(Follow::class);
    }

    public function episodesall()
    {
        return $this->hasMany(Episode::class)->orderBy('created_at', 'desc');
    }



    protected $guarded = [];





}//end of the class
