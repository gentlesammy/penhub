<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    //
    protected $table ="Series";

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
        return $this->belongsToMany(Users::class);
    }

    public function episodesall()
    {
        return $this->hasMany(Episode::class)->orderBy('created_at', 'desc');
    }



    protected $guarded = [];





}//end of the class
