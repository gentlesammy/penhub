<?php

namespace App\Http\Controllers\Blog;
use App\Episode;
use App\Series;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(){
        return view('blog.episodes.index');
    }

    public function detail($slug){
        $episode = Episode::where('slug', $slug)->first();
        $relatedepisode = Episode::where('series_id', $episode->series_id)
        ->where('published', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('blog.episodes.detail')->with('relatedepisode', $relatedepisode)->with('episode', $episode);
    }
}
