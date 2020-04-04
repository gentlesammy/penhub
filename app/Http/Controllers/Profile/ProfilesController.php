<?php

namespace App\Http\Controllers\Profile;
use App\Profile;
use App\Events\NewProfileCreatedEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'password.confirm']);
        $this->middleware('blockedUsers');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->profile == ""){
            return view('profile.create');
        }else{
            $profile = auth()->user()->profile;
            return view('profile.index');
        }


        //$this->authorize('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = request()->validate([
            'username'          =>          'required|min:5|max:30|unique:profiles,username',
            'phone'             =>          'required|min:11|max:11|',
            'description'       =>          'required|min:100|max:1000',
            'facebook'          =>          'required',
            'twitter'           =>          'required',
            'showphone'         =>          'required',
            'showsocial'        =>          'required',
            'image'             =>          'required|mimes:png,jpg,jpeg'
        ]);
        if ($files = $request->file('image')) {
            $destinationPath = 'img/profile/'; // upload path
            $profileImage =str_slug($request->username) .date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
         }
         $pro = new Profile;
         $pro->username         = request(str_slug('username'));
         $pro->phone            = request('phone');
         $pro->description      = request('description');
         $pro->facebook         = request('facebook');
         $pro->twitter          = request('twitter');
         $pro->showphone        = request('showphone');
         $pro->showsocial       = request('showsocial');
         $pro->image            = $profileImage;
         $pro->user_id          = auth()->user()->id;
         $pro->save();
         event(new NewProfileCreatedEvent($pro));
         return view('profile.index')
        ->with('flash_message', 'Profile Created. Welcome to PenHub officially')->with('flash_type', 'alert-success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $username)
    {
        $this->authorize('view', $username);
        return view('profile.view', compact('username'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $this->authorize('update', $profile);
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $profile)
    {
        $data = request()->validate([
            'username'          =>          'required|min:5|max:30|unique:profiles,username,'. $profile,
            'phone'             =>          'required|min:11|max:11|',
            'description'       =>          'required|min:100|max:1000',
            'facebook'          =>          'required',
            'twitter'           =>          'required',
            'showphone'         =>          'required',
            'showsocial'        =>          'required',
        ]);

        $pro = Profile::findOrFail($profile);
        $pro->username         = request(str_slug('username'));
        $pro->phone            = request('phone');
        $pro->description      = request('description');
        $pro->facebook         = request('facebook');
        $pro->twitter          = request('twitter');
        $pro->showphone        = request('showphone');
        $pro->showsocial       = request('showsocial');
        $pro->user_id          = auth()->user()->id;
        $pro->update();
        return redirect(Route('profilehome'))
        ->with('flash_message', 'Profile Updated.')->with('flash_type', 'alert-success');
    }

    //visibility page
    public function visibility(){
        return view('profile.visibility');
    }

     //visibleAnon
     public function visibleAnon(Request $request){
         
        $profile = auth()->user()->profile;
        $this->authorize('update', $profile);
        $profile->anonymous = $request->anoncode;
        $profile->update();
        return json_encode("done");
    }

    //show phone
    public function visiblePhone(Request $request){
        $profile = auth()->user()->profile;
        $this->authorize('update', $profile);
        $profile->showphone = $request->showPhone;
        $profile->update();
        return json_encode("done");
    }
    //visibleSocial
    public function visibleSocial(Request $request){
        $profile = auth()->user()->profile;
        $this->authorize('update', $profile);
        $profile->showsocial= $request->showsocial;
        $profile->update();
        return json_encode("done");
    }

    public function messageadminupdate()
    {
        
    }
   
}//end of class
