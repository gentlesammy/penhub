<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOnly:role');
    }
    public function index(){
        $users = User::where('role', '<', auth()->User()->role)->getQuery()->orderBy('id', 'Desc');
        if(request()->has('muted')){
           $users->where('muted', request('muted'));
        }
        if(request()->has('blocked')){
            $users->where('blocked', request('blocked'));
         }
         if(request()->has('role')){
            $users->where('role', request('role'));
         }


        $users =$users->get();

        return view('admin.users.index', compact('users'));

    }

    //mute
    public function mute(User $user){
        $user->muted = 1;
        $user->update();
        return redirect(Route('adUsersIndex'))
        ->with('flash_message', 'User:' . $user->name . ' Muted from commenting')->with('flash_type', 'alert-success');

    }
    //unmute
    public function unmute(User $user){
        $user->muted = 0;
        $user->update();
        return redirect(Route('adUsersIndex'))
        ->with('flash_message', 'User:' . $user->name . ' UnMuted')->with('flash_type', 'alert-success');
    }

        //block
        public function block(User $user){
            $user->blocked = 1;
            $user->update();
            return redirect(Route('adUsersIndex'))
            ->with('flash_message', 'User:' . $user->name . ' Blocked from using application')->with('flash_type', 'alert-success');

        }
        //unblock
        public function unblock(User $user){
            $user->blocked = 0;
            $user->update();
            return redirect(Route('adUsersIndex'))
            ->with('flash_message', 'User:' . $user->name . ' Unblocked')->with('flash_type', 'alert-success');
        }

        //show
        public function show(User $user){

            if(Auth()->user()->role <$user->role){
                return redirect(Route("adUsersIndex"))
                ->with('flash_message', 'Are you okay at all?')->with('flash_type', 'alert-danger');
            }

            return view('admin.users.view', compact('user'));

        }
        //update user role
        public function update(Request $request, User $user){
            if(Auth()->user()->role <$user->role){
                return redirect(Route("adUsersIndex"))
                ->with('flash_message', 'Are you okay at all?')->with('flash_type', 'alert-danger');
            }
           $user->role = $request->role;
           $user->update();
           return redirect()->back()
           ->with('flash_message', 'User:' . $user->name . ' Promoted')->with('flash_type', 'alert-success');
        }







}//end of class
