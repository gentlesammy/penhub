<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Series;
use App\Category;
use App\Episode;
use App\Profile;
class PagesController extends Controller
{
    //fetch first four episode, series, and all categories with number
    public function index(){

        //category
        $categories =DB::table('Series')
                     ->select('category_id', DB::raw('count(*) as category_count'))
                     ->groupBy('category_id')
                     ->orderBy('category_count', 'desc')
                     ->get();
        //series
        $series = Series::where('active', 1)->where('deleted', 0)->orderBy('id', 'desc')->take(4)->get();
        //profile
        $profiles = Profile::where('anonymous', 0)->orderBy('id', 'desc')->take(4)->get();

        //fetch episodes
        $episodesall = Episode::where('published', 1)->where('deleted', 0)->orderBy('id', 'desc')->get();
        $episodes = Episode::where('published', 1)->where('deleted', 0)->orderBy('id', 'desc')->paginate(2);
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
}
