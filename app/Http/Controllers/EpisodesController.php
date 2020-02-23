<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Episode;
use App\User;
use App\Series;
use Intervention\Image\Facades\Image;
class EpisodesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOnly:role');
        $this->middleware('superAdminOnly:admin')->only(['unPublishPost']);
    }
    //all episodes
    public function index(){
        $episodes = Episode::where('deleted', 0)->orderBy('series_id', 'desc')->orderBy('id', 'desc')->paginate(10);
        return view('admin.episodes.index', compact('episodes'));

    }
    //create
    public function create(){
        $series = Series::where('active', 1)
        ->Where('user_id', auth()->user()->id)->get();
        return view('admin.episodes.create')->with('series', $series);

    }
    //store
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
        return redirect(Route('adEpisodesIndex'))
        ->with('flash_message', 'Episode Created')->with('flash_type', 'alert-success');


    }

    //get series title
    public function getSeriesName($id){
        $series = Series::findOrFail($id);
        return $series->title;
    }

    public function show($slug){
        $episodes = Episode::where('slug', $slug)->first();
        return view('admin.episodes.view')->with('episodes', $episodes);
    }

    public function edit(Episode $id)
    {
        $this->authorize('update', $id);
        //details of each series
        $episode = $id;
        $series = Series::where('active', 1)->where('user_id', auth()->User()->id)->get();
            return view('admin.episodes.edit', compact('episode'))->with('series', $series);
    }

        //update
        public function update(Request $request, $id){
            $data = request()->validate([
                'title'          => 'required|min:5|max:50|unique:Episodes,title,'. $id,
                'series_id'      => 'required',
                'body'           => 'required|min:50|max:100000',
                'feature'        => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);
           $seriesTitle = $this->getSeriesName(request('series_id'));
           $data['user_id']= auth()->user()->id;
            $episode = Episode::findOrFail($id);
            $episode->title             = request('title');
            $episode->series_id         = request('series_id');
            $episode->body              = request('body');
            //$episode->feature           = $featureImage;
            $episode->slug              =str_slug($seriesTitle). "-" .str_slug($request->title);
            $episode->update();
            return redirect(Route('adEpisodesIndex'))
            ->with('flash_message', 'Episode Updated')->with('flash_type', 'alert-success');

        }
    //publish post
    public function publishPost($id){
        $episode =Episode::findOrFail($id);
        $episode->published = 1;
        $episode->update();
        return redirect(Route('adEpisodesIndex'))
            ->with('flash_message', 'Episode Published')->with('flash_type', 'alert-success');
    }




    //Unpublish post
    public function unPublishPost($id){
        $episode =Episode::findOrFail($id);
        $episode->published = 0;
        $episode->update();
        return redirect(Route('adEpisodesIndex'))
            ->with('flash_message', 'Episode Unpublished')->with('flash_type', 'alert-success');

    }





}//end of class
