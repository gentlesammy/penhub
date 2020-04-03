<?php

namespace App\Http\Controllers;
use App\Notifications\NewSeriesNotification;
use App\Events\SeriesCreatedEvent;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Category;
use App\Rating;
use App\User;
use App\Series;
use App\Episode;
class SeriesController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOnly:role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //grab category
        $series = Series::where('active', 1)->paginate(10);
        return view('admin.series.index')->with('series', $series);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::where('active', 1)->get();
        $ratings = Rating::where('active', 1)->get();
        return view('admin.series.create')->with('categories', $categories)
        ->with('ratings', $ratings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$user_id = auth()->user()->id; //one way to grab user_id
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
                $img = Image::make($destinationPath.$featureImage)->resize(300, 300);
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

             //notify admin a new series has been created || use event to do this
                $user = User::where('role', 5)->first();
                $user->notify(new NewSeriesNotification($series));


             return redirect(Route('adseriesIndex'))
        ->with('flash_message', 'Series Created')->with('flash_type', 'alert-success');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Series $id)
    {
        //details of each series
        $series = $id;
        return view('admin.series.view', compact('series'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Series $id)
    {

        $this->authorize('update', $id);
        $series = $id;
        /*
        if($series->user_id != auth()->User()->id){
            return redirect(Route('adseriesIndex'));
        }
        */
        $categories = Category::where('active', 1)->get();
        $ratings = Rating::where('active', 1)->get();
        return view('/admin/Series/edit', compact('series'))->with('categories', $categories)
        ->with('ratings', $ratings);
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
        $data = request()->validate([
            'title'           => 'required|min:5|max:50|unique:series,title, '.$id,
            'category_id'     => 'required',
            'rating_id'       => 'required',
            'summary'         => 'required|min:50|max:2000',
       ]);
       $series = Series::findOrFail($id);
       $series->title             = request('title');
       $series->category_id       = request('category_id');
       $series->rating_id         = request('rating_id');
       $series->summary           = request('summary');
       $series->update();
        return redirect(Route('adseriesIndex'))
        ->with('flash_message', 'Series Updated')->with('flash_type', 'alert-success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
