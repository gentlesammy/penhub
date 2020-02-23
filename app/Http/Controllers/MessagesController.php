<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'password.confirm']);
        $this->middleware('adminOnly:role');
        $this->middleware('superAdminOnly:admin')->only(['delete']);
    }

    //fetch all the messages
    public function index(){
        $messages = Message::where('archieved', 0)->where('read', 0)->orderBy('id', 'desc')->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    public function readmessages(){
        $messages = Message::where('archieved', 0)->where('read', 1)->orderBy('id', 'desc')->paginate(10);
        return view('admin.messages.readmessages', compact('messages'));
    }

    public function archievedmessages(){
        $archievedmessages = Message::where('archieved', 1)->orderBy('id', 'desc')->paginate(10);
        return view('admin.messages.archievedmessages', compact('archievedmessages'));
    }

    public function importantmessages(){
        $importantmessages = Message::where('important', 1)->orderBy('id', 'desc')->paginate(10);
        return view('admin.messages.importantmessages', compact('importantmessages'));
    }

    public function read($id){
        $message =Message::findOrFail($id);
        $message->read = 1;
        $message->update();
        return redirect()->back();
    }

    public function archieved($id){
        $message =Message::findOrFail($id);
        $message->archieved = 1;
        $message->update();
        return redirect()->back();
    }

    public function important($id){
        $message =Message::findOrFail($id);
        $message->important = 1;
        $message->update();
        return redirect()->back();
    }

    public function delete($id){
        $message =Message::findOrFail($id);
        $message ->delete();
        return redirect()->back()
        ->with('flash_message', 'message Deleted')->with('flash_type', 'alert-success');
    }



}
