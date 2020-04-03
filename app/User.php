<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /*
        change user role code to title
    */
    public static function getUserRank($rankCode){
        if($rankCode == 1){
            return 'Reader';
        }else if($rankCode ==2){
            return 'Writer';
        }
        else if($rankCode ==3){
            return 'Moderator';
        }else {
            return 'Admin';
        }
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function series(){
      return $this->hasMany(Series::class)->orderBy('created_at', 'desc')->take(10);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    //relationship with profile
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function following(){
        return $this->belongsToMany(series::class);
    }

    public function application(){

            return $this->belongsTo('Application::class');
    }


    //inmessages relationship
    public function Inmessagesent(){
        return $this->hasMany(inMessages::class);
    }

    //get all episodes of a user
    public function episodes(){
        return $this->hasManyThrough(Episode::class, Series::class);
    }

    /*  InMessage sending system relationship  */
    //When a user  send a InMessage
    public function sent()
    {
        return $this->hasMany(InMessage::class, 'sender_id');
    }

    // when a  user can  receives a InMessage
    public function received()
    {
        return $this->hasMany(InMessage::class, 'sent_to_id')->orderBy('created_at', 'desc');
    }

       // get unread message list for a user
       public function unreadmessage()
       {
           return $this->hasMany(InMessage::class, 'sent_to_id')->where('read', 0)->orderBy('created_at', 'desc');
       }

       // get read message list for a user
       public function readmessage()
       {
           return $this->hasMany(InMessage::class, 'sent_to_id')->where('read', 1)->orderBy('created_at', 'desc');
       }

       //convert user role code to word
       public function getUserrole(){
           if($this->role === 1){
                return 'Reader';
           }elseif($this->role === 2){
                return 'Writer';
           }elseif($this->role === 3){
                return 'Moderator';
           }elseif($this->role === 4){
                return 'Admin';
           }else{
                return 'Editor';
           }

       }


}
