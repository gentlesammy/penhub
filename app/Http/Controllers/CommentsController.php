<?php

namespace App\Http\Controllers;
use Mail;
use Auth;
use App\Mail\CommentReceivedMail;
use Illuminate\Http\Request;
use App\Comment;
use App\Episode;
class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOnly:role');
        $this->middleware('superAdminOnly:admin')->only(['destroy']);
    }

    public function index()
    {
        //fetch all comment and paginate
        $comments = Comment::where('deleted', 0)->orderBy('id', 'desc')->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //send mail to author of the episode
        /*
        $episode = Episode::findOrFail($request->episode);
        $episodeTitle= $episode->title;
        $episodeLink = $episode->slug;
        $userdetcomment =[
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'comment'=> $request->body,
            'episodeTitle'=> $episode->title,
            'episodeLink'=> $episode->slug,
        ];
        $authoremail = $episode->series->user->email;

        \Mail::to($authoremail)->send(new CommentReceivedMail($userdetcomment));

        return view()->back();

        */



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //fetch specific comment detail
        $comment=Comment::findOrFail($id);
        return view('admin.comments.view', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /*
        disapprove comments
        disapproved comments will not show on episodes
    */
    public function unaprove($id){
        $comment = Comment::findOrFail($id);
        $comment->approved = 0;
        $comment->update();
        return redirect()->back();
    }

    public function aprove($id){
        $comment = Comment::findOrFail($id);
        $comment->approved = 1;
        $comment->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete comment
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect(Route('adCommentsIndex'))
        ->with('flash_message', 'Category Deleted')->with('flash_type', 'alert-success');

    }
}
