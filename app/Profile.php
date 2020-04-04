<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $table ="profiles";


    //relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //testing calling function from model
    public function profileImage(){
        return ($this->image) ? $this->image : 'defaultprofile.png';
    }
    //anonymous
    public function anonymous(){
        if($this->anonymous == 1){
            return "Checked";
        }else{
            return ""; 
        }
    }
    //phone number
    public function displayPhoneNumber(){
        if($this->showphone == 1){
            return "Checked";
        }else{
            return ""; 
        }
    }
    //social media handle 
    public function displaySocialHandle(){
        if($this->showsocial == 1){
            return "Checked";
        }else{
            return ""; 
        }
    }


}//end of 
