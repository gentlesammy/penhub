<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Series;
use App\Category;
use App\Episode;
use App\Profile;
use App\Message;
class PagesController extends Controller
{
    //fetch first four episode, series, and all categories with number
    public function index(){

        //category
        $categories =DB::table('series')
                     ->select('category_id', DB::raw('count(*) as category_count'))
                     ->groupBy('category_id')
                     ->orderBy('category_count', 'desc')
                     ->get();
        //series
        $series = Series::has('episodes')->where('active', 1)->where('deleted', 0)->where('coverpage', 1)->orderBy('id', 'desc')->take(4)->get();
        //profile
        $profiles = Profile::where('anonymous', 0)->orderBy('id', 'desc')->take(4)->get();

        //fetch episodes
        $episodesall = Episode::where('published', 1)->where('deleted', 0)->orderBy('id', 'desc')->get();
        $episodes = Episode::where('published', 1)->where('deleted', 0)->where('coverpage', 1)->orderBy('id', 'desc')->paginate(2);
        return view('blog.index')->with('series', $series)->with('categories', $categories)
        ->with('episodes', $episodes)->with('episodesall', $episodesall)->with('profiles', $profiles);
    }
    //about us page
    public function about(){
        return view('blog.about');
    }
    //writeforus
    public function writeforus(){
        return view('blog.writeforus');
    }
    //contact us page
    public function contact(){
        return view('blog.contact');
    }

    public function store(Request $request){
        $data = request()->validate([
            'name'          => 'required|min:5',
            'email'          => 'required|min:5|email|max:50',
            'phone'          => 'required|min:11|max:11',
            'messages'          => 'required|min:20',
        ]);

        $msg = new Message;
        $msg->create($data);
        return redirect(Route('contact'))
        ->with('flash_message', 'Your Message has been received, expect from us soonest')->with('flash_type', 'alert-success');

    }
}//end of class
