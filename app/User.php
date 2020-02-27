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
      return $this->hasMany(Series::class);
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
        return $this->belongsTo(Follow::class);
    }

    public function application(){

            return $this->belongsTo('Application::class');
    }


}
