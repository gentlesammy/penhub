<?php

namespace App\Http\Controllers\Profile;
use Auth;
use App\Http\Controllers\Controller;
use App\InMessage;
use App\User;
use Illuminate\Http\Request;

class InMessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('writersandadminonly');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $receivedmail= auth()->user()->received;
        return view('profile.inmessages.index', compact('receivedmail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.inmessages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email'     =>       'required|email|exists:users,email',
            'subject'   =>       'required|max:50',
            'body'      =>       'required|max:2000'
        ]);

        $receiver = $this->getUserId($data['email']);
        $msg = new InMessage;

        $sender = auth()->user()->id;
        $msg = new InMessage;
        $msg->sent_to_id = $receiver;
        Auth::user()->sent()->create([
        'subject'    => $request->subject,
        'body'       => $request->body,
        'sent_to_id' => $receiver,
        ]);
        return  back()->with('flash_message', 'Message Sent')->with('flash_type', 'alert-success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InMessage  $inMessage
     * @return \Illuminate\Http\Response
     */
    public function show(InMessage $inMessage)
    {
        $this->markAsRead($inMessage);
        $this->authorize('view', $inMessage);
        return view('profile.inmessages.detail', compact('inMessage'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InMessage  $inMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(InMessage $inMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InMessage  $inMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InMessage $inMessage)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InMessage  $inMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(InMessage $inMessage)
    {
        //
    }
    //user sent message
    public function sent(){
        return view('profile.inmessages.sent');
    }

    //mark message as read
    public function markAsRead($inMessage)
    {
        $this->authorize('update', $inMessage);
        $inMessage->read = 1;
        $inMessage->update();
    }
    //get user id
    public function getUserId($email){
        $user =   User::where('email', $email)->first();
        return $user->id;
    }

    public function messageadmincreate(Request $request)
    {
        return view('profile.inmessages.msgadmin');
    }

    public function messageadminupdate(Request $request)
    {
        $data = $request->validate([
            'subject'   =>       'required|max:50',
            'body'      =>       'required|max:2000'
        ]);

       $receiver = User::where('role', 5)->first()->id;
       $sender = auth()->user()->id;
       $msg = new InMessage;
       $msg->sent_to_id = $receiver;
       Auth::user()->sent()->create([
        'subject'    => $request->subject,
        'body'       => $request->body,
        'sent_to_id' => $receiver,
    ]);
       return back()->with('flash_message', 'Message Sent, Expect Admin Reply soon')->with('flash_type', 'alert-success');


    }


}//end of class
