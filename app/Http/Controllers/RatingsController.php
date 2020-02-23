<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Rating;
class RatingsController extends Controller
{
        //constructor, set
        public function __construct()
        {
            $this->middleware('auth');
            $this->middleware('adminOnly:role');
        }
        //fetch all ratings
        public function index(){
            $ratings = Rating::where('active', 1)->orderBy('id', 'desc')->get();
            return view('admin.ratings.index', compact('ratings'));
        }
        public function create(){
            return view('admin.ratings.create');
        }

        public function store(){
            $data = request()->validate([
                'title'              =>         'required|unique:ratings,title|min:3|max:50',
                'description'       =>          'required|min:10|max:100'
            ]);
            $rating = new Rating();
            $rating->title = request('title');
            $rating->description = request('description');
            $rating->save();
            return redirect(Route('adRateIndex'))
            ->with('flash_message', 'Rating Created')->with('flash_type', 'alert-success');

        }//end of store function

        public function view($id){
            $rating = Rating::findOrFail($id);
            return view('admin.ratings.view', compact('rating'));
        }

        public function edit($id){
            $rating = Rating::findOrFail($id);
            return view('/admin/ratings/edit', compact('rating'));
        }

        public function update($id){
            $data = request()->validate([
                'title'              =>         'required|min:3|max:50|unique:ratings,title,' .$id,
                'description'       =>          'required|min:10|max:100'
            ]);
            $rating = Rating::findOrFail($id);
            $rating->title = request('title');
            $rating->description = request('description');
            $rating->update();
            return redirect(Route('adRateIndex'))
            ->with('flash_message', 'Rating Updated')->with('flash_type', 'alert-success');

        }

        public function destroy($id){
            $rating = Rating::findOrFail($id);
            $rating->delete();
            return redirect(Route('adRateIndex'))
            ->with('flash_message', 'Rating Deleted')->with('flash_type', 'alert-success');
        }





}//end of class
