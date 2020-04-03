<?php

namespace App\Http\Controllers\Profile;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Event;
use Intervention\Image\Facades\Image;
use App\Events\SeriesCreatedEvent;
use App\Series;
use App\Profile;
use App\Rating;
use App\Category;
class SeriesController extends Controller
{
    //constructor
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('writersandadminonly');
    }
    //index of all series
    public function index(){
        //user profile id passed in as a quick fix for now, I need to check if dude has a profile set up, People with no profile are not allowed to write
        $this->authorize('update', auth()->user()->profile);
        return view('profile.series.index');
    }

    public function create(){
        //user profile id passed in as a quick fix for now, I need to check if dude has a profile set up, People with no profile are not allowed to write
        $this->authorize('update', auth()->user()->profile);
        $categories = Category::where('active', 1)->get();
        $ratings = Rating::where('active', 1)->get();
        return view('profile.series.create')->with('categories', $categories)
        ->with('ratings', $ratings);
    }

    public function store(Request $request){
        $data = request()->validate([
            'title'           => 'required|min:5|max:50|unique:series,title',
            'category_id'     => 'required',
            'rating_id'       => 'required',
            'summary'         => 'required|min:50|max:2000',
            'feature'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
            $data['user_id']= auth()->user()->id;
            if ($files = $request->file('feature')) {
                $destinationPath = 'img/series/'; // upload path
                $featureImage =str_slug($request->title) .date('YmdHis') . "Penhub" . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $featureImage);
                $img = Image::make($destinationPath.$featureImage)->resize(30, 30);
             }
             $data['feature']= $featureImage;
             $series = new Series;
             $series->title             = request('title');
             $series->category_id       = request('category_id');
             $series->rating_id         = request('rating_id');
             $series->summary           = request('summary');
             $series->feature           = $featureImage;
             $series->user_id           = auth()->user()->id;

             $series->save();
        event(new SeriesCreatedEvent($series));
        return redirect(Route('profileserieshome'))
        ->with('flash_message', 'Series Created')->with('flash_type', 'alert-success');
    }

    public function show(Series $series){

        return view('profile.series.detail', compact('series'));
    }

    public function edit(Series $series){
        $this->authorize('update', $series);
        $categories = Category::where('active', 1)->get();
        $ratings = Rating::where('active', 1)->get();
        return view('profile.series.edit')->withSeries($series)->with('categories', $categories)
        ->with('ratings', $ratings);
    }

    public function  update(Request $request, $series){
        $data = request()->validate([
            'title'           => 'required|min:5|max:50|unique:series,title, '.$series,
            'category_id'     => 'required',
            'rating_id'       => 'required',
            'summary'         => 'required|min:50|max:2000',
       ]);
       $series = Series::findOrFail($series);
       $series->title             = request('title');
       $series->category_id       = request('category_id');
       $series->rating_id         = request('rating_id');
       $series->summary           = request('summary');
       $series->update();
       event(new SeriesCreatedEvent($series));
        return redirect(Route('profileserieshome'))
        ->with('flash_message', 'Series Updated')->with('flash_type', 'alert-success');
    }



}
