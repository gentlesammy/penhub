<?php

namespace App\Http\Controllers\Blog;
use DB;
use App\Episode;
use App\Series;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(){

        //category
        $series =DB::table('episodes')
                     ->select('series_id', DB::raw('count(*) as series_count'))
                     ->groupBy('series_id')
                     ->orderBy('series_count', 'desc')
                     ->get();
        $categories =DB::table('series')
                     ->select('category_id', DB::raw('count(*) as category_count'))
                     ->groupBy('category_id')
                     ->orderBy('category_count', 'desc')
                     ->get();
        $episodes = Episode::where('published', 1)->orderBy('id', 'desc')->paginate(10);
        return view('blog.episodes.index', compact('episodes'))->with('categories', $categories)->with('series', $series);
    }

    public function detail($slug){
        $episode = Episode::where('slug', $slug)->first();
        $comments =$episode->comments->where('approved', 1)->where('deleted', 0)->sortByDesc('created_at');
        $relatedepisode = Episode::where('series_id', $episode->series_id)
        ->where('published', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('blog.episodes.detail')->with('relatedepisode', $relatedepisode)
        ->with('episode', $episode)->with('comments', $comments);
    }
}
