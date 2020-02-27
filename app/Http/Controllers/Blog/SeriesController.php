<?php

namespace App\Http\Controllers\Blog;
use App\Series;
use App\Episode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeriesController extends Controller{

    public function index(){
        $series=Series::where('active', 1)->paginate(10);
        return view('blog.series.index', compact('series'));
    }

    public function show(Series $id){
        $episodes=$id->episodes()->where('published', 1)
        ->where('deleted', 0)->orderBy('created_at', 'desc')->paginate(10);
        return view('blog.series.detail')->with('id', $id)->with('episodes', $episodes);
    }

    public function missopeyemi(){
        return view('blog.about');
    }






}
