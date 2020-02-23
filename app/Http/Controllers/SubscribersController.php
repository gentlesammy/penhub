<?php

namespace App\Http\Controllers;
use App\Subscriber;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['update']);
        $this->middleware('adminOnly:role')->except(['update']);
        $this->middleware('superAdminOnly:admin')->only(['paid']);
    }
    //get all active subscribers
    public function index(){
        $subscribers = Subscriber::orderBy('id', 'desc')->paginate(10);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function paid($id){
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->paid = 1;
        $subscriber->update();
        return redirect()->back()
        ->with('flash_message', 'Subscriber marked as Paid. He/She will have access to premium content')->with('flash_type', 'alert-success');
    }
    public function activate($id){
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->active = 1;
        $subscriber->update();
        return redirect()->back()
        ->with('flash_message', 'Subscriber activated')->with('flash_type', 'alert-success');
    }
    public function deactivate($id){
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->active = 0;
        $subscriber->update();
        return redirect()->back()
        ->with('flash_message', 'Subscriber deactivated')->with('flash_type', 'alert-success');
    }


    //save subscribers
    public function store(Request $request){

        $data = request()->validate([
            'email' => 'required|email|unique:subscribers,email',
            'name'  =>  'sometimes|min:5|max:50'
        ]);
        $subscriber = new Subscriber;
        $subscriber -> save($data);


    }






















}//end of class
