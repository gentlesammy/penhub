<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Event;
use Intervention\Image\Facades\Image;
use App\Events\EpisodesCreatedEvent;
use App\Series;
use App\Profile;
use App\Rating;
use App\Category;
use App\Episode;
class EpisodesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('writersandadminonly');
    }

     //index of all series
     public function index(){
        //user profile id passed in as a quick fix for now, I need to check if dude has a profile set up, People with no profile are not allowed to write
        $episodes = Episode::where('deleted', 0)->orderBy('created_at', 'desc')->paginate(10);
        return view('profile.episodes.index')->with('episodes', $episodes);
    }

    public function create(){
        //user profile id passed in as a quick fix for now, I need to check if dude has a profile set up, People with no profile are not allowed to write

        return view('profile.episodes.create');
    }

    public function store(Request $request){
        $data = request()->validate([
            'title'          => 'required|min:5|max:50|unique:episodes,title',
            'series_id'      => 'required',
            'body'           => 'required|min:50|max:100000',
            'feature'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       $seriesTitle = $this->getSeriesName(request('series_id'));
       $data['user_id']= auth()->user()->id;
       if ($files = $request->file('feature')) {
           $destinationPath = 'img/episodes/'; // upload path
           $featureImage =str_slug($seriesTitle) .date('YmdHis') . str_slug($request->title) . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $featureImage);
           $img = Image::make($destinationPath.$featureImage)->fit(300, 300);
        }
        $episode = new Episode;
        $episode->title             = request('title');
        $episode->series_id         = request('series_id');
        $episode->body              = request('body');
        $episode->feature           = $featureImage;
        $episode->slug              =str_slug($seriesTitle). "-" .str_slug($request->title);
        $episode->save();
        event(new EpisodesCreatedEvent($episode));
        return redirect(Route('profileepisodehome'))
        ->with('flash_message', 'Episode Created')->with('flash_type', 'alert-success');
    }

    //show detail of Episode
    public function show($slug){
        $episode = Episode::where('slug', $slug)->first();
        $this->authorize('update', $episode->series);
        return view('profile.episodes.detail')->with('episode', $episode);
    }


    public function edit(Episode $episode){
        $this->authorize('update', $episode->series);
        return view('profile.episodes.edit')->with('episode', $episode);
    }

    public function update(Request $request, $episode){

        $data = request()->validate([
            'title'          => 'required|min:5|max:50|unique:Episodes,title,'. $episode,
            'series_id'      => 'required',
            'body'           => 'required|min:50|max:100000',
            'feature'        => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       $seriesTitle = $this->getSeriesName(request('series_id'));
       $data['user_id']= auth()->user()->id;
        $episode = Episode::findOrFail($episode);
        $this->authorize('update', $episode->series);
        $episode->title             = request('title');
        $episode->series_id         = request('series_id');
        $episode->body              = request('body');
        //$episode->feature           = $featureImage;
        $episode->slug              =str_slug($seriesTitle). "-" .str_slug($request->title);
        $episode->update();
        event(new EpisodesCreatedEvent($episode));
        return view('profile.episodes.detail')->with('episode', $episode)
        ->with('flash_message', 'Episode Updated')->with('flash_type', 'alert-success');
    }




    //get series title
    public function getSeriesName($id){
        $series = Series::findOrFail($id);
        return $series->title;
    }


      //publish post
      public function publishPost($id){
        $episode =Episode::findOrFail($id);
        $this->authorize('update', $episode->series);
        $episode->published = 1;
        $episode->update();
        return redirect(Route('profileepisodehome'))
            ->with('flash_message', 'Episode Published')->with('flash_type', 'alert-success');
    }


    //Unpublish post
    public function unPublishPost($id){
        $episode =Episode::findOrFail($id);
        $this->authorize('update', $episode->series);
        $episode->published = 0;
        $episode->update();
        return redirect(Route('profileepisodehome'))
            ->with('flash_message', 'Episode Unpublished')->with('flash_type', 'alert-success');

    }




}//end of class
