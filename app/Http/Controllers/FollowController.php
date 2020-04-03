<?php

namespace App\Http\Controllers;
use App\User;
use App\Series;
use Illuminate\Http\Request;

class FollowController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //store followers
    public function store(Series $series){

        return auth()->user()->following()->toggle($series);
    }
}
