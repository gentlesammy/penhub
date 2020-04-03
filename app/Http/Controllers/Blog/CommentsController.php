<?php
namespace App\Http\Controllers\Blog;
use Mail;
use App\Mail\AuthorNotify;
use App\Comment;
use App\Episode;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(){

    }

    public function delete(Comment $comment){
        $this->authorize('delete', $comment);
        $comment->delete();
        return json_encode('comment deleted');

    }


    public function update(){

    }

    public function store(Request $request){

       $data = request()->validate([
           'episode_id' => 'required',
           'body'       => 'required|min:10|max:10000'
       ]);

        /*
       $comment = new Comment;
       $user_id    = auth()->user()->id;
       $comment->episode_id = $request->episode_id;
       $comment->body = $request->body;
       $comment->user_id =  $user_id;
       $comment->create();
       return view()->back();
       */
      $comment = auth()->user()->comments()->create($data);
      $episode = Episode::findOrFail($request->episode_id);
      $relatedepisode = Episode::where('series_id', $episode->series_id)
                        ->where('published', 1)->orderBy('created_at', 'desc')->paginate(10);
      $comments =$episode->comments->where('approved', 1)->where('deleted', 0)->sortByDesc('created_at');
      $data = [
          'comment'                      =>          $request->body,
          'commenter'                      =>        auth()->user()->name,
          'episode'                     =>          $episode->title,
          'slug'                        =>          $episode->slug,
      ];
      Mail::to($episode->series->user->email)->send(new AuthorNotify($data));
      return view('blog.episodes.detail')->with('relatedepisode', $relatedepisode)
        ->with('episode', $episode)->with('comments', $comments);






    }//end of store comment




}
