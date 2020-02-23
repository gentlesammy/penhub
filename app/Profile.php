<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{


    protected $table ="Profiles";

    //relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //testing calling function from model
    public function profileImage(){
        return ($this->image) ? $this->image : 'defaultprofile.png';
    }


}
