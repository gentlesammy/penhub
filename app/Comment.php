<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //relationship with users
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relationship with episode

    public function episode(){
        return $this->belongsTo(Episode::class);
    }


    //approval status
     function approvalStatus($app){
        if($app == 0){
            return "UnApproved";
        }else{
            return "Approved";
        }
    }










}
