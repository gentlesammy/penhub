<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //store followers
    public function store(User $user){
        return json_encode($user->name);
    }
}
